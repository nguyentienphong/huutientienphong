<?php
class Category {
    var $categories = array();
	var $stt = -1;
	var $id_root = 0;
	var $list_id	= "";
    
    
    function list_categories($parent_id,$where_clause="1",$field_list,$order_clause,$update=0,$level=0,$callback=0){
        //select menu from database
		$db_menu = new db_query(" SELECT * " .
										"FROM categories " .
										"WHERE cat_parent_id =" . $parent_id . " AND " . $where_clause . " " .
										"ORDER BY " . $order_clause);
		//thiet lap $has_child_field = 0 khi menu ko co con
		if(mysql_num_rows($db_menu->result) == 0 && $update == 1){
			$db_update = new db_query("UPDATE categories SET cat_has_child =0 WHERE cat_id =" . $parent_id);
		}
		
		$No = 0;
		//lap de lay menu
		while ($row=mysql_fetch_array($db_menu->result)){
			
			//Tăng số No
			$No++;
			//tang so thu tu
			$this->stt++;
			//break field_list in to array
			$field_list_arr = explode(",",$field_list);
			//gan gia tri menu vao array
			for ($i=0;$i<count($field_list_arr);$i++){
				$this->categories[$this->stt][$field_list_arr[$i]] = $row[$field_list_arr[$i]];	
			}
			//gan level cho menu
			$this->categories[$this->stt]["level"] = $level;
			
			//Kiểm tra xem có phải là cái cuối cùng trong menu hay ko
			if($No < mysql_num_rows($db_menu->result)){
				$this->categories[$this->stt]["last"] = 0;
			}
			else{
				$this->categories[$this->stt]["last"] = 1;
			}
			
			//de quy de lap lai
			if ($row['cat_has_child'] != 0){
				$this->list_categories($row['cat_id'],$where_clause,$field_list,$order_clause,$update,$level+1,1);
			}
		}
		if ($callback==0){
			$db_menu->close();
		}
		unset($db_menu);
		//tra ve gia tri menu
		if ($callback==0) return $this->categories;
    }
}
?>