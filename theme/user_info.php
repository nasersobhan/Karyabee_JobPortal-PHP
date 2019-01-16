<?php headers(); 
user::logix();


?>

    <title> Account and Resume Update | <?php echo PAGETITLE ?>  </title>
    
<ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#info" data-toggle="tab">Resume Information</a></li>
    <li><a href="#info1" data-toggle="tab">Cover Letter</a></li>
    <li><a href="#info2" data-toggle="tab">Experience</a></li>
<li><a href="#info3" data-toggle="tab">Education</a></li>
<li><a href="#info4" data-toggle="tab">Languages</a></li>
<li><a href="#info5" data-toggle="tab">Computer Skills</a></li>
   </ul>
   
   
   <div class="tab-content profile-tab-content" >
   <div class="tab-pane fade active in" id="info">

    <?php user::getUinfo(J_ID);?>

     
     <form ID="POST" action="<?php echo HOME ?>/?user=update" ajaxform >



<table   class="jobs_TBL table">
<?php if(isset($_GET['emailp'])){ ?>
<tr>
<td colspan="2"><span style=" color:red; font:Tahoma, Geneva, sans-serif bold 13px; text-align:center">this email already registerd please try another email</span></td>
</tr>
<?php } ?>
 <tr >
<td   height="20" colspan="2"  class="small_txt"><span class="style6"><strong>    <h1>

 &nbsp;&nbsp Resume Update
 </h1></strong></span></td>

</tr>
                  



<script type="text/javascript">
function changefen(){
document.getElementById("sex").value = '<?php echo JSEX ?>';
document.getElementById("city").value = '<?php echo JCITY ?>';
document.getElementById("count").value = '<?php echo JCOUNTID ?>';
document.getElementById("cate").value = '<?php echo CATEID ?>';
document.getElementById("deg").value = '<?php echo DEG ?>';

};
window.onload=changefen;
</script>


<tr class="blue_head">
<td  colspan="2">
General Informations
</td>
</tr>

<tr>
<td style="">Full name: </td>
<td style=""><input type="text" id="name" value="<?php echo JNAME ?>"  name="name" class="validate[required]"  /> </td>
</tr>

<tr>
<td style="">Gender: </td>
<td style=""><select id="sex" name="sex">
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</td>
</tr>


<tr>
<td style="">Nationality: </td>
<td style=""><input type="text" id="nation" value="<?php echo NATION ?>" name="nation" class="validate[required]"  />
</td>
</tr>

<tr>
<td style="">Date of Birth: </td>
<td style=""><input type="date" id="dob" value="<?php echo DOB ?>" name="dob" class="validate[required,custom[date]]"  />
</td>
</tr>

<tr>
<td style="">Place of Birth: </td>
<td style=""><input type="text" id="pob" value="<?php echo POB ?>" name="pob" class="validate[required]"  />
</td>
</tr>


<tr>
<td style="">Current Country: </td>
<td style=""><?Php get_conlist() ?></td>
</tr>

<tr>
<td style="">Current City: </td>
<td style=""><div id="txtHint"><?php get_citylist(1,'') ?></div> </td>
</tr>





<tr class="blue_head">
<td  colspan="2">
Education And Field
</td>
</tr>



<tr>
<td style="">Functional Area: </td>
<td style=""><?php get_catelist() ?> </td>
</tr>

<tr>
<td style="">Degree: </td>
<td style="">
<select id="deg" name="deg">
<option value="High School">High School</option>
<option value="Diploma">Diploma</option>
<option value="Bachelor">Bachelor</option>
<option value="Master">Master</option>
<option value="Ph.D">Ph.D</option>
</select>


 </td>
</tr>

<tr>
<td style="">Major: </td>
<td style=""><input type="text" id="exp"  value="<?php echo MAJ ?>"  name="feild" class="key"  /> </td>
</tr>



<tr>
<td style="">Years of Experience: </td>
<td style=""><input type="text" id="exp" value="<?php echo EXP ?>"  size="5" class="validate[required,custom[number]]" name="exp" class="key"  /> </td>
</tr>

<tr>
<td style="">Key Skills: </td>
<td style=""><input type="text" id="logo"  value="<?php echo KEY ?>"  name="key"   /> </td>
</tr>



<tr class="blue_head">
<td  colspan="2">
Contact Information
</td>
</tr>


