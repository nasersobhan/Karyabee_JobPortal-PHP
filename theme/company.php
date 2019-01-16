<?php headers() ?>
<title > <?php echo CNAME ?>'s
 Profile | <?php echo PAGETITLE ?> </title>
    
 <ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#info" data-toggle="tab">Profile </a></li>


   </ul>
   
   <div class="tab-content profile-tab-content" >

                                
   <div class="tab-pane fade active in" id="info">
 
 
 
 <table class="jobs_TBL table">
          <tr >
            <td   height="20"  class="small_txt"><span class="style6"><strong>
               &nbsp;&nbsp Organization/Company Profile <span id="output2" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp; </span>
            </strong></span></td>
            
          </tr>
         <tr class="blue_head">

<td  >

<?php echo CNAME ?>'s
 Profile
</td>

</tr>


<?php
if(!CLOGO==""){?>
<tr>



<td  style="">
<img style="max-width:500px; max-height:100px;" src="<?php echo CLOGO ?>" />
</td>

</tr>
<?php }?>
<tr>



<td style="">Company Name: <?php echo CNAME ?> </td>

</tr>



<tr>


<td style="">Industry type: <?php echo CCATE ?></td>

</tr>







<tr>



<td style="">Country: <?Php echo CCOUNT ?></td>

</tr>



<tr>



<td style="">Main Office City: 
<?php echo CCITY ?>

</td>

</tr>

<tr class="blue_head">

<td >

About

</td>

</tr>

<tr>

<td style="padding:15px; "> <?php echo CABOUT ?> </td>

</tr>





 <?php  serv::loaddata(ID,CNAME); ?> 



<tr class="blue_head">

<td >

Contact information

</td>

</tr>





<tr>



<td  style="padding:15px; line-height:2">
<?php if(!CPEMAIL==""){ ?>
Email: <a title="" href="mailto:<?php echo CPEMAIL ?>"><?php echo CPEMAIL ?></a><br/>
<?php } if(!CPHONE==""){ ?>
Phone: <?php echo CPHONE ?> <br/>
<?php } if(!CWSITE==""){ ?>
Website::  <a target="_blank" title="" href="<?php echo HOME ?>?goto=<?php echo CWSITE ?>"><?php echo CWSITE ?></a><br/>
<?php } if(!CADD==""){ ?>
Address: <?php echo CADD ?> <br/>
<?php } ?>
</td>

</tr>








<tr >

<td align="right" >

<?php if(!CTWT==""){ ?>

<a title="twitter" href="http://twitter.com/<?php echo CTWT ?>" target="_blank"><img src="<?php echo HOME?>/theme/date/_4-afg.com_twitter.png" title="twitter page" alt="Twitter" width="34" height="34" name="twitter" border="0" id="twitter"/></a>

<?php } if(!CFB==""){ ?>


<a title="our fb" href="http://www.facebook.com/<?php echo CFB ?>" target="_blank"><img src="<?php echo HOME?>/theme/date/_4-afg.com_fb.png" title="facebook" alt="Facebook" width="34" height="34" name="facebook" border="0"/></a>


<?php } if(!CGP==""){ ?>





<a title="plue one" href="https://plus.google.com/<?php echo CGP ?>" target="_blank"><img src="<?php echo HOME?>/theme/date/_4-afg.com_googlepage.png" alt="Google Page" width="34" title="google Page" height="34" name="google_page" border="0"/></a>


<?php } if(!CYM==""){ ?>

<a title="chat with me" target="_blank" href="ymsgr:sendim?<?php echo CYM ?>"><img border="0" src="<?php echo HOME?>/theme/date/_4-afg.com_ym.png" title="Yahoo Massanger" alt="Yahoo Mesenger" width="34" height="34"/></a>

<?php } ?>

</td>




<tr>



          <tr>
            <td  style=""><?Php ads(); ?></td>
          </tr>
         
        </table>

   
    </div>
</div>
</div>



    </td>
    <?php showsidebar() ?>
  </tr>
<?php footer() ?>
