<?php
// $Id: xmgettext.php3 2291 2006-07-27 15:11:49Z honzam $
// Language: CZ-UTF8
// This file was created automatically by the Mini GetText environment
// on 5.9.2008 16:13

// Do not change this file otherwise than by typing translations on the right of =

// Before each message there are links to program code where it was used.

$mgettext_lang = "cz-utf8";
define("DB_COLLATION", "utf8mb4_czech_ci");
setlocale(LC_ALL, 'cs_CZ.utf8', 'cs_CZ');  // sort, date, uppercase, ..
setlocale(LC_NUMERIC, 'en_US');            // use numeric with dot - there is problem, when
                                           // used Czech numeric comma for example in AA_Stringexpand_If:
                                           //   $cmp  = create_function('$b', "return ($etalon $operator". ' $b);');
                                           // float!! value $etalon is then with comma which leads to syntax error

# Unused messages
$_m["Add&nbsp;mutual"]
 = "Vzájemně";

$_m["Must begin with _#.<br>Alias must be exactly ten characters long including \"_#\".<br>Alias should be in upper case letters."]
 = "Musí začínat znaky \"_#\".<br>Alias musí být přesně 10 znaků dlouhý včetně \"_#\".<br>Měl by být kapitálkami.";

$_m["Function used for displaying in inputform. Some of them use the Constants,some of them use the Parameters. To get some more info, use the Wizard with Help."]
 = "Funkce, která se použije pro zobrazení pole ve vstupním formuláři. Některé používají Konstanty, některé používají Parametry. Více informací se dozvíte, když použijete Průvodce s Nápovědou.";

$_m["Use&nbsp;as&nbsp;new"]
 = "Nové&nbsp;dle&nbsp;vybraných";

$_m["Parameters are divided by double dot (:) or (in some special cases) by apostrophy (')."]
 = "Parametry jsou odděleny dvojtečkou (:) nebo (ve speciálních případech) apostrofem (').";

$_m["Which function should be used as default:<BR>Now - default is current date<BR>User ID - current user ID<BR>Text - default is text in Parameter field<br>Date - as default is used current date plus <Parameter> number of days"]
 = "Funkce, která se použije pro generování defaultních hodnot pole:<BR>Now - aktuální datum<BR>User ID - identifikátor přihlášeného uživatele<BR>Text - text uvedený v poli Parametr<br>Date - aktuální datum plus <Parametr> dní";

$_m["If default-type is Text, this sets the default text.<BR>If the default-type is Date, this sets the default date to the current date plus the number of days you set here."]
 = "Parametr pro defaulní hodnoty Text a Date (viz výše)";

$_m["Validate function"]
 = "Funkce pro kontrolu vstupu (validace)";

$_m["This defines how the value is stored in the database.  Generally, use 'Text'.<BR>File will store an uploaded file.<BR>Now will insert the current time, no matter what the user sets.  Uid will insert the identity of the Current user, no matter what the user sets.  Boolean will store either 1 or 0.  "]
 = "Způsob uložení do databáze";

$_m["HTML coded as default"]
 = "defaultně použít HTML kód";

$_m["When you go to Admin-Design, you use an Alias to show this field"]
 = "Aliasy pro políčka v databázi";

$_m["Function which handles the database field and displays it on page<BR>usually, use 'print'.<BR>"]
 = "Funkce, která zajistí zobrazení políčka na stránce";

$_m["Parameter passed to alias handling function. For detail see include/item.php3 file"]
 = "Doplňkový parametr předávaný zobrazovací funkci. Podrobnosti viz include/item.php3 file";

$_m["Help text"]
 = "Nápověda";

$_m["Help text for the alias"]
 = "Nápovědný textík pro tento alias";

$_m["Constant unique id"]
 = "Identifikační číslo hodnoty";

$_m["alerts single usage access"]
 = "zasílání zpráv - jednorázový kód";

$_m["URL where the form will be shown"]
 = "URL na kterém bude formulář zobrazen";

$_m["If you have just created the template, click on 'Step' and the template appears in the select box."]
 = "Pokud jste právě vytvořili šablonu, stiskněte 'Krok' a šablona se objeví v seznamu.";

$_m[" Alias for text of the discussion comment"]
 = " Alias pro text příspěvku";

$_m[" Alias for written by"]
 = " Alias pro autora příspěvku";

$_m[" Alias for comment ID<br>\n"
   ."                             <i>Usage: </i>in form code<br>\n"
   ."                             <i>Example: </i>&lt;input type=hidden name=d_item_id value=\"_#ITEM_ID#\">"]
 = " Alias pro číslo příspěvku<br>\n"
   ."                             <i>Užití: </i>v kódu formuláře<br>\n"
   ."                             <i>Příklad: </i>&lt;input type=hidden name=d_item_id value=\"_#ITEM_ID#\">";

$_m[" Alias for item ID<br>\n"
   ."                             <i>Usage: </i>in form code<br>\n"
   ."                             <i>Example: </i>&lt;input type=hidden name=d_parent value=\"_#DISC_ID#\">"]
 = " Alias pro číslo článku<br>\n"
   ."                             <i>Užití: </i>v kódu formuláře<br>\n"
   ."                             <i>Příklad: </i>&lt;input type=hidden name=d_parent value=\"_#DISC_ID#\">";

$_m["Slice Admin - Slice Settings"]
 = "Nastavení Webíku";

$_m["URL of .shtml page (often left blank)"]
 = "URL .shtml stránky (často ponecháno prázdné)";

$_m["To include the slice in your webpage add the following to your shtml code:"]
 = "Pro zahrnutí webíku do webu přidejte do shtml kódu:";

$_m["Alias pro IP address of author's computer"]
 = "Alias pro IP adresu autorova počítače";

$_m["No permission"]
 = "Neoprávněné";

$_m["Pending"]
 = "Aktuální - Připravené";

$_m["Expired"]
 = "Vypršeno";

$_m["in"]
 = "v";

$_m["Send email wizard"]
 = "Průvodce posláním emailu";

$_m["Select related items"]
 = "Výběr souvisejících článků";

$_m["Change current permissions"]
 = "Změna současných práv";

$_m["Module"]
 = "Modul";

$_m["If you are sure you have typed the correct password, please e-mail <a href=mailto:technical@ecn.cz>technical@ecn.cz</a>."]
 = "Pokud jste si jisti, že zadáváte správné jméno a heslo, obraťte se prosím \n\n"
   ."     na <a href=mailto:actionapps@ecn.cz>actionapps@ecn.cz</a>.\n\n"
   ."     <br>If you are sure you have typed the correct password, please e-mail \n\n"
   ."     <a href=mailto:actionapps@ecn.cz>actionapps@ecn.cz</a>.";

$_m["Show this field as a rich text editor (use only after having installed the necessary components!)"]
 = "Zobraz toto pole v rich text editoru (použijte až po nainstalování potřebných komponent!)";

$_m["Can't upload Image"]
 = "Soubor (obrázek) nelze uložit";

$_m[" -- Empty -- "]
 = " -- žádná -- ";

$_m["User mail"]
 = "Testovací e-mailová adresa";

$_m["No user or template set"]
 = "Nebyl vybrán žádný uživatel (nebo nebyla nalezena šablova e-mailu, což je divné)";

$_m["Email sucessfully sent (Users: %1, Valid emails: %2, Emails sent: %3)"]
 = "E-mail byl odeslán (uživatelů: %1, Platných e-mailových adres: %2, Odeslaných e-mailů: %3)";

$_m["Select readers<br><i>%1 reader(s) selected</i>"]
 = "Zvolte čtenáře<br><i>zvoleno %1 čtenářů</i>";

$_m["Select readers"]
 = "Zvolte čtenáře";

$_m["You can not proceed until you select at least one reader!"]
 = "Nemůžete pokračovat dokud nezvolíte alespoň jednoho čtenáře!";

$_m["Find readers using the Search conditions in Item Manager."]
 = "Najděte čtenáře použitím Vyhledat ve Správě zpráv.";

$_m["Create or edit email template"]
 = "Vytvořit nebo upravit šablonu emailu";

$_m["Use Slice Admin / Email templates to create or edit an email template."]
 = "Použijte Nastavení / Šablony emailů pro vytvoření nebo úpravu šablony emailu.";

$_m["Choose email template"]
 = "Zvolte šablonu emailu";

$_m["You can use all field aliases like in any view."]
 = "Můžete použít všechny aliasy políček jako v kterémkoli pohledu.";

$_m["Send example email to"]
 = "Poslat vzor emailu na";

$_m["This will send emails to all readers selected in Step 1."]
 = "Tímto pošlete emaily všem čtenářům zvoleným v Kroku 1.";

$_m["Delete the email template"]
 = "Smazat šablonu emailu";

$_m["If this was a one-off template, delete it."]
 = "Pokud jste vytvořili šablonu pro jedno použití, smažte ji.";

$_m["Send Emails Wizard"]
 = "Průvodce Posláním Emailu";

$_m["%1 email(s) were sent."]
 = "%1 emailů posláno.";

$_m["Find some more info in %1the doc."]
 = "Najděte více informací v %1dokumentaci.";

$_m["Step"]
 = "Krok";

$_m["Close the wizard"]
 = "Zavřít průvodce";

$_m["index of item within view"]
 = "pořadí článku v rámci pohledu";

$_m["ActionApps"]
 = "APC toolkit";

$_m["Retype New Password"]
 = "Zopakujte Nové Heslo";

$_m["description"]
 = "popis";

$_m["email type"]
 = "typ emailu";

$_m["subject"]
 = "předmět";

$_m["body"]
 = "tělo";

$_m["from (email)"]
 = "od (email)";

$_m["language (charset)"]
 = "jazyk (znaková sada)";

$_m["use HTML"]
 = "použít HTML";

$_m["owner"]
 = "vlastník";

$_m["from"]
 = "od";

$_m["Existing remote imports into the slice "]
 = "Seznam přijímaných webíků do webíku ";

$_m["Cannot open output file:"]
 = "Nelze otevřít výstupní soubor:";

$_m["Cannot open input file:"]
 = "Nelze otevřít vstupní soubor:";

$_m["Cannot write to file"]
 = "Do souboru nelze zapisovat";

$_m["Settings"]
 = "Nastavení";

$_m["You did not permit anonymous editing in slice settings. A form\n"
   ."        allowing only anonymous posting will be shown."]
 = "Nepovolili jste anonymní editování v nastavení webíku. Bude zobrazen\n"
   ."    formulář povolující pouze anonymní vkládání.";

$_m["Warning: You want to show password, but you did not set\n"
   ."                    'Authorized by a password field' in Settings - Anonymous editing."]
 = "POZOR: Chcete zobrazit heslo, ale nenastavili jste 'Autorizované heslem'\n"
   ."     v nastavení webíku - Anonymní upravování.";

$_m["Can't copy image  %s to %s"]
 = "Nelze zkopírovat obrázek %s na %s";

$_m["Bad item ID"]
 = "Špatné číslo zprávy";

$_m["Where are these constants used?"]
 = "Kde jsou konstanty použity?";

$_m["Are you sure you want to PERMANENTLY DELETE this group? Type yes or no."]
 = "Jste si jisti, že chcete PERMANENTNĚ SMAZAT tuto skupinu? Napište ano či ne.";

$_m["Admin - User Management"]
 = "Správa webíku - Uživatelé";

$_m["inserted"]
 = "vložena";

$_m["updated"]
 = "obnovena";

$_m["not stored"]
 = "neuložena";

$_m["Ok: Item "]
 = "OK: Zpráva ";

$_m["If the item id is already in the slice:"]
 = "Pokud zpráva s daným ID již ve webíku je:";

$_m["Update the item"]
 = "Obnov zprávu";

$_m["Cannot read input file"]
 = "Nelze přečíst vstupní soubor";

$_m["File for import does not exists:"]
 = "Vstupní soubor neexistuje";

$_m["ALIASES used in views to print field content"]
 = "ALIASy použité v pohledech k zobrazení obsahu políčka";

$_m["preset \"Search\" in Itme Manager"]
 = "přednastavení \"Hledání\" v administraci";

$_m["preset \"Order\" in Itme Manager"]
 = "přednastavení \"Seřadit\" v administraci";

$_m["Ignore \"Copy field\""]
 = "Nic nekopíruj";

$_m["<p>You can delete only slices which are marked as &quot;<b>deleted</b>&quot; on &quot;<b>Slice</b>&quot; page.</p>"]
 = "<p>Lze vymazat jen webíky, které byly označeny pro vymazání na stránce &quot;<b>Webík</b>&quot;</p>";

$_m["Remove"]
 = "Odstranit";

$_m["you should use a-z, A-Z and 0-9 characters"]
 = "použijte znaky a-z, A-Z a 0-9";

$_m["it must by 5 - 32 characters long"]
 = "musí být dlouhé 5 - 32 znaků";

$_m["only 0-9 A-Z a-z . _ and - are allowed"]
 = "pouze 0-9 A-Z a-z . _ a - jsou povolené";

$_m["Error in parameters for UNIQUE validation: field ID is not 16 but %1 chars long: "]
 = "Chyba v parametrech pro UNIKÁTNÍ validaci: ID políčka je dlouhé %1 místo 16 znaků: ";

$_m["this value is already used, choose another one"]
 = "tato hodnota je už použita, zvolte jinou";

$_m["Switch to:"]
 = "Webík:";

$_m["No module flagged for deletion."]
 = "Žádný modul není označen pro smazaní.";

$_m["Bar image"]
 = "Obrázek pro posuvník";

$_m["url of image for bar"]
 = "URL obrázku pro posuvník";

$_m["Bar width"]
 = "Šířka posuvníku";

$_m["width of poll bar"]
 = "šířka posuvníku";

$_m["Bar height"]
 = "Výška posuvníku";

$_m["height of poll bar"]
 = "výška posuvníku";

$_m["Params"]
 = "Parametry";

$_m["Not in the list of possible values"]
 = "Jsou zadány nepovolené znaky";

# End of unused messages
// ./auth.php, row 50
// ./diff.diff, row 1323, 1382
// central/responder.php, row 150
// include/loginform.inc, row 70
// include/init_page.php3, row 131
$_m["Either your username or your password is not valid."]
 = "Buď jméno nebo heslo nejsou v pořádku.";

// ./diff.diff, row 128, 153
// include/formutil.php3, row 3109
$_m["Use these aliases for database fields"]
 = "Použij následující aliasy databázových polí";

// ./diff.diff, row 140, 159
// admin/um_uedit.php3, row 240
// admin/discedit.php3, row 175
// admin/um_gedit.php3, row 187
// admin/se_fields.php3, row 97
// admin/se_rssfeeds.php3, row 186
// admin/se_views.php3, row 76
// admin/prev_navigation.php3, row 40
// admin/se_nodes.php3, row 171
// include/um_gsrch.php3, row 52
// include/formutil.php3, row 1611, 1667, 3115
// include/mlx.php, row 404
// include/filedit.php3, row 122
$_m["Edit"]
 = "Editace";

// ./diff.diff, row 715
$_m["Can't open url: %1"]
 = "";

// ./diff.diff, row 720
$_m["Problem reading data from url: %1"]
 = "";

// ./diff.diff, row 1092
// include/sliceadd.php3, row 58
$_m["To create the new Slice, please choose a template.\n"
   ."        The new slice will inherit the template's default fields.  \n"
   ."        You can also choose a non-template slice to base the new slice on, \n"
   ."        if it has the fields you want."]
 = "Nový webík můžete vytvořit na základě šablony, nebo zkopírovat nastavení z již existujícího webíku (vytvoří se přesná kopie včetně nastavení .";

// ./diff.diff, row 1099
// admin/slicedit.php3, row 167
// include/sliceadd.php3, row 65
$_m["Template"]
 = "Šablona";

// ./diff.diff, row 1102
// admin/um_uedit.php3, row 333
// admin/um_gedit.php3, row 237
// admin/se_newuser.php3, row 127
// admin/se_rssfeeds.php3, row 188
// admin/sliceadd.php3, row 94
// admin/se_nodes.php3, row 173
// include/formutil.php3, row 62, 1605, 1678, 1711, 1992
// include/profile.php3, row 156
// include/mlx.php, row 408
// include/sliceadd.php3, row 75, 98
$_m["Add"]
 = "Přidat";

// ./diff.diff, row 1107
// include/sliceadd.php3, row 79
$_m["No templates"]
 = "Žádná šablona";

// ./filldisc.php3, row 89, 110
// ./filler.php3, row 301
$_m["Not accepted, sorry. Looks like spam."]
 = "";

// ./filler.php3, row 229
$_m["Not allowed to post comments"]
 = "";

// ./filler.php3, row 250
// ./offline.php3, row 82
$_m["Slice ID not defined"]
 = "ID webíku není definováno";

// ./filler.php3, row 257
// ./offline.php3, row 112
$_m["Bad slice ID"]
 = "Chybné ID webíku";

// ./filler.php3, row 278
// admin/se_inputform.php3, row 234
// include/formutil.php3, row 289, 377
// include/itemfunc.php3, row 678
$_m["No fields defined for this slice"]
 = "V tomto webíku nejsou definována žádná pole (což je divné)";

// ./filler.php3, row 322
$_m["Anonymous posting not admitted."]
 = "Anonymní přidávání není povoleno.";

// ./filler.php3, row 373
$_m["You are not allowed to update this item."]
 = "Nemáte právo upravovat tuto zprávu.";

// ./filler.php3, row 390
$_m["Some error in store item."]
 = "Nějaká chyba při ukládání zprávy.";

// ./offline.php3, row 116
$_m["You don't have permission to fill this slice off-line"]
 = "Nemáte práva pro off-line plnění webíku";

// ./offline.php3, row 138
$_m["Duplicated item send - skipped"]
 = "Duplikované poslání zprávy - přeskočeno";

// ./offline.php3, row 141
$_m["Wrong data (WDDX packet)"]
 = "Chybná data (WDDX packet)";

// ./offline.php3, row 144
$_m["Item OK - stored in database"]
 = "Zpráva uložena v databázi";

// ./offline.php3, row 152
$_m["Now you can dalete local file. "]
 = "Nyní můžete odstranit lokální soubor. ";

// ./offline.php3, row 153
$_m[" Delete "]
 = " Odstranit ";

// ./sql_update.php3, row 1543
$_m["Database checkers"]
 = "";

// ./sql_update.php3, row 1563
// admin/aa_optimize.php3, row 65
// admin/se_rssfeeds.php3, row 189
$_m["Test"]
 = "";

// ./sql_update.php3, row 1566
// admin/aa_optimize.php3, row 68
$_m["Repair"]
 = "";

// ./sql_update.php3, row 1579
// admin/um_uedit.php3, row 339
// admin/se_mapping.php3, row 199
// admin/se_search.php3, row 180
// admin/um_gedit.php3, row 241
// admin/discedit2.php3, row 136
// admin/se_filters.php3, row 256
// admin/se_import.php3, row 126
// include/searchbar.class.php3, row 642
// include/formutil.php3, row 191, 2684
$_m["Update"]
 = "Změnit";

// ./sql_update.php3, row 1626
$_m["Run Update"]
 = "";

// ./sql_update.php3, row 1628
$_m["Restore Data from Backup Tables"]
 = "";

// admin/um_uedit.php3, row 53
// admin/um_gedit.php3, row 50
// admin/se_newuser.php3, row 42
$_m["No permission to create new user"]
 = "Nemáte právo vytvořit uživatele";

// admin/um_uedit.php3, row 71, 86, 109
// admin/um_gedit.php3, row 75, 83
// admin/se_users_add.php3, row 119
// include/um_gsrch.php3, row 31
$_m["Too many users or groups found."]
 = "Nalezeno příliš mnoho uživatelů či skupin.";

// admin/um_uedit.php3, row 71, 86
// admin/um_gedit.php3, row 75
// admin/se_users_add.php3, row 121
// include/um_gsrch.php3, row 34
$_m["No user (group) found"]
 = "Uživatel (skupina) nenalezena";

// admin/um_uedit.php3, row 77, 80, 96
// admin/um_gedit.php3, row 68
$_m["Too much groups found."]
 = "Nalezeno příliš moc skupin.";

// admin/um_uedit.php3, row 77, 80
// admin/um_gedit.php3, row 68
$_m["No groups found"]
 = "Skupina nenalezena";

// admin/um_uedit.php3, row 151
// admin/se_newuser.php3, row 83
// include/um_util.php3, row 358
$_m["User successfully added to permission system"]
 = "Uživatel byl úspěšně přidán do systému";

// admin/um_uedit.php3, row 151
// admin/um_passwd.php3, row 65
$_m["User data modified"]
 = "Údaje o uživateli byly změněny";

// admin/um_uedit.php3, row 161
$_m["User management - Users"]
 = "Správa uživatelů - Uživalelé";

// admin/um_uedit.php3, row 171
$_m["Are you sure you want to delete selected user from whole permission system?"]
 = "Opravdu chcete vymazat uživatele ze systému?";

// admin/um_uedit.php3, row 208
// include/menu_aa.php3, row 48
$_m["New User"]
 = "Nový uživatel";

// admin/um_uedit.php3, row 208, 288
// admin/um_passwd.php3, row 103
// include/menu_aa.php3, row 47
$_m["Edit User"]
 = "Editace uživatele";

// admin/um_uedit.php3, row 215
// admin/um_gedit.php3, row 261
// admin/se_users_add.php3, row 68
// include/menu_aa.php3, row 46
$_m["Users"]
 = "Uživatelé";

// admin/um_uedit.php3, row 223, 314
// admin/um_gedit.php3, row 171, 273
// admin/se_newuser.php3, row 85
// admin/se_users_add.php3, row 70, 75
// include/um_gsrch.php3, row 47
// include/tabledit.php3, row 574
// include/searchbar.class.php3, row 553, 616
$_m["Search"]
 = "Vyhledat";

// admin/um_uedit.php3, row 237
// admin/aarsstest.php3, row 154
// admin/se_history.php3, row 68, 88
// include/perm_sql.php3, row 216, 689
$_m["User"]
 = "Uživatel";

// admin/um_uedit.php3, row 242
// admin/se_inter_export.php3, row 130
// admin/discedit.php3, row 173
// admin/se_inter_import.php3, row 136
// admin/um_gedit.php3, row 189
// admin/slicedel.php3, row 59
// admin/se_fields.php3, row 99, 101
// admin/se_rssfeeds.php3, row 187
// admin/se_views.php3, row 80
// admin/se_nodes.php3, row 172
// include/um_gsrch.php3, row 53
// include/searchbar.class.php3, row 644
// include/formutil.php3, row 1622, 1668, 1713, 1759
// include/profile.php3, row 69
// include/menu_aa.php3, row 41
$_m["Delete"]
 = "Smazat";

// admin/um_uedit.php3, row 289, 293
// admin/um_passwd.php3, row 104
// admin/se_newuser.php3, row 52, 113
// admin/slicewiz.php3, row 82
// admin/setup.php3, row 101, 237
// include/um_util.php3, row 310
$_m["Login name"]
 = "Uživatelské jméno";

// admin/um_uedit.php3, row 290
// admin/um_passwd.php3, row 105
$_m["User Id"]
 = "Id uživatele";

// admin/um_uedit.php3, row 292
// admin/se_newuser.php3, row 107
$_m["New user"]
 = "Nový uživatel";

// admin/um_uedit.php3, row 295
// admin/aarsstest.php3, row 151
// admin/um_passwd.php3, row 107
// admin/se_newuser.php3, row 53, 114
// admin/slicewiz.php3, row 83
// admin/se_nodes.php3, row 185
// admin/setup.php3, row 102, 238
// include/um_util.php3, row 315
$_m["Password"]
 = "Heslo";

// admin/um_uedit.php3, row 296
// admin/um_passwd.php3, row 108
// admin/se_newuser.php3, row 54, 115
// admin/slicewiz.php3, row 84
// include/um_util.php3, row 316
$_m["Retype password"]
 = "Potvrdit heslo";

// admin/um_uedit.php3, row 297
// admin/um_passwd.php3, row 109
// admin/se_newuser.php3, row 59, 116
// admin/slicewiz.php3, row 85
// admin/setup.php3, row 104, 242
// include/um_util.php3, row 312
$_m["First name"]
 = "Jméno";

// admin/um_uedit.php3, row 298
// admin/um_passwd.php3, row 110
// admin/se_newuser.php3, row 58, 117
// admin/slicewiz.php3, row 86
// include/um_util.php3, row 311
$_m["Surname"]
 = "Příjmení";

// admin/um_uedit.php3, row 299
// admin/um_passwd.php3, row 111
// admin/discedit2.php3, row 55, 123
// admin/se_newuser.php3, row 55, 118
// admin/slicewiz.php3, row 87
// admin/setup.php3, row 106, 244
// include/um_util.php3, row 322, 323, 324
$_m["E-mail"]
 = "";

// admin/um_uedit.php3, row 302
// admin/setup.php3, row 96
$_m["Superadmin account"]
 = "Superadmin";

// admin/um_uedit.php3, row 308
// admin/um_gedit.php3, row 162
// admin/se_users_add.php3, row 73
// include/um_gsrch.php3, row 41
// include/menu_aa.php3, row 50
$_m["Groups"]
 = "Skupiny";

// admin/um_uedit.php3, row 310
$_m["All Groups"]
 = "Všechny skupiny";

// admin/um_uedit.php3, row 312
$_m["User's Groups"]
 = "Uživatelovy skupiny";

// admin/se_inter_import2.php3, row 34
// admin/se_mapping.php3, row 36
// admin/se_inter_export.php3, row 33
// admin/se_import2.php3, row 36
// admin/se_inter_import3.php3, row 36
// admin/se_inter_import.php3, row 37
// admin/se_mapping2.php3, row 39
// admin/se_rssfeeds.php3, row 39
// admin/se_filters2.php3, row 43
// admin/se_filters.php3, row 44
// admin/se_import.php3, row 39
$_m["You have not permissions to change feeding setting"]
 = "Nemáte právo měnit nastavení výměny zpráv";

// admin/se_inter_import2.php3, row 50, 67
$_m["Unable to connect and/or retrieve data from the remote node. Contact the administrator of the local node."]
 = "Nepodařilo se navázat spojení nebo přijmout data. Kontaktuje administrátora";

// admin/se_inter_import2.php3, row 57
$_m["No slices available. You have not permissions to import any data of that node. Contact the administrator of the remote slice and check, that he obtained your correct username."]
 = "Źádné dostupné webíky. Nemáte práva přijímat data z tohoto uzlu. Kontaktujte administrátora vzdáleného webíku a zkontrolujte, že obdržel vaše správné uživatelské jméno.";

// admin/se_inter_import2.php3, row 58
$_m["Invalid password for the node name:"]
 = "Neplatné heslo pro uzel: ";

// admin/se_inter_import2.php3, row 58
$_m["Contact the administrator of the local node."]
 = "Kontaktujte administrátora lokálního uzlu.";

// admin/se_inter_import2.php3, row 59
$_m["Remote server returns following error:"]
 = "Vzdálený server hlásí chybu:";

// admin/se_inter_import2.php3, row 77, 85
// admin/se_inter_import.php3, row 84, 126
$_m["Inter node import settings"]
 = "Správa přijímaných webíků";

// admin/se_inter_import2.php3, row 89
$_m["Choose slice"]
 = "Zvolte webík";

// admin/se_inter_import2.php3, row 98
$_m["List of available slices from the node "]
 = "Seznam dostupných webíků z uzlu ";

// admin/se_inter_import2.php3, row 99
$_m["Slice to import"]
 = "Importované webíky";

// admin/se_inter_import2.php3, row 100
$_m["Exact copy"]
 = "Přesná kopie";

