<?php headers() ?>


 
 
 <?php 
			$today=date('Y-m-d');
			global $dbase;
			$result2 = $dbase->query("SELECT * FROM sob_jobs where edate >= '{$today}' and pend='0'");
			$all_rows = mysqli_num_rows($result2);
			
 			?>
<!--   <ul class="nav nav-tabs profile-tab" style="border:0;">
   <li class="active"><a href="#jobs" data-toggle="tab">Recent Jobs (<?php echo $all_rows ?>)</a></li>
    <li><a href="#company" data-toggle="tab">Recent Employees</a></li>
    <li><a href="#service" data-toggle="tab">Services/Pruducts</a></li>
    <li><a href="#resume" data-toggle="tab">Recent Resumes</a></li>
    <li><a href="#phone" data-toggle="tab">Contact Directory</a></li>
   </ul>-->
   
   <div class="tab-content profile-tab-content" >



<div class="tab-pane fade active in" id="jobs">

     <table class="jobs_TBL table" id="recentjobs"  >
      <tbody>
      <tr>
        <td colspan="5" class="h20"  ><span class="style6"><strong>
                    <?php 
                    
                    if(isset($_GET["page"]))
                        $px = $_GET['page']; 
                    else
                        $px=1;
                    ?>
                    
                    
         <h2> &nbsp;Recent Job Posted <?php echo ($px!=1 ? '<sup><small> - Page '.$px.'</small></sup>' : '<sup><small>('.$all_rows.')</small></sup>'); ?> </h2>
         </strong></span></td>
        
     
       </tr>
        <td  colspan="5" class="h20"   >
        <form role="form" class="form-inline" action="<?php echo HOME ?>/search/job" method="post" >
                <div class="form-group">
            		<label class="sr-only" for="s_keyword">Keyword</label>
           		
                       <input type="text" class="form-control" id="s_keyword"  placeholder="Title etc." name="keyword">
          </div>
        
          <?php get_cilist('1') ?>
          <?php get_catelist_search() ?>
           <button type="submit" class="btn btn-default">Search</button>
       
         </form></td>
       </tr>
       <tr class="blue_head">
        <td  class="h20 w300"  ><span class="style6"><strong>&nbsp;&nbsp;Job Title</strong></span></td>
        <td class="w300"  ><span class="style6"><strong>Organization</strong></span></td>
        <td class="w50"  ><span class="style6"><strong>City</strong></span></td>
        <td class="w50"  ><span class="style6"><strong>Exp.</strong></span></td>
        <td  class="w100"  ><span class="style6"><strong>Clos. Date</strong></span></td>
       </tr>
       <?php



if(isset($_GET["city"])){

$vals= $_GET["city"];
$see="  and place='$vals'";
?>
      <title> <?php echo $vals ?> jobs | <?php echo PAGETITLE;?> </title>
      <?php

 }else if(isset($_GET["cate"])){
 $vals= $_GET["cate"];
 $valse= $_GET['caten'];
$see="  and cate='$vals'";
?>
      <title> <?php echo $valse ?> jobs | <?php echo PAGETITLE;?> </title>
      <?php

}else if(isset($_GET["org"])){
 $vals= $_GET["org"];
  $valss= $_GET["orgn"];
$see="  and org='$vals'";
?>
      <title> <?php echo $valss ?> jobs | <?php echo PAGETITLE;?> </title>
      <?php

 }else if(isset($_GET["location"])){
 $vals= $_GET["location"];
$see=" and location='$vals'";
?>
      <title> <?php echo $vals ?> jobs | <?php echo PAGETITLE;?> </title>
      <?php


 }else{
$see="";

}




$today=date('Y-m-d');

 $max = NOPPAGE;
if(isset($_GET["page"]))
$p = $_GET['page'];

if(!isset($p))

{

$p = 1;

}

$limits = ($p - 1) * $max;

//view the news article!

if(isset($_GET['act']) && $_GET['act'] == "view")

{

$id = $_GET['id'];

$sql = $dbase->query("SELECT * FROM sob_jobs where edate >= '$today' and pend='0' $see");

while($r = mysqli_fetch_assoc($sql))

{
echo "not work";
}



   }
