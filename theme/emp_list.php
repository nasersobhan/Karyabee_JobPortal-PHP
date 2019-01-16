<?php headers() ?>
<?php 
	$oid=C_ID;
	$result2 = mysql_query("SELECT * FROM sob_jobs where org='$oid'");
	$all_rows = mysql_num_rows($result2);
?>

<ul class="nav nav-tabs profile-tab" style="border:0;">
  <li class="active"><a href="#jobs" data-toggle="tab"> List </a></li>
</ul>
<div class="tab-content profile-tab-content" >
  <div class="tab-pane fade active in" id="jobs">
    <table cellpadding="0" cellspacing="0" class="jobs_TBL table">
      <tbody>
        <t>
      
        <td  colspan="5" height="20"  class="small_txt"><span class="style6"><strong>
          <h2> &nbsp;&nbsp All Jobs you posted </h2>
          </strong></span></td>
      </tr>
      <tr >
        <td height="20" width="100"  class="small_txt w300"><span class="style6"><strong>&nbsp;&nbsp;Job Title</strong></span></td>
     
        <td width="100"  class="small_txt"><span class="style6"><strong>Closing Date</strong></span></td>
        <?php if(C_RANK==1){ ?>
        <td width="50"  class="small_txt"><span class="style6"><strong>Organization</strong></span></td>
      
        <?php } else {?>
        <td width="50" height="20"  class="small_txt"><span class="style6"><strong>Category</strong></span></td>
       
        <?php } ?>
      </tr>
      <title> My Jobs | <?php echo PAGETITLE;?> </title>
      <?php
$oid=C_ID;
if(C_RANK==1)
$see=" org IS NOT NULL";
else
$see=" org='$oid'";




$today=date('Y-m-d');
 $max = NOPPAGE;

if(isset($_GET['pages']))
$p = $_GET['pages'];

if(!isset($p))

{

$p = 1;

}

$limits = ($p - 1) * $max;

//view the news article!

if(isset($_GET['act']) && $_GET['act'] == "view")

{

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM sob_jobs where $see");

while($r = mysql_fetch_array($sql))

{
echo "note work";
}



   }
else
{



//view all the news articles in rows

$sql = mysql_query("SELECT * FROM sob_jobs where  $see ORDER BY id DESC LIMIT ".$limits.",$max") or die(mysql_error());

//the total rows in the table

$totalres = mysql_result(mysql_query("SELECT COUNT(id) AS tot FROM sob_jobs where $see"),0);

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
        <td width="150" class="small_txt"><a target="_blank" title="<?php echo $r['title'].' Position with '.$orgn2 ?>" href="<?php echo HOME.'/'.$fun.'/'.$r['id'].'/'.$r['slug'] ?>/">&nbsp;&nbsp;» <?php echo $r['title'];?></a></td>
  
        <?php  if($r['edate']==date('Y-m-d') || $r['edate'] < date('Y-m-d'))
				$datee='<span style="color:red">Closed </span> :'.$r['edate'];
				else
				$datee=$r['edate'];?>
        <td   class="small_txt"><?php echo $datee ?></td>
        <?php if(C_RANK==1){ ?>
        <td  class="small_txt"><span class="style6"><strong><?php echo $orgn2 ?></strong></span></td>
        <?php } else { ?>
        <td   class="small_txt"><span class="style6"><?php echo  $fun ?></span></td>
        <?php } ?>
        <td  width="150" class="small_txt"><a href="<?php echo HOME ?>/?emp=del&did=<?php echo $r['id'] ?>" ><button type="submit" class="btn btn-danger">Delete</button></a><a href="<?php echo HOME ?>/?emp=editjob&eid=<?php echo $r['id'] ?>" ><button type="submit" class="btn btn-default">Edit</button></a>
         <?Php 
          if($r['pend']==1){
	$col='primary';
	$text='Publish';// $num = 0;
	}else{
	$col='warning';
	$text='Suspend';// $num = 1;
	}
          ?>
          
          <a  href="<?php echo HOME ?>/?admin=jsus&jeid=<?php echo $r['id']; ?>&t=<?php echo $r['pend']; ?>">
            <button type="submit" class="btn btn-<?php echo $col ?>"><?php echo $text ?></button></a>  

        </td>
        <?php } ?>
          </tbody>
    </table>
    <br>
    <?Php
echo '<center>| ';
for($i = 1; $i <= $totalpages; $i++){

//this is the pagination link

echo "<a href='".HOME."/emp/list/page/$i'>$i</a> | ";

}
echo ' </center><br/> ';
}


?>
  </div>
  <!--- others here --> 
</div>
</div>
<?php showsidebar() ?>
</td>
<?php foot() ?>
<?php footer() ?>
