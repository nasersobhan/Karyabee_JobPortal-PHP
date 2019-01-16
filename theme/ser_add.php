<?php headers(); 	emp::logi();?>

    <title> Services & Products | <?php echo PAGETITLE ?>  </title>
    


   <ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#info" data-toggle="tab">Result </a></li>


   </ul>
   
   <div class="tab-content profile-tab-content" >

    
         <form action="<?php echo HOME ?>/?ser=add" method="post"  ID="ITR" >
        <table  class="jobs_TBL table">
          <tr >
            <td   height="20" colspan="2"  class="small_txt"><span class="style6">
              &nbsp;&nbsp Services/Products :  <span id="output3" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </span></td>
            
          </tr>
          <tr  class="blue_head">
            <td   colspan="2"> Add new Product/Service </td>
          </tr>
          
           <tr>
            <td style="">Type: </td>
            <td style="">
   <select name="type">
   <option value="ser">Service</option>
   <option value="pro">Product</option>
   </select>
            
            
       </td>
          </tr>
          
          
          <tr>
            <td style="">Name: </td>
            <td style="">
    <input id="pname"  class="validate[required]"  name="name">
            
            
       </td>
          </tr>
          
           <tr>
            <td style="">Price(Optional): </td>
            <td style="">
    <input id="price"   name="price">
            
            
       </td>
          </tr>
          
           <tr>
            <td style="">Start date(Optional): </td>
            <td style="">
    <input id="sdate"   name="sdate">
            
            
       </td>
          </tr>
          
       
       
           <tr>
            <td valign="top" >Properties: </td>
            <td style="">
   <textarea name="feu"></textarea>
            
            
       </td>
          </tr>
          
          
          
           <tr>
            <td valign="top">Discription: </td>
            <td style="">
   <textarea name="dis"></textarea>
            
            
       </td>
          </tr>
       
       
          <tr>
            <td style="">Action:</td>
            <td style=""><input type="submit" id="submit" style=" height:25px"  name="Send" value="Add" >


            </td>
          </tr>
           </table>
         <table  id="langtbl"  class="jobs_TBL table">
         <tr  class="blue_head">
            <td id="to" height="20">Name </td>
             <td height="20">Type </td>
             <td height="20">Price  </td>
                <td height="20">Action  </td>
          </tr>
    
          
          <?php  serv::loadit(); ?>


 </table>  
   
      </form>
    
    </div>
   
</div>
</div>




    </td>
   <?php showsidebar() ?>
  </tr>
 
    
    
    
    
    
    
    
    
    
    





     
   


<?php footer() ?>
