<?php headers(); ?>


 <title> Job Search | <?php echo PAGETITLE ?>  </title>
 <?php $today=date('Y-m-d');
if(isset($_POST['keyword'])){
		if ($_POST["keyword"] == "") {
              $key="IS NOT NULL";
           }else
           {
            $key= "like '%".mycu($_POST["keyword"])."%'";
           }

               if (($_POST["city"]) == "") {
              $city="IS NOT NULL";
           }else
           {
            $city= "like '%".mycu($_POST["city"])."%'";
           }
if ($_POST["cate"] == "") {
              $cate="IS NOT NULL";
           }else
           {
            $cate= " like '%".mycu($_POST["cate"])."%'";
           }


	$search=" title $key and place $city and cate $cate and pend=0 and  edate >= '$today' ";
	
	}else{
		$search=" pend=0 and  edate >= '$today'";
	}
$result2 = mysql_query("SELECT * FROM sob_jobs where $search limit 50");
			$all_rows2 = mysql_num_rows($result2);?>
<ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#jobs" data-toggle="tab">Jobs Search Result (<?php echo $all_rows2 ?>)</a></li>
 
   </ul>
 
 
  <div class="tab-content profile-tab-content" >



<div class="tab-pane fade active in" id="jobs">

   

   
      <table class="jobs_TBL table" id="searchjobs"  >
 <tbody>
      <tr>
        <td colspan="5" class="h20"  ><span class="style6"><strong><h2> &nbsp;&nbsp Search Jobs</h2></strong></span></td>
                   
                    
                  </tr>
               
<tr>
<td  colspan="5" height="20"  class="small_txt">
<form role="form" class="form-inline" action="<?php echo HOME ?>/search/job" method="post" >
 <div class="form-group">
            		<label class="sr-only" for="s_keyword">Keyword</label>
<input type="text" placeholder="Title etc." class="form-control" name="keyword"></div>
<?php get_cilist('1') ?>
<?php get_catelist_search() ?>
  <button type="submit" class="btn btn-default">Search</button>
</form>

</td>
     
                  </tr>               
             <tr class="blue_head">
        <td  class="h20 w300"  ><span class="style6"><strong>&nbsp;&nbsp;Job Title</strong></span></td>
        <td class="w250"  ><span class="style6"><strong>Organization</strong></span></td>
        <td class="w100"  ><span class="style6"><strong>City</strong></span></td>
        <td class="w100"  ><span class="style6"><strong>Exp.</strong></span></td>
        <td  class="w150"  ><span class="style6"><strong>Clos. Date</strong></span></td>
       </tr>
           
           
          
<?php 

$sql = mysql_query("SELECT * FROM  sob_jobs where $search ORDER BY id DESC");
while($r = mysql_fetch_array($sql))

{
	$cid= $r['cate'];
$qry="SELECT catename FROM sob_jcate where id=$cid";
	$result2=mysql_query($qry);
	
while(list($subject)= mysql_fetch_row($result2))
{
 $fun=  $subject;
} 
$fun = str_replace(" ", "-", $fun);
$fun = str_replace("/", "-", $fun);
$fun = str_replace("&", "-", $fun);
$fun=strtolower($fun);
$city=strtolower($r['place']);


$org=$r['org'];
$qry="SELECT * FROM  sob_logemp where id='$org'";
		$result2=mysql_query($qry);
while($row = mysql_fetch_array($result2))
  {
$orgn2=$row['company'];  
$orgn=strtolower($orgn2);
$orgn = str_replace(" ", "-", $orgn);
$orgn = str_replace("/", "-", $orgn);
$orgn = str_replace("&", "-", $orgn);
  }  
   ?>




        <tr >
       <td class="h20"  >
<a title="<?php echo $r['title'].' Position with '.$orgn2 ?>" href="<?php echo HOME.'/'.$fun.'/'.$r['id'].'/'.$r['slug'] ?>">
&nbsp;»&nbsp;<?php  limite_words($r['title'],55);?></a></td>
       
       <td class="h20"><?php limite_words($orgn2,55);?></td>
       <td  class=" h20" ><?php  placeexport($r['place']);?>
       
        
        </td>
       <td  class=" h20" ><span rel="tooltip" title="<?php echo $r['exper'];?> years of experience required" ><?php echo $r['exper'];?>Y</span></td>
       <?php if($r['edate']==date('Y-m-d'))
				$bgcol='red';
				else
				$bgcol='';
				 ?>
       <td class="h20  <?php if($r['edate']==date('Y-m-d'))
				echo 'fred';?>"><?php echo  date("jS M Y ", strtotime($r['edate'])); ?></td>
      </tr> 









<?php
}
?>
<tr>



</tbody></table> 
    
    </div>
   
</div>
</div>

 

 <?php showsidebar() ?></td>

<?php foot() ?>

<?php footer() ?>