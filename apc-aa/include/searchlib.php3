<?php
/**
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
 * @version   $Id: searchlib.php3 4409 2021-03-12 13:43:41Z honzam $
 * @author    Honza Malik <honza.malik@ecn.cz>
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Copyright (C) 1999, 2000 Association for Progressive Communications
 * @link      https://www.apc.org/ APC
*/

use AA\IO\DB\DB_AA;

require_once __DIR__."/sql_parser.php3";
require_once __DIR__."/zids.php3";

//define('AA_REGEXP_MAIL', '[a-z0-9!#$%&1*+/=?^_`{|}~-]+(?:.[a-z0-9!#$%&1*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?.)+(?:[A-Z]{2}|com|org|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|museum)');
define('AA_REGEXP_MAIL', '(?:[a-z0-9!#$%&\'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])');

class AA_Operators {

    /// Static ///
    /** getEnum function
     *
     */
    static function getEnum() {
        return [
            'enum', [
                'LIKE'      => _m('contains'),
                                   'CONTAIN'   => _m('contains'),        // CONTAIN and BEGIN are like LIKE and RLIKE, but:
                                   'BEGIN'     => _m('begins with'),     //    - do not stripslashes
                                                                         //    - *, ? and also _, %, ' and " treats as normal characters
                                                                         //    - do not allow OR, AND, NOT
                                   'RLIKE'     => _m('begins with'),
                                   'LLIKE'     => _m('LLIKE'),
                                   'XLIKE'     => _m('XLIKE'),
                                   'BETWEEN'   => _m('BETWEEN'),
                                   'BITSET'    => _m('bit is set'),      //  d-highlight.......-BITSET-128
                                   'ISNULL'    => _m('not set'),
                                   'NOTNULL'   => _m('is set'),
                                   'ISMAIL'    => _m('is e-mail'),
                                   'NOTMAIL'   => _m('not e-mail'),
                                   'REGEXP'    => _m('match (RegExp)'),
                                   'NOTREGEXP' => _m('not match (RegExp)'),
                                   '=='        => '==',         // exact match - no SQL parsing
                                   '='         => '=',
                                   '<'         => '<',
                                   '>'         => '>',
                                   '<>'        => '<>',
                                   '!='        => '<>',
                                   '<='        => '<=',
                                   '>='        => '>=',
                                   'd:<'       => 'd:<',
                                   'd:>'       => 'd:>',
                                   'd:<='      => 'd:<=',
                                   'd:>='      => 'd:>=',
                                   'd:='       => 'd:=',
                                   'd:!='      => 'd:!=',
                                   'd:<>'      => 'd:<>',
                                   'e:<'       => 'e:<',
                                   'e:>'       => 'e:>',
                                   'e:<='      => 'e:<=',
                                   'e:>='      => 'e:>=',
                                   'e:='       => 'e:=',
                                   'e:!='      => 'e:!=',
                                   'e:<>'      => 'e:<>',
                                   'm:<'       => 'm:<',
                                   'm:>'       => 'm:>',
                                   'm:<='      => 'm:<=',
                                   'm:>='      => 'm:>=',
                                   'm:='       => 'm:=',
                                   'm:!='      => 'm:!=',
                                   'm:<>'      => 'm:<>',
                                   '-:<'       => '-:<',
                                   '-:>'       => '-:>',
                                   '-:<='      => '-:<=',
                                   '-:>='      => '-:>=',
                                   '-:='       => '-:=',
                                   '-:!='      => '-:!=',
                                   '-:<>'      => '-:<>',
            ]
        ];
    }
    /** getJsDefinition function
     *
     */
    static function getJsDefinition() {
        return '
            var operator_names  = new Array();
            var operator_values = new Array();
            // text
            operator_names[0]  = new Array(" '._m('contains').' "," '._m('begins with').' ", " '._m('is').' ", " '._m('is not').' ", " '._m('not set').' ", " '._m('is set').' ", " '._m('match (RegExp)').' ", " '._m('not match (RegExp)').' ", " '._m('is e-mail').' ", " '._m('not e-mail').' ");
            operator_values[0] = new Array(       "LIKE"         ,       "RLIKE"           ,        "=",                "<>",               "ISNULL",              "NOTNULL",              "REGEXP",                    "NOTREGEXP",                       "ISMAIL",               "NOTMAIL");
            // numeric
            operator_names[1]  = new Array(" = "," < "," > ", " <> ", " '._m('not set').' ", " '._m('is set').' ");
            operator_values[1] = new Array( "=" , "<" , ">" ,  "<>",          "ISNULL",             "NOTNULL");
            // date
            operator_names[2]  = new Array(" < (m/d/y)"," > (m/d/y)", " '._m('not set').' ", " '._m('is set').' ", " = (timestamp) "," < (timestamp) "," > (timestamp) ", " <> (timestamp) ");
            operator_values[2] = new Array("d:<","d:>",         "ISNULL",             "NOTNULL"    ,  "=" ,              "<" ,            ">" ,         "<>" );
            // constants
            operator_names[3]  = new Array(" '._m('contains').' "," '._m('begins with').' ", " '._m('is').' "," '._m('is not').' ",  " '._m('not set').' ", " '._m('is set').' ", " '._m('match (RegExp)').' ", " '._m('not match (RegExp)').' ", " '._m("select ...").' ");
            operator_values[3] = new Array(       "LIKE"         ,       "RLIKE"           ,        "="      ,         "<>",                 "ISNULL"     ,        "NOTNULL",                "REGEXP",                    "NOTREGEXP",                    "select");
            // numconstants
            operator_names[4]  = new Array(" = "," < "," > ", " <> ", " '._m('not set').' ", " '._m('is set').' ", " '._m("select ...").' ");
            operator_values[4] = new Array( "=" , "<" , ">" ,  "<>",          "ISNULL",             "NOTNULL",            "select");
            ';
    }
}

class AA_Condition extends AA_Object {

    var $fields;    // (array)
    var $operator;
    var $value;


    /// Static ///

    /** getClassProperties function of AA_Serializable
     *  Used parameter format (in fields.input_show_func table)
     * @return array
     */
    static function getClassProperties(): array {
        return [                   //  id            name         type      multi  persistent validator, required, help,                                         morehelp, example
            /** Array of compared fields */
            'fields'   => new AA_Property( 'fields',   _m("Fields"),   'text',  true,  true, 'field' ),
            /** Condition operator like 'CONTAIN', 'BEGIN', '=', '<>', '<', '>' ... */
            'operator' => new AA_Property( 'operator', _m("Operator"), 'text',  false, true, AA_Operators::getEnum() ),
             /** Compared value */
            'value'    => new AA_Property( 'value',    _m("Value"),    'text',  false, true, 'text' )
        ];
    }

    /** AA_Condition function
     *   The parameters are optional, because we are storing AA_Condition
     *  to the session (with AA_Search_Row) and phplib session management uses
     *  constructors with none parameters
     * @param $fields
     * @param $operator
     * @param $value
     */
    function __construct($fields=null, $operator=null, $value=null) {
        $this->fields    = (array)$fields;
        $this->operator  = $operator;
        $this->value     = $value;
    }

    /** getFields function
     *  Access function to condition field
     */
    function getFields() {
        return $this->fields;
    }

    /** getOperator function
     * Access function to condition operator
     */
    function getOperator() {
        return $this->operator;
    }

    /** getValue function
     *  Access function to condition value
     */
    function getValue() {
        return $this->value;
    }

    /** getArray function
     *  @return array - clasic $conds array - array('operator'  => ..,
     *                                      'value'     => ..,
     *                                      <field_1>   => 1
     *                                      [,<field_n> => 1])
     *  Mainly for backward compatibility with old - array approach
     */
    function getArray() {
        $ret = ['value'=> $this->value, 'operator' => $this->operator];
        foreach ($this->fields as $cond_field) {
            $ret[$cond_field] = 1;
        }
        return $ret;
    }

    /** getAsString function
     * @param $condition_number
     * @return string conditions in short form  headline........-RLIKE-Action...
     */
    function getAsString($condition_number=0) {
        $val = str_replace('-','--',$this->value);
        if ($val[0]=='-') {  // we do not want triple --- like in: expiry_date.....-m:<- --432000
            $val = " $val";
        }
        return join(',',$this->fields) .'-'. $this->operator .'-'. $val; // StrExpand('AA_Stringexpand_Conds', array($this->value, '1'));  - does not work for B OR C, ...
    }

    /** getAsLongString function
     * @param $condition_number
     * @return string conditions in long form  conds[0][operator]=BEGIN&conds[0][headline........]=1&conds[0][value]=Action...
     */
    function getAsLongString($condition_number=0) {
        $ret = [];
        foreach ($this->fields as $cond_field) {
            $ret[] = "conds[$condition_number][$cond_field]=1";
        }
        $ret[] = "conds[$condition_number][operator]=". $this->operator;
        $ret[] = "conds[$condition_number][value]=".    $this->value;
        return join('&', $ret);
    }


    /** create whole phrase from the text
     *  Puts the expression in the quotes, so it becames phrase
     *  Example:   I say: "Hola..."    ->    "I say: \"Hola\"..."
     */
    static public function makePhrase($text) {
        return '"'. str_replace('"', '\"', $text). '"';
    }

    /** matches function
     * @param $itemcontent
     * @return bool
     */
    function matches($itemcontent) {
        foreach ($this->fields as $field) {
            foreach ($itemcontent->getValues($field) as $val) {
                if ( $this->_compare($val['value']) ) {
                    // any match is sufficient
                    return true;
                }
            }
        }
        return false;
    }

