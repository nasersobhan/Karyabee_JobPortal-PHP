<td  class="vtop">








 <div class="TabbedPanels bgfff w300"  >
<?php if( is_login()){ ?>

 <div>
 <img rel="tooltip" title="click to change avatar"  src="<?Php 
 if(isset($_SESSION['FB_IMG'])){
    $img = $_SESSION['FB_IMG'];
 }else{
      $img = HOME.$_SESSION['IMG'];
 }
 echo $img ?>" onclick="chooseFile();" class="img-thumbnail" id="proimg" />



 
 <div style=" float:right; vertical-align:top; width:160px; margin:0 0 8px 8px;">
 <strong><?php echo  (isset($_SESSION['J_ID'])? $_SESSION['J_NAME']: $_SESSION['C_EMAIL']);  ?></strong><br>
<?php echo  (isset($_SESSION['J_ID'])? 'Job Seeker Account': 'Employer Account'); ?>
 <hr style="margin:3px 0 "/><a href="<?php echo HOME ?>/emp/logout">Log me Out!</a> | <a href="<?php echo  (isset($_SESSION['J_ID'])? HOME.'/user/resume' : HOME.'/emp/myinfo/'); ?>">Edit Profile</a>
 </div>
  <button onclick="chooseFile();" class="proimgc" type="button">Change Image</button>
     <button class="proimgc" id="changephotox" type="button"></button>
     
     
 
 
<?php } if(!isset($_SESSION['C_ID']) && !isset($_SESSION['J_ID'])){?>

<table width="100%" class="TBL_vmenu" >
 <form id="loginem"  role="form" name="login" method="post" action="<?php echo HOME ?>/loginae.php">
<tr>
<td  class="blue_head"><strong><span class="style13">&nbsp;&nbsp;&nbsp;Job Seeker Log in</span></strong></td>
</tr>

<tr>
<td class="small_txt">
<div style=" height:5px">

</div>
 <div class="form-group">
    <label for="logine">Email address</label>
    <input type="email" name="login" class="form-control" id="logine" placeholder="Enter email">
  </div>
 </td>

</tr>

<tr>
<td  class="small_txt">

 <div class="form-group">
    <label for="passworde">Password</label>
    <input type="password" name="password" class="form-control"  id="passworde" placeholder="Enter Password">
  </div>
</td>

</tr>

<tr>
<td >

    <label>
      <input type="checkbox"> Keep me log in
    </label>

 
      <button name="button2" type="submit" style="float:right" class="btn btn-default">log me in</button>

</td>
</tr>

<tr>
<td ><a href="<?php echo HOME ?>/user/register">Register New</a>&nbsp;|&nbsp;<a href="<?php echo HOME ?>/login/fbconfig.php"><span  class="btn btn-sm btn-social btn-facebook" style="padding:2px; padding-left:35px;">
            <i class="fa fa-facebook"></i> Sign in with Facebook</span>
  </a>

</tr>
  </form>
</table>

<div style=" height:10px">
<hr/>
</div>





<table class="TBL_vmenu" width="100%"  >
  <form action="<?php echo HOME ?>/loginac.php" method="post" >

   <tr >
<td  class="blue_head">
<strong><span class="style13"> &nbsp;&nbsp;&nbsp;Employer Log in</span></strong>
</td>
</tr>

 <tr>
<td class="small_txt">
<div style=" height:5px">

</div>
<div class="form-group">
    <label for="loginj">Email address</label>
    <input type="email" name="login" class="form-control" id="loginj" placeholder="Enter email">
  </div>
</td>
</tr>
<tr>

<td class="small_txt">
<div class="form-group">
    <label for="Passwordj">Password</label>
    <input type="password" name="password" class="form-control"  id="Passwordj" placeholder="Enter Password">
  </div>

</td>
</tr>

<tr>
<td>

    <label>
      <input type="checkbox"> Keep me log in
    </label>

 
      <button name="button2" type="submit" style="float:right" class="btn btn-default">log me in</button>

</td>
</tr>

<tr>
<td><a href="<?php echo HOME ?>/emp/com">Register New Employer</a>&nbsp;|&nbsp;<a href="<?php echo HOME ?>/emp/forgot">Forgot Password</a></td>
</tr>

 </form>
</table>


  <?php } else if(isset($_SESSION['J_ID'])){?>




<table class="TBL_vmenu" width="100%" border="0" cellspacing="2" cellpadding="2">


<tr >
                <td class="blue_head">
				&nbsp; Options
                    </td>
                    </tr>
                   <tr>
                   <td  >
					 <a title="Post a new job to the site" href="<?php echo HOME ?>/user/applications">&raquo; Online Job Applications </a>
                    </td>
                    </tr>
                    
<?Php 
if(isset($_SESSION['J_ID'])){
$rid=$_SESSION['J_ID'];

$sql = mysql_query("SELECT * FROM  slug where id='$rid' and type='resume'");
$link="";
while($re = mysql_fetch_array($sql)){
$link=HOME.'/'.$re['slug'];
}

$fullslug=strtolower($_SESSION['J_NAME']);
$fullslug = str_replace(" ", "-", $fullslug);
$fullslug = str_replace("/", "-", $fullslug);
$fullslug = str_replace("&", "-", $fullslug);


if($link=="")
    $link=HOME.'/cv/'.$rid.'-'.$fullslug;
 
}
?>
                    
                    
                      <tr>
                     <td align="left" width="100%" >
				       <a title="Your Jobs posted befor" target="_Blank" href="<?php echo $link ?>">&raquo; View Online CV </a>
                     </td>
                    </tr>
                    
                    <tr>
                     <td align="left" width="100%" >
				       <a title="Your Jobs posted befor" href="<?php echo HOME ?>/user/resume">&raquo; Edit Online CV </a>
                     </td>
                    </tr>
                    
                     <tr>
                     <td align="left" width="100%" >
				       <a title="Your Jobs posted befor" href="<?php echo HOME ?>/user/cv">&raquo; Uploaded CV file </a>
                     </td>
                    </tr>
                    
                      <tr>
                <td class="blue_head">
				&nbsp; Acount Management
                    </td>
                    </tr>
                    
                     
                    <?php //if(!isset($_SESSION['FB_IMG'])){ ?>
                     <tr>
                     <td align="left" width="100%" >
				       <a title="edit my information" href="<?php echo HOME?>/user/chpass/">&raquo; Change Email/Password </a>
                     </td>
                    </tr>
                    <?php //} ?>
                     <tr>
                     <td align="left" width="100%" >
				       <a href="<?php echo HOME ?>/emp/logout" title="emplayee logout">&raquo; Logout</a>
                     </td>
                    </tr>
                    
                   
                    
                    
                  
</table>







<?php  }else { ?>
<table class="TBL_vmenu" width="100%" >
<tr>
                <td class="blue_head">
				&nbsp; Job Management
                    </td>
                    </tr>
                   <tr>
                   <td align="left" width="100%" >
					 <a title="Post a new job to the site" href="<?php echo HOME ?>/emp/addjob">&raquo; Post a new job </a>
                    </td>
                    </tr>
                    <tr>
                     <td align="left" width="100%" >
				       <a title="Your Jobs posted befor" href="<?php echo HOME ?>/emp/list">&raquo; Your job List </a>
                     </td>
                    </tr>
                     <tr>
                     <td align="left" width="100%" >
				       <a title="Your Jobs posted befor" href="<?php echo HOME ?>/emp/applications">&raquo; Job Applications </a>
                     </td>
                    </tr>
                   
                      <tr >
                <td class="blue_head">
				&nbsp; Acount Management
                    </td>
                    </tr>
                    
                       <tr>
                     <td align="left" width="100%" >
				      <a href="<?php echo HOME?>/emp/crd/" title="Add a new category" >&raquo; Insert Credit (<?php echo C_CRD ?> credits )  </a>
                     </td>
                    </tr>
                    
                     <tr>
                     <td align="left" width="100%" >
				       <a title="edit my information" href="<?php echo HOME?>/emp/myinfo/">&raquo; My Information </a>
                     </td>
                    </tr>
                    
                    
                      <tr>
                     <td align="left" width="100%" >
				       <a title="edit my information" href="<?php echo HOME?>/emp/services/">&raquo; Services/products </a>
                     </td>
                    </tr>
                    
                     <tr>
                     <td align="left" width="100%" >
				       <a href="<?php echo HOME ?>/emp/logout" title="emplayee logout">&raquo; Logout</a>
                     </td>
                    </tr>
                    
                    <?php if(C_RANK==1){ ?>
                    <tr >
                <td class="blue_head">
				&nbsp; Admin Option
                    </td>
                    </tr>
                    
                    <tr>
                     <td align="left" width="100%" >
				      <a href="<?php echo HOME?>/emp/clist/" title="Add a new category" >&raquo; Companies list </a>
                     </td>
                    </tr>
                    
                    
                     <tr>
                     <td align="left" width="100%" >
				      <a href="<?php echo HOME?>/emp/rlist/" title="Add a new category" >&raquo; Resume list </a>
                     </td>
                    </tr>
                    
                     <tr>
                     <td align="left" width="100%" >
				      <a href="<?php echo HOME?>/emp/jlist/" title="Add a new category" >&raquo; job list </a>
                     </td>
                    </tr>
                    
                    
                    
                     <tr>
                     <td align="left" width="100%" >
				      <a href="<?php echo HOME?>/emp/plist/" title="Add a new category" >&raquo; Phone list </a>
                     </td>
                    </tr>
                    
                    
                     <tr>
                     <td align="left" width="100%" >
				      <a href="<?php echo HOME?>/emp/slist/" title="Add a new category" >&raquo; Service list </a>
                     </td>
                    </tr>
                    
                      <tr>
                     <td align="left" width="100%" >
				      <a href="<?php echo HOME?>/emp/crdadd/" title="Add a new category" >&raquo; Create Credit  </a>
                     </td>
                    </tr>
                     <tr>
                     <td align="left" width="100%" >
				       <a href="<?php echo HOME?>/emp/city/" title="Add a new ciry" >&raquo; Add A City </a>
                     </td>
                    </tr>
                    
                     <tr>
                     <td align="left" width="100%" >
				     <a href="<?php echo HOME?>/emp/com/" title="Add a new company" >&raquo; Add A Company </a>
                     </td>
                    </tr>
                    
                     <tr>
                     <td align="left" width="100%" >
				      <a href="<?php echo HOME?>/emp/cate/" title="Add a new category" >&raquo; Add A Category </a>
                     </td>
                    </tr>
                    <?php } ?>
                    
                    
                  
</table>

<?php }?>



