<?php
require 'inc_security.php';
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
//$myform->add('fee_detail','fee_detail',0,0,'',0,'Bạn chưa nhập chi tiết');
//$myform->add('fee_detail_en','fee_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết tiếng anh');
//$myform->add('fee_detail_ko','fee_detail_ko',0,0,'',0,'Bạn chưa nhập chi tiết tiếng hàn');
$myform->add('fee_image','imu',0,0,'',0,'Bạn chưa chọn ảnh khách hàng');
$action = getValue('action','str','POST','');
if($action == 'execute'){
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
      $myform->addTable($bg_table);
      $myform->removeHTML(0);
        $db_insert = new db_execute_return();
        $last_id = $db_insert->db_execute($myform->generate_insert_SQL());
        //Add seo meta
        //addSeoMeta($last_id,$bg_table);
        log_add($last_id,$bg_table);
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
                <?=$form->text(array('label'=>'Tên','name'=>'fee_fullname','id'=>'fee_fullname','value'=>getValue('fee_fullname','str','POST',''),'require'=>1, 'errorMsg'=>'Bạn chưa nhập tên', 'placeholder'=> 'Tên không dài quá 255 ký tự','class'=>'col-sm-9'))?>
                
                
                <?/*=$form->text(array('label'=>'Đường dẫn',
                                      'name'=>'fee_alias',
                                      'id'=>'fee_alias',
                                      'require'=>1, 
                                      'placeholder'=> 'Nếu bạn không nhập, đường dẫn sẽ tự lấy theo tiêu đề',
                                      'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                      'class'=>'col-sm-9')
                )*/?>
               <?//=$form->select(array('label'=>'Danh mục','name'=>'fee_cat_id', 'id'=>'fee_cat_id','option'=>$list_cat, 'title'=>'Chọn danh mục','require'=>1,'errorMsg'=>'Bạn chưa chọn danh mục','selected'=>getValue('fee_cat_id','int','POST',''),'class'=>'col-sm-9'))?>
               <?//=$form->checkbox(array('label'=> 'Nổi bật', 'name'=> 'fee_hot', 'id'=> 'fee_hot', 'value'=>1 ,'currentValue'=>getValue('fee_hot','int','POST',0), 'helptext'=> 'Tin tức được đánh dấu nổi bật'))?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện','title'=>'Ảnh đại diện','name'=>'imu','id'=>'imu','class'=>'col-sm-9'))?>
               <?=$form->textarea(array('label'=> 'nội dung', 'name'=> 'fee_content', 'id'=> 'fee_content','value'=>getValue('fee_content','str','POST',''),'errorMsg'=>'Bạn chưa nhập nội dung', 'style'=>'width:100%;height:100px', 'require'=> 0,'class'=>'col-sm-9'))?>
               <?=$form->textarea(array('label'=> 'nội dung tiếng anh', 'name'=> 'fee_content_en', 'id'=> 'fee_content_en','value'=>getValue('fee_content_en','str','POST',''),'errorMsg'=>'Bạn chưa nhập nội dung tiếng anh', 'style'=>'width:100%;height:100px', 'require'=> 0,'class'=>'col-sm-9'))?>
               <?=$form->textarea(array('label'=> 'nội dung tiếng hàn', 'name'=> 'fee_content_ko', 'id'=> 'fee_content_ko','value'=>getValue('fee_content_ko','str','POST',''),'errorMsg'=>'Bạn chưa nhập nội dung tiếng hàn', 'style'=>'width:100%;height:100px', 'require'=> 0,'class'=>'col-sm-9'))?>
               <?//=$form->tinyMCE('Nội dung', 'fee_detail', 'fee_detail', getValue('fee_detail','str','POST',''), '100%')?>
               <?//=$form->tinyMCE('Nội dung tiếng anh', 'fee_detail_en', 'fee_detail_en', getValue('fee_detail_en','str','POST',''), '100%')?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 'name'=> 'fee_active', 'id'=> 'fee_active', 'value'=>1 ,'currentValue'=>getValue('fee_active','int','POST',1), 'helptext'=> 'Xuất bản ra trang','class'=>'col-sm-9','extra'=>' onclick="return check_one(\'fee_active\');"'))?>
               <?//=$form->seoMeta($bg_table)?>
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