    /** _compare function
     *  Postfiltering, when the item (field value) is already loaded
     * @param $field_value
     * @return bool
     */
    function _compare($field_value) {
        switch( $this->operator ) {
            case 'CONTAIN':
            case 'LIKE':
            case 'XLIKE':      return (strpos($field_value, $this->value) === false) ? false : true;
            case 'BEGIN':
            case 'RLIKE':      return (strpos($field_value, $this->value) === 0)     ? true  : false;
            case 'LLIKE':      return  strpos($field_value, $this->value) == (strlen($field_value)-strlen($this->value));
            case 'REGEXP':     return  preg_match('/'. str_replace('/', '\/', $this->value) .'/', $field_value);
            case 'NOTREGEXP':  return !preg_match('/'. str_replace('/', '\/', $this->value) .'/', $field_value);
            case 'ISMAIL':     return  preg_match('/'. str_replace('/', '\/', AA_REGEXP_MAIL) .'/', $field_value);
            case 'NOTMAIL':    return !preg_match('/'. str_replace('/', '\/', AA_REGEXP_MAIL) .'/', $field_value);
            case 'BETWEEN':
                $arr = explode( ",", $this->value );
                return (((int)$field_value >= (int)$arr[0]) AND ((int)$field_value <= (int)$arr[1]));
            case 'ISNULL':  return ($field_value == '');
            case 'NOTNULL': return ($field_value <> '');
            case '==' :                                           // exact match - no SQL parsing
            case '='  :     return $field_value == $this->value;
            case '<>' :     return $field_value != $this->value;
            case '!=' :     return $field_value != $this->value;
            case '<=' :     return $field_value <= $this->value;
            case '<'  :     return $field_value <  $this->value;
            case '>=' :     return $field_value >= $this->value;
            case '>'  :     return $field_value >  $this->value;
//          case '<=>':  //MySQL know this operator, but we do not use it in AA
        }
        return false;
    }
}


/** Stores one sorting order
 *  The order is stored in the array like array('category........' => d)
 *  It is also possible to specify "group limit" (maximum number of items
 *  of each group. In such case the array looks like:
 *     array( 'limit' => 4, 'category........' => d )
 */
class AA_Sortorder extends AA_Object {

    protected $field;
    protected $desc;    // 0|1  - direction ASCENDING, DESC
    protected $limit;   // number

    /// Static ///

    /** getClassProperties function of AA_Serializable
     *  Used parameter format (in fields.input_show_func table)
     * @return array
     */
    static function getClassProperties(): array {
        return [                   //  id            name         type      multi  persistent validator, required, help,                                         morehelp, example
            'field' => new AA_Property( 'field', _m("Field"),      'text',  false,  true, 'field' ),
            'desc'  => new AA_Property( 'desc',  _m("Descending"), 'text',  false,  true, 'bool' ),
            'limit' => new AA_Property( 'limit', _m("Limit"),      'text',  false,  true, 'int' ),
        ];
    }

    /** AA_Sortorder function  */
    function __construct($sort= []) {
        $this->clear();
        foreach ($sort as $key => $val) {
            if ($key == 'limit') {
                $this->limit = $val;
            } else {
                $this->field = $key;
                $this->desc  = ($val == 'd');
            }
        }
    }

    /** clear function */
    function clear() {
        $this->field = '';
        $this->desc  = false;
        $this->limit = '';   // '' is not 0
    }

    /** getArray function
     *  @return array - clasic $sort array - array('field'  => a|d [,limit => <group_no>])
     *
     *  Mainly for backward compatibility with old - array approach
     */
    function getArray() {
        if ( !$this->field ) {
            return [];
        }
        $ret = [$this->field => ($this->desc ? 'd' : 'a')];
        if (ctype_digit((string)$this->limit)) {
            $ret['limit'] = (int)$this->limit;
        }
        return $ret;
    }

    function getField()     { return $this->field; }
    function getDirection() { return $this->desc;  }
    function getLimit()     { return $this->limit; }
    function getAsString()  { return ($f = $this->getField()) ? $this->getLimit().$f.$this->getDirection() : ''; }
}

class AA_Set extends AA_Object {
    /** @var string[] slice_ids (unpacked_ids) */
    var $slices;

    /** @var AA_Condition[] */
    var $conds;

    /** @var AA_Sortorder[] objects */
    var $sort;

    /** bitfield representing the bins - like Holding Bin, Approved, Trash, ...
     *  AA_BIN_ACTIVE | AA_BIN_EXPIRED | AA_BIN_PENDING | AA_BIN_HOLDING | AA_BIN_TRASH
     */
    var $bins;


    /** AA_Set function
     * @param $slices array or one slice id, where to search
     * @param $conds  array or conds url string
     * @param $sort   array or sort  url string in various formats:
     *           1)   sort = headline........-
     *           2)   sort[0] = headline........-
     *           3)   sort[0][headline........]=d
     *           4)   sort[0][headline........]=d&sort[1][publish_date....]=a
     *        or with group limits (limited number of items displayed in each group)
     *           1)   sort = 5headline........-
     *           2)   sort[0] = 5headline........-
     *           3)   sort[0][headline........]=d&sort[0][limit]=5
     */
    function __construct($slices=null, $conds=null, $sort=null, $bins=AA_BIN_ACTIVE) {
        $this->clear();
        if ( !is_null($conds) ) {
            if (is_object($conds)) {
                $this->addCondition($conds);
            } elseif (is_array($conds)) {
                $this->addCondsFromArray($conds, 'LIKE');
            } else {
                $this->addCondsFromString($conds);
            }
        }
        if ( !is_null($sort) ) {
            if (is_object($sort)) {
                $this->addSortorder($sort);
            } elseif (is_array($sort)) {
                $this->addSortFromArray($sort);
            } else {
                $this->addSortFromString($sort);
            }
        }
        $this->setModules($slices);
        $this->bins = $bins;
    }

    /** New main function to get item ids from database based on conditions...
     *  Should replace QueryZids() in future
     *  @param $restrict_zids - zids
     *  @return zids
     */
    public function query($restrict_zids=null, $limit=null): zids {
        return QueryZids($this->getModules(), $this->getConds(), $this->getSort(), $this->getBins(), 0, $restrict_zids, 'LIKE', $limit);
    }

    /** clear function
     *
     */
    function clear(): AA_Set {
        $this->conds  = [];
        $this->sort   = [];
        $this->slices = [];
        $this->bins   = AA_BIN_ACTIVE;
        return $this;
    }

    /** set the bins - like Holding Bin, Approved, Trash, ...
     *  @param $bins bitfield
     *  AA_BIN_ACTIVE | AA_BIN_EXPIRED | AA_BIN_PENDING | AA_BIN_HOLDING | AA_BIN_TRASH
     */
    function setBins($bins): AA_Set {
        $this->bins = $bins;
        return $this;
    }

    /** set the slices/modules
     *  @param $slices array of slice ids
     */
    function setModules($slices): AA_Set {
        if (is_array($slices)) {
            $this->slices = $slices;
        } elseif (is_string($slices)) {
            $this->slices = explode('-', $slices);
        } else {
            $this->slices = [];
        }
        return $this;
    }

    /** addCondition function
     * @param $condition
     */
    function addCondition($condition): AA_Set {
        if ( $condition ) {
            $this->conds[] = $condition;
        }
        return $this;
    }

    /** addSortorder function
     * @param $sortorder
     */
    function addSortorder($sortorder): AA_Set {
        if ( $sortorder ) {
            $this->sort[] = $sortorder;
        }
        return $this;
    }

    /** addCondsFromString function
     *  Creates conditions from d-<fields>-<operator>-<value>-<fields>-<op....
     *  string ie:   d-headline........,category.......1-BEGIN-Bio
     * @param $string
     * @param $defaultCondsOperator
     */
    function addCondsFromString($string, $defaultCondsOperator='RLIKE') {
        if (substr($string, 0, 2)== 'd-') {
            $this->_parseViewConds($string);
        }
        $this->_parseCondsString($string, $defaultCondsOperator);
    }

    /** _parseCondsString function
     *  Returns $conds[] array, which is created from conds[] 'url' string
     *  like conds[0][category........]=first&conds[1][switch.........1]=1
     * @param $conds_string
     * @param $defaultCondsOperator
     */
    function _parseCondsString($conds_string, $defaultCondsOperator) {
        if (empty($conds_string)) {
            return;
        }
        parse_str($conds_string, $aa_query_arr);
        // we also need PHP to think a['key'] is the same as a[key], that's why we
        // call NormalizeArrayIndex()
        $aa_query_arr = NormalizeArrayIndex($aa_query_arr);
        $this->addCondsFromArray($aa_query_arr['conds'], $defaultCondsOperator);
    }

    /** addCondsFromArray function
     * @param $conds
     * @param $defaultCondsOperator
     */
    function addCondsFromArray($conds, $defaultCondsOperator='RLIKE') {
        if (!is_array($conds)) {
            return;
        }

        // joined two older functions:
        //    ParseMultiSelectConds($conds);
        //    ParseEasyConds($conds, $defaultCondsOperator);

        // First take care about 'valuejoin'

        // Parses the conds from a multiple select box: e.g.
        //  conds[1][value][0] = 'apple'
        //  conds[1][value][1] = 'cherry'
        //  conds[1][valuejoin] = 'AND'
        //      => creates two conds: conds[7] and conds[8] for example,
        //         fill conds[7][value] = 'apple', conds[8][value] = 'cherry'
        //
        //  with conds[1][valuejoin] = 'OR'
        //      => only changes conds[1][value] to '"apple" OR "cherry"'
        //  (c) Jakub, May 2002
        foreach ($conds as $icond => $cond) {
            if (is_array($cond['value'])) {
                // make phrases from all the all the values
                $cond['value'] = array_map( ['AA_Condition','makePhrase'], $cond['value']);
                if ($cond['valuejoin'] == 'AND') {
                    foreach ($cond['value'] as $val) {
                        $newcond = $cond;
                        unset($newcond['valuejoin']);
                        $conds[] = $newcond;
                    }
                    unset($conds[$icond]);
                } else {    // default is using valuejoin as OR
                    // the phrases are already in quotes
                    unset($conds[$icond]['valuejoin']);
                    $conds[$icond]['value'] = join(' OR ', $cond['value']);
                }
            }
        }

        // the 'valuejoin is now removed - transformed into miltiple conditions

        // Now we convert the easy conds to extended syntax

        /**
         * Transforms simplified version of conditions to the extended syntax
         * for example conds[0][headline........]='Hi' transforms into
         * conds[0][headline........]=1,conds[0]['value']='Hi',conds[0][operator]=LIKE
         *
         * It also replaces all united field conds
         *    like conds[0][headline........,abstract........]='Hi'
         * with its equivalents:
         *     conds[0][headline........]=1,conds[0][abstract........]=1,
         *     conds[0]['value']='Hi',conds[0][operator]=LIKE
         * (number of united field conds is unlimited and you can use it in simplified
         *  condition syntax as well as in extended condition syntax)
         *
         * @param array $conds input/output - transformed conditions
         * @param array $defaultCondsOperator - could be scalar (default), but also
         *              array: field_id => array('operator'=>'LIKE')
         */
        // Check the syntax and remove conds with wrong syntax (like conds[xx]=yy)
        // and replace easy conds with extended syntax conds
        foreach ($conds as $k => $cond) {
            if ( !is_array($cond) ) {
                unset($conds[$k]);
                continue;             // bad condition - ignore
            }
            if ( !isset($cond['value']) && (count($cond) == 1) ) {
                $conds[$k]['value'] = reset($cond);
            }
            if ( !isset($cond['operator']) ) {
                if ( is_array($defaultCondsOperator) ) {
                    if ( is_array($defaultCondsOperator[key($cond)] )) {
                        $conds[$k]['operator'] = get_if($defaultCondsOperator[key($cond)]['operator'], 'LIKE');
                    } else {
                        $conds[$k]['operator'] = 'LIKE';
                    }
                } else {
                    $conds[$k]['operator'] = $defaultCondsOperator;
                }
            }
            if (!($cond['operator'] == 'ISNULL') AND !($cond['operator'] == 'NOTNULL') AND !($cond['operator'] == 'ISMAIL') AND !($cond['operator'] == 'NOTMAIL')) {
                // The value could be empty for ISNULL or NOTNULL operators
                if (!isset($conds[$k]['value']) OR ($conds[$k]['value']=="")) {
                    // For other operators we should remove all conditions without value
                    unset ($conds[$k]);
                }
            }
        }

        // and now replace all united conds (like conds[0][headline........,abstract........]=1)
        // with its equivalents
        foreach ($conds as $k => $cond) {
            foreach ( $cond as $field => $val ) {
                if ( strpos( $field, ',') !== false ) {
                    unset($conds[$k][$field]);
                    foreach ( explode(',',$field) as $separate_field ) {
                        $conds[$k][$separate_field] = $val;
                    }
                }
            }
        }

        // Finally create the the conds array
        foreach ($conds as $k => $cond) {
            $operator      = $cond['operator'];
            $value         = $cond['value'];
            unset($cond['operator']);
            unset($cond['value']);
            $field_arr      = array_keys($cond);
            $this->conds[] = new AA_Condition($field_arr, $operator, $value);
        }
    }

