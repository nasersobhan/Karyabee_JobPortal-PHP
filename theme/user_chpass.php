<?php headers() ?>

    <title> Change Account Setting | <?php echo PAGETITLE ?>  </title>
    
   <ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#email" data-toggle="tab">Change Email</a></li>
<li ><a href="#pass" data-toggle="tab">Change Password</a></li>

   </ul>
   
   <div class="tab-content profile-tab-content" >
   <div class="tab-pane fade active in" id="email">


    
       <form action="<?php echo HOME ?>/?user=chep" method="post"  ajaxform ID="xCHE" >
        <table class="jobs_TBL table">
          <tr >
            <td   height="20" colspan="2"  class="small_txt"><span class="style6">
              &nbsp;&nbsp Change My Email :  <span id="output" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </span></td>
            
          </tr>
          <tr  class="blue_head">
            <td   colspan="2"> Change Email </td>
          </tr>
          
        <?php  if(!isset($_SESSION['FB_IMG'])){ ?>
          <tr>
            <td style="">password: </td>
            <td style=""><input type="text" id="oldp" class="validate[required,minSize[6]]"  name="oldp"   /></td>
          </tr>
        <?php } ?>
             <tr>
            <td style="">New Email: </td>
            <td style=""><input type="text" id="email" class="validate[required,custom[email]]" name="nemail"   /></td>
          </tr>
          <tr>
            <td style="">Action:</td>
            <td style=""><input type="submit" id="submit" style="width:150px; height:40px"  name="Send" value="Change Email" ><div id="result_mess"></div>
            </td>
          </tr>
         
         
        </table>
      </form>
    
    
    
    
    
    </div>
       <div class="tab-pane fade in" id="pass">
    
    
  
    
       <form action="<?php echo HOME ?>/?user=chpp" method="post" ajaxform ID="changepasws" >
        <table class="jobs_TBL table">
          <tr >
            <td   height="20" colspan="2"  class="small_txt"><span class="style6">
              &nbsp;&nbsp Change My Acount Password :  <span id="output2" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </span></td>
            
          </tr>
          <tr  class="blue_head">
            <td   colspan="2"> Change password </td>
          </tr>
          <?php  if(!isset($_SESSION['FB_IMG'])){ ?>
          <tr>
            <td style="">Old password: </td>
            <td style=""><input type="text" id="oldpas"  name="oldpas"   /></td>
          </tr>
          <?php } ?>
             <tr>
            <td style="">New password: </td>
            <td style=""><input type="text" id="emailo" class="validate[required,equals[pass]]" name="newpas"  /></td>
          </tr>
          <tr>
            <td style="">Action:</td>
<td style=""><input type="submit" id="submit2" style="width:150px; height:40px"  name="Send" value="Change password" ><div id="result_mess"></div>
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
