<?php headers() ?>

<tr>
 <td class="vtop w710"><div id="TabbedPanels1" class="TabbedPanels">
   <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Recent Jobs</li>
    <li class="TabbedPanelsTab" tabindex="0">Recent Company Profiles</li>
    <li class="TabbedPanelsTab" tabindex="0">Services/Pruducts</li>
    <li class="TabbedPanelsTab" tabindex="0">Recent Resumes</li>
    <li class="TabbedPanelsTab" tabindex="0">Phone Directory</li>
   </ul>
   <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">
     <table class="blue_bg meta1" >
      <tbody>
       <tr >
        <td  colspan="4" class="h20"><span class="style6"><strong>
         <h2> &nbsp;Recent Jobs Posted </h2>
         </strong></span></td>
        <?php 
			$today=date('Y-m-d');
			
			$result2 = mysql_query("SELECT * FROM sob_jobs where edate >= '{$today}' and pend='0'");
			$all_rows = mysql_num_rows($result2);
			
			?>
        <td  ><span class="style6"><strong>
        &raquo; Total: <?php echo $all_rows ?>
         </strong></span></td>
       </tr>
       <tr>
        <td  colspan="5" class="h20"  ><form action="<?php echo HOME ?>/search/job" method="post" >
          <input type="text" placeholder="Title etc." name="keyword">
          <?php get_citylist('all') ?>
          <?php get_catelist() ?>
          <input type="submit"  value="Search">
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
?>
      <title> All Jobs | <?php echo PAGETITLE;?> </title>
      <?php

$see="";

}




$today=date('Y-m-d');

 $max = NOPPAGE;

$p = $_GET['page'];

if(empty($p))

{

$p = 1;

}

$limits = ($p - 1) * $max;

//view the news article!

if(isset($_GET['act']) && $_GET['act'] == "view")

{

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM sob_jobs where edate >= '$today' and pend='0' $see");

while($r = mysql_fetch_array($sql))

{
echo "note work";
}



   }
else
{



//view all the news articles in rows

$sql = mysql_query("SELECT * FROM sob_jobs where edate >= '$today' And pend='0' $see ORDER BY id DESC LIMIT ".$limits.",$max") or die(mysql_error());

//the total rows in the table

$totalres = mysql_result(mysql_query("SELECT COUNT(id) AS tot FROM sob_jobs where edate >= '$today' And pend='0' $see"),0);

//the total number of pages (calculated result), math stuff...

$totalpages = ceil($totalres / $max);



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
       <td class="h20"  ><a title="<?php echo $r['title'].' Position with '.$orgn2 ?>" href="<?php echo HOME.'/'.$fun.'/'.$r['id'].'/'.$r['slug'] ?>/">&nbsp;&nbsp;» <?php echo $r['title'];?> </a></td>
       <td class="h20" ><a href="<?php echo HOME.'/company/'.$r['org'].'/'.$orgn ?>/" title="All Jobs with <?php echo $orgn2 ?>"> <?php echo $orgn2;?> </a></td>
       <td  class="acenter" class="h20" ><a href="<?php echo HOME.'/location/'.$city?>/" title="All Jobs from <?php echo $r['place'];?>"><?php echo $r['place'];?></a></td>
       <td  class="acenter" class="h20" ><?php echo $r['exper'];?>Y</td>
       <?php if($r['edate']==date('Y-m-d'))
				$bgcol='red';
				else
				$bgcol='';
				 ?>
       <td class="h20 acenter <?php if($r['edate']==date('Y-m-d'))
				echo 'fred';?>"><?php echo  date("jS M Y ", strtotime($r['edate'])); ?></td>
      </tr>
      <?php
}
?>
      <tr class="blue_head">
       <td class="h20" colspan="5"  ><a title="contact us" href="<?php echo HOME ?>/emp/addjob">Post A Job</a> | <a title="Search Phone Directory" href="<?php echo HOME ?>/search/job">Search More</a></td>
      </tr>
       </tbody>
     </table>
     <br>
     <?Php