    /** addSortFromString function accept various type of sort string:
     *           1)   headline........-
     *           2)   category.......1,publish_date....-,headline........
     *           3)   category.......1+publish_date....-headline........    (this one is usefull for view's set[]=sort-category.......1+publish_date....-)
     *           4)   sort[0]=headline........-
     *           5)   sort[0][headline........]=d
     *           6)   sort[0][headline........]=d&sort[1][publish_date....]=a
     *        or with group limits (limited number of items displayed in each group)
     *           1)   5headline........-
     *           2)   sort[0]=5headline........-
     *           3)   sort[0][headline........]=d&sort[0][limit]=5
     *
     *  The "group limit" means that we want maximum 4 items of each category.
     * @param $srt
     */
    function addSortFromString( $sort ) {
        if (strpos(ltrim($sort),'sort[')===0) {
            $ret = [];
            parse_str($sort, $ret);
            $this->addSortFromArray($ret['sort']);
        } else {
            $this->addSortFromBasicString($sort);
        }
    }

    /** addSortFromBasicString function
     *  Transforms 'publish_date....-' like sort definition (used in prifiles, ...)
     *  to $arr['publish_date....'] = 'd' as used in sort[] array
     *  It is also possible to specify "group limit" by the number at the begin
     *  of the string (like 4category........-), which means that we want maximum
     *  4 items of each category. In such case we returned something like:
     *  array( 'limit' => 4, 'category........' => d )
     * @param $sort_string
     */
    function addSortFromBasicString( $sort_string ) {
        if ($sort_string) {
            $sorts = array_filter(explode(',', str_replace(['-','+',' '], ['-,','+,','+,'], $sort_string))); // ' ' comes from url category.......1+publish_date.... where + is translated to ' '
            foreach ($sorts as $number => $sort) {
                $retone = [];
                // is defined group limit?
                if (($limit_len = strspn($sort,'0123456789')) > 0) {
                    $retone['limit'] = (int)substr($sort,0,$limit_len);
                    $sort             = substr($sort,$limit_len);        // rest of the string
                }
                switch ( substr($sort,-1) ) {    // last character
                    case '-':  $retone[substr($sort,0,-1)] = 'd'; break;
                    case '+':  $retone[substr($sort,0,-1)] = 'a'; break;
                    default:   $retone[$sort]              = 'a';
                }
                $this->sort[] = new AA_Sortorder($retone);
            }
        }
    }

    /** addSortFromArray function
     *  $sort - sort definition in various formats:
     *     1)   sort = headline........-
     *     2)   sort[0] = headline........-
     *     3)   sort[0][headline........]=d
     *  or with group limits (limited number of items displayed in each group)
     *     1)   sort = 5headline........-
     *     2)   sort[0] = 5headline........-
     *     3)   sort[0][headline........]=d&sort[0][limit]=5
     */
    function addSortFromArray( $sort ) {
        if ($sort and is_array($sort)) {
            ksort( $sort, SORT_NUMERIC); // it is not sorted and the order is important
            foreach ( $sort as $k => $srt) {
                if ($srt) {
                    if ( is_array($srt) ) {
                        $tmp = [];
                        if ( key($srt) == 'limit') {
                            next($srt);
                        }
                        $tmp[key($srt)] = (strtolower(current($srt)) == "d" ? 'd' : 'a');
                        if ($srt['limit']) {
                            $tmp['limit'] = $srt['limit'];
                        }
                        $this->sort[] = new AA_Sortorder($tmp);
                    } else {
                        $this->addSortFromBasicString($srt);
                    }
                }
            }
        }
    }

    /** _parseViewConds function
     *  Creates conditions from d-<fields>-<operator>-<value>-<fields>-<op....
     * @param string $string - like:   d-headline........,category.......1-BEGIN-Bio
     * @return bool
     */
    function _parseViewConds($string) {
        $commands = new AA_View_Commands($string);
        $command  = $commands->get('d');
        if (!$command) {
            return false;
        }
        return $this->addFromCommand($command);
    }

    /** addFromCommand function
     * @param $command
     * @return bool
     */
    function addFromCommand($command) {
        if ($command->getCommand() != 'd') {
            return false;
        }
        $i=0;
        $command_params = $command->getParameterArray();
        while ( $command_params[$i] ) {
             if ( AA_Set::check($command_params[$i], $command_params[$i+2]) ) {
                 $field_arr = explode(',',$command_params[$i]);
                 $cond_str  = $command_params[$i+2];

                 // d- conds in {item:....:d-..} could be url encoded (as produced by {conds:...})
                 // so if the first and last characetr is encoded quotes, let's decode it
                 if ( (substr($cond_str,0,3) == '%22') AND (substr($cond_str,-3) == '%22')) {
                     $cond_str = rawurldecode($cond_str);
                 }

                 // well stripsplashes is bad - we never want the slashed text
                 // here, but we do not know, if the command is not from url
                 // so we will rather stripslash the string in most cases
                 // However - if the string starts with ", then it is never
                 // slashed, for sure
                 // @todo remove stripslashes for AA3.0 - Honza
                 if ( substr($cond_str,0,1) !='"') {
                     $cond_str = stripslashes($cond_str);
                 }
                 $this->conds[] = new AA_Condition($field_arr, $command_params[$i+1], $cond_str);
             }
             $i += 3;
         }
         return true;
    }

    /** getConds function
     *  retruns $conds[] array - mainly for backward compatibility
     */
    function getConds() {
        $ret = [];
        foreach ( $this->conds as $condition ) {
            $ret[] = $condition->getArray();
        }
        return $ret;
    }

    /** getSort function
     *  @returns $sort[] array - mainly for backward compatibility
     */
    function getSort() {
        $ret = [];
        foreach ( $this->sort as $sortorder ) {
            $ret[] = $sortorder->getArray();
        }
        return $ret;
    }

    /**
     *  @return string
     */
    function getSortAsString() {
        $ret = [];
        foreach ( $this->sort as $sortorder ) {
            $ret[] = $sortorder->getAsString();
        }
        return join(',',array_filter($ret));
    }


    /** getModules function
     *  retruns $modules array - mainly for backward compatibility
     */
    function getModules() {
        return $this->slices;
    }

    /** @return int bins bitfield - AA_BIN_ACTIVE | AA_BIN_EXPIRED | AA_BIN_PENDING | AA_BIN_HOLDING | AA_BIN_TRASH */
    function getBins() {
        return $this->bins;
    }

    /** @return string representing teh codition (for {ids} or {view}, ...)
     */
    function getCondsAsString() {
        $ret   = '';
        $delim = 'd-';
        foreach ( $this->conds as $k => $condition ) {
            $ret  .= $delim . $condition->getAsString($k);
            $delim = '-';
        }
        return $ret;
    }

    /**
     *  Checks if the condition is in right format - is valid
     * @param $field
     * @param $value
     * @return bool
     */
    static function check($field, $value) {
        return ($field && ($value != 'AAnoCONDITION'));
    }

    /** matches function
     *  Postfilter - checks if the item matches the conditions
     *  In this case we already have an item loaded from database
     *  (which is new). We are trying to have the same syntax as classical
     *  $conds[] applayed to database selection.
     * @param $itemcontent
     * @todo allow to compare not only fields, but also aliases
     * @return bool
     */
    function matches(&$itemcontent) {
        foreach ( $this->conds as $condition ) {
            if ( !$condition->matches($itemcontent) ) {
                // we must met all the conditions criteria
                return false;
            }
        }
        return true;
    }

    /// Static ///

    /** getClassProperties function of AA_Serializable
     *  Used parameter format (in fields.input_show_func table)
     * @return array
     */
    static function getClassProperties(): array {
        return [                //  id            name         type          multi  persistent validator, required, help,                                         morehelp, example
            /** Array of AA_Condition */
            'conds'  => new AA_Property( 'conds',  _m("Conditions"), 'AA_Condition',  true, true ),
            /** array of AA_Sortorder */
            'sort'   => new AA_Property( 'sort',   _m("Sort"),       'AA_Sortorder',  true, true ),
            /** array of slice_ids */
            'slices' => new AA_Property( 'slices', _m("Slices"),     'text',          true, true )
     //     'alias'  => new AA_Property( 'alias',   _m("Alias"),         'string', false, true, '', true,  _m('Alias will be called as {_:&lt;Alias_name&gt;[:&lt;Possible parameters - colon separated&gt;]}'),'', 'Message_box'),
        ];
    }

