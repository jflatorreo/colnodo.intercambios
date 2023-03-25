<?php
/**  ////////////////////////////////////////////////////////////////////
 *
 *   ////////////////////////////////////////////////////////////////////
 *   INDEX to se_notify
 *   ////////////////////////////////////////////////////////////////////
 *
 *   This page has two modes:
 *     1. update mode-- when someone has filled been to this page before, and has
 *        clicked on update.
 *     2. new to page mode -- they have come to the page for the first time
 *
 *   Therefore, the code for this page has four parts
 *     I) Standard initialization and sanity checks
 *    II) if in 'update mode', do the update to the database
 *   III) prepare to write the form (select from the database)
 *    IV) write the form (HTML output)
 *
 * PHP version 7.2+
 *
 * LICENSE: This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program (LICENSE); if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @version   $Id: se_notify.php3 4308 2020-11-08 21:44:12Z honzam $
 * @author    Honza Malik <honza.malik@ecn.cz>
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Copyright (C) 1999, 2000 Association for Progressive Communications
 * @link      https://www.apc.org/ APC
 *
*/

// expects $slice_id to be set

////////////////////////////////////////////////////////////////////
// I) Standard initialization and sanity checks
////////////////////////////////////////////////////////////////////

require_once __DIR__."/../include/init_page.php3";
require_once __DIR__."/../include/formutil.php3";
require_once __DIR__."/../include/varset.php3";
/** save_notify2db function
 * @param $slice_id
 * @param $function
 * @param $emails
 */
function save_notify2db($slice_id, $function, $emails) {
    global $db;
    $p_slice_id = q_pack_id($slice_id);
    // split $notify_holding_item_e textarea into array
    $arr = explode("\n", $emails);
    foreach ($arr as $uid) {
        $uid = trim($uid);
        if ( AA_Validate::doValidate($uid, 'email')) {
            $SQL = "INSERT INTO email_notify (uid, slice_id, function) VALUES ( '$uid', '$p_slice_id', $function)";
            $db->query($SQL);
        }
    }
}

// sanity checks

if ($cancel){
    go_url( StateUrl(self_base() . "index.php3"));
}

if (! $slice_id){
    MsgPage(StateUrl(self_base())."index.php3", "error on se_notify.php3");
    exit;
}

if (!IfSlPerm(PS_EDIT)) {
    MsgPage(StateUrl(self_base())."index.php3", _m("You have not permissions to edit this slice"));
    exit;
}

// initialization of vars needed by the next 3 parts of the program

$err = [];          // error array (Init - just for initializing variable
$varset      = new Cvarset();
$superadmin  = IsSuperadmin();


////////////////////////////////////////////////////////////////////
//  II) if in 'update mode', do the update to the database
////////////////////////////////////////////////////////////////////

if ( $update ) {

  //validate input
  //  ValidateInput("name", _m("Title"), $name, $err, true, "text");

  // check to make sure we passed our validation cleanly
    if ( count($err)) {
        exit;
    }

  // if we passed our validation, change the slice records
    $up  = "notify_holding_item_s = '" .     $notify_holding_item_s . "',\n ";
    $up .= "notify_holding_item_b = '" .     $notify_holding_item_b . "',\n";
    $up .= "notify_holding_item_edit_s = '". $notify_holding_item_edit_s . "',\n";
    $up .= "notify_holding_item_edit_b = '". $notify_holding_item_edit_b . "',\n";
    $up .= "notify_active_item_s = '" .      $notify_active_item_s . "',\n";
    $up .= "notify_active_item_b = '" .      $notify_active_item_b . "',\n";
    $up .= "notify_active_item_edit_s = '" . $notify_active_item_edit_s . "',\n";
    $up .= "notify_active_item_edit_b = '" . $notify_active_item_edit_b ."' ";

    $SQL    = "UPDATE slice set $up WHERE id = '$p_slice_id'";
    $result = $db->query($SQL);

  // in email_notify

  // delete all the records in email_notify relating to this slice
  // keep a backup until our transaction has gone through.
  //   ideally we would have transaction that would roll back, but mysql
  //   does not have these transactions
    $SQL    = "delete from email_notify where slice_id = 'not_transition'";
    $result = $db->query($SQL);

    $SQL    = "update email_notify SET slice_id = 'not_transition' WHERE slice_id='$p_slice_id'";
    $result = $db->query($SQL);

  // insert all the records into email_notify

    save_notify2db($slice_id, 1, $notify_holding_item_e);
    save_notify2db($slice_id, 2, $notify_holding_item_edit_e);
    save_notify2db($slice_id, 3, $notify_active_item_e);
    save_notify2db($slice_id, 4, $notify_active_item_edit_e);

  // delete the backed-up users
    $SQL    = "DELETE FROM email_notify WHERE slice_id='not_transition'";
    $result = $db->query($SQL);

}

////////////////////////////////////////////////////////////////////
//  III) prepare to write the form (select from the database)
////////////////////////////////////////////////////////////////////

// grab variables from the table slice

$SQL= "
SELECT notify_holding_item_s,      notify_holding_item_b,
       notify_holding_item_edit_s, notify_holding_item_edit_b,
       notify_active_item_s,       notify_active_item_b,
       notify_active_item_edit_s,  notify_active_item_edit_b
 FROM slice WHERE id='".q_pack_id($slice_id)."'";
