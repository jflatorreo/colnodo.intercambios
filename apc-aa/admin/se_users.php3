<?php
/** expected $slice_id for edit slice
 *   optionaly $Msg to show under <h1>Headline</h1>
 *   (typicaly: Category update successful)
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
 * @version   $Id: se_users.php3 4386 2021-03-09 14:03:45Z honzam $
 * @author    Honza Malik <honza.malik@ecn.cz>
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Copyright (C) 1999, 2000 Association for Progressive Communications
 * @link      https://www.apc.org/ APC
 *
*/

use AA\IO\DB\DB_AA;

require_once __DIR__."/../include/init_page.php3";
require_once __DIR__."/../include/formutil.php3";
require_once __DIR__."/../include/se_users.php3";
require_once __DIR__."/../include/msgpage.php3";

if (!IfSlPerm(PS_USERS)) {
    MsgPageMenu(StateUrl(self_base())."index.php3", _m("You have not permissions to manage users"), "admin");
    exit;
}

/** IfLink function
 *  function shows link only if condition is true
 * @param $cond
 * @param $url
 * @param $txt
 */
function IfLink( $cond, $url, $txt ) {
    echo "<td class=\"tabtxt\">";
    echo $cond ? "<a href=\"$url\">$txt</a>" : $txt;
    echo  "</td>\n";
}
/** PrintUser function
 * @param $usr
 * @param $usr_id
 * @param $editor_perm
 */
function PrintUser($perm, $usr_id, $editor_perm) {
    global $perms_roles;

    $username   = perm_username($usr_id);
    $usr_id_enc = rawurlencode($usr_id);
    // select role icon
    $role_images = [
        0 => "rolex.gif",
                         1 => "role1.gif",
                         2 => "role2.gif",
                         3 => "role3.gif",
                         4 => "role4.gif"
    ];
    $role = 0;

    if (      IsPerm($perm,$perms_roles["SUPER"]['id']) ) {
        $role = 4;
    } elseif (IsPerm($perm,$perms_roles["ADMINISTRATOR"]['id'] ) ) {
        $role = 3;
    } elseif (IsPerm($perm,$perms_roles["EDITOR"]['id'] ) ) {
        $role = 2;
    } elseif (IsPerm($perm,$perms_roles["AUTHOR"]['id'] ) ) {
        $role = 1;
    }

    echo "<tr><td><img src=\"../images/". $role_images[$role] ."\" width=50 height=25 border=0></td>\n";

    $go_url_arr = [
        'User'        => "um_uedit.php3?usr_edit=1&selected_user=$usr_id_enc",
                         'Group'       => "um_gedit.php3?grp_edit=1&selected_group=$usr_id_enc",
                         'Reader'      => "#",
                         'ReaderGroup' => "index.php3?change_id=$usr_id_enc"
    ];
    $usrinfo = AA::$perm->getIDsInfo($usr_id);

    // add link to user settings for superadmins
    $usr_code = ( !IsSuperadmin() ? $usrinfo['name'] :
        '<a href="'. get_admin_url(  $go_url_arr[$usrinfo['type']] ) .'">'. $usrinfo['name'] .'</a>' );

    echo "<td class=\"tabtxt\">". $usr_code ."</td>\n";
    echo "<td class=\"tabtxt\">". $username ."</td>\n";
    echo "<td class=\"tabtxt\">". (($usrinfo['mail']) ? $usrinfo['mail'] : "&nbsp;") ."</td>\n";
    echo "<td class=\"tabtxt\">". _mdelayed($usrinfo['type']) ."</td>\n";

    IfLink( CanChangeRole($perm, $editor_perm, $perms_roles["AUTHOR"]['perm']),        get_admin_url("se_users.php3?UsrAdd=$usr_id_enc&role=AUTHOR"), _m("Author"));
    IfLink( CanChangeRole($perm, $editor_perm, $perms_roles["EDITOR"]['perm']),        get_admin_url("se_users.php3?UsrAdd=$usr_id_enc&role=EDITOR"), _m("Editor"));
    IfLink( CanChangeRole($perm, $editor_perm, $perms_roles["ADMINISTRATOR"]['perm']), get_admin_url("se_users.php3?UsrAdd=$usr_id_enc&role=ADMINISTRATOR"), _m("Administrator"));
    IfLink( CanChangeRole($perm, $editor_perm, $perms_roles["AUTHOR"]['perm']),        get_admin_url("se_users.php3?UsrDel=$usr_id_enc&role=AUTHOR"), _m("Revoke"));

    // show profile button also for groups
    $cnt = ($cnt = DB_AA::select1('cnt', 'SELECT count(*) as cnt FROM profile', [
        ['slice_id', $GLOBALS['slice_id'], 'l'],
        ['uid', $usr_id]
    ])) ? " ($cnt)" : '';

    echo "<td class=\"tabtxt\"><input type=\"button\" name=\"uid\" value=\"". _m("Profile") ."$cnt\" onclick=\"document.location='". StateUrl("se_profile.php3?uid=$usr_id_enc") ."'\"></td>\n";
    echo "</tr>\n";
}

$show_adduser = $adduser || $GrpSrch || $UsrSrch;    // show add user form?


$apage = new AA_Adminpageutil('sliceadmin',$show_adduser ? "addusers" : "users");
$apage->setTitle(_m("Admin - Permissions"));
$apage->setForm();
$apage->printHead($err, $Msg);

$continue=true;

if ( $show_adduser ) {
    include "./se_users_add.php3";
} elseif ( $UsrAdd || $UsrDel) {
    ChangeRole(); // in include/se_users.php3
}
if ( $continue ) {

    FrmTabCaption(_m("Change current permisions"));

    $slice_users = AA::$perm->getObjectsPerms($slice_id, "slice");
    $aa_users    = AA::$perm->getObjectsPerms(AA_ID, "aa");   // higher than slice

    // if conflicts slice perms and aa perms - solve it
    foreach ( $slice_users as $usr_id => $foo ) {
        if ( $aa_users[$usr_id] ) {
            $slice_users[$usr_id] = AA_Perm::joinSliceAndAAPerm($slice_users[$usr_id], $aa_users[$usr_id]);
        }
    }

    // no slice permission set, but aa perms yes
    foreach ($aa_users as $usr_id => $prm ) {
        if ( !$slice_users[$usr_id] ) {
            $slice_users[$usr_id] = $prm;
        }
    }

    foreach ($slice_users as $usr_id => $prm) {
        PrintUser($prm, $usr_id, $editor_perms);
    }

    $cnt = ($cnt = DB_AA::select1('cnt', 'SELECT count(*) as cnt FROM profile', [
        ['slice_id', $GLOBALS['slice_id'], 'l'],
        ['uid', '*']
    ])) ? " ($cnt)" : '';

    echo "<tr><td class=\"tabtxt\">&nbsp;</td>
              <td class=\"tabtxt\" colspan=\"8\">". _m("Default user profile") ."</td>
              <td class=\"tabtxt\"><input type=\"button\" name=\"uid\" value=\"". _m("Profile") ."$cnt\"
           onclick=\"document.location='". StateUrl("se_profile.php3?uid=*") ."'\"></td>\n";
  echo "</tr>\n";

    echo "</table>
    </form></td></tr></table>";
  }

$apage->printFoot();
