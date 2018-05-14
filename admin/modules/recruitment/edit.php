<?php
require 'inc_security.php';
//Kiem tra quyen addedit
checkPermission('edit');
$record_id = getValue('record_id');
$catBase = new Category;
$list_cat = array(''=>' - Chọn danh mục - ');
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="'.$bg_table.'"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}


$myform = new generate_form();
$myform->add('rec_title','rec_title',0,0,'',1,'Bạn chưa nhập tiêu đề tuyển dụng');
$myform->add('rec_title_en','rec_title_en',0,0,'',0,'Bạn chưa nhập tiêu đề tuyển dụng bằng tiếng anh');
$myform->add('rec_title_ko','rec_title_ko',0,0,'',0,'Bạn chưa nhập tiêu đề tuyển dụng bằng tiếng hàn');
$myform->add('rec_cat_id','rec_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('rec_active','rec_active',1,0,0);
//$myform->add('rec_hot','rec_hot',1,0,0);
$myform->add('rec_summary','rec_summary',0,0,'');
$myform->add('rec_summary_en','rec_summary_en',0,0,'');
$myform->add('rec_summary_ko','rec_summary_ko',0,0,'');
$myform->add('rec_detail','rec_detail',0,0,'',1,'Bạn chưa nhập chi tiết');
$myform->add('rec_detail_en','rec_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết tiếng anh');
$myform->add('rec_detail_ko','rec_detail_ko',0,0,'',0,'Bạn chưa nhập chi tiết tiếng hàn');

$myform->removeHTML(0);
$myform->addTable($bg_table);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   
   $rec_title = getValue('rec_title','str','POST','');
   $rec_alias = getValue('rec_alias','str','POST','');
   $rec_alias = get_alias($rec_alias,$rec_title,$bg_table,$id_field,$alias_field,$record_id);
   $myform->add('rec_alias','rec_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
        //edit lai meta seo
        //editSeoMeta($record_id,$bg_table);
        //ghi lai log nguoi sua
        log_edit($record_id,$bg_table);
        //redirect theo action cua nut nguoi dung click
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
               Sửa <?=$module_name?>  
               <?php $form = new form();?>                      
               <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>       
            </header>        
            <div class="panel-body">
               <?php print_error_msg($bg_errorMsg)?>
               <?=$form->form_open()?>
               <?=$form->text(array('label'=>'Tiêu đề',
                                 'name'=>'rec_title',
                                 'id'=>'rec_title',
                                 'value'=>getValue('rec_title','str','POST',$rec_title),
                                 'require'=>1, 'errorMsg'=>'Bạn chưa nhập Tiêu đề tiếng anh', 
                                 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự',
                                 'helptext'=>'',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tiêu đề tiếng anh',
                                 'name'=>'rec_title_en',
                                 'id'=>'rec_title_en',
                                 'value'=>getValue('rec_title_en','str','POST',$rec_title_en),
                                 'require'=>0, 'errorMsg'=>'Bạn chưa nhập Tiêu đề tiếng anh', 
                                 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tiêu đề tiếng hàn',
                                 'name'=>'rec_title_ko',
                                 'id'=>'rec_title_ko',
                                 'value'=>getValue('rec_title_ko','str','POST',$rec_title_ko),
                                 'require'=>0, 'errorMsg'=>'Bạn chưa nhập Tiêu đề tiếng hàn', 
                                 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               
               <?=$form->text(array('label'=>'Đường dẫn',
                                   'name'=>'rec_alias',
                                   'id'=>'rec_alias',
                                   'require'=>1,                                    
                                   'value'=>getValue('rec_alias','str','POST',$rec_alias),
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
               <?/*=$form->select(array('label'=>'Danh mục',
                                   'name'=>'rec_cat_id', 
                                   'id'=>'rec_cat_id',
                                   'option'=>$list_cat, 
                                   'title'=>'Chọn danh mục',
                                   'require'=>1,
                                   'errorMsg'=>'Bạn chưa chọn danh mục',
                                   'selected'=>getValue('rec_cat_id','int','POST',$rec_cat_id),
                                   'class'=>'col-sm-9')
               )*/?>
               <?/*=$form->text(array('label'=>'Tags bài viết',
                                 'name'=>'rec_tags',
                                 'id'=>'rec_tags',
                                 'value'=>getValue('rec_tags','str','POST',$rec_tags),
                                 'placeholder'=>'Các từ khóa liên quan, hỗ trợ SEO web, cách nhau bởi dấu phẩy',
                                 'class'=>'col-sm-9')
               )*/?>
               <?//=$form->checkbox(array('label'=> 'Nổi bật', 'name'=> 'rec_hot', 'id'=> 'rec_hot', 'value'=>1 ,'currentValue'=>getValue('rec_hot','int','POST',$rec_hot), 'helptext'=> 'Tin tức được đánh dấu nổi bật'))?>
               
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                     'name'=> 'rec_summary', 
                                     'id'=> 'rec_summary',
                                     'value'=>getValue('rec_summary','str','POST',$rec_summary), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng anh', 
                                     'name'=> 'rec_summary_en', 
                                     'id'=> 'rec_summary_en',
                                     'value'=>getValue('rec_summary_en','str','POST',$rec_summary_en), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng hàn', 
                                     'name'=> 'rec_summary_ko', 
                                     'id'=> 'rec_summary_ko',
                                     'value'=>getValue('rec_summary_ko','str','POST',$rec_summary_ko), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                              'rec_detail', 
                              'rec_detail', 
                              getValue('rec_detail','str','POST',$rec_detail), 
                              '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng anh', 
                              'rec_detail_en', 
                              'rec_detail_en', 
                              getValue('rec_detail_en','str','POST',$rec_detail_en), 
                              '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng hàn', 
                              'rec_detail_ko', 
                              'rec_detail_ko', 
                              getValue('rec_detail_ko','str','POST',$rec_detail_ko), 
                              '100%'
               )?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                     'name'=> 'rec_active', 
                                     'id'=> 'rec_active', 
                                     'value'=>1 ,
                                     'currentValue'=>getValue('rec_active','int','POST',$rec_active), 
                                     'helptext'=> 'Xuất bản - hiển thị ra website',
                                     'class'=>'col-sm-9',
                                     'extra'=>' onclick="return check_one(\'rec_active\');"')
               )?>
               <?=$form->seoMeta($bg_table,$record_id)?>
               <?=$form->form_action_edit()?>
               <?//=$form->form_preview(DOMAIN.'/tuyen-dung/'.$rec_alias.'.html')?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>