// admin/se_inter_import2.php3, row 101
$_m["The slice will be exact copy of the remote slice. All items will be copied including holdingbin and trash bin items. Also on anychange in the remote item, the content will be copied to local copy of the item. The items will have the same long ids (not the short ones!). It make no sence to change items in local copy - it will be overwriten from remote master."]
 = "Webík bude přesnou kopií vzdáleného - kopírovat se budou jak vystavené články, tak i články v zásobníku a koši. Kopírovat se budou i veškeré změny ve zdrojovém webíku. Jediná změněná položka je short_id. Nedává valný smysl měnit takto získané články, protože je velká pravděpodobnost, že budou přepsány ze vzdáleného webíku.";

// admin/se_inputform.php3, row 57
// admin/se_javascript.php3, row 38
// admin/mailman_create_list.php3, row 55
// admin/se_fields.php3, row 43
// admin/se_constant_import.php3, row 46
// admin/se_constant.php3, row 45
// admin/anonym_wizard.php3, row 125
// admin/se_fieldid.php3, row 134
$_m["You have not permissions to change fields settings"]
 = "Nemáte právo měnit nastavení položek";

// admin/se_inputform.php3, row 72
$_m["Field delete OK"]
 = "Pole odstraněno";

// admin/se_inputform.php3, row 116, 446
$_m["Before HTML code"]
 = "HTML kód před tímto polem";

// admin/se_inputform.php3, row 117, 434
$_m["Help for this field"]
 = "Nápověda";

// admin/se_inputform.php3, row 118, 440
$_m["More help"]
 = "Více informací";

// admin/se_inputform.php3, row 119, 379
// admin/se_admin.php3, row 138
// admin/se_compact.php3, row 189
// admin/se_fulltext.php3, row 136
$_m["Default"]
 = "Implicitní";

// admin/se_inputform.php3, row 120
$_m["Input show function"]
 = "Zobrazovací funkce";

// admin/se_inputform.php3, row 122
$_m["Alias must be always _# + 8 UPPERCASE letters, e.g. _#SOMTHING."]
 = "Alias musí být vždy _# + 8 VELKÝCH písmen, např. _#MUJALIAS.";

// admin/se_inputform.php3, row 128, 475
$_m["Alias"]
 = "";

// admin/se_inputform.php3, row 132, 476
// admin/se_profile.php3, row 160
$_m["Function"]
 = "Funkce";

// admin/se_inputform.php3, row 200
// admin/se_fields.php3, row 188
$_m["Fields update successful"]
 = "Nastavení položek úspěšně změněno";

// admin/se_inputform.php3, row 290, 323
// admin/se_fields.php3, row 210, 226
$_m["Admin - configure Fields"]
 = "Správa webíku - Nastavení polí";

// admin/se_inputform.php3, row 296
$_m["You selected slice and not constant group. It is unpossible to change slice. Go up in the list."]
 = "Vybral jste webík a ne konstanty. Webík nelze odtud změnit. Konstanty se nalézají výše v seznamu";

// admin/se_inputform.php3, row 326
$_m["<p>WARNING: Do not change this setting if you are not sure what you're doing!</p>"]
 = "<p>POZOR: Tato nastavení by měl měnit jen ten, kdo ví co dělá!</p>";

// admin/se_inputform.php3, row 336
$_m["Field properties"]
 = "Vlastnosti políčka";

// admin/se_inputform.php3, row 348
$_m["Input type"]
 = "Typ Vstupu";

// admin/se_inputform.php3, row 352
$_m["Input field type in Add / Edit item."]
 = "Typ políčka v Přidat / Upravit zprávu.";

// admin/se_inputform.php3, row 355
// admin/se_constant_import.php3, row 58, 113, 122
// admin/se_constant.php3, row 340
$_m["Constants"]
 = "Hodnoty";

// admin/se_inputform.php3, row 357
$_m["Edit|Use as new|New"]
 = "Upravit|Upravit kopii|Nová skupina";

// admin/se_inputform.php3, row 358
$_m["Choose a Constant Group or a Slice."]
 = "Vyberte Skupinu Konstant nebo Webík.";

// admin/se_inputform.php3, row 371, 388, 401, 417, 477
$_m["Parameters"]
 = "Parametry";

// admin/se_inputform.php3, row 373, 390, 403, 419, 474
// admin/se_csv_import2.php3, row 375
$_m["Help: Parameter Wizard"]
 = "Nápověda: Průvodce Parametry";

// admin/se_inputform.php3, row 386
$_m["How to generate the default value"]
 = "Jak vytvořit implicitní hodnotu";

// admin/se_inputform.php3, row 396
$_m["Validate"]
 = "Zkontrolovat";

// admin/se_inputform.php3, row 405
$_m["Stored as"]
 = "";

// admin/se_inputform.php3, row 405
// admin/se_csv_import.php3, row 216, 220
$_m["Text"]
 = "";

// admin/se_inputform.php3, row 405
$_m["Number"]
 = "";

// admin/se_inputform.php3, row 411
// admin/sliceimp.php3, row 484
// include/formutil.php3, row 202, 2698
$_m["Insert"]
 = "Vložit";

// admin/se_inputform.php3, row 415
$_m["Defines how value is stored in database."]
 = "Určuje způsob uložení hodnoty v databázi";

// admin/se_inputform.php3, row 428
$_m["Show 'HTML' / 'plain text' option"]
 = "Zobrazit volbu 'HTML' / 'prostý text'";

// admin/se_inputform.php3, row 430
$_m["'HTML' as default"]
 = "'HTML' implicitně";

// admin/se_inputform.php3, row 436
$_m["Shown help for this field"]
 = "Nápověda zobrazená pro toto pole ve vstupním formuláři";

// admin/se_inputform.php3, row 442
$_m["Text shown after user click on '?' in input form"]
 = "Nápověda, která se zobrazí po stisku '?' ve vstupním formuláři";

// admin/se_inputform.php3, row 448
$_m["Code shown in input form before this field"]
 = "HTML kód, který se zobrazí ve vstupním formuláři před tímto polem";

// admin/se_inputform.php3, row 453
$_m["Feeding mode"]
 = "Sdílení tohoto pole";

// admin/se_inputform.php3, row 456
$_m["Should the content of this field be copied to another slice if it is fed?"]
 = "Má se kopírovat obsah tohoto políčka do dalších webíků při výměně zpráv mezi webíky?";

// admin/se_inputform.php3, row 459
$_m["ALIASES used in views to print field content (%1)"]
 = "";

// admin/se_inputform.php3, row 475
$_m["8 UPPERCASE letters or _"]
 = "8 VELKÝCH písmen nebo _";

// admin/se_inputform.php3, row 478
// admin/um_gedit.php3, row 256
// admin/se_view.php3, row 87
// include/constants.php3, row 364
// include/constedit.php3, row 84
// include/um_gedit.php3, row 32
// include/tv_email.php3, row 107, 166
$_m["Description"]
 = "Popis";

// admin/sliceexp.php3, row 44
// admin/sliceimp.php3, row 41
$_m["You are not allowed to export / import slices"]
 = "Nemáte právo exportovat / importovat webíky";

// admin/sliceexp.php3, row 68, 145, 149
$_m["Export slice structure"]
 = "Export struktury webíku";

// admin/sliceexp.php3, row 99, 104
$_m["Date export error"]
 = "Chyba při exportování data";

// admin/sliceexp.php3, row 113
$_m["The identificator should be 16 characters long, not "]
 = "Délka identifikátoru musí být 16 znaků, a ne ";

// admin/sliceexp.php3, row 129
$_m["You must select one or more slices to backup"]
 = "Musíte vybrat nějaké webíky pro zálohování";

// admin/sliceexp.php3, row 167
$_m["Choose, if you want export slices structure, data or both."]
 = "Zvolte, chcete-li exportovat strukturu webíku, data nebo obojí.";

// admin/sliceexp.php3, row 168
$_m["Export structure"]
 = "Export struktury";

// admin/sliceexp.php3, row 169
$_m["Export data"]
 = "Export dat";

// admin/sliceexp.php3, row 170
$_m["Export views"]
 = "Export pohledů";

// admin/sliceexp.php3, row 173
$_m["Use compression"]
 = "Komprimovat";

// admin/sliceexp.php3, row 175
$_m["HEX output"]
 = "HEX výstup";

// admin/sliceexp.php3, row 176
$_m["Store exported data in file"]
 = "Uložit exportovaná data do souboru";

// admin/sliceexp.php3, row 177
$_m["Convert to UTF"]
 = "";

// admin/sliceexp.php3, row 180
$_m["Export data from specified dates: "]
 = "Export dat z určitých dnů: ";

// admin/sliceexp.php3, row 181
$_m["From "]
 = "Od ";

// admin/sliceexp.php3, row 182
// admin/se_fieldid.php3, row 271
$_m["to"]
 = "do";

// admin/sliceexp.php3, row 188
$_m["Choose one of two export kinds:"]
 = "Vyberte si jeden ze dvou způsobů exportu:";

// admin/sliceexp.php3, row 194
$_m["When exporting \"to Backup\" you may choose more slices at once."]
 = "Při exportu \"do Backupu\" si můžete vybrat několik šablon najednou.";

// admin/sliceexp.php3, row 195
$_m["Select slices which you WANT to export:"]
 = "Označte webíky, které CHCETE exportovat:";

// admin/sliceexp.php3, row 211
$_m["When exporting \"to another ActionApps\" only the current slice will be exported and you choose its new identificator."]
 = "Při exportu \"do jiného Toolkitu\" se bude exportovat pouze aktuální šablona a vy pro ni zvolíte nový identifikátor.";

// admin/sliceexp.php3, row 212
$_m["Choose a new slice identificator exactly 16 characters long: "]
 = "Zvolte nový identifikátor šablony o délce přesně 16 znaků: ";

// admin/sliceexp.php3, row 218
// admin/sliceexp_text.php3, row 106, 204, 211, 229, 239
$_m["Export to Backup"]
 = "Export do Backupu";

// admin/sliceexp.php3, row 219
$_m["Export to another ActionApps"]
 = "Exportovat do jiné instalace ActionApps";

// admin/constants_sel.php3, row 51
$_m["Editor window - item manager"]
 = "Správa zpráv";

// admin/constants_sel.php3, row 51
$_m["select constants window"]
 = "Filtrování dle konstant";

// admin/constants_sel.php3, row 128
$_m["Select constants"]
 = "Vyber konstanty";

// admin/constants_sel.php3, row 135
// admin/prev_navigation.php3, row 50
// include/formutil.php3, row 67
$_m["OK"]
 = "";

// admin/se_admin.php3, row 44
$_m["You have no permission to set configuration parameters of this slice"]
 = "Nemáte právo nastavovat configurační parametry tohoto webíku";

// admin/se_admin.php3, row 56, 145
// admin/se_compact.php3, row 57, 200
// include/constants.php3, row 505, 547, 565, 614, 646, 673, 695, 735, 762, 786, 818
// include/tableviews.php3, row 158
$_m["Top HTML"]
 = "Horní HTML kód";

// admin/se_admin.php3, row 57, 148
$_m["Item format"]
 = "HTML kód pro zobrazení zprávy";

// admin/se_admin.php3, row 58, 151
// admin/se_compact.php3, row 58, 210
// include/constants.php3, row 510, 549, 567, 618, 648, 675, 698, 740, 764, 791, 823
// include/tableviews.php3, row 162
$_m["Bottom HTML"]
 = "Spodní HTML kód";

// admin/se_admin.php3, row 59, 154
// admin/se_compact.php3, row 59, 233
// admin/se_fulltext.php3, row 58, 152
// include/constants.php3, row 511, 550, 619, 699, 741, 765, 792, 824, 853
$_m["Remove strings"]
 = "Odstraňované řetězce";

// admin/se_admin.php3, row 60, 156
// include/constants.php3, row 540, 560, 640, 663, 690, 721, 752, 780, 812, 844
$_m["HTML code for \"No item found\" message"]
 = "HTML kód místo \"Nenalezena žádná zpráva\"";

// admin/se_admin.php3, row 61
// admin/se_fulltext.php3, row 59, 154
$_m["Show discussion"]
 = "Zobrazit diskusi";

// admin/se_admin.php3, row 74
// admin/se_compact.php3, row 92
// admin/se_fulltext.php3, row 77
// admin/se_view.php3, row 134, 259
$_m["Can't change slice settings"]
 = "Nepodařilo se změnit nastavení webíku";

// admin/se_admin.php3, row 89
$_m["Admin fields update successful"]
 = "Vzheld administrativních stránek úspěšně změněn";

// admin/se_admin.php3, row 115, 132
$_m["Admin - design Item Manager view"]
 = "Správa webíku - Vzhled Administrace";

// admin/se_admin.php3, row 143
$_m["Listing of items in Admin interface"]
 = "Výpis zpráv v administrativních stránkách";

// admin/se_admin.php3, row 146
// admin/se_compact.php3, row 201, 225
// admin/se_fulltext.php3, row 144
$_m["HTML code which appears at the top of slice area"]
 = "HTML kód, který se zobrazí před kódem webíku";

// admin/se_admin.php3, row 149
// admin/se_compact.php3, row 204, 228
// admin/se_fulltext.php3, row 147
$_m["Put here the HTML code combined with aliases form bottom of this page\n"
   ."                     <br>The aliases will be substituted by real values from database when it will be posted to page"]
 = "Sem patří HTML kód v kombinaci s aliasy uvedenými dole na stránce\n"
   ."                     <br>Aliasy budou v okamžiku zobrazování na web nahrazeny skutečnými hodnotami z databáze";

// admin/se_admin.php3, row 152
// admin/se_compact.php3, row 211, 231
// admin/se_fulltext.php3, row 150
$_m["HTML code which appears at the bottom of slice area"]
 = "HTML kód, který se zobrazí za vlasním kódem webíku";

// admin/se_admin.php3, row 155
// admin/se_compact.php3, row 234
// admin/se_fulltext.php3, row 153
$_m["Removes empty brackets etc. Use ## as delimiter."]
 = "Odstraní prázdné závorky atd. Použijte ## jako oddělovač.";

// admin/se_admin.php3, row 157
$_m["Code to be printed when no item is filled (or user have no permission to any item in the slice)"]
 = "Text zobrazený není-li vložena žádná zpráva (nebo uživatel nemá právo žádnou zprávu editovat)";

// admin/se_admin.php3, row 159
$_m["Use special view"]
 = "Použít speciální pohled";

// admin/se_admin.php3, row 160
$_m["You can set special view - template for the Inputform on \"Design\" -> \"View\" page (inputform view)"]
 = "Je možné použís speciálního pohledu jako šablony pro vstupní formulář - viz \"Design\" -> \"View\" - (inputform view)";

// admin/sliceexp_text.php3, row 108
$_m["Wrong slice ID length: "]
 = "Chybná délka ID webíku: ";

// admin/sliceexp_text.php3, row 200
$_m["Can't create temporary file."]
 = "";

// admin/sliceexp_text.php3, row 231
$_m["Wrong slice ID length:"]
 = "Chybná délka ID webíku:";

// admin/sliceexp_text.php3, row 308
$_m["Save this text. You may use it to import the slices into any ActionApps:"]
 = "Tento text si někde uložte. Můžete ho použít pro naimportování šablony do Toolkitu:";

// admin/se_mapping.php3, row 93
// admin/se_filters.php3, row 75
$_m["There are no imported slices"]
 = "Není nastaven žádný webík, ze kterého se mají přijímat zprávy";

// admin/se_mapping.php3, row 115, 115, 236
// admin/se_mapping2.php3, row 64
$_m["-- Not map --"]
 = "-- Nemapovat --";

// admin/se_mapping.php3, row 116, 116, 230
// admin/se_mapping2.php3, row 67
$_m["-- Value --"]
 = "-- Hodnota --";

// admin/se_mapping.php3, row 117, 117, 233
// admin/se_mapping2.php3, row 70
$_m["-- Joined fields --"]
 = "-- Spojení polí --";

// admin/se_mapping.php3, row 118, 118, 244
// admin/se_mapping2.php3, row 73
$_m["-- RSS field or expr --"]
 = "-- výraz pro RSS --";

// admin/se_mapping.php3, row 139, 192
$_m["Admin - Content Pooling - Fields' Mapping"]
 = "Správa webíku - výměna zpráv - mapování polí";

// admin/se_mapping.php3, row 206
$_m["Content Pooling - Fields' mapping"]
 = "Výměna zpráv - mapování polí";

// admin/se_mapping.php3, row 209
$_m["Mapping from slice"]
 = "Mapování z webíku";

// admin/se_mapping.php3, row 213
$_m["Fields' mapping"]
 = "Mapování polí";

// admin/se_mapping.php3, row 218
// admin/se_csv_import2.php3, row 353
// admin/se_filters.php3, row 277
$_m["To"]
 = "Do";

// admin/se_mapping.php3, row 219
// admin/se_csv_import2.php3, row 354
// admin/se_filters.php3, row 276
// include/tv_email.php3, row 176
$_m["From"]
 = "Z";

// admin/se_mapping.php3, row 220
// admin/se_profile.php3, row 161
// admin/se_history.php3, row 72, 85
// admin/se_constant.php3, row 182, 414
// include/constants.php3, row 358
// include/constedit.php3, row 76
// include/searchlib.php3, row 127
$_m["Value"]
 = "Hodnota";

// admin/se_javascript.php3, row 63, 70
// include/menu.php3, row 166
$_m["Field Triggers"]
 = "Javascript pro políčka";

// admin/se_javascript.php3, row 76
$_m["JavaScript for fields"]
 = "JavaScript pro políčka";

// admin/se_javascript.php3, row 78
$_m["Enter code in the JavaScript language. It will be included in the Add / Edit item page (itemedit.php3)."]
 = "Vložte kód v JavaScriptu. Bude zahrnut na stránce Přidat / Upravit zprávu (itemedit.php3).";

// admin/se_javascript.php3, row 83
$_m["Available fields and triggers"]
 = "Dostupná políčka a triggery";

// admin/se_javascript.php3, row 95
$_m["Field IDs"]
 = "ID políček";

// admin/se_javascript.php3, row 102
$_m["Triggers"]
 = "Triggery";

// admin/se_javascript.php3, row 103
$_m["Write trigger functions like"]
 = "Pište triggery jako např.";

// admin/se_javascript.php3, row 103
$_m["see FAQ</a> for more details and examples"]
 = "čtěte FAQ</a> s dalšími detaily a příklady";

// admin/se_javascript.php3, row 105
$_m["Field Type"]
 = "Typ Políčka";

// admin/se_javascript.php3, row 105
$_m["Triggers Available -- see some JavaScript help for when a trigger is run"]
 = "Dostupné Triggery -- v dokumentaci JavaScriptu zjistíte, kdy je který spouštěn";

// admin/se_profile.php3, row 42
// admin/se_users.php3, row 38
$_m["You have not permissions to manage users"]
 = "Nemáte právo ke správě uživatelů";

// admin/se_profile.php3, row 57
// include/profile.class.php3, row 303
$_m["Rule deleted"]
 = "Pravidlo úspěšně vymazáno";

// admin/se_profile.php3, row 62
$_m["Error: Can't add rule"]
 = "Chyba při přidávání nového pravidla";

// admin/se_profile.php3, row 82
$_m["Item number"]
 = "Počet zpráv";

// admin/se_profile.php3, row 83
$_m["Input view ID"]
 = "Pohled pro vstup";

// admin/se_profile.php3, row 84
$_m["Item filter"]
 = "Filtr zpráv";

// admin/se_profile.php3, row 85
$_m["Item order"]
 = "Řazení";

// admin/se_profile.php3, row 86
$_m["Item permissions"]
 = "";

// admin/se_profile.php3, row 87
$_m["Hide field"]
 = "Skrýt políčko";

// admin/se_profile.php3, row 88
$_m["Hide and Fill"]
 = "Skrýt a vyplnit";

// admin/se_profile.php3, row 89
// admin/search_replace.php3, row 761
$_m["Fill field"]
 = "Vyplnit políčko";

// admin/se_profile.php3, row 90
$_m["Predefine field"]
 = "Přednastavit políčíko";

// admin/se_profile.php3, row 91
$_m["Stored query"]
 = "Uložený filtr";

// admin/se_profile.php3, row 92
$_m["UI - manager"]
 = "";

// admin/se_profile.php3, row 93
$_m["UI - manager - hide"]
 = "";

// admin/se_profile.php3, row 94
$_m["UI - inputform"]
 = "";

// admin/se_profile.php3, row 95
$_m["UI - inputform - hide"]
 = "";

// admin/se_profile.php3, row 98
// admin/se_compact.php3, row 219
// admin/se_view.php3, row 154, 155
$_m["Ascending"]
 = "Vzestupně";

// admin/se_profile.php3, row 98
// admin/se_compact.php3, row 219
// admin/se_view.php3, row 154, 155
// include/searchbar.class.php3, row 606
$_m["Descending"]
 = "Sestupně";

// admin/se_profile.php3, row 102, 128
$_m["Admin - user Profiles"]
 = "Správa webíku - Uživatelské profily";

// admin/se_profile.php3, row 135
$_m["Rules"]
 = "Nastavená pravidla";

// admin/se_profile.php3, row 146
$_m["No rule is set"]
 = "Žádné pravidlo nebylo definováno";

// admin/se_profile.php3, row 151
$_m["Add Rule"]
 = "Přidat pravidlo";

// admin/se_profile.php3, row 158
$_m["Rule"]
 = "Pravidlo";

// admin/se_profile.php3, row 159
// admin/se_search.php3, row 147, 164
// admin/se_fields.php3, row 119, 240
// admin/search_replace.php3, row 762
// admin/anonym_wizard.php3, row 208
// admin/se_fieldid.php3, row 305
$_m["Field"]
 = "Položka";

// admin/se_profile.php3, row 162
// admin/search_replace.php3, row 262, 335, 419, 570
// include/formutil.php3, row 1151, 1168
$_m["HTML"]
 = "";

// admin/se_profile.php3, row 168
$_m["Logo (top)"]
 = "";

// admin/se_profile.php3, row 169
$_m["View site (top)"]
 = "";

// admin/se_profile.php3, row 170
$_m["Add Item link (top)"]
 = "";

// admin/se_profile.php3, row 171
$_m["Item Manager link (top)"]
 = "";

// admin/se_profile.php3, row 172
$_m["Slice Admin link (top)"]
 = "";

// admin/se_profile.php3, row 173
$_m["AA link (top)"]
 = "";

// admin/se_profile.php3, row 174
$_m["Central link (top)"]
 = "";

// admin/se_profile.php3, row 175
$_m["Title (top)"]
 = "";

// admin/se_profile.php3, row 176
$_m["Logout link (top)"]
 = "";

// admin/se_profile.php3, row 177
$_m["User Info link (top)"]
 = "";

// admin/se_profile.php3, row 178
$_m["Module Selectbox (top)"]
 = "";

// admin/se_profile.php3, row 179
$_m["Module Switch text (top)"]
 = "";

// admin/se_profile.php3, row 180
$_m["Item Manager Menu: Header (left)"]
 = "";

// admin/se_profile.php3, row 181
$_m["Item Manager Menu: Add Item (left)"]
 = "";

// admin/se_profile.php3, row 182
$_m["Item Manager Menu: Active (left)"]
 = "";

// admin/se_profile.php3, row 183
$_m["Item Manager Menu: Pending (left)"]
 = "";

// admin/se_profile.php3, row 184
$_m["Item Manager Menu: Expired (left)"]
 = "";

// admin/se_profile.php3, row 185
$_m["Item Manager Menu: Holding (left)"]
 = "";

// admin/se_profile.php3, row 186
$_m["Item Manager Menu: Trash (left)"]
 = "";

// admin/se_profile.php3, row 187
$_m["Item Manager Menu: Bookmarks show (left)"]
 = "";

// admin/se_profile.php3, row 188
$_m["Item Manager Menu: Additional 1 (left)"]
 = "";

// admin/se_profile.php3, row 189
$_m["Item Manager Menu: Header 2 (left)"]
 = "";

// admin/se_profile.php3, row 190
$_m["Item Manager Menu: Slice Setting (left)"]
 = "";

// admin/se_profile.php3, row 191
$_m["Item Manager Menu: Empty Trash (left)"]
 = "";

// admin/se_profile.php3, row 192
$_m["Item Manager Menu: CSV Import (left)"]
 = "";

// admin/se_profile.php3, row 193
$_m["Item Manager Menu: Debug (left)"]
 = "";

// admin/se_profile.php3, row 194
$_m["Item Manager Menu: Additional 2 (left)"]
 = "";

// admin/se_profile.php3, row 195
$_m["Add CSS file"]
 = "";

// admin/se_profile.php3, row 198
$_m["Manager Actions"]
 = "";

// admin/se_profile.php3, row 199
$_m["Searchbar - Search Rows"]
 = "";

// admin/se_profile.php3, row 200
$_m["Searchbar - Order Rows"]
 = "";

// admin/se_profile.php3, row 201
$_m["Searchbar - Boomarks"]
 = "";

// admin/se_profile.php3, row 205
$_m["Title (add form)"]
 = "";

// admin/se_profile.php3, row 206
$_m["Top HTML code (add form)"]
 = "";

// admin/se_profile.php3, row 207
$_m["Bottom HTML code (add form)"]
 = "";

// admin/se_profile.php3, row 208
$_m["Button \"Insert\" (add form)"]
 = "";

// admin/se_profile.php3, row 209
$_m["Button \"Insert & View\" (add form)"]
 = "";

// admin/se_profile.php3, row 210
$_m["Button \"Cancel\" (add form)"]
 = "";

// admin/se_profile.php3, row 211
$_m["Title (edit form)"]
 = "";

// admin/se_profile.php3, row 212
$_m["Top HTML code (edit form)"]
 = "";

// admin/se_profile.php3, row 213
$_m["Bottom HTML code (edit form)"]
 = "";

// admin/se_profile.php3, row 214
$_m["Button \"Update\" (edit form)"]
 = "";

// admin/se_profile.php3, row 215
$_m["Button \"Update & View\" (edit form)"]
 = "";

// admin/se_profile.php3, row 216
$_m["Button \"Insert as new\" (edit form)"]
 = "";

// admin/se_profile.php3, row 217
$_m["Button \"Reset form\" (edit form)"]
 = "";

// admin/se_profile.php3, row 218
$_m["Button \"Cancel\" (edit form)"]
 = "";

// admin/se_profile.php3, row 222
$_m["Author Role"]
 = "";

// admin/se_profile.php3, row 223
$_m["Editor Role"]
 = "";

// admin/se_profile.php3, row 224
$_m["Adminostrator Role"]
 = "";

// admin/se_profile.php3, row 225
$_m["Superadmin Role"]
 = "";

// admin/se_profile.php3, row 230
$_m["number of item displayed in Item Manager"]
 = "počet zpráv zobrazených v administraci";

// admin/se_profile.php3, row 231
$_m["id of view used for item input"]
 = "id pohledu použitého pro vstupní formulář";

// admin/se_profile.php3, row 232
$_m["preset \"Search\" in Item Manager"]
 = "";

// admin/se_profile.php3, row 233
$_m["preset \"Order\" in Item Manager"]
 = "";

// admin/se_profile.php3, row 234
$_m["ID of \"Item Set\" which defines the permissions for item - see \"Admin - Item Set\""]
 = "";

// admin/se_profile.php3, row 235
$_m["hide the field in inputform"]
 = "skýt políčko ve vstupním foruláři";

// admin/se_profile.php3, row 236
$_m["hide the field in inputform and fill it by the value"]
 = "skýt políčko ve vstupním foruláři a vyplnit je danou hodnotou";

// admin/se_profile.php3, row 237
$_m["fill the field in inputform by the value"]
 = "vyplnit políčko ve vstupním foruláři vždy danou hodnotou";

