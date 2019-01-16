<!--<div class="tab-pane fade in" id="company">

     <table class="jobs_TBL table">
      <tbody>
       <tr >
        <td  colspan="3" class="h20"  ><span class="style6"><strong>
         <h2> &nbsp;Recent Emplloyees</h2>
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
        <td colspan="4"><form  role="form" class="form-inline" action="<?php echo HOME ?>/search/company" method="post" >
        <div class="form-group">
        <label class="sr-only" for="ser_empname">company Name</label>
          <input type="text" id="ser_empname" class="form-control" placeholder="Name" name="keyword">
          </div>
          <?php get_cilist('1') ?>
          <?php get_catelist() ?>
           <button type="submit" class="btn btn-default">Search</button>
          </div>
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
        <?php echo $r['website'];?>
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
<div class="tab-pane fade in" id="service">

     <table class="jobs_TBL table">
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
        <td colspan="2"><form  role="form" class="form-inline" action="<?php echo HOME ?>/search/service" method="post" >
        <div class="form-group">
          <input type="text" placeholder="Name." cclass="form-control" name="keyword" />
          </div>
          <select class="form-control" name="type">
           <option value="pro">Products</option>
           <option value="ser">Services</option>
          </select>
            <button type="submit" class="btn btn-default">Search</button>
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
  <div class="tab-pane fade in" id="resume">

     <table class="jobs_TBL table">
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
        <td  colspan="4" class="h20"  ><form  role="form" class="form-inline" action="<?php echo HOME ?>/search/resume" method="post" >
         <div class="form-group">
          <label class="sr-only" for="sec_rename">Name</label>
          <input type="text" lass="form-control" id="sec_rename" placeholder="Search name" name="name">
           </div><div class="form-group">
            <label class="sr-only" for="sec_skill">Skill Key</label>
          <input type="sect" lass="form-control" id="sec_skill" placeholder="Skill Key" name="skill"></div>
          
          <select id="deg" lass="form-control" name="deg">
           <option value="">Select Degree</option>
           <option value="High School">High School</option>
           <option value="Diploma">Diploma</option>
           <option value="Bachelor">Bachelor</option>
           <option value="Master">Master</option>
           <option value="Ph.D">Ph.D</option>
          </select>
          <?php  get_cilist('1') ?>
         <button type="submit" class="btn btn-default">Search</button>
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
   <div class="tab-pane fade in" id="phone">

     <table   cellpadding="0" class="jobs_TBL table" >
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
        <td  colspan="4" class="h20"  ><form  role="form" class="form-inline" action="<?php echo HOME ?>/search/phone" method="post" >
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Name,Title .etc" name="names">
          </div><div class="form-group">
          <input type="sect" class="form-control" placeholder="type,sector .etc" name="sect">
           </div><div class="form-group">
          <input type="count" class="form-control" placeholder="Country" name="count"></div>
            <button type="submit" class="btn btn-default">Search</button>
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
    </div>-->