<?
class Base {
    /**
     * Các thuộc tính tên trường trong bảng
     */
    var $table;
    var $id_field;
    var $name_field;
    var $picture_field;
    
     /**
      * Các thuộc tính dữ liệu
      */
    var $url;
    var $id;
    var $name;
    var $picture;
    var $description;
    var $detail;
    //seo string meta
    var $seo;
    var $seo_title;
    var $seo_description;
    
    public function __construct($id = 0){
        $this->id = $id;
        $this->picture = DOMAIN.'/home/img/logo.png';
    }
    
    public function Seo() {
        if($this->id > 0) {
            //Nếu có id của đối tượng thì select trong bảng meta_seo xem có title và des ko?
            $db_seo_meta = new db_query('SELECT * FROM meta_seo WHERE met_type = "'.$this->table.'" AND met_post_id = '.$this->id.' LIMIT 1');
            $seo_meta = mysql_fetch_assoc($db_seo_meta->result);unset($db_seo_meta);
            //Nếu có và không rống thì add
            //if($seo_meta['met_title'] != '' && $seo_meta['met_description'] != '') {
               $this->seo_title = $seo_meta['met_title'] != '' ? $seo_meta['met_title'] : $this->name;
               $this->seo_description = $seo_meta['met_description'] != '' ? $seo_meta['met_description'] : $this->description;
            //}else {
                
            //}       
        }else {
            if($this->seo_title == '') $this->seo_title = $this->name;
            if($this->seo_description == '') $this->seo_description = $this->description;
        }
        global $google_analytics;
        return '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="language" content="vietnamese" />
                <meta name="ROBOTS" content="INDEX, FOLLOW" />
                <meta name="AUTHOR" content="vnptepay" />
                <meta name="COPYRIGHT" content="Copyright (C) 2015 vnptepay.vn" />
                <link href="'.DOMAIN.'/favicon.ico" type="image/x-icon" rel="shortcut icon"/>
                <title>'.$this->seo_title.'</title>
                <meta name="description" content="'.$this->seo_description.'"/>
                <link rel="canonical" href="'.DOMAIN.'/'.$this->url.'" />
                <meta property="og:title" content="'.$this->seo_title.'" />
                <meta property="og:type" content="website" />
                <meta property="og:url" content="'.DOMAIN.'/'.$this->url.'" />
                <meta property="og:image" content="'.$this->picture.'" />
                <meta property="og:site_name" content="vnptepay" />
                <meta property="og:description" content="'.$this->seo_description.'" />
                <meta property="fb:admins" content="" />
                <meta property="fb:app_id" content=""/>
                '.$google_analytics.'';
    }
    
    public function getDataField($field_name = '*'){
        //Xử lý field name
        if($field_name != '*'){
            //Mảng các field dữ liệu
            $array_field_name = explode(',',$field_name);
            //Trường hợp cần lấy nhiều hơn 1 field dữ liệu 
            if(count($array_field_name) > 1){
                $db = new db_query('SELECT '.$field_name.' FROM '.$this->table.' WHERE '.$this->id_field.' = '.$this->id);
                return $db->resultArray();
            }
            //Trường hợp chỉ lấy 1 field dữ liệu
            elseif(count($array_field_name) == 1){
                $db = new db_query('SELECT '.$field_name.' FROM '.$this->table.' WHERE '.$this->id_field.' = '.$this->id);
                $result = mysql_fetch_assoc($db->result);unset($db);
                return $result[$field_name];
            }
        }
        if($field_name == '*'){
            $db = new db_query('SELECT '.$field_name.' FROM '.$this->table.' WHERE '.$this->id_field.' = '.$this->id);
            return $db->resultArray();
        }
    }
    /**
    * ---------------------------------------------------------------------------------------------------------
    * lấy id danh mục con theo danh mục cha
    * ---------------------------------------------------------------------------------------------------------
   */
   public function cat_child_id($parent_id){
      $cat_child_id = db_array("SELECT cat_id 
                            FROM categories_multi
                            WHERE cat_active = 1 AND cat_parent_id =" . $parent_id);
      return $cat_child_id;
   }
    /**
    * ---------------------------------------------------------------------------------------------------------
    * lấy danh mục và tất cả các danh mục con có liên quan tới danh mục được truyền vào
    * ---------------------------------------------------------------------------------------------------------
   */
   public function cat_child_all($ser_cat_id){
      $str_cat = $ser_cat_id;
      $arr_cat_child_id = $this->cat_child_id($ser_cat_id);
      if($arr_cat_child_id){
         foreach($arr_cat_child_id as $row){
            $str_cat .= ','.$row['cat_id'];
            $arr_cat_child_child_id = $this->cat_child_id($row['cat_id']);
            if($arr_cat_child_child_id){
               foreach($arr_cat_child_child_id as $row1){
                  $str_cat .= ','.$row1['cat_id'];
               }
            }
         }
      }
      return $str_cat;
   }
   public function error404() {
      require 'home/controllers/404.php';
      exit();
   }
}
?>