// admin/se_profile.php3, row 238
$_m["predefine value of the field in inputform"]
 = "přednastavit hodnotu do políčka ve vstupním formuláři";

// admin/se_profile.php3, row 239
$_m["redefine manager UI - (empty values = do not show)"]
 = "";

// admin/se_profile.php3, row 240
$_m["hide this UI element"]
 = "";

// admin/se_profile.php3, row 241
$_m["redefine inputform UI - (empty values = do not show)"]
 = "";

// admin/se_users.php3, row 99
// admin/discedit.php3, row 133
// admin/discedit2.php3, row 54, 122
// admin/se_users_add.php3, row 48
$_m["Author"]
 = "Autor";

// admin/se_users.php3, row 101
// admin/slicewiz.php3, row 81
// admin/se_users_add.php3, row 51
$_m["Editor"]
 = "";

// admin/se_users.php3, row 103
// admin/se_users_add.php3, row 54
$_m["Administrator"]
 = "Administrátor";

// admin/se_users.php3, row 105
// include/um_util.php3, row 100, 162
$_m["Revoke"]
 = "Odstranit";

// admin/se_users.php3, row 107, 173
$_m["Profile"]
 = "Profil";

// admin/se_users.php3, row 117, 124
$_m["Admin - Permissions"]
 = "Správa webíku - Přístupová práva";

// admin/se_users.php3, row 137
$_m["Change current permisions"]
 = "Změna práv uživatelů";

// admin/se_users.php3, row 172
$_m["Default user profile"]
 = "Společný profil";

// admin/tabledit.php3, row 63
// admin/aarsstest.php3, row 38
// admin/rsstest.php3, row 39
// central/tabledit.php3, row 46
$_m["You have not permissions to this page"]
 = "Nemáte právo přistupovat k této stránce";

// admin/mailman_create_list.php3, row 61, 67
$_m["Admin - Create Mailman List"]
 = "Administrace - Vytvořit Distribuční seznam pro Mailmana";

// admin/mailman_create_list.php3, row 74
$_m["First set Mailman Lists Field in Slice Settings."]
 = "Nejdřív nastavte Políčko se Seznamy Mailmana v Nastavení Webíku.";

// admin/mailman_create_list.php3, row 97
$_m["Error: This list name is already used."]
 = "Chyba: Tento název seznamu je už použit.";

// admin/mailman_create_list.php3, row 129
$_m["The list was successfully created."]
 = "Seznam byl úspěšně vytvořen.";

// admin/mailman_create_list.php3, row 150
$_m["List Settings"]
 = "Nastavení Seznamu";

// admin/mailman_create_list.php3, row 152
$_m["The list will be added to mailman and also\n"
   ."    to the constant group for the field %1 selected as Mailman Lists Field in Slice Settings."]
 = "";

// admin/mailman_create_list.php3, row 153
$_m["All the fields are required."]
 = "Všechna políčka jsou povinná.";

// admin/mailman_create_list.php3, row 154
$_m["List name"]
 = "Název seznamu";

// admin/mailman_create_list.php3, row 156
$_m["Admin email"]
 = "Email Administrátora";

// admin/mailman_create_list.php3, row 158
$_m["Admin password"]
 = "Heslo Administrátora";

// admin/mailman_create_list.php3, row 162
// admin/setup.php3, row 111, 230
$_m["Create"]
 = "Vytvoř";

// admin/write_mail.php3, row 56, 144
// admin/discedit2.php3, row 53, 121
// include/tv_email.php3, row 114, 168
$_m["Subject"]
 = "Předmět";

// admin/write_mail.php3, row 57, 145
// include/tv_email.php3, row 118, 170
$_m["Body"]
 = "Text";

// admin/write_mail.php3, row 58, 146
// include/tv_email.php3, row 122
$_m["From (email)"]
 = "";

// admin/write_mail.php3, row 59, 147
// include/tv_email.php3, row 124
$_m["Reply to (email)"]
 = "";

// admin/write_mail.php3, row 60, 148
// include/tv_email.php3, row 126
$_m["Errors to (email)"]
 = "";

// admin/write_mail.php3, row 61, 149
// include/tv_email.php3, row 128
$_m["Sender (email)"]
 = "Odesílatel (email)";

// admin/write_mail.php3, row 62, 150
// include/tv_email.php3, row 130
$_m["Language (charset)"]
 = "Jazyk (charset)";

// admin/write_mail.php3, row 63, 151
// include/tv_email.php3, row 134
$_m["Use HTML"]
 = "Použít HTML";

// admin/write_mail.php3, row 79
$_m["No template set (which is strange - template was just written to the database"]
 = "Není nastavena šablona (což je divné - šablona právě byla zapsána do databáze)";

// admin/write_mail.php3, row 95
$_m["Email sucessfully sent (Users: %1, Emails sent (valid e-mails...): %2)"]
 = "E-mail byl uspěšně poslán (Uživatelů: %1, Poslaných (validních) e-mailů: %2)";

// admin/write_mail.php3, row 110
$_m["Can't delete email template"]
 = "Nelze vymazat šablonu e-mailu";

// admin/write_mail.php3, row 121
$_m["Write email to users"]
 = "Hromadný e-mail uživatelům";

// admin/write_mail.php3, row 126
$_m["Bulk Email Wizard"]
 = "Zaslání hromadného e-mailu";

// admin/write_mail.php3, row 134
$_m["Recipients"]
 = "Příjemci";

// admin/write_mail.php3, row 134
// admin/search_replace.php3, row 755
$_m["Stored searches for "]
 = "Uložené filtry pro ";

// admin/write_mail.php3, row 136
$_m["View Recipients"]
 = "Zobraz příjemce";

// admin/write_mail.php3, row 137
$_m["Selected users"]
 = "Vybraní uživatelé";

// admin/write_mail.php3, row 138
$_m["Test email address"]
 = "E-mailová adresa pro testování";

// admin/write_mail.php3, row 142
$_m["Write the email"]
 = "Napište e-mail";

// admin/write_mail.php3, row 151
// admin/slicewiz.php3, row 66
// include/tabledit_column.php3, row 158, 161
// include/tableviews.php3, row 176
$_m["no"]
 = "ne";

// admin/write_mail.php3, row 151
// admin/slicewiz.php3, row 66
// include/tabledit_column.php3, row 158, 161
// include/tableviews.php3, row 176
$_m["yes"]
 = "ano";

// admin/write_mail.php3, row 153
// admin/se_rssfeeds.php3, row 205
// admin/anonym_wizard.php3, row 103
$_m["Send"]
 = "Pošli";

// admin/write_mail.php3, row 154
// admin/search_replace.php3, row 768
// admin/usershow.php3, row 154
$_m["Close"]
 = "Zavřít";

// admin/se_inter_export.php3, row 70, 102, 110
$_m["Inter node export settings"]
 = "Správa povolení zasílání webíků";

// admin/se_inter_export.php3, row 84
$_m["No selected export"]
 = "";

// admin/se_inter_export.php3, row 87
$_m["Are you sure you want to delete the export?"]
 = "";

// admin/se_inter_export.php3, row 112
$_m["Existing exports of the slice "]
 = "Seznam uzlů a uživatelů, kam bude zasílán webík ";

// admin/se_inter_export.php3, row 133
$_m["Insert new item"]
 = "Přidejte uzel a uživatele";

// admin/se_inter_export.php3, row 135
$_m["Remote Nodes"]
 = "Seznam uzlů";

// admin/se_inter_export.php3, row 146
$_m["User name"]
 = "Jméno uživatele";

// admin/itemedit.php3, row 90
// admin/related_sel.php3, row 181
$_m["There are too many related items. The number of related items is limited."]
 = "Je vybráno příliš mnoho souvisejících článků.";

// admin/itemedit.php3, row 232
// admin/slicefieldsedit.php3, row 128
$_m["Error: no fields."]
 = "Chyba: žádné políčko.";

// admin/itemedit.php3, row 240
// admin/slicefieldsedit.php3, row 136
$_m["Bad item ID id=%1"]
 = "Špatné číslo článku id=%1";

// admin/itemedit.php3, row 252
$_m["Error: You have no rights to edit item."]
 = "Nemáte práva měnit článek";

// admin/itemedit.php3, row 284
// include/menu.php3, row 73
$_m["Add Item"]
 = "Přidat zprávu";

// admin/itemedit.php3, row 284
$_m["Edit Item"]
 = "Upravit zprávu";

// admin/se_sets.php3, row 44
$_m["You have not permissions to change sets"]
 = "";

// admin/se_sets.php3, row 52
$_m["Name 1"]
 = "";

// admin/se_sets.php3, row 53
// include/constants.php3, row 530, 551, 630, 653, 680, 711, 770, 802, 834
$_m["Condition 1"]
 = "Podmínka 1";

// admin/se_sets.php3, row 54
$_m["Object ID 1"]
 = "";

// admin/se_sets.php3, row 56
$_m["Name 2"]
 = "";

// admin/se_sets.php3, row 57
// include/constants.php3, row 533, 554, 633, 656, 683, 714, 773, 805, 837
$_m["Condition 2"]
 = "Podmínka 2";

// admin/se_sets.php3, row 58
$_m["Object ID 2"]
 = "";

// admin/se_sets.php3, row 60
$_m["Name 3"]
 = "";

// admin/se_sets.php3, row 61
// include/constants.php3, row 536, 557, 636, 659, 686, 717, 776, 808, 840
$_m["Condition 3"]
 = "Podmínka 3";

// admin/se_sets.php3, row 62
$_m["Object ID 3"]
 = "";

// admin/se_sets.php3, row 64
$_m["Name 4"]
 = "";

// admin/se_sets.php3, row 65
$_m["Condition 4"]
 = "";

// admin/se_sets.php3, row 66
$_m["Object ID 4"]
 = "";

// admin/se_sets.php3, row 117
$_m["Sets stored successfully"]
 = "";

// admin/se_sets.php3, row 123, 130
$_m["Admin - Item Sets"]
 = "";

// admin/se_sets.php3, row 141
$_m["Sets"]
 = "";

// admin/se_sets.php3, row 142
$_m["Conditions are in \"d-...\" or \"conds[]\" form - just like:<br> &nbsp; d-headline........,category.......1-BEGIN-Bio (d-&lt;fields&gt;-&lt;operator&gt;-&lt;value&gt;-&lt;fields&gt;-&lt;op...)<br> &nbsp; conds[0][category........]=first&conds[1][switch.........1]=1 (default operator is RLIKE, here!)"]
 = "";

// admin/se_sets.php3, row 153
$_m["ID"]
 = "";

// admin/se_sets.php3, row 154, 159
$_m["Set name %1"]
 = "";

// admin/se_sets.php3, row 154, 159
$_m["use alphanumeric characters only"]
 = "";

// admin/se_sets.php3, row 155, 160
$_m["Conditions %1"]
 = "";

// admin/se_sets.php3, row 155, 160
$_m["Use \"d-...\" or \"conds[]\" conditions"]
 = "";

// admin/feed_to.php3, row 54
$_m["Export Item to Selected Slice"]
 = "Předat zprávu do webíku";

// admin/feed_to.php3, row 59
$_m["Export selected items to selected slice"]
 = "Předat vybrané zprávy do zvolených webíku";

// admin/feed_to.php3, row 62
// admin/slicedit.php3, row 148
// include/constants.php3, row 152
// include/menu_util.php3, row 70
// include/menu.php3, row 136
// include/sliceadd.php3, row 55, 84
$_m["Slice"]
 = "Webík";

// admin/feed_to.php3, row 63
$_m["Holding bin"]
 = "Zásobník";

// admin/feed_to.php3, row 64
// admin/slicedit.php3, row 42
// admin/se_filters.php3, row 278
// include/menu.php3, row 187, 243
$_m["Active"]
 = "Aktuální";

// admin/feed_to.php3, row 65
$_m["Do not export to this slice"]
 = "Neexportovat do webíku";

// admin/feed_to.php3, row 81
$_m["No permission to set feeding for any slice"]
 = "Nemáte právo nastavit výměnu zpráv s žádným webíkem";

// admin/feed_to.php3, row 84
// include/actions.php3, row 146
// include/menu_aa.php3, row 55
$_m["Export"]
 = "Export";

// admin/index.php3, row 94
$_m["You do not have permission to edit items in the slice:"]
 = "Nemáte právo editovat články ve webíku:";

// admin/index.php3, row 162
// admin/se_history.php3, row 213
$_m["ActionApps - Reader Manager"]
 = "ActionApps - Správce čtenářů";

// admin/index.php3, row 163
$_m["ActionApps - Item Manager"]
 = "ActionApps - Správce zpráv";

// admin/sliceimp_xml.php3, row 131
$_m["\n"
   ."ERROR: File doesn't contain SLICEEXPORT"]
 = "";

// admin/sliceimp_xml.php3, row 146, 172, 210
$_m["ERROR: Text is not OK. Check whether you copied it well from the Export."]
 = "";

// admin/sliceimp_xml.php3, row 222
$_m["ERROR: Unsupported version for import"]
 = "";

// admin/sliceimp_xml.php3, row 281
// admin/sliceimp.php3, row 93, 140, 483
$_m["Overwrite"]
 = "Přepsat";

// admin/sliceimp_xml.php3, row 284
$_m["<br>Overwriting view %1"]
 = "";

// admin/sliceimp_xml.php3, row 293
// admin/se_view.php3, row 264
$_m["Can't insert into view."]
 = "Nemohu vložit do view.";

// admin/aarsstest.php3, row 66
// admin/rsstest.php3, row 67
$_m["feed"]
 = "";

// admin/aarsstest.php3, row 67
// admin/rsstest.php3, row 68
$_m["validate"]
 = "validovat";

// admin/aarsstest.php3, row 68
// admin/rsstest.php3, row 69
$_m["show"]
 = "zobrazit";

// admin/aarsstest.php3, row 101, 102
$_m["ActionApps RSS Content Exchange"]
 = "";

// admin/aarsstest.php3, row 103
// admin/rsstest.php3, row 106
$_m["RSS feeds testing page."]
 = "";

// admin/aarsstest.php3, row 105
$_m["No ActionApps RSS Exchange is set."]
 = "";

// admin/aarsstest.php3, row 111
// admin/discedit.php3, row 139
// admin/rsstest.php3, row 114
// include/formutil.php3, row 1659
// include/manager.class.php3, row 198
$_m["Actions"]
 = "Akce";

// admin/aarsstest.php3, row 114
$_m["Newest Item"]
 = "";

// admin/aarsstest.php3, row 115
$_m["change this value if you want to get older items"]
 = "";

// admin/aarsstest.php3, row 118
// admin/rsstest.php3, row 117
$_m["Messages"]
 = "";

// admin/aarsstest.php3, row 123
// admin/rsstest.php3, row 122
$_m["Write"]
 = "";

// admin/aarsstest.php3, row 124
// admin/rsstest.php3, row 123
$_m["update database"]
 = "";

// admin/aarsstest.php3, row 129
// admin/rsstest.php3, row 131
$_m["Node"]
 = "Uzel";

// admin/aarsstest.php3, row 132
$_m["Remote slice"]
 = "Vzdálený webík";

// admin/aarsstest.php3, row 135
$_m["Remote slice ID"]
 = "ID vzdáleného webíku";

// admin/aarsstest.php3, row 138
$_m["Local slice ID"]
 = "ID lokálního webíku";

// admin/aarsstest.php3, row 141
$_m["Feed mode"]
 = "";

// admin/aarsstest.php3, row 146
// admin/rsstest.php3, row 128
$_m["Feed url"]
 = "";

// admin/summarize.php3, row 51
$_m["Summarize slice differences"]
 = "";

// admin/summarize.php3, row 58
$_m["AA - Summarize"]
 = "";

// admin/se_import2.php3, row 134, 136
// admin/se_filters2.php3, row 163
$_m["Content Pooling update successful"]
 = "Nastavení výměny zpráv úspěšně změněno";

// admin/aa_synchronize_remote.php3, row 31
// admin/aa_synchronize.php3, row 32
// admin/aa_synchronize2.php3, row 34
// central/synchronize.php, row 31
// central/synchronize2.php, row 30
// central/synchronize_remote.php, row 27
// central/copyslice.php, row 31
// central/copyslice2.php, row 30
// central/synchronize3.php, row 48
$_m["You don't have permissions to synchronize slices."]
 = "";

// admin/aa_synchronize_remote.php3, row 40
// central/synchronize_remote.php, row 36
$_m["No such command"]
 = "";

// admin/se_inter_import3.php3, row 55
$_m["The import was already created"]
 = "Příjem z webíku byl již vytvořen";

// admin/se_inter_import3.php3, row 116
$_m["The import was successfully created"]
 = "Příjem z webíku úspěšně vytvořen";

// admin/slicefieldsedit.php3, row 149
$_m["Slice Setting"]
 = "Nastavení webíku";

// admin/se_history.php3, row 43
$_m["You have not permissions to view history"]
 = "";

// admin/se_history.php3, row 65
// admin/se_fields.php3, row 241
// admin/slicedit.php3, row 150
// admin/se_view.php3, row 391
// admin/anonym_wizard.php3, row 209
// admin/se_fieldid.php3, row 304
// include/constants.php3, row 363
// include/scroller.php3, row 80
// include/tableviews.php3, row 130, 144
$_m["Id"]
 = "";

// admin/se_history.php3, row 66
$_m["Resource ID"]
 = "";

// admin/se_history.php3, row 67
// include/fileman.php3, row 34
// include/widget.class.php3, row 458
$_m["Type"]
 = "Typ";

// admin/se_history.php3, row 69
$_m["Time"]
 = "";

// admin/se_history.php3, row 70
$_m["Selector"]
 = "";

// admin/se_history.php3, row 71
// admin/se_fields.php3, row 120, 242
// admin/se_constant.php3, row 183, 415
// include/constants.php3, row 359
// include/constedit.php3, row 82
$_m["Priority"]
 = "Řazení";

// admin/se_history.php3, row 73
$_m["Value Type"]
 = "";

// admin/se_history.php3, row 83
$_m["Change ID"]
 = "";

// admin/se_history.php3, row 84
$_m["Field selector"]
 = "";

// admin/se_history.php3, row 86
$_m["Type of value"]
 = "";

// admin/se_history.php3, row 87
$_m["Time of change"]
 = "";

// admin/se_history.php3, row 89
$_m["Item ID"]
 = "";

// admin/discedit.php3, row 61
$_m["You don't have permissions to edit all items."]
 = "Nemáte právo pro editaci všech zpráv.";

// admin/discedit.php3, row 99
$_m["Admin - Discussion comments management"]
 = "Administrace - Správa diskusních příspěvků";

// admin/discedit.php3, row 104
$_m["Are you sure you want to delete selected comment?"]
 = "Opravu chcete smazat příspěvek?";

// admin/discedit.php3, row 115
$_m["Discussion comments management"]
 = "Správa zpráv - Správa diskusních příspěvků";

// admin/discedit.php3, row 125
$_m["Item: "]
 = "Článek: ";

// admin/discedit.php3, row 131
// admin/slicedit.php3, row 151
// include/modutils.php3, row 72
// include/slicedit.php3, row 154
$_m["Title"]
 = "Titulek";

// admin/discedit.php3, row 135
$_m["IP Address"]
 = "";

// admin/discedit.php3, row 137
// admin/discedit2.php3, row 125
// include/widget.class.php3, row 706
$_m["Date"]
 = "Datum";

// admin/discedit.php3, row 148
$_m["No discussion comments"]
 = "Žádné diskusní příspěvky";

// admin/discedit.php3, row 176
$_m["Hide"]
 = "Skrýt";

// admin/discedit.php3, row 176
$_m["Approve"]
 = "Schválit";

// admin/discedit.php3, row 186
// admin/related_sel.php3, row 202
// admin/se_users_add.php3, row 60
// include/util.php3, row 1383
// include/item.php3, row 1583
// include/msgpage.php3, row 84
$_m["Back"]
 = "Zpět";

// admin/se_search.php3, row 38
$_m["You have not permissions to change search settings"]
 = "Nemáte právo měnit nastavení vyhledávání";

// admin/se_search.php3, row 117
$_m["Search fields update successful"]
 = "Nastavení vyhledávacího formuláře úspěšně změněno";

// admin/se_search.php3, row 130, 136
$_m["Admin - design Search Page"]
 = "Správa webíku - Vyhledávací formulář";

// admin/se_search.php3, row 142
$_m["Search form criteria"]
 = "Vyhledávací kritéria";

// admin/se_search.php3, row 147, 165
// admin/se_fields.php3, row 244
// admin/anonym_wizard.php3, row 210
// admin/se_views.php3, row 77
$_m["Show"]
 = "Zobrazit";

// admin/se_search.php3, row 159
$_m["Search in fields"]
 = "Vyhledávat v položkách";

// admin/se_search.php3, row 166
$_m["Default settings"]
 = "Standardni nastavení";

// admin/se_search.php3, row 181
// admin/sliceimp.php3, row 486, 521
// admin/discedit2.php3, row 138
// admin/se_newuser.php3, row 128
// include/formutil.php3, row 200, 204, 2720
// include/widget.class.php3, row 285
$_m["Cancel"]
 = "Storno";

// admin/se_inter_import.php3, row 73
$_m["Missing!!!"]
 = "Neexistuje!!!";

// admin/se_inter_import.php3, row 98
$_m["No selected import"]
 = "";

// admin/se_inter_import.php3, row 101
$_m["Are you sure you want to delete the import?"]
 = "";

// admin/se_inter_import.php3, row 111
// admin/se_nodes.php3, row 112
$_m["No selected node"]
 = "";

// admin/se_inter_import.php3, row 129
$_m["Create new feed from node"]
 = "Přidej výměnu z uzlem ...";

// admin/se_inter_import.php3, row 134
$_m["Existing remote imports into the slice"]
 = "Existující importy do tohoto webíku";

// admin/se_inter_import.php3, row 135
$_m["Imported slices"]
 = "Importované webíky";

// admin/se_inter_import.php3, row 135
$_m["feeds prefixed by (=) are \"exact copy\" feeds"]
 = "(=) označuje výměnu, kde je nastavena \"přesná kopie\"";

// admin/se_inter_import.php3, row 136
$_m["All remote nodes"]
 = "Seznam uzlů";

// admin/se_inter_import.php3, row 137
$_m["Remote node"]
 = "Vzdálený webík";

// admin/um_gedit.php3, row 102
// include/um_gedit.php3, row 49
$_m["Group successfully added to permission system"]
 = "Skupina byla úspěšně přidána";

// admin/um_gedit.php3, row 111
$_m["User management - Groups"]
 = "Správa uživatelů - Skupiny";

// admin/um_gedit.php3, row 121
$_m["Are you sure you want to delete selected group from whole permission system?"]
 = "Opravdu chcete vymazat celou skupinu ze systému?";

// admin/um_gedit.php3, row 158
// include/menu_aa.php3, row 52
$_m["New Group"]
 = "Nová skupina";

// admin/um_gedit.php3, row 158
// include/menu_aa.php3, row 51
$_m["Edit Group"]
 = "Editace skupiny";

// admin/um_gedit.php3, row 184
// admin/setup.php3, row 167
// include/um_gsrch.php3, row 50
// include/constants.php3, row 360
// include/perm_emailsql.php3, row 166, 523
// include/perm_sql.php3, row 177
$_m["Group"]
 = "Skupina";

// admin/um_gedit.php3, row 221
$_m["Edit group"]
 = "Editace skupiny";

// admin/um_gedit.php3, row 223
$_m["New group"]
 = "Nová skupina";

// admin/um_gedit.php3, row 253
$_m["Group Id"]
 = "ID skupiny";

// admin/um_gedit.php3, row 255
// admin/se_constant.php3, row 181, 413
// include/constants.php3, row 357
// include/constedit.php3, row 73
// include/um_gedit.php3, row 31
// include/fileman.php3, row 32
// include/tableviews.php3, row 131, 152
$_m["Name"]
 = "Jméno";

// admin/um_gedit.php3, row 257
$_m["Superadmin group"]
 = "Administrativní skupina";

// admin/um_gedit.php3, row 269
$_m["All Users"]
 = "Všichni uživatelé";

// admin/um_gedit.php3, row 271
$_m["Group's Users"]
 = "Uživatelé ve skupině";

// admin/aa_synchronize.php3, row 46
$_m["Authentification failed, try again"]
 = "";

// admin/aa_synchronize.php3, row 51
// admin/aa_synchronize2.php3, row 69
$_m["Admin - Synchronize ActionApps"]
 = "";

// admin/aa_synchronize.php3, row 63
// admin/aa_synchronize2.php3, row 81
$_m["Admin - Synchronize ActionApps (1/3) - Destination ActionApps"]
 = "";

// admin/aa_synchronize.php3, row 74
// admin/aa_synchronize2.php3, row 92
$_m["Template ActionApps (current)"]
 = "";

// admin/aa_synchronize.php3, row 76
$_m["Remote ActionApps URL"]
 = "";

// admin/aa_synchronize.php3, row 76
$_m["like https://example.org/apc-aa/"]
 = "";

// admin/aa_synchronize.php3, row 77
$_m["Remote Superadmin Username"]
 = "";

// admin/aa_synchronize.php3, row 78
$_m["Remote Superadmin Password"]
 = "";

// admin/um_passwd.php3, row 43
$_m["You have not permissions to change user data"]
 = "Nemáte právo měnit údaje o uživateli";

// admin/um_passwd.php3, row 54, 106
$_m["Current password"]
 = "Současné heslo";

// admin/um_passwd.php3, row 56
$_m["Error in current password - pasword is not changed"]
 = "Špatné heslo - heslo nebylo změněnp";

// admin/um_passwd.php3, row 85, 92
$_m["Change user data"]
 = "Změnit údaje o uživateli";

// admin/sliceimp.php3, row 67
$_m["Slice_ID (%1) has wrong length (%2, should be 32)"]
 = "ID webíku (%1) má špatnou délku (%2, má být 32)";

// admin/sliceimp.php3, row 173, 178, 240, 246, 485
$_m["Insert with new ids"]
 = "Vložit s novými ID";

// admin/sliceimp.php3, row 305, 312
$_m["Can't upload Import file"]
 = "Nemohu nahrát importovaný soubor";

// admin/sliceimp.php3, row 360, 372
$_m["Import exported data (slice structure and content)"]
 = "Importovat exportovaná data (strukturu webíku a články)";

// admin/sliceimp.php3, row 374
$_m["Import exported data"]
 = "Importovat exportovaná data";

// admin/sliceimp.php3, row 379
$_m["Count of imported slices: %d."]
 = "Počet importovaných webíků: %d.";

// admin/sliceimp.php3, row 381, 398
$_m["Added were:"]
 = "Přidán byl:";

// admin/sliceimp.php3, row 388, 405
$_m["Overwritten were:"]
 = "Přepsán byl:";

// admin/sliceimp.php3, row 395
$_m["Count of imported stories: %d."]
 = "Počet importovaných článků: %d.";

// admin/sliceimp.php3, row 412
$_m["Failed were:"]
 = "Chybné:";

// admin/sliceimp.php3, row 426
$_m["Here you can import exported data to toolkit. You can use two types of import:"]
 = "";

// admin/sliceimp.php3, row 431
$_m["Slices with some of the IDs exist already. Change the IDs on the right side of the arrow.<br> Use only hexadecimal characters 0-9,a-f. If you do something wrong (wrong characters count, wrong characters, or if you change the ID on the arrow's left side), that ID will be considered unchanged.</p>"]
 = "";

// admin/sliceimp.php3, row 446
$_m["<p>Views with some of the same IDs exist already. Please edit on the right hands side of the arrow</p>"]
 = "";

