<?php
require_once 'inc_security.php';
$action = getValue('action','str','POST','');
switch($action){
    case 'search_relate':
        $keyword = getValue('keyword','str','POST','');
        if(!$keyword){
            break;
        }
        echo AdminController::SearchNewsRelate($keyword);
    break;
}
?>