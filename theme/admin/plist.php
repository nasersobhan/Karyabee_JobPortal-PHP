<?php headers(); 	emp::alogi();?>

    <title> Phone list | <?php echo PAGETITLE ?>  </title>
    
<tr>
    <td width="710px" valign="top">
 
 <div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Phone list</li>
 

</ul>
  <div class="TabbedPanelsContentGroup">
  
    <div class="TabbedPanelsContent">
    
  
        <table width="709px" class="jobs_TBL">
          <tr >
            <td   height="20" colspan="4"  class="small_txt"><span class="style6">
              &nbsp;&nbsp Phone list :  <span id="output3" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </span></td>
            
          </tr>
          
        
          
          <tr  class="blue_head">
            <td style="">Name </td>
            <td style="">phone</td>
            <td style="">Category</td>
            <td style="">Actions</td>
          </tr>
          
<?php $max = 100;

$sql = mysql_query("SELECT * FROM  dir_phone ORDER BY id DESC LIMIT $max");

while($r = mysql_fetch_array($sql))
{
if($r['active']==1){
	$col='green';
	$text='Active';
	}else{
	$col='red';
	$text='Suspend';
	}	
	
	?>

<tr id="<?php echo $r['id'];?>">
            <td style=""><?php echo $r['name'];?> </td>
            <td style=""><?php echo $r['phone1'];?></td>
            <td style=""><?php echo $r['type'];?></td>
            <td style="">
            <form style=" display:inline-block">
            
               <input type="button" onclick="javascript: formget(this.form, '<?php echo HOME ?>/?admin=pdl&pid=<?php echo $r['id']; ?>'); delet('<?php echo $r['id']; ?>');"  name="Send" value="delete" ></form>
             <form style=" display:inline-block">
              <input style="color:<?php echo $col ?>" type="button" onclick="javascript: formget(this.form, '<?php echo HOME ?>/?admin=psus&pid=<?php echo $r['id']; ?>&t=<?php echo $r['active']; ?>');"   value="<?php echo $text ?>" ></form>
            
            
            </td>
          </tr>




<?php
}
?>



   
 </table>  
   
      </form>
    
    </div>
   
</div>
</div>
<script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script>
 
 



    </td>
    <td width="237px" valign="top"> <?php showsidebar() ?></td>
  </tr>
 
    
    
    
    
    
    
    
    
    
    





     
   


<?php footer() ?>
