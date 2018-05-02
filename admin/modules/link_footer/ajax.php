<?php
require_once 'inc_security.php';
$action = getValue('action','str','POST','');
switch($action){
    case 'search_relate':
        $keyword = getValue('keyword','str','POST','');
        if(!$keyword){
            break;
        }
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
        echo $str;
    break;
}
?>