<?php
//$Id: index.php3 4270 2020-08-19 16:06:27Z honzam $
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

// APC AA - Module main administration page

// used in init_page.php3 script to include config.php3 from the right directory

require_once __DIR__."/../../include/init_page.php3";
require_once __DIR__."/../../include/varset.php3";
require_once __DIR__."/../../include/formutil.php3";

// id of the editted module
$module_id = $slice_id;               // id in long form (32-digit hexadecimal
                                      // number)
$p_module_id = q_pack_id($module_id); // packed to 16-digit as stored in database


// Check permissions for this page.
// You should change PS_MODW_EDIT_CODE permission to match the permission in your
// module. See /include/perm_core.php3 for more details

if ( !IfSlPerm(PS_MODW_EDIT_CODE) ) {
  MsgPage(StateUrl(self_base())."index.php3", _m("You do not have permission to edit items in this slice"));
  exit;
}


// fill code for handling the operations managed on this page


HtmlPageBegin();   // Print HTML start page tags (html begin, encoding, style sheet, but no title)
?>
<title><?php echo _m("Editor window - item manager") ?></title>
</head> <?php

require_once __DIR__."/navbar.php3"; // module specific navigation bar
require_once __DIR__."/util.php3";   // module specific utils


// fill code for the main admin page layout


echo '
  </body>
</html>';

page_close();
exit;

?>