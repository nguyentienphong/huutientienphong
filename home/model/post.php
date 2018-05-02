<?
class Post extends Base{
    var $table = 'post';
    var $id_field = 'pos_id';
    var $name_field = 'pos_title';
    var $page;
    var $result = array();
    public function __construct($alias,$page = 0){
        $this->page = $page;
        $this->result = db_first('SELECT *
                                  FROM '.$this->table.'
                                  WHERE pos_active = 1 AND pos_alias = "'.$alias.'"
                                  LIMIT 1');
        if($this->result) {   
            $this->name = $this->result['pos_title'];
            $this->description = $this->result['pos_summary'];
            $this->url = $this->result['pos_alias'];
        }
        else {
            $this->error404();
        }
        parent::__construct($this->result['pos_id']);
    }
}
?>