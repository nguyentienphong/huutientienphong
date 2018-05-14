<?php
require 'inc_security.php';
//Kiem tra quyen addedit
checkPermission('add');

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
$myform->add('room_type','room_type',0,0,'', 1, 'Bạn chưa chọn loại phòng');

//$myform->add('par_cat_id','par_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
//$myform->add('par_date','par_date',1,1,0);
//$myform->add('par_active','par_active',1,0,0);
//$myform->add('par_hot','par_hot',1,0,0);
//$myform->add('par_description','par_description',0,0,'');
//$myform->add('par_detail','par_detail',0,0,'',0,'Bạn chưa nhập chi tiết');

$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   /*$par_title = getValue('par_title','str','POST','');
   $par_alias = getValue('par_alias','str','POST','');
   $par_alias = get_alias($par_alias,$par_title,$bg_table,$id_field,$alias_field);
   $myform->add('par_alias','par_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');*/
      
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute_return();
        $last_id = $db_insert->db_execute($myform->generate_insert_SQL());
        //Add seo meta
        //addSeoMeta($last_id,$bg_table);
        //ghi lai log nguoi add
        log_add($last_id,$bg_table);
        //redirect theo action cua nut nguoi dung click
        form_redirect($last_id);
    }
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
               <?=$form->text(array('label'=>'Tên phòng',
                                    'name'=>'roo_name',
                                    'id'=>'roo_name',
                                    'value'=>getValue('roo_name','str','POST',''),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tên phòng', 
                                    'class'=>'col-sm-9')
               )?>
			   <?=$form->text(array('label'=>'Tên phòng tiếng anh',
                                    'name'=>'roo_name_en',
                                    'id'=>'roo_name_en',
                                    'value'=>getValue('roo_name_en','str','POST',''),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tên phòng tiếng anh', 
                                    'class'=>'col-sm-9')
               )?>
			   <?=$form->text(array('label'=>'Tên phòng tiếng hàn',
                                    'name'=>'roo_name_ko',
                                    'id'=>'roo_name_ko',
                                    'value'=>getValue('roo_name_ko','str','POST',''),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tên phòng tiếng hàn', 
                                    'class'=>'col-sm-9')
               )?>
			   
                <?=$form->text(array('label'=>'Tên hiển thị trên link',
                                    'name'=>'roo_alias',
                                    'id'=>'roo_alias',
                                    'value'=>getValue('roo_alias','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập tên hiển thị trên link', 
                                    'class'=>'col-sm-9')
               )?>
			   
			   <?=$form->text(array('label'=>'Giá phòng',
                                    'name'=>'roo_price',
                                    'id'=>'roo_price',
                                    'value'=>getValue('roo_price','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập giá phòng', 
                                    'class'=>'col-sm-9')
               )?>
			   
               <?/*=$form->select(array('label'=>'Danh mục',
                                      'name'=>'par_cat_id', 
                                      'id'=>'par_cat_id',
                                      'option'=>$list_cat, 
                                      'title'=>'Chọn danh mục',
                                      'require'=>1,
                                      'errorMsg'=>'Bạn chưa chọn danh mục',
                                      'selected'=>getValue('par_cat_id','int','POST',''),
                                      'class'=>'col-sm-9'
               ))*/?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9'))?>
               <?/*=$form->checkbox(array('label'=> 'Nổi bật', 
                                        'name'=> 'par_hot', 
                                        'id'=> 'par_hot', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('par_hot','int','POST',1), 
                                        'helptext'=> 'Bài viết đánh dấu nổi bật sẽ được ưu tiên hiển thị')
               )*/?>
               
               <?//=$form->getFile(array('label'=>'Ảnh đại diện','title'=>'Ảnh đại diện','name'=>'par_picture','id'=>'par_picture'))?>
               <?=$form->textarea(array('label'=> 'Giới thiệu chung', 
                                        'name'=> 'roo_description', 
                                        'id'=> 'roo_description',
                                        'value'=>getValue('roo_description','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
			   <?=$form->textarea(array('label'=> 'Giới thiệu chung bằng tiếng anh', 
                                        'name'=> 'roo_description_en', 
                                        'id'=> 'roo_description_en',
                                        'value'=>getValue('roo_description_en','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
			   <?=$form->textarea(array('label'=> 'Giới thiệu chung bằng tiếng hàn', 
                                        'name'=> 'roo_description_ko', 
                                        'id'=> 'roo_description_ko',
                                        'value'=>getValue('roo_description_ko','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
			   
               <?=$form->tinyMCE('Thông tin phòng', 
                                 'roo_detail', 
                                 'roo_detail', 
                                 getValue('roo_detail','str','POST',''), 
                                 '100%'
               )?>
			   <?=$form->tinyMCE('Thông tin phòng bằng tiếng anh', 
                                 'roo_detail_en', 
                                 'roo_detail_en', 
                                 getValue('roo_detail_en','str','POST',''), 
                                 '100%'
               )?>
			   <?=$form->tinyMCE('Thông tin phòng bằng tiếng hàn', 
                                 'detail_ko', 
                                 'detail_ko', 
                                 getValue('detail_ko','str','POST',''), 
                                 '100%'
               )?>
			   
               <?/*=$form->checkbox(array('label'=> 'Xuất bản', 
                                        'name'=> 'par_active', 
                                        'id'=> 'par_active', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('par_active','int','POST',1), 
                                        'helptext'=> 'Xuất bản - hiển thị ra website',
                                        'class'=>'col-sm-9',
                                        'extra'=>' onclick="return check_one(\'par_active\');"')
               )*/?>
               <?//=$form->seoMeta($bg_table)?>
               <?=$form->form_action_add()?>
               <?=$form->form_close()?>
            </div> 
         </section>
      </div>
   </div>  
</div>
</body>
</html>