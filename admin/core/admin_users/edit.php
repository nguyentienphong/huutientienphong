<?php require 'inc_security.php'; 
//Kiem tra quyen addedit
checkPermission('edit');

$record_id = getValue('record_id');

$adm_birthday = convertDateTime(getValue('adm_birthday','str','POST',''));
$myform = new generate_form();
$myform->addTable($bg_table);
$myform->add('adm_birthday','adm_birthday',1,1,0);
$myform->add('adm_mail','adm_mail',0,0,'');
$myform->add('adm_name','adm_name',0,0,'');
$myform->add('adm_phone','adm_phone',0,0,'');
$myform->add('adm_active','adm_active',1,0,0);
$action = getValue('action','str','POST','');
if($action == 'execute'){
	$bg_errorMsg .= $myform->checkData();
	if(!$bg_errorMsg){
		
		unset($db_ex);
		//Delete du lieu cu
		$db_delete = new db_execute('DELETE FROM admin_users_right
									WHERE adu_admin_id = '.$record_id);
		unset($db_delete);
		//insert admin_users_right
		$record_module = getValue('module_id','arr','POST','');
		if($record_module){
			$count = count($record_module);
			for($i = 0; $i<$count; $i++){
				$module_id = $record_module[$i];
				$myform_per = new generate_form();
				$myform_per->add('adu_admin_id','record_id',1,1,0);
				$myform_per->add('adu_admin_module_id','module_id',1,1,0);
				$myform_per->add('adu_admin_edit','adu_edit'.$record_module[$i], 1, 0, 0);
				$myform_per->add('adu_admin_add','adu_add'.$record_module[$i], 1, 0, 0);
				$myform_per->add('adu_admin_delete','adu_delete'.$record_module[$i], 1, 0, 0);
				$myform_per->addTable('admin_users_right');
				$db_insert = new db_execute($myform_per->generate_insert_SQL());
			}
		}
      $upload = new upload('adm_avatar',$bg_filepath,$bg_extension,$limit_size);
      $filename = $upload->file_name;
      if($filename){
         $myform->add('adm_avatar','filename',0,1,'');
         foreach($arr_resize as $type => $arr){
            resize_image($bg_filepath, $filename, $arr["width"], $arr["height"], $arr["quality"], $type);
         }
         delete_file($bg_table,$id_field,$record_id,"adm_avatar",$bg_filepath);
         
      }
      $db_ex = new db_execute($myform->generate_update_SQL($id_field,$record_id));
		//redirect('listing.php');
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
$db_getallmodule = new db_query('SELECT * 
								 FROM modules
								 ORDER BY mod_order DESC');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=$load_header?>
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
               Sửa <?=$module_name?>  
               <?php $form = new form();?>                      
               <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>       
            </header>        
            <div class="panel-body">
               <?php print_error_msg($bg_errorMsg)?>
               <?=$form->form_open()?>
               <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>
               
               <div class="form-group">
                  <label class="control-label fl">Tên đăng nhập :</label>
                  <div class="controls col-sm-9"><span style="float: left;margin-top: 5px;"><?=$adm_loginname?></span></div>
               </div>
               <div class="form-group">
                  <label class="control-label fl">Ảnh đại diện:</label>
                  <div class="controls col-sm-9">
                     <div class="img_thumb">
                        <img src="<?=$bg_filepath.$adm_avatar?>" alt="Không có ảnh" style="margin-bottom: 5px;"/>
                     </div>                 
                  </div>
                  <?=$form->getFile(array('title'=>'Ảnh đại diện','name'=>'adm_avatar','id'=>'adm_avatar','class'=>'col-sm-9'))?>
               </div>
               
               <?=$form->text(array('label'=>'Email','name'=>'adm_mail','id'=>'adm_mail','value'=>$adm_mail,'class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Họ tên','name'=>'adm_name','id'=>'adm_name','value'=>$adm_name,'class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Điện thoại','name'=>'adm_phone','id'=>'adm_phone','value'=>$adm_phone,'class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Ngày sinh','name'=>'adm_birthday','id'=>'adm_birthday','isdatepicker'=>1,'value'=>date('d/m/Y',$adm_birthday),'class'=>'col-sm-9'))?>
               <?=$form->checkbox(array('label'=>'Kích hoạt','name'=>'adm_active','id'=>'adm_active','value'=>1,'currentValue'=>$adm_active,'class'=>'col-sm-9','extra'=>' onclick="return check_one(\'adm_active\');"'))?>
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
               $i=0;
               while ($row=mysql_fetch_array($db_getallmodule->result)){
                  $i++;
               if(file_exists("../../modules/" . $row["mod_path"] . "/inc_security.php")===false){
                  if(file_exists("../../core/" . $row["mod_path"] . "/inc_security.php")===false){
                      continue;
                  }
               }
               //Check add edit module nay
               $db = new db_query('SELECT adu_admin_add AS `add`, adu_admin_edit AS `edit`, adu_admin_delete AS `del`
                                  FROM admin_users_right
                                  WHERE adu_admin_id = '.$record_id.' AND adu_admin_module_id = '.$row['mod_id']);
               $result_check = mysql_fetch_assoc($db->result);unset($db);
               $rs_md = $result_check ? 'checked="checked"' : '';
               $rscheck_add = $result_check['add'] ? 'checked="checked"' : '';
               $rscheck_edit = $result_check['edit'] ? 'checked="checked"' : '';
               $rscheck_delete = $result_check['del'] ? 'checked="checked"' : '';
               ?>
               <div class="form-group">
                  <label class="control-label"><?=$row['mod_name']?></label>
                  <div class="controls col-sm-9 list-role">
                     <label class="fl">
                           <div class="" style="position: relative;">
                           <i class="fa fa-<?=($result_check ? 'check-':'')?>square-o icon-green font-size17">
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
                                 background: rgb(255, 255, 255);" type="checkbox" id="record_1<?=$i?>" class="check" type="checkbox" name="module_id[]" value="<?=$row['mod_id']?>" onclick="return check_one('record_1<?=$i?>')" <?=$rs_md?>/>
                           </i> Truy cập
                        </div>
                     </label>
                     <label class="fl">
                           <div class="" style="position: relative;">
                              <i class="fa fa-<?=($result_check['add'] ? 'check-':'')?>square-o icon-green font-size17">
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
                                    background: rgb(255, 255, 255);" type="checkbox" id="record_2<?=$i?>"class="check" type="checkbox" name="adu_add<?=$row['mod_id']?>" value="1" onclick="return check_one('record_2<?=$i?>')" <?=$rscheck_add?>/>
                              </i> Thêm
                           </div>
                        </label>
                     	<label class="fl">
                           <div class="" style="position: relative;">
                              <i class="fa fa-<?=($result_check['edit'] ? 'check-':'')?>square-o icon-green font-size17">
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
                                    background: rgb(255, 255, 255);" type="checkbox" id="record_3<?=$i?>"class="check" type="checkbox" name="adu_edit<?=$row['mod_id']?>" value="1" onclick="return check_one('record_3<?=$i?>')" <?=$rscheck_edit?>/>
                              </i> Sửa
                           </div>
                        </label>
                     	<label class="fl">
                           <div class="" style="position: relative;">
                              <i class="fa fa-<?=($result_check['del'] ? 'check-':'')?>square-o icon-green font-size17">
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
                                    background: rgb(255, 255, 255);" type="checkbox" id="record_4<?=$i?>"class="check" type="checkbox" name="adu_delete<?=$row['mod_id']?>" value="1" onclick="return check_one('record_4<?=$i?>')" <?=$rscheck_delete?>/>
                              </i> Xóa
                           </div>
                        </label>
                     
                  </div>
               </div>
               <?}?>
               <?=$form->form_action(array('label'=>array('Cập nhật','Nhập lại'),'type'=>array('submit','reset')))?>
               <?=$form->form_close()?>
               </div>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>