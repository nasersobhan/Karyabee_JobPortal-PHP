<?php headers(); 	?>

    <title> Afghan Phone Directory | <?php echo PAGETITLE ?>  </title>
    
<tr>
    <td width="710px" valign="top">
 
 <div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Search Phone Directory</li>
 

</ul>
  <div class="TabbedPanelsContentGroup">
  
    <div class="TabbedPanelsContent">
    
   
      <table width="709px" border="0" align="center" cellpadding="0" class="blue_bg" cellspacing="0">
<tbody>
<tr><td  colspan="3" height="20"  class="small_txt"><span class="style6"><strong><h2> &nbsp;&nbsp Search The Phone Directory</h2></strong></span></td>
                    <?php 
if(isset($_POST['names'])){
	
		if ($_POST["names"] == "") {
              $name="IS NOT NULL";
           }else
           {
            $name= "like '%".$_POST["names"]."%'";
           }

               if ($_POST["sect"] == "") {
              $sect="IS NOT NULL";
           }else
           {
            $sect= "like '%".$_POST["sect"]."%'";
           }


                if ($_POST["count"] == "") {
              $count="IS NOT NULL";
           }else
           {
            $count= " like '%".$_POST["count"]."%'";
           }

	$search=" name $name and type $sect and count $count and active=0 ";
	
	}else{
		$search=" active=0";
	}
$result2 = mysql_query("SELECT * FROM dir_phone where $search");
			$all_rows2 = mysql_num_rows($result2);
			
			?>
                    <td   class="small_txt"><span class="style6"><strong><p> &raquo; Search Result : <?php echo $all_rows2 ?></p></strong></span></td>
                  </tr>
               
<tr>
<td  colspan="4" height="20"  class="small_txt">
<form action="<?php echo HOME ?>/search/phone" method="post" >
<input type="text" placeholder="Name,Title .etc" name="names">
<input type="sect" placeholder="type,sector .etc" name="sect">
<input type="count" placeholder="Country" name="count">
<input type="submit"  value="Search">
</form>

</td>
     
                  </tr>               
               
                         
                  <tr class="blue_head">
 <td width="40%" height="20"  class="small_txt"><span class="style6"><strong>&nbsp;&nbsp;Name</strong></span></td>
                    <td width="23%" height="20"  class="small_txt"><span class="style6"><strong>Sector</strong></span></td>
                    <td width="10%" height="20"  class="small_txt"><span class="style6"><strong>Phone</strong></span></td>
                     <td width="18%" height="20"  class="small_txt"><span class="style6"><strong>Place</strong></span></td>
                  
                  </tr>
           
           
          
<?php

$sql = mysql_query("SELECT * FROM  dir_phone where $search ORDER BY id DESC");

while($r = mysql_fetch_array($sql))
{
	?>
<tr >
<td height="20" class="small_txt">&nbsp;&nbsp;» <?php echo $r['name'] ?></td>
<td height="20" class="small_txt"><?php echo $r['type'] ?></td>
<td height="20" class="small_txt"><?php echo $r['phone1'] ?></td>
<td height="20" class="small_txt"><?php echo $r['city'] ?>, <?php echo $r['count'] ?></td>

                </tr>    

<?php
}
?>
<tr>
<td colspan="4"><?php ads(); ?> </td></tr>


</tbody></table> 
    
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
