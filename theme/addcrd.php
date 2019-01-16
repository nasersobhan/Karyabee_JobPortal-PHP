<?php headers() ?>

    <title> Add New Credit Card | <?php echo PAGETITLE ?>  </title>
<div class="tab-content profile-tab-content" style="padding-top:40px;" ><div class="tab-pane fade active in" id="jobs">
 
 
                                 <form  ID="POST" >




<table class="jobs_TBL table">

 <tr >
<td   height="20" colspan="2"  class="small_txt"><span class="style6"><strong>    <h1> &nbsp;&nbsp Add Credit Card : <span id="output" style="color: blue; font-family:tahoma; font-size:12px; text-align:center">&nbsp;
				</span>
</h1></strong></span></td>
</tr>
                  
<tr  class="blue_head">
<td   colspan="2">

Add New Credit Card

</td>
</tr>

<tr>
<td style="">Credit Number  (18 Numbers): </td>
<td style=""><input type="text" id="city" value="<?php echo substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,18); ?>"  name="crdnum" size="30" max="18" class="validate[required]"  /> </td>
</tr>

<tr>
<td style="">Amount: </td>
<td style="">
<select name="munt">
<option value="10">10</option>
<option value="20">20</option>
<option value="30">30</option>
<option value="40">40</option>
<option value="50">50</option>
<option value="80">80</option>
<option value="100">100</option>
<option value="200">200</option>
<option value="500">500</option>
<option value="1000">1000</option>
</select>

</td>
</tr>






<tr>

<td style="">Action:</td>

<td style="">

<input type="button" id="submit" style="width:150px; height:40px"  name="Send" value="Add Credit" onclick="javascript: formget(this.form, '<?php echo HOME ?>/?emp=addcrd');">



  </td>



</tr>

<tr class="blue_head">

<td colspan="2"  style=""><b>Unused Credits</b></td>

</tr>

<?Php 

$qry="SELECT * FROM  sob_crd where stat='1'";
		$result2=mysql_query($qry);
		
	
while($row = mysql_fetch_array($result2))
  {?>

<tr>

<td valign="top" style=""><?php echo $row['crdnum'] ?></td>

<td style="">

<?php echo $row['munt'] ?>




  </td>



</tr>

<?php   }  
  
  ?>



</table>
</div></div></div>
</form>


    </td>
    <?php showsidebar() ?>
  </tr>
 
    
    
    
    
    
    
    
    
    
    





     
   


<?php footer() ?>
