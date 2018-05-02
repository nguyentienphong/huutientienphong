<?
class Mission extends Base{
    /**
     * Lớp này đưa ra các dữ liệu dùng chung trên toàn website
     */
     
    /**
     * Lấy thông tin công ty
     */
    public function mission_list() {
     $arr = db_array('SELECT *
                     FROM mission ORDER BY mis_position ASC');
     return $arr;
   }
   public function slides() {
        $slides = db_array('SELECT *
                        FROM slides
                        WHERE sli_active = 1 AND sli_cat_id = 5 ORDER BY sli_position ASC
                        ');
        return $slides;                
    }
       
}
?>