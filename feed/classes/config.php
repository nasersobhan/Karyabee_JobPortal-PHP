<?Php 
date_default_timezone_set( "Asia/Kabul" );  // http://www.php.net/manual/en/timezones.php
define( "COST", 50 );
define( "DB_USERNAME", "asbsixni_jobsusr" );
define( "HOST_NAME", "localhost" );
define( "DB_NAME", "asbsixni_jobsaf" );
define( "DB_PASSWORD", "@#X[}PFVVFNr" );
define( "CLASS_PATH", "classes" );
define( "HOME", "http://af.jobs.ooyta.com" );
define( "THEMEPATH", HOME ."/theme" );
define( "TEMPLATE_PATH", "theme" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "STYLE", HOME ."/theme/css/style.css" );
define( "PAGETITLE", "Karyabee" );
define( "NOPPAGE", 30 );






///lang

define( "CRIDETMSG", 'No Cridet' );
define( "ADSTEXT", 'No Cridet' );
define( "ADD_EMAIL", 'info@karyabee.com' );









$link = mysql_connect(HOST_NAME, DB_USERNAME, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_NAME);
	if(!$db) {
		die("Unable to select database");
	}




?>