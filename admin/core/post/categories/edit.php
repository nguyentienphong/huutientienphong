<?php
require 'inc_security.php';
$record_id = getValue('record_id');
//select ra các danh mục 
$list_cat = array(''=>'- Chọn danh mục cha - ');
//lấy dữ liệu record cần sửa đổi
$db_data 	= new db_query("SELECT * FROM " . $bg_table . " WHERE " . $id_field . " = " . $record_id);
if($row 		= mysql_fetch_assoc($db_data->result)){
    foreach($row as $key=>$value){
        $$key = $value;
    }
}else{
    exit();
}
$arrCat = $catBase->list_categories(0,'cat_active = 1 '.(getValue('cat_type','str','GET',$cat_type) ? 'AND cat_type = "'.getValue('cat_type','str','GET',$cat_type).'"' : ''),'cat_id,cat_name,cat_alias,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}

$myform = new generate_form();
$myform->add('cat_name','cat_name',0,0,'',1,'Bạn chưa nhập tên danh mục');
$myform->add('cat_name_en','cat_name_en',0,0,'',0,'Bạn chưa nhập tên danh mục tiếng anh');
$myform->add('cat_description','cat_description',0,0,'');
$myform->add('cat_type','cat_type',0,1,'',1,'Bạn chưa nhập chọn loại danh mục');
$myform->add('cat_parent_id','cat_parent_id',1,0,0);
$myform->add('cat_order','cat_order',1,0,0);
$myform->add('cat_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->removeHTML(0);
$myform->addTable($bg_table);

$action = getValue('action','str','POST','');
if($action == 'execute'){
   $cat_name = getValue('cat_name','str','POST','');
   $cat_alias = getValue('cat_alias','str','POST','');
   $cat_alias = get_alias($cat_alias,$cat_name,$bg_table,$id_field,$alias_field,$record_id);
   $myform->add('cat_alias','cat_alias',0,1,'');
   
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
        editSeoMeta($record_id,$bg_table);
        form_redirect($record_id);
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
               Danh sách <?=$module_name?>  
               <?php $form = new form();?>                      
               <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>       
            </header>        
            <div class="panel-body">
               <?print_error_msg($bg_errorMsg)?>
               <?=$form->form_open()?>
               <?=$form->select(array(
                 'label'=>'Chọn danh mục cha',
                 'name'=>'cat_parent_id',
                 'id'=>'cat_parent_id',
                 'option'=>$list_cat,
                 'selected'=>getValue('cat_parent_id','int','POST',$cat_parent_id),
                 'class'=>'col-sm-9'))?>
               <?=$form->text(array(
                 'label'=>'Tên danh mục',
                 'name'=>'cat_name',
                 'id'=>'cat_name',
                 'value'=>getValue('cat_name','str','POST',$cat_name),
                 'require'=>1,
                 'errorMsg'=>'Bạn chưa nhập tên danh mục',
                 'helptext'=>'Tên danh mục xuất hiện trên website',
                 'class'=>'col-sm-9'
               ))?>
               <?=$form->text(array(
                 'label'=>'Tên danh mục tiếng anh',
                 'name'=>'cat_name_en',
                 'id'=>'cat_name_en',
                 'value'=>getValue('cat_name_en','str','POST',$cat_name_en),
                 'require'=>0,
                 'errorMsg'=>'Bạn chưa nhập tên danh mục tiếng anh',
                 'helptext'=>'Tên danh mục xuất hiện trên website',
                 'class'=>'col-sm-9'
               ))?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9',
                                                 'value'=>getValue('cat_image','str','POST',$cat_image)))?>
               <?=$form->text(array(
                 'label'=>'Đường dẫn',
                 'name'=>'cat_alias',
                 'id'=>'cat_alias',
                 'value'=>getValue('cat_alias','str','POST',$cat_alias),
                 'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                 'class'=>'col-sm-9'
               ))?>
               <?=$form->text(array(
                 'label'=>'Thứ tự',
                 'name'=>'cat_order',
                 'id'=>'cat_order',
                 'value'=>getValue('cat_order','int','POST',$cat_order),
                 'helptext'=>'Thứ tự hiển thị của danh mục. Là số tự nhiên (0,1,2,3 ...).',
                 'class'=>'col-sm-9'
               ))?>
               <?=$form->tinyMCE('Mô tả danh mục', 
                              'cat_description', 
                              'cat_description', 
                              getValue('cat_description','str','POST',$cat_description), 
                              '100%'
               )?>
               <?=$form->seoMeta($bg_table,$record_id)?>
               <?=$form->form_action_edit()?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>