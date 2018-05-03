<?
/**
 * атy lр cсc class ch?a cсc funtion dљng cho trang ch? 
*/
class Services extends Base{
    var $fieldsort = '';//S?p x?p theo tru?ng nрo
    var $sort		= '';//S?p x?p tang hay gi?m
    var $page		= 1;//Trang hi?n t?i
    var $page_size = 8;//Kэch c? 1 trang hi?n th? bao nhiъu k?t qu?
    var $wos_id = 0;//d?a di?m lрm vi?c
    
    public function __construct($alias =''){
        if($alias != ''){
        $this->result = $this->services_detail($alias);
        $this->table = 'services';
        if($this->result) {   
            $this->name = $this->result['ser_title'];
            $this->description = $this->result['ser_summary'];
            $this->url = 'dich-vu/'.$this->result['ser_alias'].'.html';
        }
        parent::__construct($this->result['ser_id']);
        }
    }
    public function services_detail($alias) {  
      return db_first('SELECT *
                          FROM services
                          WHERE ser_active = 1
                          AND ser_alias ="'.$alias.'"');
   }
    public function services_list_cat($cat_id = 0){
        $arr = db_array('SELECT *
                     FROM services
                     WHERE ser_cat_id = '.$cat_id.' AND ser_active = 1');
     return $arr;
    }
    
    public function services_list(){
        $arr = db_array('SELECT *
                     FROM services
                     WHERE ser_active = 1');
     return $arr;
    }
}
?>