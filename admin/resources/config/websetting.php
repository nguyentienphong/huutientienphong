<?php 
require 'config_security.php';
checkLogged();
?>
<?php
$record_id 		= getValue("record_id", "arr", "POST", '');
//Warning Error!
$errorMsg = "";
//Get Action.
//Call Class generate_form();
$myform = new generate_form();

$myform->add("mod_name","mod_name",0,0,"",1,"Bạn chưa nhập tên module",0,"");
$myform->add("mod_path","mod_path",0,0,"",0,"",0,"");
$myform->add("mod_listname","mod_listname",0,0,"",0,"",0,"");
$myform->add("mod_listfile","mod_listfile",0,0,"",0,"",0,"");
$myform->add("mod_order","mod_order",1,0,0,0,"",0,"");
$myform->add("mod_icon","mod_icon",0,0,"",0,"",0,"");
//Add table
$myform->addTable($fs_table);
$iQuick = getValue("action","str","POST","");
if ($iQuick == "execute"){
	$errorMsg='';
	$errorMsg .= $myform->checkdata();
	if($errorMsg == ""){
		//echo $myform->generate_insert_SQL();
		$db_ex = new db_execute($myform->generate_insert_SQL());
		unset($db_ex);
		//Hien thi loi
	}
	redirect($_SERVER['REQUEST_URI']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Add New</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<?=$load_header?>
</head>
<body>
<div class="wrapper">
   <div class="row">
      <div class="col-sm-12">
         <section class="panel">
         <header class="panel-heading">
               Thêm mới module
         </header> 
         <div class="panel-body">
            <div>           
             	<?php $form = new form();?>
                 <?=$form->form_open('add_new',$_SERVER['REQUEST_URI'])?>
                 <?=$form->text(array('label'=>'Tên module','name'=>'mod_name','id'=>'mod_name','class'=>'col-sm-9'))?>
                 <?=$form->text(array('label'=>'Thư mục','name'=>'mod_path','id'=>'mod_path','class'=>'col-sm-9'))?>
                 <?=$form->text(array('label'=>'Thứ tự','name'=>'mod_order','id'=>'mod_order','value'=>0,'class'=>'col-sm-9'))?>
                 <?=$form->text(array('label'=>'Tiêu đề','name'=>'mod_listname','id'=>'mod_listname','placeholder'=>'Cách nhau bởi dấu |','class'=>'col-sm-9'))?>
                 <?=$form->text(array('label'=>'URL file','name'=>'mod_listfile','id'=>'mod_listfile','placeholder'=>'Cách nhau bởi dấu |','class'=>'col-sm-9'))?>
                 <?=$form->text(array('label'=>'Icon','name'=>'mod_icon','id'=>'mod_icon','class'=>'col-sm-9'))?>
                 <?=$form->form_action(array('label'=>array('Thêm mới','Nhập lại'),'type'=>array('submit','reset')))?>
                 <?=$form->form_close()?>
             </div>
             <div id="list_module">
                 <?php 
                 //select module
                 $db_module = new db_query("SELECT * FROM modules ORDER BY mod_order ASC");
                 $listmodule = $db_module->resultArray();unset($db_module);
                 $i = 0;
                 ?>
                 <?php foreach($listmodule as $mod){
                         if(!file_exists("../../modules/" . $mod["mod_path"] . "/inc_security.php") && !file_exists("../../core/" . $mod["mod_path"] . "/inc_security.php")){
                             continue;
                         }
                         $filepath = file_exists("../../modules/" . $mod["mod_path"] . "/inc_security.php") ? 'modules' : 'core';
                         if(file_exists("../../".$filepath."/" . $mod["mod_path"] . "/inc_security.php")){
                 			require_once("../../".$filepath."/" . $mod["mod_path"] . "/inc_security.php");
                 			$i++;
                     ?>
                     <?=$form->form_open('quickedit'.$mod['mod_id'],'quickeditmodule.php?record_id='.$mod['mod_id'])?>
                     <?=form_hidden('action','execute')?>
                     <div class="well">
                         <div class="form-group">
                             <?php
                             if(intval($mod['mod_id']) !== intval($module_id)){
                                 $style = 'color:#fff;background:#fe4a0c;font-weight:bold;';
                             }else $style = 'color:red;font-weight:bold;';
                             ?>
                             <label class="control-label" style="<?=$style?>"><?=$i?> - <?=$mod['mod_name']?></label>
                             <div class="controls col-sm-9" style="padding-top:5px;">
                                 <button class="btn btn-success btn-xs" type="button" onclick="document.quickedit<?=$mod['mod_id']?>.submit()">Lưu</button>
                                 <button class="btn btn-danger btn-xs" type="button" onclick="if(confirm('Are you sure ?')) window.location.href='deletemodule.php?id=<?=$mod['mod_id']?>&returnURL=<?=base64_encode($_SERVER['REQUEST_URI'])?>'">Xóa</button>
                             </div>
                         </div>
                         <div class="form-group">
                             <label class="control-label">Module id</label>
                             <div class="controls col-sm-9" style="font-size: 16px;font-weight:bold;padding-top:5px;"><?=$mod['mod_id']?></div>
                         </div>
                         <div class="form-group">
                             <label class="control-label">Module name</label>
                             <div class="controls  col-sm-9"><?=form_input('mod_name',$mod['mod_name'],'class="form-control"')?></div>
                         </div>
                         <div class="form-group">
                             <label class="control-label">Thư mục</label>
                             <div class="controls  col-sm-9"><?=form_input('mod_path',$mod['mod_path'],'class="form-control"')?></div>
                         </div>
                         <div class="form-group">
                             <label class="control-label">Thứ tự</label>
                             <div class="controls  col-sm-9"><?=form_input('mod_order',$mod['mod_order'],'class="form-control"')?></div>
                         </div>
                         <div class="form-group">
                             <label class="control-label">Tiêu đề</label>
                             <div class="controls  col-sm-9"><?=form_input('mod_listname',$mod['mod_listname'],'class="form-control"')?></div>
                         </div>
                         <div class="form-group">
                             <label class="control-label">URL file</label>
                             <div class="controls col-sm-9"><?=form_input('mod_listfile',$mod['mod_listfile'],'class="form-control"')?></div>
                         </div>
                         <div class="form-group">
                             <label class="control-label">Module Icon</label>
                             <div class="controls  col-sm-9"><?=form_input('mod_icon',$mod['mod_icon'],'class="form-control"')?></div>
                         </div>
                     </div>
                     <?=$form->form_close()?>
                     <?php }?>
                  <?php }?>
                  </div>
               </div>
            </section>
         </div>
      </div>        
   </div>
</body>
</html>