    // static function factoryFromForm($oowner, $otype=null)        ... could be redefined here, but we use the standard one from AA_Object
    // static function getForm($oid=null, $owner=null, $otype=null) ... could be redefined here, but we use the standard one from AA_Object
}

/** getSortFromUrl function
 *  Returns sort[] array used by QueryZids functions
 *  $sort - sort definition in various formats:
 *     1)   sort = headline........-
 *     2)   sort[0] = headline........-
 *     3)   sort[0][headline........]=d
 *  or with group limits (limited number of items displayed in each group)
 *     1)   sort = 5headline........-
 *     2)   sort[0] = 5headline........-
 *     3)   sort[0][headline........]=d&sort[0][limit]=5
 */
function getSortFromUrl( $sort ) {
    $set = new AA_Set(null, null, $sort);
    return $set->getSort();
}


class AA_Dbcondition {

    private $field;             // string
    private $operator;          // string
    private $querystring;       // string
    private $type;              // text|number   - store type - used for check for c0.number = 'honza'  (which would equals to TRUE in MySQL)

    /** @var bool - some contitions are different, when is done for joined (content) table - the case with multivalues and "<>" operator */
    private $joined    = false;
    private $condition = null;
    private $jointype  = null;
    private $joincond  = null;

    function __construct($field, $operator, $querystring, $type='text', $joined=false) {
        $this->field       = trim($field);

        // normalize operator
        // we allow modifiers without ':' - like d>, e>=, ... (which bring administrators the possibility to not deal with escaping ':' in some cases)
        // we are also trying to fix administrators mistakes, when they convert > to &gt; so &gt;, ... are valid operator, now
        $this->operator    = str_replace(['#:',':','&gt;','&lt;'], ['','','>','<'], trim($operator)); // #: - fix mistaken escaping of d#:>...
        if (strlen($this->operator)<4) {
            $this->operator    = str_replace(['eq','ne','lt','le','gt','ge'], ['==','<>','<','<=','>','>='], $this->operator);  // d-highlight.......-lt-5  - lt, gt, le, ge, ne are allowed as well
        }

        $this->querystring = $querystring;
        $this->type   = $type;
        $this->joined = $joined;

        $arr = $this->_calculate();
        $this->jointype  = $arr[0];
        $this->joincond  = $arr[1];
        $this->condition = $arr[2];
    }

    function getWhereExp() { return $this->condition; }
    function getJoinType() { return $this->jointype;  }
    function getJoinCond() { return $this->joincond;  }

    function _calculate() {
        AA::$debug&64 && AA::$dbg->log('AA_Dbcondition', $this->field, $this->operator, $this->querystring, $this->type);

        $field       = $this->field;
        $operator    = $this->operator;
        $querystring = $this->querystring;


        // check for illegal characters in filed_id
        if (strlen($field) != strspn($field,"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.-_")) {
            return ['NONE', '', '1=0'];
        }

        // search operator for functions (some operators can be in function:operator
        // fomat - the function is called to $querystring (good for date transform ...)
        if ( in_array($operator[0], ['d','e','m']) ) {
            $func        = $operator[0];
            $operator    = substr($operator,1);
            $querystring = trim($querystring, '"');

            switch( $func ) {
                case 'd': // english style datum (like '12/31/2001' or '10 September 2000')
                    $querystring = strtotime($querystring);
                    break;
                case 'e': // european datum style (like 24. 12. 2001)
                    if ( !preg_match("/^ *([0-9]{1,2}) *\. *([0-9]{1,2}) *\. *([0-9]{4}) *$/", $querystring, $part)) {
                        if ( !preg_match("/^ *([[0-9]]{1,2}) *\. *([0-9]{1,2}) *\. *([0-9]{2}) *$/", $querystring, $part)) {
                            if ( !preg_match("/^ *([[0-9]]{1,2}) *\. *([0-9]{1,2}) *$/", $querystring, $part)) {
                                $querystring = time();
                                break;
                            }
                        }
                    }
                    if ( ($operator == "<=") or ($operator == ">") ) {
                        // end of day used for some operators
                        $querystring = mktime(23,59,59,$part[2],$part[1],$part[3]);
                    } else {
                        $querystring = mktime(0,0,0,$part[2],$part[1],$part[3]);
                    }
                    break;
                case 'm':
                case '-':
                    $querystring = time() - $querystring;
                    break;
            }
        }

        // check for c0.number = 'honza'  (which would equals to TRUE in MySQL) and we do not want to.
        if ( ($this->type == 'number') ) {
            $querystring = trim($querystring);
            switch ($operator) {
                case 'BETWEEN':
                    if (strlen($querystring) != strspn($querystring, "0123456789+-.,")) {
                        return ['NONE', '', '1=0'];
                    }
                    break;
                case '==':
                    if (!IsSigInt($querystring)) {
                        return ['NONE', '', '1=0'];
                    }
                    break;
                default:
                    if (strlen($querystring) != strspn($querystring, "0123456789+-.()[]orandtORANDT '\"")) {   // OR AND NOT
                        return ['NONE', '', '1=0'];
                    }
            }
        }

        // new operators - no SQL parsing, no stripslashes
        switch ($operator) {
            case '==':      return ['INNER', '', "($field = '".     addcslashes($querystring,"'")   ."')"];  // exact match (we added this because SQL Syntax parser in AA have problems with packed ids)
            case 'BEGIN':   return ['INNER', '', "($field LIKE '".  addcslashes(quote($querystring),"_%") ."%')"];
            case 'CONTAIN': return ['INNER', '', "($field LIKE '%". addcslashes(quote($querystring),"_%") ."%')"];
            case 'BITSET':  return ['INNER', '', "($field & ". (int)$querystring ." = ". (int)$querystring .")"];
        }

        // query string could be slashed - sometimes :-(
        // However - if the string starts with ", then it is never
        // slashed, for sure
        // @todo remove stripslashes for AA3.0 - Honza
        //    if ( substr($querystring,0,1) != '"') {
        //        $querystring = stripslashes( $querystring );
        //    }

        $querystring = stripslashes( $querystring );


        $querystring =  (string)$querystring;   // to be able to do string operations
        $cleanstr    = quote( (($querystring[0] == '"') OR ($querystring[0] == "'")) ? substr( $querystring, 1, -1 ) : $querystring);

        switch( $operator ) {
            case 'LIKE':
            case 'RLIKE':
            case 'LLIKE':
            case 'XLIKE':
                // @todo - I do not like this part of code, which means, that you
                // can use '%' as well as '*'
                // I think we should escape all the % and _ and allow it only for
                // say XLIKE
                $querystring = str_replace('*', '%', trim($querystring));
                $querystring = str_replace('?', '_', $querystring);
                // continue!
            case '=':
                // it is not possible to use wildcard characers with '='
                $syntax      = new Syntax($field, $operator, lex( trim($querystring) ) );

                // ret will be quoted
                $ret         = $syntax->S();
                if ( $ret == "_SYNTAX_ERROR" ) {
                    if ( $GLOBALS['debug'] ) {
                        echo "<br>Query syntax error: ". $GLOBALS['syntax_error']. ','. $field. ','. ','. $querystring;
                    }
                    return ['ALL', '', "1=1"];
                }
                return ( $ret ? ['INNER', '', "($ret)"] : ['ALL', '', "1=1"]);   // maybe we can change LEFT to INNER
            case 'BETWEEN':
                $arr = explode( ",", quote($querystring) );
                return  ['INNER', '', "(($field >= $arr[0]) AND ($field <= $arr[1]))"];
            case 'ISNULL':    return ['LEFT',  '', "(($field IS NULL) OR ($field=''))"];
            case 'NOTNULL':   return ['INNER', '', "(($field IS NOT NULL) AND ($field<>''))"];
            case 'ISMAIL':    return ['INNER', '', "($field REGEXP '". quote(AA_REGEXP_MAIL). "')"];
            case 'REGEXP':    return ['INNER', '', "($field REGEXP '". quote($querystring). "')"];
            case 'NOTMAIL':   return ['LEFT',  '', "($field NOT REGEXP '". quote(AA_REGEXP_MAIL). "')"];
            case 'NOTREGEXP': return ['LEFT',  '', "($field NOT REGEXP '". quote($querystring). "')"];
    //      case '<=>':  //MySQL know this operator, but we do not use it in AA
    //      MariDB doc: NULL values cannot be used with most comparison operators. For example, =, >, >=, <=, <, or != cannot be used, as any comparison with a NULL always returns a NULL value, never true (1) or false (0).
    //        - so we can use INNER join

            case '<>' :       // for work with multivalues we look for non existatnt join by value
            case '!=' :       return $this->joined ? ['LEFT', "($field = '$cleanstr')", "($field IS NULL)"] :
                                                     ['LEFT', "", "($field <> '$cleanstr')"];

            case '<=' :       return ['LEFT',     '', "($field $operator '$cleanstr')"];
            case '<'  :       return ['LEFT',     '', "($field $operator '$cleanstr')"];
            case '>=' :       return ['LEFT',     '', "($field $operator '$cleanstr')"];
            case '>'  :       return ['LEFT',     '', "($field $operator '$cleanstr')"];
        }
        return ['ALL', '', "1=1"];
    }

}

// -------------------------------------------------------------------------------------------

/** ProoveFieldNames function - just for debuging
 * show debug info about non-existing fields in all given slices
 * @param $slices
 * @param $conds
 */
function ProoveFieldNames($slices, $conds) {

    if (!is_array($slices) OR !is_array($conds)) {
        return;
    }

    global $CONDS_NOT_FIELD_NAMES;
    foreach ($slices as $slice_id) {
        if (!($slice = AA_Slice::getModule($slice_id))) {
            warn("Slice <b>$slice_id</b> do not exist");
            continue;
        }
        foreach ($conds as $cond) {
            if (!(isset($cond) AND is_array($cond))) {
                continue;
            }
            foreach ($cond as $key => $foo) {
                // @todo - we do not check the headline........@relation.......1 kind of fields
                if (!$CONDS_NOT_FIELD_NAMES[$key] AND !strpos($key, '@') AND !$slice->isField($key)) {
                    warn("Field <b>$key</b> does not exist in slice <b>$slice_id</b> (".q_pack_id($slice_id).").");
                }
            }
        }
    }
}

