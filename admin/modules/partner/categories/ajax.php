<?php
require_once 'inc_security.php';
$action = getValue('action','str','POST','');
switch($action){
    case 'alias':
        $title = getValue('title','str','POST','');
        echo removeTitle($title);
    break;
    case 'autosavepost':
        $pos_title = getValue('pos_title','str','POST','');
        db_nonQuery("INSERT INTO post_copy(pos_title) VALUES('".$pos_title."')");
    break;
    default:
    //var_dump($_POST);
    $content = '';
    foreach($_POST as $key=>$value){
      $content .= $key.':'.$value.'||';
    }
    //db_nonQuery("INSERT INTO history_copy(hic_content) VALUES('".$content."')");
    break;
}
?>