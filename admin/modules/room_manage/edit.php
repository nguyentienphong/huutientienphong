<?php
require 'inc_security.php';
//Kiem tra quyen addedit
checkPermission('add');
$record_id = getValue('record_id');
$par_date = time();
$myform = new generate_form();
$myform->add('roo_name','roo_name',0,0,'',1,'Bạn chưa nhập tên phòng');
$myform->add('roo_name_en','roo_name_en',0,0,'',1,'Bạn chưa nhập tên phòng tiếng anh');
$myform->add('roo_name_ko','roo_name_ko',0,0,'',1,'Bạn chưa nhập tên phòng tiếng hàn');
$myform->add('roo_alias','roo_alias',0,0,'',0,'tên phòng tiếng hàn');
$myform->add('roo_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->add('roo_price','roo_price',0,0,'', 1, 'Bạn chưa nhập giá phòng');
$myform->add('roo_description','roo_description',0,0,'', 1,'Bạn chưa nhập giới thiệu phòng');
$myform->add('roo_description_en','roo_description_en',0,0,'', 1, 'Bạn chưa nhập giới thiệu phòng tiếng anh');
$myform->add('roo_description_ko','roo_description_ko',0,0,'', 1, 'Bạn chưa nhập giới thiệu phòng tiếng hàn');
$myform->add('roo_detail','roo_detail',0,0,'', 1,'Bạn chưa nhập thông tin phòng');
$myform->add('roo_detail_en','roo_detail_en',0,0,'', 1, 'Bạn chưa nhập thông tin phòng tiếng anh');
$myform->add('detail_ko','detail_ko',0,0,'', 1, 'Bạn chưa nhập thông tin phòng tiếng hàn');
$myform->add('room_type','room_type',1,0,0);
$myform->add('roo_image','roo_image',0,0,0);
$myform->add('roo_active','roo_active',0,0,0);
$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
         
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
        log_edit($record_id,$bg_table);
        form_redirect($record_id);
    }
}

//lấy dữ liệu record cần sửa đổi
$db_data = new db_query("SELECT * FROM " . $bg_table . " WHERE " . $id_field . " = " . $record_id);
if($row = mysql_fetch_assoc($db_data->result)){
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
               Thêm mới <?=$module_name?>
               <?php $form = new form();?>
               
               <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>
            </header>  
            <div class="panel-body">
               <?print_error_msg($bg_errorMsg)?>
               <?=$form->form_open()?>
			   <input type="hidden" name="roo_active" value="1" />
               <?=$form->text(array('label'=>'Tên phòng',
                                    'name'=>'roo_name',
                                    'id'=>'roo_name',
                                    'value'=>getValue('roo_name','str','POST', $roo_name),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tên phòng', 
                                    'class'=>'col-sm-9')
               )?>
			   <?=$form->text(array('label'=>'Tên phòng tiếng anh',
                                    'name'=>'roo_name_en',
                                    'id'=>'roo_name_en',
                                    'value'=>getValue('roo_name_en','str','POST', $roo_name_en),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tên phòng tiếng anh', 
                                    'class'=>'col-sm-9')
               )?>
			   <?=$form->text(array('label'=>'Tên phòng tiếng hàn',
                                    'name'=>'roo_name_ko',
                                    'id'=>'roo_name_ko',
                                    'value'=>getValue('roo_name_ko','str','POST', $roo_name_ko),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tên phòng tiếng hàn', 
                                    'class'=>'col-sm-9')
               )?>
			   
                <?=$form->text(array('label'=>'Tên hiển thị trên link',
                                    'name'=>'roo_alias',
                                    'id'=>'roo_alias',
                                    'value'=>getValue('roo_alias','str','POST', $roo_alias),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập tên hiển thị trên link', 
                                    'class'=>'col-sm-9')
               )?>
			   
			   <?=$form->text(array('label'=>'Giá phòng',
                                    'name'=>'roo_price',
                                    'id'=>'roo_price',
                                    'value'=>getValue('roo_price','str','POST', $roo_price),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập giá phòng', 
                                    'class'=>'col-sm-9')
               )?>
			   
               <?/*=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9'))*/?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'roo_image',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9',
                                                 'value'=>getValue('roo_image','str','POST',$roo_image)))?>
			   
               <?=$form->textarea(array('label'=> 'Giới thiệu chung', 
                                        'name'=> 'roo_description', 
                                        'id'=> 'roo_description',
                                        'value'=>getValue('roo_description','str','POST', $roo_description), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
			   <?=$form->textarea(array('label'=> 'Giới thiệu chung bằng tiếng anh', 
                                        'name'=> 'roo_description_en', 
                                        'id'=> 'roo_description_en',
                                        'value'=>getValue('roo_description_en','str','POST', $roo_description_en), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
			   <?=$form->textarea(array('label'=> 'Giới thiệu chung bằng tiếng hàn', 
                                        'name'=> 'roo_description_ko', 
                                        'id'=> 'roo_description_ko',
                                        'value'=>getValue('roo_description_ko','str','POST', $roo_description_ko), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
			   
               <?=$form->tinyMCE('Thông tin phòng', 
                                 'roo_detail', 
                                 'roo_detail', 
                                 getValue('roo_detail','str','POST', $roo_detail), 
                                 '100%'
               )?>
			   <?=$form->tinyMCE('Thông tin phòng bằng tiếng anh', 
                                 'roo_detail_en', 
                                 'roo_detail_en', 
                                 getValue('roo_detail_en','str','POST', $roo_detail_en), 
                                 '100%'
               )?>
			   <?=$form->tinyMCE('Thông tin phòng bằng tiếng hàn', 
                                 'detail_ko', 
                                 'detail_ko', 
                                 getValue('detail_ko','str','POST', $detail_ko), 
                                 '100%'
               )?>
			   
			   <?php $type = array('1' => "Phòng nghỉ",
											'2' => "Nhà hàng & Bar", 
											'3' => "Phòng hội nghị & sự kiện"
												) ?>
				<?=$form->select(array('label' 	=> 'Loại phòng',
                                      'name'	=> 'room_type', 
                                      'id'		=> 'room_type',
                                      'option'	=> $type, 
                                      'title'	=> 'Chọn trạng thái',
                                      'require'	=> 1,
                                      'errorMsg'=> 'Bạn chưa chọn loại phòng',
                                      'selected'=> getValue('room_type','int','POST',$room_type),
                                      'class'	=> 'col-sm-9' )) ?>
			   
               <?=$form->form_action_add()?>
               <?=$form->form_close()?>
            </div> 
         </section>
      </div>
   </div>  
</div>
</body>
</html>