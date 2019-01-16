<?php



function get_jobinfo($id){
      
        global $dbase;
	$qry="SELECT * FROM  sob_jobs where id='$id'";
	$user_data = array();
        
        $row = $dbase->fetch_assoc($qry);
        return ($row);
}

function get_jobinfo_single($id, $value){
      
        global $dbase;
	$qry="SELECT ".$value." FROM  sob_jobs where id='$id'";
	$user_data = array();
        $row = $dbase->fetch_array($qry);
        return ($row[0]);
}

function get_com($id){
	
	
$qry="SELECT * FROM  sob_logemp where id='$id'";
$result2=mysql_query($qry);

while($row = mysql_fetch_array($result2))
  {
$city=strtolower($row['company']);
$city = str_replace(" ", "-", $city);
$city = str_replace("/", "-", $city);
$city = str_replace("&", "-", $city);

  echo '<a title="Profile of '.$row['company'] .'" href="'. HOME.'/'.$row['id'].'/profile/'.$city.'/">&nbsp;&nbsp;» '. $row['company'].'</a>';
  

	}
	
	
	
}

	















function getcityname($id){
$qry="SELECT * FROM   sob_jobs_city where id='$id'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {
	  echo $row['name'];
  }
}
function get_keyword($id){
$qry="SELECT * FROM  sob_jobs where id='$id'";
$result2=mysql_query($qry);

while($row = mysql_fetch_array($result2))
  {
?>
<?php echo $row['title'] ?>,<?php echo $row['education'] ?>,<?php echo $row['shift'] ?> jobs,<?php get_element('sob_logemp',$row['org'],'company') ?>,jobs in <?php echo $row['place'] ?>
	<?php  
	}
}


function get_posttitle($id){
$qry="SELECT * FROM  sob_jobs where id='$id'";
$result2=mysql_query($qry);

while($row = mysql_fetch_array($result2))
  {
  
 echo $row['title']. ' Position with '.get_element('sob_logemp',$row['org'],'company'). ' in '.$row['place'];
  
	}
}



function get_pagedisc($id){
$qry="SELECT * FROM  sob_jobs where id='$id'";
$result2=mysql_query($qry);

while($row = mysql_fetch_array($result2))
  {
?>
<?php echo $row['title'] ?> position with <?php get_element('sob_logemp',$row['org'],'company') ?> in <?php echo $row['place'] ?> Afghanistan <?php  
	}
}

function get_pagedate($id){
$qry="SELECT edate FROM  sob_jobs where id='$id'";
$result2=mysql_query($qry);

while($row = mysql_fetch_array($result2))
  {
return $row['edate'];  
	}
}






/////////////get element from all
function get_element($tbl,$id,$ele){
$qry="SELECT * FROM $tbl where id='$id'";
$result2=mysql_query($qry);
while($row = mysql_fetch_array($result2))
  {
return $row[$ele];
	}
}



function get_emp_name($email){
global $dbase;
$result2=$dbase->query("Select username FROM sob_logemp where email='{$email}'");
while($row = mysql_fetch_array($result2))
  {
return $row['username'];
	}
}

function get_user_name($email){
global $dbase;
$result2=$dbase->query("Select fullname FROM sob_resume where email='{$email}'");
while($row = mysql_fetch_array($result2))
  {
return $row['fullname'];
	}
}
/////get resume
function get_resume($id){
$qry="SELECT * FROM  sob_resume where id='$id'";
$result2=mysql_query($qry);

while($row = mysql_fetch_array($result2))
  {
?>
<a target="_blank" title="Resume of <?php echo $row['fullname'] ?>" href="<?php get_re_link($row['id']) ?>">&nbsp;&nbsp;» <?php echo $row['fullname'];?> </a>
<?php  
	}
}

//////////get resume link
function get_re_link($id){
	$link="";
$rid=$id;
$sql = mysql_query("SELECT * FROM  slug where id='$rid' and type='resume'");

while($re = mysql_fetch_array($sql)){
$link=HOME.'/'.$re['slug'];
}

$sql = mysql_query("SELECT * FROM   sob_resume where id='$rid'");

while($re = mysql_fetch_array($sql)){
$slubn=$re['fullname'];
$ide=$re['id'];
}
$fullslug=strtolower($slubn);
$fullslug = str_replace(" ", "-", $fullslug);
$fullslug = str_replace("/", "-", $fullslug);
$fullslug = str_replace("&", "-", $fullslug);


if($link=="")
$link=HOME.'/cv/'.$ide.'-'.$fullslug;	
echo $link;
}


///////////////////////get


function get_job($id){
$qry="SELECT * FROM   sob_jobs where id='$id'";
$result2=mysql_query($qry);

while($row = mysql_fetch_array($result2))
  {


$cid= $row['cate'];
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
?>

 <a title="<?php echo $row['title'].' Position with '.$orgn2 ?>" href="<?php echo HOME.'/'.$fun.'/'.$row['id'].'/'.$row['slug'] ?>/">&nbsp;&nbsp;» <?php echo $row['title'];?> </a>
  
	<?php  
	}
}




