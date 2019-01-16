<?Php session_start(); 
//error_reporting(-1);
//ini_set('display_errors', 'On');
function mysql_cleanup($array){
	
	if(is_array($array)){
		foreach($array as $key=>$value){
			
					$value = str_replace('"',"&quot;",$value);
					$value = str_replace("'","&acute;",$value);

					$value = str_replace("script","scrip t",$value); //no easy javascript injection
					$value = str_replace("union","uni on",$value); //no easy common mysql temper
		
					$value = htmlentities($value, ENT_QUOTES); //encodes the string nicely
					$value = addslashes($value); //mysql_real_escape_string() //htmlentities
		
					if($key == "UserID" || $key == "PageID"){ //List variables that MUST be integers. Look at your mysql scheme and find every int(*) field.
						$value = filter_var($value, FILTER_SANITIZE_NUMBER_INT); //Forces an integer
					}elseif($key == "CountryCode" || $key == "StateCode"){
						$value = substr(trim($value),0,2); //Forces a max two character string
					}elseif($key == "arrivalDate" || $key == "departureDate"){
						$value = substr(trim($value),0,10); //Forces a max 10 character string. Could be also be tested by regular expression for a date value.
					}else{
						$value = substr($value,0,100);
						$value = trim(filter_var($value, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)); 
					}
					
				$array[$key] = $value;
			}
	
		
	return $array;
	}else{
				return false;
			}
			

}
if(isset($_GET))
mysql_cleanup($_GET);
if(isset($_POST))
mysql_cleanup($_POST);
if(isset($_REQUEST))
mysql_cleanup($_REQUEST);
require("classes/db.php" );

//register user infor
if(isset($_SESSION['C_ID']))
define( "C_ID", $_SESSION['C_ID'] );
if(isset($_SESSION['C_EMAIL']))
define( "C_EMAIL", $_SESSION['C_EMAIL'] );
if(isset($_SESSION['C_RANK']))
define( "C_RANK", $_SESSION['C_RANK'] );
if(isset($_SESSION['J_ID']))
define( "J_ID", $_SESSION['J_ID'] );
if(isset($_SESSION['J_EMAIL']))
define( "J_EMAIL", $_SESSION['J_EMAIL'] );
if(isset($_SESSION['J_NAME']))
define( "J_NAME", $_SESSION['J_NAME'] );
//define( "HOME", "http://webserver/karyabee" );

date_default_timezone_set( "Asia/Kabul" );  // http://www.php.net/manual/en/timezones.php
define( "COST", 0 );
define('ABSPATH',realpath(dirname(__FILE__)));
define( "CLASS_PATH", "classes" );

define( "THEMEPATH", HOME ."/theme" );
define( "TEMPLATE_PATH", "theme" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "STYLE", HOME ."/theme/css/style.css" );
define( "PAGETITLE", "Karyabee" );
define( "NOPPAGE", 30 );

define( "FBAPPID", '173810782778906' );
define( "FBSID", '1ce2dffa259fb0bcf31c7ca581cd97b2' );
define( "FBPID", 'karyabeewebsite' );


$settings = array();
$settings['AUTU']  = true;                  // enable SMTP authentication
$settings['MAILSERVER']= "50.87.41.111"; // sets the SMTP server
$settings['MAILPORT'] = 25;                    // set the SMTP port for the GMAIL server
$settings['USERNAME'] = "auto@karyabee.com"; // SMTP account username
$settings['PASSWORD']= "naser433";        // SMTP account password
	


//NEW CONFIGS

define('TBLPFX','sob_');


///lang

define( "CRIDETMSG", '' );
define( "ADSTEXT", '' );
define( "ADD_EMAIL", 'info@karyabee.com' );


require( CLASS_PATH . "/class.phpmailer.php" );
//require( CLASS_PATH . "/class.pop3.php" );
require( CLASS_PATH . "/class.smtp.php" );

function sendmail($to, $subject, $temp, $vars, $AddAtt=NULL){
global $settings;
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch

$mail->IsSMTP(); // telling the class to use SMTP

try {


    if(isset($vars['<&-TNAME-&>']))
        $toName =$vars['<&-TNAME-&>'];
    else 
         $toName ='Employer';
    
    
    if(isset($vars['<&-FNAME-&>']))
        $frName =$vars['<&-FNAME-&>'];
    else 
         $frName ='Karyabee AutoMailer';
    
    
    if(isset($vars['<&-FEMAIL-&>'])){
        $freml =$vars['<&-FEMAIL-&>'];
        $mail->AddCC($freml); 
    }else 
         $freml ='info@karyabee.com';
    
    $filename = 'templates/email/'.$temp.'.htx';

        if (file_exists($filename)) {
            $body = file_get_contents('templates/email/'.$temp.'.htx');
        } else {
            $body = $temp;
        }


	
	$body = strtr($body, $vars); 
  $mail->Host       = $settings['MAILSERVER']; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = $settings['AUTU'];                  // enable SMTP authentication
 
  $mail->Port       = $settings['MAILPORT'];                    // set the SMTP port for the GMAIL server
  $mail->Username   = $settings['USERNAME']; // SMTP account username
  $mail->Password   = $settings['PASSWORD'];        // SMTP account password
  $mail->AddReplyTo($freml, $frName);
  $mail->AddAddress($to, $toName);
  $mail->SetFrom($freml, $frName);
  //$mail->AddReplyTo('name@yourdomain.com', 'First Last');
  $mail->Subject = $subject." | Karyabee.com";
  $mail->AltBody = 'Sobhansoft'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML($body);
  
  $mail->AddBCC('karyabee@outlook.com'); 
    if($AddAtt!=NULL){
        
  
       $ext = trim(pathinfo(basename($AddAtt), PATHINFO_EXTENSION)); //array_pop(explode(".", basename($AddAtt)));
        $mail->AddAttachment($AddAtt,$frName.'-file.'.$ext); 
  
  
    }
  //$mail->AddAttachment('images/phpmailer.gif');      // attachment
 // $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  $mail->Send();
  return "Message Sent OK";
} catch (phpmailerException $e) {
  return $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  return $e->getMessage(); //Boring error messages from anything else!
}



}

 

if(isset($_SESSION['C_RANK'])){
if(C_RANK==1){
require( CLASS_PATH . "/admin.php" );	
}
}







require( CLASS_PATH . "/ser.php" );
//require( CLASS_PATH . "/database.class.php" );



require( CLASS_PATH . "/frez.func.php" );

require( CLASS_PATH . "/function.php" );
require( CLASS_PATH . "/get.php" );

if(isset($_SESSION['C_ID']))
get_crdt(C_ID);

//$xxx = new user;




//$xxx->jappic();

//Send Email by SMTP
//echo sendmail('nasersobhan@outlook.com', 'My Subject', 'forgotpassword', array(''));
?>