else
{



//view all the news articles in rows
$sql = $dbase->query("SELECT * FROM sob_jobs where edate >= '$today' And pend='0' $see ORDER BY postedfrom DESC,id DESC LIMIT ".$limits.",$max") or die(mysql_error());
//$sql = $dbase->query("SELECT * FROM sob_jobs where edate >= '$today' And pend='0' $see ORDER BY id DESC LIMIT ".$limits.",$max") or die(mysql_error());

//the total rows in the table

$totalres = mysqli_result($dbase->query("SELECT COUNT(id) AS tot FROM sob_jobs where edate >= '$today' And pend='0' $see",'0'));

//the total number of pages (calculated result), math stuff...

$totalpages = ceil($totalres / $max);



while($r = mysqli_fetch_assoc($sql))

{
	$cid= $r['cate'];

$qry="SELECT catename FROM sob_jcate where id=$cid";
	$result2=$dbase->query($qry);
	
	while(list($subject)= mysqli_fetch_row($result2))
{
 $fun=  trim($subject);
}


$fun = str_replace(" ", "-", $fun);
$fun = str_replace("/", "-", $fun);
$fun = str_replace("&", "-", $fun);
$fun = str_replace("--", "-", $fun);
$fun = str_replace("---", "-", $fun);
$fun=strtolower($fun);
$city=strtolower($r['place']);


$org=$r['org'];


$qry="SELECT * FROM  sob_logemp where id='$org'";
		$result2=$dbase->query($qry);
while($row = mysqli_fetch_array($result2))
  {
$orgn2=$row['company'];  

  } 

  
  $orgn=strtolower($orgn2);
$orgn = str_replace(" ", "-", $orgn);
$orgn = str_replace("/", "-", $orgn);
$orgn = str_replace("&", "-", $orgn);




if($r['adate']==date('Y-m-d'))
    $arx2 = '&nbsp;<sup><i class="fa fa-location-arrow" style="color:#f00;"> NEW</i> </sup>';
else
    $arx2 ='';

if($r['postedfrom']=='site')
     $arx = '<i class="fa fa-star fa-spin blink" style="color:#ffff00;"></i>&nbsp;';
else
    $arx = ''; 
   ?>
      <tr >
       <td class="h20"  >
<a title="<?php echo $r['title'].' Position with '.$orgn2.' (Views: '.$r['vist'].')'; ?>" href="<?php echo HOME.'/'.$fun.'/'.$r['id'].'/'.$r['slug'] ?>">
&nbsp;<?php echo $arx; limite_words($r['title'],45); echo $arx2; ?></a></td>
       
       <td class="h20"><?php limite_words($orgn2,55);?></td>
       <td  class=" h20" ><?php ucwords(placeexport($r['place'])) ?>
       
        
        </td>
        <td  class=" h20" ><span rel="tooltip" title="<?php echo str_ireplace(' ','',str_ireplace('years', '', $r['exper']));?> years of experience required" ><?php echo str_ireplace(' ','',str_ireplace('years', '', $r['exper']));?>Y</span></td>
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
      <tr class="blue_head">
       <td class="h20 xfoot" colspan="5"  ><a title="contact us" href="<?php echo HOME ?>/emp/addjob">Post A Job (Free)</a> | <a title="Search Phone Directory" href="<?php echo HOME ?>/search/job">Search More</a></td>
      </tr>
       </tbody>
     </table>
     <br>
     <?Php
echo '<p class="acenter">';
for($i = 1; $i <= $totalpages; $i++){

//this is the pagination link
if($i==1)
echo "<a class='mypage' title='go to page {$i}' href='".HOME."'><button type='button' class='btn btn-xs bg_red'>$i</button></a> ";

elseif($i==$p)
  echo "<button type='button' class='btn bg_green btn-xs'>$i</button> ";  
else
    echo "<a class='mypage' title='go to page {$i}' href='".HOME."/page/$i'><button type='button' class='btn btn-xs bg_red'>$i</button></a> ";

}
echo ' </p><br/> ';
}


?>
    </div>
<!--- others here -->
   </div>
  </div>



 <?php showsidebar() ?></td>

<?php foot() ?>

<?php footer() ?>