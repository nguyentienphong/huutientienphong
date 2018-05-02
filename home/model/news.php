<?
class News extends Base{
   var $table = 'post';
   var $id_field = 'pos_id';
   var $name_field = 'pos_title';
   var $page;
   var $page_size = 2;
   var $result = array();
   public function __construct($alias){
        $this->result = $this->detail_news($alias);
        if($this->result) {   
            $this->name = $this->result['pos_title'];
            $this->description = $this->result['pos_summary'];
            $this->url = 'tin-tuc/'.$this->result['pos_alias'].'.html';
        }
        
        parent::__construct($this->result['pos_id']);
    }
   public function list_news() {  
      $page = ($this->page >= 2) ? $this->page : 1;
      $page_start = ($page - 1) * $this->page_size;
      $page_end = $page * $this->page_size;
      
      /*$list_cat_child_id = '';
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
                       LIMIT '. $page_start . ', '. $this->page_size .'');*/
      return db_array('SELECT *
                          FROM post
                          WHERE pos_active = 1 ORDER BY pos_id DESC
                          LIMIT '. $page_start . ', '. $this->page_size .'');
   }
   public function total_news(){
      $arr = db_array('SELECT pos_id
                     FROM post
                     WHERE pos_active = 1
                     ');
      return count($arr);
   } 
   public function detail_news($alias) {  
      return db_first('SELECT *
                          FROM post
                          WHERE pos_active = 1
                          AND pos_alias ="'.$alias.'"');
   }
   public function new_news() {  
      return db_array('SELECT *
                          FROM post
                          WHERE pos_active = 1
                          ORDER BY pos_id DESC
                          LIMIT 5');
   }
   
   public function news_hot() { 
      return db_array('SELECT *
                          FROM post
                          WHERE pos_active = 1
                          AND pos_hot = 1 ORDER BY pos_id DESC LIMIT 4');
   }
   public function cat_news() {  
      return db_array('SELECT *
                          FROM categories
                          WHERE cat_active = 1
                          AND cat_type="Post"
                          AND cat_parent_id = 0
                          ORDER BY cat_id ASC');
   }
   public function cat_count_news($cat_id) {  
      $list_cat_child = db_array('SELECT cat_id
                                  FROM categories
                                  WHERE cat_active = 1 AND cat_parent_id = "'.$cat_id.'"');
      $list_cat_child_id = '';
      if(count($list_cat_child) > 0) {
            foreach($list_cat_child as $value) {
               $list_cat_child_id .= $value['cat_id'].',';
            }
        }
      $list_cat_child_id .= $cat_id;
      $list_news_cat = db_array('SELECT pos_id
                             FROM post
                             WHERE pos_active = 1 AND pos_cat_id IN ('.$list_cat_child_id.')');
      return count($list_news_cat);
   }
   public function tags_news() {  
      return db_array('SELECT *
                          FROM post
                          WHERE cat_active = 1
                          AND cat_type="Post"
                          AND cat_parent_id = 0
                          ORDER BY cat_id ASC');
   }
   public function arr_tags($tags) {
      return explode(',',$tags);
   }
   public function news_connection($pos_date) {  
      $list_news_cat = db_array('SELECT *
                             FROM post
                             WHERE pos_active = 1 AND pos_date < '.$pos_date.' 
                             LIMIT 5');
      return $list_news_cat;
   }
}
?>