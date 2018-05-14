<?php require 'inc_security.php'; 

//Kiem tra quyen addedit
checkPermission('add');

$adm_birthday = convertDateTime(getValue('adm_birthday','str','POST',''));
$myform = new generate_form();
$myform->addTable($bg_table);
$myform->add('adm_loginname','adm_loginname',0,0,'',1,'Tên đăng nhập không được bỏ trống',1,'Tên tài khoản đã được đăng ký');
$myform->add('adm_birthday','adm_birthday',1,1,0);
$myform->add('adm_mail','adm_mail',0,0,'');
$myform->add('adm_name','adm_name',0,0,'');
$myform->add('adm_phone','adm_phone',0,0,'');
$myform->add('adm_active','adm_active',1,0,0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
	$password = getValue('adm_password','str','POST','');
	$repassword = getValue('repassword','str','POST','');
	if($password !== $repassword){
		$bg_errorMsg .= 'Mật khẩu nhập lại không đúng';
	}else{
		$adm_password = md5($password);
		$myform->add('adm_password','adm_password',0,1,'');	
	}
	$bg_errorMsg .= $myform->checkData();
	if(!$bg_errorMsg){
		$db_ex = new db_execute_return();
		$last_id = $db_ex->db_execute($myform->generate_insert_SQL());
		unset($db_ex);
		//insert admin_users_right
		$record_module = getValue('module_id','arr','POST','');
		if($record_module){
			$count = count($record_module);
			for($i = 0; $i<$count; $i++){
				$module_id = $record_module[$i];
				$myform = new generate_form();
				$myform->add('adu_admin_id','last_id',1,1,0);
				$myform->add('adu_admin_module_id','module_id',1,1,0);
				$myform->add('adu_admin_edit','adu_edit'.$record_module[$i], 1, 0, 0);
				$myform->add('adu_admin_add','adu_add'.$record_module[$i], 1, 0, 0);
				$myform->add('adu_admin_delete','adu_delete'.$record_module[$i], 1, 0, 0);
				$myform->addTable('admin_users_right');
				$db_insert = new db_execute($myform->generate_insert_SQL());
			}
		}
		$upload = new upload('adm_avatar',$bg_filepath,$bg_extension,$limit_size);
      $filename = $upload->file_name;
      if($filename){
         $myform->add('adm_avatar','filename',0,1,'');
         foreach($arr_resize as $type => $arr){
            resize_image($bg_filepath, $filename, $arr["width"], $arr["height"], $arr["quality"], $type);
         }
      }
		redirect('listing.php');
	}
}
$db_getallmodule = new db_query('SELECT * 
								 FROM modules
								 ORDER BY mod_order DESC');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=$load_header?>
<script src="/themes/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>
<style>
	.list-role label {
		margin-bottom: 0;
		margin-top : 6px;
		margin-right : 20px;
	}
	.list-role input[type="checkbox"]{
		margin-top:-1px;
		margin-right:2px;
	}
</style>
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
               <?=$bg_errorMsg?>
               <?=$form->form_open()?>
               <?=$form->text(array('label'=>'Tên đăng nhập','name'=>'adm_loginname','id'=>'adm_loginname','require'=>1,'errorMsg'=>'Bạn chưa nhập tên đăng nhập','class'=>'col-sm-9'))?>
               <?=$form->password(array('label'=>'Mật khẩu','name'=>'adm_password','id'=>'adm_password','require'=>1,'errorMsg'=>'Bạn chưa nhập mật khẩu','class'=>'col-sm-9'))?>
               <?=$form->password(array('label'=>'Nhập lại mật khẩu','name'=>'repassword','id'=>'repassword','require'=>1, 'errorMsg'=>'Bạn chưa nhập lại mật khẩu','class'=>'col-sm-9'))?>
               <?=$form->getFile(array('label'=>'Ảnh đại diện','title'=>'Ảnh đại diện','name'=>'adm_avatar','id'=>'adm_avatar','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Email','name'=>'adm_mail','id'=>'adm_mail','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Họ tên','name'=>'adm_name','id'=>'adm_name','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Điện thoại','name'=>'adm_phone','id'=>'adm_phone','class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Ngày sinh','name'=>'adm_birthday','id'=>'adm_birthday','isdatepicker'=>1,'class'=>'col-sm-9'))?>
               <?=$form->checkbox(array('label'=>'Kích hoạt','name'=>'adm_active','id'=>'adm_active','value'=>1,'currentValue'=>1,'class'=>'col-sm-9','extra'=>' onclick="return check_one(\'adm_active\');"'))?>
			<?=$form->checkbox(array('label'=>'Nhận mail thông báo','name'=>'recivice_email_notify','id'=>'recivice_email_notify','value'=>1,'currentValue'=>$recivice_email_notify,'class'=>'col-sm-9','extra'=>' onclick="return check_one(\'recivice_email_notify\');"'))?>              
			  <?//Phan quyen quan tri?>
               <div class="well">
                  <header class="panel-heading">
                  Phân quyền module
                  <label class="">
                     <div class="">
                          <i class="fa icon-green font-size17 fa-square-o" style="position: relative;">
                           <input style="position: absolute;
                           top: -20%;
                           left: -20%;
                           display: block;
                           width: 140%;
                           height: 140%;
                           margin: 0px;
                           padding: 0px;
                           border: 0px;
                           opacity: 0;
                           background: rgb(255, 255, 255);" type="checkbox" id="check_all" class="check" onclick="return check_all_per()"></i> Toàn quyền</div>
                     </label>
                  </header>
                  <? 
                  $i = 0;
                  while ($row=mysql_fetch_array($db_getallmodule->result)){
                     $i++;
                    if(file_exists("../../modules/" . $row["mod_path"] . "/inc_security.php")===false){
                        if(file_exists("../../core/" . $row["mod_path"] . "/inc_security.php")===false){
                            continue;
                        }
                    }
                  ?>
                  <div class="form-group">
                     <label class="control-label"><?=$row['mod_name']?></label>
                     <div class="controls col-sm-9 list-role">
                     	<label class="fl">
                              <div class="" style="position: relative;">
                              <i class="fa fa-square-o icon-green font-size17">
                                 <input style="position: absolute;
                                    top: -20%;
                                    left: -20%;
                                    display: block;
                                    width: 140%;
                                    height: 140%;
                                    margin: 0px;
                                    padding: 0px;
                                    border: 0px;
                                    opacity: 0;
                                    background: rgb(255, 255, 255);" type="checkbox" id="record_1<?=$i?>" class="check" type="checkbox" name="module_id[]" value="<?=$row['mod_id']?>" onclick="return check_one('record_1<?=$i?>')"/>
                              </i> Truy cập
                           </div>
                        </label>
                     	<label class="fl">
                           <div class="" style="position: relative;">
                              <i class="fa fa-square-o icon-green font-size17">
                                 <input style="position: absolute;
                                    top: -20%;
                                    left: -20%;
                                    display: block;
                                    width: 140%;
                                    height: 140%;
                                    margin: 0px;
                                    padding: 0px;
                                    border: 0px;
                                    opacity: 0;
                                    background: rgb(255, 255, 255);" type="checkbox" id="record_2<?=$i?>"class="check" type="checkbox" name="adu_add<?=$row['mod_id']?>" value="1" onclick="return check_one('record_2<?=$i?>')"/>
                              </i> Thêm
                           </div>
                        </label>
                     	<label class="fl">
                           <div class="" style="position: relative;">
                              <i class="fa fa-square-o icon-green font-size17">
                                 <input style="position: absolute;
                                    top: -20%;
                                    left: -20%;
                                    display: block;
                                    width: 140%;
                                    height: 140%;
                                    margin: 0px;
                                    padding: 0px;
                                    border: 0px;
                                    opacity: 0;
                                    background: rgb(255, 255, 255);" type="checkbox" id="record_3<?=$i?>"class="check" type="checkbox" name="adu_edit<?=$row['mod_id']?>" value="1" onclick="return check_one('record_3<?=$i?>')"/>
                              </i> Sửa
                           </div>
                        </label>
                     	<label class="fl">
                           <div class="" style="position: relative;">
                              <i class="fa fa-square-o icon-green font-size17">
                                 <input style="position: absolute;
                                    top: -20%;
                                    left: -20%;
                                    display: block;
                                    width: 140%;
                                    height: 140%;
                                    margin: 0px;
                                    padding: 0px;
                                    border: 0px;
                                    opacity: 0;
                                    background: rgb(255, 255, 255);" type="checkbox" id="record_4<?=$i?>"class="check" type="checkbox" name="adu_delete<?=$row['mod_id']?>" value="1" onclick="return check_one('record_4<?=$i?>')"/>
                              </i> Xóa
                           </div>
                        </label>
                     </div>
                  </div>
                  <?}?>
                  <?=$form->form_action(array('label'=>array('Thêm mới','Nhập lại'),'type'=>array('submit','reset')))?>
                  <?=$form->form_close()?>
               </div> 
            </div>
         </section>
      </div>
   </div>
</div>
</body>
</html>