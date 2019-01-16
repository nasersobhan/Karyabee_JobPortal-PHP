<?php 


echo 'Service Unavilable at the moment, Sorry, we will fix it ASAP.';
exit();



if(isset($_GET['xid']) && $_GET['xid']!=''){
    
    $rid = $_GET['id'];
$cid = $_GET['xid'];
    
global $dbase;

$qry="SELECT * FROM  sob_user_prr where id='".$rid."' AND code='".$cid."'";
$result2= $dbase->query($qry);
$row = $dbase->fetch_assoc($qry);

    
if(isset($_POST['password']) && isset($_POST['repassword'])){
    if($_POST['password']==$_POST['repassword']){
        if($row['type']==1){
            
            $result2= $dbase->query("UPDATE sob_logemp SET password='".md5($_POST['password'])."' where email='".$row['email']."'");
            if($result2) echo 'Password Change Succefully';
              $dbase->query("DELETE FROM sob_user_prr where  id='".$row['id']."'");
        }elseif($row['type']==2){
        $result2= $dbase->query("UPDATE sob_resume SET password='".md5($_POST['password'])."' where email='".$row['email']."'");
              if($result2) echo 'Password Change Succefully';
             $dbase->query("DELETE FROM sob_user_prr where  id='".$row['id']."'");
        }
        
        
    }else{
        echo 'the passwords did not match';
        
    }
    
    
    
}
    
}else{



headers(); ?>
<title> Password Forgot | <?php echo PAGETITLE ?></title>






<div class="tab-content profile-tab-content" style="padding-top:40px;" ><div class="tab-pane fade active in" id="jobs">

                                 
<table class="jobs_TBL table">
    
    
    
   
    
    
    <tr >
<td colspan="2"><span class="style6"><strong>    <h1> &nbsp;&nbsp Password Recovery Request
</h1></strong></span></td>
</tr>

 



 <?php 
$rid = $_GET['rid'];
$cid = $_GET['cid'];



global $dbase;

$qry="SELECT * FROM  sob_user_prr where id='".$rid."' AND code='".$cid."'";
$result2= $dbase->query($qry);
$row = $dbase->fetch_assoc($qry);
if($row){
$type = $row['type'];
$newcode = $row['code'];
//$result2= $dbase->query("UPDATE sob_user_prr SET code='".'re-'.$newcode."' where id='".$rid."'");

    if($type==1 || $type==2){ ?>
    
    
    
   
                  
<tr  class="blue_head">
<td   colspan="2">

Change Your Password

</td>
</tr>
    
    
    

 <form ajaxform action="<?php echo HOME ?>/?page=resetpass&xid=<?php echo $newcode; ?>&id=<?php echo $row['id']; ?>" method="post"  id="recoverpassword">
<tr>
<td class="w300">Email: </td>

<td ><?php echo $row['email']?> </td>

</tr>



<tr>
<td class="w300">New Password: </td>

<td ><input type="text" id="password" requireds name="password" class="validate"  /> </td>

</tr>


<tr>
<td class="w300">New Password: </td>

<td ><input type="text" id="repassword" requireds name="repassword" class="validate"  /> </td>

</tr>




<tr>

<td>Action:</td>

<td >
<button type="submit" class="btn btn-default">Submit Form</button>
<span id="result_mess" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp;
				</span>

  </td>



</tr>
</form>



  <?php  }   
}else{
    
    ?>
   

<tr>

<td colspan="2">

<span style="color: red; font-family:tahoma; font-size:12px; text-align:center">invalid Request</span>

  </td>



</tr>
   <?php
}

?>
    



</table>




 <?php showsidebar() ?></td>

<?php foot() ?>

<?php footer(); } ?>