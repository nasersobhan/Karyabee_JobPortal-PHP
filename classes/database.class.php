<?PHP 
class ss_db 
{ 
    var $_version = "2.3"; 
    var $_lastupdate = "9/20/2012"; 
    var $_author = "Naser"; 
    function ss_db($args) 
    { 
        $arg = explode(":", $args); 
        $this->host = $arg[0]; 
        $this->database = $arg[1]; 
        $this->username = $arg[2]; 
        $this->password = $arg[3]; 
        $this->connect(); 
        //$this->select_db(); 
        //$this->close(); 
    } 

    function connect()  
    { 
      //  $this->connect = @mysqli_connect("$this->host", "$this->username", "$this->password"); 
      //  if(!$this->connect) 
      //  { 
       //     $this->error("mysqli Connection Error","Failed connecting to database server\r\n\r\n" . mysqli_error() . ""); 
       // } 
		
		
		$this->connect = new mysqli("$this->host", "$this->username", "$this->password", "$this->database");
        return $this->connect; 
    } 

   /* function select_db()  
    { 
        $this->select_db = @mysqli_select_db($this->database, $this->connect); 
        if(!$this->select_db)  
        { 
            $this->error("mysqli Connection Error","Failed selecting to database\r\n\r\n" . mysqli_error() . ""); 
        } 
        return $this->select_db; 
    } */
    function query($query)  
    { 
        $reslut_query = mysqli_query($this->connect, $query); 
        if(!$reslut_query)  
        { 
            $this->error("mysqli Query Error","Error Message: Failed executing database query\r\nDate/Time: " . date('Y-m-d H:i:s') . "\r\nQuery: $query\r\nmysqli Error: ");// . mysqli_error($this->connect) . ""); 
        
		}
		return $reslut_query; 	
	

       /* $detect1 = preg_replace('/DELETE/siU', 1, $query); 
        $detect2 = preg_replace('/UPDATE/siU', 1, $query); 
        $detect3 = preg_replace('/INSERT/siU', 1, $query); 

        if($detect1 == 1 || $detect2 == 1 || $detect2 == 1)  
        { 
            $this->affected_rows = mysqli_affected_rows(); 
           // $this->affected_rows_total += $this->affected_rows; 
        } */

        //$this->counter++; 
        
    } 

    function fetch_row($query)  
    { 
        $thisresult =  $this->query($query);
		//if($thisresult){
        	$thisrow = mysqli_fetch_array($thisresult); 
			//if($thisrow)
				return $thisrow; 
			//else
			//	return false;	
		//}
		//}
    } 
	
	
	
	
 function fetch_assoc($query)  
    { 
	

       $result = $this->query($query);
	   //if($reslut_query) 
     	$returns =  mysqli_fetch_assoc($result); 
		//else
		//return $reslut_query;
		//$resultarr = mysqli_fetch_assoc($this->result);
		/* if(!$this->result)  
        { 
       $this->error("mysqli Query Error","Error Message: Failed executing database query\r\nDate/Time: " . date('Y-m-d H:i:s') . "\r\nQuery: $query\r\nmysqli Error: " . mysqli_error($this->connect) . ""); 
        }else{
			 $this->row = mysqli_fetch_assoc($this->result); 
		}*/
		
		
       return $returns;
       // $this->counter++; 
     
    } 
    function fetch_array($query)  
    { 
	
			/*NOT WORKING*/
	
	$queryx =  $this->query($query);
		//if($thisresult){
        return mysqli_fetch_array($queryx); 
        //return  $thisre; 
		//return @mysqli_fetch_array($query); 
    } 
	
	
	 function lastinserted_id()  
    { 
		//$this->result =  $this->query($query);
        return mysqli_insert_id($this->connect); 
        //return  $thisre; 
		//return @mysqli_fetch_array($query); 
    } 
	
	
	
    function num_rows($query)  
    { 
        $this->result = $this->query($query); 
		
        
		
		//if(mysqli_error()) exit($q.'<br>'.mysqli_error()); 
		 if(!$this->result)  
        { 
       $this->error("mysqli Query Error","Error Message: Failed executing database query\r\nDate/Time: " . date('Y-m-d H:i:s') . "\r\nQuery: $query\r\nmysqli Error: " . mysqli_error($this->connect) . ""); 
        }else{
			$this->num_rows = mysqli_num_rows($this->result); 
		}
		
		if(isset($this->num_rows))
       		return $this->num_rows; 
    } 
    function count_queries()  
    { 
        return $this->counter; 
    } 

