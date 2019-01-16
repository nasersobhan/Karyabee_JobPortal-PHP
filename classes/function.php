<?php 
	include('classes/users.php');
function home(){
	include('theme/home.php');
}



function addminmsg(){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$company=$_POST['company'];
	$msg=$_POST['msg'];
	
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}



 $to = ADD_EMAIL;
 $subject = "Contact From Karyabee.com";
 $body = "New Contact From SIte \n";
 $body .= "Name :".$name." \n";
 $body .= "Email :".$email." \n";
 $body .= "Company :".$Company." \n";
 $body .= "Phone :".$phone." \n";
 $body .= "Massage body \n";
 $body .= "---------------- \n\n";
 $body .= $msg."\n\n\n New Contact From Site \n";
 $body .= "IP: ".$ip." \n";
 $body .= "------------------- \n";
  $body .= "sJob Portal : SobhanSoft \n";
   $body .= "SobhanSoft Support: +93797280900 - support@sobhansoft.com \n";
 
 if (mail($to, $subject, $body)) {
   echo("<p>Message successfully sent!</p>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }

}
function mycu($value){
	

			
					$value = str_replace('"',"&quot;",$value);
					$value = str_replace("'","&acute;",$value);
					
					$value = str_replace("script","scrip t",$value); //no easy javascript injection
					$value = str_replace("union","uni on",$value); //no easy common mysql temper
		
					$value = htmlentities($value, ENT_QUOTES); //encodes the string nicely
					$value = addslashes($value); //mysql_real_escape_string() //htmlentities
					$value = mysql_real_escape_string($value); //mysql_real_escape_string() //htmlentities
				 return $value;

}




function job(){

	$pid=mycu($_GET['jid']);
$qry2="UPDATE sob_jobs SET vist = vist + 1 where id='$pid'";
		mysql_query($qry2);
		
		
	$qry="SELECT * FROM sob_jobs where id='$pid'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
	  define( "ID", $row['id'] ); 
define( "JID", 'JOBID034'.$row['id'] );  
define( "JTITLE", $row['title'] );
	define( "CATEID", $row['cate'] ); 
define( "EDU", $row['education'] );
define( "ADATE", $row['adate'] );
define( "EDATE", $row['edate'] );
define( "LOCA", $row['location'] );
define( "CITY", $row['place'] );
define( "COUNTID", $row['count'] );
define( "HIT", $row['vist'] );
 define( "ORGID", $row['org']);
   define( "QUALI", $row['qualifications']);
  define( "EXPER", $row['exper']);
   define( "DURA", $row['dur']);
      define( "NATION", $row['nation']);
	        define( "JOBNO", $row['jobno']);
			define( "JOBTYPE", $row['jobtyp']);
			define( "SHIFT", $row['shift']);
			define( "STAT", $row['stat']);
			define( "SEX", $row['gender']);
			define( "SALARY", $row['slrang']);
			define( "PHONE", $row['phone']);
			define( "EMAIL", $row['email']);
			define( "ADD", $row['addt']);
			define( "GUID", $row['guid']);
			define( "DUTI", $row['repons']);
define( "SLUG", $row['slug']);

	



$org=ORGID;


	
$qry="SELECT * FROM  sob_logemp where id='$org'";
		$result2=mysql_query($qry);
while($row = mysql_fetch_array($result2))
  {
define( "ORG", trim($row['company']));  
  } 
  
}


$jcid=CATEID;
if(ctype_digit($jcid)){
$qry="SELECT * FROM sob_jcate where id='$jcid'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
define( "CATE", trim($row['catename']));  
  }


$countid=COUNTID;

$qry="SELECT * FROM sob_jobs_count where id='$countid'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
define( "COUNT", $row['name'] );  
  }  

  }  
