<?php
require_once("inc_security.php");
$returnurl = base64_decode(getValue("url","str","GET",base64_encode("listing.php")));
$errorMsg = '';
$errorMsgAll	=	"";

$iQuick = getValue("iQuick","str","POST","");
$record_id = getValue("record_id", "arr", "POST", "");
if(!$record_id){
    redirect('listing.php');
}
if($iQuick == 'update'){
	$total_record	=	count($record_id);
	if($total_record > 0){
		for($i = 0; $i < $total_record; $i++){
			//Call Class generate_form();
			$myform = new generate_form();
         $cat_name = getValue("cat_name" . $record_id[$i],'str','POST','');
         $cat_alias = getValue("cat_alias" . $record_id[$i],'str','POST','');
         $cat_alias = get_alias($cat_alias,$cat_name,$bg_table,$id_field,$alias_field,$record_id[$i]);
         $myform->add('cat_alias','cat_alias',0,1,'');
			//Insert to database
         $myform->add('cat_name', "cat_name", 0, 1, '', 0, '', 0, '');
			$myform->add('cat_order', "cat_order" . $record_id[$i], 1, 0, '', 0, '', 0, '');
			//Add table
			$myform->addTable($bg_table);			
			$errorMsg .= $myform->checkdata($id_field, $record_id[$i]);
			//Check loi cua tat ca cac ban ghi duoc sua
			$errorMsgAll	.=	$errorMsg;
			
			if($errorMsg == ""){
				$db_ex = new db_execute($myform->generate_update_SQL($id_field, $record_id[$i]));
				unset($db_ex);
			}else{
				echo $record_id[$i] . " : " . $errorMsg . "</br>";
			}
			unset($myform);
		}
	}
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
	echo "Đang cập nhật dữ liệu !";
	if($errorMsgAll == ""){
		redirect($returnurl);
	}
}
?>