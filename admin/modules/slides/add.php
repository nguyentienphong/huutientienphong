<?php
require 'inc_security.php';
$catBase = new Category;
$list_cat = array(''=>' - Chọn danh mục - ');
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="'.$cat_type.'"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}

$sli_date = time();
$myform = new generate_form();
$myform->add('sli_title','sli_title',0,0,'Tiêu đề - mô tả slide');
$myform->add('sli_link','sli_link',0,0,'#');
$myform->add('sli_image','imu',0,0,'',1,"Bạn chưa chọn ảnh");
$myform->add('sli_image_en','imu_en',0,0,'',0,"Bạn chưa chọn ảnh tiếng anh");
$myform->add('sli_cat_id','sli_cat_id',0,0,'',1,"Bạn chưa chọn danh mục");
$myform->add('sli_active','sli_active',1,0,0);
$myform->add('sli_position','sli_position',1,0,0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
      $myform->addTable($bg_table);
      $myform->removeHTML(0);
        $db_insert = new db_execute_return();
        $last_id = $db_insert->db_execute($myform->generate_insert_SQL());
        //Add seo meta
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
               <?=$form->showImagesGallery(array('label'=>'Ảnh','title'=>'Ảnh','name'=>'imu','id'=>'imu','class'=>'col-sm-9'))?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh Tiếng anh',
                                                 'title'=>'Ảnh Xuất hiện trong bản tiếng anh',
                                                 'name'=>'imu_en',
                                                 'id'=>'imu_en',
                                                 'class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Tiêu đề','name'=>'sli_title','id'=>'sli_title','value'=>getValue('sli_title','str','POST',''),'require'=>0, 'errorMsg'=>'Bạn chưa nhập tiêu đề', 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Link','name'=>'sli_link','id'=>'sli_link','value'=>getValue('sli_link','str','POST',''),'require'=>0, 'errorMsg'=>'Bạn chưa nhập Link', 'placeholder'=> 'Link không dài quá 255 ký tự','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Thứ tự','name'=>'sli_position','id'=>'sli_position','value'=>getValue('sli_position','str','POST',0),'require'=>0, 'errorMsg'=>'Bạn chưa nhập Thứ tự', 'placeholder'=> '','class'=>'col-sm-1'))?>
               <?=$form->select(array('label'=>'Danh mục','name'=>'sli_cat_id', 'id'=>'sli_cat_id','option'=>$list_cat, 'title'=>'Chọn danh mục','require'=>1,'errorMsg'=>'Bạn chưa chọn danh mục','selected'=>getValue('sli_cat_id','int','POST',''),'class'=>'col-sm-9'))?>
               <?//=$form->checkbox(array('label'=> 'Nổi bật', 'name'=> 'sli_hot', 'id'=> 'sli_hot', 'value'=>1 ,'currentValue'=>getValue('sli_hot','int','POST',0), 'helptext'=> 'Tin tức được đánh dấu nổi bật'))?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 'name'=> 'sli_active', 'id'=> 'sli_active', 'value'=>1 ,'currentValue'=>getValue('sli_active','int','POST',1), 'helptext'=> 'Xuất bản ra trang','class'=>'col-sm-9','extra'=>' onclick="return check_one(\'sli_active\');"'))?>
               
               <?=$form->form_action_add()?>
            	<?=$form->form_close()?>
            </div> 
         </section>
      </div>
   </div>   
</div>
<script src="/admin/AdminX_files/jquery.nicescroll.js"></script>
</body>
</html>