    function affected_rows()  
    { 
        if($this->affected_rows_total == '0')  
        { 
            $this->affected_rows_total = '0'; 
        }     
        return $this->affected_rows_total;  
    } 
    function list_dbs() 
    { 
        return mysqli_list_dbs(); 
    } 
    function tablename($query) 
    { 
        return mysqli_tablename($query, $this->connect); 
    } 
    function num_fields($query) 
    { 
        return mysqli_num_fields($query, $this->connect); 
    } 
    function error($title,$msg) 
    { 
       $page = "<html>\n\<head>\n\t<title>$title</title>\n</head>\n<body>\n\t<p>$msg</p>\n</body>\n</html>"; 
       print $page; 
    } 
    function list_tables() 
    { 
        $sql = $this->query("SHOW TABLES FROM $this->database"); 
        while($row = $this->fetch_array($sql)) 
        { 
            $tables[] = $row[0]; 
        } 
        return $tables; 
    } 
	
	function fetch_field($tbl){
            
            
          $obj =  $this->query("SHOW COLUMNS FROM " . $tbl);
                while($fields = $obj->fetch_object()) {
                    $columns[] = $fields->Field;
                }
                return $columns;
           
            
        }
	
	function fetch_field_q($query){
            
            $sql = $this->query($query); 
                 
                 $feild = array();
                //$x=1;
                 while($row = mysqli_fetch_field($sql)) 
                  { 
                      $feild[] = $row->name; 
//                      $feild[$x]['orgname'] = $row->orgname; 
//                      $feild[$x]['max_length'] = $row->max_length; 
//                      $feild[$x]['type'] = $this->cln_datatype($row->type); 
//                      $feild[$x]['def'] = $row->def; 
                     // $feild[$x]['name'] = $row->; 
                      
               
                  } 
                  
                  
                  return $feild; 
        }
        
        
        function cln_datatype($val){
            switch ($val){
                case 3:
                    $x = 'INTEGER';break;
                case 252:
                    $x = 'TEXT';break;
                case 7:
                    $x = 'TIMESTAMP';break;
                case 12:
                    $x = 'DATETIME';break;
                case 253:
                    $x = 'VARCHAR';break;
                    
            }
            
            
            return $x;
                    
        }
	

	
	
	
	
	
	

    function close()  
    { 
        //register_shutdown_function('mysqli_close'); 
		//register_shutdown_function("autoclean");   
		//register_shutdown_function("mysqli_close");
		mysqli_close($this->connect());
    } 
    function escape($arr) 
    { 
	
	if(is_array($arr)){
		 foreach($arr as $k => $v) 
            { 
				return $this->escape($arr);	
			}
	}else{
		return $this->escap_single($arr);	
	}
	
	
	
	}
	
	
	
	
	
