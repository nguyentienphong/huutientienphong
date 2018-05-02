<?php
require 'inc_security.php';
$catBase = new Category;
$list_cat = array(''=>' - Chọn danh mục - ');
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="faqs"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}
$faq_date = time();
$myform = new generate_form();
$myform->add('faq_cat_id','faq_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('faq_title','faq_title',0,0,'',1,'Bạn chưa nhập tiêu đề');
$myform->add('faq_questions','faq_questions',0,0,'',1,'Bạn chưa nhập câu hỏi');
$myform->add('faq_answer','faq_answer',0,0,'',0,'Bạn chưa nhập câu trả lời');
$myform->add('faq_date','faq_date',1,1,0);
$myform->add('faq_active','faq_active',1,0,0);

$action = getValue('action','str','POST','');
if($action == 'execute'){
   $faq_title = getValue('faq_title','str','POST','');
   $faq_alias = getValue('faq_alias','str','POST','');
   $faq_alias = get_alias($faq_alias,$faq_title,$bg_table,$id_field,$alias_field);
   $myform->add('faq_alias','faq_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');
   $bg_errorMsg .= $myform->checkdata();
   if($bg_errorMsg == ''){
   $myform->addTable($bg_table);
   $myform->removeHTML(0);
   $upload = new upload('faq_image',$bg_filepath,$bg_extension,$limit_size);
      $filename = $upload->file_name;
      if($filename){
         $myform->add('faq_image','filename',0,1,'');
         foreach($arr_resize as $type => $arr){
            resize_image($bg_filepath, $filename, $arr["width"], $arr["height"], $arr["quality"], $type);
         }
      }
      $db_insert = new db_execute_return();
      $last_id = $db_insert->db_execute($myform->generate_insert_SQL());
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
               <?php $form = new form();?>
               <?=$form->form_open()?>
               <?=$form->text(array(
                 'label'=>'Tiêu đề',
                 'name'=>'faq_title',
                 'id'=>'faq_title',
                 'require'=>1,
                 'errorMsg'=>'Bạn chưa nhập tiêu đề',
                 'helptext'=> 'Tiêu đề này sẽ xuất hiện trên url',
                 'class'=>'col-sm-9'
                ))?>
               <?=$form->text(array('label'=>'Đường dẫn',
                                      'name'=>'faq_alias',
                                      'id'=>'faq_alias',
                                      'require'=>1, 
                                      'placeholder'=> 'Nếu bạn không nhập, đường dẫn sẽ tự lấy theo tiêu đề',
                                      'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                      'class'=>'col-sm-9')
                )?>
                <script>
                    $("#faq_title").on("change",function(){
                        var title = $(this).val();
                        $.ajax({
                             type:'post',
                             url:'ajax.php',
                             data:{title:title,action:'alias'},
                             success:function(html){
                                 $('#faq_alias').val(html);
                             }
                         })
                    });
                 </script>
               <?=$form->textarea(array('label'=> 'Câu hỏi', 'name'=> 'faq_questions', 'id'=> 'faq_questions','value'=>getValue('faq_questions','str','POST',''), 'style'=>'width:500px;height:100px', 'require'=> 1,'class'=>'col-sm-9'))?>
               <?=$form->tinyMCE('Câu trả lời','faq_answer','faq_answer',getValue('faq_answer','str','POST',''),'99%')?>
                
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                        'name'=> 'faq_active', 
                                        'id'=> 'faq_active', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('faq_active','int','POST',1), 
                                        'helptext'=> 'Xuất bản - hiển thị ra website',
                                        'class'=>'col-sm-9',
                                        'extra'=>' onclick="return check_one(\'faq_active\');"'))
               ?>
               <?=$form->form_action_add()?>
               <?=$form->form_close()?>
            </div> 
         </section>
      </div>
   </div>  
</div>
<script>
</script>
</body>
</html>