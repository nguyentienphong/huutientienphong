<?php
class Tutorial{
    var $tut_id;
    var $active_field = 'tut_active';
    function __construct($tut_id = 0){
        $this->tut_id = $tut_id;
    }
    function Admin_add_relate_string(){
        $arr_relate = getValue('tut_relate_list','arr','POST','');
        if(!is_array($arr_relate)) $arr_relate = array();
        return implode(',',$arr_relate);
    }
    function Admin_tut_relate(){
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
        $db_se = new db_query('SELECT tut_id,tut_title FROM tutorials 
                                WHERE tut_active = 1 AND (tut_title LIKE "%'.$keyword.'%" OR tut_tags LIKE "%'.$keyword.'%") 
                                ORDER BY tut_title ASC 
                                LIMIT 10 ' );
        $result = $db_se->resultArray();unset($db_se);
        $result = array_unique($result,SORT_REGULAR);
        if($result){
            foreach($result as $lir){
                $str .= '
                    <li>
                        <label class="checkbox">
                            <input type="checkbox" title="'.$lir['tut_title'].'" value="'.$lir['tut_id'].'" class="tut_relate_result" id="search_news_relate_'.$lir['tut_id'].'"/>
                            '.$lir['tut_title'].'
                        </label>
                    </li>';
            }
            $str .= '<span class="label label-info" style="cursor:pointer" onclick="Tut_add_relate()">Thêm vào</span>';
        }
        return $str;
    }
    function Admin_show_relate_list($tut_relate = ''){
        $str = '';
        if(!$tut_relate) return '';
        $db_query = new db_query('SELECT tut_id,tut_title 
                                    FROM tutorials 
                                    WHERE '.$this->active_field.' = 1 AND tut_id IN('.$tut_relate.')');
        $relate_list = $db_query->resultArray();unset($db_query);
        
        $str = '<div class="control-group">
                    <div class="controls">
                        <ul id="relate_result"></ul>
                    </div>
                    <div class="controls" id="news_relate_after_search">';
        $str .= '<div class="relate_element">';
        foreach($relate_list as $relate){
            $str .= '<label class="checkbox">';
            $str .= '<input type="checkbox" name="tut_relate_list[]" checked="checked" value="'.$relate['tut_id'].'" id="tut_relate_list_'.$relate['tut_id'].'">';
            $str .= $relate['tut_title'];
            $str .= '<span style="margin-left:5px;padding:5px;color:red;font-weight:bold;font-size:14px;cursor:pointer;" onclick="Tut_del_relate(this);return false;">&times;</span>';
            $str .= '</label>';
        }
        $str .= '</div></div></div>';
        return $str;
    }
}
?>