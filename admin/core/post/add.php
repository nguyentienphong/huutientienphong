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

$pos_date = time();
$myform = new generate_form();
$myform->add('pos_title','pos_title',0,0,'',1,'Bạn chưa nhập tiêu đề tin');
$myform->add('pos_title_en','pos_title_en',0,0,'',0,'Bạn chưa nhập tiêu đề tin bằng tiếng anh');
$myform->add('pos_title_ko','pos_title_ko',0,0,'',0,'Bạn chưa nhập tiêu đề tin bằng tiếng hàn');
//$myform->add('pos_cat_id','pos_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('pos_date','pos_date',1,1,0);
$myform->add('pos_active','pos_active',1,0,0);
$myform->add('pos_hot','pos_hot',1,0,0);
$myform->add('pos_tags','pos_tags',0,0,'');
$myform->add('pos_summary','pos_summary',0,0,'');
$myform->add('pos_summary_en','pos_summary_en',0,0,'');
$myform->add('pos_summary_ko','pos_summary_ko',0,0,'');
$myform->add('pos_detail','pos_detail',0,0,'',1,'Bạn chưa nhập chi tiết tin');
$myform->add('pos_detail_en','pos_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết tin tiếng anh');
$myform->add('pos_detail_ko','pos_detail_ko',0,0,'',0,'Bạn chưa nhập chi tiết tin tiếng hàn');
$myform->add('pos_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
//$myform->add('pos_image_cover','imu_cover',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   $pos_title = getValue('pos_title','str','POST','');
   $pos_alias = getValue('pos_alias','str','POST','');
   $pos_alias = get_alias($pos_alias,$pos_title,$bg_table,$id_field,$alias_field);
   $myform->add('pos_alias','pos_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');
      
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
                                    'name'=>'pos_title',
                                    'id'=>'pos_title',
                                    'value'=>getValue('pos_title','str','POST',''),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tiêu đề tin', 
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tiêu đề tin tiếng anh',
                                    'name'=>'pos_title_en',
                                    'id'=>'pos_title_en',
                                    'value'=>getValue('pos_title_en','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập tiêu đề tin tiếng anh', 
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tiêu đề tin tiếng hàn',
                                    'name'=>'pos_title_ko',
                                    'id'=>'pos_title_ko',
                                    'value'=>getValue('pos_title_ko','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập tiêu đề tin tiếng hàn', 
                                    'class'=>'col-sm-9')
               )?>
                <?=$form->text(array('label'=>'Đường dẫn',
                                      'name'=>'pos_alias',
                                      'id'=>'pos_alias',
                                      'require'=>1, 
                                      'placeholder'=> 'Nếu bạn không nhập, đường dẫn sẽ tự lấy theo tiêu đề',
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
                                    'currentValue'=>getValue('pos_hot','int','POST',0), 
                                    'class'=>'col-sm-9',
                                    'extra'=>' onclick="return check_one(\'pos_hot\');"',
                                    'helptext'=> 'Bài viết đánh dấu nổi bật sẽ được ưu tiên hiển thị')
                )?>
               <?/*=$form->select(array('label'=>'Danh mục',
                                      'name'=>'pos_cat_id', 
                                      'id'=>'pos_cat_id',
                                      'option'=>$list_cat, 
                                      'title'=>'Chọn danh mục',
                                      'require'=>1,
                                      'errorMsg'=>'Bạn chưa chọn danh mục',
                                      'selected'=>getValue('pos_cat_id','int','POST',''),
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
               
               
               <?//=$form->getFile(array('label'=>'Ảnh đại diện','title'=>'Ảnh đại diện','name'=>'pos_picture','id'=>'pos_picture'))?>
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                        'name'=> 'pos_summary', 
                                        'id'=> 'pos_summary',
                                        'value'=>getValue('pos_summary','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng anh', 
                                        'name'=> 'pos_summary_en', 
                                        'id'=> 'pos_summary_en',
                                        'value'=>getValue('pos_summary_en','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng hàn', 
                                        'name'=> 'pos_summary_ko', 
                                        'id'=> 'pos_summary_ko',
                                        'value'=>getValue('pos_summary_ko','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                                 'pos_detail', 
                                 'pos_detail', 
                                 getValue('pos_detail','str','POST',''), 
                                 '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng anh', 
                                 'pos_detail_en', 
                                 'pos_detail_en', 
                                 getValue('pos_detail_en','str','POST',''), 
                                 '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng hàn', 
                                 'pos_detail_ko', 
                                 'pos_detail_ko', 
                                 getValue('pos_detail_ko','str','POST',''), 
                                 '100%'
               )?>
               <?=$form->text(array('label'=>'Tags bài viết',
                                    'name'=>'pos_tags',
                                    'id'=>'pos_tags',
                                    'value'=>getValue('pos_tags','str','POST',''),
                                    'errorMsg'=>'Bạn chưa nhập Tags bài viết', 
                                    'placeholder'=>'Các từ khóa liên quan đến bài này, cách nhau bởi dấu phẩy',
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                        'name'=> 'pos_active', 
                                        'id'=> 'pos_active', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('pos_active','int','POST',1), 
                                        'helptext'=> 'Xuất bản - hiển thị ra website',
                                        'class'=>'col-sm-9',
                                        'extra'=>' onclick="return check_one(\'pos_active\');"')
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