// admin/sliceimp.php3, row 461
$_m["<p>Slice content with some of the IDs exist already. Change the IDs on the right side of the arrow.<br> Use only hexadecimal characters 0-9,a-f. </p>"]
 = "";

// admin/sliceimp.php3, row 475
$_m["<p>If you choose OVERWRITE, the slices and data with unchanged ID will be overwritten and the new ones added. <br>If you choose INSERT, the slices and data with ID conflict will be ignored and the new ones added.<br>And finally, if you choose \"Insert with new ids\", slice structures gets new ids and it's content too.</p>"]
 = "";

// admin/sliceimp.php3, row 494
$_m["1) If you have exported data in file, insert it's name here (eg. D:\\data\\apc_aa_slice.aaxml):"]
 = "";

// admin/sliceimp.php3, row 496
$_m["Send file with slice structure and data"]
 = "";

// admin/sliceimp.php3, row 502
$_m["2) If you have exported data in browser's window, insert the exported text into the textarea below:"]
 = "";

// admin/sliceimp.php3, row 515
$_m["Here specify, what do you want to import:"]
 = "";

// admin/sliceimp.php3, row 516
$_m["Import slice definition"]
 = "";

// admin/sliceimp.php3, row 517
$_m["Import slice items"]
 = "";

// admin/sliceimp.php3, row 518
$_m["Import into this slice - whatever file says"]
 = "";

// admin/sliceimp.php3, row 520
$_m["Send the slice structure and data"]
 = "";

// admin/rsstest.php3, row 104, 105
$_m["RSS Feed import test"]
 = "";

// admin/rsstest.php3, row 108
$_m["No RSS Feeds set."]
 = "";

// admin/rsstest.php3, row 134
$_m["Local slice"]
 = "";

// admin/discedit2.php3, row 40
$_m["You do not have permission to edit items in this slice"]
 = "Nemáte právo upravovat zprávy v tomto webíku";

// admin/discedit2.php3, row 56, 124
$_m["Text of discussion comment"]
 = "Text příspěvku";

// admin/discedit2.php3, row 57, 126
$_m["Authors's WWW  - URL"]
 = "WWW autora - URL";

// admin/discedit2.php3, row 58, 127
$_m["Authors's WWW - description"]
 = "WWW autora - popis";

// admin/discedit2.php3, row 59, 128
$_m["Remote address"]
 = "Vzdálená adresa";

// admin/discedit2.php3, row 60
$_m["Free1"]
 = "";

// admin/discedit2.php3, row 100
$_m["Edit discussion"]
 = "Upravit diskusi";

// admin/discedit2.php3, row 110
$_m["Items managment - Discussion comments managment - Edit comment"]
 = "Správa zpráv - Správa diskusních příspěvků - Editace příspěvku";

// admin/discedit2.php3, row 116
$_m["Edit comment"]
 = "Editace příspěvku";

// admin/discedit2.php3, row 129
$_m["Free 1"]
 = "";

// admin/discedit2.php3, row 137
// include/formutil.php3, row 198, 2727
$_m["Reset form"]
 = "Vymazat formulář";

// admin/se_compact.php3, row 42
$_m["You have not permissions to change compact view formatting"]
 = "Nemáte právo měnit vzhled přehledu zpráv";

// admin/se_compact.php3, row 56, 203
// include/constants.php3, row 506, 548, 615, 647, 674, 736, 787, 819
$_m["Odd Rows"]
 = "Lichý záznam";

// admin/se_compact.php3, row 60, 235
$_m["'No item found' message"]
 = "Hláška 'Nenalezena žádná zpráva'";

// admin/se_compact.php3, row 62, 207
// include/constants.php3, row 508, 616, 738, 789, 821
$_m["Even Rows"]
 = "Sudý záznam";

// admin/se_compact.php3, row 65, 224
$_m["Category top HTML"]
 = "Horní HTML kód pro kategorii";

// admin/se_compact.php3, row 66, 227
$_m["Category Headline"]
 = "Nadpis kategorie";

// admin/se_compact.php3, row 67, 230
$_m["Category bottom HTML"]
 = "Spodní HTML kód pro kategorii";

// admin/se_compact.php3, row 99
$_m["Design of compact design successfully changed"]
 = "Vzhled přehledu zpráv byl úspěšně změněm";

// admin/se_compact.php3, row 142, 181
// admin/se_newuser.php3, row 93
$_m["Admin - design Index view"]
 = "Správa webíku - Vzhled přehledu zpráv";

// admin/se_compact.php3, row 181
$_m["Use these boxes ( and the tags listed below ) to control what appears on summary page"]
 = "Na této stránce lze nastavit, co se objeví na stránce přehledu zpráv";

// admin/se_compact.php3, row 195
$_m["HTML code for index view"]
 = "HTML kód pro přehled zpráv";

// admin/se_compact.php3, row 206
// include/constants.php3, row 507, 641, 737, 788, 820
$_m["Use different HTML code for even rows"]
 = "Odlišný HTML kód pro sudé záznamy";

// admin/se_compact.php3, row 208
$_m["You can define different code for odd and ever rows\n"
   ."                         <br>first red, second black, for example"]
 = "TIP: Rozlišením sudých a lichých záznamů lze docílit například odlišení řádků jinými barvami pozadí\n"
   ."                         - první třeba zelený, druhý žlutý, atd.";

// admin/se_compact.php3, row 213
// include/constants.php3, row 522, 625, 746, 797, 829
$_m["Group by"]
 = "Seskupit dle";

// admin/se_compact.php3, row 218
// admin/se_view.php3, row 165
$_m["Whole text"]
 = "Celý text";

// admin/se_compact.php3, row 218
// admin/se_view.php3, row 165
$_m["1st letter"]
 = "1. písmeno";

// admin/se_compact.php3, row 218, 218
// admin/se_view.php3, row 165, 165
$_m["letters"]
 = "písmena";

// admin/se_compact.php3, row 219
// admin/se_view.php3, row 155
$_m["Ascending by Priority"]
 = "Vzestupně dle Řazení";

// admin/se_compact.php3, row 219
// admin/se_view.php3, row 155
$_m["Descending by Priority"]
 = "Sestupně dle Řazení";

// admin/se_compact.php3, row 221
$_m["'by Priority' is usable just for fields using constants (like category)"]
 = "'dle Řazení' lze použít jen pro pole používající konstant (kategorie) - tam take najdete hodnoty pro 'Řazení'";

// admin/se_compact.php3, row 236
$_m["message to show in place of slice.php3, if no item matches the query"]
 = "zpráva, která se objeví při nenalezení žádného odpovídajícího článku";

// admin/se_newuser.php3, row 61
// admin/setup.php3, row 247
// include/um_util.php3, row 318
$_m["Retyped password is not the same as the first one"]
 = "Vyplněná hesla si neodpovídají";

// admin/se_newuser.php3, row 79
// admin/setup.php3, row 273
// include/um_util.php3, row 352
$_m["It is impossible to add user to permission system"]
 = "Nepodařilo se přidat uživatele do systému";

// admin/se_newuser.php3, row 101
$_m["New user in permission system"]
 = "Nový uživatel v systému";

// admin/related_sel.php3, row 134
$_m["Editor window - item manager, related selection window"]
 = "ActionApps - Výběr souvisejících článků";

// admin/slicedel.php3, row 40
// admin/slicedel2.php3, row 40, 44
$_m["You don't have permissions to delete slice."]
 = "Nemáte práva k odstranění webíku.";

// admin/slicedel.php3, row 66, 84
$_m["Admin - Delete Slice"]
 = "Správa webíku - Vymazání webíku";

// admin/slicedel.php3, row 69
$_m["Do you really want to delete this slice and all its fields and all its items?"]
 = "Opravdu chcete smazat tento webík včetně políček a článků?";

// admin/slicedel.php3, row 93
// admin/fileman.php3, row 177
$_m["Delete selected"]
 = "Vymazat vybrané";

// admin/slicedel.php3, row 99
$_m["Select slice to delete"]
 = "Vyber webík pro smazání";

// admin/slicedel.php3, row 100
$_m["Slices to show"]
 = "";

// admin/slicedel.php3, row 100
$_m["Marked as \"Deleted\""]
 = "";

// admin/slicedel.php3, row 101
$_m["This option allows you to display all the slices and delete them, so be careful!"]
 = "";

// admin/slicedel.php3, row 103
$_m["Slices to delete"]
 = "";

// admin/slicedel.php3, row 118
$_m["No slice marked for deletion"]
 = "Žádný webík nebyl označen za vymazaný";

// admin/slicewiz.php3, row 53, 56
$_m["Add Slice Wizard"]
 = "Průvodce Přidáním Webíku";

// admin/slicewiz.php3, row 66
$_m["Copy Views"]
 = "Kopíruj Pohledy";

// admin/slicewiz.php3, row 67
$_m["Categories/Constants"]
 = "Kategorie/Konstanty";

// admin/slicewiz.php3, row 68
$_m["Share with Template"]
 = "Sdílet se Šablonou";

// admin/slicewiz.php3, row 68
$_m["Copy from Template"]
 = "Kopírovat ze Šablony";

// admin/slicewiz.php3, row 77
$_m["[Optional] Create New User"]
 = "[Nepovinné] Vyvořit Nového Uživatele";

// admin/slicewiz.php3, row 80
$_m["Level of Access"]
 = "Úroveň přístupu";

// admin/slicewiz.php3, row 81
// include/constants.php3, row 974
$_m["Slice Administrator"]
 = "Administrátor Webíku.";

// admin/slicewiz.php3, row 92
$_m["Do Not Email Welcome"]
 = "Neposílej vítací email.";

// admin/slicewiz.php3, row 94
$_m["Email Welcome"]
 = "Pošli vítací email.";

// admin/slicewiz.php3, row 104
$_m["Go: Add Slice"]
 = "Jeď: Přidej Webík";

// admin/se_fields.php3, row 213
$_m["Do you really want to delete this field from this slice?"]
 = "Opravdu chcete vymazat toto políčko z webíku?";

// admin/se_fields.php3, row 237
// admin/anonym_wizard.php3, row 204
// admin/se_fieldid.php3, row 290
// include/menu.php3, row 138
// include/searchlib.php3, row 123
$_m["Fields"]
 = "Políčka";

// admin/se_fields.php3, row 243
$_m["Required"]
 = "Povinná";

// admin/se_fields.php3, row 246
$_m["Aliases"]
 = "Aliasy";

// admin/se_fulltext.php3, row 43
$_m["You have not permissions to change fulltext formatting"]
 = "Nemáte právo měnit vzhled výpisu zprávy";

// admin/se_fulltext.php3, row 55, 143
$_m["Top HTML code"]
 = "Horní HTML kód";

// admin/se_fulltext.php3, row 56, 146
$_m["Fulltext HTML code"]
 = "HTML kód textu zprávy";

// admin/se_fulltext.php3, row 57, 149
$_m["Bottom HTML code"]
 = "Spodní HTML kód";

// admin/se_fulltext.php3, row 88
$_m["Fulltext format update successful"]
 = "Vzhled textu zprávy byl úspěšně změněn";

// admin/se_fulltext.php3, row 112, 128
$_m["Admin - design Fulltext view"]
 = "Správa webíku - Vzhled jedné zprávy";

// admin/se_fulltext.php3, row 128
$_m["Use these boxes ( with the tags listed below ) to control what appears on full text view of each item"]
 = "Na této stránce lze nastavit, co se objeví na stránce při prohlížení těla zprávy";

// admin/se_fulltext.php3, row 142
$_m["HTML code for fulltext view"]
 = "HTML kód pro zobrazení zprávy";

// admin/se_fulltext.php3, row 155
$_m["The template for dicsussion you can set on \"Design\" -> \"View\" page"]
 = "Šablonu pro diskusi nastavíte na stránce \"Vzhled\" -> \"Pohledy\"";

// admin/se_fulltext.php3, row 156
$_m["Use HTML tags"]
 = "Diskusi formátovat v HTML";

// admin/se_notify.php3, row 83
// include/slicedit.php3, row 85
$_m["You have not permissions to edit this slice"]
 = "Nemáte právo upravovat tento webík";

// admin/se_notify.php3, row 187, 191, 204
$_m["Email Notifications of Events"]
 = "E-mailová upozornění na události";

// admin/se_notify.php3, row 217
$_m["<h4>New Item in Holding Bin</h4> People can be notified by email when an item is created and put into the Holding Bin.  If you want to make use of this feature, enter the recipients email address below.  In the following fields, you can customize the format of the email they will receive."]
 = "<h4>Nová zpráva v Zásobníku</h4> Kdokoliv může být informován o tom, že přibyla nová zpráva do zásobníku. Adresy příjemců napište níže, do následujících políček pak vyplňte, jak má vypadat e-mail, který pak uživatelé dostanou.";

// admin/se_notify.php3, row 218, 223, 228, 233
$_m["Email addresses, one per line"]
 = "E-mailová adresa (jedna na řádek)";

// admin/se_notify.php3, row 219, 224, 229, 234
$_m["Subject of the Email message"]
 = "Předmět e-mailu (Subject)";

// admin/se_notify.php3, row 220, 225, 230, 235
$_m["Body of the Email message"]
 = "Vlastní e-mailová zpráva";

// admin/se_notify.php3, row 222
$_m["<h4>Item Changed in Holding Bin</h4>  People can be notified by email when an item in the Holding Bin is modified.  If you want to make use of this feature, enter the recipients email address below.  In the following fields, you can customize the format of the email they will receive."]
 = "<h4>Zpráva v Zásobníku byla změněna</h4> Kdokoliv může být informován o tom, že byla změněna zpráva v zásobníku. Adresy příjemců napište níže, do následujících políček pak vyplňte, jak má vypadat e-mail, který pak uživatelé dostanou.";

// admin/se_notify.php3, row 227
$_m["<h4>New Item in Approved Bin</h4>  People can be notified by email when an item is created and put into the Approved Bin.  If you want to make use of this feature, enter the recipients email address below.  In the following fields, you can customize the format of the email they will receive."]
 = "<h4>Nová zpráva mezi Aktuálními</h4> Kdokoliv může být informován o tom, že přibyla nová zpráva na web. Adresy příjemců napište níže, do následujících políček pak vyplňte, jak má vypadat e-mail, který pak uživatelé dostanou.";

// admin/se_notify.php3, row 232
$_m["<h4>Item Changed in Approved Bin</h4>  People can be notified by email when an item in the Approved Bin is modified.  If you want to make use of this feature, enter the recipients email address below.  In the following fields, you can customize the format of the email they will receive."]
 = "<h4>Aktuální zpráva změněna</h4> Kdokoliv může být informován o tom, že byla změněna vystavená zpráva. Adresy příjemců napište níže, do následujících políček pak vyplňte, jak má vypadat e-mail, který pak uživatelé dostanou.";

// admin/slicedit.php3, row 41, 46
$_m["Not allowed"]
 = "Zakázáno";

// admin/slicedit.php3, row 43
// include/menu.php3, row 190, 244
$_m["Hold bin"]
 = "Zásobník";

// admin/slicedit.php3, row 47
// include/formutil.php3, row 3014
$_m["All items"]
 = "Všechny články";

// admin/slicedit.php3, row 48
$_m["Only items posted anonymously"]
 = "Pouze články poslané anonymně";

// admin/slicedit.php3, row 49
$_m["-\"- and not edited in AA"]
 = "-\"- a neupravené v AA";

// admin/slicedit.php3, row 50
$_m["Authorized by a password field"]
 = "Autorizované heslem";

// admin/slicedit.php3, row 51
$_m["Readers, authorized by HTTP auth"]
 = "Čtenáři, autorizovaní pomocí HTTP";

// admin/slicedit.php3, row 115
// include/modutils.php3, row 147
$_m["Select owner"]
 = "Vyber vlastníka";

// admin/slicedit.php3, row 128
// admin/sliceadd.php3, row 60
// admin/se_import.php3, row 86
// include/menu.php3, row 88
$_m["Slice Administration"]
 = "Administrace webíku";

// admin/slicedit.php3, row 134
// admin/setup.php3, row 289
$_m["Add Slice"]
 = "Správa webíku - Přidání webíku";

// admin/slicedit.php3, row 134
$_m["Admin - Slice settings"]
 = "Správa webíku - Úprava webíku";

// admin/slicedit.php3, row 152
// include/modutils.php3, row 74
// include/slicedit.php3, row 156
$_m["URL of .shtml page (often leave blank)"]
 = "URL webíku";

// admin/slicedit.php3, row 153
// include/slicedit.php3, row 158
$_m["Priority (order in slice-menu)"]
 = "Priorita (pořadí ve výběru webíků)";

// admin/slicedit.php3, row 155
// admin/se_view.php3, row 459
// admin/se_views.php3, row 193
$_m["<br>To include slice in your webpage type next line \n"
   ."                         to your shtml code: "]
 = "<br>Webík zahrnete do své *.shtml stránky přidáním \n"
   ."                             následující řádky v HTML kódu: ";

// admin/slicedit.php3, row 160
// include/modutils.php3, row 73
// include/tv_email.php3, row 138
// include/slicedit.php3, row 155
$_m["Owner"]
 = "Vlastník";

// admin/slicedit.php3, row 162
// include/modutils.php3, row 42
// include/slicedit.php3, row 134
$_m["New Owner"]
 = "Nový vlastník";

// admin/slicedit.php3, row 163
// include/modutils.php3, row 43
// include/slicedit.php3, row 135
$_m["New Owner's E-mail"]
 = "E-mail nového vlastníka";

// admin/slicedit.php3, row 165
// include/constants.php3, row 539, 639, 662, 689, 720, 779, 811, 843
// include/slicedit.php3, row 159
$_m["Listing length"]
 = "Počet vypisovaných zpráv";

// admin/slicedit.php3, row 168
$_m["Deleted"]
 = "Vymazán";

// admin/slicedit.php3, row 170
// include/slicedit.php3, row 160
$_m["Allow anonymous posting of items"]
 = "Anonymní vkládání";

// admin/slicedit.php3, row 171
// include/slicedit.php3, row 161
$_m["Allow anonymous editing of items"]
 = "Anonymní upravování";

// admin/slicedit.php3, row 172
// include/slicedit.php3, row 162
$_m["Allow off-line item filling"]
 = "Off-line plnění";

// admin/slicedit.php3, row 173
$_m["Language"]
 = "Jazyk";

// admin/slicedit.php3, row 178
$_m["MLX Control Slice for"]
 = "MLX Control Slice pro";

// admin/slicedit.php3, row 180
$_m["MLX: Language Control Slice"]
 = "MLX: Webík pro správu překladů";

// admin/slicedit.php3, row 185
// include/slicedit.php3, row 167
$_m["File Manager Access"]
 = "Přístup ke Správci Souborů";

// admin/slicedit.php3, row 186
// include/slicedit.php3, row 168
$_m["File Manager Directory"]
 = "Adresář pro Správce Souborů";

// admin/slicedit.php3, row 195
$_m["Auth Group Field"]
 = "Políčko s Auth Skupinami";

// admin/slicedit.php3, row 196
$_m["Mailman Lists Field"]
 = "Políčko se Seznamy Mailmana";

// admin/slicedit.php3, row 199
$_m["Password for Reading"]
 = "Heslo pro Čtení";

// admin/se_view.php3, row 66
$_m["Group by selections"]
 = "Seskupit dle výběrů";

// admin/se_view.php3, row 69
$_m["Yes. Write sort[] to the conds[] field for each Selection."]
 = "Ano. Zpravy v jednotlivých výběrech seřadíte přidáním sort[]";

// admin/se_view.php3, row 72
$_m["No. Use this sort[]:"]
 = "Ne. Pro seřazení celkového výpisu použijte následující sort[]";

// admin/se_view.php3, row 87
$_m["Alerts Selection"]
 = "Zasílání - výběr";

// admin/se_view.php3, row 92
$_m["If you need more selections, use 'Update' and on next Edit two empty boxes appear."]
 = "Další dvě prázné možnosti se vám objeví po odeslání formuláře.";

// admin/se_view.php3, row 219
// admin/se_views.php3, row 40
$_m["You do not have permission to change views"]
 = "Nemáte právo měnit pohledy";

// admin/se_view.php3, row 281
$_m["View successfully changed"]
 = "Pohled byl úspěšně změněn";

// admin/se_view.php3, row 350, 376
// admin/se_views.php3, row 91, 118
$_m["Admin - design View"]
 = "Správa webíku - definice Pohledu";

// admin/se_view.php3, row 388
// admin/se_views.php3, row 124
$_m["Defined Views"]
 = "Definované pohledy";

// admin/se_view.php3, row 391
// admin/se_views.php3, row 77
$_m["show this view"]
 = "zobraz pohled";

// admin/aa_optimize.php3, row 33
$_m["You don't have permissions to do optimize tests."]
 = "";

// admin/aa_optimize.php3, row 79, 91
$_m["Admin - Optimize a Repair ActionApps"]
 = "";

// admin/aa_optimize.php3, row 102
$_m["Optimalizations"]
 = "";

// admin/se_mapping2.php3, row 112
$_m["Fields' mapping update succesful"]
 = "Nastavení mapování polí úspěąně změněno";

// admin/se_rssfeeds.php3, row 113, 165, 172
$_m["Remote RSS Feed administration"]
 = "Správa RSS kanálů";

// admin/se_rssfeeds.php3, row 133
$_m["No selected rssfeed"]
 = "";

// admin/se_rssfeeds.php3, row 136
$_m["Are you sure you want to delete the rssfeed?"]
 = "";

// admin/se_rssfeeds.php3, row 149
$_m["Error: RSS node empty"]
 = "";

// admin/se_rssfeeds.php3, row 174
$_m["Current remote rssfeeds"]
 = "Nastavené RSS kanály";

// admin/se_rssfeeds.php3, row 190
$_m["Map"]
 = "";

// admin/se_rssfeeds.php3, row 193
$_m["Add new rssfeed"]
 = "Přidat RSS kanál";

// admin/se_rssfeeds.php3, row 193
$_m["Edit rssfeed data"]
 = "Editovat RSS kanál";

// admin/se_rssfeeds.php3, row 195
$_m["RSS Feed name"]
 = "Jméno RSS kanálu";

// admin/se_rssfeeds.php3, row 196
$_m["New rssfeed name"]
 = "Nový RSS kanál";

// admin/se_rssfeeds.php3, row 197
$_m["URL of the feed"]
 = "URL RSS kanálu";

// admin/se_rssfeeds.php3, row 198
$_m["e.g. https://www.someplace.com/rss/index.xml"]
 = "např: https://www.someplace.com/rss/index.xml";

// admin/slicedel2.php3, row 63
$_m["Slice successfully deleted, tables are optimized"]
 = "Webík byl vymazán, tabulky byly optimalizovány";

// admin/sliceadd.php3, row 63
$_m["Create New Slice / Module"]
 = "Vytvořit nový Webík / Modul";

// admin/sliceadd.php3, row 79
$_m["Modules"]
 = "Moduly";

// admin/aafinder.php3, row 43
// admin/console.php3, row 36
// include/slicedit.php3, row 90
// include/sliceadd.php3, row 35
$_m["You have not permissions to add slice"]
 = "Nemáte právo přidávat webík";

// admin/aafinder.php3, row 49, 51, 186
// include/menu_aa.php3, row 71
$_m["AA finder"]
 = "AA vyhledávač";

// admin/aafinder.php3, row 128
$_m["Jump"]
 = "Skokan";

// admin/aafinder.php3, row 189
$_m["Find all VIEWS containing in any field the string:"]
 = "Najdi všechny POHLEDY obsahující v kterémkoli poli text:";

// admin/aafinder.php3, row 191, 197, 203, 209
$_m["Go!"]
 = "Jeď!";

// admin/aafinder.php3, row 195
$_m["Find all SLICES containing in any field the string:"]
 = "Najdi všechny WEBÍKY obsahující v kterémkoli poli text:";

// admin/aafinder.php3, row 201
$_m["Find all FIELDS containing in ites definition the string:"]
 = "";

// admin/aafinder.php3, row 207
$_m["Get all informations about the item"]
 = "Zobrazit informace o článku";

// admin/view.php3, row 39
$_m["Administrative view"]
 = "";

// admin/se_constant_import.php3, row 57, 114
// admin/se_constant.php3, row 189, 348
// include/constants.php3, row 620
$_m["Constant Group"]
 = "Skupina hodnot";

// admin/se_constant_import.php3, row 65
// include/constedit_util.php3, row 612
$_m["No constants specified"]
 = "Konstanty nezadány";

// admin/se_constant_import.php3, row 86
// admin/se_constant.php3, row 280
$_m["Constants update successful"]
 = "Změna hodnot úspěšně provedena";

// admin/se_constant_import.php3, row 95, 102
$_m["Admin - Constants Import"]
 = "Administrace - Import konstant";

// admin/se_constant_import.php3, row 121
$_m["Name - Value delimiter"]
 = "Oddělovač jméno - hodnota";

// admin/se_constant_import.php3, row 122
$_m["write each constant to new row in form <name><delimiter><value> (or just <name> if the values should be the same as names)"]
 = "zapište vždy jednu konstantu na řádek ve formátu <jméno><oddělovač><hodnota> (nebo jen <jméno>, pokud má být hodnota a jméno stejné)";

// admin/fileman.php3, row 56
$_m["No permissions for file manager."]
 = "Chybí práva pro správce souborů.";

// admin/fileman.php3, row 62
$_m["Unable to run File Manager"]
 = "Nelze spustit Spravce souborů";

// admin/fileman.php3, row 63
$_m["doesn't exist"]
 = "neexistuje";

// admin/fileman.php3, row 71
$_m["Unable to mkdir"]
 = "Nelze vytvořit adresář";

// admin/fileman.php3, row 99, 105
// include/filedit.php3, row 69, 75
// include/menu.php3, row 167
$_m["File Manager"]
 = "Správce Souborů";

// admin/fileman.php3, row 106
// include/fileman.php3, row 111, 123
$_m["Directory"]
 = "Adresář";

// admin/fileman.php3, row 176
$_m["Unselect all"]
 = "Zrušit výběr";

// admin/fileman.php3, row 220
$_m["Create new file"]
 = "Vytvoř nový soubor";

// admin/fileman.php3, row 223
$_m["Upload file"]
 = "Pošli soubor";

// admin/fileman.php3, row 232
$_m["Copy template dir"]
 = "Zkopíruj adresář šablony";

// admin/fileman.php3, row 235
$_m["Create new directory"]
 = "Vytvoř nový adresář";

// admin/search_replace.php3, row 230
$_m["Fill by value"]
 = "";

// admin/search_replace.php3, row 236
$_m["Returns single value (not multivalue) which is created as result of AA expression specified in Expression. You can use any AA expressions like {ifset:{_#HEADLINE}:...}, ..."]
 = "";

// admin/search_replace.php3, row 263, 336, 420, 571
// include/formutil.php3, row 1153, 1170
$_m["Plain text"]
 = "Prostý text";

// admin/search_replace.php3, row 264, 337, 421
$_m["As for other values of this field"]
 = "";

// admin/search_replace.php3, row 272, 345, 430, 580
$_m["Mark as"]
 = "Nastavit jako";

// admin/search_replace.php3, row 273, 346
$_m["New content"]
 = "Nový obsah";

// admin/search_replace.php3, row 274, 347, 432
$_m["You can use also aliases, so the content \"&lt;i&gt;{abstract........}&lt;/i&gt;&lt;br&gt;{full_text......1}\" is perfectly OK"]
 = "Zde můžete též použít aliasů - třeba takto \"&lt;i&gt;{abstract........}&lt;/i&gt;&lt;br&gt;{full_text......1}\".";

// admin/search_replace.php3, row 304
$_m["Add value to field"]
 = "";

