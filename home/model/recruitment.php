<?
/**
 * Ðây là các class ch?a các funtion dùng cho trang ch? 
*/
class Recruitment extends Base{
    var $fieldsort = '';//S?p x?p theo tru?ng nào
    var $sort		= '';//S?p x?p tang hay gi?m
    var $page		= 1;//Trang hi?n t?i
    var $page_size = 8;//Kích c? 1 trang hi?n th? bao nhiêu k?t qu?
    
    public function __construct($alias = ''){
        $this->result = $this->recruitment_detail($alias);
        $this->table = 'recruitment';
        if($this->result) {   
            $this->name = $this->result['rec_title'];
            $this->description = $this->result['rec_summary'];
            $this->url = 'tuyen-dung/'.$this->result['rec_alias'].'.html';
        }
        parent::__construct($this->result['rec_id']);
    }
    public function recruitment_list() { // danh sách tuyển dụng
        $recruitment = db_array('SELECT *
                        FROM recruitment
                        WHERE rec_active = 1 ORDER BY rec_id DESC
                        ');
        return $recruitment;                
    }
    public function recruitment_list_cat($cat_id = 0){
        $arr = db_array('SELECT *
                     FROM recruitment
                     WHERE rec_cat_id = '.$cat_id.' AND rec_active = 1');
     return $arr;
    }
    public function recruitment_detail($alias) {  
      return db_first('SELECT *
                          FROM recruitment
                          WHERE rec_active = 1
                          AND rec_alias ="'.$alias.'"');
   }
}
?>