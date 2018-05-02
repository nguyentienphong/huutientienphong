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
$myform->add('cul_title','cul_title',0,0,'',1,'Bạn chưa nhập tiêu đề');
$myform->add('cul_title_en','cul_title_en',0,0,'',0,'Bạn chưa nhập tên lĩnh vực hoạt động bằng tiếng anh');
//$myform->add('cul_cat_id','cul_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('cul_active','cul_active',1,0,0);
//$myform->add('cul_hot','cul_hot',1,0,0);
//$myform->add('cul_tags','cul_tags',0,0,'');
$myform->add('cul_summary','cul_summary',0,0,'');
$myform->add('cul_summary_en','cul_summary_en',0,0,'');
$myform->add('cul_detail','cul_detail',0,0,'',0,'Bạn chưa nhập chi tiết');
$myform->add('cul_detail_en','cul_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết tiếng anh');
$myform->add('cul_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->add('cul_image_en','imu_en',0,0,'',0,"Bạn chưa chọn ảnh tiếng anh");
$myform->removeHTML(0);
$myform->addTable($bg_table);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   $cul_title = getValue('cul_title','str','POST','');
   $cul_alias = getValue('cul_alias','str','POST','');
   $cul_alias = get_alias($cul_alias,$cul_title,$bg_table,$id_field,$alias_field,$record_id);
   $myform->add('cul_alias','cul_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');
   
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
        //edit lai meta seo
        editSeoMeta($record_id,$bg_table);
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
               <?=$form->text(array('label'=>'Tên',
                                 'name'=>'cul_title',
                                 'id'=>'cul_title',
                                 'value'=>getValue('cul_title','str','POST',$cul_title),
                                 'require'=>1, 'errorMsg'=>'Bạn chưa nhập tên tiếng anh', 
                                 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự',
                                 'helptext'=>'Tên được chia làm 2 phần bằng dấu | ,ví dụ : Đối với | xã hội',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tên tiếng anh',
                                 'name'=>'cul_title_en',
                                 'id'=>'cul_title_en',
                                 'value'=>getValue('cul_title_en','str','POST',$cul_title_en),
                                 'require'=>0, 'errorMsg'=>'Bạn chưa nhập tên tiếng anh', 
                                 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Đường dẫn',
                                   'name'=>'cul_alias',
                                   'id'=>'cul_alias',
                                   'require'=>1,                                    
                                   'value'=>getValue('cul_alias','str','POST',$cul_alias),
                                   'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                   'class'=>'col-sm-9')
               )?>
               <script>
                    $("#cul_title").on("change",function(){
                        var title = $(this).val();
                        $.ajax({
                             type:'post',
                             url:'ajax.php',
                             data:{title:title,action:'alias'},
                             success:function(html){
                                 $('#cul_alias').val(html);
                             }
                         })
                    });
                 </script>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9',
                                                 'value'=>getValue('cul_image','str','POST',$cul_image)))?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh tiếng anh',
                                                 'title'=>'Ảnh hiển thị trong phiên bản tiếng anh',
                                                 'name'=>'imu_en',
                                                 'id'=>'imu_en',
                                                 'class'=>'col-sm-9',
                                                 'value'=>getValue('sli_image','str','POST',$cul_image_en)))?>
               <?/*=$form->select(array('label'=>'Danh mục',
                                   'name'=>'cul_cat_id', 
                                   'id'=>'cul_cat_id',
                                   'option'=>$list_cat, 
                                   'title'=>'Chọn danh mục',
                                   'require'=>1,
                                   'errorMsg'=>'Bạn chưa chọn danh mục',
                                   'selected'=>getValue('cul_cat_id','int','POST',$cul_cat_id),
                                   'class'=>'col-sm-9')
               )*/?>
               <?/*=$form->text(array('label'=>'Tags bài viết',
                                 'name'=>'cul_tags',
                                 'id'=>'cul_tags',
                                 'value'=>getValue('cul_tags','str','POST',$cul_tags),
                                 'placeholder'=>'Các từ khóa liên quan, hỗ trợ SEO web, cách nhau bởi dấu phẩy',
                                 'class'=>'col-sm-9')
               )*/?>
               <?//=$form->checkbox(array('label'=> 'Nổi bật', 'name'=> 'cul_hot', 'id'=> 'cul_hot', 'value'=>1 ,'currentValue'=>getValue('cul_hot','int','POST',$cul_hot), 'helptext'=> 'Tin tức được đánh dấu nổi bật'))?>
               
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                     'name'=> 'cul_summary', 
                                     'id'=> 'cul_summary',
                                     'value'=>getValue('cul_summary','str','POST',$cul_summary), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng anh', 
                                     'name'=> 'cul_summary_en', 
                                     'id'=> 'cul_summary_en',
                                     'value'=>getValue('cul_summary_en','str','POST',$cul_summary_en), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                              'cul_detail', 
                              'cul_detail', 
                              getValue('cul_detail','str','POST',$cul_detail), 
                              '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng anh', 
                              'cul_detail_en', 
                              'cul_detail_en', 
                              getValue('cul_detail','str','POST',$cul_detail_en), 
                              '100%'
               )?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                     'name'=> 'cul_active', 
                                     'id'=> 'cul_active', 
                                     'value'=>1 ,
                                     'currentValue'=>getValue('cul_active','int','POST',$cul_active), 
                                     'helptext'=> 'Xuất bản - hiển thị ra website',
                                     'class'=>'col-sm-9',
                                     'extra'=>' onclick="return check_one(\'cul_active\');"')
               )?>
               <?=$form->seoMeta($bg_table,$record_id)?>
               <?=$form->form_action_edit()?>
               <?//=$form->form_preview(DOMAIN.'/linh-vuc-hoat-dong/'.$cul_alias.'.html')?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>