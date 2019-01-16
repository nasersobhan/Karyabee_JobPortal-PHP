<?php headers() ?>
   <title> Login as user | <?PHP echo PAGETITLE ?></title> 
    

    
   <div class="tab-content profile-tab-content" style="padding-top:40px;" >



<div class="tab-pane fade active in" id="jobs">

<table class="TBL_vmenu table">
  <form action="<?php echo HOME ?>/loginae.php" method="post" >
  

   <tr class="blue_head">
<td height="30px"  class="bottom_line style16">
<strong><span class="style13">User Log in</span></strong>
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
<td><div align="right"><a title="register as an employee" href="<?php echo HOME ?>/user/register">New User</a>&nbsp;|&nbsp;<a title="Get your password back" href="<?php echo HOME ?>/emp/frp">Forgot Password</a></div></td>
</tr>


 </form>
</table>
</div></div></div>

    </td>
 <?php showsidebar() ?>
  </tr>

<?php footer() ?>