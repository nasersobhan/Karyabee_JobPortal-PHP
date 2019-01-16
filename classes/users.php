<?Php 
class user{
	
function jappic(){
    
    global $dbase;
   $this->logix();
$rid=J_ID;

$cid=$_POST['cid'];
$jid=$_POST['jid'];
$edate=$_POST['edate'];
$title=$_POST['title'];


$uta =  $this->getUinfo($rid);



	
 $error = '';
if(empty($uta['sex']) || empty($uta['totlex']) || empty($uta['hstedu']) || empty($uta['feild']))
    $error .= '<br/>you need to update your Online Resume First  - <a class="btn btn-link" href="'.HOME.'/user/resume"> here </a>';

if(empty($uta['pem']))
    $error .= '<br/>you need to add your public email in contact information if you want to apply Online  - <a class="btn-link" href="'.HOME.'/user/resume"> here </a>';

if(empty($uta['cvs']))
    $error .= '<br/>you need to upload your Online Resume First - <a class="btn-link" href="'.HOME.'/user/cv"> here </a>';


if(empty($error)){

$q= "insert into apply (jid,title , rid, cid, edate)Values('$jid','$title','$rid','$cid','$edate')";

$result = $dbase->query($q);	
    if (!$result)
        echo 'please try again';
    else{
        echo 'Thank you, Your Application has been sent to the Employer';
        //Send Email  
        
        if(!empty($uta['cover']))
            $uta['cover'] = '<br/ >'.nl2br ($uta['cover']);
        
       $temp = 'application'; 
       
       $relink = HOME.'/cv/'.$uta['id'].'-'.file_cleanup($uta['fullname']);
       
       
       
       
       $submiter = get_jobinfo_single($jid, 'guid');
       $emails = extract_emails_from($submiter);
      
        foreach($emails as $email)
              sendmail($email, $title.' Application', $temp , array('<&-RLINK-&>'=>$relink,'<&-COVER-&>'=>$uta['cover'],'<&-PHONE-&>'=>$uta['mobi'],'<&-JTITLE-&>'=>$title, '<&-ADDRESS-&>'=>$uta['address'], '<&-EMAIL-&>'=>$uta['pem'],'<&-FEMAIL-&>'=>$uta['pem'],'<&-FNAME-&>'=>$uta['fullname'], '<&-NAME-&>'=>$uta['fullname'], '<&-APPLINK-&>'=>HOME.'/emp/app'),ABSPATH.$uta['cvs'] );
    }
}else{
    echo '<p class="bg-danger">'.$error.'</p>';
}

}








function cvup(){
$this->logix();

$wgFileExtensions = array('doc','pdf','docx', 'txt');


$ext = explode(".", $_FILES["file"]["name"]);
//echo '<br/> EXT: '.$ext;
$extension = trim(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));//(array_pop($ext));
//echo '<br/> '.$extension.'<br/>';
//if(in_array($extension, $wgFileExtensions))
//        echo 'YES <BR/>';



if (($_FILES["file"]["size"] < 2000000) && in_array($extension, $wgFileExtensions)){
	$uploaddir = ABSPATH.'/upload/user/'; 
	
if (!file_exists($uploaddir.$_SESSION['J_ID'])) {
    mkdir($uploaddir.$_SESSION['J_ID'], 0777, true);
}
$uploaddir = $uploaddir.$_SESSION['J_ID'].'/'; 
$file = file_cleanup(date('y-m-d-').rand(0,999).'-'.$_FILES['file']['name']).'.'.$extension;
$filepath = $uploaddir . $file; 
 //$file=rand(0000,9999).$_FILES['file']['name'];
 //$fname = $fname;
move_uploaded_file($_FILES['file']['tmp_name'], $filepath); 

$rid=$_SESSION['J_ID'];
$filepath = str_replace(ABSPATH, '',$filepath );
$q= "update sob_resume set cvs='$filepath' where id='$rid'";
$result = mysql_query($q);	
?>
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/user/cv">
<?php	


	}else{
	echo 'You Can Only Upload DOC,DOCX and PDF files';
	exit();
	
	}

}
function cv(){
include('theme/user_cv.php'); 	
}
	
	

	
	
	////////////logout
