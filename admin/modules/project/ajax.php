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
    case 'delete_image':
         $pji_id = getValue("pji_id","int", "POST", 0);
         $m8_hash_p = getValue('hash','str','POST','');
         $m8_hash = md5('m8_m8'.$pji_id); 
         $rt['suc'] = 0;
         if($m8_hash_p == $m8_hash){
            
            delete_file('project_images','pji_id',$pji_id,"pji_image",ROOT.'/pictures/project/'); 
            @delete_file('project_images','pji_id',$pji_id,"pji_image",ROOT.'/pictures/project/small_');
            db_nonQuery("DELETE FROM project_images WHERE pji_id =".$pji_id." LIMIT 1");
            $rt['suc'] = 1;
            echo  json_encode($rt);    
         }else echo "wrong hash";
      break;
}
?>