$cate=CATE;
$cate = str_replace(" ", "-", $cate);
$cate = str_replace("/", "-", $cate);
$cate = str_replace("&", "-", $cate);
$cate=strtolower($cate);
define( "LTITLE", "<a title=' Link to ".JTITLE." position' href='". HOME ."/".$cate."/". ID.'/'.SLUG. "'>".JTITLE."</a>" );

	include('theme/job.php');
	
define('PTITLE','<title>'.JTITLE.' Position with '.ORG.' in '.CITY.' </title>');	
	
define( "KEYWORDS",JTITLE.',jobs in'.CITY.','.ORG.','.$cate );
define( "PAGEDISC",JTITLE.' Position in '.CITY.' city with '.ORG.' as '.$cate.' - narjobs' );
}

function hitrecord(){
$ip = getenv ("REMOTE_ADDR"); 
$requri = getenv ("REQUEST_URI"); 
$servname = getenv ("SERVER_NAME"); 
$combine =  $servname . $requri ; 
$httpref = getenv ("HTTP_REFERER"); 
$httpagent = getenv ("HTTP_USER_AGENT");
$qry2="INSERT INTO sob_stat (ip,refer,url,agent) VALUES ('{$ip}','{$httpref}','{$combine}','{$httpagent}')";
		mysql_query($qry2);


}

/////////////company s
function companyp(){

	$pid=mycu($_GET['cpid']);
	
		
		
		$qry2="UPDATE  sob_logemp SET hit = hit + 1 where id='$pid'";
		mysql_query($qry2);
		
		
		
		$qry="SELECT * FROM sob_logemp where id='$pid'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
	  define( "ID", $row['id'] )
	  ; 
define( "CID", 'COMID034'.$row['id'] );  
define( "CNAME", $row['company'] );
	define( "CWSITE", $row['website'] ); 
define( "CPEMAIL", $row['pemail'] );
define( "CABOUT", $row['about'] );
define( "CCATEID", $row['cate'] );
define( "CADD", $row['address'] );
define( "CCITY", $row['city'] );
define( "CCOUNTID", $row['con'] );
define( "CLOGO", $row['logo'] );
 define( "CSTAT", $row['active']);
 
 define( "CPHONE", $row['phone']);

define( "CTWT", $row['twt'] );
define( "CFB", $row['fb'] );
define( "CGP", $row['gp'] );
define( "CLI", $row['li'] );
 define( "CYM", $row['ym']);


$jcid=CCATEID;

$qry="SELECT * FROM sob_jcate where id='$jcid'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
define( "CCATE", $row['catename'] );  
  }  

$countid=CCOUNTID;

$qry="SELECT * FROM sob_jobs_count where id='$countid'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
define( "CCOUNT", $row['name'] );  
  }  
  
}
include('theme/company.php');
}


////////////company end



function ads(){
echo '';	
}



function showsidebar(){
	include('theme/sidebar1.php');		
}
function headers(){
	include('theme/header.php');		
}
function footer(){
	include('theme/footer.php');		
}


function foot(){
	include('theme/foot.php');		
}







	
function showpage(){

	
	if($_GET['page']=='brochures'){
	include('theme/bro.php');
	}else if($_GET['page']=='aboutus'){
	include('theme/about.php');	
	
	}else if($_GET['page']=='advertisements'){
	include('theme/ads.php');	
	}else if($_GET['page']=='downloads'){
	include('theme/download.php');
	}else if($_GET['page']=='contact'){
	include('theme/contact.php');
	}else if($_GET['page']=='policy'){
	include('theme/policy.php');
	}else if($_GET['page']=='terms'){
	include('theme/terms.php');
        }else if($_GET['page']=='resetpass'){
            include('theme/resetpass.php');
	}else if($_GET['page']=='unknown'){
            include('theme/404.php');
        }else {
		home();
		
		
		
		}
	
	
}


class emp{
	
