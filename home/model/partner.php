<?
class Partner extends Base{
    /**
     * L?p này dua ra các d? li?u trong bảng partner
     */
     
    /**
     * Lấy danh sách đối tác
     */
    public function partner_list() {
     $arr = db_array('SELECT *
                     FROM partner ORDER BY par_id DESC');
     return $arr;
   }
   public function slides() {
        $slides = db_array('SELECT *
                        FROM slides
                        WHERE sli_active = 1 AND sli_cat_id = 7 ORDER BY sli_position ASC
                        ');
        return $slides;                
    }
       
}
?>