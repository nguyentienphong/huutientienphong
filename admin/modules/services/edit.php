<?php
require 'inc_security.php';
$record_id = getValue('record_id');
$catBase = new Category;
$list_cat = array(''=>' - Chọn danh mục - ');
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="services"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}


$ser_date = time();
$myform = new generate_form();
$myform->add('ser_title','ser_title',0,0,'',1,'Bạn chưa nhập tên dịch vụ');
$myform->add('ser_title_en','ser_title_en',0,0,'',0,'Bạn chưa nhập tên dịch vụ tiếng anh');
$myform->add('ser_title_ko','ser_title_ko',0,0,'',0,'Bạn chưa nhập tên dịch vụ tiếng hàn');
//$myform->add('ser_cat_id','ser_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('ser_date','ser_date',1,1,0);
$myform->add('ser_active','ser_active',1,0,0);
//$myform->add('ser_hot','ser_hot',1,0,0);
$myform->add('ser_summary','ser_summary',0,0,'',0,'Bạn chưa nhập tóm tắt');
$myform->add('ser_summary_en','ser_summary_en',0,0,'',0,'Bạn chưa nhập tóm tắt tiếng anh');
$myform->add('ser_summary_ko','ser_summary_ko',0,0,'',0,'Bạn chưa nhập tóm tắt tiếng hàn');
//$myform->add('ser_detail','ser_detail',0,0,'',0,'Bạn chưa nhập chi tiết dịch vụ');
//$myform->add('ser_detail_en','ser_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết dịch vụ tiếng anh');
$myform->add('ser_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->removeHTML(0);
$myform->addTable($bg_table);

$action = getValue('action','str','POST','');
if($action == 'execute'){
   /*$ser_title = getValue('ser_title','str','POST','');
   $ser_alias = getValue('ser_alias','str','POST','');
   $ser_alias = get_alias($ser_alias,$ser_title,$bg_table,$id_field,$alias_field,$record_id);
   $myform->add('ser_alias','ser_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');*/
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
        editSeoMeta($record_id,$bg_table);
        log_edit($record_id,$bg_table);
        form_redirect($record_id);
    }
}

//lấy dữ liệu record cần sửa đổi
$db_data 	= new db_query("SELECT * FROM " . $bg_table . " WHERE " . $id_field . " = " . $record_id);
if($row 		= mysql_fetch_assoc($db_data->result)){
	foreach($row as $key=>$value){
		$$key = $value;
	}
}else{
		exit();
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
               Danh sách <?=$module_name?>  
               <?php $form = new form();?>                      
               <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>       
            </header>        
            <div class="panel-body">
               <?print_error_msg($bg_errorMsg)?>
               <?=$form->form_open()?>            
               <?=$form->text(array('label'=>'Tên','name'=>'ser_title','id'=>'ser_title','value'=>getValue('ser_title','str','POST',$ser_title),'require'=>1, 'errorMsg'=>'Bạn chưa nhập Tên', 'placeholder'=> 'Tên không dài quá 255 ký tự','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Tên tiếng anh','name'=>'ser_title_en','id'=>'ser_title_en','value'=>getValue('ser_title_en','str','POST',$ser_title_en),'require'=>0, 'errorMsg'=>'Bạn chưa nhập Tên', 'placeholder'=> 'Tên không dài quá 255 ký tự','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Tên tiếng hàn','name'=>'ser_title_ko','id'=>'ser_title_ko','value'=>getValue('ser_title_ko','str','POST',$ser_title_ko),'require'=>0, 'errorMsg'=>'Bạn chưa nhập Tên', 'placeholder'=> 'Tên không dài quá 255 ký tự','class'=>'col-sm-9'))?>
               <?//=$form->select(array('label'=>'Danh mục','name'=>'ser_cat_id', 'id'=>'ser_cat_id','option'=>$list_cat, 'title'=>'Chọn danh mục','require'=>1,'errorMsg'=>'Bạn chưa chọn danh mục','selected'=>getValue('ser_cat_id','int','POST',$ser_cat_id),'class'=>'col-sm-9'))?>
               <?//=$form->checkbox(array('label'=> 'Nổi bật', 'name'=> 'ser_hot', 'id'=> 'ser_hot', 'value'=>1 ,'currentValue'=>getValue('ser_hot','int','POST',$ser_hot), 'helptext'=> 'Bài viết được đánh dấu nổi bật'))?>
               <script>
                    $("#ser_title").on("change",function(){
                        var title = $(this).val();
                        $.ajax({
                             type:'post',
                             url:'ajax.php',
                             data:{title:title,action:'alias'},
                             success:function(html){
                                 $('#ser_alias').val(html);
                             }
                         })
                    });
                 </script>
               <?/*=$form->text(array('label'=>'Đường dẫn',
                                   'name'=>'ser_alias',
                                   'id'=>'ser_alias',
                                   'require'=>1,                                    
                                   'value'=>getValue('ser_alias','str','POST',$ser_alias),
                                   'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                   'class'=>'col-sm-9')
               )*/?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện','title'=>'Ảnh đại diện','name'=>'imu','id'=>'imu','value'=>getValue('ser_image','str','POST',$ser_image),'class'=>'col-sm-9'))?>
               <?=$form->textarea(array('label'=> 'Tóm tắt', 'name'=> 'ser_summary', 'id'=> 'ser_summary','value'=>getValue('ser_summary','str','POST',$ser_summary),'errorMsg'=>'Bạn chưa nhập tóm tắt', 'style'=>'width:100%;height:100px', 'require'=> 0,'class'=>'col-sm-9'))?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng anh', 'name'=> 'ser_summary_en', 'id'=> 'ser_summary_en','value'=>getValue('ser_summary_en','str','POST',$ser_summary_en), 'style'=>'width:100%;height:100px', 'require'=>0,'class'=>'col-sm-9'))?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng hàn', 'name'=> 'ser_summary_ko', 'id'=> 'ser_summary_ko','value'=>getValue('ser_summary_ko','str','POST',$ser_summary_ko), 'style'=>'width:100%;height:100px', 'require'=>0,'class'=>'col-sm-9'))?>
               <?//=$form->tinyMCE('Nội dung', 'ser_detail', 'ser_detail', getValue('ser_detail','str','POST',$ser_detail), '100%')?>
               <?//=$form->tinyMCE('Nội dung tiếng anh', 'ser_detail_en', 'ser_detail_en', getValue('ser_detail_en','str','POST',$ser_detail_en), '100%')?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 'name'=> 'ser_active', 'id'=> 'ser_active', 'value'=>1 ,'currentValue'=>getValue('ser_active','int','POST',$ser_active), 'helptext'=> 'Xuất bản ra trang','class'=>'col-sm-9','extra'=>' onclick="return check_one(\'ser_active\');"'))?>
               <?=$form->seoMeta($bg_table,$record_id)?>
               <?=$form->form_action_edit()?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>