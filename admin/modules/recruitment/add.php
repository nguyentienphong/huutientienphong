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

$rec_date = time();
$myform = new generate_form();
$myform->add('rec_title','rec_title',0,0,'',1,'Bạn chưa nhập tiêu đề tuyển dụng');
$myform->add('rec_title_en','rec_title_en',0,0,'',0,'Bạn chưa nhập tiêu đề tuyển dụng bằng tiếng anh');
$myform->add('rec_cat_id','rec_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('rec_date','rec_date',1,1,0);
$myform->add('rec_active','rec_active',1,0,0);
//$myform->add('rec_hot','rec_hot',1,0,0);
$myform->add('rec_summary','rec_summary',0,0,'');
$myform->add('rec_summary_en','rec_summary_en',0,0,'');
$myform->add('rec_detail','rec_detail',0,0,'',1,'Bạn chưa nhập chi tiết');
$myform->add('rec_detail_en','rec_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết tiếng anh');
$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   
   $rec_title = getValue('rec_title','str','POST','');
   $rec_alias = getValue('rec_alias','str','POST','');
   $rec_alias = get_alias($rec_alias,$rec_title,$bg_table,$id_field,$alias_field);
   $myform->add('rec_alias','rec_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');  
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
               <?=$form->text(array('label'=>'Tên',
                                    'name'=>'rec_title',
                                    'id'=>'rec_title',
                                    'value'=>getValue('rec_title','str','POST',''),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tên',
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tên tiếng anh',
                                    'name'=>'rec_title_en',
                                    'id'=>'rec_title_en',
                                    'value'=>getValue('rec_title_en','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập tên tiếng anh', 
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Đường dẫn',
                                      'name'=>'rec_alias',
                                      'id'=>'rec_alias',
                                      'require'=>1, 
                                      'placeholder'=> 'Nếu bạn không nhập, đường dẫn sẽ tự lấy theo tiêu đề',
                                      'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                      'class'=>'col-sm-9')
                )?>
                <script>
                    $("#rec_title").on("change",function(){
                        var title = $(this).val();
                        $.ajax({
                             type:'post',
                             url:'ajax.php',
                             data:{title:title,action:'alias'},
                             success:function(html){
                                 $('#rec_alias').val(html);
                             }
                         })
                    });
                 </script>
               <?=$form->select(array('label'=>'Danh mục',
                                      'name'=>'rec_cat_id', 
                                      'id'=>'rec_cat_id',
                                      'option'=>$list_cat, 
                                      'title'=>'Chọn danh mục',
                                      'require'=>1,
                                      'errorMsg'=>'Bạn chưa chọn danh mục',
                                      'selected'=>getValue('rec_cat_id','int','POST',''),
                                      'class'=>'col-sm-9'
               ))?>
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                        'name'=> 'rec_summary', 
                                        'id'=> 'rec_summary',
                                        'value'=>getValue('rec_summary','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng anh', 
                                        'name'=> 'rec_summary_en', 
                                        'id'=> 'rec_summary_en',
                                        'value'=>getValue('rec_summary_en','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                                 'rec_detail', 
                                 'rec_detail', 
                                 getValue('rec_detail','str','POST',''), 
                                 '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng anh', 
                                 'rec_detail_en', 
                                 'rec_detail_en', 
                                 getValue('rec_detail_en','str','POST',''), 
                                 '100%'
               )?> 
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                        'name'=> 'rec_active', 
                                        'id'=> 'rec_active', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('rec_active','int','POST',1), 
                                        'helptext'=> 'Xuất bản - hiển thị ra website',
                                        'class'=>'col-sm-9',
                                        'extra'=>' onclick="return check_one(\'rec_active\');"')
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