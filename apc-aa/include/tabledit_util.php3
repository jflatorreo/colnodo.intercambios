<?php
/**
 * Several functions needed by the @link Tabledit class.
 * DOCUMENTATION: @link doc/tabledit.html,
 *                @link doc/tabledit_developer.html,
 *                @link doc/tableview.html
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
 * @package   TableEdit
 * @version   $Id: tabledit_util.php3 4270 2020-08-19 16:06:27Z honzam $
 * @author    Jakub Adamek, Econnect
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Copyright (c) 2002-3 Association for Progressive Communications
 * @link      https://www.apc.org/ APC
*/
require_once __DIR__."/varset.php3";

// -----------------------------------------------------------------------------------

/** ProcessFormData function
 * Processes TableEdit form data. To be called in each script using TableEdit before
 *   showing the TableEdit class.
 * @param $getTableViewsFn
 * @param $val
 * @param $cmd
 */
function ProcessFormData($getTableViewsFn, $val, &$cmd) {
    global $err, $debug, $tabledit_formdata_processed;

    if ($tabledit_formdata_processed) {
        return;
    }
    $tabledit_formdata_processed = true;

    if (!is_array($cmd)) {
        return;
    }

    foreach ($cmd as $myviewid => $com) {
        $myview = $getTableViewsFn ($myviewid, "form");
        SetColumnTypes($myview["fields"], $primary_aliases, $myview["table"], $myview["join"], false, $myview['primary']);
        foreach ($com as $command => $par) {
            switch ($command) {
            case "update":
                if (current ($par)) {
                    RunColumnFunctions($val[key($par)], $myview["fields"], $myview["table"], $myview["join"]);
                    $ok = true;
                    if (key($par) == $GLOBALS['new_key']) {
                        $ok = ProcessInsert($myviewid, $myview, $primary_aliases, $val, $cmd);
                        if ($ok) $GLOBALS["Msg"] = _m("Insert was successfull.");
                    }
                    else {
                        $ok = TableUpdate( $val[key($par)], $myview["fields"], $primary_aliases, $myview["messages"]["error_update"], $myview["triggers"]);
                        if ($ok) {
                            $GLOBALS["Msg"] = _m("Update was successfull.");
                        }
                    }
                    if (!$ok) {
                        PrintArray($err);
                        $err = "";
                    }
                }
                break;
            case "update_all":
                if ($par) {
                    $ok = true;
                    foreach ($val as $key => $vals) {
                        RunColumnFunctions($vals, $myview["fields"], $myview["table"], $myview["join"]);
                        if ($key != $GLOBALS['new_key']) {
                            $ok = $ok && TableUpdate ( $vals, $myview["fields"], $primary_aliases, $myview["messages"]["error_update"], $myview["triggers"]);
                        }
                    }
                    if (!$ok) {
                        PrintArray($err);
                        $err = "";
                    }
                    else {
                        $GLOBALS["Msg"] = _m("Update was successfull.");
                    }
                }
                break;
            case "delete_all":
                if ($com["run_delete_all"]) {
                    $ok = true;
                    foreach ($par as $key => $checked) {
                        if ( !($ok = TableDelete($myview["table"], $key, $myview["fields"], $primary_aliases, $myview["messages"]["error_delete"], $myview["triggers"]))) {
                            break;
                        }
                    }
                }
                if ($ok) {
                    $GLOBALS["Msg"] = _m("Delete was successfull.");
                }
                break;
            case "delete":
                if (TableDelete($myview["table"], key($par), $myview["fields"], $primary_aliases, $myview["messages"]["error_delete"], $myview["triggers"])) {
                    $GLOBALS["Msg"] = _m("Delete was successfull.");
                }
                break;
            default:
                break;
            }
        }
    }
    PrintArray($err);
}

// -----------------------------------------------------------------------------------

/** SetColumnTypes function
 * Enhances the column information.
 *
 * Appends ["type"] to each column, with column type.
 * Appends ["primary"] to primary columns, if not exist, adds them with ["view"]["type"]=hide.
 *
 * @param array $columns  The "fields" part of a TableView, see @link ../tableview.html
 * @param array $primary  Input array ("tablename" => array ("primary_field1", "primary_field2", ...)).
 *                        Use only for tables with more than 1 primary key.
 * @param array $primary_aliases Output array with a complete list of field aliases of primary fields
 *                       in all tables.
 * @param $default_table
 * @param $join
 * @param $default_readonly
 */
