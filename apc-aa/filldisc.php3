<?php
/**
 * filldisc.php3 - writes a discussion item into the discussion table
 * expected parameters (usually from a HTML form):
 *          $d_item_id
 *          $d_parent_id
 *          $d_subject
 *          $d_author
 *          $d_e_mail
 *          $d_body
 *          $d_state
 *          $d_flag
 *          $d_free1
 *          $d_free2
 *          $d_url_address
 *          $d_url_description
 *
 * date and remote address(IP) of client is set by script.
 *
 * @package UserInput
 * @version $Id: filldisc.php3 4386 2021-03-09 14:03:45Z honzam $
 * @author
 * @copyright Copyright (C) 1999, 2000 Association for Progressive Communications
*/
/*
Copyright (C) 1999, 2000 Association for Progressive Communications
https://www.apc.org/

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program (LICENSE); if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

// ----- input variables normalization - start --------------------------------

// This code handles with "magic quotes" and "register globals" PHP (<5.4) setting
// It make us sure, taht
//  1) in $_POST,$_GET,$_COOKIE,$_REQUEST variables the values are not quoted
//  2) the variables are imported in global scope and is quoted
// We are trying to remove any dependecy on the point 2) and use only $_* superglobals
function AddslashesDeep($value)   { return is_array($value) ? array_map('AddslashesDeep',   $value) : addslashes($value);   }

foreach ($_REQUEST as $k => $v) {
    $$k = AddslashesDeep($v);
}
// ----- input variables normalization - end ----------------------------------


/** APC-AA configuration file */
require_once __DIR__."/./include/config.php3";
/** Main include file for using session management function on a page */
require_once __DIR__."/include/locsess.php3";
/** Set of useful functions used on most pages */
require_once __DIR__."/include/util.php3";
/** Defines class for inserting and updating database fields */
require_once __DIR__."/include/varset.php3";
/** discussion utility functions */
require_once __DIR__."/include/discussion.php3";
/** defines class that prints the items (news, discussions, calendar...) */
require_once __DIR__."/include/itemview.php3";
/**  Defines class for item manipulation (shows item in compact or fulltext format, replaces aliases ...) */
require_once __DIR__."/include/item.php3";
require_once __DIR__."/include/event.class.php3";
require_once __DIR__."/include/validate.php3";

$err = [];       // error array (Init - just for initializing variable)

// trap field for spammer bots
if ( $answer )    {
     echo _m("Not accepted, sorry. Looks like spam.");
     exit;
}

if (ctype_digit((string)$_REQUEST['respuesta'])) {
    if (($_REQUEST['varA'] + $_REQUEST['varB']) != $_REQUEST['respuesta']) {
        // $varA + $varB must be equal to $respuesta, if provided
        echo _m("Wrong result, not posible to post comments.");
        exit;
    }
}

//$slice_id = unpack_id(GetTable2Array("SELECT slice_id FROM item WHERE id='".q_pack_id($d_item_id)."'", 'aa_first', 'slice_id'));
$slice_id = DB_AA::select1('SELECT LOWER(HEX(`slice_id`)) as usid FROM item', 'usid', [['id', $d_item_id, 'l']]);
$slice    = AA_Slice::getModule($slice_id);
if (empty($slice)) {
     echo _m("Comment to wrong item - item's slice not found.");
     exit;
}
if ($slice->getProperty('flag') & DISCUS_ADD_DISABLED) {
     echo _m("New comments disabled.");
     exit;
}

// test for spam
$discussion_fields = [
    'd_parent'         => 0,   // allowed number of 'http' substings
    'd_item_id'        => 0,
    'd_subject'        => 0,
    'd_author'         => 0,
    'd_e_mail'         => 0,
    'd_body'           => 4,
    'd_state'          => 0,
    'd_flag'           => 0,
    'd_free1'          => 4,
    'd_free2'          => 4,
    'd_url_address'    => 1,
    'd_url_description'=> 0
];
foreach ($discussion_fields as $field => $tolerance) {
    if ( IsSpamText($$field, $tolerance) ) {
        echo get_if( $slice->getProperty('_msg_spam.......'), _m("Not accepted, sorry. Looks like spam."));
        exit;
    }
}

