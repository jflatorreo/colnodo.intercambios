<?php
//$Id: modedit.php3 4386 2021-03-09 14:03:45Z honzam $
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

/* Params:
    $template['W'] .. id of site template - new will be based on this one
    $update=1 .. write changes to database
*/

use AA\IO\DB\DB_AA;

$no_slice_id   = $_REQUEST['template']['W'] ? true : false;       // message for init_page.php3

require_once __DIR__."/../../include/init_page.php3";
//require_once __DIR__."/../../include/en_site_lang.php3";
require_once __DIR__."/../../include/formutil.php3";

require_once __DIR__."/../../include/varset.php3";
require_once __DIR__."/../../include/date.php3";
require_once __DIR__."/../../include/modutils.php3";
require_once __DIR__."/../../modules/site/util.php3";

$template_id = $template['W'] ? substr($template['W'],1) : unpack_id('SiteTemplate....');

if ($cancel) {
    go_url( StateUrl(self_base() . "index.php3"));
}

$err = [];          // error array (Init - just for initializing variable
is_object( $db ) || ($db = getDB());

$varset      = new CVarset();
$superadmin  = IsSuperadmin();
$module_id   = $slice_id;

if ($template_id) {        // add module
    if (!CheckPerms( $auth->auth["uid"], "aa", AA_ID, PS_ADD)) {
        MsgPage(StateUrl(self_base())."index.php3", _m("You have not permissions to add slice"));
        exit;
    }
} else {                    // edit module
    if (!CheckPerms( $auth->auth["uid"], "slice", $module_id, PS_MODW_SETTINGS)) {
        MsgPage(StateUrl(self_base())."index.php3", _m("You have not permissions to edit this slice"));
        exit;
    }
}



// additional settings - just make sure it is set
if (!$add) {
    AA_Module_Site::processModuleObject($module_id);
}

if ($add || $update) {
    do {
        if (!$owner ) {  // insert new owner
            if (!($owner = CreateNewOwner($new_owner, $new_owner_email, $err, $varset))) {
                break;
            }
        }

        // validate all fields needed for module table (name, slice_url, lang_file, owner)
        ValidateModuleFields( $name, $slice_url, $priority, $lang_file, $owner, $err );
        $deleted          = ( $deleted  ? 1 : 0 );

        // now validate all module specific fields
        ValidateInput("state_file",   _m("State file"),  $state_file,   $err, false, "text");
        ValidateInput("router",       _m("Router"),      $router,       $err, false, "number");
        ValidateInput("uses_modules", _m("Uses Slices"), $uses_modules, $err, false, "id");

        if (count($err)) {
            break;
        }

        // write all fields needed for module table
        $module_id = WriteModuleFields(($update && $module_id) ? $module_id : false, $superadmin, 'W', $name, $slice_url, $priority, $lang_file, $owner, $deleted );

        if (!$module_id) {   // error?
            break;
        }
        AA::$module_id = $module_id;
        $slice_id      = $module_id;
        $p_module_id   = q_pack_id($module_id);

        // store used modules into relation table
        $varset->doDeleteWhere('relation', "source_id='$p_module_id' AND flag='".REL_FLAG_MODULE_DEPEND."'");
        if (is_array($uses_modules)) {
            foreach ($uses_modules as $rel_slice_id) {
                $varset->clear();
                $varset->add("source_id",      "quoted", $p_module_id);
                $varset->add("destination_id", "quoted", q_pack_id($rel_slice_id));
                $varset->add("flag",           "number", REL_FLAG_MODULE_DEPEND);
                $varset->doInsert('relation');
            }
        }

        // now set all module specific settings
        if ( $update ) {
            $varset->clear();
            $varset->add("state_file",   "text",   $state_file);
            $varset->add("flag",         "number", $router);

            $SQL = "UPDATE site SET ". $varset->makeUPDATE() . " WHERE id='$p_module_id'";
            if (!$db->query($SQL)) {  // not necessary - we have set the halt_on_error
                $err["DB"] = MsgErr("Can't change site");
                break;
            }
        } else { // insert (add)
            $varset->clear();
            // prepare varset variables for setFromArray() function
            $varset->addArray(['id','structure','state_file'], ['flag']);

            if (!($site = DB_AA::select1('', 'SELECT * FROM `site`', [['id', $template_id, 'l']]))) {
                $err["DB"] = MsgErr("Bad template id");
                break;
            }
            $varset->setFromArray($site);
            $varset->set("id",         $module_id,        "unpacked");
            $varset->set("state_file", $state_file,       "quoted");
            $varset->set("flag",       $router,           "number");

            // create new site
            $varset->doInsert('site');

            // copy spots
            $sitespots = DB_AA::select([], 'SELECT spot_id, content FROM `site_spot`', [['site_id', $template_id, 'l']]);
            foreach ($sitespots as $spot) {
                $varset->clear();
                $varset->set("site_id", $module_id, "unpacked" );
                $varset->set("spot_id", $spot['spot_id'], "number" );
                $varset->set("content", $spot['content'], "text" );
                $varset->set("flag", "", "number" );
                $varset->doInsert('site_spot');
            }

            AA_Module_Site::processModuleObject($module_id);
        }
        AA::Pagecache()->invalidateFor($module_id);  // invalidate old cached values for this slice
    } while(false);

    if ( !count($err) ) {
        go_return_or_url(self_base() . "modedit.php3", 0, 0);
    }
}