function logix(){
	if(!isset($_SESSION['J_ID']) || (trim($_SESSION['J_ID']) == '') ) {
		?>	<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/user/login">
        <?php
					exit();
	}
}
//////////////////////get user info 
function getUinfo($cid){
	global $dbase;
    user::logix();

	$qry="SELECT * FROM  sob_resume where id='$cid'";
		$result2= $dbase->query($qry);
		
	$user_data = array();
$row = $dbase->fetch_assoc($qry);

    define( "ID", $row['id'] ); 

define( "JNAME", $row['fullname'] );
	define( "JSEX", $row['sex'] ); 
define( "CPEMAIL", $row['pemail'] );
define( "EMAIL", $row['pem'] );
define( "NATION", $row['citzns'] );
define( "DOB", $row['dborn'] );
define( "POB", $row['poburn'] );
define( "JCOUNTID", $row['count'] );
define( "JCITY", $row['city'] );
define( "CATEID", $row['cate'] );
define( "DEG", $row['hstedu']);
define( "MAJ", $row['feild']);
define( "EXP", $row['totlex']);
define( "KEY", $row['keyf']);  
 define( "COVER", nl2br($row['cover']));   
 define( "PHONE", $row['tel']);

define( "MOBI", $row['mobi'] );
define( "ADD", $row['address'] );
$xx = $row;



 return ($row);

//}  
//$rowxx = mysqli_fetch_row($result2);
//$user_data = array();
//foreach($row as $key => $value)
//$user_data[$key] = $value;

//return $mydaa;

	
}

///////////register page	
function addn(){
include('theme/add_user.php');	
}
/////applyes
function applyd(){
		user::logix();
	include('theme/user_app.php');	
}
/////////login page
function login(){
include('theme/user_login.php');	
}
function resume(){
		user::logix();
include('theme/user_info.php');		
}
/////////load due


function loadedu(){

user::logix();
$cid=J_ID;
	$qry="SELECT * FROM  sob_res_edu where rid='$cid'";
		$result2=mysql_query($qry);


while($row = mysql_fetch_array($result2))
  {?>
	 <tr id="<?php echo $row['id']; ?>">
            <td height="20"><?php echo $row['title']; ?> </td>
             <td height="20"><?php echo $row['org']; ?> </td>
              <td height="20"><?php echo $row['sdate']; ?></td>
               <td height="20"><?php echo $row['edate']; ?> </td>
                 <td height="20"><?php echo $row['type']; ?> </td>
                 <td height="20">
                 
                
                 <input type="button" id="submit" style="width:20px; height:20px; background-image: url(<?PHP echo HOME ?>/theme/date/b_drop.png)" onclick="javascript: formget(this.form, '<?php echo HOME ?>/?user=edudl&id=<?php echo $row['id']; ?>'); delet('<?php echo $row['id']; ?>');"  name="Send" value="" >
                 
                 
                 </td>
          </tr>
<?php }  
	
}
/////////////////delet edu
function edudl(){

user::logix();
$cid=J_ID;
$id=$_GET['id'];
	$qry="delete FROM sob_res_edu where id='$id'";
		$result2=mysql_query($qry);
		if (!$result2)
   echo mysql_error();
   else
   echo 'Deleted Successfully';
}

//////////////add edu
function addedu(){
		user::logix();
$cid=J_ID;
$title=$_POST['titleed'];
$org=$_POST['orged'];
$sdate=$_POST['sdateed'];
$edate=$_POST['edateed'];
$type=$_POST['type'];
	$city=$_POST['city'];
$count=$_POST['count'];	
	
$q= "insert into sob_res_edu (rid,title , org, sdate, edate,type,count,city)
Values
('$cid','$title','$org','$sdate','$edate','$type','$count','$city')";

$result = mysql_query($q);	
	if (!$result)
   echo mysql_error();
   else
   echo 'Added Successfully';
}


/////////load lang


