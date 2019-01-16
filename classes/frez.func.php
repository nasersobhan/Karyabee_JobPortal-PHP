<?php 


function getcurrentpath($e=true){
	if($e)
	echo 'http://'.CURPATH;
	else
	echo 'http://'.CURPATH;
}

function getdatapath(){
	return HOME.'core/ss_data';
}

function get_funuri(){
	global $sysget;
return REALPATH.DIRPATH.$sysget.'/ss_functions';
}








	function file_cleanup($var){
	$var=strtolower($var);
	$var = str_replace(" ", "-", $var);
	$var = str_replace("'", "-", $var);
	$var = str_replace("&", "-", $var);
	$var = str_replace(".", "-", $var);
        $var = str_replace(",", "-", $var);
	return $var;
}	

function encodeURL($str,$ky='23444444'){ 
if($ky=='')return $str; 
$ky=str_replace(chr(32),'',$ky); 
if(strlen($ky)<8)exit('key error'); 
$kl=strlen($ky)<32?strlen($ky):32; 
$k=array();for($i=0;$i<$kl;$i++){ 
$k[$i]=ord($ky{$i})&0x1F;} 
$j=0;for($i=0;$i<strlen($str);$i++){ 
$e=ord($str{$i}); 
$str{$i}=$e&0xE0?chr($e^$k[$j]):chr($e); 
$j++;$j=$j==$kl?0:$j;} 
return $str; 
} 








function ss_die($text){
	
	echo '
	<p style="margin:15px auto;padding:10px; border:2px solid #666; width:500px; ">'.
	$text
	.'</P>';
	exit();
	}
	
function mysql_cleanup2($value){
					$value = str_replace('"',"&quot;",$value);
					$value = str_replace("'","&acute;",$value);
					$value = str_replace("'","&acute;",$value);
					
					$value = str_replace("script","scrip t",$value); //no easy javascript injection
					$value = str_replace("union","uni on",$value); //no easy common mysql temper
		
					$value = htmlentities($value, ENT_QUOTES); //encodes the string nicely
					$value = addslashes($value); //mysql_real_escape_string() //htmlentities
		
				
				
	
	return $value;
}


function uploadfile($file,$privacy=9){
return $file['bank_fish']['tmp_name'];
	
}

function date2mysql($date){
	if(!empty($date)){
$date = explode('/', $date);
return $date[2].'-'.$date[1].'-'.$date[0];
	}else
	return '';
}



function un_link_cleanup($var){
	$var = str_replace("-", " ", $var);
	$var=ucwords($var);
	return $var;
}

function link_cleanup($var){
	$var=strtolower($var);
	$var = str_replace(" ", "-", $var);
	$var = str_replace("/", "-", $var);
	$var = str_replace("&", "-", $var);
	return $var;
}



function check_required_fields($required_array) {
	$field_errors = array();
	if(is_array($required_array)){
	foreach($required_array as $fieldname) {
		if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && $_POST[$fieldname] != 0)) { 
			$field_errors[] = $fieldname; 
		}
	}
	}else{
		if (!isset($required_array) || (empty($required_array) && $required_array != 0)) { 
			$field_errors[] = $fieldname; 
		}
	}
	return $field_errors;
}
function check_required_field($required_field) {
	if (!isset($required_field) || (empty($required_field)) || $required_field =="")
		return false; 
		else
		return true;
}

function check_number($element){

	return !preg_match ("/[^0-9]/", $element);
}	


//messageing

function send_message($to,$name, $title, $vars, $temp){
	global $settings;
			$mail             = new PHPMailer(); // defaults to using php "mail()"
			$body             = file_get_contents(HOME."/temp/mail/".$temp.".stem");
			$body             = eregi_replace("[\]",'',$body);

			 $mail->IsSMTP(); // telling the class to use SMTP
		
			$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)						   
			$mail->SMTPAuth   = $settings['AUTU'];                  // enable SMTP authentication
			$mail->Host       = $settings['MAILSERVER']; // sets the SMTP server
			$mail->Port       = $settings['MAILPORT'];                    // set the SMTP port for the GMAIL server
			$mail->Username   = $settings['USERNAME']; // SMTP account username
			$mail->Password   = $settings['PASSWORD'];        // SMTP account password
			
			$mail->SetFrom($settings['USERNAME'], 'Auto Mailer Karyabee');
			
			$mail->AddReplyTo("info@karyabee.com","Karyabee Informations");
			
			$mail->Subject    = $title;
			
			$mail->AltBody    = $body; // optional, comment out and test
			
			$mail->MsgHTML($body);
			
			$address = "whoto@otherdomain.com";
			$mail->AddAddress($to, $name);
			
			//$mail->AddAttachment("images/phpmailer.gif");      // attachment
			$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
			
			if(!$mail->Send()) {
			  return false;
			} else {
			  return true;
			}
		
	}
	
