<?php
//$Id: lang.php3 4270 2020-08-19 16:06:27Z honzam $
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

// includes for alerts files

if (!defined ("AA_ID")) {
    require_once __DIR__."/../../include/config.php3";
}
require_once __DIR__."/../../include/locsess.php3";
require_once __DIR__."/../../include/util.php3";
require_once __DIR__."/../../include/varset.php3";
// mini gettext language environment (the _m() function)
require_once __DIR__."/../../include/mgettext.php3";

if (!$lang) {
    $lang = "en";
}
mgettext_bind($lang, 'alerts');

require_once __DIR__."/util.php3";

