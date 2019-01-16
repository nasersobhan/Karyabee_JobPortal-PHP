<?php headers(); 
	emp::logi();
?>

    <title> Online Job Applications | <?php echo PAGETITLE ?>  </title>
    

     
     <ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#jobs" data-toggle="tab">Open</a></li>
    <li><a href="#dec" data-toggle="tab">Declined</a></li>

   </ul>
   
   <div class="tab-content profile-tab-content" >



<div class="tab-pane fade active in" id="jobs">
    
 
 



<table class="jobs_TBL table">


 <tr >
<td   height="20" colspan="4"  class="small_txt"><span class="style6"><strong>    <h1>




 &nbsp;&nbsp Online Job Applications
 </h1></strong></span></td>

</tr>
                  




<tr class="blue_head">
<td>Job Title</td>
<td>Resume</td>
<td>Degree</td>
<td>Closing Date</td>
<td>Actions</td>
</tr>

<?php
$cid=C_ID;

	$qry="SELECT * FROM  apply where cid='$cid' and stat=1";
		$result2=mysql_query($qry);

while($r = mysql_fetch_array($result2))
  {
	  

	  ?>

<tr id="<?Php echo $r['id'] ?>" >
<td><?php get_job($r['jid']) ?></td>
<td><?php get_resume($r['rid']) ?></td>
<td><?php get_element('sob_resume',$r['rid'],'hstedu') ?></td>
<td><?php echo date("jS F Y ", strtotime($r['adate']));  ?></td>
<td>
    <form action="<?php echo HOME ?>/?emp=rejec&id=<?php echo $r['id']; ?>" method="POST" ajaxform>
 <input type="submit" class="btn btn-warning" id="submit"  onclick="javascript: delet('<?php echo $r['id']; ?>');"  name="Send" value="  Decline" >
</form>

</td>
</tr>

<?php } ?>


</table>

 
    </div>
<div class="tab-pane fade in" id="dec">    
 
<table  class="jobs_TBL table">


 <tr >
<td   height="20" colspan="4"  class="small_txt"><span class="style6"><strong>    <h1>




 &nbsp;&nbsp Online Job Applications(Declined)
 </h1></strong></span></td>

</tr>
                  




<tr class="blue_head">
<td>Job Title</td>
<td>Resume</td>
<td>Degree</td>
<td>Closing Date</td>
<td>Actions</td>
</tr>

<?php

$rid=$_SESSION['C_CRD'];
$today=date('Y-m-d');
	$qry="SELECT * FROM   apply where cid='$cid' and stat=0";
		$result2=mysql_query($qry);

while($r = mysql_fetch_array($result2))
  {
	  

	  ?>

<tr id="<?Php echo $r['id'] ?>" >
<td><?php get_job($r['jid']) ?></td>
<td><?php get_resume($r['rid']) ?></td>
<td><?php get_element('sob_resume',$r['rid'],'hstedu') ?></td>
<td><?php echo date("jS F Y ", strtotime($r['adate']));  ?></td>
<td>

Declined

</td>
</tr>


<?php } ?>
</table>
     
    </div>
    
</div>
</div>



    </td>
   <?php showsidebar() ?>
  </tr>
 
    
    
    
    
    
    
    
    
    
    





     
   


<?php footer() ?>
