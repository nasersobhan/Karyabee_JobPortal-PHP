<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="robots" content="noindex,nofollow" />
<meta http-equiv="REFRESH" content="5;url=http://www.karyabee.com">
<title>Bad URL - <?php echo  getenv ("REQUEST_URI"); ?></title>
<script>
count=5;
function timer()
{
  count=count-1;
  if (count <= 0)
  {
     clearInterval(counter);
     return;
  }



 document.getElementById("timer").innerHTML=count + " secs"; // watch for spelling
}
timer();
</script>
</head>

<body>
<p align="center"> 

<h1>Error 404</h1><br>Page Not Found 

<p>
<?php 

$ip = getenv ("REMOTE_ADDR"); 

$requri = getenv ("REQUEST_URI"); 
$servname = getenv ("SERVER_NAME"); 
$combine = $ip . " tried to load " . $servname . $requri ; 

$httpref = getenv ("HTTP_REFERER"); 
$httpagent = getenv ("HTTP_USER_AGENT");

$today = date("D M j Y g:i:s a T"); 

$note = "Yes you have been bagged and tagged for a making an illegal move" ; 

$message = "$today \n 
<br> 
$combine <br> \n 
User Agent = $httpagent \n 
<h2> $note </h2>\n 
<br> $httpref "; 

$message2 = "$today \n 
$combine \n 
User Agent = $httpagent \n 
$note \n 
$httpref "; 

$to = "info@karyabee.com"; 
$subject = "Karyabee Error Page"; 
$from = "From: 404@karyabee.com\r\n"; 

//mail($to, $subject, $message2, $from); 

echo $message; 
?> 
<a title="Karyabee Website" href="http://www.karyabee.com">Karyabee.com</a> going back to Karyabee.com <span id="timer"></span>
</body>
</html>