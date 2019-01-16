<?Php 
class admin{
	///////////////companies
	function comlist(){
		include('theme/admin/comlist.php');
	}
	function comdl(){
	admin::delete($_GET['cid'],'sob_logemp','id');	
	}
	function comsusact(){
	admin::susact($_GET['cid'],'sob_logemp','id',$_GET['t']);
	}
	/////////////////////////resume
	function cvlist(){
		include('theme/admin/reslist.php');
	}
	function cvdl(){
	admin::delete($_GET['rid'],'sob_resume','id');	
	}
	function cvsusact(){
	admin::susact($_GET['rid'],'sob_resume','id',$_GET['t']);
	}
	//////////////////////////////////////service
	function slist(){
		include('theme/admin/slist.php');
	}
	function serdl(){
	admin::delete($_GET['sid'],'emp_service','id');	
	}
	function sersusact(){
	admin::susact($_GET['sid'],'emp_service','id',$_GET['t']);
	}
	//////////////////////////////////////////////////////////PHONE LIST
	function plist(){
		include('theme/admin/plist.php');
	}
	function pdl(){
	admin::delete($_GET['pid'],'dir_phone','id');	
	}
	function psusact(){
	admin::susact($_GET['pid'],'dir_phone','id',$_GET['t']);
	}
	///////////////////////JOB LIST
	function jlist(){
		include('theme/admin/jlist.php');
	}
	function jdl(){
	admin::delete($_GET['jeid'],'sob_jobs','id');	
	}
	function jsusact(){
	admin::susactj($_GET['jeid'],'sob_jobs','id',$_GET['t']);
	}
	
	/////////////////////////other functions 
	function delete($id,$tbl,$ele){
	$qry="delete FROM $tbl where $ele='$id'";
	$result2=mysql_query($qry);
	if (!$result2)
    echo mysql_error();
    else
    echo 'Deleted';
	}
	function susact($id,$tbl,$ele,$wh){
	if($wh=='1')
	$wh='0';
	else if($wh=='0')
	$wh='1';
	
	$qry="update $tbl set active='$wh' where $ele='$id'";
	$result2=mysql_query($qry);
	if (!$result2)
    echo mysql_error();
    else
    echo $id.' is '.$wh.' Now';
	}
	function susactj($id,$tbl,$ele,$wh){
	if($wh=='1')
	$wh='0';
	else if($wh=='0')
	$wh='1';
	
	$qry="update $tbl set pend='$wh' where $ele='$id'";
	$result2=mysql_query($qry);
	if (!$result2)
    echo mysql_error();
    else
    echo $id.' is '.$wh.' Now';
	}
}

?>