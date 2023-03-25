<?php
/**
 * Application wide configuration options
 *
 * This is the ActionApps main configuration file. In fact, this file is a PHP
 * script which is included into every AA page, thus, php syntax is used.
 * This basically means that this file defines constants in the form:
 *
 *        $name = "value";
 *    or in the form
 *        define("name", "value);
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
 * @version   $Id: config.php3 3186 2013-02-27 13:25:05Z honzam $
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @copyright Copyright (C) 1999, 2000 Association for Progressive Communications
 * @link      https://www.apc.org/ APC
 *
*/

/** AA_SITE_PATH defines the webserver's home directory. It must be an absolute
 *  path from the root. Make sure to terminate this path with a slash!
 *  Fill in the correct value between the quotes.
 *  It normaly looks like:
 *  define('AA_SITE_PATH', "/home/httpd/html/");
 */
define('AA_SITE_PATH', "/var/www/html/");


/** AA_BASE_DIR defines AA directory under AA_SITE_PATH where is AA installed.
 *  If you concaternate AA_SITE_PATH and AA_BASE_DIR, you should get absolute
 *  path from root to AA directory (where file slice.php3 is in).
 *  Make sure to terminate this path with a slash!
 *  Example:
 *  define('AA_BASE_DIR', "apc-aa/");
 */
define('AA_BASE_DIR', "apc-aa/"); // AA_BASE_DIR is only used in this file so that
                                  // a single change is required for multiple AA
                                  // versions


/** AA_INSTAL_PATH is server url relative path to base AA directory
 *  You need to change this option only if your AA directory accessible through
 *  Apache webserver differ from AA_BASE_DIR (for example if you install AA to
 *  apc-aa-2.6.0 directory and then create defgine aa -> apc-aa-2.6.0 in Apache.
 */
define('AA_INSTAL_PATH', "/".AA_BASE_DIR);  // you can left it as it is


/** Domain in which you want to run AA admin interface - in which domain we can
 *  find AA directory
 *  Make sure to terminate this path with a slash!
 *  Example:
 *  define('AA_HTTP_DOMAIN', "http://aa.apc.org/");
 */
define('AA_HTTP_DOMAIN', "https://organizacion.xyz.org/");


/** ID of AA (any unique 32chars long hexadecimal number)
 *  Please change this value to be unique - use any random hexadecimal number
 *  You MUST set it before you run setup.php3 script - you can't change it later
 *  bacause AA superadmin permission is joined with this number
 */
define("AA_ID", "3ccc9900d8b0bd7fe86a849226c57c42");

/** Organization name
 *  It should be also world unique - it is important to have it unique mainly
 *  if you plan exchange articles between servers
 *  (@see http://apc-aa.sourceforge.net/faq/index.shtml#241)
 */
define("ORG_NAME","An APC Member");


/** DB Access Configuration */
define("DB_HOST",    "localhost"); // server on which the database (MySQL) is
  define("DB_NAME",    "nombre_basededatos");       // Name of database
  define("DB_USER",    "usuario_basededatos");   // User name for database access
  define("DB_PASSWORD","contraseña_basededatos");    // Database password
define("DB_TYPE",    "db_mysql");      // you can (in theory) use also another
                                       // databases like db_odbc, db_mssql, ...

/** Page shown on database error
 *  If you do not specify this page, then some default error messages are
 *  displayed. It is good for debuging, but it is better to not show this
 *  messages to user on production server for security reasons */
//    define("DB_ERROR_PAGE", "https://example.org/out-of-service.php");


/** MySQL 4.1 is able to use different character sets for the communication.
 *  Standard for MySQL client communication in PHP5 is UTF (probably), but if
 *  you are using another character sets (maybe for historical reason), then you
 *  need to specify it by "SET CHARACTER SET" and "SET COLLATION_CONNECTION" SQL
 *  commands. Just set the right values to following variables.
 *  We use (for czech character set "Windows 1250"):
 *     define("DB_CHARACTER_SET", "cp1250");
 *     define("DB_COLLATION_CONNECTION", "cp1250_czech_cs");
 *  Default is: commented out
 */
//define("DB_CHARACTER_SET", "utf8");
//define("DB_COLLATION_CONNECTION", "utf8mb4_czech_ci");
//define("DB_COLLATION_CONNECTION", "utf8_general_ci");
define("DB_CHARACTER_SET", "utf8");
define("DB_COLLATION_CONNECTION", "utf8_general_ci");
//define("DB_CHARACTER_SET", "latin1");
//define("DB_COLLATION_CONNECTION", "latin1_swedish_ci");

/** Use MySQL non-persistent database connect (mysql_connect())
 *  or the persistent one?
 *  Persistent connection should be better for most servers, but if you have
 *  experience troubles in MySQL connection, use non-persistent connections
 *  see http://cz.php.net/manual/en/function.mysql-pconnect.php
 *  Default value: true
 */
define('AA_USE_NON_PERSISTENT_CONNECT', false);

