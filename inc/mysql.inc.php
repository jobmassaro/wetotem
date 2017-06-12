<?php


require_once 'init.php';
// This file contains the database access information. 
// This file establishes a connection to MySQL and selects the database.
// This script is begun in Chapter 7.

// Set the database access information as constants:
/*DEFINE ('DB_USER', 'Sql1069287');
DEFINE ('DB_PASSWORD', '6t7a5k01k0');
DEFINE ('DB_HOST', '89.46.111.38');
DEFINE ('DB_NAME', 'Sql1069287_1');
*/

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'worldevent01');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'we');

define('BASE_URL', 'inc/');
define('PATH_GLOBAL', 'gtotem/');
define('MYSQL', BASE_URL . 'mysql.inc.php');

#define('LNK_LIB', LNK_GLOBAL . 'lib/');
define('PATH_LIB', PATH_GLOBAL . 'lib/');
define('PATH_UPLOAD', PATH_GLOBAL . 'upload/');
define('PATH_GLOBAL_COMMON', PATH_GLOBAL . 'common/');
define('PATH_GLOBAL_FORM', PATH_GLOBAL . 'models/');
define('PATH_GLOBAL_DB', PATH_GLOBAL . 'dbase/');
define('PATH_GLOBAL_TOTEM', PATH_GLOBAL . 'totem/');
define('PATH_GLOBAL_SWF', PATH_GLOBAL . 'swf/');
define('PATH_GLOBAL_LOGO', PATH_GLOBAL . 'logo/');
define('PATH_GLOBAL_UTY', PATH_GLOBAL . 'utility/');
define('PATH_GLOBAL_FOTO', PATH_GLOBAL . 'foto/');


$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

mysqli_set_charset($dbc, 'utf8');

/*
include("./common/functions.php"); 
include("./lib/class.User.php"); 
include("./lib/class.SecurityManager.php"); 
include("./lib/class.SessionManager.php"); 
include("./lib/class.ConfigurationManager.php"); 
include("./lib/class.Admin.php"); 
include("./lib/class.Concorsi.php"); 
include("./lib/class.Action.php"); 
include("./lib/class.Gioca.php");
include("./lib/class.Configurazioni.php");


*/

define("TABELLA_DB","igigli_");

define("ADMIN" , TABELLA_DB ."admin");
define("CODICEONLINE" , "leduevalli_codiceonline");
define("CONCORSO" , TABELLA_DB ."concorso");
define("ESTRAZIONE" , "leduevalli_estrazione");
define("PREMI_ESTRAZIONE" , "leduevalli_estrazione_premi");
define("VINCITORI_ESTRAZIONE_TMP" , "leduevalli_estrazione_temp_");
define("QUERY_ESTRAZIONE" , "leduevalli_estrazione_query");
define("GIOCATA" , "leduevalli_giocata");
define("GIORNATA" , "leduevalli_giornata");
define("GIOCATA_ONLINE" , "leduevalli_giocata_online");
define("GIORNATA_ONLINE" , "leduevalli_giornata_online");
define("GIORNATA_PASS" , "leduevalli_giornata_pass");
define("RACCOLTA" , "leduevalli_raccolta");
define("PREMIO" , "leduevalli_premio");
define("PREMIO_ONLINE" , "leduevalli_premio_online");
define("PV" , "leduevalli_pv");
define("SCONTRINO" , "leduevalli_scontrino");
define("SCONTRINI" , "leduevalli_scontrini");
define("SCONTRINO_ONLINE" , "leduevalli_scontrino_online");
define("VENDITA" ,TABELLA_DB . "vendita");
define("CARNET" , TABELLA_DB ."carnet");
define("COUPON" , "leduevalli_coupon");
define("ACCREDITAMENTO" , TABELLA_DB . "accreditamento");
define("ACCESSO" , TABELLA_DB ."accesso");
define("ATTRAZIONE" , "leduevalli_attrazioni");
define("CALCOLO" , "leduevalli_calcolo");
define("CALCOLO_ONLINE" , "leduevalli_calcolo_online");
define("PROBABILITA" , "leduevalli_probabilita");
define("PROBABILITA_ONLINE" , "leduevalli_probabilita_online");
define("TABS" , TABELLA_DB ."tabs");
define("QUERY" , "leduevalli_query");
define("PREMIO_CASELLARIO" , "leduevalli_premi_casellario");
define("MEMORY" , "leduevalli_concorso_memory");
define("MAPPA" , "leduevalli_mappa");
define("ANSWER" , "leduevalli_answer");
define("VIDEO" , "leduevalli_video");
define("UOVO" , "leduevalli_uovo");
define("PERIZIA" , "leduevalli_perizia");
define("PARAMETER" , "leduevalli_parameter");
define("CLASSIFICA" , "leduevalli_classifica");
define("QUESITO" , "leduevalli_quesiti");
define("QUESITO_SELECT" , "leduevalli_select_quesiti");
define("FOTO" , "leduevalli_foto");
define("DOWNLOAD" , "leduevalli_download");
define("FIGLI" , "leduevalli_figli");
define("TESSERE_CANCELLATE" ,TABELLA_DB . "tessere_accreditamento_cancellate");




define("LOG_ESTRAZIONI" ,TABELLA_DB . "log_estrazioni");
define('newgiornata', 'igigli_newgiornata', true);
define('newgiocata', 'igigli_newgiocata', true);
define('newpremi', 'igigli_newpremio', true);
define('newcredito', 'igigli_newcredito', true);