// -------------------------------------------------------------------------------------------

/* parses the conds from a multiple select box: e.g.
    conds[1][value][0] = 'apple'
    conds[1][value][1] = 'cherry'
    conds[1][valuejoin] = 'AND'

    => creates two conds: conds[7] and conds[8] for example,
        fill conds[7][value] = 'apple', conds[8][value] = 'cherry'

    with conds[1][valuejoin] = 'OR' only changes conds[1][value] to '"apple" OR "cherry"'
    (c) Jakub, May 2002
*/
/** ParseMultiSelectConds function
 * @param $conds
 */
function ParseMultiSelectConds(&$conds) {
    if (!is_array($conds)) {
        return;
    }
    foreach ($conds as $icond => $cond) {
        if (is_array($cond['value'])) {
            // make phrases from all the all the values
            $cond['value'] = array_map( ['AA_Condition','makePhrase'], $cond['value']);
            if ($cond['valuejoin'] == 'AND') {
                foreach ($cond['value'] as $val) {
                    $newcond = $cond;
                    unset($newcond['valuejoin']);
                    $conds[] = $newcond;
                }
                unset($conds[$icond]);
            } else {    // default is using valuejoin as OR
                // the phrases are already in quotes
                unset($conds[$icond]['valuejoin']);
                $conds[$icond]['value'] = join(' OR ', $cond['value']);
            }
        }
    }
}

/** ParseEasyConds function
 * Transforms simplified version of conditions to the extended syntax
 * for example conds[0][headline........]='Hi' transforms into
 * conds[0][headline........]=1,conds[0]['value']='Hi',conds[0][operator]=LIKE
 *
 * It also replaces all united field conds
 *    like conds[0][headline........,abstract........]='Hi'
 * with its equivalents:
 *     conds[0][headline........]=1,conds[0][abstract........]=1,
 *     conds[0]['value']='Hi',conds[0][operator]=LIKE
 * (number of united field conds is unlimited and you can use it in simplified
 *  condition syntax as well as in extended condition syntax)
 *
 * @param array $conds input/output - transformed conditions
 * @param array $defaultCondsOperator - could be scalar (default), but also
 *              array: field_id => array('operator'=>'LIKE')
 */
function ParseEasyConds(&$conds, $defaultCondsOperator = "LIKE") {
    if (is_array($conds)) {
        // In first step we remove conds with wrong syntax (like conds[xx]=yy)
        // and replace easy conds with extended syntax conds
        foreach ($conds as $k => $cond) {
            if ( !is_array($cond) ) {
                unset($conds[$k]);
                continue;             // bad condition - ignore
            }
            if ( !isset($cond['value']) && (count($cond) == 1) ) {
                $conds[$k]['value'] = reset($cond);
            }
            if ( !isset($cond['operator']) ) {
                if ( is_array($defaultCondsOperator) ) {
                    if ( is_array($defaultCondsOperator[key($cond)] )) {
                        $conds[$k]['operator'] = get_if($defaultCondsOperator[key($cond)]['operator'], 'LIKE');
                    } else {
                        $conds[$k]['operator'] = 'LIKE';
                    }
                } else {
                    $conds[$k]['operator'] = $defaultCondsOperator;
                }
            }
            if (!($cond['operator'] == 'ISNULL') AND !($cond['operator'] == 'NOTNULL') AND !($cond['operator'] == 'ISMAIL') AND !($cond['operator'] == 'NOTMAIL')) {
                // The value could be empty for ISNULL or NOTNULL operators
                if (!isset($conds[$k]['value']) OR ($conds[$k]['value']=="")) {
                    // For other operators we should remove all conditions without value
                    unset ($conds[$k]);
                }
            }
        }
        // and now replace all united conds (like conds[0][headline........,abstract........]=1)
        // with its equivalents
        foreach ($conds as $k => $cond) {
            foreach ( $cond as $field => $val ) {
                if ( strpos( $field, ',') !== false ) {
                    unset($conds[$k][$field]);
                    foreach ( explode(',',$field) as $separate_field ) {
                        $conds[$k][$separate_field] = $val;
                    }
                }
            }
        }
    }
}

/** String2Conds function
 *  Returns $conds[] array, which is created from conds[] 'url' string
 *  like conds[0][category........]=first&conds[1][switch.........1]=1
 * @param string $conds_string
 * @return array
 */
function String2Conds( $conds_string ) {
    $set = new AA_Set(null, $conds_string);
    return $set->getConds();
}

/** String2Sort function
 *  Returns $sort[] array, which is created from sort[] 'url' string
 *  like sort[0][headline........]=a&sort[2][publish_date....]=d
 * @param string $sort_string
 * @return array
 */
function String2Sort( $sort_string ) {
    $set = new AA_Set(null, null, $sort_string);
    return $set->getSort();
}

/** MakeSQLConditions function
 *  Creates array of SQL conditions based on $conds and fields $add
 * @param          $fields_arr
 * @param          $conds
 * @param          $defaultCondsOperator
 * @param function $join_tables - if some table is needed to join,
 *                                          this function adds it to the array
 * @param function $additional_field_cond - aditional condition function
 * @param function $additional_field_cond - aditional condition function parameter
 * @param          $add_param
 * @return string
 */
function MakeSQLConditions($fields_arr, $conds, $defaultCondsOperator, &$join_tables, $additional_field_cond='', $add_param=false) {

    ParseMultiSelectConds($conds);
    ParseEasyConds($conds, $defaultCondsOperator);

    AA::$debug&2 && AA::$dbg->log("<br>Conds after ParseEasyConds():", $conds, "<br>--");

    if ( isset($conds) AND is_array($conds)) {
        foreach ($conds as $cond) {
            if ( isset($cond) AND is_array($cond) ) {
                unset($onecond);                    // clear
                foreach ( $cond as $fid => $v ) {
                    $finfo = $fields_arr[$fid];
                    if ( isset($finfo) AND is_array($finfo) ) {
                        if ( $additional_field_cond ) {
                            if ( !$additional_field_cond( $finfo, $v, $add_param ) ) {
                                continue;
                            }
                        }
                        $onecond[] = (new AA_Dbcondition($finfo['field'], $cond['operator'], $cond['value']))->getWhereExp();
                        if ( $finfo['table'] ) {
                            $join_tables[$finfo['table']] = true;
                        }
                    }
                }  // between conditions inside one cond is OR
                if ( count($onecond) == 1 ) {
                    $ret[] = $onecond[0];
                } elseif ( count($onecond) >  1 ) {
                    $ret[] = '( '. join( ' OR ',$onecond ) . ')';
                }
            }
        }
    }
    return ( isset($ret) AND is_array($ret) ) ? ' AND ( '. join(' AND ', $ret ) .') ' : '';
}

/** MakeSQLOrderBy function
 *  Creates array of SQL ORDER BY expresions based on $sort and fields array
 * @param          $fields_arr
 * @param array    $sort
 * @param function $join_tables - if some table is needed to join,
 *                                           this function adds it to the array
 * @param function $additional_field_cond - aditional condition function
 * @param function $additional_field_cond - aditional condition function parameter
 * @param          $add_param
 * @return string
 */
function MakeSQLOrderBy($fields_arr, $sort, &$join_tables, $additional_field_cond='', $add_param=false) {
    if ( isset($sort) AND is_array($sort)) {
        foreach ( $sort as $srt ) {
            if ( isset($srt) AND is_array($srt) ) {
                // random order
                // This operatin is quite slow in MySQL, so if you need just
                // one random item (for banner, ...), you should rather use
                // set[]=random-1 parameter for view.php3


                // This code is not tested, but should work, so if you need it, just enable it and you will see
                // I wrote it for item randomization, but then I find out that this function is not used for normal items in the slice
                // Honza 2008-09-01
                // if (key($srt) == 'random') {
                //     $ret[] = 'RAND()';
                //     continue;
                // }
                $finfo = $fields_arr[key($srt)];
                if ( $finfo AND is_array($finfo)) {
                    if ( $additional_field_cond ) {
                        if ( !$additional_field_cond( $finfo, current($srt), $add_param ) ) {
                            continue;
                        }
                    }
                    $ret[] = $finfo['field'] . (stristr(current( $srt ), 'd') ? " DESC" : "");
                    if ( $finfo['table'] ) {
                        $join_tables[$finfo['table']] = true;
                    }
               }
            }
        }
    }
    return ( isset($ret) AND is_array($ret) ) ?
                           ' ORDER BY '. join(' , ', $ret ) : '';
}

/** GetZidsFromSQL function - get zids from database
 * @param string $SQL              - SQL query
 * @param string $col              - column in database containing id
 * @param $zid_type
 * @param bool   $empty_result_condition - have we return empty set?
 * @param arrray $group_limit      - array('field' => <grouping_column>,
 *                                         'limit' => <number>)
 *                                   Limits the number of returned ids from each
 *                                   group. Group is defined by 'field'. Used
 *                                   for displaying only firs <number> of items
 *                                   from each group. Also good, if you want to
 *                                   list just the group names which is used in
 *                                   selected items (then set the number to 1)
 * @return zids from SQL query;
 */
function GetZidsFromSQL( $SQL, $col, $zid_type='s', $empty_result_condition=false, $group_limit=null ): zids {
    global $QueryIDsCount;
    $db = getDB();

    $arr           = [];       // result ids array
    $extended_attr = [];       // extended attributes stored in zids for grouping on multivalue fields
    if (!$empty_result_condition) {
        $db->query($SQL);
        AA::$debug&2 && AA::$dbg->log("GetZidsFromSQL: SQL", $SQL);

        if (!$group_limit) {
            $arr = $db->fetch_column($col);
        } else {                     // we have to remove the ids above the limit for group
                                     // and also we have to add extended attributes to zids, because
                                     // of group_by
            $group_by = [];
            $groups   = [];                 // array where we count the number of items in each group
            $glimit   =  $group_limit['limit'];  // shortcut - just for possible speedup
            $gfield   =  $group_limit['field'];  // shortcut - just for possible speedup
            while ($db->next_record()) {

                AA::$debug&2 && AA::$dbg->log("result", $db->record());

                if (++$groups[$db->f($gfield)] <= $glimit) {
                    $arr[]      = $db->f($col);
                    $group_by[] = $db->f('s0');
                }
            }
            $extended_attr = ['group_by' => $group_by];
        }
    }
    $zids = new zids($arr, $zid_type, $extended_attr);

    $QueryIDsCount = count($arr);

    //now sorted by field() SQL command - no more needed, Honza 2012-11-14
    //if ( is_object($sort_zids) ) {
    //    $zids->sort_and_restrict_as_in($sort_zids);
    //}

    freeDB($db);
    return $zids;
}


