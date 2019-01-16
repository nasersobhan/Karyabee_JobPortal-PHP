<?php headers() ?>
<title> Contact Us | <?php echo PAGETITLE ?> </title>
    

 
 <div class="tab-content profile-tab-content" ><div class="tab-pane fade active in" id="jobs">
                                 <form id="sendmessage" action="http://www.sobhansoft.com/def/sContact/send.php" method="post" >

<!-- <?php echo HOME ?>/?emp=msgtoadmin -->
                                     <input type="hidden" data-eng='yes' value="karyabee@outlook.com" id="city"  name="sm_to" requireds />
                                     <input type="hidden" data-eng='yes' value="X66623$77" id="city"  name="keyvex" requireds />
                                      <input type="hidden" data-eng='yes' value="http://karyabee.com/?page=contact" id="city"  name="fallback" requireds />

<table  class="jobs_TBL table">

 <tr >
<td   height="20"  class="small_txt"><span class="style6"><strong>    <h2> &nbsp;&nbsp Contact us 
</h2></strong></span></td>
 <td  class="small_txt"><span class="style6"><strong><p> </p></strong></span></td>
</tr>
                  
<tr  class="blue_head">
<td   colspan="2">

Contact us

</td>
</tr>
<tr>
<td class="w300">Your name: </td>
<td><input type="text" data-eng='yes' id="city"  name="sm_name" requireds /> </td>
</tr>
<tr>
<td>Email: </td>
<td><input type="text" data-eng='yes' id="city"  name="sm_from" requireds /> </td>
</tr>
<tr>
<td>Phone: </td>
<td><input type="text" data-eng='yes' id="city"  name="sm_phone" requireds  /> </td>
</tr>
<tr>
<td>Company: </td>
<td><input type="text" data-eng='yes' id="city"  name="sm_company" requireds    /> </td>
</tr>
<tr>
<td>Massage: </td>
<td><textarea rows="7" data-eng='yes' name="sm_body"></textarea> </td>
</tr>

<tr>
<td>Captcha: </td>
<td><img src="http://www.sobhansoft.com/def/sContact/capa.php?width=70&height=25&characters=6" align="absmiddle" alt="Captcha" />
<input type="text" name="security_code" value="" maxlength="6" data-eng='yes' requireds  style="width:100px; float:left"></td>
</tr>





<tr>

<td>Action:</td>

<td>
    <button type="submit" id="sendmessagex" class="btn btn-default">Send Message</button>
<br/>
<p class="bg-warning"><?php 
if(isset($_GET['result'])){
    
    if($_GET['result']=='success')
        echo '<p class="bg-success"><h6>Thank you!</h6>Your message has been successfully sent. We will contact you very soon!</p>';    
      else
         echo '<p class="bg-warning">'.$_GET['result'].'</p>';  

}
?></p>

</form>

  </td>



</tr>
<tr>
<td colspan="2" class="blue_head">Contact Information: </td>

</tr>
<tr>

<td colspan="2"  style=" padding:20px">
Email Address : karyabee@outlook.com <br/>




 </td>
</tr>



</table>
</div></div></div>



    </td>
    <?php showsidebar() ?>
  </tr>
 
    
    
    
    
    
    
    
    
    
    





     
   


<?php footer() ?>