/** Permissions system settings
 *  Select permission system (exactly one of "dummy", "ldap", "sql")
 *  default is "sql" - all user permissions are stored in sql database.
 *  You probably do not need to change this setting
 */
define("PERM_LIB", "sql");

/** LDAP Configuration
*  You need to configure it only if you use "ldap" permission system
*  (@see PERM_LIB above)
*/
// define("LDAP_HOST",   "localhost");
// define("LDAP_BINDDN", "cn=aauser,ou=AA");
// define("LDAP_BINDPW", "somepasswd");  // password
// define("LDAP_BASEDN", "ou=AA");
// define("LDAP_PEOPLE", "ou=People,ou=AA");
// define("LDAP_GROUPS", "ou=AA");
// define("LDAP_ACLS",   "ou=ACLs,ou=AA");
// define("LDAP_PORT",   389);            // standard LDAP port: 389

/** Default language file
 *  Language files are stored in include/lang/ directory. At this time you can
 *  use any *_news_lang.php3, where '*' is one of cz, de, en, es, ja, ro, sk
 *  ( @see http://apc-aa.sourceforge.net/faq/index.shtml#1180 )
 */
define("DEFAULT_LANG_INCLUDE", "es-utf8_news_lang.php3");

/** e-mail for bug reporting contact */
define("ERROR_REPORTING_EMAIL", "direcciondesoporte@organizacion.xyz.org");

/** PHP error reporting
 *  Should PHP display Errors? It is good to switch it off on production server
 */
// error_reporting(0);  // Turn off all error reporting
// error_reporting(E_ALL ^ E_NOTICE); // This is the default value set in php.ini

/** e-mail for Alerts management */
define("ALERTS_EMAIL", "direcciondesoporte@organizacion.xyz.org");

/** Queue script run duration (in seconds)
 *  How long could run the script, which goes through queued tasks and executes
 *  them (toexecute class - used for Alerts mail sending, ...).
 *  Default value is 16.0 [second] */
define('TOEXECUTE_ALLOWED_TIME', 59.0);

/** File uploads settings
 *  The directory for file uploads should be webserver writeable and it
 *  shouldn't be inside AA directory (for security reasons - PHP script upload)
 *  ( @see http://apc-aa.sourceforge.net/faq/index.shtml#fileupload )
 *  ( @see http://apc-aa.sourceforge.net/faq/index.shtml#1118 )
 */
/** url to image/file directory */
define("IMG_UPLOAD_URL", AA_HTTP_DOMAIN."apc-aa-files/");
//define("IMG_UPLOAD_URL", AA_HTTP_DOMAIN."img_upload/");
/** path from server root to image/file directory */
//define("IMG_UPLOAD_PATH", AA_SITE_PATH."img_upload/");
define("IMG_UPLOAD_PATH", AA_SITE_PATH."apc-aa-files/");
/** mkdir perms - AA creates new directory for each slice in image/file upload
*  directory specified above. Each slice then have its own subdirectory.
*  Default is 774 */
define("IMG_UPLOAD_DIR_MODE",  octdec('0774'));
/** perms for uploaded file. If not specified, the permissions are left, as
*  is after the upload (based on configuration of your server
*  Default is: commented out */
// define('IMG_UPLOAD_FILE_MODE', octdec('0664'));

//-----------------------------------------------------------------------------
// Folloving section contains not so important config options and you will
// probably left it as it is

/** number of shown pages links in scroller's navigation bar */
define("SCROLLER_LENGTH", 3);

/** Select color profile for administation pages */
  /* // WebNetworks profile (green - default)
  define("COLOR_TABBG",     "#A8C8B0");           // background of tables
  define("COLOR_TABTITBG",  "#589868");           // background of table titles
  define("COLOR_BACKGROUND","#F5F0E7");           // admin pages background
                                  // you can redefine the colors in styles too
  define("ADMIN_CSS",       "admin.css");         // style for admin interface
  define("ADM_SLICE_CSS",   "adm_slice.css");     // style for public view of
                                                  // not encapsulated slices */

  /* ## IGC profile ##
  define("COLOR_TABBG",     "#A8C8B0");           // background of tables
  define("COLOR_TABTITBG",  "#589868");           // background of table titles
  define("COLOR_BACKGROUND","#F5F0E7");           // admin pages background
                                  // you can redefine the colors in styles too
  define("ADMIN_CSS",       "admin-igc.css");     // style for admin interface
  define("ADM_SLICE_CSS",   "adm_slice-igc.css"); // style for public view of
                                                  // not encapsulated slices */

  /* ## Comlink profile ##
  define("COLOR_TABBG",     "#A8C8B0");           // background of tables
  define("COLOR_TABTITBG",  "#589868");           // background of table titles
  define("COLOR_BACKGROUND","#F5F0E7");           // admin pages background
                                  // you can redefine the colors in styles too
  define("ADMIN_CSS",       "admin-cml.css");     // style for admin interface
  define("ADM_SLICE_CSS",   "adm_slice-cml.css"); // style for public view of
                                                  // not encapsulated slices */
  // ## Econnects profile ##
  define("COLOR_TABBG",     "#EBDABE");           // background of tables
  define("COLOR_TABTITBG",  "#584011");           // background of table titles
  define("COLOR_BACKGROUND","#F5F0E7");           // admin pages background
                                  // you can redefine the colors in styles too
  define("ADMIN_CSS",       "admin-ecn.css");     // style for admin interface
  define("ADM_SLICE_CSS",   "adm_slice.css");     // style for public view of

