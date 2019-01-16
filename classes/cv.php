<?php 
include('config.php');

if(isset($_GET['r'])){
	$slug=$_GET['r'];
	
	$qry="SELECT * FROM  slug where slug='$slug'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
	  $cid=$row['id'];
  }
}else {
	
$cid=$_GET['id'];

}



$qry="SELECT * FROM  sob_resume where id='$cid'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
	  define( "ID", $row['id'] )
	  ; 

define( "JNAME", $row['fullname'] );
	define( "JSEX", $row['sex'] ); 
define( "CPEMAIL", $row['pem'] );
define( "EMAIL", $row['pem'] );
define( "NATION", $row['citzns'] );
define( "DOB", $row['dborn'] );
define( "POB", $row['poburn'] );
define( "JCOUNTID", $row['count'] );
define( "JCITY", $row['city'] );
define( "CATEID", $row['cate'] );
define( "DEG", $row['hstedu']);
define( "MAJ", $row['feild']);
define( "EXP", $row['totlex']);
define( "KEY", $row['keyf']);  
 define( "COVER", $row['cover']);   
 define( "PHONE", $row['tel']);

define( "MOBI", $row['mobi'] );
define( "ADD", $row['address'] );



$unixtime = strtotime( $datetime );

if ( FALSE !== $unixtime )
{
// $datetime is a readable date format
}




  }
  
  
  
  
  function getcatename($id){
$qry="SELECT * FROM    sob_jcate where id='$id'";
		$result2=mysql_query($qry);

while($row = mysql_fetch_array($result2))
  {
	  echo $row['catename'];
  }
}
  

  function getcountname($id){
$qry="SELECT * FROM   sob_jobs_count where id='$id'";
		$result2=mysql_query($qry);

while($row = mysql_fetch_array($result2))
  {
	  echo $row['name'];
  }
}
?>