<?php headers() ?>

    <title> Download - Karyabee Job Portal </title>


   
   <div class="tab-content profile-tab-content" >
   <div class="tab-pane fade active in" id="info">
                                
<table class="jobs_TBL table">

 <tr >
<td colspan="3"  height="20"  class="small_txt"><span class="style6"><strong>    <h2>Downloads</h2></strong></span></td>

</tr>
   


 <tr class="blue_head">
<td>Name</td>
 <td >Format</td>
  <td>Download link</td>
</tr>




<tr class="btn-default btn-lg">
<td colspan="3">Resume/CV Templates</td>
</tr>
<?php 
$log_directory ="templates/cv";
$files = (glob($log_directory.'/*.*'));
$i=1;
foreach ($files as &$value) {
    
    
    $ext = pathinfo($value, PATHINFO_EXTENSION);
    $name = str_replace('.'.$ext,'',basename($value));
    $name = str_replace('-',' ',$name);
    $name = $i.'-'.trim(str_replace(range(0,9),'',$name));
     echo "<tr ><td>".$name."</td>
 <td >".$ext."</td> <td><a href='".HOME."/".$value."'><span class='btn btn-info'><i class='fa fa-download'></i> Download</span></a></td></tr>";
     $i++;
}
?>









<tr class="btn-default btn-lg">
<td colspan="3">Cover letter Templates</td>
</tr>
<?php 
$log_directory ="templates/coverletter";
$files = (glob($log_directory.'/*.*'));
$i=1;
foreach ($files as &$value) {
    
    
    $ext = pathinfo($value, PATHINFO_EXTENSION);
    $name = str_replace('.'.$ext,'',basename($value));
    $name = str_replace('-',' ',$name);
    $name = $i.'-'.trim(str_replace(range(0,9),'',$name));
     echo "<tr ><td>".$name."</td>
 <td >".$ext."</td> <td><a href='".HOME."/".$value."'><span class='btn btn-info'><i class='fa fa-download'></i> Download</span></a></td></tr>";
     $i++;
}
?>





<tr class="btn-default btn-lg">
<td colspan="3">Other forms</td>
</tr>
<?php 
$log_directory ="templates/forms";
$files = (glob($log_directory.'/*.*'));
$i=1;
foreach ($files as &$value) {
    
    
    $ext = pathinfo($value, PATHINFO_EXTENSION);
    $name = str_replace('.'.$ext,'',basename($value));
    $name = str_replace('-',' ',$name);
    $name = $i.'-'.trim(str_replace(range(0,9),'',$name));
     echo "<tr ><td>".$name."</td>
 <td >".$ext."</td> <td><a href='".HOME."/".$value."'><span class='btn btn-info'><i class='fa fa-download'></i> Download</span></a></td></tr>";
     $i++;
}
?>

<tr class="btn-default btn-lg">
<td colspan="3">Template Link</td>
</tr>
<tr ><td colspan="2">All USAID Form</td>
    <td><a target="_blank" href="http://www.usaid.gov/forms"><span class='btn btn-info'><i class='fa fa-download'></i> Open</span></a></td></tr>




</table>

</div></div></div>


    </td>
   <?php showsidebar() ?>
  </tr>
 
    
    
    
    
    
    
    
    
    
    





     
   


<?php footer() ?>
