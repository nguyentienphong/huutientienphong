<?php
require 'inc_security.php';
$record_id = getValue('record_id');
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
$myform->add('faq_date','faq_date',1,1,0);
//$myform->add('faq_hot','faq_hot',1,0,0);
$myform->add('faq_answer','faq_answer',0,0,'',1,'Bạn chưa nhập câu trả lời');
$myform->removeHTML(0);
$myform->addTable($bg_table);

$action = getValue('action','str','POST','');
if($action == 'execute'){
   $faq_title = getValue('faq_title','str','POST','');
   $faq_alias = getValue('faq_alias','str','POST','');
   $faq_alias = get_alias($faq_alias,$faq_title,$bg_table,$id_field,$alias_field);
   $myform->add('faq_alias','faq_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');
   $bg_errorMsg .= $myform->checkdata();
   if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
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
               <?print_error_msg($bg_errorMsg)?>
               <?=$form->form_open()?>
                  <?=$form->text(array(
                    'label'=>'Tiêu đề',
                    'name'=>'faq_title',
                    'id'=>'faq_title',
                    'require'=>1,
                    'value'=>getValue('faq_title','str','POST',$faq_title),
                    'errorMsg'=>'Bạn chưa nhập tiêu đề',
                    'helptext'=> 'Tiêu đề này sẽ xuất hiện trên url',
                    'class'=>'col-sm-9'
                ))?>
               <?=$form->text(array('label'=>'Đường dẫn',
                                   'name'=>'faq_alias',
                                   'id'=>'faq_alias',
                                   'require'=>1, 
                                   'value'=>getValue('faq_alias','str','POST',$faq_alias),
                                   'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                   'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Câu hỏi', 'name'=> 'faq_questions', 'id'=> 'faq_questions','value'=>getValue('faq_questions','str','POST',$faq_questions), 'style'=>'width:500px;height:100px', 'require'=> 1,'class'=>'col-sm-9'))?>
               <?=$form->tinyMCE('Câu trả lời','faq_answer','faq_answer',getValue('faq_answer','str','POST',$faq_answer),'99%')?>
               <?=$form->form_action_edit()?>
               <?=$form->form_preview(DOMAIN.'/cau-hoi-thuong-gap/'.$faq_alias.'.html')?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>