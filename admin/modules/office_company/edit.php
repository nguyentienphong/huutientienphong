<?php
require 'inc_security.php';
//Kiem tra quyen addedit
checkPermission('edit');
$record_id = getValue('record_id');
/*$catBase = new Category;
$list_cat = array(''=>' - Chọn danh mục - ');
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="'.$bg_table.'"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}*/


$myform = new generate_form();
$myform->add('off_name','off_name',0,0,'',1,'Bạn chưa nhập tên văn phòng');
$myform->add('off_name_en','off_name_en',0,0,'',0,'Bạn chưa nhập tên văn phòng tiếng anh');
$myform->add('off_address','off_address',0,0,'');
$myform->add('off_address_en','off_address_en',0,0,'');
//$myform->add('off_map','off_map',0,0,'',1,'Bạn chưa nhập địa chỉ cho google map');
$myform->add('off_phone','off_phone',0,0,'');
//$myform->add('off_hotline','off_hotline',0,0,'');
$myform->add('off_fax','off_fax',0,0,'');
$myform->add('off_email','off_email',0,0,'');
//$myform->add('off_website','off_website',0,0,'');
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
               <?=$form->text(array('label'=>'Tên văn phòng',
                                 'name'=>'off_name',
                                 'id'=>'off_name',
                                 'value'=>getValue('off_name','str','POST',$off_name),
                                 'require'=>1, 'errorMsg'=>'Bạn chưa nhập tên văn phòng', 
                                 'placeholder'=> 'Tên đề không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tên văn phòng',
                                 'name'=>'off_name_en',
                                 'id'=>'off_name_en',
                                 'value'=>getValue('off_name_en','str','POST',$off_name_en),
                                 'require'=>0, 'errorMsg'=>'Bạn chưa nhập tên văn phòng tiếng anh', 
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
               <?=$form->text(array('label'=>'Địa chỉ hiển thị tiếng anh',
                                   'name'=>'off_address_en',
                                   'id'=>'off_address_en',
                                   'value'=>getValue('off_address_en','str','POST',$off_address_en),
                                   'helptext'=>'',
                                   'class'=>'col-sm-9')
               )?>
               <?/*=$form->text(array('label'=>'Địa chỉ google maps',
                                   'name'=>'off_map',
                                   'id'=>'off_map',
                                   'value'=>getValue('off_map','str','POST',$off_map),
                                   'require'=>1,
                                   'errorMsg'=>'Bạn chưa nhập địa chỉ google maps',
                                   'helptext'=>'',
                                   'class'=>'col-sm-9')
               )*/?>
               
               <?=$form->text(array('label'=>'Điện thoại',
                                    'name'=>'off_phone',
                                    'id'=>'off_phone',
                                    'value'=>getValue('off_phone','str','POST',$off_phone),
                                    'class'=>'col-sm-9'))
               ?>
               <?=$form->text(array('label'=>'FAX',
                                    'name'=>'off_fax',
                                    'id'=>'off_fax',
                                    'value'=>getValue('off_fax','str','POST',$off_fax),
                                    'class'=>'col-sm-9'))
               ?>
               <?=$form->text(array('label'=>'Email',
                                    'name'=>'off_email',
                                    'id'=>'off_email',
                                    'value'=>getValue('off_email','str','POST',$off_email),
                                    'class'=>'col-sm-9'))
               ?>
               <?/*=$form->text(array('label'=>'Website',
                                    'name'=>'off_website',
                                    'id'=>'off_website',
                                    'value'=>getValue('off_website','str','POST',$off_website),
                                    'class'=>'col-sm-9'))
               */?>
               <?//=$form->seoMeta($bg_table,$record_id)?>
               <?=$form->form_action_edit()?>
               <?//=$form->form_preview(DOMAIN.'/linh-vuc-hoat-dong/'.$off_alias.'.html')?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>