	function escap_single($arr){
				if (function_exists('get_magic_quotes')) 
            			{ 
                if(!get_magic_quotes_gpc()) 
                { 
                    $arr = stripslashes($arr); 
                } 
               } 
              
				
				
				 $search = array(
				'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
				'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
				'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
				'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
			  );
			  
			  	$arr = str_replace("'",'&acute;',$arr);
				$arr = str_replace('"','&acute;',$arr);
                                $arr = str_replace(',',' ',$arr);
				//$arr = preg_replace($search, '', $arr);
				//if(function_exists('mysqli_real_escape_string')) 
				//$arr = mysqli_real_escape_string($this->connect, $arr) ;
				//else 
				//$arr = addslashes($arr); 
				//return $cleaned;
                return $arr; 	
		
	}
	
	
	
	
    function clean_html($arr) 
    { 
        if(is_array($arr)) 
        { 
            foreach($arr AS $ar) 
            { 
                $this->clean_html($ar); 
            } 
        } 
        else 
        { 
            return(htmlentities($arr)); 
        } 
    } 
    function clean($arr = '') 
    { 
        if(is_array($arr)) 
        { 
            //clean an array that is specified 
            $this->clean_html($arr); 
            $this->escape($arr); 
        } 
        else 
        { 
            $types = array('_POST','_GET','_COOKIE','_SERVER','_SESSION'); 
            foreach($types AS $type) 
            { 
                $this->clean_html($$type); 
                $this->escape($$type); 
            } 
        } 
    } 
    function sql_strip_ticks($data) 
    { 
        return str_replace("`", "", $data); 
    } 
    function get_result_fields($query_id="") { 
     
           if ($query_id == "") 
           { 
            $query_id = $this->query_id; 
        } 
     
        while ($field = mysqli_fetch_field($query_id)) 
        { 
            $Fields[] = $field; 
        }         
        return $Fields; 
       } 
       function unescape($arr) 
       { 
       if(is_array($arr)) 
        { 
            foreach($arr as $k => $v) 
            { 
                if (is_array($v)) 
                { 
                    $this->escape($arr[$k]); 
                } 
                else 
                { 
                    $arr[$k] = stripslashes($v); 
                } 
               } 
               return $arr; 
        } 
        else 
        {         
            $arr = stripslashes($arr); 
            return $arr; 
        } 
       } 
	   //////////////
	   
	   
	   function get_single($tbl, $fd, $value, $get){
		$query = "SELECT $get FROM $tbl WHERE $fd='{$value}'  limit 1";
                $row = $this->fetch_assoc($query);
                return $row[$get] ;   
           }
	   
	   function RowInsert($table_name, $form_data)
			{	//$this->escape($form_data);
    // retrieve the keys of the array (column titles)
    
	
	foreach ($form_data as $key => $value) {
            $value = $this->escap_single($value);
		if (is_int($key)) {
			unset($form_data[$key]);
		}
	}
	$fields = array_keys($form_data);
    // build the query
    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";

    //$this->query($sql);
	// run and return the query result resource
    return $this->query($sql);
			}
	   
