<?php
require 'inc_security.php';
//Kiem tra quyen addedit
checkPermission('add');
/*
$catBase = new Category;
$list_cat = array(''=>' - Chọn danh mục - ');
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="'.$bg_table.'"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}*/

$mng_date = time();
$myform = new generate_form();
$myform->add('mng_name','mng_name',0,0,'',1,'Bạn chưa nhập tên');
$myform->add('mng_alias','mng_alias',0,0,'',1,'Bạn chưa nhập đường dẫn');
$myform->add('mng_position','mng_position',0,0,'',0,'Bạn chưa nhập vị trí');
$myform->add('mng_position_en','mng_position_en',0,0,'',0,'Bạn chưa nhập vị trí tiếng anh');
$myform->add('mng_avatar','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->add('mng_description','mng_description',0,0,'',0,'Bạn chưa nhập giới thiệu ngắn');
$myform->add('mng_description_en','mng_description_en',0,0,'',0,'Bạn chưa nhập giới thiệu ngắn tiếng anh');
$myform->add('mng_detail','mng_detail',0,0,'',0,'Bạn chưa nhập chi tiết');
$myform->add('mng_detail_en','mng_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết tiếng anh');
$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   /*$mng_title = getValue('mng_title','str','POST','');
   $mng_alias = getValue('mng_alias','str','POST','');
   $mng_alias = get_alias($mng_alias,$mng_title,$bg_table,$id_field,$alias_field);
   $myform->add('mng_alias','mng_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');*/
      
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute_return();
        $last_id = $db_insert->db_execute($myform->generate_insert_SQL());
        //Add seo meta
        //addSeoMeta($last_id,$bg_table);
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
                <?=$form->text(array('label'=>'Tên',
                                    'name'=>'mng_name',
                                    'id'=>'mng_name',
                                    'value'=>getValue('mng_name','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập tên', 
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Đường dẫn',
                                      'name'=>'mng_alias',
                                      'id'=>'mng_alias',
                                      'require'=>1, 
                                      'placeholder'=> 'Nếu bạn không nhập, đường dẫn sẽ tự lấy theo tiêu đề',
                                      'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                      'class'=>'col-sm-9')
                )?>
                <script>
                    $("#mng_name").on("change",function(){
                        var title = $(this).val();
                        $.ajax({
                             type:'post',
                             url:'ajax.php',
                             data:{title:title,action:'alias'},
                             success:function(html){
                                 $('#mng_alias').val(html);
                             }
                         })
                    });
                 </script>
               <?=$form->text(array('label'=>'Vị trí',
                                    'name'=>'mng_position',
                                    'id'=>'mng_position',
                                    'value'=>getValue('mng_position','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập vị trí', 
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Vị trí tiếng anh',
                                    'name'=>'mng_position_en',
                                    'id'=>'mng_position_en',
                                    'value'=>getValue('mng_position_en','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập vị trí tiếng anh', 
                                    'class'=>'col-sm-9')
               )?>
               <?/*=$form->select(array('label'=>'Danh mục',
                                      'name'=>'mng_cat_id', 
                                      'id'=>'mng_cat_id',
                                      'option'=>$list_cat, 
                                      'title'=>'Chọn danh mục',
                                      'require'=>1,
                                      'errorMsg'=>'Bạn chưa chọn danh mục',
                                      'selected'=>getValue('mng_cat_id','int','POST',''),
                                      'class'=>'col-sm-9'
               ))*/?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9'))?>
               <?=$form->textarea(array('label'=> 'Giới thiệu ngắn', 
                                     'name'=> 'mng_description', 
                                     'id'=> 'mng_description',
                                     'value'=>getValue('mng_description','str','POST',''), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Giới thiệu ngắn tiếng anh', 
                                     'name'=> 'mng_description_en', 
                                     'id'=> 'mng_description_en',
                                     'value'=>getValue('mng_description_en','str','POST',''), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Chi tiết', 
                              'mng_detail', 
                              'mng_detail', 
                              getValue('mng_detail','str','POST',''), 
                              '100%'
               )?>
               <?=$form->tinyMCE('Chi tiết tiếng anh', 
                              'mng_detail_en', 
                              'mng_detail_en', 
                              getValue('mng_detail_en','str','POST',''), 
                              '100%'
               )?>
               <?=$form->form_action_add()?>
               <?=$form->form_close()?>
            </div> 
         </section>
      </div>
   </div>  
</div>
</body>
</html>