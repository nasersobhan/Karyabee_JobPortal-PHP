<?php
include('config.php');




$output_dir = "upload/user/avatar/";
 
if(isset($_FILES["myfile"]))
{
    $ret = array();
 
    $error =$_FILES["myfile"]["error"];
   {
 
        if(!is_array($_FILES["myfile"]['name'])) //single file
        {
            $RandomNum   = time();
 
            $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name']));
            $ImageType      = $_FILES['myfile']['type']; //"image/png", image/jpeg etc.
 
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt       = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
 
                move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir. $NewImageName);
                 //echo "<br> Error: ".$_FILES["myfile"]["error"];
 
                     $ret[$fileName]= $output_dir.$NewImageName;
        }
        else
        {
            $fileCount = count($_FILES["myfile"]['name']);
            for($i=0; $i < $fileCount; $i++)
            {
                $RandomNum   = time();
 
                $ImageName      = str_replace(' ','-',strtolower($_FILES['myfile']['name'][$i]));
                $ImageType      = $_FILES['myfile']['type'][$i]; //"image/png", image/jpeg etc.
 
                $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
                $ImageExt       = str_replace('.','',$ImageExt);
                $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
                $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
 
                $ret[$NewImageName]= $output_dir.$NewImageName;
                move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$NewImageName );
            }
        }
    }
    
    $img = '/'.$output_dir.$NewImageName;
$_SESSION['IMG'] = '/'.$output_dir.$NewImageName;
    global $dbase;
    
    if(isset($_SESSION['J_ID'])){
   	$id =$_SESSION['J_ID'];
   	$dbase->query("UPDATE sob_resume SET img='$img' where id='$id'");
   }elseif(isset($_SESSION['C_ID'])){
   	$id =$_SESSION['C_ID'];
   	$dbase->query("UPDATE sob_logemp SET img='$img' where id='$id'");
   }


    
    echo json_encode($ret);
 
}

 
?>