function SetColumnTypes(&$columns, &$primary_aliases, $default_table, $join="", $default_readonly=false, $primary="") {
    $primary_aliases = [];
    $tables          = [];

    // set column defaults and find all tables used in $columns
    foreach ($columns as $colname => $foo) {
        $column = &$columns[$colname];
        $column["table"]                = get_if($column["table"], $default_table);
        $column["field"]                = get_if($column["field"], $colname);
        $column["caption"]              = get_if($column["caption"], $colname);
        if (!is_array($column["view"])) {
            $column["view"] = [];
        }
        $column["view"]["readonly"]     = get_if($column["view"]["readonly"], $default_readonly || $column["view"]["type"] == "userdef" || $column["view"]["type"] == "calculated");
        if ($column["view"]["type"] == "date") {
            $cols = strlen( date($column["view"]["format"], "31.12.1970") );
        }
        if (!is_array($column["view"]["size"])) {
            $column["view"]["size"] = [];
        }
        $column["view"]["size"]["rows"] = get_if($column["view"]["size"]["rows"], 10);
        $column["view"]["html"]         = get_if($column["view"]["html"], false);
        $column["view"]["type"]         = get_if($column["view"]["type"], $column["type"]);
        if ($column["view"]["type"] == "hidden") {
            $column["view"]["type"] = "hide";
        }

        $tables[$column["table"]] = 1;
    }

    $db = getDB();
    foreach ($tables as $table => $foo) {
        // Special table name - not real name - used for not database columns
        if ( $table == 'aa_notable' ) {
            continue;    // This is not database column
        }

        $cols = $db->metadata($table);

        foreach ($cols as $col) {
            // find the column
            unset ($cprop);
            foreach ($columns as $alias => $foo) {
                if ($columns[$alias]["field"] == $col["name"] && $columns[$alias]["table"] == $table) {
                    $cprop = &$columns[$alias];
                    break;
                }
            }

            // is this column a part of join condition? if yes, it must be created
            $is_join_part = false;
            if ($join[$table]) {
                foreach ($join[$table]["joinfields"] as $join_childf) {
                    if ($join_childf == $col["name"]) {
                        $is_join_part = true;
                        break;
                    }
                }
            }

            // is it a part of the primary key?
            if ($primary && $primary[$table]) {
                $is_primary = in_array($col["name"], $primary[$table]);
            } else {
                $is_primary = (strpos($col["flags"], "primary_key")!==false);
            }
            if ($is_primary || $is_join_part) {
                // create the column if not exists
                if (!$cprop) {
                    $alias = "_".$table."_".$col["name"]."_";
                    $cprop = &$columns[$alias];
                    $cprop["table"] = $table;
                    $cprop["field"] = $col["name"];
                    $cprop["view"]["type"] = "hide";
                }
                else {
                    if ($is_join_part) {
                        echo "Define only the child (left) fields for join tables! Wrong alias: $alias";
                        exit;
                    }
                    elseif ($cprop["view"]["type"] == "ignore") {
                        echo "<h2>Column type for a primary key part must not be IGNORE.</h2>";
                        exit;
                    }
                }
                //echo "primary $table . $alias";
                if ($is_primary) {
                    $cprop["primary"] = true;
                    $primary_aliases[$table][$alias] = 1;
                }
            }
            if ($cprop) {
                $cprop["type"] = $col["type"];
                $cprop["view"]["dbtype"] = $col["type"];
            }
            if (strstr ($col["flags"], "auto_increment")) {
                $cprop["auto_increment"] = 1;
            }
            if (strstr ($col["flags"], "not_null")) {
                $cprop["not_null"] = 1;
            }

            $_cols = $col["len"] ? min (80, $col["len"]) : 80;
            $cprop["view"]["size"]["cols"] = get_if($cprop["view"]["size"]["cols"], $_cols);
        }
    }
    freeDB($db);
}

// -----------------------------------------------------------------------------------

/** TableDelete function
 * deletes one record identified by key values from given table
 * @param $table
 * @param $key
 * @param $columns
 * @param $primary_aliases
 * @param $error_msg
 * @param $triggers
 * @param $be_cautious
 * @return bool|int
 */
