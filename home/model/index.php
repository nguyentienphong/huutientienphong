<?
/**
 * Đây là các class chứa các funtion dùng cho trang chủ 
*/
class Index extends Base{
    var $fieldsort = '';//Sắp xếp theo trường nào
    var $sort		= '';//Sắp xếp tăng hay giảm
    var $page		= 1;//Trang hiện tại
    var $page_size = 8;//Kích cỡ 1 trang hiển thị bao nhiêu kết quả
    var $wos_id = 0;//địa điểm làm việc
    
    public function slides() {
        $slides = db_array('SELECT *
                        FROM slides
                        WHERE sli_active = 1  AND sli_cat_id = 3 ORDER BY sli_position ASC
                        ');
        return $slides;                
    }
   public function news_hot() { 
      return db_array('SELECT *
                          FROM post
                          WHERE pos_active = 1
                          AND pos_hot = 1 ORDER BY pos_id DESC LIMIT 3');
   }
   public function cat_name($cat_id,$lang_id=0) { // Dự án đầu tư
      if($lang_id ==1) return db_one('SELECT cat_name_en
                          FROM categories
                          WHERE cat_id ='.$cat_id);
      return db_one('SELECT cat_name
                          FROM categories
                          WHERE cat_id ='.$cat_id);
   }
   public function partners() { // Đối tác
      return db_array('SELECT *
                          FROM partner
                          WHERE par_active = 1
                          LIMIT 10');
   }
}
?>