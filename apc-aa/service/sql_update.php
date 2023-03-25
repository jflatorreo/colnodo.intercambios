<?php
//$Id: sql_update.php 2683 2008-09-26 12:00:42Z honzam $
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
// script for MySQL database update

// this script updates the database to last structure, create all tables, ...
// can be used for upgrade from apc-aa v. >= 1.5 or for create new database

/** FILL SOME ACCESS CODE HERE !!!
 *  example:
 *     define('ACCESS_CODE','de46272*_!%@*dhje-rty362ddj');
 *  (but use your own code)
 *  Then fill the same code to the field Access Code field on the page to access
 *  this script. The code must be 10 character long at least.
 *
 *  It is recommended to delete the access code after you finish your setup, to
 *  disable access code guessing from attackers.
 */

use AA\IO\DB\DB_AA;

define('ACCESS_CODE','7sadaydasydsyadysadysas');


/** INSTRUCTIONS BEFORE USE
 *  This script is written to be not destructive. It updates the database to
 *  the latest structure, create all tables, ...
 *  It can be used for upgrade from previous versions of apc-aa or for creating
 *  new database.
 *  It creates temporary tables first, then copies data from old tables to the
 *  temporary ones (tmp_*) and after successfull copy it drops old tables and
 *  renames temporary ones to right names. Then it possibly updates common
 *  records (like default field definitions, module templates, constants and
 *  templates).</p>
 *
 *  However, it is strongly recommended backup your current database !!!
 *  Use something like:
 *     mysqldump --lock-tables -h DB_HOST -u DB_USER -p --opt DB_NAME > ./aadbbackup.sql
 *  (replace DB_HOST, DB_USER and B_NAME with values from your config.php3 file)
 */


ini_set('display_errors', 'On');
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// sleep one second to make any brute force attacks harder
sleep(1);


if (!$_GET['silent']) {
    echo '
      <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
      <html>
      <head>
        <title>APC-AA database update script</title>
      </head>
      <body>
      <h1>ActionApps database update</h1>
      <p>This script is written to be not destructive. It creates temporary tables
         first, then copies data from old tables to the temporary ones (tmp_*) and
         after successfull copy it drops old tables and renames temporary ones to
         right names. Then it possibly updates common records (like default field
         definitions, module templates, constants and templates).</p>
      <p style="color:red;">However, it is strongly recommended backup your current
      database !!!</p>
      <p>See instructions directly in this file (sql_update.php) on the server.</p>';
}

if ( !constant('ACCESS_CODE') OR (strlen(constant('ACCESS_CODE'))<10) ) {
    echo '<p>For update or restore you need to edit this script on the server
          (sql_update.php) and fill there some Access Code which you then fill
          also here (it is for security reasons).</p>
          <p>Just refresh this page after you fill the Access code to the file.</p>
          </body>
          </html>';
    exit;
}

// need config.php3 to set db access, and phplib, and probably other stuff
require_once __DIR__."/../include/config.php3";
require_once __DIR__."/../include/locsess.php3";   // DB_AA definition
require_once __DIR__."/../include/util.php3";
require_once __DIR__."/../include/zids.php3";   // qquote, is_long_id, ...
require_once __DIR__."/../include/formutil.php3";   // GetHtmlTable
// do not reorder those requires because of metabase and varset dependency
require_once __DIR__."/../include/metabase.class.php3";
require_once __DIR__."/../include/varset.php3";


if (!$_GET['silent']) {
    echo '<form name="f" action="' .$_SERVER['PHP_SELF'] .'">
            Access Code
            <input type="password" name="acccode" value="'.myspecialchars($_GET['acccode']).'"><br>

            Write to database <input type="checkbox" name="fire" value="1"'.($_GET['fire'] ? ' checked' : ''). '><br>
            <small>Check this for real work with writing to database</small>
            <br><br>

            <input type="submit" name="dotest" value="Test">
            <input type="submit" name="update" value="Install / Update">
            <input type="submit" name="restore" value="Restore">
          </form>';
}

if ( (strlen($_GET['acccode'])<10) OR ($_GET['acccode']!=constant('ACCESS_CODE')) ) {
    echo '</body></html>';
    exit;
}

require_once __DIR__."/update.optimize.class.php";

class AA_SQL_Updater {
    var $messages = [];

    function test() {
        $optimizers = $this->getOptimizers();
        $msg        = '<table>';
        $result     = true;
        foreach ($optimizers as $optimizer) {
            $msg .= '<tr><td>'. $optimizer->name() .'</td>';
            $res  = $optimizer->test();
            if (!$res) {
                $result = false;
            }
            $msg .= '<td>'. ($res ? 'OK' : 'Problem') .'</td>';
            $msg .= '<td>'. $optimizer->report(). '</td></tr>';
        }
        $msg .= "</table>";
        $this->message($msg);
        return $result;
    }

    function restore() {
        $optimizer = new AA_Optimize_Restore_Bck_Tables();
        $optimizer->repair();
        $this->message($optimizer->report());
        return true;
    }

    function update() {
        $optimizers = $this->getOptimizers();
        $msg        = '<table>';
        $result     = true;
        foreach ($optimizers as $optimizer) {
            $msg .= '<tr><td>'. $optimizer->name() .'</td>';

            if ( $optimizer->test() ) {
                $msg .= '<td>test passed - skipping</td></tr>';
            } else {
                $optimizer->clear_report();
                $res  = $optimizer->repair();
                if (!$res) {
                    $result = false;
                }
                $msg .= '<td>'. $optimizer->report(). '</td></tr>';
            }
        }
        $msg .= "</table>";
        $this->message($msg);
        return $result;
    }

    /** getOptimizers function
     *  Return names of all known AA classes, which begins with AA_Optimize
     */
    function getOptimizers() {
        $optimizers = [];

        // php4 returns classes all in lower case :-(
        $mask          = 'aa_optimize_';
        $mask_length   = strlen($mask);
        foreach (get_declared_classes() as $classname) {
            if ( substr(strtolower($classname),0,$mask_length) == $mask ) {
                $instance = new $classname();
                if ($instance->isType('sql_update')) {
                    // we need the optimizers sorted by its priority - that's why the $key
                    $optimizers[sprintf("%05s",$instance->priority()).$classname] = $instance;
                }
            }
        }
        ksort($optimizers);
        return $optimizers;
    }

    /** Message function
    * @param $text
    */
    function message($text) {
        $this->messages[] = $text;
    }

    /** Report function
    * @return string - messages separated by <br>
    */
    function report()       {
        return join('<br>', $this->messages);
    }

    /** Clear report function
    * unsets all current messages
    */
    function clear_report() {
        unset($this->messages);
        $this->messages = [];
    }

}

$updater = new AA_SQL_Updater();

if ($_GET['update']) {
    if (!$_GET['fire']) {
        AA_Optimize::justPrint(true);
    }
    $status = $updater->update();
    echo ($status ? 'OK ' : 'Err ') . $updater->report();
}
elseif ( $_GET['restore']) {
    if (!$_GET['fire']) {
        AA_Optimize::justPrint(true);
    }
    $status = $updater->restore();
    echo ($status ? 'OK ' : 'Err ') . $updater->report();
}
elseif ( $_GET['dotest']) {
    $status = $updater->test();
    echo ($status ? 'OK ' : 'Err ') . $updater->report();
}

if (!$_GET['silent']) {
    echo '</body></html>';
}

