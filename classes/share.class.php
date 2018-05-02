<?php
class ShareClass{
    var $sha_id;
    var $active_field = 'sha_active';
    function __construct($sha_id = 0){
        $this->sha_id = $sha_id;
    }
    function Admin_add_relate_string(){
        $arr_relate = getValue('sha_relate_list','arr','POST','');
        if(!is_array($arr_relate)) $arr_relate = array();
        return implode(',',$arr_relate);
    }
    function Admin_sha_relate(){
        return '<div class="control-group">
                    <div class="controls">
                        <ul id="relate_result"></ul>
                    </div>
                    <div class="controls" id="news_relate_after_search">
                        
                    </div>
                </div>';
    }
    function Admin_search_relate($keyword){
        $str = '';
        $db_se = new db_query('SELECT sha_id,sha_title FROM share 
                                WHERE sha_active = 1 AND (sha_title LIKE "%'.$keyword.'%" OR sha_tags LIKE "%'.$keyword.'%") 
                                ORDER BY sha_title ASC 
                                LIMIT 10 ' );
        $result = $db_se->resultArray();unset($db_se);
        $result = array_unique($result,SORT_REGULAR);
        if($result){
            foreach($result as $lir){
                $str .= '
                    <li>
                        <label class="checkbox">
                            <input type="checkbox" title="'.$lir['sha_title'].'" value="'.$lir['sha_id'].'" class="sha_relate_result" id="search_news_relate_'.$lir['sha_id'].'"/>
                            '.$lir['sha_title'].'
                        </label>
                    </li>';
            }
            $str .= '<span class="label label-info" style="cursor:pointer" onclick="sha_add_relate()">Thêm vào</span>';
        }
        return $str;
    }
    function Admin_show_relate_list($sha_relate = ''){
        $str = '';
        if(!$sha_relate) return '';
        $db_query = new db_query('SELECT sha_id,sha_title 
                                    FROM share 
                                    WHERE '.$this->active_field.' = 1 AND sha_id IN('.$sha_relate.')');
        $relate_list = $db_query->resultArray();unset($db_query);
        
        $str = '<div class="control-group">
                    <div class="controls">
                        <ul id="relate_result"></ul>
                    </div>
                    <div class="controls" id="news_relate_after_search">';
        $str .= '<div class="relate_element">';
        foreach($relate_list as $relate){
            $str .= '<label class="checkbox">';
            $str .= '<input type="checkbox" name="sha_relate_list[]" checked="checked" value="'.$relate['sha_id'].'" id="sha_relate_list_'.$relate['sha_id'].'">';
            $str .= $relate['sha_title'];
            $str .= '<span style="margin-left:5px;padding:5px;color:red;font-weight:bold;font-size:14px;cursor:pointer;" onclick="sha_del_relate(this);return false;">&times;</span>';
            $str .= '</label>';
        }
        $str .= '</div></div></div>';
        return $str;
    }
}
?>