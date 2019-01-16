<?php headers() ?>
<title > <?php echo SNAME ?> in <?php get_element('sob_jobs_count',SCOUNT,'name') ?></title>
    

 
 
   <ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#info" data-toggle="tab">Result </a></li>


   </ul>
   
   <div class="tab-content profile-tab-content" >

    <div class="tab-pane fade active in" id="info">
 <table class="jobs_TBL table">
          <tr >
            <td   height="20"  class="small_txt"><span class="style6"><strong>
               &nbsp;&nbsp <?php echo STYPE ?> of <?php echo SCOMN ?> <span id="output2" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </strong></span></td>
          
          </tr>
         <tr class="blue_head">

<td >

<?php echo SNAME ?>
</td>

</tr>

<tr>
<td style=""><?php echo SDIS ?> </td>

</tr>


 </tr>
<tr class="blue_head">
<td >Properties Of  <?php echo SCOMN ?>
</td>

</tr>
<tr>

<td style="">
<?php echo SFEU ?><hr/>
Company Profile: <a href="<?php echo SCOMLINK ?>" title="Company Profile" target="_blank"> <?php echo SCOMN ?></a><br/><br/>

<?php if(!SPRICE==""){?>

Price: <?php echo SPRICE ?><br/><br/>
<?php } ?>

</td>

</tr>



<tr>



          <tr>
            <td style=""><?Php ads(); ?></td>
          </tr>
         
        </table>

    </td>
    <td width="237px" valign="top"> <?php showsidebar() ?></td>
  </tr>
  <tr>
    <td width="710px" valign="top">
    
    
    
    
    
<table align="left" class="jobs_TBL" style=" vertical-align:top" width="709px">






<tr class="blue_head">
<th class="style6" width="33%">
 &nbsp; &raquo; Search by Category
</th>
<th class="style6"  width="33%">
 &raquo; Search by City
</th>

<th class="style6" width="33%">
 &raquo; Search by Organization
</th>
</tr>

<tr>

<td style=" vertical-align:top">
 <ul style=" list-style:none;">
<?php get_catebyli() ?>
</ul>
</td>

<td style=" vertical-align:top">
 
          <ul style=" list-style:none;">
        <?php  get_citybyli() ?>
          
          
          </ul>
</td>

<td style=" vertical-align:top">
      <ul style=" list-style:none;">
<?php get_combyli() ?>
</ul>
</td>
</table>
 </td>
    <td width="237px" valign="top">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
 
  <tr>
          <td>
          

          
          
          </td>
          
          </tr>
 
 
</table>
 </td>
  </tr>    

<?php footer() ?>