	function jobaded(){
		alogi();
		include('theme/emp_list.php');
		
	}
	function addcity(){
		
	emp::alogi();
		include('theme/add_city.php');
		
	}
	function addcity_done(){
		emp::alogi();
		$name=$_POST['city'];
		$con=$_POST['count'];
		
		$q= "insert ignore into sob_jobs_city (name, cid)
Values
('$name', '$con')";

$result = mysql_query($q);
if (!$result)
   echo mysql_error();
   else
   echo 'added successfuly';
		
	}
	
	
	
	
	
	
	///////////////// add category 
	
	function addcate(){
		emp::alogi();
		include('theme/add_cate.php');
		
	}
	function addcate_done(){
		emp::alogi();
		$name=$_POST['cate'];
		
		
		$q= "insert into sob_jcate (catename)
Values
('$name')";

$result = mysql_query($q);
if (!$result)
   echo mysql_error();
   else
   echo 'added successfuly';
		
	}
	
	///////////////add category done
	
	
	///////////////// add company
	///////////////load com page
	function addcom(){
		
		include('theme/add_com.php');
		}
		
		
		///////////////////add com page
		///////////get emp job list page
		function jlist(){
			emp::logi();
				include('theme/emp_list.php');
		}
		
		///////////////////get emp job list end
	function addcom_done(){
		
		if( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] )){
		
		
		
		
		
		
		$user=$_POST['user'];
$result = mysql_query("SELECT * FROM sob_logemp WHERE email='$user'");
$num_rows = mysql_num_rows($result);

if ($num_rows > 0) {
   ?>
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/com/email">
<?php
  
exit();
}
		
		
		
		$name=$_POST['name'];
		
		$pass=md5($_POST['passc']);
		$count=$_POST['count'];
		$city=$_POST['city'];
		$cate=$_POST['cate'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$add=$_POST['add'];
		$site=$_POST['site'];
		$about=$_POST['about'];
		$logo=$_POST['logo'];
	
		$q= "insert into sob_logemp (logo,phone,con,city,address,cate,about,pemail,website,company,password,email)
Values
('$logo','$phone','$count','$city','$add','$cate','$about','$email','$site','$name','$pass','$user')";

$result = mysql_query($q);
if (!$result)
   echo mysql_error();
   else{
    $to = $user;
 $subject = "Signup | Karyabee";
 $body = "You Registerd in ".date('Y-m-d')." \n";
 $body .= "Your Account Information in Karyabee.com\n";
 $body .= "Login Email : ".$user." \n";
 $body .= "Password : ".$_POST['passc']." \n";
 $body .= "Company Name: ".$name." \n";
 $body .= "You Have 50 Free Credits .\n";
 $body .= "----------------------------------------------\n\n";
 $body .= "This is an auto-generated e-mail, please do not reply\n";
 $body .= "From karyabee.com \n info@karyabee.com \n";
 $body .= "------------------- ";
 
 
mail($to, $subject, $body, "From: auto@narjob.com");
 
mail($to, $subject, $body, "From: auto@narjob.com");
?>
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/login/done">
<?php
   }
   
   }else{
   
   ?>
   <meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/com/errorcap">
   
   <?php
   
   exit();
   
   }
	}
	
	///////////////add company done
	
	
	
	function addjob(){
emp::logi();


		
		
$title=$_POST['title'];
$title= trim($title);
$title= preg_replace('/\s\s+/', ' ', $title);

$slug=$title;
$slug = trim($slug);

$slug = str_replace("/", " ", $slug);
$slug = str_replace("&", " ", $slug);
$slug = preg_replace('/\s\s+/', ' ', $slug);
$slug = str_replace(" ", "-", $slug);

$slug=strtolower($slug);



$place=$_POST['place'];



$cate=$_POST['cate'];
$location=$_POST['location'];
$education=$_POST['education'];
$org=$_SESSION['C_ID'];
if(C_RANK=='1'){
$org=$_POST['org'];
}

if(C_RANK=='0' || C_RANK=='1' ){
$pend=0;
}else {
$pend=1;
}


$count=$_POST['count'];
$dur=$_POST['dur'];
$gender=$_POST['gender'];
$slrang=$_POST['slrang'];
$adate=$_POST['adate'];
$edate=$_POST['edate'];
$nation=$_POST['nation'];
$jobno=$_POST['jobno'];
$jobtyp=$_POST['jobtyp'];
$shift=$_POST['shift'];
$stat=$_POST['stat'];
$repons=nl2br($_POST['repons']);
$qualifications=$_POST["qualifications"];
$guid=nl2br($_POST['guid']);
$phone=$_POST['phone'];
$email=$_POST['email'];
$add=$_POST['addt'];
$exper=$_POST['exper'];

$jobid="";
/*$q= "insert into sob_jobs (title, cate, location, education, org,
place, count, dur, gender, slrang, adate, edate, nation, jobno,
jobtyp, shift, stat, repons, qualifications, guid, phone, email, addt,exper,jobid,slug,pend)
Values
('$title', '$cate','$location', '$education', '$org',  '$place',
'$count','$dur',    '$gender', '$slrang', '$adate', '$edate','$nation',
 '$jobno','$jobtyp', '$shift','$stat','$repons','$qualifications','$guid',
  '$phone',  '$email', '$add','$exper','$jobid','$slug',$pend)";
*/
$_POST['place']=implode(')|(',$_POST['place']);
$_POST['slug']=$slug;
$_POST['pend']=$pend;
$_POST['title'] = $title;
if(C_CRD<COST){
	?>
    
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/list">
<script type="text/javascript">

  alert("<?php echo CRIDETMSG ?>");

</script>
<?php
exit();}
else{
//$result = mysql_query($q);
global $dbase;
$result = $dbase->RowInsert('sob_jobs',($_POST));


$qry="SELECT * FROM  sob_logemp where id='$org'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
$org=$row['company'];  
  } 


	$msg= $title.' jobs with '.$org;
 $pageId = FBPID;
 $title = $title.' Position with '.$org;
 $uri = 'http://www.karyabee.com/index.php?jid='.mysql_insert_id();
 $desc = $title.' jobs with '.$org. 'in '.$place. ' city and will expire in '.$edate;

 //doWallPost($title,$msg,$uri,$title,$desc);


if (!$result)
   echo mysql_error();
   else{
   echo 'added successfuly';
	$spend=COST;
$q= "update sob_logemp set crdt=crdt-$spend where id ='{$org}'";
$result = mysql_query($q);
?>
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/list">
<?php
   }
	
	}
	
	
	}
	
	
	

	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
