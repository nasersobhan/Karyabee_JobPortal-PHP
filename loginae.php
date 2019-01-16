<?php
	//if (!isset($_SESSION)) {
  session_start();

//Include database connection details
/*	define( "DB_USERNAME", "karyabee_narjobs" );
define( "HOST_NAME", "localhost" );
define( "DB_NAME", "karyabee_narjobs" );
define( "DB_PASSWORD", "ISC0uuKm+=NA" );*/
define( "HOME", "http://karyabee.com" );
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
		include('classes/db.php');
	//Connect to mysql server
	/*$link = mysql_connect(HOST_NAME, DB_USERNAME, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_NAME);
	if(!$db) {
		die("Unable to select database");
	}
	*/
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = $_POST['login'];
	$password = clean($_POST['password']);
	
	//Input Validations
	if($login == '') {
	
		 ?>
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/user/login/emailm">
<?php
		exit();
	}
	if($password == '') {
	
		 ?>
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/user/login/passm">
<?php
exit();
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag == true) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		//header("location: login.php");
		
	}
	
	//Create query
	$qry="SELECT * FROM   sob_resume WHERE sus=0 AND email='$login' AND password='".md5($_POST['password'])."'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			
			$_SESSION['J_ID'] = $member['id'];
			$_SESSION['J_EMAIL'] = $member['email'];
			$_SESSION['J_NAME'] = $member['fullname'];
		
		
			$_SESSION['LOGIN'] = 1;
		$_SESSION['IMG'] = $member['img'];
		$_SESSION['NAME'] = $member['fullname'];
			session_write_close();
			
			
			

define(JID,$_SESSION['J_ID']);
//echo $_SESSION['C_ID'].'<br>';
//echo $_SESSION['C_EMAIL'].'<br>';
//echo $_SESSION['C_CRD'].'<br>';
			
					 ?>
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/user/resume">
<?php
			exit();
		}else {
		
			 ?>
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/user/login/worng">
<?php
			exit();
		}
	}else {
		die("Query failed");
	}	
	
	
	
	


	
	
	
	
	?>