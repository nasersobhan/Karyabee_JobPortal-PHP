<?php headers(); 	?>

    <title> Company Search | <?php echo PAGETITLE ?>  </title>
  <ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#jobs" data-toggle="tab">Search a Company</a></li>

   </ul>
   
   <div class="tab-content profile-tab-content" >



<div class="tab-pane fade active in" id="jobs">
    
   
      <table align="center"class="blue_bg table">
<tbody>
<tr>
                    <?php 
					
				$today=date('Y-m-d');
if(isset($_POST['keyword'])){
		if ($_POST["keyword"] == "") {
              $key="IS NOT NULL";
           }else
           {
            $key= "like '%".$_POST["keyword"]."%'";
           }

               if ($_POST["city"] == "") {
              $city="IS NOT NULL";
           }else
           {
            $city= "like '%".$_POST["city"]."%'";
           }


                if ($_POST["cate"] == "") {
              $cate="IS NOT NULL";
           }else
           {
            $cate= " like '%".$_POST["cate"]."%'";
           }


	$search=" company $key and city $city and cate $cate and active=0 ";
	
	}else{
		$search=" active=0 ";
	}
$result2 = mysql_query("SELECT * FROM  sob_logemp where $search");
			$all_rows2 = mysql_num_rows($result2);
			
			?>
                    <td   class="small_txt"><span class="style6"><strong><strong><h2 style=" display:inline"> &nbsp;&nbsp Search For Company</h2></strong>- &raquo; Search Result : <?php echo $all_rows2 ?></strong></span></td>
                  </tr>
               
<tr>
<td   height="20"  class="small_txt">
    <form class="form-inline" action="<?php echo HOME ?>/search/company" method="post" >
     <div class="form-group">
<input  type="text" placeholder="Name." name="keyword"></div>
<?php get_cilist('1') ?>
<?php get_catelist() ?>

<input type="submit"  value="Search">
</form>
</td>
     
                  </tr>               
          
           
           
          
<?php 

$sql = mysql_query("SELECT * FROM  sob_logemp where $search ORDER BY id DESC limit 50");
while($r = mysql_fetch_array($sql))

{
	




$city=strtolower($r['company']);
$city = str_replace(" ", "-", $city);
$city = str_replace("/", "-", $city);
$city = str_replace("&", "-", $city);
 
   ?>

     
<tr class="blue_head">
<td width="40%" height="20"  class="small_txt"><span class="style6"><strong>&nbsp;&nbsp;» <?php echo $r['company'] ?> - <?php echo $r['city'] ?></strong></span></td>
</tr>
				  


  
				<tr >
				  
<td height="20" style="padding:10px; line-height:2"  class="small_txt">
Company Name: <strong><?php echo $r['company'] ?></strong><br/>
Industry type:<strong> <?php get_element('sob_jcate',$r['cate'],'catename') ?></strong><br/>
Main Office: <strong><?php echo $r['city'] ?>, <?php get_element('sob_jobs_count',$r['con'],'name')?></strong><br/>
Contact Number : <strong><?php echo $r['phone'] ?></strong>

<hr/>
<a title="Profile of <?php echo $r['company'] ?>" href="<?php echo HOME.'/'.$r['id'].'/profile/'.$city ?>/"> Profile </a> 

<?php if(!$r['website']=="") { ?>
| <a title="website of <?php echo $r['company'] ?>" target="_blank" href="<?php echo HOME ?>?goto=<?php echo $r['website'] ?>"> <?php echo $r['website'] ?> </a>
<?php } ?> | <a title="Send an email to <?php echo $r['company'] ?>" href="mailto:<?php echo $r['pemail'] ?>"> <?php echo $r['pemail'] ?> </a>
</td>
              
                </tr>    
				    









<?php
}
?>
<tr>
<td  ><?php ads(); ?> </td></tr>


</tbody></table> 
    
    </div>
   
</div>
</div>




    </td>
   <?php showsidebar() ?>
  </tr>
<?php footer() ?>