function emppag(){
emp::logi();
$pname=mycu($_GET['emp']);

if ($pname=='addjob')
include('theme/empaddj.php');
	
}
function crd(){
emp::logi();
include('theme/crd.php');
}




function del (){
	emp::logi();	
	$id=mycu($_GET['did']);
$org = $_SESSION['C_ID'];

if(C_RANK=='1')
	$q= "DELETE FROM sob_jobs WHERE id='$id'";
	else
	$q= "DELETE FROM sob_jobs WHERE id='$id' and org='$org'";

$result = mysql_query($q);
if ($result){?>
	<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/list">
<?php }
  
}


function act (){
	emp::logi();	
	$id=mycu($_GET['aid']);
	
	
	$q= "update sob_jobs set pend = '0' where id='$id'";

$result = mysql_query($q);
if ($result){
  ?>
	<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/list">
<?php
}}





function login(){
if(!isset($_SESSION['C_EMAIL']) || (trim($_SESSION['C_EMAIL']) == '') ) {
			include('theme/emp_login.php');
			}else{
			include('theme/empaddj.php');
			
			}
}

function logina(){?>
	<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/loginac.php">
	<?php //	header("location: loginac.php");
	//include('loginac.php');
}
function logout(){?>
	<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/logout.php">
	<?php
		//include('logout.php');
		//header("location: logout.php");
}
public static function info(){
	include('theme/emp_info.php');
}

