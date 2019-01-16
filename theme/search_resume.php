<?php headers(); 	?>

    <title> Resume Directory | <?php echo PAGETITLE ?>  </title>
    
<tr>
    <td width="710px" valign="top">
 
 <div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Search Resume</li>
 

</ul>
  <div class="TabbedPanelsContentGroup">
  
    <div class="TabbedPanelsContent">
    
   
      <table width="709px" border="0" align="center" cellpadding="0" class="blue_bg" cellspacing="0">
<tbody>
<tr>

                    <?php 
					
			
if(isset($_POST["name"])){
		if ($_POST["name"] == "") {
              $name="IS NOT NULL";
           }else
           {
            $name= "like '%".$_POST["name"]."%'";
           }

               if ($_POST["skill"] == "") {
              $skill="IS NOT NULL";
           }else
           {
            $skill= "like '%".$_POST["skill"]."%'";
           }
     if ($_POST["deg"] == "") {
              $deg="IS NOT NULL";
           }else
           {
            $deg= "like '%".$_POST["deg"]."%'";
           }

                if ($_POST["city"] == "") {
              $city="IS NOT NULL";
           }else
           {
            $city= " like '%".$_POST["city"]."%'";
           }


	$search=" fullname $name and city $city and keyf $skill and hstedu $deg and active=0";
	
	}else{
		$search="  active=0";
	}
$result2 = mysql_query("SELECT * FROM sob_resume where $search");
			$all_rows2 = mysql_num_rows($result2);
			
			?>
                    <td   class="small_txt"><span class="style6"><strong><h1 style=" display:inline"> &nbsp;&nbsp Search CV Directory</h1></strong></span><span class="style6"><strong><p style=" display:inline"> &raquo; Search Result : <?php echo $all_rows2 ?></p></strong></span></td>
                  </tr>
               
<tr>
<td  height="20"  class="small_txt">
<form action="<?php echo HOME ?>/search/resume" method="post" >
<input type="text" placeholder="Search name" name="name">
<input type="sect" placeholder="Skill Key" name="skill">
<select id="deg" name="deg">
<option value="">Select Degree</option>
<option value="High School">High School</option>

<option value="Diploma">Diploma</option>

<option value="Bachelor">Bachelor</option>

<option value="Master">Master</option>

<option value="Ph.D">Ph.D</option>

</select>
 
<?php  get_citylist('all') ?>

<input type="submit" value="Search">
</form>

</td>
     
              
				  
           
           
          
<?php 
$max=20;
$sql = mysql_query("SELECT * FROM  sob_resume where $search ORDER BY id DESC LIMIT $max");
while($r = mysql_fetch_array($sql))

{
	  
   ?>

    </tr>               
 <tr class="blue_head">
<td width="40%" height="20"  class="small_txt"><span class="style6"><strong>&nbsp;&nbsp;<?php echo $r['fullname']?> </strong></span></td>
</tr>

    </tr>               
 <tr >
<td style=" padding:10px"  class="small_txt">

Living : <?php echo $r['city']?>, <?php get_element('sob_jobs_count',$r['count'],'name')?>. <br/>
Degree : <?php echo $r['hstedu']?>. <br/>
Major : <?php echo $r['feild']?>. <br/>
Functional Area : <?php get_element('sob_jcate',$r['cate'],'catename') ?>. <br/>
Years Of Experience: <?php echo $r['totlex']?> Years.<br/>
<hr/>
<a target="_blank" href="<?php get_re_link($r['id'])?>" title="View <?php echo $r['fullname']?>'s CV link">View Online Resume</a>
|
<a target="_blank" href="mailto:<?php echo $r['pem']?>" title="Send emaiil to <?php echo $r['fullname']?>">Send him an email</a>

</td>
</tr>

  



<?php
}
?>
<tr>
<td><?php ads(); ?> </td></tr>


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
