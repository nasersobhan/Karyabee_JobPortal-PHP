<?php

class RSS
{
	public function RSS()
	{
		require_once ('classes/config.php');
	}
	
	public function GetFeed()
	{
		return $this->getDetails() . $this->getItems();
	}
	
	
	
	private function getDetails()
	{
		$detailsTable = "webref_rss_details";
	
		
		
		
			$details = '<?xml  version="1.0" encoding="ISO-8859-1" ?>
					<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" version="2.0">
						<channel>
						<title>All Jobs in Afghanistan | Karyabee</title>
<atom:link href="http://af.jobs.ooyta.com/feed.xml" rel="self" type="application/rss+xml"/>
<link>http://af.jobs.ooyta.com</link>
<description>Find your ideal job from Karyabee, Karyabee best career portal in afghanistan</description>

<language>en-US</language>
<sy:updatePeriod>hourly</sy:updatePeriod>
<sy:updateFrequency>1</sy:updateFrequency>
<generator>http://sobhansoft.com/</generator>';
							
							
	
		return $details;
	}
	
	private function getItems()
	{
		$itemsTable = "webref_rss_items";
		$today=date('Y-m-d');
		$query = "SELECT * FROM sob_jobs where edate >= '{$today}' and pend='0' ORDER BY id DESC";
		$result = mysql_query($query);
		$items = '';
		while($row = mysql_fetch_array($result))
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
		
$orgid= $row ['org'];
$qry2="SELECT company FROM sob_logemp where id=$orgid";
	$result3=mysql_query($qry2);
	
	while(list($subject)= mysql_fetch_row($result3))
{
 $org=  $subject;
} 	$items .= '<item>
						 <title>'. $row["title"] .'</title>
						 <link>'. HOME.'/'.$fun.'/'.$row['id'].'/'.$row['slug'] .'</link>
						 <description><![CDATA['. $row['title'].' position in '. $row['place'] .' with '.$org.', this announcement will expire in '.$row['edate']. ']]></description>
					 </item>';
		}
		$items .= '</channel>
				 </rss>';
		return $items;
	}

}

?>