function info_Chp(){
	emp::logi();
$oldpass=md5($_POST['oldp']);
$newpass=md5($_POST['cpass']);
$cid=C_ID;

$qry="SELECT * FROM sob_logemp where id='$cid' ";
	$result=mysql_query($qry);
		while($row = mysql_fetch_array($result))
  		{
			$noldpass = $row['password'];
		}
		

	
if($oldpass==$noldpass){	
$q= "update sob_logemp set password='$newpass' where id='$cid'";
$result = mysql_query($q);
echo 'Password changed';
}else 
echo 'Current password is wrong';


}
	
function info_Che(){
	emp::logi();
		
$user=$_POST['cpass'];
$result = mysql_query("SELECT * FROM sob_logemp WHERE email='$user'");
$num_rows = mysql_num_rows($result);

if ($num_rows > 0) {
echo 'Email Already registerd';  
echo '';
exit();
}
	
	
$oldpass=md5($_POST['oldp']);
$newpass=$_POST['cpass'];
$cid=C_ID;

$qry="SELECT * FROM sob_logemp where id='$cid' ";
	$result=mysql_query($qry);
		while($row = mysql_fetch_array($result))
  		{
			$noldpass = $row['password'];
		}
		

	
if($oldpass==$noldpass){	
$q= "update sob_logemp set email='$newpass' where id='$cid'";
$result = mysql_query($q);
echo 'Email Changed';
}else 
echo 'Password is wrong';


}

function appli(){
include('theme/emp_appli.php');
}

function rejecta(){
emp::logi();

$id=mycu($_GET['id']);
	$qry="update apply set stat=0 where id='$id'";
		$result2=mysql_query($qry);
		if (!$result2)
   echo mysql_error();
   else
   echo 'Declined';
	
}




function forgot(){
	include('theme/emp_forgo.php');
}

function forgota(){
$email=mycu($_GET['email']);
$type=mycu($_GET['type']);
if($type='e'){
	
	
	
}else {
	
	
	
	
}

}

public static function logi(){
if(!isset($_SESSION['C_EMAIL']) || (trim($_SESSION['C_EMAIL']) == '') ) {
		?>
               	<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/login">
        <?php
	
			exit();
}
	
	
}


function alogi(){
	emp::logi();
	
if(!C_RANK==1) {
	echo 'You can not access to this page';
	exit();
}
	
	
}


public static function getCOMinfo($cid){
	emp::logi();
	
	
		
		
	$qry="SELECT * FROM sob_logemp where id='$cid'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
	  define( "ID", $row['id'] )
	  ; 
define( "CID", 'JOBID034'.$row['id'] );  
define( "CNAME", $row['company'] );
	define( "CWSITE", $row['website'] ); 
define( "CPEMAIL", $row['pemail'] );
define( "CABOUT", $row['about'] );
define( "CCATEID", $row['cate'] );
define( "CADD", $row['address'] );
define( "CCITY", $row['city'] );
define( "CCOUNTID", $row['con'] );
define( "CLOGO", $row['logo'] );
 define( "CSTAT", $row['active']);
 
 define( "CPHONE", $row['phone']);

define( "CTWT", $row['twt'] );
define( "CFB", $row['fb'] );
define( "CGP", $row['gp'] );
define( "CLI", $row['li'] );
 define( "CYM", $row['ym']);


$jcid=CCATEID;

$qry="SELECT * FROM sob_jcate where id='$jcid'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
define( "CCATE", $row['catename'] );  
  }  

$countid=CCOUNTID;

$qry="SELECT * FROM sob_jobs_count where id='$countid'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
define( "CCOUNT", $row['name'] );  
  }  

  }  


	
	
}

