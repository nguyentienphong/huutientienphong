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

$off_date = time();
$myform = new generate_form();
$myform->add('off_name','off_name',0,0,'',1,'Bạn chưa nhập tên văn phòng');
$myform->add('off_name_en','off_name_en',0,0,'',0,'Bạn chưa nhập tên văn phòng tiếng anh');
$myform->add('off_address','off_address',0,0,'');
$myform->add('off_address_en','off_address_en',0,0,'');
$myform->add('off_fax','off_fax',0,0,'');
//$myform->add('off_map','off_map',0,0,'',0,'Bạn chưa nhập địa chỉ cho google map');
$myform->add('off_phone','off_phone',0,0,'');
//$myform->add('off_hotline','off_hotline',0,0,'');
$myform->add('off_email','off_email',0,0,'');
//$myform->add('off_website','off_website',0,0,'');
$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
      
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
               <?=$form->text(array('label'=>'Tên văn phòng',
                                 'name'=>'off_name',
                                 'id'=>'off_name',
                                 'value'=>'',
                                 'require'=>1, 'errorMsg'=>'Bạn chưa nhập tên văn phòng', 
                                 'placeholder'=> 'Tên đề không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tên văn phòng tiếng anh',
                                 'name'=>'off_name_en',
                                 'id'=>'off_name_en',
                                 'value'=>'',
                                 'require'=>0, 'errorMsg'=>'Bạn chưa nhập tên văn phòng', 
                                 'placeholder'=> 'Tên đề không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Địa chỉ hiển thị',
                                   'name'=>'off_address',
                                   'id'=>'off_address',
                                   'value'=>'',
                                   'helptext'=>'',
                                   'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Địa chỉ hiển thị tiếng anh',
                                   'name'=>'off_address_en',
                                   'id'=>'off_address_en',
                                   'value'=>'',
                                   'helptext'=>'',
                                   'class'=>'col-sm-9')
               )?>
               <?/*=$form->text(array('label'=>'Địa chỉ google maps',
                                   'name'=>'off_map',
                                   'id'=>'off_map',
                                   'value'=>'',
                                   'require'=>1,
                                   'errorMsg'=>'Bạn chưa nhập địa chỉ google maps',
                                   'helptext'=>'',
                                   'class'=>'col-sm-9')
               )*/?>
               <?=$form->text(array('label'=>'Điện thoại',
                                    'name'=>'off_phone',
                                    'id'=>'off_phone',
                                    'value'=>'',
                                    'class'=>'col-sm-9'))
               ?>
               <?=$form->text(array('label'=>'FAX',
                                    'name'=>'off_fax',
                                    'id'=>'off_fax',
                                    'value'=>'',
                                    'class'=>'col-sm-9'))
               ?>
               <?=$form->text(array('label'=>'Email',
                                    'name'=>'off_email',
                                    'id'=>'off_email',
                                    'value'=>'',
                                    'class'=>'col-sm-9'))
               ?>
               <?/*=$form->text(array('label'=>'Website',
                                    'name'=>'off_website',
                                    'id'=>'off_website',
                                    'value'=>'',
                                    'class'=>'col-sm-9'))
               */?>
               
               <?//=$form->seoMeta($bg_table)?>
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
          var tinymce = tinyMCE.get('off_detail').getContent()   ; 
          datastring = datastring+'&off_detail='+tinymce;
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