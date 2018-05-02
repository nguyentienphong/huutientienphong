<?
class Aboutus extends Base{
    /**
     * L?p này dua ra các d? li?u dùng chung trên toàn website
     */
     
    /**
     * L?y thông tin công ty
     */
    public function aboutus() {
     $arr = db_first('SELECT *
                     FROM aboutus WHERE abu_id = 1');
     return $arr;
   }
   public function slides() {
        $slides = db_array('SELECT *
                        FROM slides
                        WHERE sli_active = 1 AND sli_cat_id = 4 ORDER BY sli_position ASC
                        ');
        return $slides;                
    }
       
}
?>