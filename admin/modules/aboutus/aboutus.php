<?php
require 'inc_security.php';
$bg_success = '';
//Kiem tra quyen addedit
checkPermission('edit');
$record_id = 1;
$id_field = 'abu_id';
$myform = new generate_form();
$myform->add('abu_summary','abu_summary',0,0,'',0,'');
$myform->add('abu_summary_en','abu_summary_en',0,0,'',0,'');
$myform->add('abu_summary_ko','abu_summary_ko',0,0,'',0,'');
$myform->add('abu_content','abu_content',0,0,'',0,'');
$myform->add('abu_content_en','abu_content_en',0,0,'',0,'');
$myform->add('abu_content_ko','abu_content_ko',0,0,'',0,'');

$myform->removeHTML(0);
$myform->addTable($bg_table);

$action = getValue('action','str','POST','');
if($action == 'execute'){
   
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
        //edit lai meta seo
        //editSeoMeta($record_id,$bg_table);
        //ghi lai log nguoi sua
        log_edit($record_id,$bg_table);
        $bg_success = 'Thông tin đã được lưu lại.';
        redirect('aboutus.php');
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
<div class="page-heading">
   <h3>
       Thông tin công ty
   </h3>
   <ul class="breadcrumb">
       <li>
           <a href="#">Giới thiệu công ty</a>
       </li>
   </ul>
</div>
<div class="wrapper">
   <?php
   if($bg_success != '') {
      ?>
      <div class="row">
          <div class="col-md-12">
              <section class="panel">
                  <header class="panel-heading">
                      Thông báo trang thái
                  </header>
                  <div class="panel-body">
                     <div class="alert alert-success fade in">
                          <button type="button" class="close close-sm" data-dismiss="alert">
                              <i class="fa fa-times"></i>
                          </button>
                          <strong>Thành công!</strong> <?=$bg_success?>
                      </div>
                  </div>
              </section>
          </div>
      </div>
      <?
   }
   ?>
   <div class="row">
      <div class="col-sm-12">
         <section class="panel">
            <header class="panel-heading">
               <?php $form = new form();?>                      
               <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>       
            </header>        
            <div class="panel-body">
               <?php print_error_msg($bg_errorMsg)?>
               <?=$form->form_open()?>
               <?=$form->tinyMCE('Giới thiệu tóm tắt', 
                              'abu_summary', 
                              'abu_summary', 
                              getValue('abu_summary','str','POST',$abu_summary), 
                              '100%'
               )?>
               <?=$form->tinyMCE('Giới thiệu tóm tắt tiếng anh', 
                              'abu_summary_en', 
                              'abu_summary_en', 
                              getValue('abu_summary_en','str','POST',$abu_summary_en), 
                              '100%'
               )?>
               <?=$form->tinyMCE('Giới thiệu tóm tắt tiếng hàn', 
                              'abu_summary_ko', 
                              'abu_summary_ko', 
                              getValue('abu_summary_ko','str','POST',$abu_summary_ko), 
                              '100%'
               )?>
               <?=$form->tinyMCE('Nội dung', 
                              'abu_content', 
                              'abu_content', 
                              getValue('abu_content','str','POST',$abu_content), 
                              '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng anh', 
                              'abu_content_en', 
                              'abu_content_en', 
                              getValue('abu_content_en','str','POST',$abu_content_en), 
                              '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng hàn', 
                              'abu_content_ko', 
                              'abu_content_ko', 
                              getValue('abu_content_ko','str','POST',$abu_content_ko), 
                              '100%'
               )?>
              
               <div class="panel-body">
                   <div class="form-group">
                     <input type="hidden" name="action" value="execute" />
                      <button class="btn btn-info" type="submit">Lưu thông tin</button>
                   </div>
               </div>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>