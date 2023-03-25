<?php
/**
 * File contains definitions of functions which corresponds with actions
 * on Item Manager page (admin/index.php3) - manipulates with central_confs
 *
 * Should be included to other scripts (admin/index.php3)
 *
 *   Move central_conf to app/hold/trash based on param
 *  @param $status string - static function parameter defined in manager action
 *                   in this case it holds bin number, where the central_confs should go
 *  @param $item_arr array, where keys are unpacked ids of items prefixed by
 *                   'x' character (javascript purposes only)
 *  @param $akce_param additional parameter for the action - not used here
 *
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
 * @version   $Id: actions.php3 2404 2007-05-09 15:10:58Z honzam $
 * @author    Honza Malik <honza.malik@ecn.cz>
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Copyright (C) 1999, 2000 Association for Progressive Communications
 * @link      https://www.apc.org/ APC
 *
*/

use AA\IO\DB\DB_AA;

require_once __DIR__."/../../include/linkcheck.class.php3";
require_once __DIR__."/../../include/optimize.class.php3";

/** AA_Manageraction_Central_Linkcheck - checks if the AA are acessible */
class AA_Manageraction_Central_Linkcheck extends AA_Manageraction {

    /** Name of this Manager's action */
    function getName() {
        return _m('Check the AA availability');
    }

    /** main executive function
     * @param AA_Manager $manager
     * @param $item_zids - array of id of AA records to check
     * @param $action_param - not used
     * @return bool|string
     */
    function perform($manager, $item_zids, $action_param) {
        if (count($item_zids)<1) {
            return false;                                     // OK - no error
        }
        $results   = [];
        $results[] = ['<b>'._m('AA (Organization)').'</b>', '<b>'._m('URL').'</b>', '<b>'._m('Status code').'</b>', '<b>'._m('Description').'</b>', '<b>'._m('Auth').'</b>'];
        $linkcheck = new AA_Linkcheck;

        foreach ($item_zids as $aa_id) {
            $aa        = AA_Actionapps::getActionapps($aa_id);
            $url       = $aa->getComunicatorUrl();
            $status    = $linkcheck->check_url($url);
            $resp =     $aa->_authenticate();
            $results[] = [$aa->getName(), $url, $status['code'], $status['comment'], print_r($resp,true)];
            // $ret[] = $aa->doOptimize($this->optimize_class, $this->optimize_method);
        }
        return GetHtmlTable($results). "<br>";                                     // OK - no error
    }

    /** Checks if the user have enough permission to perform the action
     * @param AA_Manager $manager
     * @return bool
     */
    function isPerm4Action($manager) {
        return  IsSuperadmin();
    }
}

/** AA_Manageraction_Central_Sqlupdate - Runs sql_update.php3 script on selected
 *  AAs
 */
class AA_Manageraction_Central_Sqlupdate extends AA_Manageraction {

    /** sql_update action - dotest|update*/
    var $update_action;

    /** Constructor - fills the information about the optimize method */
    function __construct($id, $action) {
        $this->update_action  = $action;
        parent::__construct($id);
    }

    /** Name of this Manager's action */
    function getName() {
        return _m('Update DB (sql_update)'). ' - '.  $this->update_action;
    }

    /** main executive function
     * @param AA_Manager $manager
     * @param $item_zids - array of id of AA records to check
     * @param $action_param - not used
     * @return bool|string
     */
    function perform($manager, $item_zids, $action_param) {
        $item_ids = $item_zids->shortids();

        if (count($item_ids)<1) {
            return false;                                     // OK - no error
        }
        set_time_limit(360);
        $db  = getDB();

        $SQL = "SELECT * FROM central_conf WHERE id IN ('".join_and_quote("','",$item_ids)."')";
        $db->query($SQL);
        $ret = '';
        while ($db->next_record()) {
            $params   = 'dbpw5='.substr($db->f('db_pwd'),0,5).'&silent=1&fire=1&'.$this->update_action.'=1';
            $file     = $db->f('AA_HTTP_DOMAIN'). $db->f('AA_BASE_DIR'). "service/sql_update.php?$params";
            $response = file_get_contents($file);
            $status   = substr($response,0,3);
            $toggle   = '{htmltoggle:&gt;&gt;:'. QuoteColons($file).':&lt;&lt;:'. QuoteColons($response).'}';
            $ret     .= AA::Stringexpander()->unalias($status.' '.$toggle);
        }
        freeDB($db);
        return $ret;                                     // OK - no error
    }

    /** Checks if the user have enough permission to perform the action
     * @param AA_Manager $manager
     * @return bool
     */
    function isPerm4Action($manager) {
        return IsSuperadmin();
    }
}

/** AA_Manageraction - Item manager actions. Just create new class and assign
 *  it to your manager
 */
class AA_Manageraction_Central_MoveItem extends AA_Manageraction {

    /** specifies, to which bin the move should be performed */
    var $to_bin;

    /** Constructor - fills the information about the target bin */
    function __construct($id, $to_bin) {
        $this->to_bin = $to_bin;
        parent::__construct($id);
    }

    /** Name of this Manager's action */
    function getName() {
        switch($this->to_bin) {
            case 1: return _m('Move to Active');
            case 2: return _m('Move to Holding bin');
            case 3: return _m('Move to Trash');
        }
        return "";
    }

    /** main executive function
     * @param AA_Manager $manager
     * @param $item_zids - array of id of AA records to check
     * @param $action_param - not used
     * @return bool
     */
    function perform($manager, $item_zids, $action_param) {
        $item_ids = $item_zids->shortids();

        if ($item_ids) {
            $SQL = "UPDATE central_conf SET status_code = '".$this->to_bin."' WHERE id IN ('".join_and_quote("','",$item_ids)."')";
            DB_AA::sql($SQL);
        }
        return false;                                     // OK - no error
    }