// admin/search_replace.php3, row 310
$_m["Add new value to current content of field, so the field becames multivalue.<br>You can use any AA expressions like {ifset:{_#HEADLINE}:...}, ... for new value."]
 = "";

// admin/search_replace.php3, row 376
$_m["Divide the text to multiple values"]
 = "";

// admin/search_replace.php3, row 384
$_m["Parses the input text and looks for the delimiter. Separates the parts and store them as multiple values to destination field"]
 = "";

// admin/search_replace.php3, row 431
$_m["Source text"]
 = "";

// admin/search_replace.php3, row 433
$_m["Delimiter"]
 = "";

// admin/search_replace.php3, row 500
$_m["Translate"]
 = "";

// admin/search_replace.php3, row 506
$_m["Translates one value after other according to translation table. The result is multivalue, since each value of multivalue field is translated seperately."]
 = "";

// admin/search_replace.php3, row 515
$_m["No translations specified."]
 = "";

// admin/search_replace.php3, row 572
$_m["Unchanged"]
 = "Nezměněno";

// admin/search_replace.php3, row 581
$_m["Translations"]
 = "";

// admin/search_replace.php3, row 582
$_m["Each translation on new line, translations separated by colon : (escape character for colon is #:).<br>You can use also aliases in the translation. There is also special alias _#0, which contain matching text - following translation is perfectly OK:<br><code> Bio:&lt;img src=\"_#0.jpg\"&gt; ({publish_date....})</code><br>You can also use Regular Expressions - in such case the line would be \"<code>:regexp:<regular expression>:<output></code>\". You can use _#0 alias in <output>, which contains whole matching text.<br>Sometimes you want to remove specific value. In such case use <code>AA_NULL</code> text as translated text:<br> <code>Bio:AA_NULL</code><br>You may want also create more than one value from a value. Then separate the values by colon:<br> <code>Bio:Environment:Ecology</code> (\"Bio\" is replaced by two values). You can use any number of values here."]
 = "";

// admin/search_replace.php3, row 605, 635
$_m["Copy field"]
 = "Zkopírovat obsah pole";

// admin/search_replace.php3, row 611, 636
$_m["If you select the field here, the \"New content\" text is not used. Selected field will be copied to the \"Field\" (including multivalues)"]
 = "";

// admin/search_replace.php3, row 619
$_m["Source or destination field is not specified."]
 = "";

// admin/search_replace.php3, row 699
$_m["Items selected: %1, Items sucessfully updated: %2"]
 = "Vybráno článků: %1, Úspěšně změněno: %2";

// admin/search_replace.php3, row 716, 722
$_m["Modify items"]
 = "Hromadná změna článků";

// admin/search_replace.php3, row 739
$_m["Select field..."]
 = "vyber políčko...";

// admin/search_replace.php3, row 755
$_m["Items"]
 = "Články";

// admin/search_replace.php3, row 757
$_m["View items"]
 = "Zobrazit články";

// admin/search_replace.php3, row 758
// include/manager.class.php3, row 590
$_m["Selected items"]
 = "Změnit vybrané";

// admin/search_replace.php3, row 763
$_m["Be very carefull with this. Changes in some fields (Status Code, Publish Date, Slice ID, ...) could be very crucial for your item's data. There is no data validity check - what you will type will be written to the database.<br>You should also know there is no UNDO operation (at least now)."]
 = "POZOR na tuto funkci. Je velmi mocná a dokáže v mžiku poničit mnoho článků. Změny v některých políčcích (tatus Code, Publish Date, Slice ID, ...) mohou způsobit ztrátu dat. Vše je zapsáno ihned do databáze.<br>Je dobré vědět, že tato funkce nemá možnost návratu (UNDO).";

// admin/search_replace.php3, row 765
// admin/se_csv_import2.php3, row 355
$_m["Action"]
 = "Akce";

// admin/search_replace.php3, row 767
$_m["Fill"]
 = "Změnit";

// admin/se_csv_import.php3, row 70
$_m["You have not permissions to import files"]
 = "Nemáte právo importovat soubory";

// admin/se_csv_import.php3, row 75
$_m["Missing slice"]
 = "Webík nenalezen";

// admin/se_csv_import.php3, row 109
$_m["Cannot read input url"]
 = "Nezle načíst vstupní url";

// admin/se_csv_import.php3, row 142
// admin/se_csv_import2.php3, row 476
$_m["Admin - Import .CSV file"]
 = "Správa webíku - Načtení .csv souboru";

// admin/se_csv_import.php3, row 154
$_m["Admin - Import CSV (1/2) - Source data"]
 = "Správa webíku - Načtení .csv (1/2) - Vstupní data";

// admin/se_csv_import.php3, row 160
$_m["Cannot open a file for preview"]
 = "Nelze otevřít soubor pro náhled";

// admin/se_csv_import.php3, row 162
$_m["File preview"]
 = "Náhled souboru";

// admin/se_csv_import.php3, row 195
$_m["CSV format settings"]
 = "Nastaveni CSV formátu";

// admin/se_csv_import.php3, row 214, 218
// include/filedit.php3, row 75
$_m["File"]
 = "Soubor";

// admin/se_csv_import.php3, row 215, 219
// include/widget.class.php3, row 1281
$_m["URL"]
 = "";

// admin/se_csv_import.php3, row 228
$_m["Source of CSV data"]
 = "Zdroj CSV dat";

// admin/se_csv_import.php3, row 251
// admin/se_csv_import2.php3, row 332
// include/actions.php3, row 387
$_m["Preview"]
 = "Náhled";

// admin/se_csv_import.php3, row 252
// include/easy_scroller.php3, row 164, 290
$_m["Next"]
 = "Další";

// admin/usershow.php3, row 93
$_m["Show selected users"]
 = "Zobraz vybrané uživatele";

// admin/se_constant.php3, row 51
$_m["You have not permissions to change category settings"]
 = "Nemáte právo měnit nastavení kategorií";

// admin/se_constant.php3, row 79
$_m["You have not permissions to change fields settings for the slice owning this group"]
 = "Nemáte administrátorská práva k webíku, který vlastní tuto skupinu hodnot";

// admin/se_constant.php3, row 163
$_m[" items changed to new value "]
 = " článků bylo změněno na novou hodnotu ";

// admin/se_constant.php3, row 196
// include/constedit_util.php3, row 608
$_m["This constant group already exists"]
 = "Tato skupina hodnot již existuje";

// admin/se_constant.php3, row 291
$_m["No category field defined in this slice.<br>Add category field to this slice first (see Field page)."]
 = "Pole kategorie není v tomto webíku definováno.<br>  Přidejte pole kategorie do webíku na stránce Políčka.";

// admin/se_constant.php3, row 311, 318
$_m["Admin - Constants Setting"]
 = "Správa webíku - Nastavení hodnot";

// admin/se_constant.php3, row 325
$_m["Delete whole group"]
 = "Smazat celou skupinu";

// admin/se_constant.php3, row 356
$_m["Import Constants..."]
 = "Import konstant...";

// admin/se_constant.php3, row 372
$_m["Constants used in slice"]
 = "Hodnoty použity v";

// admin/se_constant.php3, row 387
$_m["Constant group owner - slice"]
 = "Vlastník skupiny - webík";

// admin/se_constant.php3, row 391
$_m["Whoever first updates values becomes owner."]
 = "Vlastníkem se stane první webík, který upraví hodnoty.";

// admin/se_constant.php3, row 403
$_m["Change owner"]
 = "Změnit vlastníka";

// admin/se_constant.php3, row 409
$_m["Propagate changes into current items"]
 = "Propagovat změny do stávajících článků";

// admin/se_constant.php3, row 411
$_m["Edit in Hierarchical editor (allows to create constant hierarchy)"]
 = "Editovat v Hierarchickém editoru (umožňuje určit hierarchii hodnot)";

// admin/se_constant.php3, row 413
// include/constedit.php3, row 73
$_m["shown&nbsp;on&nbsp;inputpage"]
 = "zobrazeno&nbsp;ve&nbsp;vstupním&nbsp;formuláři";

// admin/se_constant.php3, row 414
// include/constedit.php3, row 76
$_m["stored&nbsp;in&nbsp;database"]
 = "uloženo&nbsp;v&nbsp;databázi";

// admin/se_constant.php3, row 415
// include/constedit.php3, row 82
$_m["constant&nbsp;order"]
 = "Pořadí&nbsp;hodnot";

// admin/se_constant.php3, row 416
// include/fileman.php3, row 112, 121
$_m["Parent"]
 = "Nadkategorie";

// admin/se_constant.php3, row 416
$_m["categories&nbsp;only"]
 = "jen&nbsp;pro&nbsp;kategorie";

// admin/se_constant.php3, row 448
$_m["Are you sure you want to PERMANENTLY DELETE this group?"]
 = "Opravdu chcete NENÁVRATNĚ smazat tyto skupinu konstant?";

// admin/se_filters2.php3, row 89
// include/csn_util.php3, row 95
$_m["Other categories"]
 = "";

// admin/anonym_wizard.php3, row 64
$_m["ActionApps Anonymous form"]
 = "ActionApps Anonymní formulář";

// admin/anonym_wizard.php3, row 65
$_m["Note: If you are using HTMLArea editor in your form, you have to add: %1 to your page.  -->"]
 = "";

// admin/anonym_wizard.php3, row 142
$_m["WARNING: You did not permit anonymous posting in slice settings."]
 = "POZOR: Nepovolili jste anonymní zasílání v nastavení webíku.";

// admin/anonym_wizard.php3, row 145
$_m["WARNING: You did not permit anonymous editing in slice settings. A form allowing only anonymous posting will be shown."]
 = "";

// admin/anonym_wizard.php3, row 153
$_m["WARNING: You want to show password, but you did not set 'Authorized by a password field' in Settings - Anonymous editing."]
 = "";

// admin/anonym_wizard.php3, row 179, 185
$_m["Admin - Anonymous Form Wizard"]
 = "Správa webíku - Průvodce Anonymním Formulářem";

// admin/anonym_wizard.php3, row 191
$_m["Show Form"]
 = "Zobraz formulář";

// admin/anonym_wizard.php3, row 198
$_m["Help"]
 = "Nápověda";

// admin/anonym_wizard.php3, row 198
$_m["Help - Documentation"]
 = "Nápověda - Dokumentace";

// admin/anonym_wizard.php3, row 199
$_m["URLs shown after the form was sent"]
 = "URL zobrazená po odeslání formuláře";

// admin/anonym_wizard.php3, row 200
$_m["OK page"]
 = "OK stránka";

// admin/anonym_wizard.php3, row 201
$_m["Error page"]
 = "Chybová stránka";

// admin/anonym_wizard.php3, row 202
$_m["Use a PHP script to show the result on the OK and Error pages:"]
 = "Použít PHP skript k zobrazení výsledků na OK a Chybové stránce:";

// admin/anonym_wizard.php3, row 211
$_m["Field Id in Form"]
 = "Id políčka ve formuláři";

// admin/anonym_wizard.php3, row 235
$_m["Only fields marked as \"Show\" on the \"Fields\" page\n"
   ."         are offered on this page."]
 = "Na této stránce jsou nabízena pouze políčka \n\n"
   ."    se zatrhnutým \"Zobrazit\" na stránce \"Políčka\"";

// admin/se_views.php3, row 57
$_m["View successfully deleted"]
 = "Pohled by úspěšně smazán";

// admin/se_views.php3, row 80
$_m["Are you sure you want to delete selected view?"]
 = "Víte určitě, že chcete smazat zvolený pohled?";

// admin/se_views.php3, row 144
$_m["Create new view"]
 = "Vytvořit nový pohled";

// admin/se_views.php3, row 147
$_m["by&nbsp;type:"]
 = "dle&nbsp;typu:";

// admin/se_views.php3, row 154, 174
// include/formutil.php3, row 1608, 1615
$_m["New"]
 = "Nový";

// admin/se_views.php3, row 159
$_m["by&nbsp;template:"]
 = "dle&nbsp;šablony:";

// admin/se_fieldid.php3, row 215
$_m["This ID is reserved"]
 = "Toto ID je rezerováno";

// admin/se_fieldid.php3, row 221
$_m["This ID is already used"]
 = "Toto ID je již použito";

// admin/se_fieldid.php3, row 240, 247, 256
$_m["Admin - change Field IDs"]
 = "Správa webíku - Změna ID políčka";

// admin/se_fieldid.php3, row 251
$_m["field IDs were changed"]
 = "ID políčka bylo změněno";

// admin/se_fieldid.php3, row 258
$_m["This page allows to change field IDs. It is a bit dangerous operation and may last long.\n"
   ."    You need to do it only in special cases, like using search form for multiple slices. <br><br>\n"
   ."    Choose a field ID to be changed and the new name and number, the dots ..... will be\n"
   ."    added automatically.<br>"]
 = "Tato stránka umožňuje změnit identifikátory jednotlivých políček. \n"
   ."     Je to poměrně nebezpečná operace a může trvat dlouho. Je dost \n"
   ."     pravděpodobné, že tuto operaci nikdy nevyužijete - používá se jen \n"
   ."     ve výjimečných případech (nastavení formuláře pro vyhledávání ve více \n"
   ."     webících.<br><br>\n"
   ."     Vyberte ID políčka, které chcete změnit a potom nové ID a číslo. Tečky \n"
   ."     budou automaticky doplněny.<br>";

// admin/se_fieldid.php3, row 259
$_m["Change from"]
 = "Změnit z";

// admin/aa_synchronize2.php3, row 93
$_m["Select destination ActionApps"]
 = "";

// admin/aa_synchronize2.php3, row 94
$_m["The list is taken from config.php3 file of ActionApps"]
 = "";

// admin/se_csv_import2.php3, row 144
$_m["You have not permissions to setting "]
 = "Nemáte právo pro nastavení";

// admin/se_csv_import2.php3, row 155
$_m["Invalid additional parameters for import"]
 = "Chybné dodatečné parametry pro import";

// admin/se_csv_import2.php3, row 219
$_m["Item:"]
 = "Zpráva:";

// admin/se_csv_import2.php3, row 225
$_m["Cannot store item to DB"]
 = "Zprávu nelze uložit do databáze";

// admin/se_csv_import2.php3, row 230
$_m["Transformation error:"]
 = "Chyba při transformaci:";

// admin/se_csv_import2.php3, row 232
$_m["Ok: Item %1 stored"]
 = "OK: Článek %1 je uložen";

// admin/se_csv_import2.php3, row 248
// include/files.class.php3, row 282
$_m["Ok : file deleted "]
 = "OK: soubor vymazán ";

// admin/se_csv_import2.php3, row 250
// include/files.class.php3, row 284
$_m["Error: Cannot delete file"]
 = "Error: Nelze vymazat soubor";

// admin/se_csv_import2.php3, row 254
$_m["Added to slice"]
 = "Přidáno do webíku";

// admin/se_csv_import2.php3, row 281
$_m["Mapping preview"]
 = "Náhled mapování";

// admin/se_csv_import2.php3, row 335
$_m["Finish"]
 = "Dokončit";

// admin/se_csv_import2.php3, row 338
$_m["Save"]
 = "Uložit";

// admin/se_csv_import2.php3, row 341
$_m["Load"]
 = "Načíst";

// admin/se_csv_import2.php3, row 350
$_m["Mapping settings"]
 = "Nastavení mapování";

// admin/se_csv_import2.php3, row 356
$_m["Html"]
 = "";

// admin/se_csv_import2.php3, row 357
$_m["Action parameters"]
 = "Parametry akce";

// admin/se_csv_import2.php3, row 358
$_m["Parameter wizard"]
 = "Průvodce Parametry";

// admin/se_csv_import2.php3, row 378
$_m["Import options"]
 = "Nastavení importu";

// admin/se_csv_import2.php3, row 389
$_m["Map item id from"]
 = "ID zprávy namapuj z";

// admin/se_csv_import2.php3, row 392
$_m["unpacked long id (pack_id)"]
 = "";

// admin/se_csv_import2.php3, row 393
$_m["packed long id (store)"]
 = "";

// admin/se_csv_import2.php3, row 394
$_m["string to be converted (string2id) - with param:"]
 = "";

// admin/se_csv_import2.php3, row 402
$_m["Select, how to store the items"]
 = "";

// admin/se_csv_import2.php3, row 403
$_m["Do not store the item"]
 = "Přeskoč danou zprávu (neukládat)";

// admin/se_csv_import2.php3, row 404
$_m["Store the item with new id"]
 = "Ulož zprávu pod novým ID";

// admin/se_csv_import2.php3, row 405
$_m["Update the item (overwrite)"]
 = "";

// admin/se_csv_import2.php3, row 406
$_m["Add the values in paralel to current values (the multivalues are stored, where possible)"]
 = "";

// admin/se_csv_import2.php3, row 407
$_m["Rewrite only the fields, for which the action is defined"]
 = "";

// admin/se_csv_import2.php3, row 409
$_m["If the item id is already in the slice"]
 = "";

// admin/se_csv_import2.php3, row 410
$_m["Data source"]
 = "";

// admin/se_csv_import2.php3, row 411
$_m["Source"]
 = "";

// admin/se_csv_import2.php3, row 413
$_m["Store settings..."]
 = "";

// admin/se_csv_import2.php3, row 419
$_m["Load setting"]
 = "";

// admin/se_csv_import2.php3, row 421
$_m["Save setting as"]
 = "";

// admin/se_csv_import2.php3, row 424
$_m["Upload periodicaly"]
 = "";

// admin/se_csv_import2.php3, row 504
$_m["Admin - Import CSV (2/2) - Mapping and Actions"]
 = "Správa webíku - Načtení .csv (2/2) - Mapování";

// admin/se_nodes.php3, row 39
$_m["You have not permissions to manage nodes"]
 = "Nemáte práva pro správu uzlů";

// admin/se_nodes.php3, row 93, 145, 156
$_m["Remote node administration"]
 = "Správa uzlů";

// admin/se_nodes.php3, row 115
$_m["Are you sure you want to delete the node?"]
 = "";

// admin/se_nodes.php3, row 126
$_m["Node empty"]
 = "";

// admin/se_nodes.php3, row 158
$_m["Known remote nodes"]
 = "Seznam uzlů";

// admin/se_nodes.php3, row 178
$_m["Add new node"]
 = "Přidání uzlu";

// admin/se_nodes.php3, row 178
$_m["Edit node data"]
 = "Editace uzlu";

// admin/se_nodes.php3, row 181
$_m["Node name"]
 = "Jméno uzlu ";

// admin/se_nodes.php3, row 182
$_m["Your node name"]
 = "Jméno uzlu";

// admin/se_nodes.php3, row 183
$_m["URL of the getxml.php3"]
 = "URL souboru getxml.php3";

// admin/se_nodes.php3, row 184
$_m["Your getxml is"]
 = "Vaše getxml je";

// admin/se_filters.php3, row 95
$_m["-- The same --"]
 = "-- stejná --";

// admin/se_filters.php3, row 152, 251
$_m["Admin - Content Pooling - Filters"]
 = "Správa webíku - Filtry pro výměnu zpráv";

// admin/se_filters.php3, row 225
$_m["No From category selected!"]
 = "";

// admin/se_filters.php3, row 264
$_m["Content Pooling - Configure Filters"]
 = "Nastavení filtrů pro příjem zpráv";

// admin/se_filters.php3, row 267
$_m["Filter for imported slice"]
 = "Filtr pro příjem zpráv z webíku";

// admin/se_filters.php3, row 271
$_m["Categories"]
 = "Kategorie";

// admin/se_filters.php3, row 289
$_m["All Categories"]
 = "Všechny kategorie";

// admin/se_filters.php3, row 296, 319
$_m["No category defined"]
 = "Kategorie nebyly definovány";

// admin/se_filters.php3, row 355, 355
// include/manager.class.php3, row 585
$_m["Select all"]
 = "Vybrat vše";

// admin/setup.php3, row 66, 69
$_m["AA Setup"]
 = "Instalace AA";

// admin/setup.php3, row 75
$_m["This script can't be used on a configured system."]
 = "Skript nelze použít na nakonfigurovaném systému.";

// admin/setup.php3, row 103, 240
// include/formutil.php3, row 1944
$_m["Retype Password"]
 = "Zopakujte heslo";

// admin/setup.php3, row 105, 243
$_m["Last name"]
 = "Příjmení";

// admin/setup.php3, row 122
$_m["Welcome! Use this script to create the superadmin account.<p>If you are installing a new copy of AA, press <b>Init</b>.<br>"]
 = "Dobrý den! Použijte tento skript k vytvoření superuživatelského účtů.<p>Pokud instalujete novou kopii AA, stiskněte <strong>Init</strong>.</p>";

// admin/setup.php3, row 123
$_m["If you deleted your superadmin account by mistake, press <b>Recover</b>.<br>"]
 = "Pokud jste smazali superuživatelský účet omylem, stiskněte <b>Obnovit</b>.<br>";

// admin/setup.php3, row 127, 191
$_m[" Init "]
 = " Inicializuj ";

// admin/setup.php3, row 128, 205
$_m["Recover"]
 = "Obnovit";

// admin/setup.php3, row 154
$_m["Database is not configured correctly or the database is empty.<br>\n"
   ."             Check please the database credentials in <b>include/config.php3</b>\n"
   ."             file <br>or run <a href=\"../sql_update.php3\">sql_update.php3</a> script,\n"
   ."             which creates AA tables for you."]
 = "";

// admin/setup.php3, row 200
$_m["Can't add primary permission object.<br>Please check the access settings to your permission system.<br>If you just deleted your superadmin account, use <b>Recover</b>"]
 = "";

// admin/setup.php3, row 215
$_m["Can't delete invalid permission."]
 = "Nemohu smazat chybné nastavení.";

// admin/setup.php3, row 217
$_m["Invalid permission deleted (no such user/group): "]
 = "Chybné nastavení smazáno (neexistuje tento uživatel/skupina): ";

// admin/setup.php3, row 286
$_m["Congratulations! The account was created."]
 = "Blahopřejeme! Účet byl vytvořen.";

// admin/setup.php3, row 288
$_m["Use this account to login and add your first slice:"]
 = "Použijte tento účet k přihlášení a vytvořte první webík:";

// admin/setup.php3, row 292
$_m["Can't assign super access permission."]
 = "Nemohu přidat superuživatelské právo.";

// admin/se_users_add.php3, row 65
$_m["Search user or group"]
 = "Hledej uživatele nebo skupinu";

// admin/se_users_add.php3, row 82
// include/um_util.php3, row 118
$_m["Assign new permissions"]
 = "Přiřazení nových práv";

// admin/se_users_add.php3, row 119
$_m["Try to be more specific."]
 = "Zkuste zadat přesnější údaje.";

// admin/se_users_add.php3, row 140
$_m["List is limitted to %1 users.<br>If some user is not in list, try to be more specific in your query"]
 = "Délka seznamu je max. %1 uživatelů.<br>Pokud nějaký uživatel není v seznamu, zkuste přesnější dotaz";

// admin/se_import.php3, row 122
$_m["Admin - configure Content Pooling"]
 = "Správa webíku - Výměna zpráv";

// admin/se_import.php3, row 133
$_m["Enable export to slice:"]
 = "Povolit zasílání zpráv do webíku:";

// admin/se_import.php3, row 136
$_m["Export disable"]
 = "Zasílání zakázáno";

// admin/se_import.php3, row 138
$_m["Export enable"]
 = "Zasílání povoleno";

// admin/se_import.php3, row 172
$_m["Enable export to any slice"]
 = "Povol exportovat zprávy do všech webíků";

// admin/se_import.php3, row 174
$_m["Currently exported to"]
 = "Nyní exportován do";

// admin/se_import.php3, row 177
$_m["Wrong export (non existant slice!):"]
 = "";

// admin/se_import.php3, row 182
$_m["Import from slice:"]
 = "Přijímat zprávy z:";

// admin/se_import.php3, row 191
$_m["Do not import"]
 = "Nepřijímat";

// admin/se_import.php3, row 193
// include/menu_aa.php3, row 56
$_m["Import"]
 = "Přijímat";

// admin/console.php3, row 40
$_m["comment out following \"exit;\" line in admin/console.php3"]
 = "";

// admin/console.php3, row 45
$_m["ActionApps onsole"]
 = "";

// admin/console.php3, row 48
$_m["ActionApps Cosole"]
 = "";

// admin/se_taskmanager.php3, row 40
$_m["You do not have permission to manage ActioApps tasks"]
 = "";

// central/synchronize.php, row 39, 47
$_m["Central - Synchronize ActionApps (1/3) - Select ActionApps for Comparison"]
 = "";

// central/synchronize.php, row 61
// central/synchronize2.php, row 77
// central/copyslice.php, row 61
// central/copyslice2.php, row 109
// central/synchronize3.php, row 172
$_m["Template ActionApps"]
 = "";

// central/synchronize.php, row 61
// central/copyslice.php, row 61
$_m["ActionApps installation used as template"]
 = "";

// central/synchronize.php, row 62
$_m["AA to compare"]
 = "";

// central/synchronize.php, row 62
$_m["ActionApps installation to check for differences (just checking right now - noting is changed by this step)"]
 = "";

// central/synchronize2.php, row 41, 49
$_m["Central - Synchronize ActionApps (2/3) - Slices to Compare"]
 = "";

// central/synchronize2.php, row 63
$_m["do not compare"]
 = "";

// central/synchronize2.php, row 66
$_m["Compare"]
 = "";

// central/synchronize2.php, row 78
$_m["Slice Mapping"]
 = "";

// central/responder.php, row 169
$_m["No request sent for responder.php"]
 = "";

// central/responder.php, row 175
$_m["Bad request sent for responder.php - %1"]
 = "";

// central/responder.php, row 180
$_m["You don't have permissions to run %1."]
 = "";

// central/copyslice.php, row 39, 47
$_m["Central - Copy Slice (1/2) - Select Source ActionApps"]
 = "";

// central/index.php3, row 62
$_m["You do not have permission to manage ActioApps instalations"]
 = "";

// central/index.php3, row 135
$_m["sql_upadte NOW!"]
 = "";

// central/index.php3, row 149
$_m["ActionApps Central"]
 = "";

// central/tabledit.php3, row 61, 63
$_m["ActionApps Central - Edit"]
 = "";

// central/copyslice2.php, row 65
$_m["%1 import actions planed. See"]
 = "";

// central/copyslice2.php, row 66
// central/synchronize3.php, row 93
// include/menu.php3, row 170
$_m["Task Manager"]
 = "";

// central/copyslice2.php, row 76, 84
$_m["Central - Copy Slice (2/2) - Slices to Copy"]
 = "";

// central/copyslice2.php, row 99
$_m["Copy"]
 = "";

// central/copyslice2.php, row 110
$_m["Modules to Copy from %1"]
 = "";

// central/copyslice2.php, row 111
$_m["Slices to copy"]
 = "";

// central/copyslice2.php, row 112
$_m["Copy also items"]
 = "";

// central/copyslice2.php, row 112
$_m["Copy also item data (items, discussions, ...) of selected slices above"]
 = "";

// central/copyslice2.php, row 113
$_m["Site modules to copy"]
 = "";

// central/copyslice2.php, row 114
$_m["Destination AAs"]
 = "";

// central/copyslice2.php, row 114
$_m["ActionApps installation to update"]
 = "";

// central/synchronize3.php, row 37
$_m["Comparation slice (%1) does not exist"]
 = "";

// central/synchronize3.php, row 92
$_m["%1 synchronization actions planed. See"]
 = "";

// central/synchronize3.php, row 100, 108
$_m["Central - Synchronize ActionApps (3/3) - Synchronize Slices"]
 = "";

// central/synchronize3.php, row 122, 171
$_m["Synchronize"]
 = "";

