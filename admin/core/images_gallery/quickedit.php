<?php
require_once("inc_security.php");
//Kiem tra quyen addedit
checkPermission('edit');
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
         $myform->add('imu_image', "imu_image" . $record_id[$i], 0, 0, '', 0, '', 0, '');
			$myform->add('imu_alt', "imu_alt" . $record_id[$i], 0, 0, '', 0, '', 0, '');
			//Add table
			$myform->addTable($bg_table);
					
			$errorMsg .= $myform->checkdata($id_field, $record_id[$i]);
			//Check loi cua tat ca cac ban ghi duoc sua
			$errorMsgAll	.=	$errorMsg;
			
			if($errorMsg == ""){
			   $image_name_new = getValue('imu_image'.$record_id[$i],'str','POST','');
            $image_name_old = db_one('SELECT imu_image FROM images_upload WHERE imu_id='.$record_id[$i]);
            $image_date = db_one('SELECT imu_date FROM images_upload WHERE imu_id='.$record_id[$i]);
            $img_link_old = $_SERVER["DOCUMENT_ROOT"].'/media/images/'.img_filepath($image_date).$image_name_old;
            $img_link_new = $_SERVER["DOCUMENT_ROOT"].'/media/images/'.img_filepath($image_date).$image_name_new;
            rename($img_link_old,$img_link_new);
            foreach($arr_resize as $type => $arr){
               $img_link_old = $_SERVER["DOCUMENT_ROOT"].'/media/images/'.img_filepath($image_date).$type.$image_name_old;
               $img_link_new = $_SERVER["DOCUMENT_ROOT"].'/media/images/'.img_filepath($image_date).$type.$image_name_new;
      			rename($img_link_old,$img_link_new);
      		}
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