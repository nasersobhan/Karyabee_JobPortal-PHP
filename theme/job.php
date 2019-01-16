<?php headers() ?>
<div class="tab-content profile-tab-content" >
<div class="tab-pane fade active in" id="jobs">

<table  cellpadding="0" cellspacing="0" class="jobs_TBL table">



<tr  class="blue_head">
<td width="590px" colspan="2">
<?php 
if( strtotime(EDATE) < time() ){?>
<span style="color:red">Job Detial - <?php echo JTITLE ?> - Closed</span>
<?php } else {?>
Job Detial - <?php echo JTITLE ?>
<?php } 
 function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
 ?>
-<div class="fb-like" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>

</td>
</tr>





<tr>

<td width="25%" >Vacancy Number: </td>

<td width="75%" ><?php echo JID ?></td>



</tr>


<tr>

<td width="25%" >Title: </td>

<td  width="75%"><?php echo JTITLE ?></td>



</tr>





<tr>

<td width="25%">Category: </td>

<td  width="75%">



<?php echo CATE ?>



</td>

</tr>

<tr>

<td width="25%">Duration:</td>

<td  width="75%"><?php echo DURA ?> </td>



</tr>



<tr>

<td width="25%" >Announcing Date: </td>

<td  width="75%">



<?php echo date("jS F Y ", strtotime(ADATE));  ?> | <?php echo Agotime(ADATE); ?>



</td>

</tr>
<tr>

<td width="25%">Closing Date: </td>

<td  width="75%">



<?php echo date("jS F Y ", strtotime(EDATE)); ?> | <?php echo Agotime(EDATE); ?>



</td>

</tr>


<tr>

<td width="25%">Nationality:</td>

<td width="75%" >


<?php echo NATION ?>


</td>



</tr>



<tr>

<td width="25%">Salary Range:</td>

<td  width="75%">
<?php echo SALARY ?> USD/AFS




 </td>

</tr>


<tr>

<td width="25%">Jobs no:</td>

<td  width="75%"><?php echo JOBNO ?></td>



</tr>



<tr>

<td width="25%">Work Type:</td>

<td width="75%" >
<?php echo JOBTYPE ?>

 </td>

</tr>









<tr>

<td width="25%">Shift:</td>

<td  width="75%">
<?php echo SHIFT ?>

 </td>

</tr>







 <tr>

<td width="25%">Job status:</td>

<td width="75%" >

  <?php echo STAT ?>

 </td>

</tr>

<tr>

<td width="25%">Gender:   </td>

<td width="75%" >
<?php echo SEX ?>

 </td>

</tr>

<tr  class="blue_head">
<td  colspan="2">

Location

</td>
</tr>


<tr>

<td width="25%">Organization: </td>

<td  width="75%">
<?php 

$orgn=strtolower(ORG);
$orgn = str_replace(" ", "-", $orgn);
$orgn = str_replace("/", "-", $orgn);
$orgn = str_replace("&", "-", $orgn);


if(!ctype_digit(ORGID)){
	echo ORG ;
}else{
?>





<a href="<?php echo HOME.'/company/'.ORGID.'/'.$orgn ?>/" title="Find All Jobs with <?php echo ORG ?>">
<?php echo ORG ?></a> | 
<a href="<?php echo HOME.'/'.ORGID.'/profile/'.$orgn ?>/" title="Profile of <?php echo ORG ?>">More About <?php echo ORG ?></a>
<?Php } ?>
   





</td>

</tr>

<tr>

<td width="25%">Location: </td>

<td  width="75%"><?php echo LOCA ?> </td>

</tr>

<tr>

<td width="25%">City: </td>

<td  width="75%">
<?php


$cities = CITY;
 $place = explode(')|(',$cities);
 
 foreach($place as $city){
  ?>
<a href="<?php echo HOME.'/location/'.$city ?>" title="All Job from <?php echo $city ?>"><?php echo $city ?></a>, 
<?php } ?>
</td>



</tr>





<tr>

<td width="25%">Country:</td>

<td  width="75%">Afghanistan 
<?php //echo COUNT ?>



</td>



</tr>




<tr  class="blue_head">
<td  colspan="2">

Qualification

</td>
</tr>

<tr>

<td width="25%">Education: </td>

<td  width="75%"><?php echo EDU ?></td>

</tr>

<tr>

<td width="25%">Years of Experience: </td>

<td  width="75%"><?php 
$exp = EXPER;
echo str_ireplace('years', '', $exp) ?> Years</td>

