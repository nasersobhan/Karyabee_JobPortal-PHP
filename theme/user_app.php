<?php headers(); 
user::logix();


?>

    <title> Online Job Applications | <?php echo PAGETITLE ?>  </title>
    

    
    
   <ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#open" data-toggle="tab">Open</a></li>
<li><a href="#dec" data-toggle="tab">Declined</a></li>
<li><a href="#closed" data-toggle="tab">Closed</a></li>

   </ul>
   
   <div class="tab-content profile-tab-content" >
   
   
      <div class="tab-pane fade active in" id="open">
 





<table class="jobs_TBL table">


 <tr >
<td colspan="5"   height="20" colspan="4"  class="small_txt"><span class="style6"><strong>    <h1>




 &nbsp;&nbsp Online Job Applications
 </h1></strong></span></td>

</tr>
                  




<tr class="blue_head">
<td>Job Title</td>
<td>Organization</td>
<td>Closing Date</td>
<td>Date Applied</td>
<td>Status</td>
</tr>

<?php
$rid=J_ID;
$today=date('Y-m-d');
	$qry="SELECT * FROM  apply where rid='$rid' and edate >= '$today' and stat=1";
		$result2=mysql_query($qry);

while($r = mysql_fetch_array($result2))
  {
	  

if($r['stat']==1)
$stat='Pendding';	  
else if($r['stat']==0)
$stat='Rejected';
else if($r['stat']==2)
$stat='Accepted';	  
	  ?>

<tr >
<td><?php get_job($r['jid']) ?></td>
<td><?php get_com($r['cid']) ?></td>
<td><?php echo date("jS F Y ", strtotime($r['edate'])); ?></td><td><?php echo Agotime($r['adate']);  ?></td>
<td><?php echo $stat ?></td>
</tr>

<?php } ?>
</table>

 
    </div>
  <div class="tab-pane fade in" id="dec">
 
<table class="jobs_TBL table">


 <tr >
<td  colspan="5"    height="20" colspan="4"  class="small_txt"><span class="style6"><strong>    <h1>




 &nbsp;&nbsp Online Job Applications(Declined)
 </h1></strong></span></td>

</tr>
                  




<tr class="blue_head">
<td>Job Title</td>
<td>Organization</td>
<td>Closing Date</td>
<td>Date Applied</td>
<td>Status</td>
</tr>

<?php
$rid=J_ID;
$today=date('Y-m-d');
	$qry="SELECT * FROM  apply where rid='$rid'and edate >= '$today' and stat=0 ";
		$result2=mysql_query($qry);

while($r = mysql_fetch_array($result2))
  {
	  

if($r['stat']==1)
$stat='Pendding';	  
else if($r['stat']==0)
$stat='Rejected';
else if($r['stat']==2)
$stat='Accepted';	  
	  ?>

<tr >
<td><?php get_job($r['jid']) ?></td>
<td><?php get_com($r['cid']) ?></td>
<td><?php get_job($r['jid']) ?></td>
<td><?php echo date("jS F Y ", strtotime($r['adate']));  ?></td>
<td><?php echo $stat ?></td>
</tr>

<?php } ?>
</table>
     
    </div>
 <div class="tab-pane fade in" id="closed">
    
    
 
 
<table class="jobs_TBL table">


 <tr >
<td  colspan="5"    height="20" colspan="4"  class="small_txt"><span class="style6"><strong>    <h1>




 &nbsp;&nbsp Online Job Applications(Closed)
 </h1></strong></span></td>

</tr>
                  




<tr class="blue_head">
<td>Job Title</td>
<td>Organization</td>
<td>Closing Date</td>
<td>Date Applied</td>
<td>Status</td>
</tr>

<?php
$rid=J_ID;
$today=date('Y-m-d');
	$qry="SELECT * FROM  apply where rid='$rid' and edate < '$today'";
		$result2=mysql_query($qry);

while($r = mysql_fetch_array($result2))
  {
	  

if($r['stat']==1)
$stat='Pendding';	  
else if($r['stat']==0)
$stat='Rejected';
else if($r['stat']==2)
$stat='Accepted';	  
	  ?>

<tr >
<td><?php get_job($r['jid']) ?></td>
<td><?php get_com($r['cid']) ?></td>
<td><?php get_job($r['jid']) ?></td>
<td><?php echo date("jS F Y ", strtotime($r['adate']));  ?></td>
<td><?php echo $stat ?></td>
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
