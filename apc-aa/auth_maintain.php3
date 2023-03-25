<?php
/* This script should be called once a day from cron to maintain the
 * Auth tables with the parameter <tt>maintain_auth=1</tt>.
 *
 * @package ReaderInput
 * @version $Id: auth_maintain.php3 4270 2020-08-19 16:06:27Z honzam $
 * @author Jakub Adamek, Econnect
 * @copyright (c) 2002-3 Association for Progressive Communications 
 */

require_once __DIR__."/include/auth.php3";

if ($maintain_auth) {
    AA_Mysqlauth::maintenance();
}