function loadlang(){

user::logix();
$cid=J_ID;
	$qry="SELECT * FROM  sob_res_lang where rid='$cid'";
		$result2=mysql_query($qry);


while($row = mysql_fetch_array($result2))
  {?>
	 <tr id="<?php echo $row['id']; ?>">
            <td height="20"><?php echo $row['lang']; ?> </td>
             <td height="20"><?php echo $row['much']; ?> </td>
             
                 <td height="20">
                 
                
                 <input type="button" id="submit" style="width:20px; height:20px; background-image: url(<?PHP echo HOME ?>/theme/date/b_drop.png)" onclick="javascript: formget(this.form, '<?php echo HOME ?>/?user=langdl&id=<?php echo $row['id']; ?>'); delet('<?php echo $row['id']; ?>');"  name="Send" value="" >
                 
                 
                 </td>
          </tr>
<?php }  
	
}
/////////////////delet lang
function langdl(){

user::logix();
$cid=J_ID;
$id=$_GET['id'];
	$qry="delete FROM sob_res_lang where id='$id'";
		$result2=mysql_query($qry);
		if (!$result2)
   echo mysql_error();
   else
   echo 'Language Deleted';
}

//////////////add lang
function addlang(){
		user::logix();
$cid=J_ID;
$title=$_POST['lang'];
$org=$_POST['level'];

		
	
$q= "insert into sob_res_lang (rid,lang , much)
Values
('$cid','$title','$org')";

$result = mysql_query($q);	
	if (!$result)
   echo mysql_error();
   else
   echo 'Language Added';
}



/////////load lang


function loadit(){

user::logix();
$cid=J_ID;
	$qry="SELECT * FROM  sob_res_it where rid='$cid'";
		$result2=mysql_query($qry);


while($row = mysql_fetch_array($result2))
  {?>
	 <tr id="<?php echo $row['id']; ?>">
            <td height="20"><?php echo $row['name']; ?> </td>
             <td height="20"><?php echo $row['level']; ?> </td>
             <td height="20"><?php echo $row['type']; ?> </td>
                 <td height="20">
                 
                
                 <input type="button" id="submit" style="width:20px; height:20px; background-image: url(<?PHP echo HOME ?>/theme/date/b_drop.png)" onclick="javascript: formget(this.form, '<?php echo HOME ?>/?user=itdl&id=<?php echo $row['id']; ?>'); delet('<?php echo $row['id']; ?>');"  name="Send" value="" >
                 
                 
                 </td>
          </tr>
<?php }  
	
}
/////////////////delet lang
function itdl(){

user::logix();
$cid=J_ID;
$id=$_GET['id'];
	$qry="delete FROM sob_res_it where id='$id'";
		$result2=mysql_query($qry);
		if (!$result2)
   echo mysql_error();
   else
   echo 'Computer Skill Deleted';
}

//////////////add IT
function addit(){
$cid=J_ID;
$name=$_POST['pname'];
$levl=$_POST['plevel'];
$type=$_POST['ptype'];
		
	
$q= "insert into sob_res_it (rid,name , level, type)
Values
('$cid','$name','$levl','$type')";

$result = mysql_query($q);	
	if (!$result)
   echo mysql_error();
   else
   echo 'Computer Skill Added';
}


/////////////////load exp




function loadexp(){

user::logix();
$cid=J_ID;
	$qry="SELECT * FROM  sob_res_exp where rid='$cid'";
		$result2=mysql_query($qry);


while($row = mysql_fetch_array($result2))
  {?>
	 <tr id="<?php echo $row['id']; ?>">
            <td height="20"><?php echo $row['title']; ?> </td>
             <td height="20"><?php echo $row['org']; ?> </td>
              <td height="20"><?php echo $row['sdate']; ?></td>
               <td height="20"><?php echo $row['edate']; ?> </td>
                 <td height="20">
                 
                
                 <input type="button" id="submit" style="width:20px; height:20px; background-image: url(<?PHP echo HOME ?>/theme/date/b_drop.png)" onclick="javascript: formget(this.form, '<?php echo HOME ?>/?user=expdl&id=<?php echo $row['id']; ?>'); delet('<?php echo $row['id']; ?>');"  name="Send" value="" >
                 
                 
                 </td>
          </tr>
<?php }  
	
}


/////////////////delet exp
function expdl(){

user::logix();
$cid=J_ID;
$id=$_GET['id'];
	$qry="delete FROM sob_res_exp where id='$id'";
		$result2=mysql_query($qry);
		if (!$result2)
   echo mysql_error();
   else
   echo 'Experience Deleted';
}

