<?php 
if(isset($_GET['goto'])){
$url = $_GET['goto'];
if ($url==''){
$url='http://www.sobhansoft.com/'; 

}
?>
<meta http-equiv="REFRESH" content="0;url=<?php echo $url ?>">
<?php
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8" />
<?php headertag(); ?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<meta name="msvalidate.01" content="611426D47A4B750329225D9FC26A6EE5" />


<link rel="stylesheet" href="<?php echo THEMEPATH ?>/date/plugins/full/widearea.css" type="text/css" />


<link href="<?php echo THEMEPATH ?>/date/bootstrap.min.css" rel="stylesheet" type="text/css" />
  
<link href="<?php echo THEMEPATH ?>/date/styles.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://lipis.github.io/bootstrap-social/bootstrap-social.css" type="text/css" />

<!--<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>-->
						
</head>
 <?php flush(); ?>
<body class="fixed">

<div class="container">


<table  >
  <tr>
    <td colspan="2" class="vtop"><img   height="186"  title="<?php echo PAGETITLE ?> logo" alt="<?php echo PAGETITLE ?> logo"  src="<?php echo THEMEPATH ?>/date/logo.png"  /></td>
   <h1 style="display:none;visibility:hidden">Karyabee.com All Jobs in Afghanistan</h1>
  </tr>
  <tr>
    <td colspan="2" class="vtop">
            
            <br />
        <div class="navbar navbar-inverse">
                <div class="navbar-inner noborder ">
                    <div class=" auto-center">
                        <div class="row">
                            <div class="span12">
                            	<?php
                                if(isset($_GET['page']))
                                    $page = $_GET['page'];
                                else
                                    $page = 'home';
                                
                                
                                ?>
                                <ul class="nav">
                             <li class="<?php echo ($page=='home' ? 'active' : ''); ?>"><a href="<?php echo HOME ?>/" title="Products">Home Page</a></li>



<li class="<?php echo ($page=='advertisements' ? 'active' : ''); ?>"><a href="<?php echo HOME ?>/page/advertisements" title="Brochures">Advertisements

</a></li>

<li class="<?php echo ($page=='downloads' ? 'active' : ''); ?>"><a href="<?php echo HOME ?>/page/downloads" title="Brochures">Downloads

</a></li>


<li class="<?php echo ($page=='aboutus' ? 'active' : ''); ?>"><a href="<?php echo HOME ?>/page/aboutus" title="References">About Us

</a></li>

<li class="<?php echo ($page=='contact' ? 'active' : ''); ?>"><a href="<?php echo HOME ?>/page/contact" title="Technical consulting">
Contact Us
</a></li>
                                    
                                      
                                   
                              
                                
                                               
                                </ul>
                               
                                <ul class="nav pull-right">
                                    <li>
                                        <a href="http://twitter.com/karyabee" target="_blank" class="btn btn-social-icon">
    <i class="fa fa-twitter"></i>
  </a>
                                    
                                    </li>
                                    
                                    
                                    <li> <a href="http://fb.com/karyabeewebsite" target="_blank" class="btn btn-social-icon color-white">
    <i class="fa fa-facebook"></i>
  </a></li>
                                     <!--
                                     <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Profile <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul></li>
                <li><a href="http://support.shamal.net/index.php/admin/index/logout">Logout</a></li>                    
                    
                                                 <li>      <form  class="navbar-form" role="search">
      
                                                           
                                                         <input type="text"  placeholder="Email" name="name"> <input  type="password" placeholder="Password" name="name">&NonBreakingSpace;<input type="submit" value="Login" class="btn btn-default" />
      </form>
              </li>   -->                                               
  
                                              
			                   </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    <!--        
  <div id="main_menu">           
<br/>
<ul>

<li class=" selected"><a href="<?php echo HOME ?>/" title="Products">HOME

<br /><span class="disc" id="disc1">Recent Jobs, Companies...</span></a></li>



<li><a href="<?php echo HOME ?>/page/advertisements" title="Brochures">Advertisements

<br /><span class="disc" id="disc2">Advertisements informations</span></a></li>

<li><a href="<?php echo HOME ?>/page/downloads" title="Brochures">Downloads

<br /><span class="disc" id="disc3">Downloads extra file</span></a></li>


<li><a href="<?php echo HOME ?>/page/aboutus" title="References">About Us

<br /><span class="disc" id="disc4">More about the system</span></a></li>

<li><a href="<?php echo HOME ?>/page/contact" title="Technical consulting">
Contact Us
<br /><span class="disc" id="disc5">Support & contact informations</span></a></li>
</ul><br />
</div>--> </td>
  </tr>
  
  
 <tr>
 <td class="vtop">

 <div class="TabbedPanels" style=" width:930px;">