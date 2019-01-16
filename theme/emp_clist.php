<?php headers() ?>
 
    
             
<?php 

			$result2 = mysql_query("SELECT * FROM sob_logemp ORDER BY company");
			$all_rows = mysql_num_rows($result2);
			
			?>
    
    
    
    
<tr>
    <td width="710px" valign="top">
    
    
    

 
      
                <table width="709px" border="0" align="center" cellpadding="0" class="blue_bg" cellspacing="0">
               
                         <tbody>
                          <tr >
                    
                    <td  colspan="2" height="20"  class="small_txt"><span class="style6"><strong>    <h1> &nbsp;&nbsp All Jobs you posted 
			
			
            
            
            
            </h1></strong></span></td>
                    
                    <td colspan="1"  class="small_txt"><span class="style6"><strong><p> &raquo; You posted : <?php echo $all_rows ?> jobs yet</p></strong></span></td>
                  </tr>
                         
                  <tr class="blue_head">
                    
                  <td width="200px" height="20"  class="small_txt"><span class="style6"><strong>&nbsp;&nbsp;Company Name</strong></span></td>
                                      <td width="12%"  class="small_txt"><span class="style6"><strong>Cate</strong></span></td>
                  
                
              
                
                         <td width="12%"  class="small_txt"><span class="style6"><strong>active</strong></span></td>
                        
              
                          
				  
			  </tr>
                        
				    
				
				  
 

<title> My Jobs | <?php echo PAGETITLE;?> </title>


</tbody>
</table>
</td>
</tr>
<tr>
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
          
      <?php ads(); ?>
          
          
          </td>
          
          </tr>
 
 
</table>


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </td>
  </tr>    
    
    
    
    
    
    
    
    
    
    





     
   


<?php footer() ?>