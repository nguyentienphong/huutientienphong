<?
require 'config_security.php';
checkLogged();
$errorMsg = "";
$success = '';
//Get Action.
//Call Class generate_form();
$action = getValue('action','str','POST','');
if($action == 'execute'){
	$old_pass = getValue('old_pass','str','POST','');
	if(md5($old_pass) != $_SESSION['password']){
		$errorMsg .= 'Bạn nhập password cũ không chính xác<br/>';
	}
	$new_pass = getValue('new_pass','str','POST','');
	$check_pass = getValue('check_pass','str','POST','');
	if($new_pass != $check_pass){
		$errorMsg .= 'Bạn nhập password mới không khớp<br/>';
	}else{
		$new_pass = md5($new_pass);
	}
	$myform = new generate_form(); 
	$myform->addTable('admin_users');
	$myform->add('adm_password','new_pass',0,1,'',1,'Bạn nhập password chưa chính xác');
	if($errorMsg == ''){
		$db_ex = new db_execute($myform->generate_update_SQL('adm_id',$admin_id));
		$success = 'Cập nhật thành công';
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Đổi mật khẩu</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<?=$load_header?>
<style>
   .form-actions {
      position: relative;
      z-index: 1;
      top:0;
      left:175px
      }
</style>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<div class="wrapper">
   <div class="row">
      <div class="col-sm-12">
         <section class="panel">
            <header class="panel-heading">
               <?php $form = new form();?>
               <?=$form->textnote(array('Thay đổi mật khẩu quản trị viên'))?>
            </header>  
            <div class="panel-body">
             	<?=print_error_msg($errorMsg)?>
             	<?=$success?>
             	<?=$form->form_open('add_new',$_SERVER['REQUEST_URI'])?>
               
               <?=$form->password(array('label'=>'Mật khẩu cũ','name'=>'old_pass','id'=>'old_pass','require'=>1,'errorMsg'=>'Bạn chưa nhập mật khẩu cũ','class'=>'col-sm-9'))?>
               <?=$form->password(array('label'=>'Mật khẩu mới','name'=>'new_pass','id'=>'new_pass','require'=>1,'errorMsg'=>'Bạn chưa nhập mật khẩu mới','class'=>'col-sm-9'))?>
               <?=$form->password(array('label'=>'Xác nhận mật khẩu ','name'=>'check_pass','id'=>'new_pass','require'=>1,'errorMsg'=>'Mật khẩu xác nhận không khớp','class'=>'col-sm-9'))?>
               <?=$form->form_action(array('label'=>array('Cập nhật','Nhập lại'),'type'=>array('submit','reset')))?>
               <?=$form->form_close()?>
            </div> 
         </section>
      </div>
   </div>   
</div>
</body>
</html>
