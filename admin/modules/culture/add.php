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

$cul_date = time();
$myform = new generate_form();
$myform->add('cul_title','cul_title',0,0,'',1,'Bạn chưa nhập tên lĩnh vực hoạt động');
$myform->add('cul_title_en','cul_title_en',0,0,'',0,'Bạn chưa nhập tên lĩnh vực hoạt động bằng tiếng anh');
//$myform->add('cul_cat_id','cul_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('cul_date','cul_date',1,1,0);
$myform->add('cul_active','cul_active',1,0,0);
//$myform->add('cul_hot','cul_hot',1,0,0);
$myform->add('cul_summary','cul_summary',0,0,'');
$myform->add('cul_summary_en','cul_summary_en',0,0,'');
$myform->add('cul_detail','cul_detail',0,0,'',1,'Bạn chưa nhập chi tiết');
$myform->add('cul_detail_en','cul_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết tiếng anh');
$myform->add('cul_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->add('cul_image_en','imu_en',0,0,'',0,"Bạn chưa chọn ảnh đại diện tiếng anh");
$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   $cul_title = getValue('cul_title','str','POST','');
   $cul_alias = getValue('cul_alias','str','POST','');
   $cul_alias = get_alias($cul_alias,$cul_title,$bg_table,$id_field,$alias_field);
   $myform->add('cul_alias','cul_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');
      
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
                                    'name'=>'cul_title',
                                    'id'=>'cul_title',
                                    'value'=>getValue('cul_title','str','POST',''),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tên', 
                                    'helptext'=>'Tên được chia làm 2 phần bằng dấu | ,ví dụ : Đối với | xã hội',
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tên tiếng anh',
                                    'name'=>'cul_title_en',
                                    'id'=>'cul_title_en',
                                    'value'=>getValue('cul_title_en','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập tên tiếng anh', 
                                    'helptext'=>'Tên được chia làm 2 phần bằng dấu | ,ví dụ : Part 1 | Part 2',
                                    'class'=>'col-sm-9')
               )?>
                <?=$form->text(array('label'=>'Đường dẫn',
                                      'name'=>'cul_alias',
                                      'id'=>'cul_alias',
                                      'require'=>1, 
                                      'placeholder'=> 'Nếu bạn không nhập, đường dẫn sẽ tự lấy theo tiêu đề',
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
               <?/*=$form->select(array('label'=>'Danh mục',
                                      'name'=>'cul_cat_id', 
                                      'id'=>'cul_cat_id',
                                      'option'=>$list_cat, 
                                      'title'=>'Chọn danh mục',
                                      'require'=>1,
                                      'errorMsg'=>'Bạn chưa chọn danh mục',
                                      'selected'=>getValue('cul_cat_id','int','POST',''),
                                      'class'=>'col-sm-9'
               ))*/?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9'))?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh Tiếng anh',
                                                 'title'=>'Ảnh Xuất hiện trong bản tiếng anh',
                                                 'name'=>'imu_en',
                                                 'id'=>'imu_en',
                                                 'class'=>'col-sm-9'))?>
               <?/*=$form->checkbox(array('label'=> 'Nổi bật', 
                                        'name'=> 'cul_hot', 
                                        'id'=> 'cul_hot', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('cul_hot','int','POST',1), 
                                        'helptext'=> 'Bài viết đánh dấu nổi bật sẽ được ưu tiên hiển thị')
               )*/?>
               
               <?//=$form->getFile(array('label'=>'Ảnh đại diện','title'=>'Ảnh đại diện','name'=>'cul_picture','id'=>'cul_picture'))?>
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                        'name'=> 'cul_summary', 
                                        'id'=> 'cul_summary',
                                        'value'=>getValue('cul_summary','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng anh', 
                                        'name'=> 'cul_summary_en', 
                                        'id'=> 'cul_summary_en',
                                        'value'=>getValue('cul_summary_en','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                                 'cul_detail', 
                                 'cul_detail', 
                                 getValue('cul_detail','str','POST',''), 
                                 '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng anh', 
                                 'cul_detail_en', 
                                 'cul_detail_en', 
                                 getValue('cul_detail_en','str','POST',''), 
                                 '100%'
               )?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                        'name'=> 'cul_active', 
                                        'id'=> 'cul_active', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('cul_active','int','POST',1), 
                                        'helptext'=> 'Xuất bản - hiển thị ra website',
                                        'class'=>'col-sm-9',
                                        'extra'=>' onclick="return check_one(\'cul_active\');"')
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
          var tinymce = tinyMCE.get('cul_detail').getContent()   ; 
          datastring = datastring+'&cul_detail='+tinymce;
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