// central/synchronize3.php, row 132
$_m["Slice Comparison - %1 x %2"]
 = "";

// central/synchronize3.php, row 162
$_m["Hide/show info values"]
 = "";

// central/synchronize3.php, row 163
$_m["Check/Uncheck"]
 = "";

// central/synchronize3.php, row 173
$_m["Compared and Updated ActionApps"]
 = "";

// include/easy_scroller.php3, row 146, 272
$_m["Previous"]
 = "Předchozí";

// include/easy_scroller.php3, row 167
// include/scroller.php3, row 314
$_m["All"]
 = "Vše";

// include/scroller.php3, row 314
$_m["found"]
    = "nalezeno";

// include/files.class.php3, row 97
$_m["Can't create directory for image uploads"]
 = "Nelze vytvořit adresář pro obrázky";

// include/files.class.php3, row 146
$_m["Can't read the file %1"]
 = "Soubor %1 nelze přečíst";

// include/files.class.php3, row 175
$_m["No destination file specified"]
 = "Nebyl specifikován cílový soubor";

// include/files.class.php3, row 189
$_m["type of uploaded file not allowed"]
 = "Nedovolený typ souboru";

// include/files.class.php3, row 211
$_m["Can't move image  %1 to %2"]
 = "Nelze přesunout soubor %1 na %2";

// include/files.class.php3, row 218
$_m["Can't change permissions on uploaded file: %1 - %2. See IMG_UPLOAD_FILE_MODE in your config.php3"]
 = "Nelze nastavit práva pro uploadovaný soubor: %1 - %2. Kokněte na IMG_UPLOAD_FILE_MODE v config.php3";

// include/files.class.php3, row 239
$_m["Can't open file for writing: %1"]
 = "Nelze oteřít soubor pro zápis: %1";

// include/files.class.php3, row 245
$_m["Can't write to file: %1"]
 = "Do souboru %1 nelze zapisovat";

// include/files.class.php3, row 290
$_m["Error: Invalid directory"]
 = "Error: Neplatný adresář";

// include/files.class.php3, row 313
$_m["can't create backup of the file"]
 = "Nelze vytvořit zálohu souboru";

// include/files.class.php3, row 1311
$_m[": No such directory"]
 = "";

// include/perm_core.php3, row 614
$_m["Reader Slice"]
 = "";

// include/perm_core.php3, row 621
$_m["Reader Set"]
 = "";

// include/constants.php3, row 169
$_m["MySQL Auth"]
 = "";

// include/constants.php3, row 174
$_m["Jump inside AA control panel"]
 = "Skok uvnitř administrace";

// include/constants.php3, row 178
$_m["Polls for AA"]
 = "Anketa v AA";

// include/constants.php3, row 192
// include/menu_util.php3, row 64, 169
// include/menu.php3, row 220
$_m["Alerts"]
 = "Zasílání";

// include/constants.php3, row 201
// include/menu_util.php3, row 66
$_m["Links"]
 = "Správa odkazů";

// include/constants.php3, row 356
$_m["Short Id"]
 = "ID (krátké)";

// include/constants.php3, row 361
$_m["Class"]
 = "Třída";

// include/constants.php3, row 365
// include/constedit_util.php3, row 124
$_m["Level"]
 = "Úroveň";

// include/constants.php3, row 407
$_m["Feed"]
 = "Kopírovat obsah";

// include/constants.php3, row 408
$_m["Do not feed"]
 = "Nekopirovat";

// include/constants.php3, row 409
$_m["Feed locked"]
 = "Kopírovat neměnitelně";

// include/constants.php3, row 410
$_m["Feed & update"]
 = "Kopírovat obsah a změny";

// include/constants.php3, row 411
$_m["Feed & update & lock"]
 = "Kopírovat obsah a změny neměnitelně";

// include/constants.php3, row 484
$_m["Month List"]
 = "Měsíc - seznam";

// include/constants.php3, row 484
$_m["Month Table"]
 = "Měsíc - tabulka";

// include/constants.php3, row 504
$_m["Item listing"]
 = "Přehled";

// include/constants.php3, row 509, 617, 739, 790, 822
$_m["Row Delimiter"]
 = "";

// include/constants.php3, row 518, 621, 649, 676, 700, 742, 766, 793, 825
$_m["Sort primary"]
 = "Seřadit";

// include/constants.php3, row 520, 623, 651, 678, 702, 744, 768, 795, 827
$_m["Sort secondary"]
 = "Seřadit druhotně";

// include/constants.php3, row 527, 628, 749, 800, 832
$_m["Group title format"]
 = "Nadpis skupiny";

// include/constants.php3, row 528, 629, 750, 801, 833
$_m["Group bottom format"]
 = "Spodní kód skupiny";

// include/constants.php3, row 541, 561, 584, 642, 668, 722, 753, 781, 813, 845, 855
$_m["Add view ID as HTML comment"]
 = "Vložit číslo pohledu do výsledného HTML";

// include/constants.php3, row 546
$_m["Fulltext view"]
 = "Článek";

// include/constants.php3, row 564
$_m["Discussion"]
 = "Diskuse";

// include/constants.php3, row 566
$_m["HTML code for index view of the comment"]
 = "HTML kód pro přehledové zobrazení příspěvku";

// include/constants.php3, row 568
$_m["HTML code for \"Show selected\" button"]
 = "HTML kód pro tlačítko \"Show selected\"";

// include/constants.php3, row 569
$_m["HTML code for \"Show all\" button"]
 = "HTML kód pro tlačítko \"Show all\"";

// include/constants.php3, row 570
$_m["HTML code for \"Add\" button"]
 = "HTML kód pro tlačítko \"Add\"";

// include/constants.php3, row 571
$_m["Show images"]
 = "Zobrazit obrázky";

// include/constants.php3, row 572
$_m["Order by"]
 = "Seřadit";

// include/constants.php3, row 573
$_m["View image 1"]
 = "Obrázek 1";

// include/constants.php3, row 574
$_m["View image 2"]
 = "Obrázek 2";

// include/constants.php3, row 575
$_m["View image 3"]
 = "Obrázek 3";

// include/constants.php3, row 576
$_m["View image 4"]
 = "Obrázek 4";

// include/constants.php3, row 577
$_m["HTML code for fulltext view of the comment"]
 = "HTML kód pro plné znění příspěvku";

// include/constants.php3, row 578
$_m["HTML code for space before comment"]
 = "HTML kód pro mezeru před poznámkou";

// include/constants.php3, row 579
$_m["HTML code of the form for posting comment"]
 = "HTML kód formuláře pro poslání příspěvku";

// include/constants.php3, row 581
$_m["E-mail template"]
 = "Šablona e-mailu";

// include/constants.php3, row 583
$_m["Number of e-mail template used for posting new comments to users"]
 = "Číslo e-mailové šablony pro zasílání příspěvků uživatelům";

// include/constants.php3, row 588
$_m["Discussion To Mail"]
 = "Diskuze Emailem";

// include/constants.php3, row 589
$_m["From: (email header)"]
 = "From: (hlavička emailu)";

// include/constants.php3, row 590
$_m["Reply-To:"]
 = "";

// include/constants.php3, row 591
$_m["Errors-To:"]
 = "";

// include/constants.php3, row 592
$_m["Sender:"]
 = "";

// include/constants.php3, row 593
$_m["Mail Subject:"]
 = "Předmět emailu:";

// include/constants.php3, row 594
$_m["Mail Body:"]
 = "Tělo emailu:";

// include/constants.php3, row 613
$_m["View of Constants"]
 = "Zobrazení konstant";

// include/constants.php3, row 645
$_m["RSS exchange"]
 = "Výměna zpráv RSS";

// include/constants.php3, row 666
$_m["Static page"]
 = "Statická stránka";

// include/constants.php3, row 667
$_m["HTML code"]
 = "HTML kód";

// include/constants.php3, row 672
$_m["Javascript item exchange"]
 = "Javscript";

// include/constants.php3, row 693
$_m["Calendar"]
 = "Kalendář";

// include/constants.php3, row 694
$_m["Calendar Type"]
 = "Typ kalendáře";

// include/constants.php3, row 696
$_m["Additional attribs to the TD event tag"]
 = "Další atributy do TD tagu pro událost";

// include/constants.php3, row 697
$_m["Event format"]
 = "Kód události";

// include/constants.php3, row 704
$_m["Start date field"]
 = "Políčko začátku události";

// include/constants.php3, row 705
$_m["End date field"]
 = "Políčko konce události";

// include/constants.php3, row 706
$_m["Day cell top format"]
 = "Horní kód buňky s datem";

// include/constants.php3, row 707
$_m["Day cell bottom format"]
 = "Dolní kód buňky s datem";

// include/constants.php3, row 708
$_m["Use other header for empty cells"]
 = "Použít jiný nadpis pro prázdné buňky";

// include/constants.php3, row 709
$_m["Empty day cell top format"]
 = "Horní kód pro prázdné datum";

// include/constants.php3, row 710
$_m["Empty day cell bottom format"]
 = "Spodní kód pro prázdné datum";

// include/constants.php3, row 728
$_m["Alerts Selection Set"]
 = "Zasílání - výběry";

// include/constants.php3, row 731
$_m["Fulltext URL"]
 = "URL fulltextu";

// include/constants.php3, row 734
$_m["Link to the .shtml page used\n"
   ."                                 to create headline links."]
 = "Odkaz na .shtml stránku, který bude použit pro odkazy na články";

// include/constants.php3, row 751
$_m["Max number of items"]
 = "Max počet článků";

// include/constants.php3, row 761
$_m["URL listing"]
 = "Přehled URL";

// include/constants.php3, row 763
$_m["Row HTML"]
 = "HTML pro řádek";

// include/constants.php3, row 785
$_m["Link listing"]
 = "Výpis odkazů (Kormidlo)";

// include/constants.php3, row 817
$_m["Category listing"]
 = "Výpis kategorií (Kormidlo)";

// include/constants.php3, row 848
$_m["Input Form"]
 = "Vstupní formulář";

// include/constants.php3, row 850
$_m["New item form template"]
 = "Nová šablona pro vstupní formulář";

// include/constants.php3, row 851
$_m["Use different template for editing"]
 = "Použít jiný formulář pro editaci zprávy";

// include/constants.php3, row 852
$_m["Edit item form template"]
 = "Šablona pro Editační formulář";

// include/constants.php3, row 884
// include/discussion.php3, row 206, 253
$_m["Show selected"]
 = "Zobraz vybrané";

// include/constants.php3, row 885
// include/discussion.php3, row 207, 255
$_m["Show all"]
 = "Zobraz vše";

// include/constants.php3, row 886
// include/discussion.php3, row 209, 257
// include/constedit_util.php3, row 116
$_m["Add new"]
 = "Přidej nový";

// include/constants.php3, row 906
$_m["Calendar: Time stamp at 0:00 of processed cell"]
 = "Kalendář: Time stamp v 0:00 příslušného data";

// include/constants.php3, row 907
$_m["Calendar: Time stamp at 24:00 of processed cell"]
 = "Kalendář: Time stamp v 24:00 příslušného data";

// include/constants.php3, row 908
$_m["Calendar: Day in month of processed cell"]
 = "Kalendář: Den v měsíci příslušného data";

// include/constants.php3, row 909
$_m["Calendar: Month number of processed cell"]
 = "Kalendář: Číslo měsíce příslušného data";

// include/constants.php3, row 910
$_m["Calendar: Year number of processed cell"]
 = "Kalendář: Rok příslušného data";

// include/constants.php3, row 972
$_m["Superadmin"]
 = "";

// include/scroller.php3, row 78
$_m["Pgcnt"]
 = "";

// include/scroller.php3, row 79
$_m["Current"]
 = "";

// include/scroller.php3, row 81
$_m["Visible"]
 = "";

// include/scroller.php3, row 82
$_m["Sortdir"]
 = "";

// include/scroller.php3, row 83
$_m["Sortcol"]
 = "";

// include/scroller.php3, row 84
// include/menu.php3, row 160
$_m["Filters"]
 = "Filtry";

// include/scroller.php3, row 85
$_m["Itmcnt"]
 = "";

// include/scroller.php3, row 86
$_m["Metapage"]
 = "";

// include/scroller.php3, row 87
$_m["Urldefault"]
 = "";

// include/item_content.php3, row 579
$_m["No Slice Id specified"]
 = "";

// include/item_content.php3, row 764
$_m["No Id specified (%1 - %2)"]
 = "ID nezadáno (%1 - %2)";

// include/item_content.php3, row 769
$_m["Duplicated ID - skiped (%1 - %2)"]
 = "Duplicitní ID - přeskočeno (%1 - %2)";

// include/item_content.php3, row 783
$_m["StoreItem for slice %1 - failed parameter check for id = '%2'"]
 = "";

// include/tabledit.php3, row 263
$_m["No record matches your search condition."]
 = "Žádný záznam neodpovídá vyhledávací podmínce.";

// include/tabledit.php3, row 396
$_m["order ascending"]
 = "seřadit vzestupně";

// include/tabledit.php3, row 397
$_m["order descending"]
 = "seřadit sestupně";

// include/tabledit.php3, row 478
$_m["Nothing to be shown."]
 = "Není co zobrazit";

// include/tabledit.php3, row 580
$_m["search"]
 = "vyhledat";

// include/tabledit.php3, row 699, 797
$_m["edit"]
 = "upravit";

// include/tabledit.php3, row 803
$_m["add"]
 = "přidat";

// include/tabledit.php3, row 809, 817
$_m["delete"]
 = "smazat";

// include/tabledit.php3, row 817, 830
$_m["insert"]
 = "vložit";

// include/tabledit.php3, row 824
$_m["delete checked"]
 = "smazat označené";

// include/tabledit.php3, row 830
$_m["update"]
 = "odeslat";

// include/tabledit.php3, row 836
$_m["update all"]
 = "uložit vše";

// include/tabledit.php3, row 842
$_m["browse"]
 = "projít";

// include/tabledit.php3, row 906
$_m["Are you sure you want to permanently DELETE all the checked records?"]
 = "Jste si jisti, že chcete navždy SMAZAT všechny označené záznamy?";

// include/constedit.php3, row 55
$_m["Constants - Hiearchical editor"]
 = "Konstanty - Hiearchický editor";

// include/constedit.php3, row 58
$_m["Changes are not saved into database until you click on the button at the bottom of this page.<br>Constants are sorted first by Priority, second by Name."]
 = "Změny nebudou uloženy do databáze, dokud nestisknete tlačítko dole na stránce.<br>Konstanty jsou řazeny zaprvé podle Řazení a zadruhé podle Názvu.";

// include/constedit.php3, row 79
$_m["Copy value from name"]
 = "Kopírovat hodnotu z názvu";

// include/constedit.php3, row 92
$_m["Check to confirm deleting"]
 = "Zatrhněte pro potvrzení mazání";

// include/constedit.php3, row 95
$_m["Save all changes to database"]
 = "Uložit změny do databáze";

// include/constedit.php3, row 96
$_m["View settings"]
 = "Zobrazení";

// include/constedit.php3, row 96
$_m["Hierarchical"]
 = "Hierarchcké";

// include/constedit.php3, row 97
$_m["Hide value"]
 = "Skryj hodnotu";

// include/constedit.php3, row 98
$_m["Levels horizontal"]
 = "Úrovně horizontálně";

// include/constedit.php3, row 99
// include/widget.class.php3, row 1168
$_m["Level count"]
 = "Počet úrovní";

// include/statestore.php3, row 669
// include/searchlib.php3, row 101
$_m["select ..."]
 = "vyber ...";

// include/searchbar.class.php3, row 82
$_m["Condition"]
 = "";

// include/searchbar.class.php3, row 83
$_m["Readonly"]
 = "";

// include/searchbar.class.php3, row 176
$_m["Search row"]
 = "";

// include/searchbar.class.php3, row 177
$_m["Order row"]
 = "";

// include/searchbar.class.php3, row 558
$_m["And"]
 = "a zároveň";

// include/searchbar.class.php3, row 567
// include/searchlib.php3, row 39, 92, 101
$_m["contains"]
 = "obsahuje";

// include/searchbar.class.php3, row 568
// include/searchlib.php3, row 40, 92, 101
$_m["begins with"]
 = "začíná";

// include/searchbar.class.php3, row 569
// include/searchlib.php3, row 92, 101
$_m["is"]
 = "je";

// include/searchbar.class.php3, row 598
$_m["Order"]
 = "Seřadit";

// include/searchbar.class.php3, row 617
// include/formutil.php3, row 1993
$_m["Clear"]
 = "Vyčistit";

// include/searchbar.class.php3, row 620
$_m["Stored search name"]
 = "Jméno filtru";

// include/searchbar.class.php3, row 621
$_m["You have the permission to add stored search globaly. Do you want to add this query as global (common to all slice users)?"]
 = "Uložit globálně? Filtr můžete uložit tak, že bude viditelný pro všechny uživatele tohoto webíku - tedy globálně [ OK ], či pouze jako váš osobní filtr [ Storno ]. Má-li být filtr globální - klikněte na OK, má-li být váš osobní - klikněte na Storno (popř. Cancel).";

// include/searchbar.class.php3, row 621
$_m["Store"]
 = "Uložit";

// include/searchbar.class.php3, row 636
$_m["Stored searches"]
 = "Uložené filtry";

// include/searchbar.class.php3, row 639
$_m["View"]
 = "Filtruj";

// include/searchbar.class.php3, row 642
$_m["Are you sure to refine current search?"]
 = "Opravdu chcete předefinovat vybraný filtr?";

// include/searchbar.class.php3, row 643
$_m["Enter new name"]
 = "Zadej nové jméno";

// include/searchbar.class.php3, row 643
$_m["Rename"]
 = "Přejmenovat";

// include/searchbar.class.php3, row 644
$_m["Are you sure to delete selected search?"]
 = "Opravdu smazat vybraný filtr?";

// include/searchbar.class.php3, row 935
$_m["Select one..."]
 = "vyber ...";

// include/modutils.php3, row 75
// include/slicedit.php3, row 163
$_m["Used Language File"]
 = "Použitý language soubor";

// include/modutils.php3, row 179
$_m["No such module."]
 = "Modul neexistuje.";

// include/formutil.php3, row 63
$_m["Add&nbsp;Mutual"]
 = "Přidat&nbsp;Vzájemně";

// include/formutil.php3, row 64
$_m["Backward"]
 = "Zpětně";

// include/formutil.php3, row 66
$_m["Good"]
 = "Dobré";

// include/formutil.php3, row 68
$_m["Bad"]
 = "Špatné";

// include/formutil.php3, row 193
$_m["Update & View"]
 = "Změnit a prohlédnout";

// include/formutil.php3, row 193
$_m["Update & Edit"]
 = "Změnit a editovat dále";

// include/formutil.php3, row 197
$_m["Insert as new"]
 = "Vložit jako nový";

// include/formutil.php3, row 203
$_m["Insert & View"]
 = "Vložit a prohlédnout";

// include/formutil.php3, row 203
$_m["Insert & Edit"]
 = "Vložit a editovat dále";

// include/formutil.php3, row 220
$_m["Part"]
 = "Strana";

// include/formutil.php3, row 475
$_m["There are too many items."]
 = "Příliš mnoho článků";

// include/formutil.php3, row 892
$_m["set"]
 = "zapnuto";

// include/formutil.php3, row 892
$_m["unset"]
 = "vypnuto";

// include/formutil.php3, row 1004
$_m["Unable to find tagprefix table %1"]
 = "";

// include/formutil.php3, row 1127
$_m["import"]
 = "načíst";

// include/formutil.php3, row 1144
$_m["Edit in HTMLArea"]
 = "Zobraz Editor";

// include/formutil.php3, row 1615, 1619
$_m["Enter the value"]
 = "Vložte hodnotu";

// include/formutil.php3, row 1619
// include/menu.php3, row 145
$_m["Change"]
 = "Změnit";

// include/formutil.php3, row 1658
$_m["Item"]
 = "Článek";

// include/formutil.php3, row 1669
$_m["Move up"]
 = "Nahoru";

// include/formutil.php3, row 1670
$_m["Move down"]
 = "Dolů";

// include/formutil.php3, row 1759, 1893
// include/widget.class.php3, row 977
$_m["Selected"]
 = "Vybrané";

// include/formutil.php3, row 1892
$_m["Offer"]
 = "Nabídnout";

// include/formutil.php3, row 1943
$_m["Change Password"]
 = "Změna Hesla";

// include/formutil.php3, row 1945
$_m["Delete Password"]
 = "Smazat Heslo";

// include/formutil.php3, row 1953
// include/searchlib.php3, row 44, 92, 95, 98, 101
$_m["not set"]
 = "nenastaveno";

// include/formutil.php3, row 2734
$_m["Submit"]
 = "Poslat";

// include/formutil.php3, row 2973
$_m["Not used, yet"]
 = "Dosud nepoužito";

// include/formutil.php3, row 3006
$_m["Group Name"]
 = "Jméno skupiny";

// include/formutil.php3, row 3006
$_m["Created by"]
 = "Vytvořil";

// include/formutil.php3, row 3007
$_m["Created on"]
 = "Vytvořeno";

// include/formutil.php3, row 3007
$_m["Last updated"]
 = "Naposledy aktualizováno";

// include/formutil.php3, row 3007
$_m["Last used"]
 = "Naposledy použito";

// include/formutil.php3, row 3013
$_m["All active items"]
 = "Všechy aktuální články";

// include/formutil.php3, row 3015
$_m["All pending items"]
 = "";

// include/formutil.php3, row 3016
$_m["All expired items"]
 = "";

// include/formutil.php3, row 3017
$_m["All items in holding bin"]
 = "";

// include/formutil.php3, row 3018
$_m["All items in trash bin"]
 = "";

$_m["translate from"]
    = "přeložit z";

// include/stringexpand.php3, row 417
$_m["Jabber Online Status Indicator"]
 = "";

// include/stringexpand.php3, row 2214
$_m["PHP patterns in Preg_Match aro not allowed"]
 = "";

// include/stringexpand.php3, row 2450
$_m["Date \\ Item ID"]
 = "";

// include/util.php3, row 981, 1038
// include/slice.class.php3, row 247
$_m["Error: Missing Reading Password"]
 = "Chyba: Schází Heslo pro Čtení";

// include/util.php3, row 1375
// include/msgpage.php3, row 63
$_m["Toolkit news message"]
 = "Zpráva aplikace";

// include/util.php3, row 1608
$_m["Internal error. File upload: Dir does not exist?!"]
 = "Interní chyba při uploadu souboru: Adresář neexistuje?!";

// include/util.php3, row 1612
$_m["File with this name already exists."]
 = "Soubor s tímto názvem už existuje.";

// include/util.php3, row 1619
$_m["Can't move image  %s to %s"]
 = "Nelze přesunout obrázek %s na %s";

// include/util.php3, row 1867
$_m["alerts alert"]
 = "zasílání zpráv - zpráva";

// include/util.php3, row 1868
$_m["alerts welcome"]
 = "zasílání zpráv - vítejte";

// include/util.php3, row 1869
$_m["slice wizard welcome"]
 = "uvítání z průvodce přidáním webíku";

// include/util.php3, row 1870
$_m["other"]
 = "jiné";

// include/util.php3, row 1878
$_m["January"]
 = "Leden";

// include/util.php3, row 1878
$_m["February"]
 = "Únor";

// include/util.php3, row 1878
$_m["March"]
 = "Březen";

// include/util.php3, row 1878
$_m["April"]
 = "Duben";

// include/util.php3, row 1878
$_m["May"]
 = "Květen";

// include/util.php3, row 1878
$_m["June"]
 = "Červen";

// include/util.php3, row 1879
$_m["July"]
 = "Červenec";

// include/util.php3, row 1879
$_m["August"]
 = "Srpen";

// include/util.php3, row 1879
$_m["September"]
 = "Září";

// include/util.php3, row 1879
$_m["October"]
 = "Říjen";

// include/util.php3, row 1879
$_m["November"]
 = "Listopad";

// include/util.php3, row 1879
$_m["December"]
 = "Prosinec";

// include/discussion.php3, row 215
$_m["Alias for subject of the discussion comment"]
 = "Alias pro předmět příspěvku";

// include/discussion.php3, row 216
$_m["Alias for text of the discussion comment"]
 = "Alias pro diskusní příspěvek";

// include/discussion.php3, row 217
$_m["Alias for written by"]
 = "Alias pro autora diskusního příspěvku";

// include/discussion.php3, row 218
$_m["Alias for author's e-mail"]
 = "Alias pro e-mail autora";

// include/discussion.php3, row 219
$_m["Alias for url address of author's www site"]
 = "Alias pro adresu WWW stránek autora ";

// include/discussion.php3, row 220
$_m["Alias for description of author's www site"]
 = "Alias for popis WWW stránek autora";

// include/discussion.php3, row 221
$_m["Alias for publish date"]
 = "Alias pro datum a čas poslání příspěvku";

// include/discussion.php3, row 222
$_m["Alias for IP address of author's computer"]
 = "Alias pro IP adresu pisatele";

// include/discussion.php3, row 223
$_m["Alias for checkbox used for choosing discussion comment"]
 = "Alias pro checkbox pro vybrání příspěvku";

// include/discussion.php3, row 224
$_m["Alias for images"]
 = "Alias pro obrázky";

// include/discussion.php3, row 225
$_m["Alias for comment ID<br>\n"
   ."                             <i>Usage: </i>in form code<br>\n"
   ."                             <i>Example: </i>&lt;input type=hidden name=d_item_id value=\"_#DITEM_ID\">"]
 = "";

// include/discussion.php3, row 226
$_m["Alias for comment ID (the same as _#DITEM_ID<br>)\n"
   ."                             <i>Usage: </i>in form code<br>\n"
   ."                             <i>Example: </i>&lt;input type=hidden name=d_item_id value=\"_#ITEM_ID#\">"]
 = "";

// include/discussion.php3, row 227
$_m["Alias for item ID<br>\n"
   ."                             <i>Usage: </i>in form code<br>\n"
   ."                             <i>Example: </i>&lt;input type=hidden name=d_parent value=\"_#DISC_ID#\">"]
 = "";

// include/discussion.php3, row 228
$_m["Alias for link to text of the discussion comment<br>\n"
   ."                             <i>Usage: </i>in HTML code for index view of the comment<br>\n"
   ."                             <i>Example: </i>&lt;a href=_#URL_BODY>_#SUBJECT#&lt;/a>"]
 = "Alias pro odkaz na text příspěvku<br>\n"
   ."                             <i>Užití: </i>v kódu pro přehledové zobrazení příspěvku<br>\n"
   ."                             <i>Příklad: </i>&lt;a href=_#URL_BODY>_#SUBJECT#&lt;/a>";

// include/discussion.php3, row 229
$_m["Alias for link to a form<br>\n"
   ."                             <i>Usage: </i>in HTML code for fulltext view of the comment<br>\n"
   ."                             <i>Example: </i>&lt;a href=_#URLREPLY&gt;Reply&lt;/a&gt;"]
 = "Alias pro odkaz na formulář<br>\n"
   ."                             <i>Užití: </i>v kódu pro plné znění příspěvku<br>\n"
   ."                             <i>Příklad: </i>&lt;a href=_#URLREPLY&gt;Odpovědět&lt;/a&gt;";

// include/discussion.php3, row 230
$_m["Alias for link to discussion<br>\n"
   ."                             <i>Usage: </i>in form code<br>\n"
   ."                             <i>Example: </i>&lt;input type=hidden name=url value=\"_#DISC_URL\">"]
 = "Alias pro odkaz na diskusi<br>\n"
   ."                             <i>Užití: </i>v kódu formuláře<br>\n"
   ."                             <i>Příklad: </i>&lt;input type=hidden name=url value=\"_#DISC_URL\">";