// -------------------------------------------------------------------------------------------

/** QueryZids function - @deprecated - use $aa_set->query() instead
*  Finds item IDs for items to be shown in a slice / view
*
*   @param array  $slices array of slices in which to look for items
*                         could be false. if you specify restrict_zids
*   @param array  $conds    search conditions (see FAQ)
*   @param array  $sort     sort fields (see FAQ)
*   @param string $type
*       sets status, pub_date and expiry_date according to specified type:
*       ACTIVE | EXPIRED | PENDING | HOLDING | TRASH | ALL.
*       If you want to specify it in conds, set to ALL.
*
*   @param bool   $neverAllItems
*       if no conds[] apply (all are wrong formatted or empty),
*       should the function generate an empty set?
*       Otherwise all items from given slices are returned.
*
*   @param array  $restrict_zids
*       ids are packed but not quoted in $restrict_ids or short.
*       Use it if you want to choose only from a set of items
*       (used by E-mail Alerts and related item view
*       (for sorting and eliminating of expired items)).
*
*   @param string $defaultCondsOperator
*       replaces the default "LIKE" for conditions with no operator set
*
*   @param bool   $use_cache should be the cache searched for the result? -- no longer used used
*
*   @return zids - A zids object with a list of the ids that match the query.
*
*   @global  bool $debug (in) many debug messages
*   @global  bool $debugfields (in) useful mainly for multiple slices mode -- views info about field_ids
*               used in conds[] but not existing in some of the slices
*   @global  int $QueryIDsCount (out) is set to the count of IDs returned
*
*   Parameter format example:
*   <pre>
*   conds[0][fulltext........] = 1;   // returns id of items where word 'Prague'
*   conds[0][abstract........] = 1;   // is in fulltext, absract or keywords
*   conds[0][keywords........] = 1;
*   conds[0][operator] = "=";
*   conds[0][value] = "Prague";
*   conds[1][source..........] = 1;   // and source field of that item is
*   conds[1][operator] = "=";         // 'Econnect'
*   conds[1][value] = "Econnect";
*   sort[0][category........]='a';    // order items by category ascending
*   sort[1][publish_date....]='d';    // and publish_date descending (secondary)
*   sort[0][category........]='1';    // order items by category priority - ascending
*   sort[0][category........]='9';    // order items by category priority - descending
*   sort[0]=random;                   // order items in random order (it is quite database intensive,
*                                     // so if you want to diplay just one random item, use set[]=random-1
*                                     // view parameter instead)
*   </pre>
*/
function QueryZids($slices, $conds="", $sort="", $type="ACTIVE", $neverAllItems=0, $restrict_zids=null, $defaultCondsOperator = "LIKE", $limit=null ): zids {

    // select * from item, content as c1, content as c2 where item.id=c1.item_id AND item.id=c2.item_id AND       c1.field_id IN ('fulltext........', 'abstract..........') AND c2.field_id = 'keywords........' AND c1.text like '%eufonie%' AND c2.text like '%eufonie%' AND item.highlight = '1';

    global $CONDS_NOT_FIELD_NAMES; // list of special conds[] indexes (defined in constants.php3)

    if (!is_array($slices)) {
        $slices = empty($slices) ? [] : (array)$slices;
    }

    AA::$debug&2 && AA::$dbg->log("QueryZids - start:<br>Conds=",$conds,"<br>Sort=",$sort, "<br>Slices=",join('-',$slices));

    if (is_object($restrict_zids) AND ($restrict_zids->count() == 0)) {
        return new zids(); // restrict_zids defined but empty - no result
    }

    AA::$debug&64 && ProoveFieldNames($slices, $conds);

    ParseMultiSelectConds($conds);
    ParseEasyConds($conds, $defaultCondsOperator);

    $select_order = '';

    // we need fields just in case we use sort or conds. Not necessary for
    // restrict_zids queries, where we often do not have slice id
    if ( (is_array($conds) AND (count($conds)>0)) OR (is_array($sort) AND (count($sort)>0)) ) {
        if ( empty($slices) ) {
            if ( is_object($restrict_zids) ) {
                $sid = $restrict_zids->getFirstSlice();
                if ( $sid ) {
                    $slices[] = $sid;
                }
            }
        }
        // get the fields for the first slice (used as template and we expect that
        // all slices in the query has the same structure
        if ( !empty($slices) AND ($slice  = AA_Slice::getModule(reset($slices)))) {
            // @todo convert whole $slices to AA_Slice
            // access the fields through slice - it is better for caching of values
            $fields = $slice->getFields();
        } else {
            return new zids();
        }
    }

    AA::$debug&2 && AA::$dbg->log("QueryZids: Conds=",$conds,"Sort=",$sort, "Slices=",join('-',$slices));

    // parse conditions ----------------------------------
    if ( is_array($conds)) {
        $tbl_count=0;

        foreach ($conds as $cond) {

            // fill arrays according to this condition
            $field_count = 0;
            $cond_flds   = '';
            foreach ( $cond as $fid => $v ) {
                // search in all content table fields (new in AA v2.8)
                switch ( strtolower($fid) ) {
                    case 'all_fields':          $cond_flds = 'all_fields';
                                                $store     = 'text';
                                                continue;
                    case 'all_fields_numeric':  $cond_flds = 'all_fields';
                                                $store     = 'number';
                                                continue;
                }
                if ( $CONDS_NOT_FIELD_NAMES[$fid] ) {
                    continue;      // it is not field_id parameters - skip it for now
                }

                // Remote fields

                // @todo
                // It is possible to write conditions also using fields from
                // remote slice (which is related to this one)
                // Syntax is:
                // 1) the current slice is pointing to another one
                //    <remote_field_id>@<local_relation_field_id>
                //      headline........@relation.......1
                //        - search in headline field of all related items (relation.......1 field pointed to related items)
                // 2) the remote slice is pointing to current one
                //    <remote_field_id>@<remote_slice_id>/<remote_relation_field_id>
                //      headline........@7735375488a65e7735375488a65eab2ab2/relation.......1
                //      headline........@7735375488a65e7735375488a65eab2ab2+/relation.......1
                //        - search in headline field of all related items
                //          (relation.......1 field of the remote slice 7735375488a65e7735375488a65eab2ab2 pointed to current item)
                //        - the + after <remote_slice_id> - 7735375488a65e7735375488a65eab2ab2+ means we want also non ACTIVE items take in the account

                if ( strpos($fid, '@') !== false ) {
                    if (strpos($fid, '/') === false ) {
                        // first case - the current slice is pointing to another one
                        // Syntax is:
                        //   <remote_field_id>@<local_relation_field_id>
                        //   headline........@relation.......1
                        //   - search in headline field of all related items
                        //     (relation.......1 field pointed to related items)
                        [$cf, $rel_fld] = explode('@',$fid);

                        $field = $fields->getField($rel_fld);
                        if (!is_object($field)) {
                            if (AA::$debug) echo "Skipping $fid in conds[]: $rel_fld is not field.<br>";
                            continue;            // bad field_id or not defined condition - skip
                        }
                        [$rel_f_type, $rel_f_slice] = $field->getRelation();
                        if ($rel_f_type != 'relation') {
                            if (AA::$debug) echo "Skipping $fid in conds[]: $rel_fld is not relation field.<br>";
                            continue;            // bad field_id or not defined condition - skip
                        }
                        $rel_fld   = "'$rel_fld'";
                        if ($cf == 'all_fields') {
                            $tbl       = 'c'.$tbl_count++;
                            $tbl2      = 'c'.$tbl_count++;
                            $select_tabs[] = "LEFT JOIN content as $tbl  ON ($tbl.item_id=item.id AND ($tbl.field_id=$rel_fld OR $tbl.field_id is NULL))
                                              LEFT JOIN content as $tbl2 ON ($tbl2.item_id=UNHEX($tbl.text))";
                            $cur_cond = (new AA_Dbcondition($tbl2 . '.text', $cond['operator'], $cond['value']))->getWhereExp();
                        } else {
                            $cond_field  = AA_Slice::getModule($rel_f_slice)->getField($cf);
                            if (!is_object($cond_field)) {
                                if (AA::$debug) echo "Skipping $fid in conds[]: $fid is not field.<br>";
                                continue;            // bad field_id or not defined condition - skip
                            }

                            $cond_flds = "'$cf'";
                            $tbl       = 'c'.$tbl_count++;
                            $tbl2      = 'c'.$tbl_count++;
                            if ( $cond_field->storageTable() == 'item' ) {   // field is stored in table 'item'
                                // Long ID in conds should be specified as unpacked, but in db it is packed
                                $select_tabs[] = "LEFT JOIN content as $tbl  ON ($tbl.item_id=item.id AND ($tbl.field_id=$rel_fld OR $tbl.field_id is NULL))
                                                  LEFT JOIN item as $tbl2 ON ($tbl2.id=UNHEX($tbl.text))";
                            } else {
                                $select_tabs[] = "LEFT JOIN content as $tbl  ON ($tbl.item_id=item.id AND ($tbl.field_id=$rel_fld OR $tbl.field_id is NULL))
                                                  LEFT JOIN content as $tbl2 ON ($tbl2.item_id=UNHEX($tbl.text) AND ($tbl2.field_id=$cond_flds OR $tbl2.field_id is NULL))";
                            }
                            $cur_cond = (new AA_Dbcondition($tbl2 . '.' . $cond_field->storageColumn(), $cond['operator'], $cond['value']))->getWhereExp();
                            if (in_array($cf, ['id..............', 'slice_id........'])) {
                                $cur_cond =  preg_replace("/'([0-9a-f]{32})'/i", "0x\\1", $cur_cond);
                            }
                        }
                        $select_conds[] = $cur_cond;
                        $sortable[$cf]  = $tbl;  // @todo - test if it works
                        $cond_flds = '';
                        continue;
                    } else {
                        // second case - the remote slice is pointing to current one
                        // Syntax is:
                        //   <remote_field_id>@<remote_slice_id>/<remote_relation_field_id>
                        //   headline........@7735375488a65e7735375488a65eab2ab2/relation.......1
                        //   headline........@7735375488a65e7735375488a65eab2ab2+/relation.......1
                        //   - search in headline field of all related items
                        //     (relation.......1 field of the remote slice 7735375488a65e7735375488a65eab2ab2 pointed to current item)
                        //   - the + after <remote_slice_id> - 7735375488a65e7735375488a65eab2ab2+ means we want also non ACTIVE items take in the account
                        [$cond_fld_id, $rel_combi] = explode('@',$fid);
                        [$rel_slice_id, $rel_fld_id]   = explode('/',$rel_combi);
                        $rel_bins = AA_BIN_ACTIVE;
                        if (substr($rel_slice_id, -1) == '+')  {
                             $rel_bins = AA_BIN_ALL;
                             $rel_slice_id = trim($rel_slice_id,'+');
                        }
                        $rel_slice   = AA_Slice::getModule($rel_slice_id);
                        if (!is_object($rel_slice)) {
                            if (AA::$debug) echo "Skipping $fid in conds[]: $rel_slice_id is not slice.<br>";
                            continue;            // bad field_id or not defined condition - skip
                        }

                        $cond_field  = $rel_slice->getField($cond_fld_id);
                        if (!is_object($cond_field)) {
                            if (AA::$debug) echo "Skipping $fid in conds[]: $cond_fld_id is not field of $rel_slice_id.<br>";
                            continue;            // bad field_id or not defined condition - skip
                        }

                        $rel_field = $rel_slice->getField($rel_fld_id);
                        if (!is_object($rel_field)) {
                            if (AA::$debug) echo "Skipping $fid in conds[]: $rel_fld_id is not field of $rel_slice_id.<br>";
                            continue;            // bad field_id or not defined condition - skip
                        }

                        $cond_flds = "'$cond_fld_id'";
                        $rel_fld   = "'$rel_fld_id'";
                        $tbl       = 'c'.$tbl_count++;
                        $tbl2      = 'c'.$tbl_count++;
                        if ( $cond_field->storageTable() == 'item' ) {   // field is stored in table 'item'
                            $rel_bins_cond = ($rel_bins != AA_BIN_ALL) ? " AND ".CreateBinCondition($rel_bins, $tbl2) : '';
                            // Long ID in conds should be specified as unpacked, but in db it is packed
                            $select_tabs[] = "LEFT JOIN content as $tbl  ON ($tbl.field_id=$rel_fld AND HEX(item.id)=$tbl.text)
                                              LEFT JOIN item as $tbl2 ON ($tbl2.id=$tbl.item_id AND $tbl2.slice_id=".xpack_id($rel_slice_id)."$rel_bins_cond)";
                        } else {
                            $select_tabs[] = "LEFT JOIN content as $tbl  ON ($tbl.field_id=$rel_fld AND HEX(item.id)=$tbl.text)
                                              LEFT JOIN content as $tbl2 ON ($tbl2.item_id=$tbl.item_id AND ($tbl2.field_id=$cond_flds OR $tbl2.field_id is NULL))";
                        }
                        $cur_cond = (new AA_Dbcondition($tbl2 . '.' . $cond_field->storageColumn(), $cond['operator'], $cond['value']))->getWhereExp();
                        if (in_array($cond_flds, ['id..............', 'slice_id........'])) {
                            $cur_cond =  preg_replace("/'([0-9a-f]{32})'/i", "0x\\1", $cur_cond);
                        }
                        $select_conds[] = $cur_cond;
                        $sortable[ str_replace( "'", "", $cond_flds) ] = $tbl;  // @todo - test if it works
                        $cond_flds = '';
                        continue;
                    }
                }

                $field = $fields->getField($fid);

                if ( is_null($field) OR $v=="") {
                    if (AA::$debug) echo "Skipping $fid in conds[]: not known.<br>";
                    continue;            // bad field_id or not defined condition - skip
                }

                if ( $field->storageTable() == 'item' ) {   // field is stored in table 'item'
                    // Long ID in conds should be specified as unpacked, but in db it is packed
                    $cur_cond = (new AA_Dbcondition('item.' . $field->storageColumn(), $cond['operator'], $cond['value']))->getWhereExp();
                    switch ($fid) {
                    case 'id..............':
                    case 'slice_id........':
                        // replace unpaced ids with the packed ones
                        $cur_cond =  preg_replace("/'([0-9a-f]{32})'/i", "0x\\1", $cur_cond);
                        break;
                    case 'expiry_date.....':
                        $ignore_expiry_date = true;
                        break;
                    }
                    $select_conds[] = $cur_cond;
                } else {
                    $cond_flds .= ( ($field_count++>0) ? ',' : "" ). "'$fid'";
                    // will not work with one condition for text and number fields
                    $store      = $field->storageColumn();
                }
            }

            if ( $cond_flds != '' ) {

                $dbcond = new AA_Dbcondition('c'.$tbl_count.".$store", $cond['operator'], $cond['value'], $store, true);
                $dbcjointype = $dbcond->getJoinType();
                if ($dbcjointype == 'ALL') {
                    // nothing;
                } elseif ($dbcjointype == 'NONE') {
                    $select_conds[] = '1=0';
                } else {
                    // INNER / LEFT
                    $tbl = 'c'.$tbl_count++;

                    $selprefix  = ($dbcjointype == 'INNER') ? 'INNER' : 'LEFT';

                    $selcondadd = ($dbcjointype == 'INNER') ? '' : "OR $tbl.field_id is NULL";

                    // fill arrays to be able construct select command
                    $select_conds[] = $dbcond->getWhereExp();

                    if ($addjoincond = $dbcond->getJoinCond()) {
                        $addjoincond = " AND $addjoincond";
                    }

                    if ( strpos($cond_flds, 'all_fields')!== false ) {  // we are searching all fields in content table
                        $select_tabs[] = "$selprefix JOIN content as $tbl ON ($tbl.item_id=item.id $addjoincond)";
                    } elseif ($field_count>1) {
                        $select_tabs[] = "$selprefix JOIN content as $tbl ON ($tbl.item_id=item.id AND ($tbl.field_id IN ($cond_flds) $selcondadd)$addjoincond)";
                    } else {
                        $select_tabs[] = "$selprefix JOIN content as $tbl ON ($tbl.item_id=item.id AND ($tbl.field_id=$cond_flds $selcondadd)$addjoincond)";
                        // mark this field as sortable (store without apostrofs)
                        $sortable[ str_replace( "'", "", $cond_flds) ] = $tbl;
                    }
                }
            }
        }
    }

    $delim='';
    $select_distinct = '';

    if ( !is_array($sort) OR count($sort)<1 ) {
        $select_order =  is_object($restrict_zids) ? '' : 'item.publish_date DESC';   // default item order
    } else {
        foreach ($sort as  $sort_no => $srt) {
            if (key($srt)=='limit') {
                next($srt);       // skip the 'limit' record in the array
            }

            $fid = trim(key($srt));
            if (!$fid) {
                continue;
            }

            // random sorting by following url parameters:
            //    sort[0]=random
            //    sort[0]=category........&sort[1]=random
            //    /apc-aa/view.php3?vid=13&cmd[13]=c-1-1&set[13]=sort-random
            // This operatin is quite slow in MySQL, so if you need just
            // one random item (for banner, ...), you should rather use
            // set[]=random-1 parameter for view.php3
            if ( $fid == 'random' ) {
                $select_order .= $delim  . ' RAND()';
                $delim         = ',';

                // break! - we do not want to create expressions like
                //    ORDER BY RAND(),item.publish_date DESC
                // bacause it makes no sense
                // (on the other hand the following expressions are perfectly OK:
                //    ORDER BY s0, RAND()
                break;
            }

            $field = $fields->getField($fid);
            if ( is_null($field) ) { // bad field_id - skip
                if (AA::$debug) {
                    echo "Skipping sort[x][$fid], don't know $fid.<br>";
                }
                continue;
            }

            if ( $field->storageTable() == 'item' ) {   // field is stored in table 'item'
                $fieldId          = 'item.' . $field->storageColumn();
                $select_order    .= $delim  . $fieldId;
                if ( stristr(current( $srt ), 'd')) {
                    $select_order .= ' DESC';
                }
                $delim         = ',';
            } else {
                if ( !$sortable[ $fid ] ) {           // this field is not joined, yet
                    $tbl = 'c'.$tbl_count++;
                    // fill arrays to be able construct select command
                    $select_tabs[] = "LEFT JOIN content as $tbl
                                      ON ($tbl.item_id=item.id
                                      AND ($tbl.field_id='$fid' OR $tbl.field_id is NULL))";
                    // mark this field as sortable (store without apostrofs)
                    $sortable[$fid] = $tbl;
                }

                // join constant table if we want to sort by priority
                $direction = current( $srt );
                if ( stristr($direction,'1') OR stristr($direction,'9') ) { // sort by priority
                    if ( !($constgroup = $field->getConstantGroup() )) {
                        // no constant group defined - can't assign priority
                        continue;
                    }

                    $tbl = 'o'.$tbl_count++;
                    // fill arrays to be able construct select command
                    $select_tabs[] = "LEFT JOIN constant as $tbl
                                      ON ($tbl.value=". $sortable[$fid] .".text
                                      AND ($tbl.group_id='$constgroup'
                                      OR $tbl.group_id is NULL))";
                    // mark this field as sortable (store without apostrofs)

                    // fill arrays according to this sort specification
                    $fieldId          = $tbl. ".pri";
                    $select_order    .= $delim . $fieldId;
                    if ( stristr($direction,'9') ) {
                        $select_order  .= " DESC";
                    }
                } else {                                                   // sort by value
                    $store = $field->storageColumn();
                    // fill arrays according to this sort specification
                    $fieldId          = $sortable[$fid]. ".$store";
                    $select_order    .= $delim . $fieldId;
                    if ( stristr(current( $srt ), 'd')) {
                        $select_order  .= " DESC";
                    }
                }
                $delim = ',';
            }
            if ($srt['limit']) {
                // select_distinct added in order we can group by multiple value fields
                // (items are shown more times)
                $select_distinct .= ", $fieldId as s$sort_no";
                $select_limit_field = ['field' => "s$sort_no", 'limit' => $srt['limit']];
            }
        }
    }

    // sort in order of zids as last sort order
    // good for preservation of sortorder (now works also with grouping in views)
    if (is_object($restrict_zids)) {
        if ($restrict_zids->use_short_ids()) {
            $ord_field = 'short_id';
            $ord_ids   = implode(",",$restrict_zids->shortids());
        } else {
            $ord_field = 'id';
            $ord_ids   = implode(",",array_map('xpack_id',$restrict_zids->longids()));
        }
        if ($ord_ids) { // not false, null, empty array
            $select_order .= "$delim field(item.$ord_field,$ord_ids)";
        }
    }

    // parse group by parameter ----------------------------
    // .. removed 2/27/2005 Honza (was never used)
    // ---

    AA::$debug&2 && AA::$dbg->log("QueryZids:slice_id=",join('-',$slices),"  select_tabs=",$select_tabs, "  select_conds=",$select_conds,"  select_order=",$select_order );

    // construct query --------------------------
    $SQL = "SELECT DISTINCT item.id as itemid $select_distinct FROM item ";
    if ( isset($select_tabs) AND is_array($select_tabs)) {
        $SQL .= ' '. implode (' ', $select_tabs);
    }

    $SQL .= ' WHERE ';                                         // slice ----------

    if ( !empty($slices) ) {
        $slices_SQL = join(",", array_map( "xpack_id", $slices));
        $SQL .= 'item.slice_id' . ((count($slices) == 1) ? " = $slices_SQL AND " :
                                                           " IN ($slices_SQL) AND ");
    }

    if (is_object($restrict_zids)) {
        $SQL .= " ".$restrict_zids->sqlin() ." AND ";
    } else {
        // slice(s) or $restrict_zids MUST be specified (in order we can get answer in limited time)
        if (!$slices_SQL) {
            return new zids();
        }
    }

    $SQL .= CreateBinCondition($type, 'item', $ignore_expiry_date);

    if ( isset($select_conds) AND is_array($select_conds)) {     // conditions -----
        $SQL .= " AND (" . implode (") AND (", $select_conds) .") ";
    }

    if ( $select_order ) {                                // order ----------
        $SQL .= " ORDER BY $select_order";
//        if (defined("DB_COLLATION") AND (strpos($select_order, '.text') !== false)) {
//            $SQL .= " COLLATE ". DB_COLLATION;
//        }
    }

    if ($limit > 0) {
        $SQL .= ' LIMIT '. (int)$limit;
    }

    // add comment to the SQL command (for debug purposes)
    $SQL_comment = " -- AA slice: ". join('-', $slices);
    if ($GLOBALS['slice_info']) {
        $SQL_comment .= ", slice_name: ". $GLOBALS['slice_info']['name'];
    }
    if ($GLOBALS['vid']) {
        $SQL_comment .= ", vid: ".        $GLOBALS['vid'];
    }
    if ($GLOBALS['view_info']) {
        $SQL_comment .= ", view_name: ".  $GLOBALS['view_info']['name'];
    }

    $SQL .= str_replace(["\n", "\r"], ' ', $SQL_comment);

    AA::$debug&2 && AA::$dbg->log("QueryZids: SQL: $SQL");

    // @todo - replace LEFT JOIN with INNER JOIN for conditions where posiible (for speedup)
    // if ($_GET['dd']>70) {
    //     $SQL = str_replace('LEFT JOIN', 'INNER JOIN', $SQL);
    // }

    // if neverAllItems is set, return empty set if no conds[] are used
    $ret = GetZidsFromSQL( $SQL, 'itemid', 'p', !is_array($select_conds) && $neverAllItems, $select_limit_field);

    AA::$debug&2 && AA::$dbg->log("QueryZids: result:", $ret);

    return $ret;
}

