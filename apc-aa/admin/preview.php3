<?php
/**
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
 * @version   $Id: preview.php3 4270 2020-08-19 16:06:27Z honzam $
 * @author    Honza Malik <honza.malik@ecn.cz>
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Copyright (C) 1999, 2000 Association for Progressive Communications
 * @link      https://www.apc.org/ APC
 *
*/

/** @param slice_id   - long id of slice
 *  @param sh_itm     - long id of item
 *  @param return_url - where to go after hit OK button
 **/

require_once __DIR__."/../include/init_page.php3";

// already stripslashed in init_page.php3

$sh_itm     = $_GET['sh_itm'];
$slice_id   = $_GET['slice_id'];
$return_url = $_GET['return_url'];

$slice = AA_Slice::getModule($slice_id);
if (empty($slice)) {
     echo _m("Wrong slice_id.");
     exit;
}

$item = AA_Item::getItem(new zids($sh_itm, 'l'));
if (empty($item)) {
     echo _m("Wrong item_id.");
     exit;
}

//header("Content-Security-Policy: default-src * 'unsafe-inline' 'unsafe-eval'");
//header("Content-Security-Policy: frame-src 'self' http://svetelnykoren.cz/");
//header("Strict-Transport-Security: max-age=0");

if ($preview_url = $slice->getProperty('_url_preview....')) {
    $preview_url = $item->unalias($preview_url);
} elseif ('_#SEO_URL_' != ($preview_url = $item->unalias('_#SEO_URL_')))  {
    // Contain _#SEO_URL_ already server?
    // we are really looking for the begining of the string - pos = 0
    if ( (0!==strpos($preview_url,'http://')) AND (0!==strpos($preview_url,'https://')) AND (0!==strpos($preview_url,'//')) ) {
        $preview_url = rtrim($r_slice_view_url,'/').'/'.ltrim($preview_url,'/');
    }
} else {
    $preview_url = con_url($r_slice_view_url, "sh_itm=$sh_itm");
}

HtmlPageBegin();   // Print HTML start page tags (html begin, encoding, style sheet, but no title)

// <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline' 'unsafe-eval'">
?>
</head>
<!-- frames -->
<frameset  rows="30,*">
   <frame name="Navigation" src="<?php echo con_url(StateUrl("prev_navigation.php3"),"sh_itm=$sh_itm&return_url=$return_url"); ?>" marginwidth="10" marginheight="10" scrolling="no" frameborder="0">
   <frame name="Item" src="<?php echo $preview_url; ?>" marginwidth="10" marginheight="10" scrolling="auto" frameborder="0">
</frameset>
</html>
