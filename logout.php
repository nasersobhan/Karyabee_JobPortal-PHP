<?php 

session_start();
	session_destroy();

	//Unset the variables stored in session
	unset($_SESSION['C_ID']);
	unset($_SESSION['C_EMAIL']);
	unset($_SESSION['C_CRD']);
	unset($_SESSION['J_ID']);
	unset($_SESSION['J_EMAIL']);
	unset($_SESSION['J_NAME']);
	define(CID,"");
	
	header("location: index.php");
	?>