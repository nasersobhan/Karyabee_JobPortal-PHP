<?php headers(); 	?>

    <title> Services | <?php echo PAGETITLE ?>  </title>
    
<tr>
    <td width="710px" valign="top">
 
 <div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Search For Service/Product</li>
 

</ul>
  <div class="TabbedPanelsContentGroup">
  
    <div class="TabbedPanelsContent">
    
   
      <table width="709px" border="0" align="center" cellpadding="0" class="blue_bg" cellspacing="0">
<tbody>

                    <?php 
if(isset($_POST['keyword'])){
	
		if ($_POST["keyword"] == "") {
              $name="IS NOT NULL";
           }else
           {
            $name= "like '%".$_POST["keyword"]."%'";
           }

           if ($_POST["type"] == "") {
              $type="IS NOT NULL";
           }else
           {
            $type= " like '%".$_POST["type"]."%'";
           }

	$search=" name $name and type $type and active=0 ";
	
	}else{
		$search=" active=0";
	}
$result2 = mysql_query("SELECT * FROM emp_service where $search");
			$all_rows2 = mysql_num_rows($result2);
			
			?>
                    <td   class="small_txt"><span class="style6"><strong><p> &raquo; Search Result : <?php echo $all_rows2 ?></p></strong></span></td>
                  </tr>
               
<tr>
<td   height="20"  class="small_txt">
  <form action="<?php echo HOME ?>/search/service" method="post" >
<input type="text" placeholder="Name." name="keyword">
<select name="type">
<option value="">Select Type</option>
<option value="pro">Products</option>
<option value="ser">Services</option>
</select>


<input type="submit"  value="Search">
</form>

</td>
     
                  </tr>               
               
                         
                  <tr class="blue_head">
 <td width="40%" height="20"  class="small_txt"><span class="style6"><strong>&nbsp;&nbsp;Service/Product Details</strong></span></td>
        
                  
                  </tr>
           
           
          
<?php

$sql = mysql_query("SELECT * FROM  emp_service where $search ORDER BY id DESC");

while($r = mysql_fetch_array($sql))
{
	
	$comid=$r['cid'];
	
	$qry="SELECT * FROM  sob_logemp where id='$comid'";
	$result1=mysql_query($qry);
	while($rx = mysql_fetch_array($result1))
  {
	  $cname=$rx['company'];

  }

$ccname = str_replace(" ", "-", $cname);
$ccname = str_replace("/", "-", $ccname);
$ccname = str_replace("&", "-", $ccname);
$ccname=strtolower($ccname);

$llink = str_replace(" ", "-", $r['name']);
$llink = str_replace("/", "-", $llink);
$llink = str_replace("&", "-", $llink);
$llink=strtolower($llink);
	?>
<tr >
<td height="20" style="padding:10px" class="small_txt">
&nbsp;&nbsp;» <?php echo $r['name'] ?> - <?php echo $cname?><br/>
 <?php echo $r['dis'] ?><hr/>
<a href="<?php echo HOME.'/'.$ccname.'/service/'.$r['id'].'/'.$llink ?>/" title="Go to service page" target="_blank"> Read More </a>
</td>


                </tr>    

<?php
}
?>
<tr>
<td ><?php ads(); ?> </td></tr>


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
