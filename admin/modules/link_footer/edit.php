<?php
require 'inc_security.php';
checkPermission('edit');
$record_id = getValue('record_id');

$myform = new generate_form();
$myform->add('lft_title','lft_title',0,0,'',1,'Bạn chưa nhập tiêu đề trang');
$myform->add('lft_link','lft_link',0,0,'',0,'Bạn chưa nhập link');
$myform->add('lft_position','lft_position',1,0,0);
$myform->add('lft_active','lft_active',1,0,0);
$myform->removeHTML(0);
$myform->addTable($bg_table);

$action = getValue('action','str','POST','');
if($action == 'execute'){
    $bg_errorMsg .= $myform->checkdata();
    $upload = new upload('lft_picture',$bg_filepath,$bg_extension,$limit_size);
    $filename = $upload->file_name;
    if($filename){
        $myform->add('lft_picture','filename',0,1,'');
        foreach($arr_resize as $type => $arr){
			resize_image($bg_filepath, $filename, $arr["width"], $arr["height"], $arr["quality"], $type);
		}
		delete_file($bg_table,$id_field,$record_id,"lft_picture",$bg_filepath);
    }
    $bg_errorMsg .= $upload->show_warning_error();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
        editSeoMeta($record_id,$bg_table);
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
<div class="module_header bold fix"><?=$module_name?></div>
<div id="wrapper">
   <?print_error_msg($bg_errorMsg)?>
   <?php $form = new form();
   ?>
   <?=$form->form_open()?>
   <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>
   <?=$form->text(array('label'=>'Tiêu đề','name'=>'lft_title','id'=>'lft_title','value'=>getValue('lft_title','str','POST',$lft_title),'require'=>1, 'errorMsg'=>'Bạn chưa nhập tiêu đề', 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự'),0,'span6')?>
   <?=$form->text(array('label'=>'Link','name'=>'lft_link','id'=>'lft_link','value'=>getValue('lft_link','str','POST',$lft_link),'require'=>0, 'errorMsg'=>'Bạn chưa nhập link', 'placeholder'=> 'Link không dài quá 255 ký tự'),0,'span6')?>
   <?=$form->text(array('label'=>'Thứ tự','name'=>'lft_position','id'=>'lft_position','value'=>getValue('lft_position','int','POST',$lft_position)))?>
   <?=$form->checkbox(array('label'=> 'Xuất bản', 'name'=> 'lft_active', 'id'=> 'lft_active', 'value'=>1 ,'currentValue'=>getValue('lft_active','int','POST',$lft_active), 'helptext'=> 'Xuất bản ra trang'))?>
   <?=$form->form_action(array('label'=>array('Cập nhật','Nhập lại'),'type'=>array('submit','reset')))?>
   <?=$form->form_close()?>
</div>
</body>
</html>