//////////////add exp
function addexp(){
		user::logix();
$cid=J_ID;
$title=$_POST['title'];
$org=$_POST['org'];
$sdate=$_POST['sdate'];
$edate=$_POST['edate'];
$city=$_POST['city'];
$count=$_POST['count'];
		
	
$q= "insert into sob_res_exp (rid,title , org, sdate, edate, count, city)
Values
('$cid','$title','$org','$sdate','$edate', '$count', '$city')";

$result = mysql_query($q);	
	if (!$result)
   echo mysql_error();
   else
   echo 'Experience Added';
}



////////// register function
function addnew(){
global $dbase;
$_POST=mysql_cleanup($_POST);
$error = "";



if($_POST['security_code']!=$_SESSION['security_code'])
$error = "<br />Captcha not correct!";

if($_POST['password']!=$_POST['passwordre'])
$error .= "<br />Passwords are not match!";

if(!check_email_address($_POST['email']))
$error .= "<br />Please Enter Valid Email Address!";

		$user=($_POST['email']);
$result = ("SELECT * FROM sob_resume WHERE email='$user'");
$num_rows = $dbase->num_rows($result);

if ($num_rows > 0)
$error .= '<br />this email already registerd.';  


if($error==""){
	unset($_POST['security_code']);
	unset($_POST['passwordre']);
	$_POST['password'] = md5($_POST['password']);
$dbase->RowInsert('sob_resume',mysql_cleanup($_POST));		

		
	/*
$q= "insert into sob_resume (email, fullname, password, sex, citzns, dborn, poburn, count, city, cate, hstedu, feild,totlex, keyf, tel, mobi, address, pem)
Values
('$user','$name','$pass','$sex','$nation','$dob','$pob','$count','$city','$cate','$deg','$feild','$exp','$key','$phone','$mobi','$address','$em')";
*/
//$result = mysql_query($q);

   
   
    $to = $user;
 $subject = "Thank You For Registration | NARjobs";
 $body = "You resent the account information in ".date('Y-m-d')." \n";
 $body .= "Your Account Information in NARjobs \n";
 $body .= "Login Email : ".$user." \n";
 $body .= "Password : ".$_POST['password']." \n";
 $body .= "Name: ".$_POST['fullname']." \n";

 $body .= "----------------------------------------------\n\n";
 $body .= "This is an auto-generated e-mail, please do not reply\n";
 $body .= "From karyabee.com \n info@karyabee.com \n";
 $body .= "------------------- ";
 
 mail($to, $subject, $body, "From: auto@karyabee.com"); 
 
   
$_SESSION['J_ID'] = $dbase->lastinserted_id();
$_SESSION['J_EMAIL'] = $_POST['email'];
$_SESSION['J_NAME'] = $_POST['fullname'];
$_SESSION['LOGIN'] = 1;
$_SESSION['IMG'] = "/upload/user/avatar/defult.jpg";
$_SESSION['NAME'] = $_POST['fullname'];
   redirect_to(HOME.'/user/resume');
}
echo $error;
if($error == "")
echo "User Successfuly added. click here to login";	
	

//send email

  

	//////////////////cover

	
	
}


function recover(){
$_POST = mysql_cleanup($_POST);	
global $dbase;
$error="";
$num_rows=0;
if(!check_email_address($_POST['email'])){
		$error .= "<br />Please Enter Valid Email Address!";
	}else{
		if($_POST['type']==1){
		$user=($_POST['email']);
		$result = ("SELECT * FROM sob_logemp WHERE email='$user'");
		$num_rows = $dbase->num_rows($result);
		}else{
		$user=($_POST['email']);
		$result = ("SELECT * FROM sob_resume WHERE email='$user'");
		$num_rows = $dbase->num_rows($result);
		}
		if ($num_rows <= 0)
		$error .= "<br />No Such User in our Database!";
	}
	
	





if($error==""){

	
$ma = array();
$ma['type']=$_POST['type'];
$ma['email']=$_POST['email'];
$ma['ip']= $_SERVER['REMOTE_ADDR'];
$ma['code']=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',5)),0,6);
$dbase->RowInsert('sob_user_prr',$ma);
if($ma['type']==1)
$name = get_emp_name($ma['email']);
else
$name = get_user_name($ma['email']);
$rid = $dbase->lastinserted_id();
 $to = $ma['email'];
 $subject = "Password Reset Request";

$link= "http://karyabee.com/?page=resetpass&cid=".$ma['code'].'&rid='.$rid;
 $vars = array( "<&-EMAIL-&>" => $ma['email'], "<&-LINK-&>" => $link, "<&-NAME-&>" => $name);

 //mail($to, $subject, $body, "From: auto@karybee.com"); 
 sendmail($to, $subject, 'forgotpassword', $vars, $name);
 echo 'We Sent you the password recovery link, please check your email!, Thank you!';
}else
echo $error;	
}
	
	
function coverx(){
		user::logix();
		$jid=J_ID;
		$cover=$_POST['cover'];
		$q= "update sob_resume set cover='$cover' where id='$jid'";
$result = mysql_query($q);

	if (!$result)
   echo mysql_error();
   else{
	  ?>
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/user/resume/">
<?php 
   }
		}
	
