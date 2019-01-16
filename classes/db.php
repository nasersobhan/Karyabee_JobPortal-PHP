<?php
include('classes/database.class.php');

$hostname = "localhost"; 
$database = "asbsixni_jobsaf"; 
$username = "asbsixni_jobsusr"; 
$password = "@#X[}PFVVFNr";  
define( "HOME", "http://af.jobs.ooyta.com" );

global $dbase;
$dbase = new ss_db("$hostname:$database:$username:$password"); 


$link = mysql_connect($hostname, $username, $password);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db($database);
	if(!$db) {
		die("Unable to select database");
	}
?>