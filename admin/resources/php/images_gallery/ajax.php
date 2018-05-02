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
    case 'image_info':
       $rt = array();
       $rt['success'] = 0;
       $rt['info'] = 'Không lấy được thông tin ảnh';
       $imu_id = getValue('imu_id','int','POST',0);
       $info = db_first("SELECT * FROM  images_upload WHERE imu_id =".$imu_id);
       list($width,$height) = getimagesize($bg_filepath.img_filepath($info['imu_date']).$info['imu_image']);
       $rt['info'] = '<div class="col-md-5 img-modal">
                                          <img src="'.$bg_filepath.img_filepath($info['imu_date']).'medium_'.$info['imu_image'].'" alt="">
                                          <a href="/media/images/'.img_filepath($info['imu_date']).$info['imu_image'].'" class="fancybox btn btn-white btn-sm"><i class="fa fa-eye"></i> Xem ảnh lớn</a>
                                          <p class="mtop10"><strong>Tên :</strong> '.$info['imu_image'].'</p>
                                          <p><strong>Kiểu ảnh:</strong> '.getExtension($info['imu_image']).'</p>
                                          <p><strong>Cỡ:</strong> '.$width.'x'.$height.'</p>
                                          <p><strong>Được thêm bởi:</strong> <a href="#">M8</a></p>
                                      </div>
                                      <div class="col-md-7">
                                          <div class="form-group">
                                              <label> Tên</label>
                                              <input id="name" value="'.$info['imu_image'].'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                              <label> ALT</label>
                                              <input id="alt" value="'.$info['imu_alt'].'" class="form-control">
                                          </div>
                                          <div class="form-group">
                                              <label> Caption</label>
                                              <textarea rows="2" class="form-control" id="caption">'.$info['imu_caption'].'</textarea>
                                          </div>
                                          
                                          <div class="pull-right">
                                              <button class="btn btn-danger btn-sm" onclick="imu_delete('.$info['imu_id'].')" type="button">Xóa</button>
                                              <button class="btn btn-success btn-sm btn-submit" onclick="submit_info('.$info['imu_id'].')" type="button">Lưu thay đổi</button>
                                              <!--<button class="btn btn-success btn-sm choose" type="button">Chọn</button>-->
                                          </div>
                                      </div>
                           <script>
                              $(".fancybox").fancybox();
                           </script>';
       $rt['success'] = 1;
       echo json_encode($rt); 
   break;
   case 'update_image_info':
      $rt = array();
      $rt['success'] = 0;      
      $imu_id = getValue('imu_id','int','POST',0);
      $image_name = getValue('name','str','POST','');
      $image_alt = getValue('alt','str','POST','');
      $title = getValue('title','str','POST','');
      $caption = getValue('caption','str','POST','');
      $image_name_new = $image_name;
      $image_name_old = db_one('SELECT imu_image FROM images_upload WHERE imu_id='.$imu_id);
      $image_date = db_one('SELECT imu_date FROM images_upload WHERE imu_id='.$imu_id);
      $img_link_old = $_SERVER["DOCUMENT_ROOT"].'/media/images/'.img_filepath($image_date).$image_name_old;
      $img_link_new = $_SERVER["DOCUMENT_ROOT"].'/media/images/'.img_filepath($image_date).$image_name_new;
            rename($img_link_old,$img_link_new);
            foreach($arr_resize as $type => $arr){
               $img_link_old = $_SERVER["DOCUMENT_ROOT"].'/media/images/'.img_filepath($image_date).$type.$image_name_old;
               $img_link_new = $_SERVER["DOCUMENT_ROOT"].'/media/images/'.img_filepath($image_date).$type.$image_name_new;
      			rename($img_link_old,$img_link_new);
      		}
      db_nonQuery("UPDATE images_upload SET imu_alt ='".$image_alt."',imu_image ='".$image_name."',imu_caption ='".$caption."' WHERE imu_id =".$imu_id);
      $rt['success'] = 1;
      echo json_encode($rt); 
   break;
   case 'imu_delete':
      $rt = array();
      $rt['success'] = 0;
      $imu_id = getValue('imu_id','int','POST',0);
      $date_imu = db_one("SELECT imu_date FROM images_upload WHERE imu_id = ".$imu_id);
      delete_file('images_upload','imu_id',$imu_id,"imu_image",'../../../../media/images/'.img_filepath($date_imu));
      $db_del = new db_execute("DELETE FROM images_upload WHERE imu_id =". $imu_id);
      $rt['success'] = 1;
      echo json_encode($rt); 
   break;
}
?>