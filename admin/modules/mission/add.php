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

$mis_date = time();
$myform = new generate_form();
$myform->add('mis_title','mis_title',0,0,'',1,'Bạn chưa nhập tên lĩnh vực hoạt động');
$myform->add('mis_title_en','mis_title_en',0,0,'',0,'Bạn chưa nhập tên lĩnh vực hoạt động bằng tiếng anh');
//$myform->add('mis_cat_id','mis_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('mis_date','mis_date',1,1,0);
$myform->add('mis_active','mis_active',1,0,0);
//$myform->add('mis_hot','mis_hot',1,0,0);
$myform->add('mis_summary','mis_summary',0,0,'');
$myform->add('mis_summary_en','mis_summary_en',0,0,'');
//$myform->add('mis_detail','mis_detail',0,0,'',1,'Bạn chưa nhập chi tiết');
//$myform->add('mis_detail_en','mis_detail_en',0,0,'',1,'Bạn chưa nhập chi tiết tiếng anh');
$myform->add('mis_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   $mis_title = getValue('mis_title','str','POST','');
   $mis_alias = getValue('mis_alias','str','POST','');
   $mis_alias = get_alias($mis_alias,$mis_title,$bg_table,$id_field,$alias_field);
   $myform->add('mis_alias','mis_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');
      
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
                                    'name'=>'mis_title',
                                    'id'=>'mis_title',
                                    'value'=>getValue('mis_title','str','POST',''),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tên', 
                                    'helptext'=>'Tên được chia làm 2 phần bằng dấu | ,ví dụ : Đối với | xã hội',
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tên tiếng anh',
                                    'name'=>'mis_title_en',
                                    'id'=>'mis_title_en',
                                    'value'=>getValue('mis_title_en','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập tên tiếng anh', 
                                    'helptext'=>'Tên được chia làm 2 phần bằng dấu | ,ví dụ : Part 1 | Part 2',
                                    'class'=>'col-sm-9')
               )?>
                <?=$form->text(array('label'=>'Đường dẫn',
                                      'name'=>'mis_alias',
                                      'id'=>'mis_alias',
                                      'require'=>1, 
                                      'placeholder'=> 'Nếu bạn không nhập, đường dẫn sẽ tự lấy theo tiêu đề',
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
               <?/*=$form->select(array('label'=>'Danh mục',
                                      'name'=>'mis_cat_id', 
                                      'id'=>'mis_cat_id',
                                      'option'=>$list_cat, 
                                      'title'=>'Chọn danh mục',
                                      'require'=>1,
                                      'errorMsg'=>'Bạn chưa chọn danh mục',
                                      'selected'=>getValue('mis_cat_id','int','POST',''),
                                      'class'=>'col-sm-9'
               ))*/?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9'))?>
               <?/*=$form->checkbox(array('label'=> 'Nổi bật', 
                                        'name'=> 'mis_hot', 
                                        'id'=> 'mis_hot', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('mis_hot','int','POST',1), 
                                        'helptext'=> 'Bài viết đánh dấu nổi bật sẽ được ưu tiên hiển thị')
               )*/?>
               <?//=$form->getFile(array('label'=>'Ảnh đại diện','title'=>'Ảnh đại diện','name'=>'mis_picture','id'=>'mis_picture'))?>
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                        'name'=> 'mis_summary', 
                                        'id'=> 'mis_summary',
                                        'value'=>getValue('mis_summary','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng anh', 
                                        'name'=> 'mis_summary_en', 
                                        'id'=> 'mis_summary_en',
                                        'value'=>getValue('mis_summary_en','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?/*=$form->tinyMCE('Nội dung', 
                                 'mis_detail', 
                                 'mis_detail', 
                                 getValue('mis_detail','str','POST',''), 
                                 '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng anh', 
                                 'mis_detail_en', 
                                 'mis_detail_en', 
                                 getValue('mis_detail_en','str','POST',''), 
                                 '100%'
               )*/?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                        'name'=> 'mis_active', 
                                        'id'=> 'mis_active', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('mis_active','int','POST',1), 
                                        'helptext'=> 'Xuất bản - hiển thị ra website',
                                        'class'=>'col-sm-9',
                                        'extra'=>' onclick="return check_one(\'mis_active\');"')
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
<script type="text/javascript">
    /*$(document).ready(function(){// auto post để tự động lưu
        var auto = setTimeout(function(){ autoRefresh(); }, 100);
        function submitform(){
          //alert('test');
          //document.forms["add_new"].submit();
          var datastring = $('[name="add_new"]').serialize();
          var tinymce = tinyMCE.get('mis_detail').getContent()   ; 
          datastring = datastring+'&mis_detail='+tinymce;
          console.log(datastring)  ; 
          $.ajax({
             type: "POST",
             url: "ajax.php",
             data: datastring,
             success: function() {
               //alert('success');
             }
          });
        }

        function autoRefresh(){
           clearTimeout(auto);
           auto = setTimeout(function(){ submitform(); autoRefresh(); }, 10000);
        }
   })*/
        
</script>