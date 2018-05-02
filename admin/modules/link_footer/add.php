<?php
require 'inc_security.php';
checkPermission('add');
$myform = new generate_form();
$myform->add('lft_title','lft_title',0,0,'',1,'Bạn chưa nhập tiêu đề');
$myform->add('lft_link','lft_link',0,0,'',0,'Bạn chưa nhập link');
$myform->add('lft_active','lft_active',1,0,0);
$myform->add('lft_position','lft_position',1,0,0);
$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute_return();
        $last_id = $db_insert->db_execute($myform->generate_insert_SQL());
        //Add seo meta
        addSeoMeta($last_id,$bg_table);
        redirect('listing.php');
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
<div class="module_header bold fix"><?=$module_name?></div>
<div id="wrapper">
   <?print_error_msg($bg_errorMsg)?>
   <?php $form = new form();?>
   <?=$form->form_open()?>
   <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>
   <?=$form->text(array('label'=>'Tiêu đề','name'=>'lft_title','id'=>'lft_title','value'=>getValue('lft_title','str','POST',''),'require'=>1, 'errorMsg'=>'Bạn chưa nhập tiêu đề bài', 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự'),0,'span6')?>
   <?=$form->text(array('label'=>'Link','name'=>'lft_link','id'=>'lft_link','value'=>getValue('lft_link','str','POST',''),'require'=>0, 'errorMsg'=>'Bạn chưa nhập link', 'placeholder'=> 'link không dài quá 255 ký tự'),0,'span6')?>
   <?=$form->text(array('label'=>'Thứ tự','name'=>'lft_position','id'=>'lft_position','value'=>getValue('lft_position','int','POST',0)))?>
   <?=$form->checkbox(array('label'=> 'Xuất bản', 'name'=> 'lft_active', 'id'=> 'lft_active', 'value'=>1 ,'currentValue'=>getValue('lft_active','int','POST',1), 'helptext'=> 'Xuất bản ra trang'))?>
   <?//=$form->textarea(array('label'=> 'Tóm tắt', 'name'=> 'lft_summary', 'id'=> 'lft_summary','value'=>getValue('lft_summary','str','POST',''), 'style'=>'width:500px;height:100px', 'require'=> 1))?>
   <?=$form->form_action(array('label'=>array('Thêm mới','Nhập lại'),'type'=>array('submit','reset')))?>
   <?=$form->form_close()?>
</div>
</body>
</html>