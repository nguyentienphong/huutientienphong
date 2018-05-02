<?php
require 'inc_security.php';
//Kiem tra quyen addedit
checkPermission('edit');
$record_id = getValue('record_id');

$imu_date = time();
$myform = new generate_form();
$myform->add('imu_image','imu_image',0,0,'',1,'Bạn chưa nhập tên ảnh');
$myform->add('imu_alt','imu_alt',0,1,'');
$myform->add('imu_caption','imu_caption',0,1,'');
$myform->add('imu_description','imu_description',0,1,'');
//$myform->add('imu_hot','imu_hot',1,0,0);
$myform->removeHTML(0);
$myform->addTable($bg_table);

$action = getValue('action','str','POST','');
if($action == 'execute'){
      $bg_errorMsg .= $myform->checkdata();
      if($bg_errorMsg == ''){
         $imu_image = getValue('imu_image','str','POST','0');
         $image_name_new = getValue('imu_image','str','POST','');
         $image_name_old = getValue('imu_image_old','str','POST','');
         $image_date = getValue('imu_date','str','POST','');
         $img_link_old = $_SERVER["DOCUMENT_ROOT"].'/media/images/'.img_filepath($image_date).$image_name_old;
         $img_link_new = $_SERVER["DOCUMENT_ROOT"].'/media/images/'.img_filepath($image_date).$image_name_new;
         rename($img_link_old,$img_link_new);
         foreach($arr_resize as $type => $arr){
            $img_link_old = $_SERVER["DOCUMENT_ROOT"].'/media/images/'.img_filepath($image_date).$type.$image_name_old;
            $img_link_new = $_SERVER["DOCUMENT_ROOT"].'/media/images/'.img_filepath($image_date).$type.$image_name_new;
   			rename($img_link_old,$img_link_new);
   		}
         $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
         redirect('listing.php');
      }
}

//lấy dữ liệu record cần sửa đổi
$db_data 	= new db_query("SELECT * FROM " . $bg_table . " WHERE " . $id_field . " = " . $record_id);
if($row 		= mysql_fetch_assoc($db_data->result)){
	foreach($row as $key=>$value){
		$$key = $value;
	}
}else{
		exit();
} 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=$load_header?>
</head>
<body>
<div class="wrapper">
   <div class="row">
      <div class="col-sm-12">
         <section class="panel">
            <header class="panel-heading">
               Sửa <?=$module_name?>  
               <?php $form = new form();?>                      
               <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>       
            </header>        
            <div class="panel-body">
               <?print_error_msg($bg_errorMsg)?>
               <?=$form->form_open()?>    
               <div class="form-group">
                  <label class="control-label">Ảnh</label>
                  <div class="controls col-sm-9" style="width: 160px;height:90px;overflow:hidden">
                     <div class="img_thumb">
                        <img src="<?=$bg_filepath.img_filepath($imu_date) . getValue('imu_picture','str','POST',$imu_image)?>" alt="Khong co anh"/>
                     </div>
                  </div>
               </div>
               <?=form_hidden('imu_image_old',$imu_image)?>
               <?=form_hidden('imu_date',$imu_date)?>
               <?=$form->text(array('label'=>'Tên ảnh','name'=>'imu_image','id'=>'imu_image','value'=>getValue('imu_image','str','POST',$imu_image),'require'=>1, 'errorMsg'=>'Bạn chưa nhập tên ảnh', 'placeholder'=> 'Tên không dài quá 255 ký tự','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Alt','name'=>'imu_alt','id'=>'imu_alt','value'=>getValue('imu_alt','str','POST',$imu_alt),'require'=>0, 'errorMsg'=>'Bạn chưa nhập alt ảnh', 'placeholder'=> 'Alt không dài quá 255 ký tự','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Caption','name'=>'imu_caption','id'=>'imu_caption','value'=>getValue('imu_caption','str','POST',$imu_caption),'require'=>0, 'errorMsg'=>'Bạn chưa nhập Caption ảnh', 'placeholder'=> 'Caption không dài quá 255 ký tự','class'=>'col-sm-9'))?>
               <?=$form->tinyMCE('Mô tả', 'imu_detail', 'imu_description', getValue('imu_description','str','POST',$imu_description), '100%',450,'')?>
               <?=$form->form_action(array('label'=>array('Cập nhật','Nhập lại'),'type'=>array('submit','reset')))?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>