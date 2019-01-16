<?php

class serv{

function loadpage(){
	
	$serid=$_GET['servid'];
$qry2="UPDATE emp_service SET hit = hit + 1 where id='$serid'";
		mysql_query($qry2);
		
		
	$qry="SELECT * FROM  emp_service where id='$serid' and active=0";
		$result2=mysql_query($qry);
		
	if (mysql_num_rows($result2) == 0) {?>
     <meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/search/service">
    <?php
} else {
while($row = mysql_fetch_array($result2))
  {
	  define( "ID", $row['id'] ); 
 define( "SCID", $row['cid'] );
define( "SNAME", $row['name'] );
	define( "SDIS", $row['dis'] ); 
define( "SFEU", $row['fethure'] );
define( "SPRICE", $row['price'] );
define( "SDATE", $row['sdate'] );
if($row['type']=='pro')
define( "STYPE", 'Product' );
else
define( "STYPE", 'Service' );
define( "HIT", $row['hit'] );
$comid=SCID;
	$qry="SELECT * FROM  sob_logemp where id='$comid'";
	$result1=mysql_query($qry);
	while($rx = mysql_fetch_array($result1))
  {
	  $cname=$rx['company'];
	 $comcount=$rx['con'];
  }

$ccname = str_replace(" ", "-", $cname);
$ccname = str_replace("/", "-", $ccname);
$ccname = str_replace("&", "-", $ccname);
$ccname=strtolower($ccname);
$comlink= HOME.'/'.SCID.'/profile/'.$ccname;
define( "SCOMLINK", $comlink );
define( "SCOMN", $cname );
define( "SCOUNT", $comcount );

  }
}
}
	
	
	
function loadit(){
emp::logi();
$cid=C_ID;
	$qry="SELECT * FROM  emp_service where cid='$cid'";
		$result2=mysql_query($qry);


while($row = mysql_fetch_array($result2))
  {
	if($row['active']==1)
	$stat='Not Active';
	else
	$stat='Active';
	  
	  if($row['type']=='ser')
	$type='Service';
	else
	$type='Product';
	  ?>
	 <tr id="<?php echo $row['id']; ?>">
            <td height="20"><?php echo $row['name']; ?> </td>
             <td height="20"><?php echo $type; ?> </td>
             <td height="20"><?php echo $stat; ?> </td>
                 <td height="20">
                 
                
                 <input type="button" id="submit" style="width:20px; height:20px; background-image: url(<?PHP echo HOME ?>/theme/date/b_drop.png)" onclick="javascript: formget(this.form, '<?php echo HOME ?>/?ser=del&id=<?php echo $row['id']; ?>'); delet('<?php echo $row['id']; ?>');"  name="Send" value="" >
                 
                 
                 </td>
          </tr>
<?php }  
}


function loaddata($cid,$cname){


	$qry="SELECT * FROM  emp_service where cid='$cid' and active=0";
		$result2=mysql_query($qry);

if (mysql_num_rows($result2) == 0) {
// echo '<center>no</center>';
} else {?>

      
<tr class="blue_head">
<td >
Product/Services
</td>
</tr>
  <tr>

<td style="padding-left:15px; padding-bottom:10px; ">
<?php
while($row = mysql_fetch_array($result2))
  {
	
	$lname = str_replace(" ", "-", $row['name']);
$lname = str_replace("/", "-", $lname);
$lname = str_replace("&", "-", $lname);
$lname=strtolower($lname);
$ccid=$cid;

$cname = str_replace(" ", "-", $cname);
$cname = str_replace("/", "-", $cname);
$cname = str_replace("&", "-", $cname);
$cname=strtolower($cname);

	  ?> 
    
      <h3><?php echo $row['name']; ?></h3>
<?php echo  $row['dis']; ?>
     <hr/>
     <a href="<?php echo HOME ?>/<?Php echo $cname ?>/service/<?php echo $row['id']?>/<?php echo $lname?>" title="read more about company service" target="_blank" >&raquo; Read More </a>  
   
                
<?php }  ?> 

   </td>

</tr> <?php

  // do your while stuff here
}

	
	
}
function del(){
	emp::logi();
$cid=C_ID;
$id=$_GET['id'];
	$qry="delete FROM emp_service where id='$id'";
		$result2=mysql_query($qry);
		if (!$result2)
   echo mysql_error();
   else
   echo 'Deleted';
	
}
//////////////add edu
function add(){
	emp::logi();
$cid=C_ID;
$name=$_POST['name'];
$type=$_POST['type'];
$price=$_POST['price'];
$sdate=$_POST['sdate'];
$feu=$_POST['feu'];
	$dis=$_POST['dis'];

	
$q= "insert into emp_service (cid,name , type, sdate, price,fethure,dis)
Values
('$cid','$name','$type','$sdate','$price','$feu','$dis')";

$result = mysql_query($q);	
	if (!$result)
   echo mysql_error();
   else{?>
  <meta http-equiv="REFRESH" content="0;url=<?php echo HOME ?>/emp/services/">
<?php } }


function page(){
include('theme/ser_add.php');
}
function single(){
	serv::loadpage();
include('theme/service.php');
}
		
	
	
	
}

class search {
	
function phone(){
 include('theme/search_phone.php');  
}
function resume(){
 include('theme/search_resume.php');  
}	
	function job(){
 include('theme/search_job.php');
        
}	
	function company(){
 include('theme/search_emp.php');      
}
function service(){
include('theme/search_service.php');	
}
	
////////end class	
}
?>