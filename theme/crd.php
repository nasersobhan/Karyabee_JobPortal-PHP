<?php headers() ?>

    <title> How to Get Credit </title>
    
 <ul class="nav nav-tabs profile-tab" style="border:0;">
    <li class="active"><a href="#jobs" data-toggle="tab">Add Credit</a></li>

   </ul>
   
   <div class="tab-content profile-tab-content" >



<div class="tab-pane fade active in" id="jobs">
 
 
 
                                 <form  ID="POST" >




<table class="jobs_TBL table">

 <tr >
<td   height="20" colspan="2"  class="small_txt"><span class="style6"><strong>    <h1> &nbsp;&nbspInsert Credit <span id="output" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp;
				</span>
</h1></strong></span></td>
</tr>
                  
<tr  class="blue_head">
<td   colspan="2">

Please Send Request for Credit 

</td>
</tr>

<tr>


<td colspan="2" style="padding: 25px">

 </td>



</tr>




<tr>
<td style="">Credit Number  (18 Numbers): </td>
<td style=""><input type="text" id="city"  name="crdnum" size="30" max="18" class="validate"  /> </td>
</tr>

<tr>
<td style="">Amount: </td>
<td style=""><input type="text" id="city"  name="munt" size="10" class="validate"  /> </td>
</tr>






<tr>

<td style="">Action:</td>

<td style="">

<input type="button" id="submit" style="width:150px; height:40px"  name="Send" value="Send Request" onclick="javascript: formget(this.form, '<?php echo HOME ?>/?emp=getcrd');">



  </td>



</tr>

<span id="boxnave" style="width:200px;  -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;background-color: rgba(204,0,51,0.6);color:#fff; padding:5px 5px; position:fixed;right:-300px; bottom:40px;z-index:1000; ">

boxnave


				</span>

</table>

</form>


   </div>
  </div>

 <?php showsidebar() ?></td>

<?php foot() ?>

<?php footer() ?>