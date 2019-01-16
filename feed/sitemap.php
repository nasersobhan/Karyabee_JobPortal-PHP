<?PHP
header('content-type: text/xml');
 require_once ('classes/config.php');

 
 
echo('<'.'?xml version="1.0" encoding="UTF-8"'.'?'.'>');
echo('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">');?>


<url>
<loc>http://af.jobs.ooyta.com</loc>
<lastmod>2013-02-13</lastmod>
<changefreq>hourly</changefreq>
<priority>1.0</priority>
</url>


<url>
<loc>http://af.jobs.ooyta.com/page/contact</loc>
<lastmod>2013-02-13</lastmod>
<changefreq>monthly</changefreq>
<priority>0.8</priority>
</url>

<url>
<loc>http://af.jobs.ooyta.com/page/aboutus</loc>
<lastmod>2013-02-13</lastmod>
<changefreq>monthly</changefreq>
<priority>0.8</priority>
</url>

<url>
<loc>http://af.jobs.ooyta.com/page/downloads</loc>
<lastmod>2013-02-13</lastmod>
<changefreq>monthly</changefreq>
<priority>0.8</priority>
</url>

<url>
<loc>http://af.jobs.ooyta.com/page/advertisements</loc>
<lastmod>2013-02-13</lastmod>
<changefreq>monthly</changefreq>
<priority>0.8</priority>
</url>

<url>
<loc>http://af.jobs.ooyta.com/page/terms</loc>
<lastmod>2013-02-13</lastmod>
<changefreq>monthly</changefreq>
<priority>0.8</priority>
</url>

<url>
<loc>http://af.jobs.ooyta.com/page/policy</loc>
<lastmod>2013-02-13</lastmod>
<changefreq>monthly</changefreq>
<priority>0.8</priority>
</url>


<?php

		$contentQ = mysql_query("SELECT * FROM sob_jobs where pend='0' ORDER BY id DESC");

while($row= mysql_fetch_array($contentQ))
{
$cid= $row ['cate'];
$qry="SELECT catename FROM sob_jcate where id=$cid";
	$result2=mysql_query($qry);
	
	while(list($subject)= mysql_fetch_row($result2))
{
 $fun=  $subject;
} 
$fun = str_replace(" ", "-", $fun);
$fun = str_replace("/", "-", $fun);
$fun = str_replace("&", "-", $fun);
$row['title'] = str_replace("&", "&amp;", $row['title']);
$fun=strtolower($fun);


$url = HOME.'/'.$fun.'/'.$row['id'].'/'.$row['slug'];
$adding_date = date("Y-m-d",strtotime($row["adate"]));
echo("<url>
<loc>".$url."</loc>
<lastmod>".$adding_date."</lastmod>
<changefreq>daily</changefreq>
<priority>1.0</priority>
</url>
");
}



$qry="SELECT * FROM  sob_logemp";
$result2=mysql_query($qry);

while($row = mysql_fetch_array($result2))
  {
$city=strtolower($row['company']);
$city = str_replace(" ", "-", $city);
$city = str_replace("/", "-", $city);
$city = str_replace("&", "-", $city);?>
<url>
<loc><?php echo HOME.'/'.$row['id'].'/profile/'.$city ?></loc>
<lastmod><?php echo date("Y-m-d",strtotime($row['last_lg'])) ?></lastmod>
<changefreq>daily</changefreq>
<priority>0.4</priority>
</url>
 
	<?php  
	}





$qry="SELECT * FROM sob_jobs_city where stat=1";
	$result=mysql_query($qry);
	
		while($row = mysql_fetch_array($result))
  		{
			$low=strtolower($row['name']); ?>
			
			
			<url>
<loc><?php echo HOME.'/location/'.$low; ?></loc>
<lastmod><?php echo date('Y-m-d'); ?></lastmod>
<changefreq>hourly</changefreq>
<priority>0.4</priority>
</url>
		<?php }
		
		
		
		
		$qry="SELECT * FROM  sob_jcate ";
	$result=mysql_query($qry);
	
		while($row = mysql_fetch_array($result))
  		{
			
			$low=strtolower($row['catename']);
			$low = str_replace(" ", "-", $low);
			$low = str_replace("/", "-", $low);
			$low = str_replace("&", "-", $low);
			$cid=strtolower($row['id']);?>
					<url>
<loc><?php echo HOME.'/category/'.$row['id'].'/'.$low; ?></loc>
<lastmod><?php echo date('Y-m-d'); ?></lastmod>
<changefreq>hourly</changefreq>
<priority>0.4</priority>
</url>
			
		<?php }






echo("</urlset>");
?>