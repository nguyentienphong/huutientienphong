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
			//Insert to database
         $myform->add('lft_title', "lft_title" . $record_id[$i], 0, 0, '', 0, '', 0, '');
			$myform->add('lft_link', "lft_link" . $record_id[$i], 0, 0, '', 0, '', 0, '');
         $myform->add('lft_position', "lft_position" . $record_id[$i], 1, 0, 0, 0, '', 0, '');
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