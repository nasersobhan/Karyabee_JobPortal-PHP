<?php headers(); 
user::logix();
?>

    <title> Account and Resume Update | <?php echo PAGETITLE ?>  </title>
    
 <ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#info" data-toggle="tab">Privacy Policy </a></li>


   </ul>
   
   <div class="tab-content profile-tab-content" >

                                
   <div class="tab-pane fade active in" id="info">

 
 
 <form action="<?php echo HOME ?>/?user=cvup" method="post" enctype="multipart/form-data">
    
      
        <table class="jobs_TBL table">
        
          <tr >
            <td   height="20"  class="small_txt"><span class="style6">
              &nbsp;&nbsp Update CV:  <span id="output2" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </span></td>
            <td align="right">Resume:</td> 
          </tr>
          
          <tr  class="blue_head">
          <td >Resume Upload</td> 
            <td></td>
          </tr>
          
          <tr>
               <td >Resume:</td> 
         


      <td><input type="file" name="file" id="file" /> </td> 

          </tr>
            
            <td style="">Action:</td>
            <td style=""><input type="submit"   id="submit" style="height:25px"  name="Send" value="Upload" >
            </td>
          </tr>
          
          <?php 
		  $id=J_ID;
		  $qry="SELECT * FROM sob_resume where id='$id'";
$result2=mysql_query($qry);
while($row = mysql_fetch_array($result2))
  {
$cv= $row['cvs'];
	}
	
	
	if(!$cv==""){	  
		  ?>
          
         
         <tr class="blue_head">
               <td colspan="2" >Current Resume</td> 
    </tr>
      
      
  
      
         <tr >
               <td colspan="2" style="padding:10px" ><a href="<?php echo HOME ?>/download.php?f=<?php echo str_replace('/','|-|',$cv); ?>">Download Current CV </a>
                 
               </td> 
    </tr>
    
    <?php } ?>
    
        </table>
      </form></div></div></div>
  



    </td>
   <?php showsidebar() ?>
  </tr>
 
    
    
    
    
    
    
    
    
    
    





     
   


<?php footer() ?>