function TableDelete($table, $key, $columns, $primary_aliases, $error_msg="", $triggers="", $be_cautious=1) {
    global $err;
    $varset = new CVarset;
    $vals = GetKeyValues($key, $primary_aliases[$table], $columns);
    foreach ($vals as $column => $val) {
        $varset->addkey($column, "text", $val);
    }

    $db = getDB();
    if ($be_cautious) {
        $db->query($varset->makeSELECT($table));
        if ($db->num_rows() != 1) {
            $err[] = $error_msg ? $error_msg : "Error deleting from $table. ".$varset->makeSELECT($table)." returned ".$db->num_rows()." rows instead of 1.";
            freeDB($db);
            return false;
        }
    }
    if (! CallTrigger($triggers, "BeforeDelete", $varset)) {
        freeDB($db);
        return false;
    }
    $retval = $db->query($varset->makeDELETE($table));
    CallTrigger($triggers, "AfterDelete", $varset);
    freeDB($db);
    return $retval;
}

// -----------------------------------------------------------------------------------

/** TableUpdate function
 *  Updates a record.
 *
 * @param $default_table
 * @param $val
 * @param $columns
 * @param $primary_aliases
 * @param  array $primary see SetColumnTypes
 * @param $error_msg
 * @param $triggers
 * @param $be_cautios
 * @return bool - true if successfull, false if not
 */
function TableUpdate($val, $columns, $primary_aliases, $error_msg="", $triggers = "", $be_cautious=1) {
    global $err;

    if (!ProoveVals($val, $columns)) {
        return false;
    }

    // prepare varsets with primary key values
    foreach ($primary_aliases as $table => $primary) {
        $varset = new CVarset;
        AddKeyValues($varset, $val, $primary, $columns);
        $varsets[$table] = $varset;
    }

    // add non-key values
    foreach ($columns as $alias => $col) {
        if (isset ($val[$alias])) {
            $varset = &$varsets[$col["table"]];
            $value = $val[$alias];
            if (!$col["primary"]) {
                if (is_field_type_numerical($col["type"])) {
                    if ($value == "" && !$col["not_null"]) {
                        $value = "NULL";
                    }
                    $varset->add($col["field"],"number",$value);
                }
                else {
                    $varset->add($col["field"],"quoted",$value);
                }
            }
        }
    }

    $db = getDB();
    // run varsets
    foreach ($varsets as $table => $foo) {
        $varset = &$varsets[$table];
        if ($be_cautious) {
            $db->query($varset->makeSELECT ($table));
            if ($db->num_rows() != 1) {
                $err[] = $error_msg ? $error_msg : "Error in TableUpdate ".$varset->makeSELECT($table).", row count is ".$db->num_rows()." instead of 1.";
                freeDB($db);
                return false;
            }
        }
        if (! CallTrigger($triggers, "BeforeUpdate", $varset)) {
            freeDB($db);
            return false;
        }
        $db->query($varset->makeUPDATE($table));
        CallTrigger($triggers, "AfterUpdate", $varset);
    }
    freeDB($db);

    $GLOBALS["Msg"] = _m("Update was successfull.");
    return true;
}

// -----------------------------------------------------------------------------------

/** TableInsert function
 *  Inserts a record
 * @param $newkey
 * @param $where
 * @param $key_table
 * @param $val
 * @param $columns
 * @param $primary_aliases
 * @param $primary
 * @param $error_msg
 * @param $triggers
 * @param $be_cautious
 * @return string
 */
function TableInsert(&$newkey, &$where, $key_table, $val, $columns, $primary_aliases, $error_msg="", $triggers="", $be_cautious=1) {
    global $err;

    if (!ProoveVals($val, $columns)) {
        return "";
    }

    // prepare varsets with primary key values
    foreach ($primary_aliases as $table => $primary) {
        $varset = new CVarset;
        AddKeyValues($varset, $val, $primary, $columns);
        $varsets[$table] = $varset;
    }

    // add non-key values
    foreach ($columns as $alias => $col) {
        if (isset ($val[$alias])) {
            $varset = &$varsets[$col["table"]];
            $value = $val[$alias];
            if (!$col["primary"]) {
                if (is_field_type_numerical($col["type"])) {
                    if ($value == "" && !$col["not_null"]) {
                        $value = "NULL";
                    }
                    $varset->set($col["field"],$value,"number");
                }
                else {
                    $varset->set($col["field"],$value,"quoted");
                }
            }
        }
    }

    $db = getDB();
    // run varsets
    foreach ($varsets as $table => $foo ) {
        $varset   = &$varsets[$table];
        $auto_inc = false;
        foreach ($primary_aliases[$table] as $alias => $foo2) {
            if ($columns[$alias]["auto_increment"]) {
                    $auto_inc = true;
            }
        }
        if (!$auto_inc && $be_cautious) {
            $db->query($varset->makeSELECT($table));
            if ($db->num_rows() > 0) {
                $err[] = $error_msg ? $error_msg : "Error in TableInsert ".$varset->makeSELECT($table).", row count is ".$db->num_rows()." instead of 0.";
                freeDB($db);
                return "";
            }
        }
        if (! CallTrigger($triggers, "BeforeInsert", $varset)) {
            freeDB($db);
            return "";
        }
        $varset->doINSERT($table);

        CallTrigger($triggers, "AfterInsert", $varset);

        if ($table == $key_table) {
            $newkey = $auto_inc ? $db->last_insert_id() : GetKey($primary_aliases[$table], $columns, $varset);
            $where = $varset->makeWHERE($table);
        }
    }
    freeDB($db);

    $GLOBALS["Msg"] = _m("Insert was successfull.");
    return $newkey;
}

