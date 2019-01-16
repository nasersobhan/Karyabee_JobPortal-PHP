<?php
if(isset($_GET['f'])){
$file=$_GET['f'];
 define('ABSPATH',realpath(dirname(__FILE__)));
$file = ABSPATH.str_replace('|-|','/',$file);





if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}else{
    
    echo 'Problem, File not found';
}


}

?>