public static function info_update(){
	emp::logi();
	
		mysql_cleanup($_POST);
                $name=$_POST['name'];
		$count=$_POST['count'];
		$city=$_POST['place'][0];
		$cate=$_POST['cate'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$add=$_POST['add'];
		$site=$_POST['site'];
		$about=my_cleaner($_POST['about']);
		$logo=$_POST['logo'];
		
		
		$twt=$_POST['twt'];
		$fb=$_POST['fb'];
		$gp=$_POST['gp'];
		$li=$_POST['li'];
		$ym=$_POST['ym'];
		$cid=C_ID;
		
$q= "update sob_logemp set logo='$logo',phone='$phone',con='$count',city='$city',address='$add',cate='$cate',about='$about',pemail='$email',website='$site',company='$name',twt='$twt',fb='$fb', gp='$gp', li='$li', ym='$ym' where id='$cid'";

$result = mysql_query($q);
if (!$result)
   echo mysql_error();
else 
?>
               <meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/myinfo">
      
        <?php



}








//////credit 
function Get_crd(){
	emp::logi();
	

		
		$crdno=$_POST['crdnum'];
		$mont=$_POST['munt'];
		$cid=C_ID;
if(mysql_num_rows(mysql_query("SELECT * FROM sob_crd where crdnum='$crdno' AND munt='$mont' and stat='1'"))){
	
$q= "update sob_crd set stat='0',user='$cid' where crdnum='$crdno' AND munt='$mont' and stat='1'";
$result = mysql_query($q);
	
$q= "update sob_logemp set crdt=crdt+'$mont' where id='$cid'";

$result = mysql_query($q);
if (!$result)
   echo mysql_error();


echo 'Congratulation !!! You Just Received '.$mont.' Credits';
}else 
echo 'You Credit number or Amount is wrong';
}

function add_crdp(){
	include('theme/addcrd.php');
}

function add_crd(){
	emp::alogi();
	

		
		$crdno=$_POST['crdnum'];
		$mont=$_POST['munt'];
	

	
$q= "insert into sob_crd (crdnum,munt) value ('$crdno','$mont')";
$result = mysql_query($q);
	
if (!$result)
   echo mysql_error();
else
echo 'Congratulation !!! Added '.$mont.' Credits to DB';

}






}





function Agotime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
 
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
 
    $now             = time();
    $unix_date         = strtotime($date);
 
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }
 
    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
 
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
 
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
 
    $difference = round($difference);
 
    if($difference != 1) {
        $periods[$j].= "s";
    }
 
    return "$difference $periods[$j] {$tense}";
}

function is_login(){
if(isset($_SESSION['LOGIN']))
return true;
else
return false;	
}

