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

$prj_date = time();
$myform = new generate_form();
$prj_date_start = convertDateTime(getValue('prj_date_start','str','POST',''));
$prj_date_end = convertDateTime(getValue('prj_date_end','str','POST',''));
$myform->add('prj_date_start','prj_date_start',1,1,0);
$myform->add('prj_date_end','prj_date_end',1,1,0);
$myform->add('prj_customer','prj_customer',0,0,'',0,'Bạn chưa nhập tên khách hàng');
$myform->add('prj_title','prj_title',0,0,'',1,'Bạn chưa nhập tên dự án');
$myform->add('prj_title_en','prj_title_en',0,0,'',0,'Bạn chưa nhập tên dự án tiếng anh');
$myform->add('prj_cat_id','prj_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('prj_date','prj_date',1,1,0);
$myform->add('prj_active','prj_active',1,0,0);
//$myform->add('prj_hot','prj_hot',1,0,0);
$myform->add('prj_summary','prj_summary',0,0,'');
$myform->add('prj_summary_en','prj_summary_en',0,0,'');
$myform->add('prj_detail','prj_detail',0,0,'',1,'Bạn chưa nhập chi tiết');
$myform->add('prj_detail_en','prj_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết tiếng anh');
$myform->add('prj_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   $prj_title = getValue('prj_title','str','POST','');
   $prj_alias = getValue('prj_alias','str','POST','');
   $prj_alias = get_alias($prj_alias,$prj_title,$bg_table,$id_field,$alias_field);
   $myform->add('prj_alias','prj_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');
      
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
                                    'name'=>'prj_title',
                                    'id'=>'prj_title',
                                    'value'=>getValue('prj_title','str','POST',''),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tên', 
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tên tiếng anh',
                                    'name'=>'prj_title_en',
                                    'id'=>'prj_title_en',
                                    'value'=>getValue('prj_title_en','str','POST',''),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tên tiếng anh', 
                                    'class'=>'col-sm-9')
               )?>
                <?=$form->text(array('label'=>'Đường dẫn',
                                      'name'=>'prj_alias',
                                      'id'=>'prj_alias',
                                      'require'=>1, 
                                      'placeholder'=> 'Nếu bạn không nhập, đường dẫn sẽ tự lấy theo tiêu đề',
                                      'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                      'class'=>'col-sm-9')
                )?>
                <script>
                    $("#prj_title").on("change",function(){
                        var title = $(this).val();
                        $.ajax({
                             type:'post',
                             url:'ajax.php',
                             data:{title:title,action:'alias'},
                             success:function(html){
                                 $('#prj_alias').val(html);
                             }
                         })
                    });
                 </script>
               <?=$form->select(array('label'=>'Danh mục',
                                      'name'=>'prj_cat_id', 
                                      'id'=>'prj_cat_id',
                                      'option'=>$list_cat, 
                                      'title'=>'Chọn danh mục',
                                      'require'=>1,
                                      'errorMsg'=>'Bạn chưa chọn danh mục',
                                      'selected'=>getValue('prj_cat_id','int','POST',''),
                                      'class'=>'col-sm-9'
               ))?>
               <?=$form->text(array('label'=>'Ngày bắt đầu','name'=>'prj_date_start','id'=>'prj_date_start','isdatepicker'=>1,'class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Ngày kết thúc','name'=>'prj_date_end','id'=>'prj_date_end','isdatepicker'=>1,'class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Tên khách hàng',
                                    'name'=>'prj_customer',
                                    'id'=>'prj_customer',
                                    'value'=>getValue('prj_customer','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập tên khách hàng', 
                                    'class'=>'col-sm-9')
               )?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9'))?>
               <?/*=$form->checkbox(array('label'=> 'Nổi bật', 
                                        'name'=> 'prj_hot', 
                                        'id'=> 'prj_hot', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('prj_hot','int','POST',1), 
                                        'helptext'=> 'Bài viết đánh dấu nổi bật sẽ được ưu tiên hiển thị')
               )*/?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                        'name'=> 'prj_active', 
                                        'id'=> 'prj_active', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('prj_active','int','POST',1), 
                                        'helptext'=> 'Xuất bản - hiển thị ra website',
                                        'class'=>'col-sm-9',
                                        'extra'=>' onclick="return check_one(\'prj_active\');"')
               )?>
               <?//=$form->getFile(array('label'=>'Ảnh đại diện','title'=>'Ảnh đại diện','name'=>'prj_picture','id'=>'prj_picture'))?>
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                        'name'=> 'prj_summary', 
                                        'id'=> 'prj_summary',
                                        'value'=>getValue('prj_summary','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng anh', 
                                        'name'=> 'prj_summary_en', 
                                        'id'=> 'prj_summary_en',
                                        'value'=>getValue('prj_summary_en','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                                 'prj_detail', 
                                 'prj_detail', 
                                 getValue('prj_detail','str','POST',''), 
                                 '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng anh', 
                                 'prj_detail_en', 
                                 'prj_detail_en', 
                                 getValue('prj_detail_en','str','POST',''), 
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
<script type="text/javascript">
    /*$(document).ready(function(){// auto post để tự động lưu
        var auto = setTimeout(function(){ autoRefresh(); }, 100);
        function submitform(){
          //alert('test');
          //document.forms["add_new"].submit();
          var datastring = $('[name="add_new"]').serialize();
          var tinymce = tinyMCE.get('prj_detail').getContent()   ; 
          datastring = datastring+'&prj_detail='+tinymce;
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