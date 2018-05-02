<?php
require 'inc_security.php';
checkPermission('edit');

$record_id = getValue('record_id');

$myform = new generate_form();
$myform->add('pag_title','pag_title',0,0,'',1,'Bạn chưa nhập tiêu đề trang');
$myform->add('pag_active','pag_active',1,0,0);
$myform->add('pag_summary','pag_summary',0,0,'');
$myform->add('pag_detail','pag_detail',0,0,'',1,'Bạn chưa nhập chi tiết trang');
$myform->add('pag_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->removeHTML(0);
$myform->addTable($bg_table);

$action = getValue('action','str','POST','');
if($action == 'execute'){
   $pag_title = getValue('pag_title','str','POST','');
   $pag_alias = getValue('pag_alias','str','POST','');
   $pag_alias = get_alias($pag_alias,$pag_title,$bg_table,$id_field,$alias_field,$record_id);
   $myform->add('pag_alias','pag_alias',0,1,'');
   
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
        //edit lai meta seo
        editSeoMeta($record_id,$bg_table);
        //ghi lai log nguoi sua
        log_edit($record_id,$bg_table);
        //redirect theo action cua nut nguoi dung click
        form_redirect($record_id);
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
               <?php print_error_msg($bg_errorMsg)?>
               <?=$form->form_open()?>
               <?=$form->text(array('label'=>'Tiêu đề',
                                 'name'=>'pag_title',
                                 'id'=>'pag_title',
                                 'value'=>getValue('pag_title','str','POST',$pag_title),
                                 'require'=>1, 'errorMsg'=>'Bạn chưa nhập tiêu đề', 
                                 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Đường dẫn',
                                   'name'=>'pag_alias',
                                   'id'=>'pag_alias',
                                   'value'=>getValue('pag_alias','str','POST',$pag_alias),
                                   'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                   'class'=>'col-sm-9')
               )?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9',
                                                 'value'=>getValue('pag_image','str','POST',$pag_image)))?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                     'name'=> 'pag_active', 
                                     'id'=> 'pag_active', 
                                     'value'=>1 ,
                                     'currentValue'=>getValue('pag_active','int','POST',$pag_active), 
                                     'helptext'=> 'Xuất bản - hiển thị ra website',
                                     'class'=>'col-sm-9',
                                     'extra'=>' onclick="return check_one(\'pag_active\');"')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                     'name'=> 'pag_summary', 
                                     'id'=> 'pag_summary',
                                     'value'=>getValue('pag_summary','str','POST',$pag_summary), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                              'pag_detail', 
                              'pag_detail', 
                              getValue('pag_detail','str','POST',$pag_detail), 
                              '100%'
               )?>
               <?=$form->seoMeta($bg_table,$record_id)?>
               <?=$form->form_action_edit()?>
               <?=$form->form_preview(DOMAIN.'/page/'.$pag_alias.'.html')?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>