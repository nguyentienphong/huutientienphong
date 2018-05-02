<?
class Culture extends Base{
    /**
     * L?p này dua ra các d? li?u dùng chung trên toàn website
     */
     
    /**
     * Lấy danh sách văn hóa doanh nghiệp
     */
    public function culture_list() {
     $arr = db_array('SELECT *
                     FROM culture ORDER BY cul_id ASC');
     return $arr;
   }
   public function slides() {
        $slides = db_array('SELECT *
                        FROM slides
                        WHERE sli_active = 1 AND sli_cat_id = 6 ORDER BY sli_position ASC
                        ');
        return $slides;                
    }
       
}
?>