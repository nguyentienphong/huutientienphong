<?
class Aboutus extends Base{
    /**
     * L?p n�y dua ra c�c d? li?u d�ng chung tr�n to�n website
     */
     
    /**
     * L?y th�ng tin c�ng ty
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