<?php headers() ?>

    <title> Account and Company Profile | <?php echo PAGETITLE ?>  </title>
    

 
   <ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#info" data-toggle="tab">Information</a></li>
    <li><a href="#info1" data-toggle="tab">Change Email</a></li>
    <li><a href="#info2" data-toggle="tab">Change Password</a></li>

   </ul>
   
   <div class="tab-content profile-tab-content" >




     
    
    <?php emp::getCOMinfo(C_ID);?>


   <div class="tab-pane fade active in" id="info">
        <form  ID="POST3" method="post"  action="<?php echo HOME ?>/?emp=update">
        <table class="jobs_TBL table">
          <tr >
            <td   height="20"  class="small_txt"><span class="style6"><strong>
               &nbsp;&nbsp Update Company Informations <span id="output2" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </strong></span></td>
            <td  class="small_txt"><span class="style6"><strong>
              <p> </p>
            </strong></span></td>
          </tr>
         <tr class="blue_head">

<td  colspan="2">

Company Informations

</td>

</tr>



<tr>

<td style="">Company Name: </td>

<td style=""><input type="text" id="name" Value="<?php echo CNAME ?>" name="name" class="validate[required]"  /> </td>

</tr>



<tr>

<td style="">Industry type: </td>

<td style=""><?php get_catelist(CCATEID) ?></td>

</tr>







<tr>

<td style="">Country: </td>

<td style=""><?Php get_conlist(CCOUNTID) ?></td>

</tr>



<tr>

<td style="">Main Office City: </td>

<td style="">
<?php get_citylist('all',CCITY)?>

</td>

</tr>



<tr>

<td style=" vertical-align:top">About: </td>

<td style=""><textarea name="about"   rows="5" cols="50"> <?php echo CABOUT ?> </textarea> </td>

</tr>

<tr>

<td style="">Logo URL: </td>

<td style=""><input type="text" id="logo" Value="<?php echo CLOGO ?>" class="validate[custom[url]"  name="logo" class="validate"  /> </td>

</tr>

<tr class="blue_head">

<td  colspan="2">

Contact information

</td>

</tr>





<tr>

<td style="">Public Email: </td>

<td style=""><input type="text" id="email" Value="<?php echo CPEMAIL ?>" class="validate[required,custom[email]"  name="email" class="validate"  /> </td>

</tr>





<tr>

<td style="">Phone : </td>

<td style=""><input type="text" id="phone" Value="<?php echo CPHONE ?>" class="validate[required,custom[phone]" name="phone" class="validate"  /> </td>

</tr>



<tr>

<td style="">Website: </td>

<td style=""><input type="text" id="site" Value="<?php echo CWSITE ?>" class="validate[custom[url]"  name="site" class="validate"  /> </td>

</tr>



<tr>

<td style="">Address: </td>

<td style=""><input type="text" id="add" Value="<?php echo CADD ?>"  name="add" class="validate"  /> </td>

</tr>
<tr class="blue_head">

<td  colspan="2">

Social Engines:

</td>

<tr>
<td style="">Twitter: </td>
<td style="">http://twitter.com/<input type="text" id="add" Value="<?php echo CTWT ?>"  name="twt"   /> </td>
</tr>

<tr>
<td style="">Facebook: </td>
<td style="">http://facebook.com/<input type="text" id="add" Value="<?php echo CFB ?>"  name="fb"   /> </td>
</tr>

<tr>
<td style="">Linkedin: </td>
<td style="">http://www.linkedin.com/<input type="text" id="add" Value="<?php echo CLI ?>"  name="li"   /> </td>
</tr>



<tr>
<td style="">Google Plus: </td>
<td style="">https://plus.google.com/<input type="text" id="add" Value="<?php echo CGP ?>"  name="gp"   /> </td>
</tr>
<tr>
<td style="">Yahoo: </td>
<td style=""><input type="text" id="add" Value="<?php echo CYM ?>"  name="ym" class="validate"  />@yahoo.com </td>
</tr>



<tr>



          <tr>
            <td style="">Action:</td>
            <td style=""><input type="submit" id="submit" style="width:150px; height:40px"  name="Send" value="Update" >
             </td>
          </tr>
          <tr>
            <td colspan="2" style=""><?Php ads(); ?></td>
          </tr>
         
        </table>
      </form>
    
     
    </div>
  <div class="tab-pane fade in" id="info1">
    
       <form  ajaxform id="changeemail" action="<?php echo HOME ?>/?emp=che" method="post" >
        <table class="jobs_TBL table">
          <tr >
            <td   height="20" colspan="2"  class="small_txt"><span class="style6">
              &nbsp;&nbsp Change My Email :  <span id="output1" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </span></td>
            
          </tr>
          <tr  class="blue_head">
            <td   colspan="2"> Change Email </td>
          </tr>
          <tr>
            <td style="">password: </td>
            <td style=""><input type="text" id="oldp" requrieds  name="oldp"  /></td>
          </tr>
             <tr>
            <td style="">New Email: </td>
            <td style=""><input  type="email" id="pass" requrieds  name="pass"   /></td>
          </tr>
             <tr>
            <td style="">Confirm new Email: </td>
            <td style=""><input type="email" id="email" requrieds name="cpass"  /></td>
          </tr>
          <tr>
            <td style="">Action:</td>
            <td style=""><input type="submit" id="submit" style="width:150px; height:40px"  name="Send" value="Change Email" ><div id="result_mess"></div>
            </td>
          </tr>
         
         
        </table>
      </form>
    
    
    
    
    
    </div>
<div class="tab-pane fade in" id="info2">
       <form  id="changepassword" ajaxform action="<?php echo HOME ?>/?emp=chp" method="post" >
        <table class="jobs_TBL table">
          <tr >
            <td   height="20" colspan="2"  class="small_txt"><span class="style6">
              &nbsp;&nbsp Change My Acount Password :  <span id="output3" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </span></td>
            
          </tr>
          <tr  class="blue_head">
            <td   colspan="2"> Change my password </td>
          </tr>
          <tr>
            <td style="">Old password: </td>
            <td style=""><input type="text" id="oldp" requrieds  name="oldp" /></td>
          </tr>
            
             <tr>
            <td style="">Confirm new password: </td>
            <td style=""><input type="text" id="newpass" requrieds name="cpass" /></td>
          </tr>
          <tr>
            <td style="">Action:</td>
            <td style=""><input type="submit" id="submit" name="Send" value="Send password" ><div id="result_mess"></div>
            </td>
          </tr>
         
         
        </table>
      </form>
    
    </div>
</div>
</div>

 





    </td>
    <?php showsidebar() ?>
  </tr>
 
    
    
    
    
    
    
    
    
    
    





     
   


<?php footer() ?>