$db->query($SQL);
if ($db->next_record()) {
    RestoreVariables($db->record());
}

// grab variables from email_notify
$SQL                       = "SELECT uid, function FROM email_notify WHERE slice_id='".q_pack_id($slice_id)."'";
$notify_active_item_edit_e = $notify_active_item_e = $notify_holding_item_edit_e = $notify_holding_item_e = '';

$result = $db->query($SQL);
while ($db->next_record()) {
    switch ($db->record('function')) {
        case 1: $notify_holding_item_e      .= $db->record('uid') . "\n"; break;
        case 2: $notify_holding_item_edit_e .= $db->record('uid') . "\n"; break;
        case 3: $notify_active_item_e       .= $db->record('uid') . "\n"; break;
        case 4: $notify_active_item_edit_e  .= $db->record('uid') . "\n"; break;
    }
}

////////////////////////////////////////////////////////////////////
//   IV) write the form  (HTML output)
////////////////////////////////////////////////////////////////////

$script2run = ' 
   var opts = { lineWrapping:true, matchBrackets: true, matchTags: true, viewportMargin: 10000, mode: "htmlmixed" };
   window.cm_a1 = CodeMirror.fromTextArea(document.getElementById("notify_holding_item_b"), opts);
   window.cm_a2 = CodeMirror.fromTextArea(document.getElementById("notify_holding_item_edit_b"), opts);
   window.cm_a3 = CodeMirror.fromTextArea(document.getElementById("notify_active_item_b"), opts);
   window.cm_a4 = CodeMirror.fromTextArea(document.getElementById("notify_active_item_edit_b"), opts);
   ';

$apage = new AA_Adminpageutil('sliceadmin','notify');
$apage->setTitle(_m("Email Notifications of Events"));
$apage->addRequire('codemirror@5');
$apage->addRequire($script2run, 'AA_Req_Load');
$apage->printHead($err, $Msg);


$form_buttons = [
    "update" => ["type"=>"hidden", "value"=>"1"],
                      "update",
                      "cancel" => ["url"=>"se_fields.php3"]
];

    FrmTabCaption(_m("Email Notifications of Events"), $form_buttons);

$help = _m('E-mail is sent only if body is not empty.<br>You can use this for selective e-mails. For example: {ifset:{category........}:e-mail text}');

echo "<tr><td colspan=\"2\">". _m("<h4>New Item in Holding Bin</h4> People can be notified by email when an item is created and put into the Holding Bin.  If you want to make use of this feature, enter the recipients email address below.  In the following fields, you can customize the format of the email they will receive.") . "</td></tr>";
  FrmTextarea("notify_holding_item_e", _m("Email addresses, one per line"), $notify_holding_item_e, 3);
  FrmTextarea("notify_holding_item_s", _m("Subject of the Email message"),  $notify_holding_item_s, 2);
  FrmTextarea("notify_holding_item_b", _m("Body of the Email message"),     $notify_holding_item_b, 6, 60, false, $help);

echo "<tr><td colspan=\"2\">". _m("<h4>Item Changed in Holding Bin</h4>  People can be notified by email when an item in the Holding Bin is modified.  If you want to make use of this feature, enter the recipients email address below.  In the following fields, you can customize the format of the email they will receive.") . "</td></tr>";
  FrmTextarea("notify_holding_item_edit_e", _m("Email addresses, one per line"), $notify_holding_item_edit_e, 3);
  FrmTextarea("notify_holding_item_edit_s", _m("Subject of the Email message"),  $notify_holding_item_edit_s, 2);
  FrmTextarea("notify_holding_item_edit_b", _m("Body of the Email message"),     $notify_holding_item_edit_b, 6, 60, false, $help);

echo "<tr><td colspan=\"2\">". _m("<h4>New Item in Approved Bin</h4>  People can be notified by email when an item is created and put into the Approved Bin.  If you want to make use of this feature, enter the recipients email address below.  In the following fields, you can customize the format of the email they will receive.") . "</td></tr>";
  FrmTextarea("notify_active_item_e", _m("Email addresses, one per line"), $notify_active_item_e, 3);
  FrmTextarea("notify_active_item_s", _m("Subject of the Email message"),  $notify_active_item_s, 2);
  FrmTextarea("notify_active_item_b", _m("Body of the Email message"),     $notify_active_item_b, 6, 60, false, $help);

echo "<tr><td colspan=\"2\">". _m("<h4>Item Changed in Approved Bin</h4>  People can be notified by email when an item in the Approved Bin is modified.  If you want to make use of this feature, enter the recipients email address below.  In the following fields, you can customize the format of the email they will receive.") . "</td></tr>";
  FrmTextarea("notify_active_item_edit_e", _m("Email addresses, one per line"), $notify_active_item_edit_e, 3);
  FrmTextarea("notify_active_item_edit_s", _m("Subject of the Email message"),  $notify_active_item_edit_s, 2);
  FrmTextarea("notify_active_item_edit_b", _m("Body of the Email message"),     $notify_active_item_edit_b, 6, 60, false, $help);

  FrmTabEnd($form_buttons);

$apage->printFoot();
