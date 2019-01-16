<?php
//controll;

emp::logi();


$postid = is_get('eid');
global $emp;
if(is_post('title')){
    
    $_POST['place'] = implode(')|(', $_POST['place']);
    
  $emp->updateAjob($postid,$_POST);  
  echo 'Updated Successfully';
  $_SESSION['msg'] = 'Edited Successfuly!';
  redirect_to(get_current_url());
  exit();
  
}else{
    $post = $emp->getAjob($postid);
}
?>


<?php headers() ?>

    <title>Post A New Job </title>
    

 
  <?php        
                  if(C_CRD<COST){
                    
?>
<script type="text/javascript">

  alert("<?php echo CRIDETMSG ?>");

</script>
<?php
  redirect_to(HOME."/emp/crd");
  exit();
}
?>	
         
      

   
   <div class="tab-content profile-tab-content" style="padding-top:0px" >



<div class="tab-pane fade active in" id="jobs">
             
                  
                  
                  <form id="addjob" ajaxform action="<?php echo get_current_url() ?>" method="post" >




<table class="jobs_TBL table">








   <tr >
<td   height="20" colspan="2"  class="small_txt"><span class="style6"><strong><h1> &nbsp;&nbsp Edit Job Announcement 
 </h1></strong></span>
</td>
</tr>

<tr  class="blue_head">
<td width="650"  colspan="2">

Job Detials:

</td>
</tr>

<tr>

<td class="w300">Title: </td>

<td><input type="text" id="title" value="<?php pri_title() ?>" requireds name="title" pacehokder="Job Title" /> </td>



</tr>





<tr>

<td>Category: </td>

<td>



<?php get_catelist(get_cate()) ?> 



</td>

</tr>



<tr>
<td>Duration:</td>
<td><input type="text" value="<?php pri_dur() ?>"  name="dur"  /> </td>
</tr>





<tr>
<td>Gender:   </td>
<td>
 <select name="gender">
<option <?php is_selected(get_gender(),'Any') ?> value="Any">Any</option>
  <option <?php is_selected(get_gender(),'Male') ?> value="Male">Male</option>

  <option <?php is_selected(get_gender(),'Female') ?> value="Female">Female</option>

  
</select>
 </td>
</tr>




<tr>
<td>Salary Rang:</td>
<td>
<input type="text" name="slrang" value="<?php pri_slrang() ?>" ID="slrang" class="required" />
 </td>

</tr>

<tr>

<td>Expiry date:</td>

<td >

 <input type="date" value="<?php pri_edate() ?>" name="edate"  class="validate[custom[date]] text-input" />



</td>



</tr>





<tr>

<td>Nationality :</td>

<td>



 <select name="nation">

  <option <?php is_selected(get_nation(),'Local') ?> value="Local">Local</option>

  <option <?php is_selected(get_nation(),'Regional') ?> value="Regional">Regional</option>

  <option <?php is_selected(get_nation(),'International') ?> value="International">International</option>

</select>



</td>



</tr>



<tr>

<td>Jobs no:</td>

<td> <input type="text" value="<?php pri_jobno() ?>" class="validate[custom[number]] text-input" name="jobno" /> </td>



</tr>



<tr>

<td>Job Type:</td>

<td>



 <select name="jobtyp">

  <option <?php is_selected(get_jobtyp(),'Full Time') ?> value="Full Time">Full Time</option>

  <option <?php is_selected(get_jobtyp(),'Part Time') ?> value="Part Time">Part Time</option>

  <option <?php is_selected(get_jobtyp(),'Night Time') ?> value="Night Time">Night Time</option>

</select>

 </td>

</tr>



<tr>

<td>Shift:</td>

<td>



 <select name="shift">

  <option <?php is_selected(get_shift(),'Full Time') ?> value="Full Time">Full Time</option>


  <option <?php is_selected(get_shift(),'Before noon') ?> value="Before noon">Before noon</option>
<option <?php is_selected(get_shift(),'afternoon') ?> value="afternoon">afternoon</option>
</select>

 </td>

</tr>







 



<tr class="blue_head">
<td   colspan="2">

Location:

</td>
</tr>



<?php if(C_RANK==1){ ?>
<tr>
<td style="">Organization: </td>
<td>
<?php get_orglist('all',get_org()) ?>
</td>
</tr>
<?php } ?>

<tr>
<td>Location: </td>
<td><input id="location" value="<?php pri_location() ?>" type="text" name="location"  /> </td>
</tr>

<tr>
<td>City: </td>
<td>
<?php get_citylist(1,explode(')|(',get_place()))?> 
</td>
</tr>



<tr class="blue_head">
<td  colspan="2">

Qualification:

</td>
</tr>

<tr>

<td>Education: </td>

<td><input type="text" value="<?php pri_education() ?>" id="education" name="education" class="validate[required] text-input"  /> </td>

</tr>

<tr>
<td>Experience:   </td>
<td><input type="text" name="exper"  value="<?php pri_exper() ?>" ID="exper"  class="w100" style="width:100px; float:left" />&nbsp;Year
 </td>
</tr>



<tr>

<td style="vertical-align:top;">Qualifications:</td>

<td>
<textarea data-widearea="enable" name="qualifications" rows="7"><?php pri_qualifications() ?></textarea>

  </td>



</tr>


<tr class="blue_head">
<td  colspan="2">

Duties & Responsibilities:

</td>
</tr>
<tr>

<td></td>

<td>
<textarea name="repons" data-widearea="enable" id="repons" rows="7"><?php pri_repons() ?></textarea>

  </td>



</tr>



<tr class="blue_head">
<td  colspan="2">

Submission Guideline:

</td>
</tr>

<tr>



<tr>

<td>Submission Guideline:</td>

<td>
<textarea name="guid" data-widearea="enable" rows="7"><?php pri_guid() ?></textarea>

  </td>



</tr>






<tr>

<td style="">Action:</td>

<td style="">
<button type="submit" class="btn btn-default">Submit Form</button>
<span id="result_mess" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp;
				</span>

  </td>



</tr>

</table>

                  </form>


    </td>
    <?php showsidebar() ?>
  </tr>
 


<?php footer() ?>