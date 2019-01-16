<?php headers()


?>
   <title> Login As Company | <?PHP echo PAGETITLE ?></title> 
    
    
 
   <div class="tab-content profile-tab-content" >

                                
   <div class="tab-pane fade active in" id="info">

 

 

<table class="jobs_TBL table">
  <form action="<?php echo HOME ?>/loginac.php" method="post" >
  
<?php if(isset($_GET['emailp'])){ ?>
<tr>
<td><span style=" color:red; font:Tahoma, Geneva, sans-serif bold 12px; text-align:center"> 
<?php 
if($_GET['emailp']=='emailm')
	echo 'Please enter Your email';
else if($_GET['emailp']=='passm')
	echo 'Please enter your password';
	else if($_GET['emailp']=='worng')
	echo 'Email or password is wrong';
?>


</span></td>
</tr>
<?php } ?>
  
<?php if($_GET['emailp']=='done'){ ?>
<tr>
<td><span style=" color:green; font:Tahoma, Geneva, sans-serif bold 12px;"> Your registration has been completed you can login now</span></td>
</tr>
<?php } ?>
   <tr class="blue_head">
<td height="30px"  class="bottom_line style16">
<strong><span class="style13">Employer Log in</span></strong>
</td>
</tr>

 <tr>
<td class="small_txt"> <div align="left">Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="login" type="text" id="login" size="20"></div></td>
</tr>
<tr>

<td class="small_txt"><div align="left">Password  <input name="password" type="password" id="Password" size="20"></div></td>
</tr>

<tr>
<td>
<input name="button" type="submit" class="3butt_submit" id="button" value="Log In">
</td>
</tr>

<tr>
<td><div align="right"><a title="register as an employee" href="<?php echo HOME ?>/emp/com">New User</a>&nbsp;|&nbsp;<a title="Get your password back" href="<?php echo HOME ?>/emp/forgot">Forgot Password</a></div></td>
</tr>


 </form>









<span id="boxnave" style="width:200px;  -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;background-color: rgba(204,0,51,0.6);color:#fff; padding:5px 5px; position:fixed;right:-300px; bottom:40px;z-index:1000; ">

boxnave


				</span>

</table>
</div></div></div>



    </td>
    <?php showsidebar() ?>
  </tr>
 
    
    
    
    
    
    
<?php footer() ?>