// test if the sender IP is not blocked by special slice
$ip_address         = $_SERVER['REMOTE_ADDR'];
$ip_banned_slice_id = $slice->getProperty('_ip_banned......');
$found_evil         = false;
if ($ip_banned_slice_id) {
    $subnet_ip_address = substr($ip_address,0,strrpos($ip_address, '.'));
    $aa_set = new AA_Set($ip_banned_slice_id, new AA_Condition('ip..............', '=', "\"$ip_address\" OR \"$subnet_ip_address\""));
    $zids   = $aa_set->query();
    if ($zids AND ($zids->count() > 0)) {
        $found_evil = $zids->slice(0);
    } else {
        // try text analysis
        // test all phrases from all keywords........ fields in $ip_banned_slice_id slice
        // (keywords........ could be multi-field)

        $format  = "{@keywords........:_AA_DeLiM_}";
        $set     = new AA_Set($ip_banned_slice_id, new AA_Condition('keywords........', 'NOTNULL', '1'));
        $kw_item = GetFormattedItems($set->query(), $format);

        $teststring = join('_AA~#^', [$_REQUEST['d_author'], $_REQUEST['d_e_mail'], $_REQUEST['d_body'], $_REQUEST['d_state'], $_REQUEST['d_free1'], $_REQUEST['d_free2'], $_REQUEST['d_url_address'], $_REQUEST['d_url_description']]);
        foreach ( $kw_item as $kw_id => $kw_string ) {
            $bad_phrases = array_filter(explode('_AA_DeLiM_', $kw_string));
            foreach ($bad_phrases as $bph) {
                if (strpos($teststring,$bph) !== false) {
                    $found_evil = $kw_id;
                    break 2;
                }
            }
        }
    }
    if ($found_evil) {
        $ban_msg = $slice->getProperty('_msg_banned.....');
        if ($ban_msg) {
            $discitem = AA_Item::getItem($found_evil);
            echo $discitem ? $discitem->unalias($ban_msg) : $ban_msg;
        } else {
            echo _m("Not accepted, your IP address is banned.");
        }
        exit;
    }
}

// do not accept comments for not existing items or the items which
// are in thrash or holding bin
$SQL         = 'SELECT status_code FROM item WHERE id = \''.q_pack_id($d_item_id).'\'';
$item_status = GetTable2Array($SQL, "aa_first", 'status_code');
if ($item_status <> 1) {
    echo _m("Not accepted, item is not published or do not exist.");
    exit;
}

$new_id = new_id();

$cookie = new CookieManager();
$cookie->set('d_author',          $d_author,          60*60*24*90);   // 90 days
$cookie->set('d_e_mail',          $d_e_mail,          60*60*24*90);   // 90 days
$cookie->set('d_url_address',     $d_url_address,     60*60*24*90);   // 90 days
$cookie->set('d_url_description', $d_url_description, 60*60*24*90);   // 90 days

$catVS = new Cvarset();
$catVS->add("id",              "unpacked", $new_id);
$catVS->add("parent",          "unpacked", $d_parent);
$catVS->add("item_id",         "unpacked", $d_item_id);
$catVS->add("subject",         "quoted",   $d_subject);
$catVS->add("author",          "quoted",   $d_author);
$catVS->add("e_mail",          "quoted",   $d_e_mail);
$catVS->add("body",            "quoted",   $d_body);
$catVS->add("state",           "quoted",   $d_state);
$catVS->add("flag",            "quoted",   $d_flag);
$catVS->add("free1",           "quoted",   $d_free1);
$catVS->add("free2",           "quoted",   isset($d_free2) ? $d_free2 : quote(var_export($_COOKIE, true)));
$catVS->add("url_address",     "quoted",   $d_url_address);
$catVS->add("url_description", "quoted",   $d_url_description);
$catVS->add("date",            "quoted",   time());
$catVS->add("remote_addr",     "quoted",   $ip_address);

if (!$catVS->doInsert('discussion')) {  // not necessary - we have set the halt_on_error
    $err["DB"] .= MsgErr("Can't add discussion comment");
}

if ( !is_object($event) ) $event = new aaevent;   // not defined in scripts which do not include init
$event->comes('ITEM_NEW_COMMENT', $d_item_id, 'Item', $new_id );

send2mailList($d_item_id, $new_id);

if ($_REQUEST['send_reactions'] AND AA_Validate::doValidate($d_e_mail, 'email')) {
    AddNotification('ITEM_NEW_COMMENT', 'Item', $d_item_id, 'email', $d_e_mail);
}

// invalidate cache
$slice_id = unpack_id(GetTable2Array("SELECT slice_id FROM item WHERE id='".q_pack_id($d_item_id)."'", 'aa_first', 'slice_id'));
AA::Pagecache()->invalidateFor($slice_id);  // invalidate old cached values

updateDiscussionCount($d_item_id);        // update a count of the comments belong to the item

// special discussion setting
if ( $_REQUEST['all_ids'] ) {
    $url = str_replace('&sh_itm', "&all_ids=".$_REQUEST['all_ids'].'&sh_itm', $url);
}
go_url( $url);