	function RowGet($tbl, $where){
                 $whereSQL = '';
                if(!empty($where_clause))
                    {
                        // check to see if the 'where' keyword exists
                        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
                        {
                            // not found, add keyword
                            $whereSQL = " WHERE ".$where_clause;
                        } else
                        {
                            $whereSQL = " ".trim($where_clause);
                        }
                    }
                    
               $sql = "Select * FROM ".$table_name.$whereSQL." limit 1";  
               return $dbase->fetch_assoc($sql);
        }   
	   
	   
	   // the where clause is left optional incase the user wants to delete every row!
function RowDelete($table_name, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add keyword
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // build the query
    $sql = "DELETE FROM ".$table_name.$whereSQL;

    // run and return the query result resource
    return $this->query($sql);
}



// again where clause is left optional
function RowUpdate($table_name, $form_data, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table_name." SET ";

    // loop and build the column /
    $sets = array();
    foreach($form_data as $column => $value)
    {
		//$value = $this->clean($value);
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);

    // append the where statement
    $sql .= $whereSQL;

    // run and return the query result
     
	 return $this->query($sql);
}
	  ///////////
    //based off of ipb 1.3's code//basicly there code... but a few things changed. 
    function get_table_sql($tbl, $create_tbl) 
    {         
        if($create_tbl) 
        { 
            print "DROP TABLE IF EXISTS `$tbl`;"; 
                $ctable = $this->fetch_row("SHOW CREATE TABLE $tbl"); 
                print $this->sql_strip_ticks($ctable['Create Table']).";\n"; 
        } 
        $sql = $this->query("SELECT * FROM $tbl"); 
        $row_count = $this->num_rows("SELECT * FROM $tbl");         
        if ($row_count < 1) 
        { 
            return true; 
        } 
        //--------------------------- 
        // Get col names 
        //--------------------------- 
         
        $f_list = ""; 
     
        $fields = $this->get_result_fields($sql); 
         
        $cnt = count($fields); 
         
        for( $i = 0; $i < $cnt; $i++ ) 
        { 
            $f_list .= $fields[$i]->name . ", "; 
        } 
         
        $f_list = preg_replace( "/, $/", "", $f_list ); 
         
        while ($row = $this->fetch_array($sql)) 
        { 
            //--------------------------- 
            // Get col data 
            //--------------------------- 
             
            $d_list = ""; 
             
            for( $i = 0; $i < $cnt; $i++ ) 
            { 
                if ( ! isset($row[ $fields[$i]->name ]) ) 
                { 
                    $d_list .= "NULL,"; 
                } 
                elseif ( $row[ $fields[$i]->name ] != '' ) 
                { 
                    $d_list .= "'".$this->escape($row[ $fields[$i]->name ]). "',"; 
                } 
                else 
                { 
                    $d_list .= "'',"; 
                } 
            } 
             
            $d_list = preg_replace( "/,$/", "", $d_list ); 
             
            print("INSERT INTO $tbl ($f_list) VALUES($d_list);\n"); 
        } 
         
        return TRUE; 
         
    } 
    function doact($step = '',$table) 
    { 
        switch($step) 
        { 
            case "0": 
            $query = "ANALYZE TABLE $table"; 
            break; 
            case "1": 
            $query = "REPAIR TABLE $table"; 
            break; 
            default: 
            $query = "OPTIMIZE TABLE $table"; 
            break; 
        } 
        return $this->query($query); 
    } 
    function optimize() 
    { 
        $tables = $this->list_tables(); 
         
        foreach($tables AS $table) 
        { 
            $this->doact("0",$table); 
            $this->doact("1",$table); 
            $this->doact("",$table); 
        } 
         
    } 
	
	
	
function tbl2array($tbl, $field, $value,  $where){
		
		$query = "SELECT ".$field.", ". $value." FROM $tbl ".$where;
		$res =  $this->query($query);
		$typex = array();	
            while($row = mysqli_fetch_assoc($res))
            {
                $typex[$row[$field]] = $row[$value];
            }
			
            return $typex;
		
	}
	
	
	function tbl2options($tbl, $field, $value, $att,  $where){
		
		$query = "SELECT * FROM $tbl ".$where;
			$res =  $this->query($query);
	
            $typex = '<select '.$att.'>'.PHP_EOL;
			//if(!empty($none))
			//$typex .='<option value="0">'.$none.'</option>'.PHP_EOL;
			
            while($row = mysqli_fetch_array($res))
            {
                $typex .= '<option value="' . $row[$field] . '">' . $row[$value] . '</option>'.PHP_EOL;
            }
			$typex .='</select>'.PHP_EOL;
            return $typex;
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    function backups() 
    { 
        if (!is_dir("./backups")) { 
            @mkdir("./backups/", "0666"); 
        } 
        $d = dir("./backups"); 
        $i = $BackupSize = 0; 
        $opt = "<select name=\"file\">\n<option>Select one...</option>"; 
        while (false !== ($entry = $d->read()))  
        { 
            if ($entry!="." and $entry!=".." and (ereg(".sql$",$entry))) 
            { 
                $opt .= "<option>$entry</option>"; 
            }     
        } 
        $opt .= "</select>"; 
        return $opt; 
    } 
    function execute_file($file) 
    { 
        $str = file_get_contents($file); 
          if(!$str) 
          { 
             $this->error("Error opening $file!","Unable to read the contents of $file."); 
          } 
       
        $sql = explode(';', $str); 
        foreach ($sql as $query)  
        { 
            if ($query!="")  
            { 
                $r = $this->query($query); 
            } 
        } 
   } 
   
   
   
   
	function check_duplicate($value, $table, $feild){
	global $dbase;
	$query = "SELECT * FROM {$table} WHERE {$feild}='{$value}'";
	$numrow = $this->num_rows($query);
	if ($numrow > 0) {
 		return false;
	}else{
		return true;
	}
}
   
   
   
   
   
   
   
   
   
   
   
   
   
} 


////////////////////////query
//class query {
//	
//	/* record information will be held in here */
//	private $info;
//	
//	/* constructor */
//	function query($record_array) {
//		$this->info = $record_array;
//	}
//	
//	/* dynamic function server */
//	function __call($method,$arguments) {
//		$meth = $this->from_camel_case(substr($method,3,strlen($method)-3));
//		return array_key_exists($meth,$this->info) ? $this->info[$meth] : false;
//	}
//
//	function from_camel_case($str) {
//		$str[0] = strtolower($str[0]);
//		$func = create_function('$c', 'return "_" . strtolower($c[0]);');
//		return preg_replace_callback('/([A-Z])/', $func, $str);
//	}	
//}
//
//









?>