</tr>

<tr>

<td style=" vertical-align:top">Qualification: </td>

<td style="padding:10px"  width="75%"><?php echo nl2br(QUALI) ?> </td>

</tr>


<tr  class="blue_head">
<td  colspan="2">

Duties & Responsibilities:

</td>
</tr>
<tr>

<td width="25%"></td>

<td style="padding:10px" width="75%" >

<?php echo nl2br(DUTI) ?>

  </td>



</tr>

<tr class="blue_head">
<td   colspan="2">

Submission Guideline:

</td>
</tr>

<tr>

<td width="25%"></td>

<td style="padding:10px"  width="75%">
<?php 


$email_pattern = "/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i";

$errx = '<a href="'.HOME.'/user/login" title="Login with Facebook">{{Sign in to See the Email}}</a>';
$guidx = removeLink(nl2br(GUID));
$emails = extract_emails_from(GUID);
//$emails = array_unique($emails);

//if(isset($_SESSION['J_ID'])){
  echo $guidx;  
//}else{
//foreach ($emails as $email)
   // $guidx = str_ireplace($email, $errx, $guidx);  
//echo ($guidx);
//} ?>

 </td></tr>
<?php if(PHONE!=""){ ?>
<tr>
<td width="25%">Phone:</td>
<td  width="75%"> <?php echo PHONE ?>   </td>
</tr>
<?php } ?>

<?php if(EMAIL!="" || $emails!=""){ ?>
<tr>
<td width="25%">Email:</td>
<td width="75%" >
 <?php 
    
   // if(isset($_SESSION['J_ID'])){
    foreach($emails as $email)
echo $email.'<br/>'; echo EMAIL;
   // }else{
        ?>
    <a href="<?php echo HOME ?>/login/fbconfig.php" >
            <button type="button" class="btn btn-primary btn-xs btn-social btn-facebook"><i class="fa fa-facebook"></i> Sign in with Facebook</button>
  <!-- </a> OR <a href="<?php echo HOME ?>/user/login"><button type="button" class="btn btn-primary btn-xs">Sign in as normal user</button> </a> to see the email -->



<?php  //} ?>  </td>
</tr>
<?php }  ?>





<?php 
if(isset($_SESSION['J_ID']))
$rid=$_SESSION['J_ID'];
else
$rid ="";

$jid=mycu($_GET['jid']);
$result = mysql_query("SELECT * FROM apply where rid='$rid' and jid='$jid'");
$num_rows = mysql_num_rows($result);

$done = 1; 

if ($num_rows) {
$value="You Already Applied For this Job";
$dis="disabled"; $done = 1; 
}else{
$value="Apply For This Job";	
$dis=""; $done =0; 
}



if( strtotime(EDATE) < time()){
$value="Closed";
}
 

//$jid=mycu($_GET['jid']);
//$result = mysql_query("UPDATE sob_jobs SET vist=vist+1 where id='$jid'");
 ?>
 





<tr>
<td  width="25%">Action:</td>
<td valign="middle" width="75%">


<script language="javascript">
function disableme(){
	document.getElementById('submit').disabled=true;
}

</script>

<?php if(isset($_SESSION['J_ID'])){ ?>
<form id="apply" ajaxform action="<?php echo HOME ?>/?user=japp" method="POST">

<div style=" display:none">
<input name="cid" type="text" value="<?php echo ORGID ?>">
<input name="edate" type="text" value="<?php echo EDATE ?>">
<input name="jid" type="text" value="<?php echo ID ?>">
<input name="title" type="text" value="<?php echo JTITLE ?>">
</div>
    
    <div id="result_mess">
<input type="submit" id="submit" style="height:25px" <?php echo $dis ?>  name="Send" value="<?php echo $value ?>"> 
</div>
                
                </form>
                
<?php }else{ ?>
<a href="http://www.karyabee.com/user/login/" title="Login"><button type="button" class="btn btn-primary btn-xs">Login</button></a> Or <a href="http://www.karyabee.com/user/register" title="register"><button type="button" class="btn btn-primary btn-xs">Register as Job Seeker</button></a>
<?php } ?>



  </td>
</tr>

<tr>

<td colspan="2"><?php ads() ?></td>



  </td>



</tr>
	</div>	</div>	</div>			

</table>


    </td>
   <?php showsidebar() ?>
  </tr>
 <?php //foot(); ?>
<?php footer() ?>