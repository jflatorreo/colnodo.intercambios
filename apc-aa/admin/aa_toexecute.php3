<?php  //slice_id expected
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
 * along with this program (LICENSE); if not, write tao the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * @version   $Id: index.php3 2404 2007-05-09 15:10:58Z honzam $
 * @author    Honza Malik <honza.malik@ecn.cz>
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Copyright (C) 1999, 2000 Association for Progressive Communications
 * @link      https://www.apc.org/ APC
 *
*/

// @todo only_action option which prints on the output the result of the action
// Then it could be used as AJAX call for this action!

require_once __DIR__."/../include/init_page.php3";
require_once __DIR__."/../include/varset.php3";
require_once __DIR__."/../include/formutil.php3";
require_once __DIR__."/../include/item.php3";
require_once __DIR__."/../include/actions.php3";

if ( !IsSuperadmin() ) {
    MsgPage(StateUrl(self_base())."index.php3", _m("You do not have permission to see currently scheduled tasks"));
    exit;
}


/** Common manager settings for Tasks */
$manager_settings = GetToexecuteManagerSettings();

$manager = new AA_Manager('toexecute', $manager_settings);
$manager->performActions();

$aa_set  = $manager->getSet();
$zids    = AA::Metabase()->queryZids(['table'=>'toexecute'], $aa_set);

$manager->displayPage($zids, 'aaadmin', 'toexecute');

page_close();
