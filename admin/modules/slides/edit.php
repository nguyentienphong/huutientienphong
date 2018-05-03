<?php
require 'inc_security.php';
$record_id = getValue('record_id');
$catBase = new Category;
$list_cat = array(''=>' - Chọn danh mục - ');
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="'.$cat_type.'"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}


$ser_date = time();
$myform = new generate_form();
$myform->add('sli_title','sli_title',0,0,'Tiêu đề - mô tả slide');
$myform->add('sli_title_en','sli_title_en',0,0,'Tiêu đề tiếng anh- mô tả slide');
$myform->add('sli_title_ko','sli_title_ko',0,0,'Tiêu đề tiếng hàn- mô tả slide');
$myform->add('sli_link','sli_link',0,0,'#');
$myform->add('sli_image','imu',0,0,'',1,"Bạn chưa chọn ảnh");
$myform->add('sli_image_en','imu_en',0,0,'',0,"Bạn chưa chọn ảnh tiếng anh");
$myform->add('sli_image_ko','imu_ko',0,0,'',0,"Bạn chưa chọn ảnh tiếng anh");
$myform->add('sli_cat_id','sli_cat_id',0,0,'',1,"Bạn chưa chọn danh mục");
$myform->add('sli_active','sli_active',1,0,0);
$myform->add('sli_position','sli_position',1,0,0);
$myform->removeHTML(0);
$myform->addTable($bg_table);

$action = getValue('action','str','POST','');
if($action == 'execute'){
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
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
               Danh sách <?=$module_name?>  
               <?php $form = new form();?>                      
               <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>       
            </header>        
            <div class="panel-body">
               <?print_error_msg($bg_errorMsg)?>
               <?=$form->form_open()?>           
               <?=$form->showImagesGallery(array('label'=>'Ảnh','title'=>'Ảnh','name'=>'imu','id'=>'imu','value'=>getValue('imu','str','POST',$sli_image),'class'=>'col-sm-9'))?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh tiếng anh',
                                                 'title'=>'Ảnh hiển thị trong phiên bản tiếng anh',
                                                 'name'=>'imu_en',
                                                 'id'=>'imu_en',
                                                 'class'=>'col-sm-9',
                                                 'value'=>getValue('imu_en','str','POST',$sli_image_en)))?>
                                                 
               <?=$form->showImagesGallery(array('label'=>'Ảnh tiếng hàn',
                                                 'title'=>'Ảnh hiển thị trong phiên bản tiếng hàn',
                                                 'name'=>'imu_ko',
                                                 'id'=>'imu_ko',
                                                 'class'=>'col-sm-9',
                                                 'value'=>getValue('imu_ko','str','POST',$sli_image_ko)))?>
               <?=$form->text(array('label'=>'Tiêu đề','name'=>'sli_title','id'=>'sli_title','value'=>getValue('sli_title','str','POST',$sli_title),'require'=>0, 'errorMsg'=>'Bạn chưa nhập tiêu đề', 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Tiêu đề tiếng anh','name'=>'sli_title_en','id'=>'sli_title_en','value'=>getValue('sli_title_en','str','POST',$sli_title_en),'require'=>0, 'errorMsg'=>'Bạn chưa nhập tiêu đề tiếng anh', 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Tiêu đề tiếng hàn','name'=>'sli_title_ko','id'=>'sli_title_ko','value'=>getValue('sli_title_ko','str','POST',$sli_title_ko),'require'=>0, 'errorMsg'=>'Bạn chưa nhập tiêu đề tiếng hàn', 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Link','name'=>'sli_link','id'=>'sli_link','value'=>getValue('sli_link','str','POST',$sli_link),'require'=>0, 'errorMsg'=>'Bạn chưa nhập Link', 'placeholder'=> 'Link không dài quá 255 ký tự','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Thứ tự','name'=>'sli_position','id'=>'sli_position','value'=>getValue('sli_position','str','POST',$sli_position),'require'=>0, 'errorMsg'=>'Bạn chưa nhập Thứ tự', 'placeholder'=> '','class'=>'col-sm-1'))?>
               <?=$form->select(array('label'=>'Danh mục','name'=>'sli_cat_id', 'id'=>'sli_cat_id','option'=>$list_cat, 'title'=>'Chọn danh mục','require'=>1,'errorMsg'=>'Bạn chưa chọn danh mục','selected'=>getValue('sli_cat_id','int','POST',$sli_cat_id),'class'=>'col-sm-9'))?>
               <?//=$form->checkbox(array('label'=> 'Nổi bật', 'name'=> 'sli_hot', 'id'=> 'sli_hot', 'value'=>1 ,'currentValue'=>getValue('sli_hot','int','POST',0), 'helptext'=> 'Tin tức được đánh dấu nổi bật'))?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 'name'=> 'sli_active', 'id'=> 'sli_active', 'value'=>1 ,'currentValue'=>getValue('sli_active','int','POST',$sli_active), 'helptext'=> 'Xuất bản ra trang','class'=>'col-sm-9','extra'=>' onclick="return check_one(\'sli_active\');"'))?> 
               
               <?=$form->form_action_edit()?>
               <?//=$form->form_preview(DOMAIN.'/'.$ser_alias.'.html')?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>