<tr>
<td style="">Alternate Email: </td>
<td style=""><input type="text" id="email" value="<?php echo EMAIL ?>" class="validate[required,custom[email]]"  name="email"   /> </td>
</tr>


<tr>
<td style="">Phone : </td>
<td style=""><input type="text" id="phone" value="<?php echo PHONE ?>" class="validate[required,custom[phone]]" name="phone"   /> </td>
</tr>

<tr>
<td style="">Mobile : </td>
<td style=""><input type="text" id="mobi" value="<?php echo MOBI ?>" class="validate[required,custom[phone]]" name="mobi"  /> </td>
</tr>


<tr>
<td style="">Address: </td>
<td style=""><input type="text" id="address"  name="address" value="<?php echo ADD ?>" /> </td>
</tr>

<tr>

<td style="">Action:</td>

<td style="">

<input type="submit" id="submit" style="width:100px; height:25px"  name="Send" value="Update" >
<div id="result_mess"></div>

  </td>



</tr>


</table>

</form>
    
     
    </div>
    <div class="tab-pane fade in" id="info1">
    
       <form action="<?php echo HOME ?>/?user=cover" method="post"  ID="POST1" >
        <table class="jobs_TBL table">
          <tr >
            <td   height="20" colspan="2"  class="small_txt"><span class="style6">
              &nbsp;&nbsp Cover Letter:  <span id="output2" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </span></td>
            
          </tr>
          <tr  class="blue_head">
            <td   colspan="2">  Cover Letter</td>
          </tr>
          <tr>
            
            <td colspan="2" >
            
            
            <textarea style="width: 900px"  name="cover"   ><?php echo COVER ?></textarea> </td>
          </tr>
            
            <td style="">Action:</td>
            <td style=""><input type="submit" id="submit" style=" height:25px"  name="Send" value="Update Cover Letter" >
            </td>
          </tr>
         
         
        </table>
      </form>
   <!-- /////////////done  --->
      </div>
<div class="tab-pane fade in" id="info2">
    
       <form  ID="ATRX" ajaxform action="<?php echo HOME ?>/?user=addexp" >
        <table class="jobs_TBL table">
          <tr >
            <td   height="20" colspan="2"  class="small_txt"><span class="style6">
              &nbsp;&nbsp Experiance :  <span id="output3" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </span></td>
            
          </tr>
          <tr  class="blue_head">
            <td   colspan="2"> Experiance </td>
          </tr>
          <tr>
            <td style="">Job Title: </td>
            <td style=""><input type="text" id="etitle" class="validate[required]"  name="title"  /></td>
          </tr>
             <tr>
            <td style="">Org/company name: </td>
            <td style=""><input type="text" id="eorg" class="validate[required]"  name="org"   /></td>
          </tr>
          
        
<tr>
<td style="">Country: </td>
<td style=""><?Php get_conlist() ?></td>
</tr>

<tr>
<td style="">City: </td>
<td style=""><input type="text" id="city" class="validate[required]"  name="city"   /> </td>
</tr>

          
          
             <tr>
            <td style="">From(date): </td>
            <td style=""><input type="text" id="esdate" class="validate[required,custom[date]]" name="edate"   /></td>
          </tr>
          <tr>
            <td style="">To(date): </td>
            <td style=""><input type="text" id="eedate" class="validate[required,custom[date]]" name="sdate"   /></td>
          </tr>
          
          
          
          <tr>
            <td style="">Action:</td>
            <td style=""><input type="submit" id="submit" style=" height:25px"  name="Send" value="Add" onclick="javascript: appendRow('exptbl'); ">
<div id="result_mess"></div>

            </td>
          </tr>
           </table>
         <table  id="exptbl" class="jobs_TBL table">
         <tr  class="blue_head">
            <td id="to" height="20">Title </td>
             <td height="20">Company </td>
              <td height="20">Sdate </td>
               <td height="20">Edate </td>
                <td height="20">Action  </td>
          </tr>
    
          
          <?php  user::loadexp(); ?>


 </table>  
   
      </form>
     </div>
