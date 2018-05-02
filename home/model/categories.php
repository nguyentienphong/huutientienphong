<?
class Categories extends Base{
    var $table = 'categories';
    var $id_field = 'cat_id';
    var $name_field = 'cat_name';
    var $type;
    var $page;
    var $page_size = 2;
    var $result = array();
    public function __construct($alias,$page = 0){
        $this->page = $page;
        $this->result = db_first('SELECT cat_id,cat_name,cat_alias,cat_description,cat_type
                                  FROM '.$this->table.'
                                  WHERE cat_active = 1 AND cat_alias = "'.$alias.'"
                                  LIMIT 1');
        if($this->result) {   
            $this->type = $this->result['cat_type'];
            $this->name = $this->result['cat_name'];
            $this->description = $this->result['cat_description'];
            $this->url = $this->result['cat_alias'];
        }
        else {
            $this->error404();
        }
        parent::__construct($this->result['cat_id']);
    }
    public function list_news() {  
        $page = ($this->page >= 2) ? $this->page : 1;
        $rows_per_page = $this->page_size;
        $page_start = ($page - 1) * $rows_per_page;
        $page_end = $page * $rows_per_page;
        
        $list_cat_child_id = '';
        $list_cat_child = db_array('SELECT cat_id
                                  FROM '.$this->table.'
                                  WHERE cat_active = 1 AND cat_parent_id = "'.$this->id.'"');
        if(count($list_cat_child) > 0) {
            foreach($list_cat_child as $value) {
               $list_cat_child_id .= $value['cat_id'].',';
            }
        }
        $list_cat_child_id .= $this->id;
        
        return db_array('SELECT *
                          FROM post
                          WHERE pos_active = 1 AND pos_cat_id IN ('.$list_cat_child_id.')
                          LIMIT '. $page_start . ', '. $rows_per_page .'');
    }
    public function list_project_cat() {  
        $page = ($this->page >= 2) ? $this->page : 1;
        $rows_per_page = 7;
        $page_start = ($page - 1) * $rows_per_page;
        $page_end = $page * $rows_per_page;
        
        $list_cat_child_id = '';
        $list_cat_child = db_array('SELECT cat_id
                                  FROM '.$this->table.'
                                  WHERE cat_active = 1 AND cat_parent_id = "'.$this->id.'"');
        if(count($list_cat_child) > 0) {
            foreach($list_cat_child as $value) {
               $list_cat_child_id .= $value['cat_id'].',';
            }
        }
        $list_cat_child_id .= $this->id;
        
        return db_array('SELECT *
                          FROM project
                          WHERE prj_active = 1 AND prj_cat_id IN ('.$list_cat_child_id.')
                          LIMIT '. $page_start . ', '. $rows_per_page .'');
    }
    public function total_news() {  
        $page = ($this->page >= 2) ? $this->page : 1;
        $rows_per_page = 7;
        $page_start = ($page - 1) * $rows_per_page;
        $page_end = $page * $rows_per_page;
        
        $list_cat_child_id = '';
        $list_cat_child = db_array('SELECT cat_id
                                  FROM '.$this->table.'
                                  WHERE cat_active = 1 AND cat_parent_id = "'.$this->id.'"');
        if(count($list_cat_child) > 0) {
            foreach($list_cat_child as $value) {
               $list_cat_child_id .= $value['cat_id'].',';
            }
        }
        $list_cat_child_id .= $this->id;
        
        $arr_prj_id = db_array('SELECT pos_id
                          FROM post
                          WHERE pos_active = 1 AND pos_cat_id IN ('.$list_cat_child_id.')');
                          return count($arr_prj_id);
    }
    public function list_project_cat_count() {  
        $page = ($this->page >= 2) ? $this->page : 1;
        $rows_per_page = 7;
        $page_start = ($page - 1) * $rows_per_page;
        $page_end = $page * $rows_per_page;
        
        $list_cat_child_id = '';
        $list_cat_child = db_array('SELECT cat_id
                                  FROM '.$this->table.'
                                  WHERE cat_active = 1 AND cat_parent_id = "'.$this->id.'"');
        if(count($list_cat_child) > 0) {
            foreach($list_cat_child as $value) {
               $list_cat_child_id .= $value['cat_id'].',';
            }
        }
        $list_cat_child_id .= $this->id;
        
        $arr_prj_id = db_array('SELECT prj_id
                          FROM project
                          WHERE prj_active = 1 AND prj_cat_id IN ('.$list_cat_child_id.')');
                          return count($arr_prj_id);
    }
}
?>