<?php
//$Id: index.php3 4386 2021-03-09 14:03:45Z honzam $
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
// APC AA site Module main administration page

// used in initpage.php3 script to include config.php3 from the right directory

use AA\IO\DB\DB_AA;

require_once __DIR__."/../../include/init_page.php3";
require_once __DIR__."/../../include/varset.php3";
require_once __DIR__."/../../include/formutil.php3";

require_once __DIR__."/../../modules/site/util.php3";   // module specific utils
require_once __DIR__."/../../modules/site/sitetree.php3";   // module specific utils

// ----------------- function definition end -----------------------------------

$module_id   = $slice_id;
$p_module_id = q_pack_id($module_id);

if ( !($module = AA_Module_Site::getModule($module_id)) ) {
    MsgErr(_m("Site module not found"));
    page_close();
    exit;
}

// r_spot_id holds current position in the tree
if (!isset($r_spot_id)) {
    $r_spot_id = 1;
    //  $sess->register(r_spot_id);   // Don't use a session variable, its page dependent
}

if ( !IfSlPerm(PS_MODW_EDIT_CODE) ) {
    MsgPage(StateUrl(self_base())."index.php3", _m("You do not have permission to edit items in this slice"));
    exit;
}

// form send us spot id (prevents 'Back' browser problems, ...)
if (isset($spot_id)) {
    $r_spot_id = $spot_id;
}

// switch to another spot, if the spot is in this site
if (isset($go_sid)) {
    $r_spot_id = $go_sid;
}

if (!($tree = $module->getTree())) {
    MsgErr(_m("Starting spot not found"));
    page_close();
    exit;
}

//  try
/*
$tree->addInSequence( 0, 'second' );
$tree->addVariable( 1, 'x' );
$tree->addChoice( 1, 'choice 1' );
$tree->addInSequence( 0, 'third' );
$tree->addInSequence( 2, 'quatro' );
*/

if ($debug) print("<p>Action=$akce; r_spot_id=$r_spot_id</p>");

switch( $akce ) {
    case 's': $tree->addInSequence( $r_spot_id, 'spot' ); break;  // Add Spot
    case 'c': $tree->addChoice($r_spot_id, 'option');   break;  // Add Choice
    case 'r': $parent = $tree->get( 'parent', $r_spot_id );       // Remove
              if ($priorsib = $tree->removeSpot($r_spot_id)) {
                  $r_spot_id = $priorsib; // was set to $parent;
              }
              break;
    case 'u': $tree->move(          $r_spot_id, 'moveUp' );    break;  // Up
    case 'd': $tree->move(          $r_spot_id, 'moveDown' );  break;  // Down
    case 'l': $tree->moveLeftRight( $r_spot_id, 'moveLeft' );  break;  // Left
    case 'a': $tree->moveLeftRight( $r_spot_id, 'moveRight' ); break;  // Right

    case 'h': $tree->setFlag($r_spot_id, AA_Module_Site::FLAG_DISABLE);   break;  // Hide
    case 'e': $tree->clearFlag($r_spot_id, AA_Module_Site::FLAG_DISABLE); break;  // Disable

    case 'p': $tree->setFlag($r_spot_id, AA_Module_Site::FLAG_COLLAPSE);   break;  // Collapse
    case 'm': $tree->clearFlag($r_spot_id, AA_Module_Site::FLAG_COLLAPSE); break;  // Expand
}


if ($addcond) {
    $tree->addCondition($r_spot_id, $addcondvar, $addcond, $addcondop);
} elseif ($addvar) {
    $tree->addVariable($r_spot_id, $addvar);
} elseif ($delvar) {
    $tree->removeVariable($r_spot_id, $delvar);
} elseif ($delcond) {
    $tree->removeCondition($r_spot_id, $delcond);
} elseif ($content OR $name) {
    $varset     = new CVarset();
    $varset->add("content", "quoted", $content);

    $db_id = DB_AA::select1('id', 'SELECT `id` FROM `site_spot`', [
        ['site_id', $module_id, 'l'],
        ['spot_id', $r_spot_id]
    ]);
    if ($db_id) {
        $varset->addkey("id", "number", $db_id);
        $varset->doUpdate('site_spot', null, "S.$db_id");
    } else {
        $varset->add("site_id", "unpacked", $module_id);
        $varset->add("spot_id", "number", $r_spot_id);
        $varset->doInsert('site_spot');
    }

    // $SQL = "SELECT id FROM site_spot WHERE site_id='$p_module_id' AND spot_id='$r_spot_id'";
    // $db->query($SQL);
    // $SQL = ($db->next_record() ?
    //        "UPDATE site_spot SET content='$content' WHERE id='". $db->f('id') ."'" :
    //        "INSERT INTO site_spot (site_id, spot_id, content) VALUES ('$p_module_id', '$r_spot_id', '$content')");
    // $db->query($SQL);

    if ($name) {  // do not change to empty
        $tree->set('name', $r_spot_id, $name);
    }
}