<div class="tab-pane fade in" id="info3">
    
    <form  ID="EDU" action="<?php echo HOME ?>/?user=addedu" ajaxform  >
        <table class="jobs_TBL table">
          <tr >
            <td   height="20" colspan="2"  class="small_txt"><span class="style6">
              &nbsp;&nbsp Education And Courses :  <span id="output3" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </span></td>
            
          </tr>
          <tr  class="blue_head">
            <td   colspan="2"> Education And Courses </td>
          </tr>
          <tr>
            <td style="">Subject/Major: </td>
            <td style=""><input type="text" id="etitle" class="validate[required]"  name="titleed"  /></td>
          </tr>
             <tr>
            <td style="">University: </td>
            <td style=""><input type="text" id="eorg" class="validate[required]"  name="orged"   /></td>
          </tr>
          
          
               
<tr>
<td style="">Country: </td>
<td style=""><?Php get_conlist() ?></td>
</tr>

<tr>
<td style="">City: </td>
<td style=""><input type="text" id="city" class="validate[required]"  name="city"   /> </td>
</tr>
          
             <tr>
            <td style="">Start date: </td>
            <td style=""><input type="text" id="esdate" class="validate[required,custom[date]]" name="edateed"   /></td>
          </tr>
          <tr>
            <td style="">Graduation Date: </td>
            <td style=""><input type="text" id="eedate" class="validate[required,custom[date]]" name="sdateed"   /></td>
          </tr>
          <tr>
            <td style="">Degree level: </td>
            <td style=""><input type="text" id="edtype" class="validate[required]" name="type"   /></td>
          </tr>
          
          
          <tr>
            <td style="">Action:</td>
            <td style=""><input type="submit" id="submit" style="height:25px"  name="Send" value="Add" ><div id="result_mess"></div>


            </td>
          </tr>
          <tr>
              
              <td colspan="2">
                   <table  id="edutbl" width="100%" class="jobs_TBL">
         <tr  class="blue_head">
            <td id="to" height="20">Title </td>
             <td height="20">Where </td>
              <td height="20">Sdate </td>
               <td height="20">Edate </td>
                <td height="20">Type  </td>
                <td height="20">Action  </td>
          </tr>
    
          
          <?php  user::loadedu(); ?>


 </table>  
              </td>
           
              
          </tr>
          
          
           </table>
        
   
      </form>
    
     </div>
   <div class="tab-pane fade in" id="info4">
    
       <form  ID="LANG" ajaxform action="<?php echo HOME ?>/?user=addlang" >
        <table  class="jobs_TBL table">
          <tr >
            <td   height="20" colspan="2"  class="small_txt"><span class="style6">
              &nbsp;&nbsp Language :  <span id="output3" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </span></td>
            
          </tr>
          <tr  class="blue_head">
            <td   colspan="2"> Languages </td>
          </tr>
          <tr>
            <td style="">Language Name: </td>
            <td style="">
            <select id="lang" name="lang">
             <option value="Dari">Dari</option> 
             	<option value="Pashto">Pashto</option>
               <option value="English">English</option>   
            <option value="Afrikaans">Afrikaans</option>
				   	<option value="Albanian">Albanian</option>
				   	<option value="Arabic">Arabic</option>
                   	<option value="Armenian">Armenian</option>
					
					<!-- Added Language Balochi by Khurram Mir[September 29,2010]-->
					<option value="Balochi">Balochi</option>
					
				   	<option value="Bulgarian">Bulgarian</option>
				   	<option value="Cantonese">Cantonese</option>
                   	<option value="Chinese">Chinese</option>
                   	<option value="Croatian">Croatian</option>
                   	<option value="Czech">Czech</option>
                  	<option  value="Danish">Danish</option>
                  	<option value="Dutch">Dutch</option>
                  
                 	<option value="Ethiopian">Ethiopian</option>
					<option value="Farsi">Farsi</option>
					<option value="Finnish">Finnish</option>
                  	<option value="French">French</option>
					<option value="German">German</option>
                  	<option value="Greek">Greek</option>
					<option value="Gujarati">Gujarati</option>	
                  	<option value="Hebrew">Hebrew</option>
                  	<option value="Hindi">Hindi</option>
                 	<option value="Hungarian">Hungarian</option>
                  	<option value="Indonesian">Indonesian</option>
                  	<option value="Italian">Italian</option>
                    <option value="Japanese">Japanese</option> 
                  					<option value="Korean">Korean</option>
				    <option value="Malay">Malay</option>
                    <option value="Malayalam">Malayalam</option>
                  	<option value="Mandarin">Mandarin</option>
				 	<option value="Marathi">Marathi</option>
					<option value="Norwegian">Norwegian</option>
					
							
					
					
					<option value="Polish">Polish</option>
                    <option value="Portuguese">Portuguese</option>
				  	<option value="Romanian">Romanian</option>
                  	<option value="Russian">Russian</option>
                  	<option value="Serbian">Serbian</option>
                  <option value="Sinhala">Sinhala</option>
                  <option value="Slovakian">Slovakian</option>
                  <option value="Slovenian">Slovenian</option>
                  <option value="Spanish">Spanish</option>
                  <option value="Swahili">Swahili</option>
                  <option value="Swedish">Swedish</option>
                  <option value="Tagalog">Tagalog</option>
				   <option value="Taiwanese">Taiwanese</option>
				  <option value="Tamil">Tamil</option>
                  <option value="Telugu">Telugu</option>              
                  <option value="Thai">Thai</option>
                  <option value="Turkish">Turkish</option>
                  <option value="Ukrainian">Ukrainian</option>
				  <option value="Urdu">Urdu</option>            
					
					<!-- Added new Language By Khurram Mir [September 29 2010]-->
					<option value="Uzbeki">Uzbeki</option>            
					
				  
                  <option value="Vietnamese">Vietnamese</option>
				<!-- End Sorted the Languges by Khurram Mir [September 29 2010]  -->
                </select>
            
            
       </td>
          </tr>
             <tr>
            <td style="">Level: </td>
            <td style=""><select name="level" id="llevel">
            <option value="Basic">Basic</option>
            <option value="Working Knowledge">Working Knowledge</option>
                       <option value="Fluent">Fluent</option>
            <option value="Native">Native</option>
            </select></td>
          </tr>
                     
          <tr>
            <td style="">Action:</td>
            <td style=""><input type="submit" id="submit" style=" height:25px"  name="Send" value="Add"><div id="result_mess"></div>


            </td>
          </tr>
          <tr>
              <td colspan="2">
              
                <table  id="langtbl" width="100%" class="jobs_TBL">
         <tr  class="blue_head">
            <td id="to" height="20">Language </td>
             <td height="20">Level </td>
             
                <td height="20">Action  </td>
          </tr>
    
          
          <?php  user::loadlang(); ?>


 </table>  
              
              </td>
          </tr>
           </table>
       
   
      </form>
    
     </div>
   <div class="tab-pane fade in" id="info5">
    
       <form  ID="ITR" ajaxform action="<?php echo HOME ?>/?user=addit" >
        <table class="jobs_TBL table">
          <tr >
            <td   height="20" colspan="2"  class="small_txt"><span class="style6">
              &nbsp;&nbsp Computer Skills :  <span id="output3" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </span></td>
            
          </tr>
          <tr  class="blue_head">
            <td   colspan="2"> Computer Skills </td>
          </tr>
          <tr>
            <td style="">Name: </td>
            <td style="">
    <input id="pname"  class="validate[required]"  name="pname">
            
            
       </td>
          </tr>
             <tr>
            <td style="">Level: </td>
            <td style=""><select name="plevel" id="llevel">
            <option value="Basic">Basic</option>
            <option value="Intermediate">Intermediate</option>
             <option value="Advanced">Advanced</option>
            <option value="Expert">Expert</option>
    
            </select></td>
          </tr>
                <tr>
            <td style="">Type: </td>
            <td style=""><select name="ptype" id="plevel">
            <option value="Office">Office</option>
            <option value="Graphic">Graphic</option>
            <option value="3D/Animation<">3D/Animation</option>
            <option value="Programming">Programming</option>
            <option value="Database">Database</option>
             <option value="Robotic">Robotic</option>
            <option value="Network">Network</option>
            <option value="Hardware">Hardware</option>
            </select></td>
          </tr>       
          <tr>
            <td style="">Action:</td>
            <td style=""><input type="submit" id="submit" style=" height:25px"  name="Send" value="Add" >
<div id="result_mess"></div>

            </td>
          </tr>
          
          
          <tr>
              <td colspan="2">
                  <table  id="langtbl" width="100%" class="jobs_TBL">
         <tr  class="blue_head">
            <td id="to" height="20">Name </td>
             <td height="20">Level </td>
             <td height="20">Type  </td>
                <td height="20">Action  </td>
          </tr>
    
          
          <?php  user::loadit(); ?>


         
        </table>
                  
                  
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
