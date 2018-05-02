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
$myform->add('mis_title','mis_title',0,0,'',1,'Bạn chưa nhập tiêu đề');
$myform->add('mis_title_en','mis_title_en',0,0,'',0,'Bạn chưa nhập tên lĩnh vực hoạt động bằng tiếng anh');
//$myform->add('mis_cat_id','mis_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('mis_active','mis_active',1,0,0);
//$myform->add('mis_hot','mis_hot',1,0,0);
//$myform->add('mis_tags','mis_tags',0,0,'');
$myform->add('mis_summary','mis_summary',0,0,'');
$myform->add('mis_summary_en','mis_summary_en',0,0,'');
//$myform->add('mis_detail','mis_detail',0,0,'',0,'Bạn chưa nhập chi tiết');
//$myform->add('mis_detail_en','mis_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết tiếng anh');
$myform->add('mis_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->removeHTML(0);
$myform->addTable($bg_table);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   $mis_title = getValue('mis_title','str','POST','');
   $mis_alias = getValue('mis_alias','str','POST','');
   $mis_alias = get_alias($mis_alias,$mis_title,$bg_table,$id_field,$alias_field,$record_id);
   $myform->add('mis_alias','mis_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');
   
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
                                 'name'=>'mis_title',
                                 'id'=>'mis_title',
                                 'value'=>getValue('mis_title','str','POST',$mis_title),
                                 'require'=>1, 'errorMsg'=>'Bạn chưa nhập tên tiếng anh', 
                                 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự',
                                 'helptext'=>'Tên được chia làm 2 phần bằng dấu | ,ví dụ : Đối với | xã hội',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tên tiếng anh',
                                 'name'=>'mis_title_en',
                                 'id'=>'mis_title_en',
                                 'value'=>getValue('mis_title_en','str','POST',$mis_title_en),
                                 'require'=>0, 'errorMsg'=>'Bạn chưa nhập tên tiếng anh', 
                                 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Đường dẫn',
                                   'name'=>'mis_alias',
                                   'id'=>'mis_alias',
                                   'require'=>1,                                    
                                   'value'=>getValue('mis_alias','str','POST',$mis_alias),
                                   'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                   'class'=>'col-sm-9')
               )?>
               <script>
                    $("#mis_title").on("change",function(){
                        var title = $(this).val();
                        $.ajax({
                             type:'post',
                             url:'ajax.php',
                             data:{title:title,action:'alias'},
                             success:function(html){
                                 $('#mis_alias').val(html);
                             }
                         })
                    });
                 </script>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9',
                                                 'value'=>getValue('mis_image','str','POST',$mis_image)))?>
               <?/*=$form->select(array('label'=>'Danh mục',
                                   'name'=>'mis_cat_id', 
                                   'id'=>'mis_cat_id',
                                   'option'=>$list_cat, 
                                   'title'=>'Chọn danh mục',
                                   'require'=>1,
                                   'errorMsg'=>'Bạn chưa chọn danh mục',
                                   'selected'=>getValue('mis_cat_id','int','POST',$mis_cat_id),
                                   'class'=>'col-sm-9')
               )*/?>
               <?/*=$form->text(array('label'=>'Tags bài viết',
                                 'name'=>'mis_tags',
                                 'id'=>'mis_tags',
                                 'value'=>getValue('mis_tags','str','POST',$mis_tags),
                                 'placeholder'=>'Các từ khóa liên quan, hỗ trợ SEO web, cách nhau bởi dấu phẩy',
                                 'class'=>'col-sm-9')
               )*/?>
               <?//=$form->checkbox(array('label'=> 'Nổi bật', 'name'=> 'mis_hot', 'id'=> 'mis_hot', 'value'=>1 ,'currentValue'=>getValue('mis_hot','int','POST',$mis_hot), 'helptext'=> 'Tin tức được đánh dấu nổi bật'))?>
               
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                     'name'=> 'mis_summary', 
                                     'id'=> 'mis_summary',
                                     'value'=>getValue('mis_summary','str','POST',$mis_summary), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng anh', 
                                     'name'=> 'mis_summary_en', 
                                     'id'=> 'mis_summary_en',
                                     'value'=>getValue('mis_summary_en','str','POST',$mis_summary_en), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?/*=$form->tinyMCE('Nội dung', 
                              'mis_detail', 
                              'mis_detail', 
                              getValue('mis_detail','str','POST',$mis_detail), 
                              '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng anh', 
                              'mis_detail_en', 
                              'mis_detail_en', 
                              getValue('mis_detail','str','POST',$mis_detail_en), 
                              '100%'
               )*/?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                     'name'=> 'mis_active', 
                                     'id'=> 'mis_active', 
                                     'value'=>1 ,
                                     'currentValue'=>getValue('mis_active','int','POST',$mis_active), 
                                     'helptext'=> 'Xuất bản - hiển thị ra website',
                                     'class'=>'col-sm-9',
                                     'extra'=>' onclick="return check_one(\'mis_active\');"')
               )?>
               <?=$form->seoMeta($bg_table,$record_id)?>
               <?=$form->form_action_edit()?>
               <?//=$form->form_preview(DOMAIN.'/linh-vuc-hoat-dong/'.$mis_alias.'.html')?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>