<div style=" height:10px">
<hr/>
</div>



<table width="100%" class="TBL_vmenu" >
 <form id="loginem"  role="form" name="login" method="post" action="http://feedburner.google.com/fb/a/mailverify" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=Karyabee', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
<tr>
<td  class="blue_head"><strong><span class="style13">&nbsp;&nbsp;&nbsp;Email Alerts</span></strong></td>
</tr>

<tr>
<td class="small_txt">
<div style=" height:5px">

</div>
 <div class="form-group">
    <label for="logine">Email address</label>
    <input type="email" name="email" class="form-control" id="logine" placeholder="Enter email">
    <input type="hidden" value="Karyabee" name="uri"/>
    <input type="hidden" name="loc" value="en_US"/>
     <label for="logine">Get the latest job announcments in your email everyday.</label>
  </div>
 </td>

</tr>



<tr>
<td >



 
      <button name="buttonxe" type="submit" style="float:right" class="btn btn-default">Subscribe</button>

</td>
</tr>


  </form>
</table>

<div style=" height:10px">
<hr/>
</div>




<table width="100%" class="TBL_vmenu" >

<!--
<tr>
<td class="small_txt">
<a href="http://www.sobhansoft.com/" target="_blank" title="Sobhansoft website"><img src="http://sobhansoft.net/def/banner-270-270.gif" alt="Sobhansoft" title="Sobhansoft" /></a>
</td>
</tr>
-->


</table>
<table width="100%" class="TBL_vmenu" >


<tr>
<td class="small_txt">
<div class="fb-like-box" data-href="https://www.facebook.com/karyabeewebsite" data-colorscheme="light" data-show-faces="true" data-header="true" data-stream="false" data-width="270" data-show-border="true"></div>
</td>
</tr>



</table>
</div>

</td>









            


                         
            