<?php
session_start();
//set_time_limit (120);
include( "config.php" );
global $dbase;



function sanitize_output($buffer) {
    require_once('classes/min/lib/Minify/HTML.php');
    require_once('classes/min/lib/Minify/CSS.php');
    require_once('classes/min/lib/JSMin.php');
    $buffer = Minify_HTML::minify($buffer, array(
        'cssMinifier' => array('Minify_CSS', 'minify'),
        'jsMinifier' => array('JSMin', 'minify')
    ));
	
	$search = array(
        '/\>[^\S ]+/s',  // strip whitespaces after tags, except space
        '/[^\S ]+\</s',  // strip whitespaces before tags, except space
        '/(\s)+/s'       // shorten multiple whitespace sequences
    );

    $replace = array(
        '>',
        '<',
        '\\1'
    );

    $buffer = preg_replace($search, $replace, $buffer);
$buffer =  str_replace(PHP_EOL, ' ', $buffer);
$buffer =  str_replace('---', '-', $buffer);
$buffer =  str_replace('--', '-', $buffer);
$buffer =  str_replace("\n", ' ', $buffer);



    return $buffer;
}
ob_clean();
ob_start('sanitize_output');

//if(isset($_POST)){
//
//foreach(array_keys($_POST) as $key)
//{
//  $clean[$key] = ($_POST[$key]);
//}
//
//
//}
//
//
//
//if(isset($_GET)){
//
//foreach(array_keys($_GET) as $key)
//{
//  $_GET[$key] = mysql_real_escape_string($_GET[$key]);
//}
//
//
//}

//$dbase->optimize();


global $emp;
if(isset($_SESSION['C_ID']))
    $emp = new emp_ctrl(C_ID);

