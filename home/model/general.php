<?
class General {
    /**
     * Lớp này đưa ra các dữ liệu dùng chung trên toàn website
     */
     
    /**
     * Lấy thông tin công ty
     */
    public function company_info_gen() {
     $arr = db_first('SELECT *
                     FROM office_contact WHERE off_id = 1');
     return $arr;
   }
    /**
    * ---------------------------------------------------------------------------------------------------------
    * lấy tất cả các danh mục
    * ---------------------------------------------------------------------------------------------------------
   */
   public function categories($cat_type = "services") {
     $arr = db_array('SELECT *
                     FROM categories
                     WHERE cat_type = "'.$cat_type.'" AND cat_parent_id = 0');
     return $arr;
   }
   /**
   * ---------------------------------------------------------------------------------------------------------
   * lấy danh mục con theo danh mục cha
   * ---------------------------------------------------------------------------------------------------------
   */
   public function child_cat($parent_id){
      $pro_cat = db_array("SELECT * 
                            FROM categories
                            WHERE cat_active = 1 AND cat_parent_id =" . $parent_id." ORDER BY cat_order ASC");
      return $pro_cat;
   }
   /**
    * ---------------------------------------------------------------------------------------------------------
    * lấy tất cả các danh mục
    * ---------------------------------------------------------------------------------------------------------
   */
   public function list_office(){
      $list_office = db_array('SELECT * FROM office_contact WHERE off_id != 1 ORDER BY off_id ASC LIMIT 3');
      return $list_office;
   }
   /**
    * ---------------------------------------------------------------------------------------------------------
    * lấy tất cả các danh mục
    * ---------------------------------------------------------------------------------------------------------
   */
   public function cat_info($cat_id = 0){
      $cat = db_first('SELECT * FROM categories_multi WHERE cat_id='.$cat_id.' ORDER BY cat_id DESC LIMIT 1');
      return $cat;
   }
    
   public function services_cat() { // Danh mục dịch vụ
      
      return db_array('SELECT cat_id, cat_name, cat_name_en, cat_alias, cat_description, cat_description_en,cat_image
                          FROM categories
                          WHERE cat_active = 1
                          AND cat_type = "services" ORDER BY cat_order ASC');
   }
   
    public function aboutus() {
        $tut = db_first("SELECT * 
                                FROM aboutus
                                LIMIT 1");
        return $tut;
    }
}
?>