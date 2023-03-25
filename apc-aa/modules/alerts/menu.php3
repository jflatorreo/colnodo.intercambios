<?php
//$Id: menu.php3 4270 2020-08-19 16:06:27Z honzam $
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

// $slice_id - should be defined
// $r_slice_view_url - should be defined
// $editor_page or $usermng_page or $settings_page - should be defined
// $g_modules - should be defined

/*  Top level (navigation bar) menu description:
    label       to be shown
    cond        if not satisfied, don't show the label linked
                slice_id is included in the cond automatically
    href        link, relative to aa/
    exact_href  link, absolute (use either exact_href or href, not both)
*/

require_once __DIR__."/../../include/menu_util.php3";
require_once __DIR__."/../../include/perm_core.php3";
require_once __DIR__."/../../include/mgettext.php3";
require_once __DIR__."/../../modules/alerts/util.php3";

// I don't want to call AA menus as early as including menu.php3, because some permissions' functions are called. Hence I call get_aamenus in showMenu().

set_collectionid();

function get_aamenus() {
    global $auth, $slice_id;

    $aamenus["admin"] = [
        "label" => _m("Alerts Settings"),
        "title" => _m("Alerts Settings"),
        "href" => "modules/alerts/tabledit.php3?set_tview=modedit&cmd[modedit][edit][" .urlencode($GLOBALS["slice_id"])."]=1",
        "cond" => IfSlPerm(PS_USERS),
        "level" => "main",
        "submenu" => "admin_submenu"
    ];
/*
    $aamenus["filters"] = array (
        "label" => _m("Filters"),
        "title" => _m("Filters"),
        "href"=>"modules/alerts/tabledit.php3?set_tview=acf",
        "cond" => IfSlPerm (PS_USERS),
        "level" => "main",
        "submenu"=>"admin_submenu");

    $aamenus["send_emails"] = array (
        "label" => _m("Send emails"),
        "title" => _m("Send emails"),
        "href"=>"modules/alerts/tabledit.php3?set_tview=send_emails&cmd[send_emails][edit]["
                .$GLOBALS["collectionid"]."]=1",
        "cond" => IfSlPerm (PS_USERS),
        "level" => "main",
        "submenu"=>"admin_submenu");

    $aamenus["synchro"] = array (
        "label" => _m("Synchro"),
        "title" => _m("Slice synchro"),
        "href"=>"modules/alerts/synchro.php3",
        "cond" => IfSlPerm (PS_USERS),
        "level" => "main",
        "submenu"=>"admin_submenu");
*/

    $aamenus["admin_submenu"] = [
        "bottom_td"=>200,
        "level"=>"submenu",
        "items"=> [
        "header1"=>_m("Alerts Admin"),
  //      "formwizard"=>array ("cond"=>IfSlPerm(PS_USERS), "href"=>"modules/alerts/cf_wizard.php3", "label"=>_m("Form Wizard")),
        "settings"=> ["cond"=>IfSlPerm(PS_USERS),
            "href" => "modules/alerts/tabledit.php3?set_tview=modedit&cmd[modedit][edit]["
                .$GLOBALS["slice_id"]."]=1", "label"=>_m("Settings")],
        "filters"=> ["cond"=>IfSlPerm(PS_USERS),
            "href"=>"modules/alerts/tabledit.php3?set_tview=acf",
            "label"=>_m("Selections")],
        "send_emails"=> ["cond"=>IfSlPerm(PS_USERS),
            "href"=>"modules/alerts/tabledit.php3?set_tview=send_emails&cmd[send_emails][edit]["
                .$GLOBALS["collectionid"]."]=1",
            "label"=>_m("Send emails")],
        "synchro"=> [
            "cond"=>IfSlPerm(PS_USERS),
            "href" => "modules/alerts/synchro.php3",
            "label" => _m("Reader management")
        ],
        "doc"=> ["cond"=>1, "href"=>"doc/alerts.html", "label" => _m("Documentation")],

        "header2" => _m("Common"),
        "email"=> ["cond"=>IfSlPerm(PS_USERS),
            "href" => "modules/alerts/tabledit.php3?set_tview=email", "label"=>_m("Email templates")]
        ]
    ];

    $profile = AA_Profile::getProfile($auth->auth["uid"], $slice_id); // current user settings

    // left menu for aaadmin is common to all modules, so it is shared
    return array_merge($aamenus, GetCommonMenu($profile));
}