// -----------------------------------------------------------------------------------

/** ProcessInsert function
 * Processes insert
 * @param $myviewid
 * @param $myview
 * @param $primary_aliases
 * @param $val
 * @param $cmd
 * @return true on success, false on fail
 */
function ProcessInsert($myviewid, $myview, $primary_aliases, $val, &$cmd) {
    // WARNING: a bit hackish: after inserting an item, the command is changed
    TableInsert($newkey, $where, $myview["table"], $val[$GLOBALS['new_key']], $myview["fields"], $primary_aliases, $myview["messages"]["error_insert"], $myview["triggers"]);
    if ($newkey != "") {
        $cmd[$myviewid]["edit"][$newkey] = 1;
        $cmd[$myviewid]["insert"] = $where;
    } else {
        unset ($cmd[$myviewid]["insert"]);
    }
    return $newkey != "";
}

// -----------------------------------------------------------------------------------
/** RunColumnFunctions function
 * @param $val
 * @param $columns
 * @param $table
 * @param $join
 */
function RunColumnFunctions(&$val, $columns, $table, $join) {
    if (!is_array($val)) {
        return;
    }

    // change the values for appropriate column types
    foreach ( $val as $col => $value) {
        // defined in tabledit_column.php3
        ColumnFunctions($columns[$col]["view"], $val[$col], "form");
    }

    // copy values between joining fields
    if (is_array($join)) {
        foreach ( $join as $childtable => $joinprop) {
            foreach ($joinprop["joinfields"] as $masterf => $childf) {
                // find master and child field alias
                foreach ($columns as $alias => $cprop) {
                    if ($cprop["field"] == $masterf && $cprop["table"] == $table) {
                        $mastera = $alias;
                    }
                    elseif ($cprop["field"] == $childf && $cprop["table"] == $childtable) {
                        $childa = $alias;
                    }
                }
                // copy value from master to child
                $val[$childa] = $val[$mastera];
            }
        }
    }
}

// -----------------------------------------------------------------------------------
/** ProoveVals function
 * @param $val
 * @param $columns
 * @return bool
 */
function ProoveVals($val, $columns) {
    global $err;
    foreach ( $columns as $colname => $column) {
        if ($column["validate"] || $column["required"]) {
            if (!ValidateInput($colname, $colname, $val[$colname], $err, $column["required"], $column["validate"])) {
                return false;
            }
            if ($column["validate_min"] && $column["validate"] == "number") {
                if ($val[$colname] < $column["validate_min"] || $val[$colname] > $column["validate_max"]) {
                    $err[$colname] = _m("Value of %1 should be between %2 and %3.", [$colname,$column["validate_min"],$column["validate_max"]]);
                    return false;
                }
            }
        }
    }
    return true;
}

// -----------------------------------------------------------------------------------

/** GetKey function
 *  creates key string with values from key fields separated by :
 * @param $primary
 * @param $columns
 * @param $varset
 * @return string
 */
function GetKey($primary, $columns, $varset) {
    foreach ($primary as $alias => $foo) {
        $val   = $varset->get($columns[$alias]["field"]);
        $key[] = $columns[$alias]["view"]["unpacked"] ? unpack_id($val) : myspecialchars($val);
    }
    return join_escaped(":",$key,"#:");
}