/** QueryConstantZIDs function
*  Finds constant ZIDs for constants to be shown in a slice / view
*   @param string $group_id   constant group to search in
*   @param array  $conds      search conditions {see QueryZids, FAQ}
*   @param array  $sort       sort fields       {see QueryZids, FAQ}
*   @param string $type       not used, yet
*   @param array  $restrict_zids
*       Use it if you want to choose only from a set of constants
*   @param string $defaultCondsOperator
*       replaces the default "RLIKE" for conditions with no operator set
*
*   @return zids object with a list of the ids that match the query.
*
*   Parameter format example - {see QueryZids, FAQ}
*   Fields definition - {see include/constants.php3}
*/
function QueryConstantZIDs($group_id, $conds, $sort="", $restrict_zids=false, $defaultCondsOperator = "RLIKE") {
    if (!trim($group_id)) {
        return new zids();
    }
    global $debug;                 // displays debug messages

    // set default sortorder for constants if sortorder is not set
    if ( !isset($sort) OR !is_array($sort) OR count($sort)<1) {
        $sort[] = ['const_priority' => 'a'];
        $sort[] = ['const_name' => 'a'];
    }
    // for backward compatibily rename value to const_value ... (used in old views)
    if ( key($sort[0]) == 'value' ) {
        $sort[0] = ['const_value'    => $sort[0]['value']];
    }
    if ( key($sort[0]) == 'name' ) {
        $sort[0] = ['const_name'     => $sort[0]['name']];
    }
    if ( key($sort[0]) == 'pri' ) {
        $sort[0] = ['const_priority' => $sort[0]['pri']];
    }
    // for older database structure, where conds is just 16 characters long
    if ( key($sort[0]) == 'const_descriptio' ) {
        $sort[0] = ['const_description'    => $sort[0]['const_descriptio']];
    }

    AA::$debug&2 && AA::$dbg->log("<br>Conds:", $conds, "<br>--<br>Sort:", $sort, "<br>--");

    // parse conditions and sort order ----------------------------------
    $where_sql    = MakeSQLConditions( GetConstantFields(), $conds, $defaultCondsOperator, $foo);
    $order_by_sql = MakeSQLOrderBy(    GetConstantFields(), $sort,  $foo);

    // construct query --------------------------
    $SQL  = "SELECT DISTINCT constant.short_id FROM constant WHERE group_id='$group_id' ";
    $SQL .=  $where_sql . $order_by_sql;

    if (is_object($restrict_zids)) {
        if ($restrict_zids->count() == 0) {
            return new zids(); // restrict_zids defined but empty - no result
        }
        $SQL .= ' AND '.$restrict_zids->sqlin();
    }

    // get result --------------------------
    return GetZidsFromSQL($SQL, 'short_id');
}

