<?php
 /**
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
 * @version   $Id: discedit2.php3 4386 2021-03-09 14:03:45Z honzam $
 * @author    Honza Malik <honza.malik@ecn.cz>
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Copyright (C) 1999, 2000 Association for Progressive Communications
 * @link      https://www.apc.org/ APC
*/

// discedit2.php3 - admin discussion comments
// expected    $item_id for comment's item_id
//             $d_id
// optionaly   $update

require_once __DIR__."/../include/init_page.php3";
require_once __DIR__."/../include/varset.php3";

if ($cancel) {
    go_url(StateUrl(self_base() . "discedit.php3?item_id=".$item_id));
}

if (!IfSlPerm(PS_EDIT_ALL_ITEMS)) {
    MsgPage(StateUrl(self_base())."index.php3", _m("You do not have permission to edit items in this slice"));
    exit;
}

require_once __DIR__."/../include/formutil.php3";
require_once __DIR__."/../include/discussion.php3";
require_once __DIR__."/../include/item.php3";

$err = [];          // error array (Init - just for initializing variable
$varset = new Cvarset();

if ($update) {
  //update discussion table
    ValidateInput("subject", _m("Subject"), $subject, $err, true, "text");
    ValidateInput("author", _m("Author"), $author, $err, true, "text");
    ValidateInput("e_mail", _m("E-mail"), $e_mail, $err, false, "text");
    ValidateInput("body", _m("Text of discussion comment"), $body, $err, false, "text");
    ValidateInput("url_address", _m("Authors's WWW  - URL"), $url_address, $err, false, "url");
    ValidateInput("url_description", _m("Authors's WWW - description"), $url_description, $err, false, "text");
    ValidateInput("remote_addr", _m("Remote address"), $remote_addr, $err, true, "text");
    ValidateInput("free1", _m("Free1"), $free1, $err, false, "text");
    ValidateInput("free2", _m("Tracking"), $free2, $err, false, "text");

    $datectrl = new datectrl('date');
    $datectrl->update();                   // updates datectrl
    $date     = $datectrl->get_date();


    if (!count($err)) {
        $varset->add("subject", "quoted", $subject);
        $varset->add("author", "quoted", $author);
        $varset->add("e_mail", "quoted", $e_mail);
        $varset->add("body", "quoted", $body);
        $varset->add("date", "quoted", $date);
        $varset->add("url_address", "quoted", $url_address);
        $varset->add("url_description", "quoted", $url_description);
        $varset->add("remote_addr", "quoted", $remote_addr);
        $varset->add("free1", "quoted", $free1);
        $varset->add("free2", "quoted", $free2);

        $SQL = "UPDATE discussion SET ". $varset->makeUPDATE() . " WHERE id='" .q_pack_id($d_id)."'";
        $db->query($SQL);

        AA::Pagecache()->invalidateFor($slice_id);  // invalidate old cached values

        go_url(StateUrl(self_base() . "discedit.php3?item_id=".$item_id));
    }
}

// set variables from table discussion
$SQL= " SELECT * FROM discussion WHERE id='".q_pack_id($d_id)."'";
$db->query($SQL);
if ($db->next_record()) {
    RestoreVariables($db->record());
}

$apage = new AA_Adminpageutil();
$apage->setTitle(_m("Items managment - Discussion comments managment - Edit comment"));
$apage->setForm(['action' => "?d_id=$d_id"]);
$apage->printHead($err, $Msg);
?>

<table border="0" cellspacing="0" cellpadding="1" bgcolor="<?php echo COLOR_TABTITBG ?>" align="center">
<tr><td class="tabtit"><b>&nbsp;<?php echo _m("Edit comment") ?></b></td></tr>
<tr><td>
<table width="540" border="0" cellspacing="0" cellpadding="4" bgcolor="<?php echo COLOR_TABBG ?>">
<?php
    FrmStaticText("id", $d_id);
    FrmInputText("subject",_m("Subject"), $subject, 99, 50, true);
    FrmInputText("author",_m("Author"), $author, 60, 25, true);
    FrmInputText("e_mail",_m("E-mail"), $e_mail, 60, 25, false);
    FrmTextarea("body", _m("Text of discussion comment"), $body, 10, 40, false);
    FrmDate("date", _m('Date'), $date, false, '', '', true);
    FrmInputText("url_address",_m("Authors's WWW  - URL"), $url_address, 99, 50, false);
    FrmInputText("url_description", _m("Authors's WWW - description"), $url_description, 60, 25, false);
    FrmInputText("remote_addr",_m("Remote address"), $remote_addr, 60, 25, false);
    FrmTextarea("free1", _m("Free 1"), $free1, 5, 40, false);
    FrmTextarea("free2", _m("Tracking"), $free2, 5, 40, false);
?>
</table>
<tr><td align="center">
<?php
    echo "<input type=\"hidden\" name=\"d_id\" value=".$d_id.">";
    echo "<input type=\"hidden\" name=\"item_id\" value=".unpack_id($item_id).">";
    echo "<input type=\"submit\" name=\"update\" value=". _m("Update") .">&nbsp;&nbsp;";
    echo "<input type=\"reset\" value=". _m("Reset form") .">&nbsp;&nbsp;";
    echo "<input type=\"submit\" name=\"cancel\" value=". _m("Cancel") .">";
?>
</td></tr></table>
<?php
$apage->printFoot();

