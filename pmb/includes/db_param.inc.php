<?php
// +-------------------------------------------------+
// � 2002-2004 PMB Services / www.sigb.net pmb@sigb.net et contributeurs (voir www.sigb.net)
// +-------------------------------------------------+

// param�tres d'acc�s � la base MySQL

// prevents direct script access
if(preg_match('/db_param\.inc\.php/', $_SERVER['REQUEST_URI'])) {
	include('./forbidden.inc.php'); forbidden();
}
// inclure ici les tableaux des bases de donn�es accessibles
$_tableau_databases[0]="bibli" ;
$_libelle_databases[0]="bibli" ;

// pour multi-bases
if (isset($database)) {
	define('LOCATION', $database) ;
} else {
	if (!isset($_COOKIE["PhpMyBibli-DATABASE"]) || !$_COOKIE["PhpMyBibli-DATABASE"]) define('LOCATION', $_tableau_databases[0]);
	else define('LOCATION', $_COOKIE["PhpMyBibli-DATABASE"]) ;
}

// define pour les param�tres de connection. A adapter.
switch(LOCATION):
	case 'remote':	// mettre ici les valeurs pour l'acc�s distant
		define('SQL_SERVER', 'remote');		// nom du serveur . exemple : http://sql.free.fr
		define('USER_NAME', 'username');	// nom utilisateur
		define('USER_PASS', 'userpwd');		// mot de passe
		define('DATA_BASE', 'dbname');		// nom base de donn�es
		define('SQL_TYPE',  'mysql');		// Type de serveur de base de donn�es
		//$charset = 'utf-8'; || $charset = 'iso-8859-1';
		//$time_zone = 'Europe/Paris'; //Pour modifier l'heure PHP
		//$time_zone_mysql =  "'-00:00'"; //Pour modifier l'heure MySQL
		break;
	case 'bibli':
		define('SQL_SERVER', 'localhost');		// nom du serveur
		define('USER_NAME', 'bibli');		// nom utilisateur
		define('USER_PASS', 'bibli');		// mot de passe
		define('DATA_BASE', 'bibli');		// nom base de donn�es
		define('SQL_TYPE',  'mysql');			// Type de serveur de base de donn�es
		// Encode de caracteres de la base de donn�es 
		$charset = "utf-8" ;
		//$time_zone = 'Europe/Paris'; //Pour modifier l'heure PHP
		//$time_zone_mysql =  "'-00:00'"; //Pour modifier l'heure MySQL
		break;
	default:		// valeurs pour l'acc�s local
		define('SQL_SERVER', 'localhost');		// nom du serveur
		define('USER_NAME', 'bibli');			// nom utilisateur
		define('USER_PASS', 'bibli');			// mot de passe
		define('DATA_BASE', 'bibli');			// nom base de donn�es
		define('SQL_TYPE',  'mysql');			// Type de serveur de base de donn�es
		//$charset = 'utf-8'; || $charset = 'iso-8859-1';
		//$time_zone = 'Europe/Paris'; //Pour modifier l'heure PHP
		//$time_zone_mysql =  "'-00:00'"; //Pour modifier l'heure MySQL
		break;
endswitch;

$dsn_pear = SQL_TYPE."://".USER_NAME.":".USER_PASS."@".SQL_SERVER."/".DATA_BASE ;
