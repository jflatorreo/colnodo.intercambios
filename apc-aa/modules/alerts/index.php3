<?php
/**
 * Redirects to the main Alerts page.
 * Kept only for compatibility with the modules interface.
 *
 * @package Alerts
 * @version $Id: index.php3 4270 2020-08-19 16:06:27Z honzam $
 * @author Jakub Ad�mek <jakubadamek@ecn.cz>, Econnect, December 2002
 * @copyright Copyright (C) 1999-2002 Association for Progressive Communications
*/
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
require_once __DIR__."/../../include/init_page.php3";
require_once __DIR__."/../../include/go_url.php3";
go_url(AA_INSTAL_PATH ."modules/alerts/tabledit.php3?set_tview=modedit&cmd[modedit][edit][" .AA::$module_id."]=1&module_id=".AA::$module_id);