/// result rabon style
function res_rabon($value, $success_text = 'Successful.'){
	if($value == "Success"){
		return '<div class="callout callout-info">'.$success_text.'</div>';
	}else{
		return '<div  class="callout callout-warning">'.$value.'</div>';
	}
	
	
	}
	
	
function check_duplicate($value, $table, $feild){
	global $dbase;
	$query = "SELECT * FROM {$table} WHERE {$feild}='{$value}'";
	$numrow = $dbase->num_rows($query);
	if ($numrow > 0) {
 		return false;
	}else{
		return true;
	}
}
	

function check_max_field_lengths($field_length_array) {
	$field_errors = array();
	foreach($field_length_array as $fieldname => $maxlength ) {
		if (strlen(trim(mysql_cleanup($_POST[$fieldname]))) > $maxlength) { $field_errors[] = $fieldname; }
	}
	return $field_errors;
}

function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysql_error());
		}
	}

function limite_words($string,$ct)
{
	$string = strip_tags($string);
	if (strlen($string) > $ct) {
		$stringCut = substr($string, 0, $ct);
		$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
	}
	echo $string;
}

function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1; 
$title='صفحه ها'; 
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $ss_query, $max_num;
         $pages = $max_num;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>صفحه ".$paged." از ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a title='$title' href='".get_pagenum_link(1)."'>&laquo; اول</a>";
         if($paged > 1 && $showitems < $pages) echo "<a title='$title' href='".get_pagenum_link($paged - 1)."'>&lsaquo; قبلی</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a title='$title' href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a title='$title' href=\"".get_pagenum_link($paged + 1)."\">بعدی &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a title='$title' href='".get_pagenum_link($pages)."'> اخرین &raquo;</a>";
         echo "</div>\n";
     }
}


function testcount(){
global $dbase;
$dbase->query("UPDATE engine_settings SET value=value+1 where name='testcount'");	
}


function generatePassword ($length = 8)
  {

    // start with a blank password
    $password = "";

    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
    $possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";

    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);
  
    // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
      $length = $maxlength;
    }
	
    // set up a counter for how many characters are in the password so far
    $i = 0; 
    
    // add random characters to $password until $length is reached
    while ($i < $length) { 

      // pick a random character from the possible ones
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);
        
      // have we already used this character in $password?
      if (!strstr($password, $char)) { 
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
        // ... and increase the counter by one
        $i++;
      }

    }

    // done!
    return $password;

  }




//HAVE_POST FUNCTION
function have_post() {
global $posts, $post_count, $post_index;

if ($posts && ($post_index <= $post_count)){
    $post_count = count($posts)-1;
    return true;
}
else {
    $post_count = 0;
    return false;
}
}

//THE_POST FUNCTION
function the_post() {
global $posts, $post, $post_count, $post_index;

//$post = new query($post1);
// make sure all the posts haven't already been looped through
if ($post_index > $post_count) {
    return false;
}
$post = $posts[$post_index];
// retrieve the post data for the current index
//$post = $posts[$post_index+1];
//$posts = new query($job);
// increment the index for the next time this method is called
$post_index++;
return $post;

}


function getvoteu($tid,$type=1,$vtype=1){
global $dbase, $pxt;
$num = $dbase->num_rows("Select * from {$pxt}vote where pid={$tid} and type={$type} and vtype={$vtype}");
echo $num;
}






function getrankname($id){
if($id=1)
echo "Admin";
elseif($id=0)
echo "Stuff";
}

function getstatename($id){
if($id=1)
echo "Active";
elseif($id=0)
echo "Pending";
}


function get_anw_co($tid){
global $dbase, $pxt;
$num = $dbase->num_rows("Select * from {$pxt}replay where postid={$tid}");
echo $num;
}


function getattchedfiles($type, $id){
		global $dbase, $pxt;
		$ss_query = "SELECT * FROM ".$pxt."attachs where type={$type} and tid={$id}";
		$jobx = $dbase->query($ss_query);
		while($r = $dbase->fetch_array($jobx)) {
		$filename = explode('-', basename($r['fileurl']));
		$filename = end($filename);
		echo '<li id="'.$r['id'].'"><a href="'.HOME.'download.php?aid='.$r['id'].'" >'.$filename.'</a></li>';
		}

}

function sendmsg($title,$text,$to){
	global $dbase, $pxt;
		$arr= array('mtitle'=>$title,'mtext'=>$text,'mfrom'=>UID,'mto'=>$to);
		$dbase->RowInsert("{$pxt}msg", $arr);
		
}

function getpagelink($page,$sys,$id=''){
	
	return HOME.$sys.'/'.$page.'.html';
}


function loginrequired(){
	global $ac;
	if(!$ac->isUserLoggedIn()){
		$_SESSION['redirectlink'] =getcurrentpath(0);
		redirect_to(getpagelink('login','account'));
	}
	
	
}
?>