/** Page cache setting
 *  pages with items/views/slices/sites are automaticaly cached by AA
 *  The caching system is quite smart - it caches only unchanged pages.
 *  However, You can switch caching off. */
define( "ENABLE_PAGE_CACHE", true );

/** CACHE_TTL defines the time in seconds the page will be stored in cache
*  (Time To Live) - in fact it can be infinity because of automatic cache
*  flushing on page change (but then there will be problem with item
*  expiration). Typically this is 600, i.e. 10 minutes, but 1 day (86400)
*  makes for faster serving
*  See: https://actionapps.org/en/Troubleshooting_and_Optimization#Caching
*/
define("CACHE_TTL", 10800 ); // 3 hours


/** Convertors - you can install it and then use
 *  Just uncomment and fill the right path and convert option will be shown
 *  above any textarea in inputform, where you allow HTML
 */
  // $CONV_HTMLFILTERS = array( ".doc" => "/usr/local/bin/wvHtml",
  //                            ".pdf" => "/usr/local/bin/pdftohtml",
  //                            ".xls" => "/usr/bin/xlhtml",
  //                            ".ppt" => "/usr/bin/ppthtml",
  //                            "iconv"=> "/usr/bin/iconv" );
  // define(CONV_DEFAULTENCODING,'windows-1250');   // default output encoding
  // define(CONV_SYSTEMENCODING,'utf-8');

/** If true, the expired items could be displayed by in specific query
 *  (good for archive display). If false, expired items are never shown */
define("ALLOW_DISPLAY_EXPIRED_ITEMS", true);

/** Maximum number of items, which can be related to some item */
define( "MAX_RELATED_COUNT", 128 );

/** Since v1.8 you can use short id for item identification
 *  (x instead of sh_itm) */
$USE_SHORT_URL = true;

//-----------------------------------------------------------------------------
// Following section just prepares some constants
// You probably do not need to change this

if ( !defined('AA_SITE_PATH') OR (strlen(AA_SITE_PATH) < 1)) {
    echo "you must set AA_SITE_PATH and other variables in config.php3 !";
}

/** URL of aa instalation */
define("AA_INSTAL_URL", AA_HTTP_DOMAIN. substr(AA_INSTAL_PATH,1));    // do not change

/** URL of index of help files for AA */
define("DOCUMENTATION_URL", "https://actionapps.org/aa/doc");

/** developer SITE_CONFIG
 *  Note: developers can put their site-specific config in SITE_CONFIG
 *  Only the first define() has any effect.
 *  Therefore, if constants are defined in SITE_CONFIG and also defined
 *  in the //add new CONSTANTS section, the second definitions do not take hold.
 *
 *  Switches here are based on SERVER_ADDR so that all virtual hosts
 *  can be configured in one place
 */
/*
  switch ($SERVER_ADDR) {
    case "209.220.30.175":
    case "209.220.30.171":
      define (SITE_CONFIG, "config-cyborganic.inc"); break;
  }

  if (defined ("SITE_CONFIG")) {
    // require does not work as expected inside control structures!
    include (__DIR__ . SITE_CONFIG);
  }
*/

/** Filemanager is special feature which allows you to modify static files right
 *  inside AA admin interface.
 *  It's not necessary to configure it here, if you don't plan to use it.
 *  ( @see http://apc-aa.sourceforge.net/faq/index.shtml#1106 )
 *  ( @see http://apc-aa.sourceforge.net/faq/index.shtml#fileman )
 */
/** mkdir perms, set by variable because constants don't work with octal
*  values */
define('FILEMAN_MODE_DIR', octdec('0770'));
/** create file perms */
define('FILEMAN_MODE_FILE', octdec('0664'));
/** in this directory individual slice directories and directory "templates"
*  are created  */
define("FILEMAN_BASE_DIR",AA_SITE_PATH."apc-aa-files/");
/** URL path to the base directory */
define("FILEMAN_BASE_URL",AA_HTTP_DOMAIN."apc-aa-files/");
/** time in seconds to allow to upload big files */
define("FILEMAN_UPLOAD_TIME_LIMIT", 600);

/** XMGETTEXT language files - this setting is needed only for AA developers
 *  who want to run xmgettext (see misc/mgettext/index.php3). */
$XMGETTEXT_DESTINATION_DIR = "/www/php_rw/lang/";

/** MAILMAN synchronization dir. In this directory are placed the
 * files with lists of email addresses which processes mailman.
 * The dir must exist, it is not created by the mailman.php3 script.
 * ( @see http://apc-aa.sourceforge.net/faq/index.shtml#email )   */
$MAILMAN_SYNCHRO_DIR = "/www/mailman/";