// This is only run with a hand-coded URL to clean out the site
// and remove corruption, ideally should fix the cause of the corruption!
// - Mitra
if ($sitefix) {
    $tree->walkTree($apc_state, 1, 'ModW_DoNothing', 'all');
}

if ($addcond OR $delcond OR $content OR $name OR $akce) {
    AA::Pagecache()->invalidateFor($module_id);  // invalidate old cached values
}

if ($addcond OR $delcond OR $content OR $name OR $akce OR $sitefix OR $addvar OR $delvar) {
    $module->saveTree($tree, $akce=='r');  // delete unused spots after we delete one spot
}

$apage = new AA_Adminpageutil('codemanager');
$apage->setModuleMenu( 'modules/site');
$apage->setTitle( _m("Editor window - site code manager") );
$apage->addRequire('codemirror@5');
$apage->addRequire('aa-jslib');   // {htmltoggle in helpbox}
$apage->addRequire(get_aa_url('javascript/js_lib.min.js?v='.AA_JS_VERSION, '', false ));

$script2run = ' 
   var opts = { lineWrapping:true, matchBrackets: true, matchTags: true, viewportMargin: 10000, mode: "htmlmixed" };
   window.cm_a1 = CodeMirror.fromTextArea(document.getElementById("content"), opts);
   ';

$apage->addRequire($script2run, 'AA_Req_Load');
$apage->setForm();
$apage->printHead($err, $Msg);

// echo "<style>.CodeMirror { min-height: 500px; } </style>";

function Links_PrintActionLink($r_spot_id, $action, $text, $img, $link=null) {
    if (!$link) {
        $link  = SiteAdminPage($r_spot_id, "akce=$action");
    }
    $image = GetModuleImage('site', $img, '', 16, 12);
    return "<a href=\"$link\">$image</a>&nbsp;<a href=\"$link\">$text</a>";
}

echo '<table border=0 cellspacing=0 class=login width="98%"><tr><td id="sitetree">
      <br>
      <table border=0 cellspacing=0 align="center">
        <tr>
          <td>'. Links_PrintActionLink($r_spot_id, 's', _m("Add&nbsp;spot"), 'add_spot.gif') .'</td>
          <td>&nbsp;'. Links_PrintActionLink($r_spot_id, 'c', _m("Add&nbsp;choice"), 'add_choice.gif') .'</td>
        </tr>
        <tr>
          <td>'. Links_PrintActionLink($r_spot_id, 'u', _m("Move&nbsp;up"), 'up.gif') .'</td>
          <td>&nbsp;'. Links_PrintActionLink($r_spot_id, 'd', _m("Move&nbsp;down"), 'down.gif') .'</td>
        </tr>
        <tr>
          <td>'. Links_PrintActionLink($r_spot_id, 'l', _m("Move&nbsp;left"), 'left.gif') .'</td>
          <td>&nbsp;'. Links_PrintActionLink($r_spot_id, 'a', _m("Move&nbsp;right"), 'right.gif') .'</td>
        </tr>
        <tr>
          <td>'. Links_PrintActionLink($r_spot_id, 'r', _m("Delete"), 'delete.gif', 'javascript:GoIfConfirmed(\''. SiteAdminPage($r_spot_id, "akce=r").'\', \''.
                                            _m("Are you sure you want to delete the spot?") .'\')') .'</td>
          <td>&nbsp;'.
          (($tree->get('flag', $r_spot_id) & AA_Module_Site::FLAG_DISABLE) ?
              Links_PrintActionLink($r_spot_id, 'e', _m("Enable"), 'enabled.gif') :
              Links_PrintActionLink($r_spot_id, 'h', _m("Disable"), 'disabled.gif'))
              .'</td>
        </tr>
      </table>
      <br>';

// callback functions
$functions = [
    'spot'          => 'ModW_PrintSpotName_Start',
                    'before_choice' => 'ModW_PrintChoice_Start',
                    'after_choice'  => 'ModW_PrintChoice_End'
];

$tree->walkTree($apc_state, 1, $functions, 'collapsed', 0);

echo '</td><td valign="top">';

$module->showSpot($tree, $r_spot_id);

$apage->addHelpbox(_m('Possible system requires - &lcub;require:...&rcub; or &lcub;require:["...","..."]&rcub;'), '{htmltoggle::::'.GetHtmlTable(AA_Requires::getAvailableLibs(),'th').'}');
$apage->printHelpbox();

echo '</td></tr></table>';


$apage->printFoot();