/** GetKeyFromRecord function
 * @param $primary
 * @param $columns
 * @param $record
 * @return string|void
 */
function GetKeyFromRecord($primary, $columns, $record) {
    if ( !isset($primary) OR !is_array($primary)) {
        echo _m('Table do not have set primary key on single column. You can specify primary key by primary => array (field1, field2, ...) parameter for tableedit').'<br>';
        return;
    }
    foreach ($primary as $alias => $v) {
        $val   = $record[$alias];
        $key[] = ($columns[$alias]["view"]["unpacked"] ? unpack_id($val) : myspecialchars($val));
    }
    return join_escaped(":",$key,"#:");
}

// -----------------------------------------------------------------------------------

/** AddKeyValues function
 *  creates where condition from key fields values separated by :
 * Warning: send $columns processed with GetColumnTypes
 *
 * @param $varset
 * @param $val
 * @param $primary
 * @param $columns
 * @param $auto_increment ... include auto increment fields
 */
function AddKeyValues($varset, $val, $primary, $columns, $auto_increment = true)
{
    if (!is_array($primary)) {
        echo "error in AddKeyValues";
        exit;
    }

    foreach ($primary as $alias => $foo) {
        $colname = $columns[$alias]["field"];
        $value   = $val[$alias];
        if ($auto_increment || !$columns[$alias]["auto_increment"]) {
            $varset->addkey($colname, "text", $value);
        }
    }
}

// -----------------------------------------------------------------------------------
/** GetKeyValues function
 * @param $key_val
 * @param $primary
 * @param $columns
 * @return mixed
 */
function GetKeyValues($key_val, $primary, $columns) {
    $keys = split_escaped(":", $key_val, "#:");
    reset ($keys);

    foreach ($primary as $alias => $foo) {
        list (,$value) = each ($keys);
        $colname = $columns[$alias]["field"];
        if ($columns[$alias]["view"]["unpacked"]) {
            $value = pack_id($value);
        }
        $retval[$colname] = $value;
    }
    return $retval;
}

// -----------------------------------------------------------------------------------
/** CreateWhereCondition function
 * @param $key_val
 * @param $primary
 * @param $columns
 * @param $table
 * @return string
 */
function CreateWhereCondition($key_val, $primary, $columns, $table) {
    $varset = new CVarset;

    $keys = GetKeyValues($key_val, $primary, $columns);
    foreach ( $keys as $colname => $value) {
        $varset->addkey($colname, "text", $value);
    }
    return $varset->makeWHERE($table);
}

// -----------------------------------------------------------------------------------
/** PrintJavaScript_Validate function
 *
 */
function PrintJavaScript_Validate() {
    global $_javascript_validate_printed;
    if ($_javascript_validate_printed) {
        return;
    }
    $_javascript_validate_printed = 1;

    echo '
    <script>
    '
        . get_javascript_field_validation()."

        function validate_number (txtfield, minval, maxval, required) {
            if (!validate (txtfield, 'number', required))
                return false;
            var val = txtfield.value;
            var err = '';
            if (val > maxval || val < minval)
                err = '"._m("Wrong value: a number between %1 and %2 is expected.", ["'+minval+'","'+maxval+'"])."';
            if (err != '') {
                alert (err);
                txtfield.focus();
                return false;
            }
            else return true;
        }

        function confirmDelete (url) {
            if (confirm ('"._m("Are you sure you want to permanently DELETE this record?")."'))
                goto_url (url);
        }

        function goto_url (url)
        { window.location = url; }

        function exec_commit (formname, ctrlName) {
            var f=document.forms[formname];
            f[ctrlName].value=1;
            f.submit();
        }
    </script>";
}

/** GetEditedKey function
 * @param $tview
 * @return int|null|string
 */
function GetEditedKey($tview) {
    global $cmd;
    $edit = $cmd[$tview]["edit"];
    if (!is_array($edit)) {
        global $tabledit_cmd;
        $edit = $tabledit_cmd[$tview]["edit"];
        if (!is_array($edit)) { echo "Error calling GetEditedKey ($tview)"; exit; }
    }
    reset ($edit);
    return key($edit);
}

/** CallTriger function
 * @param $triggers
 * @param $event
 * @param $varset
 * @return bool
 */
function CallTrigger($triggers, $event, $varset) {
    if (is_array($triggers) && $triggers[$event]) {
        $fn = $triggers[$event];
        return $fn($varset);
    }
    return true;
}



