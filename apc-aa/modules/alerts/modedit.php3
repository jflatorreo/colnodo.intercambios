<?php
/**
 * Redirects to the TableEdit with Alerts Collection info,
 * kept only for compatibility with the modules interface.
 *
 * @package Alerts
 * @version $Id: modedit.php3 4270 2020-08-19 16:06:27Z honzam $
 * @author Jakub Ad�mek <jakubadamek@ecn.cz>, Econnect, December 2002
 * @copyright Copyright (C) 1999-2002 Association for Progressive Communications
*/
    $set_tview                   = "modedit";
    $cmd[$set_tview]["show_new"] = 1;
    $no_slice_id                 = true;

    require_once __DIR__."/tabledit.php3";