function get_citybyli($country='all'){
	if($country=='all')
	$where='';
	else
	$where="and cid='$country'";
	
$qry="SELECT * FROM sob_jobs_city where stat=1";
	$result=mysql_query($qry);
	$cities= array();
	//$place = array();
	$nums= array();
		while($row = mysql_fetch_array($result))
  		{
			$place=$row['name'];
	
			
			$low=strtolower($place);
			$today=date('Y-m-d');
			$result2 = mysql_query("SELECT * FROM sob_jobs where place='$low' and edate >= '$today' and pend='0'");
			$num_rows = mysql_num_rows($result2);
			if($num_rows>0)
			$cities[$place] = $num_rows;
			//echo '<li><a title="Search Job for '.$place.' " href="'.HOME.'/location/'.$low.'"> &raquo; '.$place.' ('.$num_rows.')</a></li>';
			
			
			
			
		}
		arsort($cities); $i=0;
	foreach($cities as $key=>$value){
	$low=strtolower($key);
	echo '<li><a title="Search Job for '.$key.' " href="'.HOME.'/location/'.$low.'"> &raquo; '.$key.' ('.$value.')</a></li>';
	$i++;
	if($i==15) break;
	}
		
		//rsort($cities);
		
		//$low=strtolower($key);
		//echo '<li><a title="Search Job for '.$key.' " href="'.HOME.'/location/'.$low.'"> &raquo; '.$key.' ('.$value.')</a></li>';
		
		//}
		
		
		

}

function get_catebyli($country='1'){
	if($country=='all')
	$where='';
	else
	$where="and cid='$country'";
	
$qry="SELECT * FROM  sob_jcate ";
	$result=mysql_query($qry);
	$cities = array();
		while($row = mysql_fetch_array($result))
  		{
			
			$low=strtolower($row['catename']);
			$low = str_replace(" ", "-", $low);
			$low = str_replace("/", "-", $low);
			$low = str_replace("&", "-", $low);
			$cid=strtolower($row['id']);
			$today=date('Y-m-d');
			$result2 = mysql_query("SELECT * FROM sob_jobs where cate='$cid' and edate >= '$today' and pend='0'");
			$num_rows = mysql_num_rows($result2);
			
			if($num_rows>0)
			$cities[$row['id'].'||'.$row['catename']] = $num_rows;
			//echo ' <li><a title="Search Job for '.$row['catename'].' " href="'.HOME.'/category/'.$row['id'].'/'.$low.'"> &raquo; '.$row['catename'].' ('.$num_rows.')</a></li>';

		}
		
		arsort($cities); $i=0;
	foreach($cities as $key=>$value){
	
	$key = explode('||',$key);
	$id = $key[0];
	
			$low=strtolower($key[1]);
			$low = str_replace(" ", "-", $low);
			$low = str_replace("/", "-", $low);
			$low = str_replace("&", "-", $low);
			
	echo ' <li><a title="Search Job for '.$key[1].' " href="'.HOME.'/category/'.$id.'/'.$low.'"> &raquo; '.$key[1].' ('.$value.')</a></li>';
	$i++;
	if($i==15) break;
	}
		
		
		

}




function get_combyli(){
	
	
$qry="SELECT * FROM sob_logemp ORDER BY ID DESC";
	$result=mysql_query($qry);
	$cities = array();
		while($row = mysql_fetch_array($result))
  		{
			
			$low=strtolower($row['company']);
			$low = str_replace(" ", "-", $low);
				$low = str_replace("/", "-", $low);
				$low = str_replace("&", "-", $low);
			$cid=$row['id'];
			$today=date('Y-m-d');
			$result2 = mysql_query("SELECT * FROM sob_jobs where org='$cid' and edate >= '$today' and pend='0' ");
			$num_rows = mysql_num_rows($result2);
			
			if($num_rows>0)
			$cities[$row['id'].'||'.$row['company']] = $num_rows;
			//echo ' <li><a title="Search Job for '.$row['company'].' " href="'.HOME.'/company/'.$row['id'].'/'.$low.'"> &raquo; '.$row['company'].' ('.$num_rows.')</a></li>';
		}
		
		arsort($cities); $i=0;
	foreach($cities as $key=>$value){
	
	$key = explode('||',$key);
	$id = $key[0];
	
			$low=strtolower($key[1]);
			$low = str_replace(" ", "-", $low);
			$low = str_replace("/", "-", $low);
			$low = str_replace("&", "-", $low);
			
	echo ' <li><a title="Search Job for '.$key[1].' " href="'.HOME.'/company/'.$id.'/'.$low.'"> &raquo; '.$key[1].' ('.$value.')</a></li>';
	$i++;
	if($i==15) break;
	}
		
		

}