echo '<center>| ';
for($i = 1; $i <= $totalpages; $i++){

//this is the pagination link

echo "<a title='go to page {$i}' href='".HOME."/page/$i'>$i</a> | ";

}
echo ' </center><br/> ';
}


?>
    </div>
    <div class="TabbedPanelsContent">
     <table class="blue_bg meta1">
      <tbody>
       <tr >
        <td  colspan="3" class="h20"  ><span class="style6"><strong>
         <h2> &nbsp;Recent Company Profiles Posted</h2>
         </strong></span></td>
        <?php 
	
			$result2 = mysql_query("SELECT * FROM sob_logemp");
			$all_rows2 = mysql_num_rows($result2);
			
			?>
        <td   ><span class="style6"><strong>
         &raquo; Total : 0<?php echo $all_rows2 ?>
         </strong></span></td>
       </tr>
       <tr>
        <td colspan="4"><form action="<?php echo HOME ?>/search/company" method="post" >
          <input type="text" placeholder="Name." name="keyword">
          <?php get_citylist('all') ?>
          <?php get_catelist() ?>
          <input type="submit"  value="Search">
         </form></td>
       </tr>
       <tr class="blue_head">
        <td width="40%" class="h20"  ><span class="style6"><strong>&nbsp;&nbsp;Name</strong></span></td>
        <td width="23%" class="h20"  ><span class="style6"><strong>Industry Type</strong></span></td>
        <td width="10%" class="h20"  ><span class="style6"><strong>Website</strong></span></td>
        <td width="18%" class="h20"  ><span class="style6"><strong>phone</strong></span></td>
       </tr>
       <?php

 $max = NOPPAGE;

$sql = mysql_query("SELECT * FROM  sob_logemp where active='0' ORDER BY id DESC LIMIT $max");

while($r = mysql_fetch_array($sql))

{
	$cid= $r['cate'];
$qry="SELECT catename FROM sob_jcate where id=$cid";
	$result2=mysql_query($qry);
	
	while(list($subject)= mysql_fetch_row($result2))
{
 $fun=  $subject;
} 
$cate = $fun;
$fun = str_replace(" ", "-", $fun);
$fun = str_replace("/", "-", $fun);
$fun = str_replace("&", "-", $fun);
$fun=strtolower($fun);


$city=strtolower($r['company']);
$city = str_replace(" ", "-", $city);
$city = str_replace("/", "-", $city);
$city = str_replace("&", "-", $city);


   ?>
       <tr >
        <td class="h20" ><a title="Profile of <?php echo $r['company'] ?>" href="<?php echo HOME.'/'.$r['id'].'/profile/'.$city ?>/">&nbsp;&nbsp;» <?php echo $r['company'];?> </a></td>
        <td class="h20" ><?php echo $cate;?></td>
        <td class="h20" ><?php if($r['website']==""){ ?>
         <a style="color:red" href="http://sobhansoft.com" title="Buy A Website">Website not available</a>
         <?php } else { ?>
         <a href="<?php echo HOME ?>?goto=<?php echo $r['website'] ?>" title="All Jobs from <?php echo $r['place'];?>"><?php echo $r['website'];?></a>
         <?php } ?></td>
        <td class="h20" ><?php echo $r['phone'];?></td>
       </tr>
       <?php
}
?>
       <tr class="blue_head">
        <td class="h20" colspan="4"  ><a title="register as emplyoee" href="<?php echo HOME ?>/emp/com">Add Your Company/Organization</a> | <a href="<?php echo HOME ?>/search/company">Search More</a></td>
       </tr>
      </tbody>
     </table>
    </div>
    <div class="TabbedPanelsContent">
     <table class="blue_bg meta1">
      <tbody>
       <tr >
        <td  colspan="1" class="h20"  ><span class="style6"><strong>
         <h2> &nbsp;Recent Services/Products</h2>
         </strong></span></td>
        <?php 
	
			$result2 = mysql_query("SELECT * FROM emp_service");
			$all_rows2 = mysql_num_rows($result2);
			
			?>
        <td   ><span class="style6"><strong>
         &raquo; Total Services/Products : 0<?php echo $all_rows2 ?>
         </strong></span></td>
       </tr>
       <tr>
        <td colspan="2"><form action="<?php echo HOME ?>/search/service" method="post" >
          <input type="text" placeholder="Name." name="keyword" />
          <select name="type">
           <option value="pro">Products</option>
           <option value="ser">Services</option>
          </select>
          <input type="submit"  value="Search" />
         </form></td>
       </tr>
       <tr class="blue_head">
        <td width="40%" class="h20"  ><span class="style6"><strong>&nbsp;&nbsp;Name</strong></span></td>
        <td width="23%" class="h20"  ><span class="style6"><strong>Company</strong></span></td>
       </tr>
       <?php

 $max = NOPPAGE;