// include/discussion.php3, row 231
$_m["Alias for buttons Show all, Show selected, Add new<br>\n"
   ."                             <i>Usage: </i> in the Bottom HTML code"]
 = "Alias pro tlačítka Zobraz vše, Zobraz vybrané, Přidej nový<br>\n"
   ."                             <i>Užití: </i>ve spodním HTML kódu";

// include/discussion.php3, row 413
$_m["3rd parameter filled in DiscussionMailList field"]
 = "3. parametr vyplněný v políčku DiscussionMailList";

// include/discussion.php3, row 415
$_m["%1th parameter filled in DiscussionMailList field"]
 = "%1. parametr vyplněný v políčku DiscussionMailList";

// include/loginform.inc, row 39
$_m["Welcome!"]
 = "Přihlášení (Login) - <a href='http://www.ecn.cz'>Econnect</a> Toolkit 2.11";

// include/loginform.inc, row 41
$_m["Welcome! Please identify yourself with a username and a password:"]
 = "<br>\n\n"
   ."     <br><br>Přihlašte se prosím Vaším jménem a heslem\n\n"
   ."     <br>(Welcome! Log in by your name and password):";

// include/loginform.inc, row 50
$_m["Username:"]
 = "Uživatelské jméno<br>(User name):  ";

// include/loginform.inc, row 53
$_m["Type your username or mail"]
 = " ";

// include/loginform.inc, row 56
$_m["Password:"]
 = "Heslo<br>(Password):";

// include/loginform.inc, row 60
$_m["Login now"]
 = "Přihlásit";

// include/loginform.inc, row 73
$_m["Please try again!"]
 = "Zkuste to znovu, prosím!<br>Please try again!";

// include/loginform.inc, row 76
$_m["If you are sure you have typed the correct password, please e-mail <a href=mailto:%1>%1</a>."]
 = "Pokud jste si jisti, že zadáváte správné jméno a heslo, obraťte se prosím \n\n"
   ."     na <a href=\"mailto:%1\">%1</a>.\n\n"
   ."     <br>If you are sure you have typed the correct password, please e-mail \n\n"
   ."     <a href=\"mailto:%1\">%1</a>.";

// include/um_gedit.php3, row 43
$_m["It is impossible to add group to permission system"]
 = "Nelze přidat skupinu do systému";

// include/um_gedit.php3, row 55
$_m["Can't change group"]
 = "Nelze změnit skupinu";

// include/mlx.php, row 418
$_m["view"]
 = "pohled";

// include/mlx.php, row 461
$_m["Bad item ID %1"]
 = "Chybné číslo článku";

// include/mlx.php, row 466
$_m["No ID for MLX"]
 = "";

// include/item.php3, row 92
// include/itemview.php3, row 108
// include/field.class.php3, row 394
$_m["number of found items"]
 = "počet nalezených článků";

// include/item.php3, row 93
// include/field.class.php3, row 395
$_m["index of item within whole listing (begins with 0)"]
 = "pořadí článku v celém výpisu (číslováno od 0)";

// include/item.php3, row 94
// include/field.class.php3, row 396
$_m["index of item within a page (it begins from 0 on each page listed by pagescroller)"]
 = "pořadí článku v na stránce (číslováno od 0 pro každou stránku)";

// include/item.php3, row 95
// include/field.class.php3, row 397
$_m["alias for Item ID"]
 = "alias pro číslo článku";

// include/item.php3, row 96
// include/field.class.php3, row 398
$_m["alias for Short Item ID"]
 = "alias pro zkrácené číslo článku";

// include/item.php3, row 102, 103
// include/field.class.php3, row 404, 405
$_m["alias used on admin page index.php3 for itemedit url"]
 = "alias používaný v administrativních stránkách index.php3 pro URL itemedit.php3";

// include/item.php3, row 104
// include/field.class.php3, row 406
$_m["Alias used on admin page index.php3 for edit discussion url"]
 = "Alias používaný v administrativních stránkách index.php3 pro URL discedit.php3";

// include/item.php3, row 105
// include/field.class.php3, row 407
$_m["Title of Slice for RSS"]
 = "Jméno webíku pro RSS";

// include/item.php3, row 106
// include/field.class.php3, row 408
$_m["Link to the Slice for RSS"]
 = "Odkaz na webík pro RSS";

// include/item.php3, row 107
// include/field.class.php3, row 409
$_m["Short description (owner and name) of slice for RSS"]
 = "Krátký popisek (vlastník a jméno) webíku pro RSS";

// include/item.php3, row 108
// include/field.class.php3, row 410
$_m["Date RSS information is generated, in RSS date format"]
 = "Datum v RSS přehledu je generováno v datovém formátu RSS";

// include/item.php3, row 109
// include/tv_email.php3, row 57
// include/field.class.php3, row 411
$_m["Slice name"]
 = "Název webíku";

// include/item.php3, row 111
// include/field.class.php3, row 413
$_m["Current MLX language"]
 = "Současný jazyk MLX";

// include/item.php3, row 112
// include/field.class.php3, row 414
$_m["HTML markup direction tag (e.g. DIR=RTL)"]
 = "";

// include/item.php3, row 140
$_m["Constant name"]
 = "Jméno";

// include/item.php3, row 141
$_m["Constant value"]
 = "Hodnota";

// include/item.php3, row 142
$_m["Constant priority"]
 = "Řazení";

// include/item.php3, row 143
$_m["Constant group id"]
 = "Skupina hodnot";

// include/item.php3, row 144
$_m["Category class (for categories only)"]
 = "Nadkategorie (použitelné jen pro kategorie)";

// include/item.php3, row 145
$_m["Constant number"]
 = "Pořadové číslo hodnoty";

// include/item.php3, row 146
$_m["Constant unique id (32-haxadecimal characters)"]
 = "Jedinečné ID (32 hexa znaků)";

// include/item.php3, row 147
$_m["Constant unique short id (autoincremented from '1' for each constant in the system)"]
 = "Krátké jedinečné ID (počítadlo od '1' pro všechny konstanty)";

// include/item.php3, row 148
$_m["Constant description"]
 = "Popis konstanty";

// include/item.php3, row 149
$_m["Constant level (used for hierachical constants)"]
 = "Úroveň konstanty (použito v hierarchických)";

// include/item.php3, row 189
$_m["Alias for %1"]
 = "Alias pro %1";

// include/item.php3, row 1415
$_m["on"]
 = "zap";

// include/item.php3, row 1415
$_m["off"]
 = "vyp";

// include/item.php3, row 1584
$_m["Home"]
 = "Domů";

// include/actions.php3, row 60
$_m["Move to Active"]
 = "Vystavit";

// include/actions.php3, row 61
$_m["Move to Holding bin"]
 = "Poslat do zásobníku";

// include/actions.php3, row 62
$_m["Move to Trash"]
 = "Poslat do koše";

// include/actions.php3, row 157, 250
$_m["No slice selected"]
 = "Nebyl vybrán žádný webík";

// include/actions.php3, row 201
$_m["Move to another slice"]
 = "";

// include/actions.php3, row 214
$_m["Slice ID"]
 = "";

// include/actions.php3, row 236
$_m["Move to slice"]
 = "";

// include/actions.php3, row 256
$_m["You have not permissions to move items"]
 = "Nemáte právo přesouvat zprávy";

// include/actions.php3, row 311
$_m["Remove (delete from database)"]
 = "Odstranit (z databáze)";

// include/actions.php3, row 325, 544
$_m["You have not permissions to remove items"]
 = "Nemáte právo mazat zprávy";

// include/actions.php3, row 401
$_m["Modify content"]
 = "Hromadně změnit";

// include/actions.php3, row 419
$_m["Send email"]
 = "Poslat e-mail";

// include/actions.php3, row 483
$_m["Remove (cancel task)"]
 = "";

// include/actions.php3, row 497
$_m["You have not permissions to remove tasks"]
 = "";

// include/actions.php3, row 529
$_m["Execute"]
 = "";

// include/tv_email.php3, row 37
$_m["Aliases for Alerts Alert"]
 = "Aliasy pro zprávu ze Zasílání";

// include/tv_email.php3, row 39
$_m["complete filter text"]
 = "úplný text výběrů";

// include/tv_email.php3, row 40, 48
$_m["howoften"]
 = "jak často";

// include/tv_email.php3, row 41
$_m["Anonym Form URL (set in Alerts Admin - Settings)"]
 = "URL anonymního formuláře (nastaveno v Nastavení Zasílání)";

// include/tv_email.php3, row 42
$_m["Unsubscribe Form URL"]
 = "URL pro odhlášení (unsubscribe)";

// include/tv_email.php3, row 46
$_m["Aliases for Alerts Welcome"]
 = "Aliasy pro uvítání v Zasílání";

// include/tv_email.php3, row 49
$_m["Collection Form URL (set in Alerts Admin - Settings)"]
 = "URL formuláře s nastavením Zasílání";

// include/tv_email.php3, row 50
$_m["email confirmed"]
 = "email potvrzen";

// include/tv_email.php3, row 55
$_m["Aliases for Slice Wizard Welcome"]
 = "Aliasy pro uvítání z Průvodce přidáním webíku";

// include/tv_email.php3, row 58
$_m["New user name"]
 = "Jméno nového uživatele";

// include/tv_email.php3, row 59
$_m["New user login name"]
 = "Login nového uživatele";

// include/tv_email.php3, row 60
$_m["New user role (editor / admin)"]
 = "Role nového uživatele (editor / admin)";

// include/tv_email.php3, row 61
$_m["My name"]
 = "Moje jméno";

// include/tv_email.php3, row 62
$_m["My email"]
 = "Můj email";

// include/tv_email.php3, row 97
$_m["Email template"]
 = "Šablona emailu";

// include/tv_email.php3, row 110
$_m["Email type"]
 = "Typ e-mailu";

// include/tv_email.php3, row 158
// include/menu.php3, row 169
$_m["Email templates"]
 = "Šablony emailů";

// include/tv_email.php3, row 178
$_m["Reply to"]
 = "";

// include/tv_email.php3, row 180
$_m["Errors to"]
 = "";

// include/tv_email.php3, row 182
$_m["Sender"]
 = "";

// include/menu_util.php3, row 65
$_m["Jump inside control panel"]
 = "Skok uvnitř administrace";

// include/menu_util.php3, row 67
$_m["MySQL Auth (old version)"]
 = "";

// include/menu_util.php3, row 68
$_m["Polls"]
 = "Ankety";

// include/menu_util.php3, row 69
$_m["Site"]
 = "";

// include/menu_util.php3, row 71
$_m["Reader Management Slice"]
 = "Webík Správa Čtenářů";

// include/menu_util.php3, row 106, 182
$_m["New slice"]
 = "Nový webík";

// include/menu_util.php3, row 173
$_m["Reader management"]
 = "Správa čtenářů";

// include/menu_util.php3, row 188
$_m["logout"]
 = "odhlásit";

// include/menu_util.php3, row 371
$_m["Copyright (C) 2001 the <a href=\"https://www.apc.org\">Association for Progressive Communications (APC)</a>"]
 = "";

// include/date.php3, row 161
// include/validate.php3, row 450, 505
$_m["Error in"]
 = "Chyba v";

// include/filedit.php3, row 89
$_m["Back to file list"]
 = "Zpět na seznam souborů";

// include/filedit.php3, row 90
$_m["Download (right-click)"]
 = "Download (pravou myší)";

// include/filedit.php3, row 91
$_m["Rename to"]
 = "Přejmenovat na";

// include/filedit.php3, row 96
// include/fileman.php3, row 110, 465
$_m["Text file"]
 = "Text";

// include/filedit.php3, row 96
// include/fileman.php3, row 108
$_m["Web file"]
 = "Web";

// include/filedit.php3, row 96
// include/fileman.php3, row 107, 465
$_m["HTML file"]
 = "HTML";

// include/filedit.php3, row 135
$_m["Save changes"]
 = "Nahrát změny";

// include/filedit.php3, row 136
$_m["Reset content"]
 = "Obnovit obsah";

// include/filedit.php3, row 142
$_m["File content"]
 = "Obsah souboru";

// include/filedit.php3, row 151
// include/fileman.php3, row 109
$_m["Image file"]
 = "Obrázek";

// include/filedit.php3, row 154
$_m["This is a file of type"]
 = "Toto je soubor typu";

// include/filedit.php3, row 154
$_m["I can't view it. If you want to view or edit it, change it's extension."]
 = "Nemohu zobrazit. Chcete-li zobrazit nebo upravit tento soubor, změňte jeho příponu.";

// include/metabase.class.php3, row 883
$_m["Manage %1"]
 = "";

// include/slice.php3, row 78
$_m["Select Category "]
 = "Zvolte Kategorii ";

// include/slice.php3, row 80
$_m["All categories"]
 = "Všechny kategorie";

// include/slicedit.php3, row 48
$_m["User not found"]
 = "Uživatel nenalezen";

// include/slicedit.php3, row 65
$_m["Slice not found."]
 = "Webík nenalezen";

// include/slicedit.php3, row 79
$_m["Error mailing"]
 = "Chyba při mailování";

// include/slicedit.php3, row 157
$_m["Upload URL"]
 = "";

// include/slicedit.php3, row 165
$_m["Language Control Slice"]
 = "Webík správy překladů";

// include/slicedit.php3, row 172
$_m["This File Manager Directory is already used by another slice."]
 = "Tento Adresář pro správu souborů je již využíván v jiném webíku.";

// include/slicedit.php3, row 306
$_m["Error when copying constants."]
 = "Chyba při kopírování konstant.";

// include/slicedit.php3, row 315
$_m["Error when copying views."]
 = "Chyba při kopírování pohledů.";

// include/slicedit.php3, row 322
$_m["Internal error when changing user role."]
 = "Interní chyba při změně role uživatele.";

// include/menu.php3, row 64
$_m["View site"]
 = "Zobraz";

// include/menu.php3, row 79, 80, 151
$_m["Item Manager"]
 = "Správa zpráv";

// include/menu.php3, row 87
$_m["Slice Admin"]
 = "Nastavení";

// include/menu.php3, row 95
$_m["AA"]
 = "";

// include/menu.php3, row 96
$_m["AA Administration"]
 = "Administrace AA Toolkitu";

// include/menu.php3, row 103
$_m["Central"]
 = "";

// include/menu.php3, row 104
$_m["AA Central"]
 = "";

// include/menu.php3, row 135
$_m["Main settings"]
 = "Hlavní nastavení";

// include/menu.php3, row 137
$_m["Category"]
 = "Kategorie";

// include/menu.php3, row 139
$_m["Slice Fields"]
 = "Políčka webíku";

// include/menu.php3, row 140
$_m["Email Notification"]
 = "Upozornění e-mailem";

// include/menu.php3, row 143
// include/um_util.php3, row 90, 99
$_m["Permissions"]
 = "Nastavení práv";

// include/menu.php3, row 144
$_m["Assign"]
 = "Přidat";

// include/menu.php3, row 147
$_m["Design"]
 = "Vzhled";

// include/menu.php3, row 148
$_m["Index"]
 = "Přehled zpráv";

// include/menu.php3, row 149
$_m["Fulltext"]
 = "Celá zpráva";

// include/menu.php3, row 150
$_m["Views"]
 = "Pohledy";

// include/menu.php3, row 152
$_m["Sets of Items"]
 = "";

// include/menu.php3, row 154
$_m["Content Pooling"]
 = "Výměna zpráv";

// include/menu.php3, row 155
$_m["Nodes"]
 = "Uzly";

// include/menu.php3, row 156
$_m["Inner Node Feeding"]
 = "Lokální výměna";

// include/menu.php3, row 157
$_m["Inter Node Import"]
 = "Příjem z uzlů";

// include/menu.php3, row 158
$_m["Inter Node Export"]
 = "Zasílání do uzlů";

// include/menu.php3, row 159
$_m["RSS Feeds"]
 = "RSS kanály";

// include/menu.php3, row 161
$_m["Mapping"]
 = "Mapování";

// include/menu.php3, row 162, 205
$_m["Import CSV"]
 = "";

// include/menu.php3, row 164, 202, 247
// include/menu_aa.php3, row 67
$_m["Misc"]
 = "Různé";

// include/menu.php3, row 165
$_m["Change field IDs"]
 = "Změna ID políčka";

// include/menu.php3, row 168
$_m["Anonymous Form Wizard"]
 = "Průvodce Anonymním Formulářem";

// include/menu.php3, row 178
$_m["Mailman: create list"]
 = "Mailman: vytvořit seznam";

// include/menu.php3, row 185, 242
$_m["Folders"]
 = "Ostatní zprávy";

// include/menu.php3, row 188
$_m["... pending"]
 = "... připravené";

// include/menu.php3, row 189
$_m["... expired"]
 = "... expirované";

// include/menu.php3, row 191, 245
$_m["Trash bin"]
 = "Koš";

// include/menu.php3, row 194
$_m["Bookmarks"]
 = "";

// include/menu.php3, row 203
$_m["Setting"]
 = "&nbsp;";

// include/menu.php3, row 204, 251
$_m["Empty trash"]
 = "Vysypat koš";

// include/menu.php3, row 204, 251
$_m["Are You sure to empty trash?"]
 = "Opravdu chcete vymazat zprávy z koše?";

// include/menu.php3, row 206, 252
$_m["Set Debug OFF"]
 = "";

// include/menu.php3, row 206, 252
$_m["Set Debug ON"]
 = "";

// include/menu.php3, row 221
$_m["List of Alerts modules using this slice as Reader Management."]
 = "Seznam modulů Zasílání, které používají tento webík jako Správu Čtenářů";

// include/menu.php3, row 223
$_m["Bulk Emails"]
 = "Hromadný e-mail";

// include/menu.php3, row 223
$_m["Send bulk email to selected users or to users in Stored searches"]
 = "Zaslat hromadný e-mail vybraným uživatelům";

// include/menu.php3, row 226
$_m["Send emails"]
 = "Poslat emaily";

// include/menu.php3, row 235
$_m["Alerts Sent"]
 = "Zasíláno přes";

// include/menu.php3, row 235
$_m["List of Alerts modules sending items from this slice."]
 = "Seznam modulů Zasílání, které posílají články z tohoto webíku.";

// include/menu.php3, row 248
$_m["Add AA"]
 = "";

// include/menu.php3, row 249
$_m["Synchronize..."]
 = "";

// include/menu.php3, row 250
$_m["Copy Slice..."]
 = "";

// include/profile.class.php3, row 300, 310, 319, 328, 337, 345
$_m["Rule added"]
 = "Pravidlo přidáno";

// include/menu_aa.php3, row 38
$_m["Slices / Modules"]
 = "Webíky / Moduly";

// include/menu_aa.php3, row 39
$_m["Create new"]
 = "Nový";

// include/menu_aa.php3, row 40
$_m["Create new Wizard"]
 = "Průvodce Přidáním Webíku";

// include/menu_aa.php3, row 42
$_m["Edit Jump"]
 = "Editovat Jump";

// include/menu_aa.php3, row 54
$_m["Slice structure"]
 = "Struktura webíku";

// include/menu_aa.php3, row 58
$_m["Wizard"]
 = "Průvodce";

// include/menu_aa.php3, row 59
$_m["Welcomes"]
 = "Vítací maily";

// include/menu_aa.php3, row 60
$_m["Templates"]
 = "Šablony";

// include/menu_aa.php3, row 62
$_m["Feeds"]
 = "";

// include/menu_aa.php3, row 63
$_m["RSS test"]
 = "";

// include/menu_aa.php3, row 64
$_m["AA RSS test"]
 = "";

// include/menu_aa.php3, row 65
$_m["Run feeding"]
 = "";

// include/menu_aa.php3, row 68
// include/tv_misc.php3, row 129, 130
$_m["Cron"]
 = "";

// include/menu_aa.php3, row 69
$_m["View Log"]
 = "Zobrazit Log";

// include/menu_aa.php3, row 70
$_m["View SearchLog"]
 = "Zobrazit SearchLog";

// include/menu_aa.php3, row 72
$_m["Mgettext"]
 = "";

// include/menu_aa.php3, row 73
$_m["Optimize"]
 = "";

// include/menu_aa.php3, row 74
$_m["Summarize"]
 = "";

// include/menu_aa.php3, row 75
$_m["Synchronize AA"]
 = "";

// include/menu_aa.php3, row 76
$_m["History"]
 = "";

// include/grabber.class.php3, row 257
$_m["CSV"]
 = "";

// include/grabber.class.php3, row 265
$_m["Import data from CSV (Comma Separated Values) format"]
 = "";

// include/grabber.class.php3, row 330
$_m["AA RSS"]
 = "";

// include/grabber.class.php3, row 336
$_m["Grabs data from generic RSS or AA RSS (used for item exchange between different AA installations)"]
 = "";

// include/grabber.class.php3, row 672
$_m["Form"]
 = "";

// include/grabber.class.php3, row 677
$_m["Grabbs data POSTed by AA form"]
 = "";

// include/sliceadd.php3, row 103
$_m["No slices"]
 = "Žádný webík";

// include/fileman.php3, row 33
$_m["Size"]
 = "Velikost";

// include/fileman.php3, row 35
$_m["Last modified"]
 = "Naposled upraveno";

// include/fileman.php3, row 113, 135
$_m["Other"]
 = "Jiné";

// include/fileman.php3, row 297
$_m["Wrong file name."]
 = "Chybný název souboru.";

// include/fileman.php3, row 305
$_m["File already exists"]
 = "Soubor již existuje.";

// include/fileman.php3, row 309, 468
$_m["Unable to create file"]
 = "Nepodařilo se vytvořit soubor";

// include/fileman.php3, row 320
$_m["Wrong directory name."]
 = "Chybný název adresáře.";

// include/fileman.php3, row 326
$_m["Unable to create directory"]
 = "Nepodařilo se vytvořit adresář";

// include/fileman.php3, row 337
$_m["First delete all files from directory"]
 = "Nejdříve odstraňte všechny soubory z adresáře";

// include/fileman.php3, row 339
$_m["Unable to delete directory"]
 = "Nepodařilo se smazat adresář";

// include/fileman.php3, row 344
$_m["Unable to delete file"]
 = "Nepodařilo se smazat soubor";

// include/fileman.php3, row 363
$_m["Error: "]
 = "Chyba: ";

// include/fileman.php3, row 375
$_m["Unable to open file for writing"]
 = "Nepodařilo se otevřít soubor pro psaní";

// include/fileman.php3, row 383
$_m["Error writing to file"]
 = "Chyba při zápisu do souboru";

// include/fileman.php3, row 394
$_m["File with this name already exists"]
 = "Soubor s tímto jménem již existuje";

// include/fileman.php3, row 397
$_m["Unable to rename"]
 = "Nepodařilo se přejmenovat";

// include/fileman.php3, row 450
$_m["Wrong directory name"]
 = "Chybný název adresáře";

// include/fileman.php3, row 460
$_m["Files with the same names as some in the template already exist. Please change the file names first."]
 = "";

// include/fileman.php3, row 515
$_m["Are you sure you want to delete the selected files and folders?"]
 = "Jste si jisti, že chcete smazat zvolené soubory a adresáře?";

// include/manager.class.php3, row 83
$_m["Searchbar"]
 = "";

// include/manager.class.php3, row 84
$_m["Scroller"]
 = "";

// include/manager.class.php3, row 85
$_m["Msg"]
 = "";

// include/manager.class.php3, row 86
$_m["Bin"]
 = "";

// include/manager.class.php3, row 87
$_m["Module ID"]
 = "";

// include/manager.class.php3, row 147
$_m["No item found"]
 = "Žádná zpráva";

// include/manager.class.php3, row 198
$_m["Publish date"]
 = "Datum vystavení";

// include/manager.class.php3, row 198
$_m["Headline"]
 = "Nadpis";

// include/manager.class.php3, row 597
$_m["Go"]
 = "Jeď";

// include/manager.class.php3, row 614
$_m["Items Page"]
 = "Stránka s články";

// include/manager.class.php3, row 663
$_m["Action ID"]
 = "";

// include/manager.class.php3, row 664
$_m["URL to open"]
 = "";

// include/manager.class.php3, row 665
$_m["Additional URL parameters"]
 = "";

// include/um_util.php3, row 98
$_m["Object"]
 = "Objekt";

// include/um_util.php3, row 158, 179
$_m["ADMINISTRATOR"]
 = "";

// include/um_util.php3, row 177
$_m["AUTHOR"]
 = "";

// include/um_util.php3, row 178
$_m["EDITOR"]
 = "";

// include/um_util.php3, row 374
$_m["Can't change user"]
 = "Nelze změnit data uživatele";

// include/tabledit_util.php3, row 72, 453
$_m["Insert was successfull."]
 = "Přidání proběho úspěšně.";

// include/tabledit_util.php3, row 80, 107, 364
$_m["Update was successfull."]
 = "Úprava proběhla úspěšně.";

// include/tabledit_util.php3, row 122, 128
$_m["Delete was successfull."]
 = "Smazání proběhlo úspěšně.";

// include/tabledit_util.php3, row 537
$_m["Value of %1 should be between %2 and %3."]
 = "Hondota %1 musí být mezi %2 a %3.";

// include/tabledit_util.php3, row 576
$_m["Table do not have set primary key on single column. You can specify primary key by primary => array (field1, field2, ...) parameter for tableedit"]
 = "";

// include/tabledit_util.php3, row 677
$_m["Wrong value: a number between %1 and %2 is expected."]
 = "Špatná hodnota: očekává se číslo mezi %1 a %2.";

// include/tabledit_util.php3, row 687
$_m["Are you sure you want to permanently DELETE this record?"]
 = "Chcete opravdu trvale SMAZAT tento záznam?";

// include/constedit_util.php3, row 117, 122
$_m["Select"]
 = "Zvolit";

// include/constedit_util.php3, row 602
$_m["No group id specified"]
 = "Nebylo zadáno ID skupiny hodnot";

// include/itemview.php3, row 332
$_m["No comment was selected"]
 = "Nebyl vybrán žádný příspěvek";

// include/validate.php3, row 89
$_m["Wrong characters - you should use a-z, A-Z, 0-9 . _ and - characters"]
 = "";

// include/validate.php3, row 116
$_m["Bad validator type: %1"]
 = "";

// include/validate.php3, row 187
$_m["No integer value"]
 = "";

// include/validate.php3, row 191, 228
$_m["Out of range - too big"]
 = "";

// include/validate.php3, row 194, 231
$_m["Out of range - too small"]
 = "";

// include/validate.php3, row 224
$_m["No float value"]
 = "";

// include/validate.php3, row 257
$_m["Wrong value"]
 = "";

// include/validate.php3, row 308, 330
$_m["Too short"]
 = "";

// include/validate.php3, row 311, 333
$_m["Too long"]
 = "";

// include/validate.php3, row 313
$_m["Wrong characters - you should use a-z, A-Z and 0-9 characters"]
 = "";

// include/validate.php3, row 363
$_m["Wrong parameter field_id for unique check"]
 = "";

// include/validate.php3, row 369
$_m["Username is not unique"]
 = "";

// include/validate.php3, row 382
$_m["Not unique - value already used"]
 = "";

// include/validate.php3, row 450
$_m["it must be filled"]
 = "musí být vyplněno";

// include/validate.php3, row 540
$_m["This field is required."]
 = "Políčko je povinné.";

// include/validate.php3, row 541
$_m["This field is required (marked by *)."]
 = "Políčko je povinné (označeno *).";

// include/validate.php3, row 550
$_m["Not a valid integer number."]
 = "Není platné celé číslo.";

// include/validate.php3, row 554
$_m["Not a valid file name."]
 = "Není platný název souboru.";

// include/validate.php3, row 559
$_m["Not a valid email address."]
 = "Není platný email.";

