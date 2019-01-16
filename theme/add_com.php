<?php headers() ?>
<title> Register as Employee | <?php echo PAGETITLE ?></title>
    

 
 <form  ID="POST" action="<?php echo HOME ?>/?emp=comd" method="post">



<ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#jobs" data-toggle="tab"> Employee Registration Form  </a></li>

   </ul>
   
   <div class="tab-content profile-tab-content" >



<div class="tab-pane fade active in" id="jobs">


<table  class="jobs_TBL table">
<?php if(isset($_GET['emailp'])){ 
if($_GET['emailp']=='mail'){ ?>
<tr>
<td colspan="2"><span style=" color:red; font:Tahoma, Geneva, sans-serif bold 13px; text-align:center">this email already registerd please try another email</span></td>
</tr>
<?php }elseif($_GET['emailp']=='errorcap'){ ?>

<tr>
<td colspan="2"><span style=" color:red; font:Tahoma, Geneva, sans-serif bold 13px; text-align:center">Captcha is Wrong!!!</span></td>
</tr>

<?php } } ?>
 <tr >
<td   height="20" colspan="2"  class="small_txt"><span class="style6"><strong>    <h2>





 &nbsp;&nbsp Employee Registration Form 
 </h2></strong></span></td>

</tr>
                  




<tr  class="blue_head">
<td  colspan="2">
Account Informations
</td>
</tr>
<td width="300">Your Name: </td>
<td><input type="text" id="usernam"   name="username" class="validate"  /> </td>
</tr>

</tr>
<td width="300">Email: </td>
<td><input type="text" id="user" class="validate[required,custom[email]"  name="user" class="validate"  /> </td>
</tr>

<tr>
<td>Password: </td>
<td><input type="password" id="pass"  name="pass" class="validate[required,minSize[6]]"  /> </td>
</tr>


<tr>
<td>Confirm Password: </td>
<td><input type="password" id="passc" class="validate[required,equals[pass]]"  name="passc"   /> </td>
</tr>


<tr class="blue_head">
<td  colspan="2">
Company Informations
</td>
</tr>

<tr>
<td>Company Name: </td>
<td><input type="text" id="name"  name="name" class="validate[required]"  /> </td>
</tr>

<tr>
<td>Industry type: </td>
<td><?php get_catelist() ?> </td>
</tr>



<tr>
<td>Country: </td>
<td><?Php get_conlist() ?></td>
</tr>

<tr>
<td>Main Office City: </td>
<td><?php get_citylist('all','')?> </td>
</tr>

<tr>
<td style=" vertical-align:top">About: </td>
<td><textarea name="about" style="width:100%;" cols="80"> </textarea> </td>
</tr>
<tr>
<td>Logo URL: </td>
<td><input type="text" id="logo" class="validate[custom[url]"  name="logo" class="validate"  /> </td>
</tr>
<tr class="blue_head">
<td  colspan="2">
Contact information
</td>
</tr>


<tr>
<td>Public Email: </td>
<td><input type="text" id="email" class="validate[required,custom[email]"  name="email" class="validate"  /> </td>
</tr>


<tr>
<td>Phone : </td>
<td><input type="text" id="phone" class="validate[required,custom[phone]" name="phone" class="validate"  /> </td>
</tr>

<tr>
<td>Website: </td>
<td><input type="text" id="site" class="validate[custom[url]"  name="site" class="validate"  /> </td>
</tr>

<tr>
<td>Address: </td>
<td><input type="text" id="add"  name="add" class="validate"  /> </td>
</tr>

<tr>



<tr>
<td>Captcha: </td>
<td><img src="<?php echo HOME ?>/classes/capa.php?width=70&height=25&characters=6" align="absmiddle" alt="Captcha" />
<input type="text" name="security_code" value="" maxlength="6"  style="width:100px; float:left"></td>
</tr>

<tr>



<td>Action:</td>

<td>

<button type="submit" class="btn btn-default">Submit Form</button>

<span id="output" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp;
				</span>

  </td>



</tr>

<span id="boxnave" style="width:200px;  -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;background-color: rgba(204,0,51,0.6);color:#fff; padding:5px 5px; position:fixed;right:-300px; bottom:40px;z-index:1000; ">

boxnave


				</span>

</tbody></table> 
    
    </div>
   
</div>
</div>

 

 <?php showsidebar() ?></td>

<?php foot() ?>

<?php footer() ?>