$sql = mysql_query("SELECT * FROM emp_service where active='0' ORDER BY id DESC LIMIT $max");

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
       <tr>
        <td class="h20" ><a title="Service of <?php echo $r['name'] ?>" href="<?php echo HOME.'/'.$ccname.'/service/'.$r['id'].'/'.$llink ?>/">&nbsp;&nbsp;» <?php echo $r['name'];?> </a></td>
        <td class="h20" ><?php echo $cname;?></td>
        </tr>
        <?php
}
?>
       <tr class="blue_head">
        <td class="h20" colspan="2"  ><a title="register as emplyoee" href="<?php echo HOME ?>/emp/services">Add Your Service</a> | <a href="<?php echo HOME ?>/search/service">Search More</a></td>
       </tr>
      </tbody>
     </table>
    </div>
    <div class="TabbedPanelsContent">
     <table class="blue_bg meta1">
      <tbody>
       <tr>
        <td colspan="3" class="h20"  ><span class="style6"><strong>
         <h2> &nbsp;Recent Resume Updated</h2>
         </strong></span></td>
        <?php 
	
			$result2 = mysql_query("SELECT * FROM sob_resume");
			$all_rows2 = mysql_num_rows($result2);
			
			?>
        <td   ><span class="style6"><strong>
         &raquo; Total Resume : 0<?php echo $all_rows2 ?>
         </strong></span></td>
       </tr>
       <tr>
        <td  colspan="4" class="h20"  ><form action="<?php echo HOME ?>/search/resume" method="post" >
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
         </form></td>
       </tr>
       <tr class="blue_head">
        <td width="40%" class="h20"  ><span class="style6"><strong>&nbsp;&nbsp;Full Name</strong></span></td>
        <td width="23%" class="h20"  ><span class="style6"><strong>Experience</strong></span></td>
        <td width="10%" class="h20"  ><span class="style6"><strong>Major</strong></span></td>
        <td width="18%" class="h20"  ><span class="style6"><strong>Degree</strong></span></td>
       </tr>
       <?php $max = NOPPAGE;

$sql = mysql_query("SELECT * FROM  sob_resume where active='0' ORDER BY id DESC LIMIT $max");

while($r = mysql_fetch_array($sql))

