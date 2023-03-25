<?php
/**
 * This script allows to change a field ID in hopefully all tables where it occurs.
 *
 *  The array maintain_fields contains database fields to be checked. All such fields
 *  are downloaded from database, the old ID occuring anywhere in them is changed to the
 *  new one and the fields are uploaded back.
 *
 *  Some texts cannot be described in this easy way, so maintain_sql may contain other
 *  SQL commands. You may use the :old_id: and :new_id: strings which will be replaced by the old / new ids.
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
 * @version   $Id: se_fieldid.php3 4386 2021-03-09 14:03:45Z honzam $
 * @author    Jakub Adamek, May 2002
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Copyright (C) 1999, 2000 Association for Progressive Communications
 * @link      https://www.apc.org/ APC
 *
*/


use AA\IO\DB\DB_AA;

require_once __DIR__."/../include/init_page.php3";
require_once __DIR__."/../include/formutil.php3";
require_once __DIR__."/../include/varset.php3";
require_once __DIR__."/../include/msgpage.php3";
require_once __DIR__."/../include/util.php3"; // tryquery

set_time_limit(600);

//$debug = 1;

$reserved_ids = [
  "disc_app........",
  "disc_count......",
  "display_count...",
  "edited_by.......",
  "expiry_date.....",
  "flags...........",
  "highlight.......",
  "last_edit.......",
  "posted_by.......",
  "post_date.......",
  "publish_date....",
  "slice_id........",
  "status_code....."
];

$maintain_fields = [
    "slice" => [
            "primary" => "id",  // primary key
            "primary_type" => "text", // key type (text / number)
            "slice_id" => "id", // slice_id key
            "fields" => [     // fields to be changed
                "fulltext_format_top",
                "fulltext_format",
                "fulltext_format_bottom",
                "odd_row_format",
                "even_row_format",
                "compact_top",
                "compact_bottom",
                "category_top",
                "category_format",
                "category_bottom",
                "admin_format_top",
                "admin_format",
                "admin_format_bottom",
                "aditional",
                "javascript"
            ]
    ],
    "field" => [
            "primary_part" => "id", // the whole key is (id,slice_id)
            "primary_type" => "text",
            "slice_id" => "slice_id",
            "fields" => [
                "id",
                "alias1_func",
                "alias2_func",
                "alias3_func"
            ]
    ],
    "view" => [
            "primary" => "id",
            "primary_type" => "number",
            "slice_id" => "slice_id",
            "fields" => [
                "before",
                "even",
                "odd",
                "after",
                "group_title",
                "order1",
                "order2",
                "group_by1",
                "group_by2",
                "cond1field",
                "cond2field",
                "cond3field",
                "aditional",
                "aditional2",
                "aditional3",
                "aditional4",
                "aditional5",
                "aditional6",
                "group_bottom",
                "field1",
                "field2",
                "field3"
            ]
    ]
];

$xslice_id = xpack_id($slice_id);

$maintain_sql = [
    "UPDATE feedmap SET to_field_id=':new_id:' WHERE to_field_id=':old_id:' AND to_slice_id = $xslice_id" ,
    "UPDATE feedmap SET from_field_id=':new_id:' WHERE from_field_id=':old_id:' AND from_slice_id = $xslice_id"
];


if ($cancel) {
    go_url( StateUrl(self_base() . "index.php3"));
}


if (!IfSlPerm(PS_FIELDS)) {
    MsgPageMenu(StateUrl(self_base())."index.php3", _m("You have not permissions to change fields settings"), "admin");
    exit;
}

$err = [];          // error array (Init - just for initializing variable
$varset = new Cvarset();

/** ChangefieldID function
 * @param $old_id
 * @param $new_id
 */
function ChangeFieldID($old_id, $new_id)
{
    global $maintain_fields, $maintain_sql, $xslice_id;

    $varset = new Cvarset();
    foreach ( $maintain_fields as $table => $settings) {
        $keyfield = $settings['primary'];
        if (!$keyfield) {
            $keyfield = $settings['primary_part'];
        }
        $SQL = "SELECT `$keyfield`, `".join($settings['fields'],"`, `")."` FROM `$table`
                WHERE ".$settings['slice_id']." = $xslice_id";
        $rows = GetTable2Array ($SQL);
        if (is_array($rows)) {
            foreach ($rows as $row) {
                $varset->clear();
                foreach ($settings['fields'] as $field) {
                    $cont = $row[$field];
                    if (strstr($cont, $old_id)) {
                        $cont = str_replace($old_id, $new_id, $cont);
                        $varset->set($field, $cont, "text");
                    }
                }
                if ($varset->vars) {
                    $SQL = "UPDATE $table SET ".$varset->makeUPDATE();
                    $SQL .= " WHERE $keyfield = ";
                    if ($settings['primary_type'] == "text") {
                        $SQL .= "'".$row[$keyfield]."'";
                    } else {
                        $SQL .= $row[$keyfield];
                    }
                    if ($settings['primary_part']) {
                        $SQL .= " AND ". $settings["slice_id"]." = $xslice_id";
                    }
                    DB_AA::sql($SQL);
                }
            }
        }
    }

    foreach ($maintain_sql as $sql) {
        $sql = str_replace(":old_id:", $old_id, $sql);
        $sql = str_replace(":new_id:", $new_id, $sql);
        DB_AA::sql($sql);
    }

    // replace the field id in table content
    $db = getDB();
    $db->query("SELECT id FROM item WHERE slice_id=$xslice_id");
    while ($db->next_record()) {
        $item_ids[] = quote($db->f("id"));
    }
    freeDB($db);
    if (count($item_ids)) {
        DB_AA::sql("UPDATE content SET field_id='$new_id' WHERE item_id IN ('".join($item_ids,"','")."') AND field_id='$old_id'");
    }
}