/////////update
function update(){
	user::logix();
		$name=$_POST['name'];
		$sex=$_POST['sex'];
		
		$nation=$_POST['nation'];
		$dob=$_POST['dob'];
		$pob=$_POST['pob'];
		$count=$_POST['count'];
		$city=$_POST['city'];
				$cate=$_POST['cate'];
				$deg=$_POST['deg'];
				$feild=$_POST['feild'];
				$key=$_POST['key'];
				$phone=$_POST['phone'];
				$mobi=$_POST['mobi'];
				$address=$_POST['address'];
				$exp=$_POST['exp'];
		$em=$_POST['email'];
		$rid=J_ID;
	
$q= "update sob_resume set fullname='$name',  sex='$sex', citzns='$nation', dborn='$dob', poburn='$pob', count='$count', city='$city', cate='$cate', hstedu='$deg', feild='$feild',totlex='$exp', keyf='$key', tel='$phone', mobi='$mobi', address='$address', pem='$em' where id='$rid' ";

$result = mysql_query($q);
if (!$result)
   echo mysql_error();
   else{
echo 'Updated Successfully';
   }
}

///////////////////change password
function info_Chp(){
	user::logix();
        
        if(!isset($_SESSION['FB_IMG'])){
$oldpass=md5($_POST['oldpas']);
        }
$newpass=md5($_POST['newpas']);
$cid=J_ID;

$qry="SELECT * FROM sob_resume where id='$cid' ";
	$result=mysql_query($qry);
		while($row = mysql_fetch_array($result))
  		{
			$noldpass = $row['password'];
		}
		
if(!isset($_SESSION['FB_IMG'])){
    if($oldpass==$noldpass){	
    $q= "update sob_resume set password='$newpass' where id='$cid'";
    $result = mysql_query($q);
    echo 'Password changed';
    }else 
    echo 'Current password is wrong';
 
}else{
    $q= "update sob_resume set password='$newpass' where id='$cid'";
    $result = mysql_query($q);
    echo 'Your Password Updated';
}

}
//////////////////chaneg page load
function chpass(){
    user::logix();
include('theme/user_chpass.php');	
}
//////////////////chaneg email
function info_Che(){
	user::logix();
	$jid=J_ID;	
        
$newpass=$_POST['nemail'];	

if(!isset($_SESSION['FB_IMG']))
    $user=$_POST['cpass'];


$result = mysql_query("SELECT * FROM sob_resume WHERE email='$newpass' and id='$jid'");
$num_rows = mysql_num_rows($result);

if ($num_rows > 0) {
echo 'Email Already registerd';  
echo '';
exit();
}
	
if(!isset($_SESSION['FB_IMG']))	
$oldpass=md5($_POST['oldp']);

$cid=J_ID;

$qry="SELECT * FROM sob_resume where id='$cid' ";
	$result=mysql_query($qry);
		while($row = mysql_fetch_array($result))
  		{
			$noldpass = $row['password'];
		}
                
if(!isset($_SESSION['FB_IMG'])){
    if($oldpass==$noldpass){	
    $q= "update sob_resume set email='$newpass' where id='$cid'";
    $result = mysql_query($q);
    echo 'Email Changed';
    }else 
    echo 'Password is wrong';

}else{
   $q= "update sob_resume set email='$newpass' where id='$cid'";
    $result = mysql_query($q);
    echo 'Email Changed'; 
}
    
}

	
	
}



?>