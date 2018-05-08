<?php
require 'inc_security.php';
//Kiem tra quyen addedit
checkPermission('add');
$catBase = new Category;
$list_cat = array(''=>' - Chọn danh mục - ');
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="'.$bg_table.'"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}

$met_date = time();
$myform = new generate_form();
$myform->add('met_title','met_title',0,0,'',1,'Bạn chưa nhập tiêu đề tin');
$myform->add('met_title_en','met_title_en',0,0,'',0,'Bạn chưa nhập tiêu đề tin bằng tiếng anh');
$myform->add('met_title_ko','met_title_ko',0,0,'',0,'Bạn chưa nhập tiêu đề tin bằng tiếng hàn');
//$myform->add('met_cat_id','met_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('met_date','met_date',1,1,0);
$myform->add('met_active','met_active',1,0,0);
$myform->add('met_hot','met_hot',1,0,0);
$myform->add('met_tags','met_tags',0,0,'');
$myform->add('met_summary','met_summary',0,0,'');
$myform->add('met_summary_en','met_summary_en',0,0,'');
$myform->add('met_summary_ko','met_summary_ko',0,0,'');
$myform->add('met_detail','met_detail',0,0,'',1,'Bạn chưa nhập chi tiết tin');
$myform->add('met_detail_en','met_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết tin tiếng anh');
$myform->add('met_detail_ko','met_detail_ko',0,0,'',0,'Bạn chưa nhập chi tiết tin tiếng hàn');
$myform->add('met_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
//$myform->add('met_image_cover','imu_cover',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   $met_title = getValue('met_title','str','POST','');
   $met_alias = getValue('met_alias','str','POST','');
   $met_alias = get_alias($met_alias,$met_title,$bg_table,$id_field,$alias_field);
   $myform->add('met_alias','met_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');
      
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute_return();
        $last_id = $db_insert->db_execute($myform->generate_insert_SQL());
        //Add seo meta
        addSeoMeta($last_id,$bg_table);
        //ghi lai log nguoi add
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
               <?=$form->text(array('label'=>'Tiêu đề tin',
                                    'name'=>'met_title',
                                    'id'=>'met_title',
                                    'value'=>getValue('met_title','str','POST',''),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tiêu đề tin', 
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tiêu đề tin tiếng anh',
                                    'name'=>'met_title_en',
                                    'id'=>'met_title_en',
                                    'value'=>getValue('met_title_en','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập tiêu đề tin tiếng anh', 
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tiêu đề tin tiếng hàn',
                                    'name'=>'met_title_ko',
                                    'id'=>'met_title_ko',
                                    'value'=>getValue('met_title_ko','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập tiêu đề tin tiếng hàn', 
                                    'class'=>'col-sm-9')
               )?>
                <?=$form->text(array('label'=>'Đường dẫn',
                                      'name'=>'met_alias',
                                      'id'=>'met_alias',
                                      'require'=>1, 
                                      'placeholder'=> 'Nếu bạn không nhập, đường dẫn sẽ tự lấy theo tiêu đề',
                                      'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                      'class'=>'col-sm-9')
                )?>
                <script>
                    $("#met_title").on("change",function(){
                        var title = $(this).val();
                        $.ajax({
                             type:'post',
                             url:'ajax.php',
                             data:{title:title,action:'alias'},
                             success:function(html){
                                 $('#met_alias').val(html);
                             }
                         })
                    });
                 </script>
                <?=$form->checkbox(array('label'=> 'Nổi bật', 
                                    'name'=> 'met_hot', 
                                    'id'=> 'met_hot', 
                                    'value'=>1 ,
                                    'currentValue'=>getValue('met_hot','int','POST',0), 
                                    'class'=>'col-sm-9',
                                    'extra'=>' onclick="return check_one(\'met_hot\');"',
                                    'helptext'=> 'Bài viết đánh dấu nổi bật sẽ được ưu tiên hiển thị')
                )?>
               <?/*=$form->select(array('label'=>'Danh mục',
                                      'name'=>'met_cat_id', 
                                      'id'=>'met_cat_id',
                                      'option'=>$list_cat, 
                                      'title'=>'Chọn danh mục',
                                      'require'=>1,
                                      'errorMsg'=>'Bạn chưa chọn danh mục',
                                      'selected'=>getValue('met_cat_id','int','POST',''),
                                      'class'=>'col-sm-9'
               ))*/?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9'))?>
               <?/*=$form->showImagesGallery(array('label'=>'Ảnh bìa',
                                                 'title'=>'Ảnh bìa(xuất hiện trong trang chi tiết tin)',
                                                 'name'=>'imu_cover',
                                                 'id'=>'imu_cover',
                                                 'class'=>'col-sm-9'))*/?>
               
               
               <?//=$form->getFile(array('label'=>'Ảnh đại diện','title'=>'Ảnh đại diện','name'=>'met_picture','id'=>'met_picture'))?>
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                        'name'=> 'met_summary', 
                                        'id'=> 'met_summary',
                                        'value'=>getValue('met_summary','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng anh', 
                                        'name'=> 'met_summary_en', 
                                        'id'=> 'met_summary_en',
                                        'value'=>getValue('met_summary_en','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng hàn', 
                                        'name'=> 'met_summary_ko', 
                                        'id'=> 'met_summary_ko',
                                        'value'=>getValue('met_summary_ko','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                                 'met_detail', 
                                 'met_detail', 
                                 getValue('met_detail','str','POST',''), 
                                 '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng anh', 
                                 'met_detail_en', 
                                 'met_detail_en', 
                                 getValue('met_detail_en','str','POST',''), 
                                 '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng hàn', 
                                 'met_detail_ko', 
                                 'met_detail_ko', 
                                 getValue('met_detail_ko','str','POST',''), 
                                 '100%'
               )?>
               <?=$form->text(array('label'=>'Tags bài viết',
                                    'name'=>'met_tags',
                                    'id'=>'met_tags',
                                    'value'=>getValue('met_tags','str','POST',''),
                                    'errorMsg'=>'Bạn chưa nhập Tags bài viết', 
                                    'placeholder'=>'Các từ khóa liên quan đến bài này, cách nhau bởi dấu phẩy',
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                        'name'=> 'met_active', 
                                        'id'=> 'met_active', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('met_active','int','POST',1), 
                                        'helptext'=> 'Xuất bản - hiển thị ra website',
                                        'class'=>'col-sm-9',
                                        'extra'=>' onclick="return check_one(\'met_active\');"')
               )?>
               <?=$form->seoMeta($bg_table)?>
               <?=$form->form_action_add()?>
               <?=$form->form_close()?>
            </div> 
         </section>
      </div>
   </div>  
</div>
</body>
</html>
