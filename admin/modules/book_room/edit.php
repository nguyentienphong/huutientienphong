<?php
require 'inc_security.php';
//Kiem tra quyen addedit
checkPermission('edit');
$record_id = getValue('record_id');

$myform = new generate_form();
$myform->add('custumer_phone','custumer_phone',0,0,'',1,'Số điện thoại khách hàng');
$myform->add('custumer_email','custumer_email',0,0,'',1,'Bạn chưa nhập email khách hàng');
$myform->add('checkin_date','checkin_date',0,0,0,1);
$myform->add('checkout_date','checkout_date',0,0,0,1);
$myform->add('book_room_status','book_room_status',1,0,0);
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
				
				<?=$form->text(array('label'=>'Số điện thoại khách hàng',
									'name'=>'custumer_phone',
									'id'=>'custumer_phone',
									'value'=>getValue('custumer_phone','str','POST',$custumer_phone),
									'require'=>1, 
									'errorMsg'=>'Bạn chưa nhập số điện thoại khách hàng', 
									'placeholder'=> 'Số điện thoại khách hàng 11 ký tự',
									'class'=>'col-sm-9')
               )?>
			   
               <?=$form->text(array('label'=>'Email khách hàng',
                                   'name'=>'custumer_email',
                                   'id'=>'custumer_email',
                                   'require'=>1,                                    
                                   'value'=>getValue('custumer_email','str','POST',$custumer_email),
                                   'helptext'=>'',
                                   'class'=>'col-sm-9')
               )?>
			    <?=$form->text(array('label'=>'Ngày nhận phòng',
                                   'name'=>'checkin_date',
                                   'id'=>'checkin_date',
                                   'require'=>1,                                    
                                   'value'=>getValue('checkin_date','str','POST',$checkin_date),
                                   'helptext'=>'',
                                   'class'=>'col-sm-4',
								   'isdatetimepicker'=>1)
               )?>
			   <?=$form->text(array('label'=>'Ngày trả phòng',
                                   'name'=>'checkout_date',
                                   'id'=>'checkout_date',
                                   'require'=>1,                                    
                                   'value'=>getValue('checkout_date','str','POST',$checkout_date),
                                   'helptext'=>'',
                                   'class'=>'col-sm-4',
								   'isdatetimepicker'=>1)
               )?>
			   <?php $room_status = array('99' => "Chờ chuyệt", 
												'1' => "Đã duyệt", 
												'-1' => "Đã từ chối", 
												//'2' => "Đã nhận phòng", 
												//'3' => "Đã trả phòng và thanh toán đủ"
												) ?>
				<?=$form->select(array('label' 	=> 'Trạng thái',
                                      'name'	=> 'book_room_status', 
                                      'id'		=> 'book_room_status',
                                      'option'	=> $room_status, 
                                      'title'	=> 'Chọn trạng thái',
                                      'require'	=> 1,
                                      'errorMsg'=> 'Bạn chưa chọn trạng thái',
                                      'selected'=> getValue('book_room_status','int','POST',$book_room_status),
                                      'class'	=> 'col-sm-9' )) ?>
               
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