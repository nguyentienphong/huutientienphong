<?php
   function mis_name($act_name,$part = 1){
      if($part == 2){
         if(preg_match('/\|/',$act_name,$match))
         return trim(preg_replace('/.+\|/','',$act_name));
         else return ' ';
      } 
      if($part == 1 ) return trim(preg_replace('/\|.+/','',$act_name));
   }
   function get_log_add_frontend($record_id,$bg_table) {
      $db = new db_query('SELECT lga_admin_id,lga_time FROM log_add WHERE lga_record_id = '.$record_id.' AND lga_type = "'.$bg_table.'"');
      if(mysql_num_rows($db->result)) {
         $add_rc = mysql_fetch_assoc($db->result);
         $db_adm = new db_query("SELECT * FROM admin_users WHERE adm_id = " . $add_rc['lga_admin_id']);
         $add_adm = mysql_fetch_assoc($db_adm->result);
         return $add_adm['adm_loginname'];
      }else {
         return ' <b>chưa xác định</b>';
      }  
   }
   function get_image_size($img_path,$img_size = ''){
      preg_match('/.+\//', $img_path, $matches_f);
      $matches_l = preg_replace('/.+\//','', $img_path);
      //dump($matches);
      return $matches_f[0].$img_size.$matches_l;
   }
?>