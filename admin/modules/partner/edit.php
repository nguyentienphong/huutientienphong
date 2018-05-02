<?php
require 'inc_security.php';
//Kiem tra quyen addedit
checkPermission('edit');
$record_id = getValue('record_id');
/*$catBase = new Category;
$list_cat = array(''=>' - Chọn danh mục - ');
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="'.$bg_table.'"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}*/


$myform = new generate_form();
$myform->add('par_title','par_title',0,0,'',1,'Bạn chưa nhập tên đối tác');
$myform->add('par_link','par_link',0,0,'',0,'Bạn chưa nhập website');
$myform->add('par_active','par_active',1,0,0);

$myform->add('par_description','par_description',0,0,'');
$myform->add('par_detail','par_detail',0,0,'',0,'Bạn chưa nhập chi tiết');
$myform->add('par_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->removeHTML(0);
$myform->addTable($bg_table);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   /*$par_title = getValue('par_title','str','POST','');
   $par_alias = getValue('par_alias','str','POST','');
   $par_alias = get_alias($par_alias,$par_title,$bg_table,$id_field,$alias_field,$record_id);
   $myform->add('par_alias','par_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');*/
   
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
               <?=$form->text(array('label'=>'Tên',
                                 'name'=>'par_title',
                                 'id'=>'par_title',
                                 'value'=>getValue('par_title','str','POST',$par_title),
                                 'require'=>1, 'errorMsg'=>'Bạn chưa nhập tiêu đề tin', 
                                 'placeholder'=> 'Tiêu đề không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Website',
                                   'name'=>'par_link',
                                   'id'=>'par_link',
                                   'require'=>0,                                    
                                   'value'=>getValue('par_link','str','POST',$par_link),
                                   'helptext'=>'',
                                   'class'=>'col-sm-9')
               )?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9',
                                                 'value'=>getValue('par_image','str','POST',$par_image)))?>
               <?/*=$form->select(array('label'=>'Danh mục',
                                   'name'=>'par_cat_id', 
                                   'id'=>'par_cat_id',
                                   'option'=>$list_cat, 
                                   'title'=>'Chọn danh mục',
                                   'require'=>1,
                                   'errorMsg'=>'Bạn chưa chọn danh mục',
                                   'selected'=>getValue('par_cat_id','int','POST',$par_cat_id),
                                   'class'=>'col-sm-9')
               )*/?>
               <?/*=$form->text(array('label'=>'Tags bài viết',
                                 'name'=>'par_tags',
                                 'id'=>'par_tags',
                                 'value'=>getValue('par_tags','str','POST',$par_tags),
                                 'placeholder'=>'Các từ khóa liên quan, hỗ trợ SEO web, cách nhau bởi dấu phẩy',
                                 'class'=>'col-sm-9')
               )*/?>
               <?//=$form->checkbox(array('label'=> 'Nổi bật', 'name'=> 'par_hot', 'id'=> 'par_hot', 'value'=>1 ,'currentValue'=>getValue('par_hot','int','POST',$par_hot), 'helptext'=> 'Tin tức được đánh dấu nổi bật'))?>
               
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                     'name'=> 'par_description', 
                                     'id'=> 'par_description',
                                     'value'=>getValue('par_description','str','POST',$par_description), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                              'par_detail', 
                              'par_detail', 
                              getValue('par_detail','str','POST',$par_detail), 
                              '100%'
               )?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                     'name'=> 'par_active', 
                                     'id'=> 'par_active', 
                                     'value'=>1 ,
                                     'currentValue'=>getValue('par_active','int','POST',$par_active), 
                                     'helptext'=> 'Xuất bản - hiển thị ra website',
                                     'class'=>'col-sm-9',
                                     'extra'=>' onclick="return check_one(\'par_active\');"')
               )?>
               <?//=$form->seoMeta($bg_table,$record_id)?>
               <?=$form->form_action_edit()?>
               <?//=$form->form_preview(DOMAIN.'/'.$par_alias.'.html')?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>