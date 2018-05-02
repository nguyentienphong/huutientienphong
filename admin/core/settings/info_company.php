<?php
require 'inc_security.php';
$bg_success = '';
$bg_table = 'office_contact';
$bg_errorMsg = '';
//Kiem tra quyen addedit
checkPermission('edit');
$record_id = 1;
$id_field = 'off_id';
$myform = new generate_form();
$myform->add('off_name','off_name',0,0,'',1,'Bạn chưa nhập tên công ty');
$myform->add('off_address','off_address',0,0,'');
//$myform->add('off_map','off_map',0,0,'',1,'Bạn chưa nhập địa chỉ cho google map');
$myform->add('off_phone','off_phone',0,0,'');
$myform->add('off_hotline','off_hotline',0,0,'');
$myform->add('off_email','off_email',0,0,'');
$myform->add('off_website','off_website',0,0,'');
$myform->removeHTML(0);
$myform->addTable($bg_table);

$action = getValue('action','str','POST','');
if($action == 'execute'){
   
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
        //edit lai meta seo
        editSeoMeta($record_id,$bg_table);
        //ghi lai log nguoi sua
        log_edit($record_id,$bg_table);
        $bg_success = 'Cấu hình đã được lưu lại.';
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
           <a href="#">Cấu hình</a>
       </li>
       <li class="active"> Thông tin công ty </li>
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
               <?=$form->text(array('label'=>'Tên công ty',
                                 'name'=>'off_name',
                                 'id'=>'off_name',
                                 'value'=>getValue('off_name','str','POST',$off_name),
                                 'require'=>1, 'errorMsg'=>'Bạn chưa nhập tên công ty', 
                                 'placeholder'=> 'Tên đề không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Địa chỉ hiển thị',
                                   'name'=>'off_address',
                                   'id'=>'off_address',
                                   'value'=>getValue('off_address','str','POST',$off_address),
                                   'helptext'=>'',
                                   'class'=>'col-sm-9')
               )?>

               
               <?=$form->text(array('label'=>'Điện thoại',
                                    'name'=>'off_phone',
                                    'id'=>'off_phone',
                                    'value'=>getValue('off_phone','str','POST',$off_phone),
                                    'class'=>'col-sm-9'))
               ?>
               <?=$form->text(array('label'=>'Hotline',
                                    'name'=>'off_hotline',
                                    'id'=>'off_hotline',
                                    'value'=>getValue('off_hotline','str','POST',$off_hotline),
                                    'class'=>'col-sm-9'))
               ?>
               <?=$form->text(array('label'=>'Email',
                                    'name'=>'off_email',
                                    'id'=>'off_email',
                                    'value'=>getValue('off_email','str','POST',$off_email),
                                    'class'=>'col-sm-9'))
               ?>
               <?=$form->text(array('label'=>'Website',
                                    'name'=>'off_website',
                                    'id'=>'off_website',
                                    'value'=>getValue('off_website','str','POST',$off_website),
                                    'class'=>'col-sm-9'))
               ?>
               <div class="panel-body">
                   <div class="form-group">
                     <input type="hidden" name="action" value="execute" />
                      <button class="btn btn-info" type="submit">Lưu cấu hình</button>
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