// And the form -----------------------------------------------------

$source_id   = ($template['W'] ? $template_id : $module_id );
$p_source_id = q_pack_id( $source_id );

// load module common data
[$name, $slice_url, $priority, $lang_file, $owner, $deleted, $slice_owners] = GetModuleFields($source_id);

// load module specific data
$SQL= " SELECT * FROM site WHERE id='$p_source_id'";
$db->query($SQL);
if ($db->next_record()) {
    RestoreVariables($db->record());
}
$id     = unpack_id($db->f("id"));  // correct ids
$router = $db->f("flag");           // router is stored as flag

$module = AA_Module_Site::getModule($source_id);

if ($template['W']) {           // set new name for new module
    $name = "";
}

if ( $template['W'] ) {
    $form_buttons = [
        'insert',
                           'template[W]' => ['type'=>"hidden", 'value'=> $template['W']],
                           'add'         => ['type'=>"hidden", 'value'=> 1],
    ];
} else {
    $form_buttons = [
        'update',
                           "update"  => ['type' => 'hidden', 'value'=>'1'],
    ];
}


$headcode = <<<'EOT'
<script>
    function ModeditSubmit() {
        var lb;
        for (var i = 0; i < listboxes.length; i++) {
           lb = listboxes[i];
           for (var i = 0; i < document.inputform[lb].length; i++) {
               document.inputform[lb].options[i].selected = ( document.inputform[lb].options[i].value != "wIdThTor" );
           }
        }
        return true;
    }
</script>
EOT;


$apage = new AA_Adminpageutil('modadmin', 'main');
$apage->setModuleMenu('modules/site');
$apage->setTitle($template['W'] ? _m("Add Site") : _m("Edit Site"));
$apage->addRequire(get_aa_url('/javascript/js_lib.min.js?v='.AA_JS_VERSION, '', false));
$apage->addRequire($headcode, 'AA_Req_Headcode');
$apage->addRequire('codemirror@5');
//$apage->addRequire($script2run, 'AA_Req_Load');
$apage->setForm();
$apage->printHead($err, $Msg);

?>
<form name="inputform" method=post action="<?php echo StateUrl() ?>" onSubmit="return ModeditSubmit()">
<?php
    FrmTabCaption(_m("Site"), $form_buttons);

    ModW_HiddenRSpotId();
    FrmStaticText(_m("Id"), $module_id);
    FrmInputText("name", _m("Name"), $name, 99, 25, true);
    //$include_cmd = "<br>&lt;!--#include&nbsp;virtual=\"". AA_INSTAL_PATH ."modules/site/site.php3?site_id=$module_id\"--&gt;";
    FrmInputText("slice_url", _m("URL"), $slice_url, 254, 60, false, _m("Main URL of the website."),'', 'false', 'text', 'https://www.example.org/');

    FrmInputText("priority", _m("Priority (order in slice-menu)"), $priority, 5, 5, false);
    FrmInputSelect("owner", _m("Owner"), $slice_owners, $owner, false);
    if ( !$owner ) {
        FrmInputText("new_owner", _m("New Owner"), $new_owner, 99, 25, false);
        FrmInputText("new_owner_email", _m("New Owner's E-mail"), $new_owner_email, 99, 25, false);
    }
    if ($superadmin) {
        FrmInputChBox("deleted", _m("Deleted"), $deleted);
    }
    FrmInputSelect("lang_file", _m("Used Language File"), $MODULES['W']['language_files'], $lang_file, false);
    FrmInputSelect("router",   _m("Router"), [1 => 'AA_Router_Seo'], $router, false, _m("Use AA_Router_Seo. Otherwise you will use old sitemodule approach with 'control file', which we can't recommend."));
    FrmInputText("state_file", _m("Home or State file"), $state_file, 99, 25, false, _m("For AA_Router_Seo fill the <b>default url</b> (home) - like <em>/en/home</em> or left it empty<br><br>For older sites without AA_Router_Seo fill in the name of <b>Site control file</b> - will be placed in /modules/site/sites/ directory. The name you specify will be prefixed by 'site_' prefix, so if you for example name the file as 'apc.php', the site control file will be /modules/site/sites/site_apc.php."),'', 'false', 'text', '/en/home');

    foreach ($g_modules as  $k => $v) {
        if (strpos('SP', $v['type']) !== false) {
            $slice_selection[$k] = $v['name'];
        }
    }
//    $uses_modules = GetTable2Array("SELECT source_id, destination_id FROM relation WHERE source_id='".q_pack_id($module_id)."' AND flag='".REL_FLAG_MODULE_DEPEND."'", "", 'unpack:destination_id');
    $uses_modules = $module->getRelatedSlices();

    FrmTwoBox('uses_modules[]', _m('Uses slices') , $slice_selection, $uses_modules, 8, false, '', '', "Select all slices which you are using for the site. It is used for caching as well as for seo string search.");

    if ($module_id) {
        FrmStaticText(_m("Additional setting"), AA_Module_Site::getModuleObjectForm($module_id), '', '', false);
    }

    FrmTabEnd($form_buttons);

echo "\n </form>";

$apage->printFoot();