    /** Checks if the user have enough permission to perform the action
     * @param AA_Manager $manager
     * @return bool
     */
    function isPerm4Action($manager) {
        $current_bin     =  $manager->getBin();

        /** for acces to Central you have to be superadmin */
        if (!IsSuperadmin()) {
            return false;
        }

        switch($this->to_bin) {
            case 1: return ($current_bin != 'app' ) AND
                           ($current_bin != 'appb') AND
                           ($current_bin != 'appc');
                    // Folder2 is Holding bin - prepared for more than three bins
            case 2: return ($current_bin != 'hold');
                    // Folder3 is Trash
            case 3: return ($current_bin != 'trash');
        }
    }
}

/** AA_Manageraction_Central_DeleteTrash - Handler for DeleteTrash switch
 *  Delete all AAs in the trash bin
 */
class AA_Manageraction_Central_DeleteTrash extends AA_Manageraction {

    /** specifies, if we have to delete only items specified in $item_arr
     *  otherwise delete all items in Trash
     *  With $selected=true  it is used as "action" of manager
     *  With $selected=false it is used as "switch" of manager (left menu)
     */
    var $selected;

    /** Constructor - fills the information about the target bin */
    function __construct($id, $selected=false) {
        $this->selected = $selected;
        parent::__construct($id);
    }

    /** Name of this Manager's action */
    function getName() {
        return _m('Remove (delete from database)');
    }

    /** main executive function
     * @param AA_Manager $manager
     * @param $item_zids    Items to delete (if 'selected' is $param)
     * @param $action_param  Not used
     * @return bool|if|mixed|void
     */
    function perform($manager, $item_zids, $action_param) {
        if ( !IsSuperadmin() ) {    // permission to delete items?
            return _m("You have not permissions to remove items");
        }

        $wherein = '';
        $items_to_delete = $item_zids->shortids();

        // restrict the deletion only to selected items
        if ($this->selected) {
            if (count($items_to_delete) < 1) {
                return false;
            }
            $wherein = " AND id IN ('".join_and_quote("','", $items_to_delete)."')";
        }

        $db = getDB();

        // now we ask, which items we have to delete. We are checking the items even
        // it is specified in $item_arr - for security reasons - we can delete only
        // items in current slice and in trash
        $db->query("SELECT id FROM central_conf WHERE status_code=3 $wherein");
        $items_to_delete = [];
        while ( $db->next_record() ) {
            $items_to_delete[] = $db->f("id");
        }
        if (count($items_to_delete) < 1) {
            freeDB($db);
            return;
        }

        // delete content of all fields
        // don't worry about fed fields - content is copied
        $wherein = "IN ('".join_and_quote("','", $items_to_delete)."')";
        $db->query("DELETE FROM central_conf WHERE id ".$wherein);
        freeDB($db);
    }

    /** Checks if the user have enough permission to perform the action
     * @param AA_Manager $manager
     * @return bool
     */
    function isPerm4Action($manager) {
        // if we want to use it as "action" (not "switch"), then we should be in trash bin
        return (IsSuperadmin() AND (!$this->selected OR ($manager->getBin() == 'trash')));
    }
}


/** AA_Manageraction_Central_Tab - Swith to another bin in Manager */
class AA_Manageraction_Central_Tab extends AA_Manageraction {

    /** specifies, to which bin we want to switch */
    var $to_bin;

    /** Constructor - fills the information about the target bin */
    function __construct($id, $to_bin) {
        $this->to_bin = $to_bin;
        parent::__construct($id);
    }

    /** main executive function - Handler for Tab switch - switch between bins
     * @param AA_Manager $manager
     * @param $item_zids
     * @param $action_param
     */
    function perform($manager, $item_zids, $action_param) {
        $manager->setBin($this->to_bin);
        $manager->go2page(1);
    }

    /** Checks if the user have enough permission to perform the action
     * @param AA_Manager $manager
     * @return bool
     */
    function isPerm4Action($manager) {
        return IsSuperadmin();
    }
}



/** Call remote AA_Optimize_* function
 *
 */
class AA_Manageraction_Central_Optimize extends AA_Manageraction {

    /** class to be executed in remote AA */
    var $optimize_class;

    /** method to be called in optimize_class */
    var $optimize_method;

    /** Constructor - fills the information about the optimize method */
    function __construct($id, $class, $method) {
        $this->optimize_class  = $class;
        $this->optimize_method = $method;
        parent::__construct($id);
    }

    /** Name of this Manager's action */
    function getName() {
        $class = $this->optimize_class;
        return $class::name(). ' - '.  $this->optimize_method;
    }

    /** main executive function
     * @param AA_Manager $manager
     * @param $item_zids - array of id of AA records to check
     * @param $action_param - not used
     * @return string
     */
    function perform($manager, $item_zids, $action_param) {
        $ret    = [];

        foreach ($item_zids as $aa_id) {
            $aa = AA_Actionapps::getActionapps($aa_id);
            $ret[] = $aa->doOptimize($this->optimize_class, $this->optimize_method);
        }
        return join('<br>', $ret);   // @todo we should rewrite outputs from AA_Manageraction to some standard messages() system
    }

    /** Checks if the user have enough permission to perform the action
     * @param AA_Manager $manager
     * @return bool
     */
    function isPerm4Action($manager) {
        return IsSuperadmin();
    }
}