{?>
       <tr >
        <td class="h20" ><a title="Resume of <?php echo $r['fullname'] ?>" target="_blank" href="<?php get_re_link($r['id'])?>">&nbsp;&nbsp;» <?php echo $r['fullname'];?> </a></td>
        <td class="h20" ><?php echo $r['totlex'];?> Years </td>
        <td class="h20" ><?php echo $r['feild'];?></td>
        <td class="h20" ><?php echo $r['hstedu'];?></td>
       </tr>
       <?php
}
?>
       <tr class="blue_head">
        <td class="h20" colspan="4"  ><a title="register as user" href="<?php echo HOME ?>/user/register/">Add Your Resume</a> | <a title="search resume" href="<?php echo HOME ?>/search/resume">Search More</a></td>
       </tr>
      </tbody>
     </table>
    </div>
    <div class="TabbedPanelsContent">
     <table width="709px" border="0" style="table-layout:auto; overflow:hidden;font-family:tahoma; font-size:11px"  cellpadding="0" class="blue_bg" cellspacing="0">
      <tbody>
       <tr>
        <td  colspan="3" class="h20"  ><span class="style6"><strong>
         <h2> &nbsp;Recent Resume Updated</h2>
         </strong></span></td>
        <?php 
	
			$result2 = mysql_query("SELECT * FROM dir_phone");
			$all_rows2 = mysql_num_rows($result2);
			
			?>
        <td   ><span class="style6"><strong>
         &raquo; Total  : 0<?php echo $all_rows2 ?>
         </strong></span></td>
       </tr>
       <tr>
        <td  colspan="4" class="h20"  ><form action="<?php echo HOME ?>/search/phone" method="post" >
          <input type="text" placeholder="Name,Title .etc" name="names">
          <input type="sect" placeholder="type,sector .etc" name="sect">
          <input type="count" placeholder="Country" name="count">
          <input type="submit" value="Search">
         </form></td>
       </tr>
       <tr class="blue_head">
        <td width="40%" class="h20"  ><span class="style6"><strong>&nbsp;&nbsp;Name</strong></span></td>
        <td width="23%" class="h20"  ><span class="style6"><strong>Sector</strong></span></td>
        <td width="10%" class="h20"  ><span class="style6"><strong>Phone</strong></span></td>
        <td width="18%" class="h20"  ><span class="style6"><strong>Place</strong></span></td>
       </tr>
       <?php $max = NOPPAGE;

$sql = mysql_query("SELECT * FROM  dir_phone where active='0' ORDER BY id DESC LIMIT $max");

while($r = mysql_fetch_array($sql))
{
	?>
       <tr >
        <td class="h20" >&nbsp;&nbsp;» <?php echo $r['name'] ?></td>
        <td class="h20" ><?php echo $r['type'] ?></td>
        <td class="h20" ><?php echo $r['phone1'] ?></td>
        <td class="h20" ><?php echo $r['city'] ?>, <?php echo $r['count'] ?></td>
       </tr>
       <?php
}
?>
       <tr class="blue_head">
        <td class="h20" colspan="4"  ><a title="contact us" href="<?php echo HOME ?>/page/contact">Send Your Number</a> | <a title="Search Phone Directory" href="<?php echo HOME ?>/search/phone">Search More</a></td>
       </tr>
      </tbody>
     </table>
    </div>
   </div>
  </div>
  <script type="text/javascript">
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
</script></td>
 <td width="237px" class="vtop"><?php showsidebar() ?></td>
</tr>
<tr>
 <td width="710px" class="vtop"><table align="left" class="jobs_TBL" style=" vertical-align:top" width="709px">
   <tr class="blue_head">
    <th class="style6" width="33%"> &nbsp; &raquo; Search by Category </th>
    <th class="style6"  width="33%"> &raquo; Search by City </th>
    <th class="style6" width="33%"> &raquo; Search by Organization </th>
   </tr>
   <tr>
    <td style=" vertical-align:top"><ul style=" list-style:none;">
      <?php get_catebyli() ?>
     </ul></td>
    <td style=" vertical-align:top"><ul style=" list-style:none;">
      <?php  get_citybyli() ?>
     </ul></td>
    <td style=" vertical-align:top"><ul style=" list-style:none;">
      <?php get_combyli() ?>
     </ul></td>
  </table></td>
 <td width="237px" class="vtop"><table width="100%" border="0" cellspacing="2" cellpadding="2">
   <tr>
    <td></td>
   </tr>
  </table></td>
</tr>
<?php footer() ?>
