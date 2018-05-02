<?php
//Check logged
function checkLogged($denypath = ""){
    checkloged();
    $denypath = $denypath ? $denypath : '../../resources/php/deny.php';
    //Check login
    $username = getValue('userlogin','str','SESSION','');
    $password = getValue('password','str','SESSION','');
    $admin_id 				= getValue("user_id","int","SESSION");
    $isAdmin	=	getValue("isAdmin", "int", "SESSION", 0);
    $db_check	= new db_query("SELECT adm_id 
								 FROM admin_users
								 WHERE adm_loginname = '" . $username . "' AND adm_password = '" . $password."'");
	if(mysql_num_rows($db_check->result) > 0){
		$check	= mysql_fetch_array($db_check->result);
		$adm_id	= $check["adm_id"];
		$db_check->close();
		unset($db_check);
		if($adm_id != $admin_id){
            redirect($denypath);
		}
	}else{
	   redirect($denypath);
	}
}

function checkLogin($username, $password){
	$username	= replaceMQ($username);
	$password	= replaceMQ($password);
	$db_check	= new db_query("SELECT adm_id 
							 FROM admin_users
							 WHERE adm_loginname = '" . $username . "' AND adm_password = '" . md5($password)."'");
	if(mysql_num_rows($db_check->result) > 0){
		$check	= mysql_fetch_array($db_check->result);
		$adm_id	= $check["adm_id"];
		$db_check->close();
		unset($db_check);
		return $adm_id;
	}
	else{
		$db_check->close();
		unset($db_check);
		return 0;
	}
}

function admin_user_info($user_id){
	$adm_info	= new db_query("SELECT * FROM admin_users WHERE adm_id = " . $user_id);
   return mysql_fetch_array($adm_info->result);;
}
//check access module
function checkAccessModule($module_id){
    $isAdmin	=	getValue("isAdmin", "int", "SESSION", 0);
    if($isAdmin){
        return true;
    }
    $db = new db_query('SELECT adu_admin_id FROM admin_users_right WHERE adu_admin_module_id = '.$module_id);
    if(mysql_num_rows($db->result)){
        unset($db);
        return true;
    }else{
        redirect('../../resources/php/deny.php');
    }
}

//Check loged
function checkloged(){
	$dm						= 'localhost';
	$dm						= str_replace("www.", "", $dm);
	$db_select 				= new db_query("SELECT * FROM kdims WHERE kdm_domain = '" . md5($dm) . "' LIMIT 1");
	if($row = mysql_fetch_assoc($db_select->result)){
	       
			$array 					= str_debase($row["kdm_key"]);
			$row1 					= json_decode($array, true);
			if($row1 != null){
				if(md5($row["kdm_key"] . "|" . $row1["pass"]) != $row["kdm_hash"]){
					notifydie("Dang ky chua dung key");
				}else{
					return $row1;
				}
		}else{
			notifydie("Dang ky chua dung key");
		}
		
	}else{
		notifydie("Chua dang ky domain");
	}	
}
function checkPermission($action){
    global $module_id;
    $admin_id 				= getValue("user_id","int","SESSION");
    $isAdmin	=	getValue("isAdmin", "int", "SESSION", 0);
    if($isAdmin){
        return true;
    }

    $db = new db_query('SELECT adu_admin_'.$action.'
						FROM admin_users_right
						WHERE adu_admin_id = '.$admin_id.' AND adu_admin_module_id = '.$module_id);
    $result = mysql_fetch_assoc($db->result);
    if($result['adu_admin_'.$action] == 1){
        return true;
    }else{
        die('Bạn không có quyền truy cập chức năng này');
    }
}
function call_module_file($module_name,$action){
    if(file_exists('../'.$module_name.'/'.$action.'.php')){
        return '../'.$module_name.'/'.$action.'.php';
    }else{
        return '../../core/'.$module_name.'/'.$action.'.php';
    }
}

/**
 * log_add ghi lai log add 1 thuoc tinh moi cua quan tri vien
 */
function log_add($record_id,$bg_table) {
   $admin_id = getValue("user_id","int","SESSION");
   $db_log_add = new db_execute('INSERT INTO log_add(lga_record_id,
                                                      lga_admin_id,
                                                      lga_type,
                                                      lga_time)
                                             VALUES('.$record_id.',
                                                    '.$admin_id.',
                                                    "'.$bg_table.'",
                                                    '.time().')');
}
/**
 * log_edit ghi lai log edit 1 thuoc tinh cua quan tri vien
 * 
 */
function log_edit($record_id,$bg_table) {
   $admin_id = getValue("user_id","int","SESSION");
   $db_check = new db_query('SELECT lge_record_id FROM log_edit WHERE lge_record_id = '.$record_id.' AND lge_type = "'.$bg_table.'"');
   if(mysql_num_rows($db_check->result)) {
      $db_log_edit = new db_execute('UPDATE log_edit SET lge_admin_id = '.$admin_id.',lge_time = '.time().' 
                                                WHERE lge_record_id = '.$record_id.' AND lge_type = "'.$bg_table.'"');
   }else {
      $db_log_edit = new db_execute('INSERT INTO log_edit(lge_record_id,
                                                         lge_admin_id,
                                                         lge_type,
                                                         lge_time)
                                                VALUES('.$record_id.',
                                                       '.$admin_id.',
                                                       "'.$bg_table.'",
                                                       '.time().')');
   }
}
function get_log_add($record_id,$bg_table) {
   $db = new db_query('SELECT lga_admin_id,lga_time FROM log_add WHERE lga_record_id = '.$record_id.' AND lga_type = "'.$bg_table.'"');
   if(mysql_num_rows($db->result)) {
      $add_rc = mysql_fetch_assoc($db->result);
      $db_adm = new db_query("SELECT * FROM admin_users WHERE adm_id = " . $add_rc['lga_admin_id']);
      $add_adm = mysql_fetch_assoc($db_adm->result);
      return '<div class="get_log_add">Thêm bởi <b>'.$add_adm['adm_loginname'].'</b> lúc <b>'.date('H:ia d/m/Y',$add_rc['lga_time']).'</b></div>';
   }else {
      return '<div class="get_log_add">Thêm bởi: <b>chưa xác định</b></div>';
   }
}
function get_log_edit($record_id,$bg_table) {
   $db = new db_query('SELECT lge_admin_id,lge_time FROM log_edit WHERE lge_record_id = '.$record_id.' AND lge_type = "'.$bg_table.'"');
   if(mysql_num_rows($db->result)) {
      $edit_rc = mysql_fetch_assoc($db->result);
      $db_adm = new db_query("SELECT * FROM admin_users WHERE adm_id = " . $edit_rc['lge_admin_id']);
      $edit_adm = mysql_fetch_assoc($db_adm->result);
      return '<div class="get_log_edit">Sửa lần cuối bởi <b>'.$edit_adm['adm_loginname'].'</b> lúc <b>'.date('H:ia d/m/Y',$edit_rc['lge_time']).'</b></div>';
   }else {
      return '<div class="get_log_edit">Chưa được chỉnh sửa lần nào</div>';
   }
}

/**
* Redirect from theo action cua nut ma quan tri vien click
* $record_id la id cua san pham dang thao tac
*/
function form_redirect($record_id=0) {
   $redirect = getValue('redirect','int','POST',0);
   if($redirect == 1) {
         redirect('edit.php?record_id='.$record_id);
   }else {
      redirect('listing.php');
   }
}
function addSeoMeta($post_id,$table_name) {
    $title = getValue('seo_title','str','POST','');
    $description = getValue('seo_description','str','POST','');
    $robots = getValue('seo_robots','str','POST','Index,Follow');
    $db_insert = new db_execute('INSERT INTO meta_seo(met_title,
                                                        met_description,
                                                        met_robots,
                                                        met_post_id,
                                                        met_type)
                                                VALUES("'.$title.'",
                                                        "'.$description.'",
                                                        "'.$robots.'",
                                                        '.$post_id.',
                                                        "'.$table_name.'")');
    unset($db_insert);
}
function editSeoMeta($post_id,$table_name) {
    $title = getValue('seo_title','str','POST','Không thấy tiêu đề');
    $description = getValue('seo_description','str','POST','Không thấy mô tả');
    $robots = getValue('seo_robots','str','POST','Index,Follow');
    //Lấy ra xem đã có dữ liệu chưa
    $db_seo_meta = new db_query('SELECT * FROM meta_seo WHERE met_type = "'.$table_name.'" AND met_post_id = '.$post_id.' LIMIT 1');
    $seo_meta = mysql_fetch_assoc($db_seo_meta->result);unset($db_seo_meta);
    //Nếu đã từng nhập
    if($seo_meta && $seo_meta != '') {
        $db_update = new db_execute('UPDATE meta_seo SET met_title = "'.$title.'",
                                                    met_description = "'.$description.'",
                                                    met_robots = "'.$robots.'"
                                                WHERE met_post_id = '.$post_id.' AND met_type = "'.$table_name.'"');
        unset($db_update);
    }
    //Nếu rỗng - chưa nhập bao h
    else {
        $db_insert = new db_execute('INSERT INTO meta_seo(met_title,
                                                        met_description,
                                                        met_robots,
                                                        met_post_id,
                                                        met_type)
                                                VALUES("'.$title.'",
                                                        "'.$description.'",
                                                        "'.$robots.'",
                                                        '.$post_id.',
                                                        "'.$table_name.'")');
        unset($db_insert);
    }
    
}

/**
 * function get_alias tra ve duong dan
 * $alias - gia tri duong dan nhap vao
 * $title - tieu de nhap vao
 * $table - bang du lieu
 * $id_field - ten truong id cua bang du lieu
 * $alias_field - ten truong alias cua bang du lieu
 * $record_id_edit truyen vao trong truong hop sua ban ghi
 */
function get_alias($alias = '',$title,$table,$id_field,$alias_field,$record_id_edit = 0) {
   //alias truyền vào rỗng:
   if($alias == '') {
      // lấy alias = removeTitle của $title truyền vào
      $alias = removeTitle($title);
   }else {
      // lấy alias = removeTitle chính nó
      $alias = removeTitle($alias);
   }
   
   // Kiểm tra xem alias có trong bảng dữ liệu chưa
   $query = new db_query('SELECT '.$id_field.' FROM '.$table.' WHERE '.$alias_field.' = "'.$alias.'" LIMIT 1');
   // Nếu alias này đã tồn tại trong bảng:
   if(mysql_num_rows($query->result) == 1) {
      $res_check = mysql_fetch_assoc($query->result);
      //Trong trường hợp sửa và đúng id đang sửa thì trả về nó (tức là kệ nó)
      if($res_check[$id_field] == $record_id_edit) {
         return $alias;
      }else {
         $i = 1;
         while($i > 0) {
            // Nối thêm số vào đuôi alias số $i
            $alias_new = $alias.'-'.$i;
            //Kiểm tra sự tồn tai trong bảng tiếp
            $query = new db_query('SELECT '.$id_field.' FROM '.$table.' WHERE '.$alias_field.' = "'.$alias_new.'" LIMIT 1');
            // Nếu vẫn tồn tại => tăng $i
            if(mysql_num_rows($query->result) == 1) {
               $i++;
            }
            // Nếu chưa tồn tại => trả về
            else {
               return $alias_new;
            }
         }
      }
      
   }
   //Nếu alias chưa tồn tại trong bảng => trả về
   else {
      return $alias;
   }
}
?>