// -------------------------------------------------------------------------------------------

/** QueryDiscIDs function
 * Purpose:  Finds discussion items IDs to be shown by the aa/discussion.php3 script
 * @param $slice_id
 * @param $conds
 * @param $sort
 * @param $slices
 * @return array|void
 */

function QueryDiscIDs($slice_id, $conds, $sort, $slices ) {
    // parameter format example:
    // conds[0][discussion][subject] = 1;   // discussion fields are preceded by [discussion]
    // sort[0][category........]='a';    // order items by category ascending

    if (!$slice_id && !$slices) {
        return;
    }

    $fields = ["date","subject","author","e_mail","body","state","flag","url_address", "url_description", "remote_addr", "free1", "free2"];

    AA::$debug&2 && AA::$dbg->log("QueryDiscIDs - start:<br>Conds=",$conds,"<br>Sort=",$sort, "<br>Slices=",join('-',$slices));

    // parse conditions ----------------------------------
    if (is_array($conds)) {
        $tbl_count=0;
        foreach ($conds as $cond ) {
            if ( !is_array($cond) OR !$cond['discussion'] OR !$cond['operator'] OR ($cond['value']=="")) {
              continue;             // bad condition - ignore
            }

            // fill arrays according to this condition
            foreach ($cond as  $fid => $vv) {
                if ( $fid == 'discussion' ) {
                    unset ($select_cond);
                    foreach ($vv as $fid2 => $foo) {
                        if ( in_array($fid2,$fields) AND $cond['value'] > "" ) {
                            $select_cond[] = (new AA_Dbcondition("discussion.$fid2", $cond['operator'], $cond['value']))->getWhereExp();
                        }
                    }
                    if (is_array($select_cond)) {
                        $select_conds[] = join ($select_cond, " OR ");
                    }
                }
            }
        }
    }
/*
  // parse sort order ----------------------------
  if ( !(isset($sort) AND is_array($sort)))
    $select_order = 'item.publish_date DESC';   // default item order
  else {
    foreach ( as $sort) {
    $delim='';
    foreach ($sort as  $srt) {
    $fid = key($srt);
      if ( !$fields[$fid] )  // bad field_id - skip
          continue;

      if ( $fields[$fid]['in_item_tbl'] ) {   // field is stored in table 'item'
        $select_order .= $delim . 'item.' . $fields[$fid]['in_item_tbl'];
        if ( stristr(current( $srt ), 'd'))
          $select_order .= " DESC";
        $delim=',';
      } else {
        if ( !$sortable[ $fid ] ) {           // this field is not joined, yet
          $tbl = 'c'.$tbl_count++;
          // fill arrays to be able construce select command
          $select_tabs[] = "LEFT JOIN content as $tbl
                                   ON ($tbl.item_id=item.id
                                   AND ($tbl.field_id='$fid' OR $tbl.field_id is NULL))";
                        // mark this field as sortable (store without apostrofs)
          $sortable[$fid] = $tbl;
        }

        $store = ($fields[$fid]['text_stored'] ? "text" : "number");
        // fill arrays according to this sort specification
        $select_order .= $delim .$sortable[$fid]. ".$store";
        if ( stristr(current( $srt ), 'd'))
          $select_order .= " DESC";
        $delim=',';
      }
    }
  }
*/

    // construct query --------------------------
    $SQL = "SELECT discussion.id as id
            FROM discussion INNER JOIN item ON item.id = discussion.item_id
            WHERE ";

    if ( is_array($slices) AND (count($slices) > 0) ) {
        $slices_SQL = join(",", array_map( "xpack_id", $slices));
        $SQL .= ' item.slice_id' . ((count($slices) == 1) ? " = $slices_SQL AND " :
                                                           " IN ($slices_SQL) AND ");
    }
    elseif ( $slice_id ) {
        $SQL .= " item.slice_id = '". q_pack_id($slice_id) ."'";
    }

    if ( isset($select_conds) AND is_array($select_conds)) {    // conditions -----
        $SQL .= " AND (" . implode (") AND (", $select_conds) .") ";
    }

    if ( isset($select_order) ) {                               // order ----------
        $SQL .= " ORDER BY $select_order";
    }

    // get result --------------------------
    return array_map('unpack_id', DB_AA::select('id', $SQL));
}