function get_citylist($country, $one = 'multiple'){
	
    global $dbase;
    if($country=='all')
	$where='';
	else
	$where="and cid='$country'";
	
$qry="SELECT * FROM sob_jobs_city where stat=1 $where";
	$result=$dbase->query($qry);
        if($one == 'multiple' || is_array($one))
                $typx = 'multiple';
	echo '<select data-rel="chosen" id="selectError1" type="select-op" class="form-control" '.$typx.' name="place[]">';
		//echo '<option value="">Select City</option>';
		while($row = mysqli_fetch_assoc($result))
  		{
                    $sel ='';
                    if(is_array($one)){
                        if(in_array($row['name'],$one))
                            $sel = 'selected';
                        else
                            $sel ='';
                        
                        
                    }else{
                        if($one==$row['name'] && !is_array($one))
                            $sel = "selected";
                        else
                            $sel ='';
                    }
      
			
                            echo ' <option '.$sel.' value="'.$row['name'].'">'.$row['name'].'</option>';
                        
		}
		echo '</select>';
}



function get_cilist($cid){
	global $dbase;
	
$qry="SELECT * FROM sob_jobs_city where stat=1 and cid='$cid'";
	$result=$dbase->query($qry);
	echo '<select class="form-control"  name="city">';
	echo '<option value="">Select City</option>';
		while($row = mysqli_fetch_assoc($result))
  		{
			echo ' <option value="'.$row['name'].'">'.$row['name'].'</option>';
		}
		echo '</select>';
}




function get_orglist($cate='all', $selectedx=''){
	
    global $dbase;
    if($cate=='all')
	$where='';
	else
	$where="where cate='$cate'";
	
$qry="SELECT * FROM  sob_logemp  $where ORDER BY company DESC";
	$result=$dbase->query($qry);
	echo '<select class="form-control"  name="org">';
		while($row = mysqli_fetch_assoc($result))
  		{
                    if($row['id']==trim($selectedx))
                        $selected = 'selected';
                    else 
                        $selected = '';
                    
			echo ' <option '.$selected.' value="'.$row['id'].'">'.$row['company'].'</option>';
		}
		echo '</select>';
}


function get_crdt($cid){
	
	$where="where id='$cid'";
	
$qry="SELECT * FROM  sob_logemp  $where";
	$result=mysql_query($qry);
	
		while($row = mysql_fetch_array($result))
  		{
			define( "C_CRD", $row['crdt'] );
			
		}
	
}



function get_conlist($selected=''){
$qry="SELECT * FROM sob_jobs_count where stat=1 ";
	$result=mysql_query($qry);
	echo '<select class="form-control" onchange="showcity(this.value)" id="count" name="count">';
		echo '<option value="">Select Country</option>';
		while($row = mysql_fetch_array($result))
  		{
                    
                    if($selected==$row['id'])
                        echo ' <option selected value="'.$row['id'].'">'.$row['name'].'</option>';
                    else
			echo ' <option value="'.$row['id'].'">'.$row['name'].'</option>';
		}
		echo '</select>';
}

function get_catelist($selected=''){
$qry="SELECT * FROM sob_jcate where catemo=1 ";
	$result=mysql_query($qry);
	echo '<select class="form-control" name="cate">';
	echo '<option value="">Select Category</option>';
		while($row = mysql_fetch_array($result))
  		{
			
                    if($selected==$row['id'])
                        echo ' <option selected value="'.$row['id'].'">'.$row['catename'].'</option>';
                    else
			echo ' <option value="'.$row['id'].'">'.$row['catename'].'</option>';
                    
		}
		echo '</select>';
}



function get_catelist_search(){

$today=date('Y-m-d');
$qry="SELECT DISTINCT(cate) FROM sob_jobs where edate >= '{$today}' and pend='0' order by cate";
	$result=mysql_query($qry);
	echo '<select class="form-control" name="cate">';
	echo '<option value="">Select Category</option>';
		while($row = mysql_fetch_array($result))
  		{
			echo ' <option value="'.$row['cate'].'">'.get_catename_byid($row['cate']).'</option>';
		}
		echo '</select>';
}

function get_catename_byid($id){

$qry="SELECT catename FROM sob_jcate where id='$id'";
	$result=mysql_query($qry);
	
		while($row = mysql_fetch_array($result))
  		{
			return $row['catename'];
		}
	
}


function check_email_address($email) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	return true;
	  }else{
		return false;  
	  }
    } 
    
    
    
    function placeexport($value){
       $place = explode(')|(',$value);
	   $tit= str_replace(')|(',', ',$value);
	   if(count($place)>1)
	   echo '<span rel="tooltip" title="'.ucwords($tit).'" >Multiple</span>';
      else{
      	    $placex = explode(' ',trim($place[0]));
	    echo ucwords($placex[0]);
	    }
		
		
    }
    
    
?>