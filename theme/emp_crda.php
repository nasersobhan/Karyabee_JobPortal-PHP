<?php headers() ?>

    

 
 
 
                                 <form  ID="POST" >




<table class="jobs_TBL table">

 <tr >
<td   height="20"  class="small_txt"><span class="style6"><strong>    <h1> &nbsp;&nbsp Add New City 
</h1></strong></span></td>
 <td  class="small_txt"><span class="style6"><strong><p> </p></strong></span></td>
</tr>
                  
<tr  class="blue_head">
<td   colspan="2">

Add A City

</td>
</tr>

<td style="">Name: </td>

<td style=""><input type="text" id="city"  name="city" class="validate"  /> </td>



</tr>





<tr>

<td style="">Country: </td>

<td style="">



<?Php get_conlist() ?>



</td>

</tr>



<tr>

<td style="">Action:</td>

<td style="">

<input type="button" id="submit" style="width:150px; height:40px"  name="Send" value="Add city" onclick="javascript: formget(this.form, '<?php echo HOME ?>/?emp=cityd');">

<span id="output" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp;
				</span>

  </td>



</tr>

<span id="boxnave" style="width:200px;  -webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;background-color: rgba(204,0,51,0.6);color:#fff; padding:5px 5px; position:fixed;right:-300px; bottom:40px;z-index:1000; ">

boxnave


				</span>

</table>

</form>


    </td>
    <td width="237px" valign="top"> <?php showsidebar() ?></td>
  </tr>
 
    
    
    
    
    
    
    
    
    
    





     
   


<?php footer() ?>
