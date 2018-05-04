<?php
require 'inc_security.php';
$record_id = getValue('record_id');
$catBase = new Category;
$list_cat = array(''=>' - Chọn danh mục - ');
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="services"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}


$fee_date = time();
$myform = new generate_form();
$myform->add('fee_fullname','fee_fullname',0,0,'',1,'Bạn chưa nhập tên khách hàng');
//$myform->add('fee_cat_id','fee_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('fee_date','fee_date',1,1,0);
$myform->add('fee_active','fee_active',1,0,0);
//$myform->add('fee_hot','fee_hot',1,0,0);
$myform->add('fee_content','fee_content',0,0,'',0,'Bạn chưa nhập nội dung');
$myform->add('fee_content_en','fee_content_en',0,0,'',0,'Bạn chưa nhập nội dung tiếng anh');
$myform->add('fee_content_ko','fee_content_ko',0,0,'',0,'Bạn chưa nhập nội dung tiếng hàn');
//$myform->add('fee_detail','fee_detail',0,0,'',0,'Bạn chưa nhập chi tiết dịch vụ');
//$myform->add('fee_detail_en','fee_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết dịch vụ tiếng anh');
$myform->add('fee_image','imu',0,0,'',0,'Bạn chưa chọn ảnh khách hàng');
$myform->removeHTML(0);
$myform->addTable($bg_table);

$action = getValue('action','str','POST','');
if($action == 'execute'){
   /*$fee_fullname = getValue('fee_fullname','str','POST','');
   $fee_alias = getValue('fee_alias','str','POST','');
   $fee_alias = get_alias($fee_alias,$fee_fullname,$bg_table,$id_field,$alias_field,$record_id);
   $myform->add('fee_alias','fee_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');*/
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
        //editSeoMeta($record_id,$bg_table);
        log_edit($record_id,$bg_table);
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
               Danh sách <?=$module_name?>  
               <?php $form = new form();?>                      
               <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>       
            </header>        
            <div class="panel-body">
               <?print_error_msg($bg_errorMsg)?>
               <?=$form->form_open()?>            
               <?=$form->text(array('label'=>'Tên','name'=>'fee_fullname','id'=>'fee_fullname','value'=>getValue('fee_fullname','str','POST',$fee_fullname),'require'=>1, 'errorMsg'=>'Bạn chưa nhập Tên', 'placeholder'=> 'Tên không dài quá 255 ký tự','class'=>'col-sm-9'))?>
              
               <?=$form->showImagesGallery(array('label'=>'Ảnh khách hàng','title'=>'Ảnh khách hàng','name'=>'imu','id'=>'imu','value'=>getValue('fee_image','str','POST',$fee_image),'class'=>'col-sm-9'))?>
               <?=$form->textarea(array('label'=> 'nội dung', 'name'=> 'fee_content', 'id'=> 'fee_content','value'=>getValue('fee_content','str','POST',$fee_content),'errorMsg'=>'Bạn chưa nhập nội dung', 'style'=>'width:100%;height:100px', 'require'=> 0,'class'=>'col-sm-9'))?>
               <?=$form->textarea(array('label'=> 'nội dung tiếng anh', 'name'=> 'fee_content_en', 'id'=> 'fee_content_en','value'=>getValue('fee_content_en','str','POST',$fee_content_en), 'style'=>'width:100%;height:100px', 'require'=>0,'class'=>'col-sm-9'))?>
               <?=$form->textarea(array('label'=> 'nội dung tiếng hàn', 'name'=> 'fee_content_ko', 'id'=> 'fee_content_ko','value'=>getValue('fee_content_ko','str','POST',$fee_content_ko), 'style'=>'width:100%;height:100px', 'require'=>0,'class'=>'col-sm-9'))?>
               <?//=$form->tinyMCE('Nội dung', 'fee_detail', 'fee_detail', getValue('fee_detail','str','POST',$fee_detail), '100%')?>
               <?//=$form->tinyMCE('Nội dung tiếng anh', 'fee_detail_en', 'fee_detail_en', getValue('fee_detail_en','str','POST',$fee_detail_en), '100%')?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 'name'=> 'fee_active', 'id'=> 'fee_active', 'value'=>1 ,'currentValue'=>getValue('fee_active','int','POST',$fee_active), 'helptext'=> 'Xuất bản ra trang','class'=>'col-sm-9','extra'=>' onclick="return check_one(\'fee_active\');"'))?>
               <?//=$form->seoMeta($bg_table,$record_id)?>
               <?=$form->form_action_edit()?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>