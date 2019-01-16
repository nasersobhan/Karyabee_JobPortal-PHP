<?php
	//if (!isset($_SESSION)) {
  session_start();

//Include database connection details
/*	define( "DB_USERNAME", "root" );
define( "HOST_NAME", "localhost" );
define( "DB_NAME", "karyabee" );
define( "DB_PASSWORD", "SMtv1ts" );*/
define( "HOME", "http://karyabee.com" );
	//Array to store validation errors

	/*//Connect to mysql server
	$link = mysql_connect(HOST_NAME, DB_USERNAME, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_NAME);
	if(!$db) {
		die("Unable to select database");
	}*/
		
		
		include('classes/db.php');
		
		
		$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
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
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/login/emailm">
<?php
		exit();
	}
	if($password == '') {
	
		 ?>
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/login/passm">
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
	$qry="SELECT * FROM  sob_logemp WHERE active=0 AND email='$login' AND password='".md5($_POST['password'])."'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			
			$_SESSION['C_ID'] = $member['id'];
			$_SESSION['C_EMAIL'] = $member['email'];
			$_SESSION['C_CRD'] = $member['crdt'];
		$_SESSION['C_RANK'] = $member['rank'];
		
		$_SESSION['LOGIN'] = 1;
		$_SESSION['IMG'] = $member['img'];
		$_SESSION['NAME'] = $member['username'];
			session_write_close();
			
			
			

define('CID',$_SESSION['C_ID']);
//echo $_SESSION['C_ID'].'<br>';
//echo $_SESSION['C_EMAIL'].'<br>';
//echo $_SESSION['C_CRD'].'<br>';
			
					 ?>
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/list">
<?php
			exit();
		}else {
		
			 ?>
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/login/worng">
<?php
			exit();
		}
	}else {
		die("Query failed");
	}	
	
	
	
	


	
	
	
	
	?>