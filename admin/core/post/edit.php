<?php
require 'inc_security.php';
//Kiem tra quyen addedit
checkPermission('edit');
$record_id = getValue('record_id');
$catBase = new Category;
$list_cat = array(''=>' - Chọn danh mục - ');
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="'.$bg_table.'"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}


$myform = new generate_form();
$myform->add('pos_title','pos_title',0,0,'',1,'Bạn chưa nhập tiêu đề');
$myform->add('pos_title_en','pos_title_en',0,0,'',0,'Bạn chưa nhập tiêu đề tiếng anh');
//$myform->add('pos_cat_id','pos_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('pos_active','pos_active',1,0,0);
$myform->add('pos_hot','pos_hot',1,0,0);
$myform->add('pos_tags','pos_tags',0,0,'');
$myform->add('pos_summary','pos_summary',0,0,'');
$myform->add('pos_summary_en','pos_summary_en',0,0,'');
$myform->add('pos_detail','pos_detail',0,0,'',1,'Bạn chưa nhập chi tiết');
$myform->add('pos_detail_en','pos_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết tiếng anh');
$myform->add('pos_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->add('pos_image_cover','imu_cover',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->removeHTML(0);
$myform->addTable($bg_table);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   $pos_title = getValue('pos_title','str','POST','');
   $pos_alias = getValue('pos_alias','str','POST','');
   $pos_alias = get_alias($pos_alias,$pos_title,$bg_table,$id_field,$alias_field,$record_id);
   $myform->add('pos_alias','pos_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');
   
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
               <?=$form->text(array('label'=>'Tiêu đề tin',
                                 'name'=>'pos_title',
                                 'id'=>'pos_title',
                                 'value'=>getValue('pos_title','str','POST',$pos_title),
                                 'require'=>1, 'errorMsg'=>'Bạn chưa nhập tiêu đề tin', 
                                 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tiêu đề tin tiếng anh',
                                 'name'=>'pos_title_en',
                                 'id'=>'pos_title_en',
                                 'value'=>getValue('pos_title_en','str','POST',$pos_title_en),
                                 'require'=>0, 'errorMsg'=>'Bạn chưa nhập tiêu đề tin', 
                                 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Đường dẫn',
                                   'name'=>'pos_alias',
                                   'id'=>'pos_alias',
                                   'require'=>1,                                    
                                   'value'=>getValue('pos_alias','str','POST',$pos_alias),
                                   'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                   'class'=>'col-sm-9')
               )?>
               <script>
                    $("#pos_title").on("change",function(){
                        var title = $(this).val();
                        $.ajax({
                             type:'post',
                             url:'ajax.php',
                             data:{title:title,action:'alias'},
                             success:function(html){
                                 $('#pos_alias').val(html);
                             }
                         })
                    });
                 </script>
               <?=$form->checkbox(array('label'=> 'Nổi bật',
                                         'name'=> 'pos_hot', 
                                         'id'=> 'pos_hot', 
                                         'value'=>1 ,
                                         'currentValue'=>getValue('pos_hot','int','POST',$pos_hot), 
                                         'helptext'=> 'Tin tức được đánh dấu nổi bật',
                                         'class'=>'col-sm-9',
                                         'extra'=>' onclick="return check_one(\'pos_active\');"'))?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9',
                                                 'value'=>getValue('pos_image','str','POST',$pos_image)))?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh bìa',
                                                 'title'=>'Ảnh bìa',
                                                 'name'=>'imu_cover',
                                                 'id'=>'imu_cover',
                                                 'class'=>'col-sm-9',
                                                 'value'=>getValue('pos_image','str','POST',$pos_image_cover)))?>
               <?/*=$form->select(array('label'=>'Danh mục',
                                   'name'=>'pos_cat_id', 
                                   'id'=>'pos_cat_id',
                                   'option'=>$list_cat, 
                                   'title'=>'Chọn danh mục',
                                   'require'=>1,
                                   'errorMsg'=>'Bạn chưa chọn danh mục',
                                   'selected'=>getValue('pos_cat_id','int','POST',$pos_cat_id),
                                   'class'=>'col-sm-9')
               )*/?>
               
               <?=$form->text(array('label'=>'Tags bài viết',
                                 'name'=>'pos_tags',
                                 'id'=>'pos_tags',
                                 'value'=>getValue('pos_tags','str','POST',$pos_tags),
                                 'placeholder'=>'Các từ khóa liên quan, hỗ trợ SEO web, cách nhau bởi dấu phẩy',
                                 'class'=>'col-sm-9')
               )?>
               
               
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                     'name'=> 'pos_summary', 
                                     'id'=> 'pos_summary',
                                     'value'=>getValue('pos_summary','str','POST',$pos_summary), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng anh', 
                                     'name'=> 'pos_summary_en', 
                                     'id'=> 'pos_summary_en',
                                     'value'=>getValue('pos_summary_en','str','POST',$pos_summary_en), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                              'pos_detail', 
                              'pos_detail', 
                              getValue('pos_detail','str','POST',$pos_detail), 
                              '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng anh', 
                              'pos_detail_en', 
                              'pos_detail_en', 
                              getValue('pos_detail_en','str','POST',$pos_detail_en), 
                              '100%'
               )?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                     'name'=> 'pos_active', 
                                     'id'=> 'pos_active', 
                                     'value'=>1 ,
                                     'currentValue'=>getValue('pos_active','int','POST',$pos_active), 
                                     'helptext'=> 'Xuất bản - hiển thị ra website',
                                     'class'=>'col-sm-9',
                                     'extra'=>' onclick="return check_one(\'pos_active\');"')
               )?>
               <?=$form->seoMeta($bg_table,$record_id)?>
               <?=$form->form_action_edit()?>
               <?=$form->form_preview(DOMAIN.'/tin-tuc/'.$pos_alias.'.html')?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>