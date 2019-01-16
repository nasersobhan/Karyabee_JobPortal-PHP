<?php headers() ?>

    <title>Post A New Job </title>
    

 
  <?php        
                  if(C_CRD<COST){
?>
    
<meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/crd">
<script type="text/javascript">

  alert("<?php echo CRIDETMSG ?>");

</script>
<?php
}
else{?>	
         
      

   
   <div class="tab-content profile-tab-content" style="padding-top:43px" >



<div class="tab-pane fade active in" id="jobs">
             
                  
                  
                  <form id="addjob" ajaxform action="<?php echo HOME ?>/?emp=added" method="post" >




<table class="jobs_TBL table">








   <tr >
<td   height="20" colspan="2"  class="small_txt"><span class="style6"><strong><h1> &nbsp;&nbsp Add New Job Announcement 
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

<td><input type="text" id="title" requireds name="title" pacehokder="Job Title" /> </td>



</tr>





<tr>

<td>Category: </td>

<td>



<?php get_catelist() ?> 



</td>

</tr>



<tr>
<td>Duration:</td>
<td><input type="text" value="Permanent" name="dur"  /> </td>
</tr>





<tr>
<td>Gender:   </td>
<td>
 <select name="gender">
<option value="Male/Female">Male/Female</option>
  <option value="Male">Male</option>

  <option value="Female">Female</option>

  
</select>
 </td>
</tr>




<tr>
<td>Salary Rang:</td>
<td>
<input type="text" name="slrang" value="Salary is negotiable." ID="slrang" class="required" />
 </td>

</tr>


<!---
<tr>
<td>Anounced date:</td>
<td> 
-->
<input type="hidden" value="<?php echo date('Y/m/d') ?>" name="adate" class="validate[custom[date]] text-input" />  

<!--
</td>



</tr>
--->


<tr>

<td>Expiry date:</td>

<td >

 <input type="date" value="" name="edate"  class="validate[custom[date]] text-input" />



</td>



</tr>





<tr>

<td>Nationality :</td>

<td>



 <select name="nation">

  <option value="Local">Local</option>

  <option value="Regional">Regional</option>

  <option value="International">International</option>

</select>



</td>



</tr>



<tr>

<td>Jobs no:</td>

<td> <input type="text" value="1" class="validate[custom[number]] text-input" name="jobno" /> </td>



</tr>



<tr>

<td>Job Type:</td>

<td>



 <select name="jobtyp">

  <option value="Full Time">Full Time</option>

  <option value="Part Time">Part Time</option>

  <option value="Night Time">Night Time</option>

</select>

 </td>

</tr>



<tr>

<td>Shift:</td>

<td>



 <select name="shift">

  <option value="Full Time">Full Time</option>


  <option value="Night Time">Part Time</option>

</select>

 </td>

</tr>







 <tr>

<td>Job status:</td>

<td>

        <select name="stat">

  <option value="Interviewing">Interviewing</option>

  <option value="Female">Shortlisted</option>





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
<?php get_orglist('all') ?>
</td>
</tr>
<?php } else { ?> <input id="org" type="hidden" name="org" value="<?php echo $_SESSION['C_ID'] ?>"  />  <?php } ?>

<tr>
<td>Location: </td>
<td><input id="location" type="text" name="location"  /> </td>
</tr>

<tr>
<td>City: </td>
<td>
<?php get_citylist(1)?> 
</td>
</tr>

<input type="hidden" name="count" />
<!---
<tr>
<td>Country:</td>
<td>
<?Php get_conlist() ?>
</td>
</tr>
--->

<tr class="blue_head">
<td  colspan="2">

Qualification:

</td>
</tr>

<tr>

<td>Education: </td>

<td><input type="text" id="education" name="education" class="validate[required] text-input"  /> </td>

</tr>

<tr>
<td>Experience:   </td>
<td><input type="text" name="exper"  value="2" ID="exper"  class="w100" style="width:100px; float:left" />&nbsp;Year
 </td>
</tr>



<tr>

<td style="vertical-align:top;">Qualifications:</td>

<td>
<textarea data-widearea="enable" name="qualifications" rows="7"></textarea>

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
<textarea name="repons" data-widearea="enable" id="repons" rows="7"></textarea>

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
<textarea name="guid" data-widearea="enable" rows="7"></textarea>

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

</form> <?php } ?>


    </td>
    <?php showsidebar() ?>
  </tr>
 


<?php footer() ?>