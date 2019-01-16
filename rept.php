<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	
	

    <title> visit report | Karyabee </title>
<meta name="Description" content="Find your ideal job from Karyabee, Karyabee best career portal in afghanistan"/>
<meta name="Keywords" content="jobs in afghanistan, jobs, careers in afghanistan,, Karyabee,free jobs, free business directory, afghan directory"/>
<meta name="robots" content="noindex,nofollow" />
<meta name="generator" content="sJOB PORTAL SYSTEM" />

</head>
<body>
<?php 
include('config.php');
date_default_timezone_set( "Asia/Kabul" ); 
/*
echo '<h1>Total hits</h1>';
$sql = "SELECT DATE_FORMAT(time, '%d %M-%Y') AS day, COUNT(ip) AS total FROM sob_stat GROUP BY day ORDER BY time";
           $result = mysql_query($sql); $tol=0;
                while($row = mysql_fetch_array($result)){
                echo $row["day"].': '.$row["total"].' hits <br />';
           	 $tol +=$row["total"];
                }
echo '<p style="color:red">Total hits: '. $tol.'</p>';

*/

$sql = "DELETE FROM sob_stat WHERE agent like '%bot%'";
mysql_query($sql);


$sql1 = "DELETE FROM sob_jobs WHERE  edate='1970-01-01'";
mysql_query($sql1);
$sql2 = "DELETE FROM sob_jobs WHERE  edate='0000-00-00'";
mysql_query($sql2);

echo '<h1>visit report without RoBOTs and Engines 100% Clean</h1>';

$sql = "SELECT DATE_FORMAT(time, '%d %M-%Y') AS day, COUNT(DISTINCT ip) AS total, COUNT(ip) AS htotal FROM sob_stat GROUP BY day ORDER BY time";
           $result = mysql_query($sql); $tol=0;$htol=0;
                while($row = mysql_fetch_array($result)){
                echo $row["day"].': '.$row["total"].' unique ip('.$row["htotal"].' hits)<br />';
           	 $tol +=$row["total"];
           	 $htol +=$row["htotal"];
                }
echo '<p style="color:red">Total Visitors: '. $tol.' ('.$htol.' hits)</p>';


?>
<p style="font-family:tahoma;font-size:9px;color:green">sJOB PORTAL SYSTEM &copy 2013 by SobhanSoft</p>
</body>
</html>