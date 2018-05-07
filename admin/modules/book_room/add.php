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

$par_date = time();
$myform = new generate_form();
$myform->add('par_title','par_title',0,0,'',1,'Bạn chưa nhập tên đối tác');
$myform->add('par_link','par_link',0,0,'',0,'Bạn chưa nhập website');
//$myform->add('par_cat_id','par_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
//$myform->add('par_date','par_date',1,1,0);
$myform->add('par_active','par_active',1,0,0);
//$myform->add('par_hot','par_hot',1,0,0);
$myform->add('par_description','par_description',0,0,'');
$myform->add('par_detail','par_detail',0,0,'',0,'Bạn chưa nhập chi tiết');
$myform->add('par_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->addTable($bg_table);
$myform->removeHTML(0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   /*$par_title = getValue('par_title','str','POST','');
   $par_alias = getValue('par_alias','str','POST','');
   $par_alias = get_alias($par_alias,$par_title,$bg_table,$id_field,$alias_field);
   $myform->add('par_alias','par_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');*/
      
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
               <?=$form->text(array('label'=>'Tên',
                                    'name'=>'par_title',
                                    'id'=>'par_title',
                                    'value'=>getValue('par_title','str','POST',''),
                                    'require'=>1, 
                                    'errorMsg'=>'Bạn chưa nhập tiêu đề bài', 
                                    'class'=>'col-sm-9')
               )?>
                <?=$form->text(array('label'=>'Website',
                                    'name'=>'par_link',
                                    'id'=>'par_link',
                                    'value'=>getValue('par_link','str','POST',''),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập Website', 
                                    'class'=>'col-sm-9')
               )?>
               <?/*=$form->select(array('label'=>'Danh mục',
                                      'name'=>'par_cat_id', 
                                      'id'=>'par_cat_id',
                                      'option'=>$list_cat, 
                                      'title'=>'Chọn danh mục',
                                      'require'=>1,
                                      'errorMsg'=>'Bạn chưa chọn danh mục',
                                      'selected'=>getValue('par_cat_id','int','POST',''),
                                      'class'=>'col-sm-9'
               ))*/?>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9'))?>
               <?/*=$form->checkbox(array('label'=> 'Nổi bật', 
                                        'name'=> 'par_hot', 
                                        'id'=> 'par_hot', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('par_hot','int','POST',1), 
                                        'helptext'=> 'Bài viết đánh dấu nổi bật sẽ được ưu tiên hiển thị')
               )*/?>
               
               <?//=$form->getFile(array('label'=>'Ảnh đại diện','title'=>'Ảnh đại diện','name'=>'par_picture','id'=>'par_picture'))?>
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                        'name'=> 'par_summary', 
                                        'id'=> 'par_summary',
                                        'value'=>getValue('par_summary','str','POST',''), 
                                        'style'=>'width:100%;height:100px', 
                                        'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                                 'par_detail', 
                                 'par_detail', 
                                 getValue('par_detail','str','POST',''), 
                                 '100%'
               )?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                        'name'=> 'par_active', 
                                        'id'=> 'par_active', 
                                        'value'=>1 ,
                                        'currentValue'=>getValue('par_active','int','POST',1), 
                                        'helptext'=> 'Xuất bản - hiển thị ra website',
                                        'class'=>'col-sm-9',
                                        'extra'=>' onclick="return check_one(\'par_active\');"')
               )?>
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