// include/validate.php3, row 563
$_m["The two password copies differ."]
 = "Kopie hesla se liší.";

// include/view.class.php3, row 164
$_m["Jump to view:"]
 = "Zobraz pohled:";

// include/searchlib.php3, row 41
$_m["LLIKE"]
 = "";

// include/searchlib.php3, row 42
$_m["XLIKE"]
 = "";

// include/searchlib.php3, row 43
$_m["BETWEEN"]
 = "";

// include/searchlib.php3, row 45, 92, 95, 98, 101
$_m["is set"]
 = "vyplněno";

// include/searchlib.php3, row 46
$_m["=="]
 = "";

// include/searchlib.php3, row 47
$_m["="]
 = "";

// include/searchlib.php3, row 48
$_m["<"]
 = "";

// include/searchlib.php3, row 49
$_m[">"]
 = "";

// include/searchlib.php3, row 50, 51, 52, 53
$_m["<>"]
 = "";

// include/searchlib.php3, row 54
$_m["d:<"]
 = "";

// include/searchlib.php3, row 55
$_m["d:>"]
 = "";

// include/searchlib.php3, row 56
$_m["d:<="]
 = "";

// include/searchlib.php3, row 57
$_m["d:>="]
 = "";

// include/searchlib.php3, row 58
$_m["d:="]
 = "";

// include/searchlib.php3, row 59
$_m["d:!="]
 = "";

// include/searchlib.php3, row 60
$_m["d:<>"]
 = "";

// include/searchlib.php3, row 61
$_m["e:<"]
 = "";

// include/searchlib.php3, row 62
$_m["e:>"]
 = "";

// include/searchlib.php3, row 63
$_m["e:<="]
 = "";

// include/searchlib.php3, row 64
$_m["e:>="]
 = "";

// include/searchlib.php3, row 65
$_m["e:="]
 = "";

// include/searchlib.php3, row 66
$_m["e:!="]
 = "";

// include/searchlib.php3, row 67
$_m["e:<>"]
 = "";

// include/searchlib.php3, row 68
$_m["m:<"]
 = "";

// include/searchlib.php3, row 69
$_m["m:>"]
 = "";

// include/searchlib.php3, row 70
$_m["m:<="]
 = "";

// include/searchlib.php3, row 71
$_m["m:>="]
 = "";

// include/searchlib.php3, row 72
$_m["m:="]
 = "";

// include/searchlib.php3, row 73
$_m["m:!="]
 = "";

// include/searchlib.php3, row 74
$_m["m:<>"]
 = "";

// include/searchlib.php3, row 75
$_m["-:<"]
 = "";

// include/searchlib.php3, row 76
$_m["-:>"]
 = "";

// include/searchlib.php3, row 77
$_m["-:<="]
 = "";

// include/searchlib.php3, row 78
$_m["-:>="]
 = "";

// include/searchlib.php3, row 79
$_m["-:="]
 = "";

// include/searchlib.php3, row 80
$_m["-:!="]
 = "";

// include/searchlib.php3, row 81
$_m["-:<>"]
 = "";

// include/searchlib.php3, row 125
$_m["Operator"]
 = "";

// include/searchlib.php3, row 617
$_m["Conditions"]
 = "";

// include/searchlib.php3, row 619
$_m["Sort"]
 = "";

// include/imagefunc.php3, row 57
$_m["Cannot copy %1 to %2"]
 = "Nelze zkopírovat %1 do %2";

// include/imagefunc.php3, row 161
$_m["ResampleImage unable to %1"]
 = "Nelze změnit velikost obrázku %1";

// include/imagefunc.php3, row 180
$_m["Type not supported for resize"]
 = "Typ není podporován pro změnu velikosti";

// include/init_page.php3, row 173
$_m["You do not have permission to edit items in the slice"]
 = "Nemáte právo upravovat zprávy v tomto webíku";

// include/init_page.php3, row 198
$_m["No slice found for you"]
 = "Nebyl nalezen žádný webík, ke kterému máte přístup";

// include/tv_misc.php3, row 66, 67
$_m["Wizard Welcomes"]
 = "Uvítání z Průvodce";

// include/tv_misc.php3, row 73
$_m["mail body"]
 = "tělo zprávy";

// include/tv_misc.php3, row 75
$_m["From: mail header"]
 = "From: hlavička mailu";

// include/tv_misc.php3, row 99, 100
$_m["Wizard Templates"]
 = "Šablony Průvodce";

// include/tv_misc.php3, row 125
$_m["For help see FAQ: "]
 = "Nápovědu najdete ve FAQu: ";

// include/tv_misc.php3, row 152
$_m["COUNT_HIT events will be used for counting item hits. After a while it will be automaticaly deleted."]
 = "";

// include/tv_misc.php3, row 160, 161
$_m["Log view"]
 = "";

// include/tv_misc.php3, row 183
$_m["See searchlog=1 parameter for slice.php3 in FAQ: "]
 = "";

// include/tv_misc.php3, row 191, 192
$_m["SearchLog view"]
 = "";

// include/tv_misc.php3, row 196
$_m["items found"]
 = "";

// include/tv_misc.php3, row 197
$_m["search time"]
 = "";

// include/tv_misc.php3, row 198
$_m["addition"]
 = "";

// include/tv_misc.php3, row 219, 220
$_m["Configure Fields"]
 = "";

// include/tableviews.php3, row 59, 60
$_m["Alerts Admin"]
 = "Nastavení Zasílání";

// include/tableviews.php3, row 72
$_m["confirm mail"]
 = "";

// include/tableviews.php3, row 73, 80
$_m["number of days, 0 = off"]
 = "";

// include/tableviews.php3, row 79
$_m["delete not confirmed"]
 = "";

// include/tableviews.php3, row 86
$_m["last confirm mail"]
 = "";

// include/tableviews.php3, row 93
$_m["last delete not confirmed"]
 = "";

// include/tableviews.php3, row 109
$_m["This table sets handling of not confirmed users. It's accessible only\n"
   ."            to superadmins.\n"
   ."            You can delete not confirmed users after a number of days and / or send them an email\n"
   ."            demanding them to do confirmation\n"
   ."            after a smaller number of days. To switch either of the actions off,\n"
   ."            set number of days to 0. The two last fields are for your information only.<br>\n"
   ."            <br>\n"
   ."            To run the script, you must have cron set up with a row running\n"
   ."            misc/alerts/admin_mails.php3.<br>\n"
   ."            For more information, see <a href='http://apc-aa.sourceforge.net/faq/#1389'>the FAQ</a>."]
 = "";

// include/tableviews.php3, row 125, 126
$_m["Polls Design"]
 = "Design Ankety";

// include/tableviews.php3, row 132, 155
$_m["Comment"]
 = "Komentář";

// include/tableviews.php3, row 148
$_m["Module Id"]
 = "";

// include/tableviews.php3, row 157
$_m["design description (for administrators only)"]
 = "popis designu (pouze pro administrátory)";

// include/tableviews.php3, row 160
$_m["Answer HTML"]
 = "HTML odpovědi";

// include/optimize.class.php3, row 74
$_m["Convert slice.category_sort to slice.group_by"]
 = "";

// include/optimize.class.php3, row 81
$_m["In older version of AA we used just category fields for grouping items. Now it is universal, so boolean category_sort is not enough. We use newer group_by field for quite long time s most probably all your slices are already conevrted."]
 = "";

// include/optimize.class.php3, row 91
$_m["%1 slices are not converted"]
 = "";

// include/optimize.class.php3, row 94
$_m["All slices are already converted"]
 = "";

// include/optimize.class.php3, row 137
$_m["Relation table duplicate records"]
 = "";

// include/optimize.class.php3, row 144
$_m["Testing if relation table contain records, where values in both columns are identical (which was bug fixed in Jan 2006)"]
 = "";

// include/optimize.class.php3, row 155
$_m["%1 duplicates found"]
 = "";

// include/optimize.class.php3, row 158, 791, 806
$_m["No duplicates found"]
 = "";

// include/optimize.class.php3, row 183
$_m["Feeds table inconsistent records"]
 = "";

// include/optimize.class.php3, row 190
$_m["Testing if feeds table do not contain relations to non existant slices (after slice deletion)"]
 = "";

// include/optimize.class.php3, row 206
$_m["Wrong destination slice id: %1 -> %2"]
 = "";

// include/optimize.class.php3, row 217
$_m["Wrong source slice id: %1 -> %2"]
 = "";

// include/optimize.class.php3, row 222
$_m["No wrong references found, hurray!"]
 = "";

// include/optimize.class.php3, row 272
$_m["Fix user login problem, constants editiong problem, ..."]
 = "";

// include/optimize.class.php3, row 279
$_m["Replaces binary fields by varbinary and removes trailing zeros. Needed for MySQL > 5.0.17"]
 = "";

// include/optimize.class.php3, row 454
$_m["Convert Readers login to reader id"]
 = "";

// include/optimize.class.php3, row 461
$_m["There was change in Reader management functionality in AA v2.8.1, so readers are not internaly identified by its login, but by reader ID (item ID of reader in Reader slice). This is much more powerfull - you can create relations just as in normal slice. It works well without any change. The only problem is, if you set any slice to be editable by users from Reader slice. In that case the fields edited_by........ and posted_by........ are filled by readers login instead of reader id. You can fix it by \"Repair\"."]
 = "";

// include/optimize.class.php3, row 475
$_m["%1 login names from reader slice found as records in item.posted_by which is wrong (There should be reader ID from AA v2.8.1). \"Repair\" will correct it."]
 = "";

// include/optimize.class.php3, row 480
$_m["%1 login names from reader slice found as records in item.edited_by which is wrong (There should be reader ID from AA v2.8.1). \"Repair\" will correct it."]
 = "";

// include/optimize.class.php3, row 518, 585
$_m["Column item.posted_by updated for %1 (id: %2)."]
 = "";

// include/optimize.class.php3, row 525, 592
$_m["Column item.edited_by updated for %1 (id: %2)."]
 = "";

// include/optimize.class.php3, row 539
$_m["Checks if all tables have right columns and indexes"]
 = "";

// include/optimize.class.php3, row 546
$_m["We are time to time add new table or collumn to existing table in order we can support new features. This option will update the datastructure to the last one. No data will be lost."]
 = "";

// include/optimize.class.php3, row 607
$_m["Clear Pagecache"]
 = "";

// include/optimize.class.php3, row 614
$_m["Whole pagecache will be invalidated and deleted"]
 = "";

// include/optimize.class.php3, row 624, 723, 871, 1042, 1097
$_m["There is nothing to test."]
 = "";

// include/optimize.class.php3, row 635
$_m["Table pagecache_new created"]
 = "";

// include/optimize.class.php3, row 637
$_m["Table pagecache_str2find_new created"]
 = "";

// include/optimize.class.php3, row 639
$_m["Renamed tables pagecache_* to pagecache_*_bak"]
 = "";

// include/optimize.class.php3, row 641
$_m["Renamed tables pagecache_*_new to pagecache_*"]
 = "";

// include/optimize.class.php3, row 643
$_m["Old pagecache_*_bak tables dropped"]
 = "";

// include/optimize.class.php3, row 658
$_m["Fix inconcistency in pagecache"]
 = "";

// include/optimize.class.php3, row 665
$_m["Delete not existant keys in pagecache_str2find table"]
 = "";

// include/optimize.class.php3, row 679
$_m["id: %1, pagecache_id: %2, str2find: %3"]
 = "";

// include/optimize.class.php3, row 681
$_m["We found %1 inconsistent rows from %2 in pagecache_str2find"]
 = "";

// include/optimize.class.php3, row 693
$_m["Inconsistent rows in pagecache_str2find removed"]
 = "";

// include/optimize.class.php3, row 706
$_m["Copy Content Table"]
 = "";

// include/optimize.class.php3, row 713
$_m["Copy data for all items newer than short_id=1941629 from content table to content2 table. Used for recovery content table on Ecn server. Not usefull for any other users, I think."]
 = "";

// include/optimize.class.php3, row 757
$_m["Coppied"]
 = "";

// include/optimize.class.php3, row 771
$_m["Fix field definitions duplicates"]
 = "";

// include/optimize.class.php3, row 778
$_m["There should be only one slice_id - field_id pair in all slices, but sometimes there are more than one (mainly because of error in former sql_update.php3 script, where more than one display_count... fields were added)."]
 = "";

// include/optimize.class.php3, row 795
$_m["Duplicate in slice - field: %1 - %2"]
 = "";

// include/optimize.class.php3, row 820
$_m["Field %2 in slice %1 fixed"]
 = "";

// include/optimize.class.php3, row 854
$_m["Add Polls tables"]
 = "";

// include/optimize.class.php3, row 861
$_m["Create tables for new Polls module and adds first - template polls. It removes all current polls!"]
 = "";

// include/optimize.class.php3, row 905
$_m["Polls module created"]
 = "";

// include/optimize.class.php3, row 925
$_m["Update database structure"]
 = "";

// include/optimize.class.php3, row 932, 1029
$_m["[experimental] "]
 = "";

// include/optimize.class.php3, row 932
$_m["Updates the database structure for AA. It cheks all the tables in current system and compare it with the newest database structure. The new table is created as tmp_*, then the content from old table is copied and if everything is OK, then the old table is renamed to bck_* and tmp_* is renamed to new table. (new version based on the metabase structure)"]
 = "";

// include/optimize.class.php3, row 950
$_m["Tables %1 are identical."]
 = "";

// include/optimize.class.php3, row 952
$_m["Tables %1 are different: <br>Template:<br>%2<br>Current:<br>%3"]
 = "";

// include/optimize.class.php3, row 971
$_m["Tables %1 are identical. Skipping."]
 = "";

// include/optimize.class.php3, row 975
$_m["Deleting temporary table tmp_%1, if exist."]
 = "";

// include/optimize.class.php3, row 977
$_m["Creating temporary table tmp_%1."]
 = "";

// include/optimize.class.php3, row 982
$_m["Creating \"old\" data table %1 if not exists."]
 = "";

// include/optimize.class.php3, row 987
$_m["copying old values to new table %1 -> tmp_%1"]
 = "";

// include/optimize.class.php3, row 1001
$_m["backup old table %1 -> bck_%1 and use new tables instead tmp_%1 -> %1"]
 = "";

// include/optimize.class.php3, row 1006
$_m["%1 done."]
 = "";

// include/optimize.class.php3, row 1022
$_m["Restore data from backup tables"]
 = "";

// include/optimize.class.php3, row 1029
$_m["Deletes all the current tables (slice, item, ...) where we have bck_table and renames all backup tables (bck_slice, bck_item, ...) to right names (slice, item, ...)."]
 = "";

// include/optimize.class.php3, row 1061
$_m["There is no bck_%1 table - %1 not restored."]
 = "";

// include/optimize.class.php3, row 1064
$_m["Replace table bck_%1 -> %1"]
 = "";

// include/optimize.class.php3, row 1080
$_m["Create upload directory for current slice"]
 = "";

// include/optimize.class.php3, row 1087
$_m["see IMG_UPLOAD_PATH parameter in config.php3 file"]
 = "";

// include/optimize.class.php3, row 1106
$_m["OK, %1 created"]
 = "";

// include/widget.class.php3, row 284
$_m["SAVE CHANGE"]
 = "";

// include/widget.class.php3, row 349
$_m["Text Area"]
 = "";

// include/widget.class.php3, row 363, 421, 456, 559, 935, 975
$_m["Row count"]
 = "";

// include/widget.class.php3, row 409
$_m["Textarea with Presets"]
 = "";

// include/widget.class.php3, row 420, 594, 639, 679, 858, 934, 974, 1092, 1167
$_m["Constants or slice"]
 = "";

// include/widget.class.php3, row 420, 594, 639, 679, 858, 934, 974, 1092, 1167
$_m["Constants (or slice) which is used for value selection"]
 = "";

// include/widget.class.php3, row 422, 457
$_m["Column count"]
 = "";

// include/widget.class.php3, row 445
$_m["Rich Edit Text Area"]
 = "";

// include/widget.class.php3, row 458
$_m["type: class (default) / iframe"]
 = "";

// include/widget.class.php3, row 508
$_m["Text Field"]
 = "";

// include/widget.class.php3, row 522
$_m["Max characters"]
 = "";

// include/widget.class.php3, row 522, 595
$_m["max count of characters entered (maxlength parameter)"]
 = "";

// include/widget.class.php3, row 523, 1208
$_m["Width"]
 = "";

// include/widget.class.php3, row 523, 596
$_m["width of the field in characters (size parameter)"]
 = "";

// include/widget.class.php3, row 544
$_m["Multiple Text Field"]
 = "";

// include/widget.class.php3, row 558, 1097
$_m["Buttons to show"]
 = "";

// include/widget.class.php3, row 558
$_m["Which action buttons to show:<br>M - Move (up and down)<br>D - Delete value,<br>A - Add new value<br>C - Change the value<br>Use 'MDAC' (default), 'DAC', just 'M' or any other combination. The order of letters M,D,A,C is not important."]
 = "";

// include/widget.class.php3, row 580
$_m["Text Field with Presets"]
 = "";

// include/widget.class.php3, row 595
$_m["max characters"]
 = "";

// include/widget.class.php3, row 596
$_m["width"]
 = "";

// include/widget.class.php3, row 597, 640, 682, 861, 936, 978, 1102
$_m["slice field"]
 = "";

// include/widget.class.php3, row 597, 640, 682, 861, 936, 978, 1102
$_m["field (or format string) that will be displayed in select box (from related slice). if not specified, in select box are displayed headlines. you can use also any AA formatstring here (like: _#HEADLINE - _#PUB_DATE). (only for constants input type: slice)"]
 = "";

// include/widget.class.php3, row 598, 641
$_m["Use name"]
 = "";

// include/widget.class.php3, row 598, 641
$_m["if set (=1), then the name of selected constant is used, insted of the value. Default is 0"]
 = "";

// include/widget.class.php3, row 599
$_m["Adding"]
 = "";

// include/widget.class.php3, row 599
$_m["adding the selected items to input field comma separated"]
 = "";

// include/widget.class.php3, row 600
$_m["Second Field"]
 = "";

// include/widget.class.php3, row 600
$_m["field_id of another text field, where value of this selectbox will be propagated too (in main text are will be text and there will be value)"]
 = "";

// include/widget.class.php3, row 601
$_m["Add to Constant"]
 = "";

// include/widget.class.php3, row 601
$_m["if set to 1, user typped value in inputform is stored into constants (only if the value is not already there)"]
 = "";

// include/widget.class.php3, row 602, 642, 683, 862, 937, 979, 1098
$_m["Show items from bins"]
 = "";

// include/widget.class.php3, row 602, 642, 683, 862, 937, 979, 1098
$_m["(for slices only) To show items from selected bins, use following values:<br>Active bin - '%1'<br>Pending bin - '%2'<br>Expired bin - '%3'<br>Holding bin - '%4'<br>Trash bin - '%5'<br>Value is created as follows: eg. You want show headlines from Active, Expired and Holding bins. Value for this combination is counted like %1+%3+%4&nbsp;=&nbsp;13"]
 = "";

// include/widget.class.php3, row 603, 643, 684, 863, 938, 980, 1099
$_m["Filtering conditions"]
 = "";

// include/widget.class.php3, row 603, 643, 684, 863, 938, 980, 1099
$_m["(for slices only) Conditions for filtering items in selection. Use conds[] array."]
 = "";

// include/widget.class.php3, row 604, 644, 685, 864, 939, 981, 1100
$_m["Sort by"]
 = "";

// include/widget.class.php3, row 604, 644, 685, 864, 939, 981, 1100
$_m["(for slices only) Sort the items in specified order. Use sort[] array"]
 = "";

// include/widget.class.php3, row 625
$_m["Select Box"]
 = "";

// include/widget.class.php3, row 665
$_m["Radio Button"]
 = "";

// include/widget.class.php3, row 680, 859
$_m["Columns"]
 = "";

// include/widget.class.php3, row 680, 859
$_m["Number of columns. If unfilled, the checkboxes are all on one line. If filled, they are formatted in a table."]
 = "";

// include/widget.class.php3, row 681, 860
$_m["Move right"]
 = "";

// include/widget.class.php3, row 681, 860
$_m["Should the function move right or down to the next value?"]
 = "";

// include/widget.class.php3, row 720
$_m["Starting Year"]
 = "";

// include/widget.class.php3, row 720
$_m["The (relative) start of the year interval"]
 = "";

// include/widget.class.php3, row 721
$_m["Ending Year"]
 = "";

// include/widget.class.php3, row 721
$_m["The (relative) end of the year interval"]
 = "";

// include/widget.class.php3, row 722
$_m["Relative"]
 = "";

// include/widget.class.php3, row 722
$_m["If this is 1, the starting and ending year will be taken as relative - the interval will start at (this year - starting year) and end at (this year + ending year). If this is 0, the starting and ending years will be taken as absolute."]
 = "";

// include/widget.class.php3, row 723
$_m["Show time"]
 = "";

// include/widget.class.php3, row 723
$_m["show the time box? (1 means Yes, undefined means No)"]
 = "";

// include/widget.class.php3, row 811
$_m["Check Box"]
 = "";

// include/widget.class.php3, row 844
$_m["Multiple Checkboxes"]
 = "";

// include/widget.class.php3, row 920
$_m["Multiple Selectbox"]
 = "";

// include/widget.class.php3, row 960
$_m["Two Boxes"]
 = "";

// include/widget.class.php3, row 976
$_m["Title of \"Offer\" selectbox"]
 = "";

// include/widget.class.php3, row 976
$_m["Our offer"]
 = "";

// include/widget.class.php3, row 977
$_m["Title of \"Selected\" selectbox"]
 = "";

// include/widget.class.php3, row 1002
$_m["File Upload"]
 = "";

// include/widget.class.php3, row 1016
$_m["Allowed file types"]
 = "";

// include/widget.class.php3, row 1017
$_m["Label"]
 = "";

// include/widget.class.php3, row 1017
$_m["To be printed before the file upload field"]
 = "";

// include/widget.class.php3, row 1017
$_m["File: "]
 = "";

// include/widget.class.php3, row 1018
$_m["Hint"]
 = "";

// include/widget.class.php3, row 1018
$_m["appears beneath the file upload field"]
 = "";

// include/widget.class.php3, row 1018
$_m["You can select a file ..."]
 = "";

// include/widget.class.php3, row 1081
$_m["Related Item Window"]
 = "";

// include/widget.class.php3, row 1093
$_m["Row count in the list"]
 = "";

// include/widget.class.php3, row 1094
$_m["Actions to show"]
 = "";

// include/widget.class.php3, row 1094
$_m["Defines, which buttons to show in item selection:<br>A - Add<br>M - add Mutual<br>B - Backward<br> Use 'AMB' (default), 'MA', just 'A' or any other combination. The order of letters A,M,B is important."]
 = "";

// include/widget.class.php3, row 1095
$_m["Admin design"]
 = "";

// include/widget.class.php3, row 1095
$_m["If set (=1), the items in related selection window will be listed in the same design as in the Item manager - 'Design - Item Manager' settings will be used. Only the checkbox will be replaced by the buttons (see above). It is important that the checkbox must be defined as:<br> <i>&lt;input type=checkbox name=\"chb[x_#ITEM_ID#]\" value=\"1\"&gt;</i> (which is default).<br> If unset (=0), just headline is shown (default)."]
 = "";

// include/widget.class.php3, row 1096
$_m["Tag Prefix"]
 = "";

// include/widget.class.php3, row 1096
$_m["Deprecated: selects tag set ('AMB' / 'GYR'). Ask Mitra for more details."]
 = "";

// include/widget.class.php3, row 1097
$_m["Which action buttons to show:<br>M - Move (up and down)<br>D - Delete relation,<br>R - add Relation to existing item<br>N - insert new item in related slice and make it related<br>E - Edit related item<br>Use 'DR' (default), 'MDRNE', just 'N' or any other combination. The order of letters M,D,R,N,E is not important."]
 = "";

// include/widget.class.php3, row 1101
$_m["Filtering conditions - changeable"]
 = "";

// include/widget.class.php3, row 1101
$_m["Conditions for filtering items in related items window. This conds user can change."]
 = "";

// include/widget.class.php3, row 1123
$_m["Do not show"]
 = "Nezobrazuj";

// include/widget.class.php3, row 1153
$_m["Hierachical constants"]
 = "Hierachie konstant";

// include/widget.class.php3, row 1168
$_m["Count of level boxes"]
 = "";

// include/widget.class.php3, row 1169
$_m["Box width"]
 = "";

// include/widget.class.php3, row 1169
$_m["Width in characters"]
 = "";

// include/widget.class.php3, row 1170
$_m["Size of target"]
 = "";

// include/widget.class.php3, row 1170
$_m["Lines in the target select box"]
 = "";

// include/widget.class.php3, row 1171
$_m["Horizontal"]
 = "";

// include/widget.class.php3, row 1171
$_m["Show levels horizontally"]
 = "";

// include/widget.class.php3, row 1172
$_m["First selectable"]
 = "";

// include/widget.class.php3, row 1172
$_m["First level which will have a Select button"]
 = "";

// include/widget.class.php3, row 1173
$_m["Level names"]
 = "";

// include/widget.class.php3, row 1173
$_m["Names of level boxes, separated by tilde (~). Replace the default Level 0, Level 1, ..."]
 = "";

// include/widget.class.php3, row 1173
$_m["Top level~Second level~Keyword"]
 = "";

// include/widget.class.php3, row 1194
$_m["Password and Change password"]
 = "Heslo a Změnit heslo";

// include/widget.class.php3, row 1208
$_m["width of the three fields in characters (size parameter)"]
 = "";

// include/widget.class.php3, row 1209
$_m["Label for Change Password"]
 = "";

// include/widget.class.php3, row 1209
$_m["Replaces the default 'Change Password'"]
 = "";

// include/widget.class.php3, row 1209
$_m["Change your password"]
 = "";

// include/widget.class.php3, row 1210
$_m["Label for Retype New Password"]
 = "";

// include/widget.class.php3, row 1210
$_m["Replaces the default \"Retype New Password\""]
 = "";

// include/widget.class.php3, row 1210
$_m["Retype the new password"]
 = "";

// include/widget.class.php3, row 1211
$_m["Label for Delete Password"]
 = "";

// include/widget.class.php3, row 1211
$_m["Replaces the default \"Delete Password\""]
 = "";

// include/widget.class.php3, row 1211
$_m["Delete password (set to empty)"]
 = "";

// include/widget.class.php3, row 1212
$_m["Help for Change Password"]
 = "";

// include/widget.class.php3, row 1212
$_m["Help text under the Change Password box (default: no text)"]
 = "";

// include/widget.class.php3, row 1212
$_m["To change password, enter the new password here and below"]
 = "";

// include/widget.class.php3, row 1213
$_m["Help for Retype New Password"]
 = "";

// include/widget.class.php3, row 1213
$_m["Help text under the Retype New Password box (default: no text)"]
 = "";

// include/widget.class.php3, row 1213
$_m["Retype the new password exactly the same as you entered into \"Change Password\"."]
 = "";

// include/widget.class.php3, row 1234
$_m["Hidden field"]
 = "Skryté pole";

// include/widget.class.php3, row 1267
$_m["Local URL Picker"]
 = "";

// include/widget.class.php3, row 1281
$_m["The URL of your local web server from where you want to start browsing for a particular URL."]
 = "";

// include/widget.class.php3, row 1281
$_m["http#://www.ecn.cz/articles/solar.shtml"]
 = "";

// include/slice.class.php3, row 61
$_m["WARNING: slice: %s doesn't look like an unpacked id"]
 = "POZOR: webík: %s nevypadá jako rozbalené id";


