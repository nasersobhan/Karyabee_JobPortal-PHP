<?php headers() ?>

   <title> User Registration Form | <?PHP echo PAGETITLE ?></title> 
    

 
 



   
   <div class="tab-content profile-tab-content" >



<div class="tab-pane fade active in" id="jobs">
 <form role="form" ajaxform  id="adduser" action="<?php echo HOME ?>/?user=reg" method="post">
<table class="jobs_TBL table">

 <tr >
<td colspan="2"  class="small_txt"><h1>Register New Job Seeker</h1></td>

</tr>
                  




<tr  class="blue_head">
<td  colspan="2">
Acount Information
</td>

<tr>
<td class="w300">Full name: </td>
<td><input requireds type="text" id="name"  name="fullname" /> </td>
</tr>


</tr>
<td>Email: </td>
<td><input requireds type="email" id="user"  name="email"  /></td>
</tr>

<tr>
<td>Password: </td>
<td><input type="password" id="pass"  name="password"  requireds  /></td>
</tr>


<tr>
<td>Confirm Password: </td>
<td><input type="password" id="passc" requireds  name="passwordre"   /> </td>
</tr>

<tr>
<td>Captcha: </td>
<td><img src="<?php echo HOME ?>/classes/capa.php?width=70&height=25&characters=6" align="absmiddle" alt="Captcha" />
<input type="text" name="security_code" value="" maxlength="6"  style="width:100px; float:left"></td>
</tr>



<tr>

<td>Action:</td>

<td>


<button type="submit" class="btn btn-default">Submit Form</button>
       
<span id="result_mess" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">
				</span>

  </td>



</tr>


</form>
</table>


</div>
</div>
</div>


    </td>
 <?php showsidebar() ?>
  </tr>
 
    
    
    
    
    
    
    
    
    
    





     
   


<?php footer() ?>