if ($update && $new_id_text && $slice_id) {
    $nchanges = 0;
    if (strlen($new_id_text) + strlen($new_id_number) <= 16) {
        $new_id = $new_id_text;
        for ( $i=0, $ino = 16-strlen($new_id_text)-strlen($new_id_number); $i<$ino; ++$i) {
            $new_id .= ".";
        }
        $new_id .= $new_id_number;
        if ($old_id != $new_id && strlen ($new_id) == 16) {
            if (in_array($new_id, $reserved_ids)) {
                $err[] = _m("This ID is reserved")." ($new_id).";
            } else {
                // proove the field does not exist
                $db = getDB();
                $db->query("SELECT id FROM field WHERE slice_id=$xslice_id AND id='$new_id'");
                if ($db->next_record()) {
                    $err[] = _m("This ID is already used")." ($new_id).";
                }
                freeDB($db);
            }
            if (!count($err)) {
                ++$nchanges;
                ChangeFieldID($old_id, $new_id);
            }
        }
    }
}

// lookup source fields
$s_fields = AA_Fields::getFields4Select($slice_id, 'all', 'id');
// lookup destination fields
$d_fields = AA_Fields::getFields4Select(unpack_id('AA_Core_Fields..'), 'all', 'id');


$apage = new AA_Adminpageutil('sliceadmin','field_ids');
$apage->setTitle(_m("Admin - change Field IDs"));
$apage->printHead($err, $Msg);

if ($update) {
    echo "$nchanges "._m("field IDs were changed").".<br>";
}

FrmTabCaption(_m("Admin - change Field IDs"));

echo"<tr><td class=\"tabtxt\">"._m("This page allows to change field IDs. It is a bit dangerous operation and may last long.\n    You need to do it only in special cases, like using search form for multiple slices. <br><br>\n    Choose a field ID to be changed and the new name and number, the dots ..... will be\n    added automatically.<br>")."</td></tr>
<tr><td class=\"tabtxt\" align=\"center\"><br>"._m("Change from").": <select name='old_id'>";
$slice_fields = false;
foreach ($s_fields as $fid => $fname) {
    if (!in_array($fid, $reserved_ids)) {
        if ( AA_Fields::isSliceField($fid)) {
            $slice_fields = true;
        }
        echo "<option value='$fid'>$fid";
    }
}
echo "</select> ";

echo _m("to")." <select name='new_id_text'>";
foreach ($d_fields as $fid => $fname) {
    echo "<option value=\"$fid\">$fid</option>";
}
// if we use also slice setting fields in this slice, then we should generate
// it also as proposal for renaming
if ($slice_fields) {
    // once again, but with underscore before field - so it is "slice field"
    foreach ($d_fields as $fid => $fname) {
        echo "<option value=\"_$fid\">_$fid</option>";
    }
}

echo "</select> <select name='new_id_number'>
<option value='.'>.";
for ($i = 1; $i <= 9999; ++$i) {
    echo "<option>$i</option>";
}
echo "</select><br><br>";
FrmTabSeparator(_m("Fields"), [
    "update" => ["type" => "hidden", "value" => "1"],
    "update",
    "cancel" => ["url" => "se_fields.php3"]
], $slice_id);
/*
    <input type=hidden name=\"update\" value=1>
    <input type=submit name=update value='". _m("Update") ."'>&nbsp;&nbsp;
    <input type=submit name=cancel value='". _m("Cancel") ."'>
    </td></tr></table>";
<br>
<table border="0" cellspacing="0" cellpadding="1" bgcolor="<?php echo COLOR_TABTITBG ?>" align="center">
<tr height=10><td class=tabtxt colspan=2></td></tr>
*/
?>
<tr>
 <td class="tabtxt" align="left"><b>&nbsp;&nbsp;<?php echo _m("Id") ?></b></td>
 <td class="tabtxt" align="left"><b>&nbsp;&nbsp;<?php echo _m("Field") ?></b></td>
</tr>
<tr><td colspan="2" class="tabtxt"><hr></td></tr>
<?php
    foreach ($s_fields as $fid => $fname) {
        if (!in_array($fid, $reserved_ids)) {
            echo "
            <tr>
            <td class=\"tabtxt\" align=\"left\">&nbsp;&nbsp;$fid&nbsp;&nbsp;</td>
            <td class=\"tabtxt\">&nbsp;&nbsp;<b>$fname&nbsp;&nbsp;</b></td></tr>";
        }
    }
FrmTabEnd();

$apage->printFoot();