if(isset( $_GET['jid'] )){
	job();
	}else if(isset( $_GET['posts'] )){
	showpost();
	}else if(isset( $_GET['cpid'] )){
	companyp();
	}else if(isset( $_GET['servid'] )){
	serv::single();	
	}else if(isset( $_GET['page'] )){
	showpage();
}else if(isset( $_GET['emp'] )){
	if($_GET['emp']=='added')
	emp::addjob();
	else if($_GET['emp']=='addjob')
		     emp::emppag();
        else if($_GET['emp']=='editjob')
		    include('theme/editjob.php');
			 else if($_GET['emp']=='city')
		     emp::addcity();
			 else if($_GET['emp']=='cityd')
		     emp::addcity_done();
			 else if($_GET['emp']=='cate')
		     emp::addcate();
			 else if($_GET['emp']=='cated')
		     emp::addcate_done();
			  else if($_GET['emp']=='com')
		     emp::addcom();
			 else if($_GET['emp']=='comd')
		     emp::addcom_done();
			 else if($_GET['emp']=='login')
		     emp::login();
			  else if($_GET['emp']=='logina')
		     emp::logina();
			 else if($_GET['emp']=='forgot')
		     emp::forgot();
			 else if($_GET['emp']=='logout')
		     emp::logout();
			 else if($_GET['emp']=='list')
		     emp::jlist();
			 else if($_GET['emp']=='credit')
		     emp::crd();
			 else if($_GET['emp']=='crd')
		     emp::crd();
			 else if($_GET['emp']=='del'){
                             $emp->delAjob(is_get('did')); // OLD emp::del();
                             redirect_to(HOME.'/emp/list');
                         }else if($_GET['emp']=='applications')
		     emp::appli();
			 else if($_GET['emp']=='rejec')
		     emp::rejecta();
			 else if($_GET['emp']=='act')
		     emp::act();
			  else if($_GET['emp']=='myinfo')
		     emp::info();
			 else if($_GET['emp']=='msgtoadmin')
		     addminmsg();
			 else if($_GET['emp']=='chp')
		     emp::info_chp();
			 else if($_GET['emp']=='che')
		     emp::info_che();
			 else if($_GET['emp']=='update')
		     emp::info_update();
			 else if($_GET['emp']=='getcrd')
		     emp::Get_crd();
			  else if($_GET['emp']=='addcrd')
		     emp::add_crd();
			  else if($_GET['emp']=='crdadd')
		     emp::add_crdp();
			  else if($_GET['emp']=='services')
		     serv::page();//////////////////adminnnnnnnnnnnnnnnnnnn
			 else if($_GET['emp']=='clist')
		     admin::comlist();
			 else if($_GET['emp']=='rlist')
		     admin::cvlist();
			 else if($_GET['emp']=='slist')
		     admin::slist();
			 else if($_GET['emp']=='plist')
		     admin::plist();
			 else if($_GET['emp']=='jlist')
		     admin::jlist();
		}else if(isset( $_GET['admin'] )){	 
			if($_GET['admin']=='comdl')
				admin::comdl();
			else if($_GET['admin']=='comsus')
				admin::comsusact();
			else if($_GET['admin']=='cvdl')
				admin::cvdl();
			else if($_GET['admin']=='cvsus')
				admin::cvsusact();
			else if($_GET['admin']=='sdl')
				admin::serdl();
			else if($_GET['admin']=='ssus')
				admin::sersusact();	
			else if($_GET['admin']=='pdl')
				admin::pdl();
			else if($_GET['admin']=='psus')
				admin::psusact();	
			else if($_GET['admin']=='jdl')
				admin::jdl();
			else if($_GET['admin']=='jsus'){
				 if(is_get('t')==0)
                                        $emp->susAjob(is_get('jeid'));
                                     else
                                        $emp->pubAjob(is_get('jeid')); // OLD admin::jsusact(); 
                                     redirect_to(HOME.'/emp/list');
                        }		
	}else if(isset( $_GET['user'] )){
            $uc = new user;
            
		if($_GET['user']=='register')
			$uc->addn();
		else if($_GET['user']=='reg')
		     $uc->addnew();
		else if($_GET['user']=='login')
		     $uc->login();
		else if($_GET['user']=='recoverpassword')
		     $uc->recover();
		else if($_GET['user']=='resume')
		     $uc->resume();
		else if($_GET['user']=='update')
		     $uc->update();
		else if($_GET['user']=='cover')
		     $uc->coverx();
		else if($_GET['user']=='addexp')
		     $uc->addexp();
		else if($_GET['user']=='exp')
		     $uc->loadexp();
		else if($_GET['user']=='expdl')
		     $uc->expdl();
		else if($_GET['user']=='addedu')
		     $uc->addedu();
		else if($_GET['user']=='edudl')
		     $uc->edudl();
		else if($_GET['user']=='addlang')
		     $uc->addlang();
		else if($_GET['user']=='langdl')
		     $uc->langdl();
		else if($_GET['user']=='addit')
		     $uc->addit();
		else if($_GET['user']=='itdl')
		     $uc->itdl();
		else if($_GET['user']=='applications')
		     $uc->applyd();
		else if($_GET['user']=='japp')
		     $uc->jappic();
		else if($_GET['user']=='cvup')
		     $uc->cvup();
		else if($_GET['user']=='cv')
		     $uc->cv();
		else if($_GET['user']=='chpass')
		     $uc->chpass();
		else if($_GET['user']=='chep')
		     $uc->info_Che();
		else if($_GET['user']=='chpp')
		     $uc->info_Chp();
	
	}else if(isset($_GET['search'] )){
		 if($_GET['search']=='phone')
		     search::phone();
		 else if($_GET['search']=='job')
		     search::job();
		else if($_GET['search']=='resume')
		     search::resume();
		else if($_GET['search']=='company')
		     search::company();	
		else if($_GET['search']=='service')
		     search::service();
	}else if(isset($_GET['ser'] )){
		 if($_GET['ser']=='add')
		     serv::add();
		 else if($_GET['ser']=='del')
		     serv::del();
			 
			 
			 
			 
	}else if(isset( $_GET['options'] )){
		if($_GET['options']=='city')
			get_cilist();
		
	}else {
		home();
		
		
		
		}


hitrecord();














?>