function headertag(){?>
<?php	/////////////////////////seo
 if(isset($_GET['jid'])){ ?>
<title><?php get_posttitle($_GET['jid']) ?></title>
<meta name="keywords"  content="<?php get_keyword($_GET['jid']); ?>,jobs in afghanistan, jobs, careers in afghanistan" />
<meta name="description"  content="<?php echo get_pagedisc($_GET['jid']); ?>">
<meta property="og:description" content="<?php echo get_pagedisc($_GET['jid']); ?>"/>
<meta property="og:title" content="<?php get_posttitle($_GET['jid']) ?>"/>

<meta name="expires" content="<?php echo date("jS M Y ", strtotime(get_pagedate($_GET['jid']))) ?>" />
<?php }else if(isset($_GET['cpid'])){ ?>
<meta name="keywords"  content="jobs in afghanistan, jobs, careers in afghanistan,free jobs, free business directory, afghan directory" />
<meta name="Description" content="Find your ideal job from <?php echo PAGETITLE ?>, <?php echo PAGETITLE ?> best career portal in afghanistan" />
<meta name="robots" content="noindex,nofollow"/>


<?php } elseif(isset($_GET['city'])) { ?>
<title>All Jobs in <?php echo $_GET['city']  ?> | <?php echo PAGETITLE;?></title>
<meta name="description"  content="Find your ideal job from <?php echo PAGETITLE ?>, <?php echo PAGETITLE ?> best career portal iafghanistan"  />
<meta name="keywords"  content="<?php echo $_GET['city']  ?>,jobs in afghanistan, jobs, careers in afghanistan,, Karyabee,free jobs, free business directory, afghan directory" />
<meta property="og:description" content="Find your ideal job from <?php echo PAGETITLE ?>, <?php echo PAGETITLE ?> best career portal in afghanistan"/>
<meta property="og:title" content="All Jobs in <?php echo $_GET['city']  ?> "/>



<?php } elseif(isset($_GET['caten'])) { ?>
<title>All Jobs in <?php echo $_GET['caten']  ?> | <?php echo PAGETITLE;?></title>
<meta name="description"  content="Find your ideal job from <?php echo PAGETITLE ?>, <?php echo PAGETITLE ?> best career portal iafghanistan"  />
<meta name="keywords"  content="<?php echo $_GET['caten']  ?>,jobs in afghanistan, jobs, careers in afghanistan,, Karyabee,free jobs, free business directory, afghan directory" />
<meta property="og:description" content="Find your ideal job from <?php echo PAGETITLE ?>, <?php echo PAGETITLE ?> best career portal in afghanistan"/>
<meta property="og:title" content="All Jobs in <?php echo $_GET['caten']  ?> "/>




<?php } else { ?>

<title>All Jobs in Afghanistan | <?php echo PAGETITLE;?></title>
<meta name="description"  content="Find your ideal job from <?php echo PAGETITLE ?>, <?php echo PAGETITLE ?> best career portal in afghanistan" />
<meta name="keywords"  content="jobs in afghanistan, jobs, careers in afghanistan,, Karyabee,free jobs, free business directory, afghan directory" />
<meta property="og:description" content="Find your ideal job from <?php echo PAGETITLE ?>, <?php echo PAGETITLE ?> best career portal in afghanistan"/>
<meta property="og:title" content="All Jobs in Afghanistan | <?php echo PAGETITLE;?>"/>

<?php
}?>
<meta property="og:type" content="website"/>
<meta property="og:image" content="http://karyabee.com/hot-jobs.jpg"/>
<meta name="googlebot" content="index,noarchive,follow,noodp" />
<meta name="robots" content="all,index,follow" />
<meta name="generator" content="sJOB PORTAL SYSTEM" />
<link rel="author" type="text/plain" href="<?php echo HOME ?>/humans.txt" />
<link href="https://plus.google.com/111572437151008300957" rel="author" />	
<link rel="alternate" href="<?php echo HOME ?>/feed.rss" title="My RSS feed" type="application/rss+xml" />
<?php
	
}









////new ones


function removeLink($str){
$regex = '/<a (.*)<\/a>/isU';
preg_match_all($regex,$str,$result);
foreach($result[0] as $rs)
{
    $regex = '/<a (.*)>(.*)<\/a>/isU';
    $text = preg_replace($regex,'$2',$rs);
    $str = str_replace($rs,$text,$str);
}
return $str;}

