<?php
require 'inc_security.php';
checkPermission('add');
$pag_date = time();
$myform = new generate_form();
$myform->add('pag_title','pag_title',0,0,'',1,'Bạn chưa nhập tiêu đề trang');
$myform->add('pag_active','pag_active',1,0,0);
$myform->add('pag_date','pag_date',1,1,0);
$myform->add('pag_summary','pag_summary',0,0,'');
$myform->add('pag_detail','pag_detail',0,0,'',1,'Bạn chưa nhập chi tiết trang');
$myform->add('pag_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   $pag_title = getValue('pag_title','str','POST','');
   $pag_alias = getValue('pag_alias','str','POST','');
   $pag_alias = get_alias($pag_alias,$pag_title,$bg_table,$id_field,$alias_field);
   $myform->add('pag_alias','pag_alias',0,1,'');
   
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
               <?php print_error_msg($bg_errorMsg)?></div>
               <?=$form->form_open()?>
               <?=$form->text(array('label'=>'Tiêu đề bài viết',
                                    'name'=>'pag_title',
                                    'id'=>'pag_title',
                                    'value'=>getValue('pag_title','str','POST',''),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tiêu đề bài', 
                                    'class'=>'col-sm-9')
               )?>
                <?=$form->text(array('label'=>'Đường dẫn',
                                      'name'=>'pag_alias',
                                      'id'=>'pag_alias',
                                      'placeholder'=> 'Nếu bạn không nhập, đường dẫn sẽ tự lấy theo tiêu đề',
                                      'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                      'class'=>'col-sm-9')
                )?>
                <script>
                    $("#pag_title").on("change",function(){
                        var title = $(this).val();
                        $.ajax({
                             type:'post',
                             url:'ajax.php',
                             data:{title:title,action:'alias'},
                             success:function(html){
                                 $('#pag_alias').val(html);
                             }
                         })
                    });
                 </script>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9'))?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                        'name'=> 'pag_active', 
                                        'id'=> 'pag_active', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('pag_active','int','POST',1), 
                                        'helptext'=> 'Xuất bản - hiển thị ra website',
                                        'class'=>'col-sm-9',
                                        'extra'=>' onclick="return check_one(\'pag_active\');"')
               )?>
               <?//=$form->getFile(array('label'=>'Ảnh đại diện','title'=>'Ảnh đại diện','name'=>'pag_picture','id'=>'pag_picture'))?>
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                        'name'=> 'pag_summary', 
                                        'id'=> 'pag_summary',
                                        'value'=>getValue('pag_summary','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                                 'pag_detail', 
                                 'pag_detail', 
                                 getValue('pag_detail','str','POST',''), 
                                 '100%'
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