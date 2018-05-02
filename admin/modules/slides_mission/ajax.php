<?php
require_once 'inc_security.php';
$action = getValue('action','str','POST','');
switch($action){
    case 'update_image_alt':
       $rt = array();
       $rt['success'] = 0;
       $imu_id = getValue('imu_id','int','POST',0);
       $image_alt = getValue('image_alt','str','POST','');
       db_nonQuery("UPDATE images_upload SET imu_image_alt ='".$image_alt."' WHERE imu_id =".$imu_id);
       $rt['success'] = 1;
       echo json_encode($rt); 
    break;
    case 'alias':
        $title = getValue('title','str','POST','');
        echo removeTitle($title);
    break;
}
?>