function mk_func($post){
	
	$postx = $post;
    
        
        foreach ($postx as $key => $value){
		
			eval( 'function pri_' .$key . '() { 
					global $post;
					 echo  $post[\''.$key.'\'];
					}');  
		
	}
	foreach ($postx as $key => $value){
		
			eval( 'function get_' . $key . '() { 
					 global $post;
					 return  $post[\''.$key.'\'];
					}');  
		
	}
        
    }

function extract_emails_from($string){
  preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $string, $matches);
    return array_unique($matches[0]);
}



function my_cleaner($value){
    $value = str_replace('"',"&quot;",$value);
					$value = str_replace("'","&acute;",$value);
                                        $value = str_replace("'","&acute;",$value);
                                        $value = str_replace(",","&#44;",$value);
					$value = str_replace("script","scrip t",$value); //no easy javascript injection
					$value = str_replace("union","uni on",$value); //no easy common mysql temper
		
					//$value = htmlentities($value, ENT_QUOTES); //encodes the string nicely
					//$value = addslashes($value); //mysql_real_escape_string() //htmlentities
		
					
						//$value = substr($value,0,100);
						$value = trim(filter_var($value, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW)); 
					
					
				return $value;
}


function mysqli_result($res, $row=0, $field=0) { 
   // $row =0;
    $res->data_seek($row); 
    $datarow = $res->fetch_array(); 
    return $datarow[$field]; 
} 

class emp_ctrl{
    var $usrID;
    function emp_ctrl($id){
        $this->usrID = $id;
    }
    
      function delAjob($id){
         global $dbase;
         $prfx = TBLPFX;
         
         if(!C_RANK==1){
            $orgw = " AND org='".$usr."'";
            }else{
             $orgw ="";
            }
        
         $dbase->RowDelete($prfx."jobs","id=".$id.$orgw);
         return 'Delete';
    }
    
    
    
    
    function susAjob($id){
         global $dbase;
         $prfx = TBLPFX;
         
         if(!C_RANK==1){
            $orgw = " AND org='".$usr."'";
            }else{
             $orgw ="";
            }
         
       
        $data = array('pend' => 1);
         $dbase->RowUpdate($prfx."jobs",$data,"id=".$id.$orgw);
         return 'suspended';
    }
       function pubAjob($id){
         global $dbase;
         $prfx = TBLPFX;
         
         if(!C_RANK==1){
            $orgw = " AND org='".$usr."'";
            }else{
             $orgw ="";
            }
         
       
        $data = array('pend' => 0);
         $dbase->RowUpdate($prfx."jobs",$data,"id=".$id.$orgw);
         return 'suspended';
    }
    
    
    function updateAjob($id,$data){
        global $dbase;
         $usr = $this->usrID;
          if(!C_RANK==1){
            $orgw = " AND org='".$usr."'";
            }else{
             $orgw ="";
            }
         
         
         $prfx = TBLPFX;
         $dbase->RowUpdate($prfx."jobs",$data,"id=".$id.$orgw);
    }
    
    
    function getAjob($id){
        global $dbase;
        $usr = $this->usrID;
        $prfx = TBLPFX;
        
       // echo "select * from ".$prfx."jobs where id=".$id." AND org='".$usr."'";
        if(!C_RANK==1){
            $orgw = " AND org='".$usr."'";
        }else{
             $orgw ="";
        }
       $postx = $dbase->fetch_assoc("select * from ".$prfx."jobs where id=".$id.$orgw."  limit 1");
       //$xxx = mysqli_fetch_array($post);
       mk_func($postx);
        return $postx;
    }
    
    
}




class user_ctrl{
    function get_userID(){
        global $_SESSION;
        return $_SESSION['C_ID'];
    }
}




function is_get($get){
    if(isset($_GET[$get]) && !empty($_GET[$get]) && $_GET[$get]!=NULL && $_GET[$get]!='')
        return $_GET[$get];
    else
        return false;
}
function is_post($post){
    if(isset($_POST[$post]) && !empty($_POST[$post]) && $_POST[$post]!=NULL && $_POST[$post]!='')
        return $_POST[$post];
    else
        return false;
}
function get_current_url(){
    $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    return $actual_link;
}
function redirect_to($location = NULL, $r=false){
	if($location != NULL){
		if($r)
			return '<meta http-equiv="REFRESH" content="0;url='.$location.'">';
		else
			echo '<meta http-equiv="REFRESH" content="0;url='.$location.'">';
	//header("location: {$location}");
	exit;	
	}
}


function is_selected($xc,$xy){
   
    echo  ($xc == $xy ? 'selected' : '');
}
?>