<?
/**
* db_one
* 
* @param string $sql : Cau lenh sql
* @return 1 ket qua duy nhat
*/
function db_man_one($sql){
  
  $result='';
  $db_ex    = new db_man_query($sql);
  $myarr    =$db_ex->result_Array();
  if(count($myarr)==0) {$result='';}
  
  else{
      $obj    =   $myarr[0];            
      $result   =   $obj[0];
  }
$db_ex->close();
unset($db_ex);
return $result;
}


/**
* db_array
* @query: $sql : cau lenh sql
* @return: array : array ket qua
*/
function db_man_array($sql,$usePconnect=true,$useUTF8=true){  
  $db =   new db_man_query($sql,'',$usePconnect,$useUTF8);
  $ar =   $db->resultAssoc();
  $db->close();
  unset($db);
  return $ar;        
}


function db_man_nonQuery($sql,$usePconnect=true,$useUTF8=true){
   $db = new db_man_query($sql,'',$usePconnect,$useUTF8);
   unset($db);
}
     
function db_man_insert($sql){
   $db = new db_man_execute_return();
   return $db->db_man_execute($sql);
}
function db_man_first($sql,$usePconnect=true,$useUTF8=true){
  
   $db = db_man_array($sql,$usePconnect,$useUTF8);
   if(count($db)==0) return false;
   else return $db[0];
}
/**
* db_one
* 
* @param string $sql : Cau lenh sql
* @return 1 ket qua duy nhat
*/
function db_one_vbb($sql){
  
  $result='';
  $db_ex    = new db_query_vbb($sql);
  $myarr    =$db_ex->result_vbbArray();
  if(count($myarr)==0) {$result='';}
  
  else{
      $obj    =   $myarr[0];            
      $result   =   $obj[0];
  }
$db_ex->close();
unset($db_ex);
return $result;
}


/**
* db_array
* @query: $sql : cau lenh sql
* @return: array : array ket qua
*/
function db_array_vbb($sql,$usePconnect=true,$useUTF8=true){  
  $db =   new db_query_vbb($sql,'',$usePconnect,$useUTF8);
  $ar =   $db->result_vbbAssoc();
  $db->close();
  unset($db);
  return $ar;        
}


function db_nonQuery_vbb($sql,$usePconnect=true,$useUTF8=true){
   $db = new db_query_vbb($sql,'',$usePconnect,$useUTF8);
   unset($db);
}
     
function db_insert_vbb($sql){
   $db = new db_execute_vbb_return();
   return $db->db_execute_vbb($sql);
}
function db_first_vbb($sql,$usePconnect=true,$useUTF8=true){
  
   $db = db_array_vbb($sql,$usePconnect,$useUTF8);
   if(count($db)==0) return false;
   else return $db[0];
}

/**
 * db_one
 * 
 * @param string $sql : Cau lenh sql
 * @return 1 ket qua duy nhat
 */
function db_one($sql){
	$result='';
     $db_ex    = new db_query($sql);
     $myarr    =$db_ex->resultArray();
     if(count($myarr)==0) {$result='';}
     else{
         $obj    =   $myarr[0];            
         $result   =   $obj[0];
     }
	$db_ex->close();
	unset($db_ex);
	return $result;
}

 
/**
* db_array
* @query: $sql : cau lenh sql
* @return: array : array ket qua
*/
function db_array($sql,$usePconnect=true,$useUTF8=true){
  $db =   new db_query($sql,"",$usePconnect,$useUTF8);
  $ar =   $db->resultAssoc();
  $db->close();
  unset($db);
  return $ar;        
}    
function db_list($sql){
  $db =   new db_query($sql);
  $ar =   $db->resultArray();
  $db->close();
  unset($db);
  $rar = array();
  foreach($ar as $row){
   $rar[] = $row[0];
  }
  return $rar;
}
function db_nonQuery($sql,$usePconnect=true,$useUTF8=true){
   $db =   new db_query($sql,"",$usePconnect,$useUTF8);
   unset($db);
}
     
function db_insert($sql,$step = 1){
   db_nonQuery("SET @@auto_increment_increment=".$step);
   $db = new db_execute_return();
   return $db->db_execute($sql);
}
function db_first($sql){
   $db = db_array($sql);
   if(count($db)==0) return false;
   else return $db[0];
}