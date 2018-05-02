<?php
function img_filepath($date){// đường dẫn ảnh lưu dạng : Năm/tháng
   return date('Y',$date).'/'.date('m',$date).'/';
}
function checkExtension($filename, $allowList){
	$sExtension = $filename;
	$allowArray	= explode(",", $allowList);
	$allowPass	= 0;
	for($i=0; $i<count($allowArray); $i++){
		if($sExtension == $allowArray[$i]) $allowPass = 1;
	}
	return $allowPass;
}

function delete_file($table_name,$id_field,$id_field_value,$field_select,$ff_imagepath){
    $query = "SELECT " . $field_select . " " .
    		 "FROM " . $table_name . " " .
    		 "WHERE " . $id_field . "=" . $id_field_value;
    //echo $query;
	$db_select = new db_query($query);
	if($row=mysql_fetch_array($db_select->result)){
		if(file_exists($ff_imagepath . $row[$field_select])) @unlink($ff_imagepath . $row[$field_select]);
		if(file_exists($ff_imagepath . "small_" . $row[$field_select])) @unlink($ff_imagepath . "small_" . $row[$field_select]);
		if(file_exists($ff_imagepath . "tiny_" . $row[$field_select])) @unlink($ff_imagepath . "tiny_" . $row[$field_select]);
		if(file_exists($ff_imagepath . "medium_" . $row[$field_select])) @unlink($ff_imagepath . "medium_" . $row[$field_select]);
      if(file_exists($ff_imagepath . "large_" . $row[$field_select])) @unlink($ff_imagepath . "large_" . $row[$field_select]);
	}	
	unset($db_select);
    //echo("UPDATE " . $table_name . " SET " . $field_select . " = null WHERE " . $id_field . "=" . $id_field_value);
	$db_ex = new db_execute("UPDATE " . $table_name . " SET " . $field_select . " = null WHERE " . $id_field . "=" . $id_field_value);
    //if($db_ex->total > 0) echo '<script language="javascript">alert("' . translate_text("Xóa thành công") . '!");</script>';
	unset($db_ex);					
}

function generate_name($filename){
	$name = "";
	for($i=0; $i<3; $i++){
		$name .= chr(rand(97,122));
	}
	$today= getdate();
	$name.= $today[0];
	$ext	= substr($filename, (strrpos($filename, ".") + 1));
	return $name . "." . $ext;
}

function getExtension($filename){
	$sExtension = substr($filename, (strrpos($filename, ".") + 1));
	$sExtension = strtolower($sExtension);
	return $sExtension;
}
function resize_image($path, $filename, $maxwidth, $maxheight, $quality, $type = "small_", $new_path = ""){
	$percent		=	1;
	$sExtension = substr($filename, (strrpos($filename, ".") + 1));
	$sExtension = strtolower($sExtension);

	// Get new dimensions
	list($width, $height) = getimagesize($path . $filename);
	if($width != 0 && $height !=0){
		if($maxwidth / $width > $maxheight / $height) $percent = $maxheight / $height;
		else $percent = $maxwidth / $width;
	}
	
	$new_width	= $width * $percent;
	$new_height	= $height * $percent;
	
	// Resample
	$image_p = imagecreatetruecolor($new_width, $new_height);
	//check extension file for create
	switch($sExtension){
		case "gif":
			$image = imagecreatefromgif($path . $filename);
			break;
		case $sExtension == "jpg" || $sExtension == "jpe" || $sExtension == "jpeg":
			$image = imagecreatefromjpeg($path . $filename);
			break;
		case "png":
			$image = imagecreatefrompng($path . $filename);
			break;
	}
	//Copy and resize part of an image with resampling
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
	// Output
	
	// check new_path, nếu new_path tồn tại sẽ save ra đó, thay path = new_path
	if($new_path != "") $path = $new_path;
	
	switch($sExtension){
	case "gif":
		imagegif($image_p, $path . $type . $filename);
		break;
	case $sExtension == "jpg" || $sExtension == "jpe" || $sExtension == "jpeg":
		imagejpeg($image_p, $path . $type . $filename, $quality);
		break;
	case "png":
		imagepng($image_p, $path . $type . $filename);
		break;
	}
	imagedestroy($image_p);
}
function is_dir_empty($dir) {// kiểm tra folder rỗng hay ko
  if (!is_readable($dir)) return NULL; 
  $handle = opendir($dir);
  while (false !== ($entry = readdir($handle))) {
    if ($entry != "." && $entry != "..") {
      return FALSE;
    }
  }
  return TRUE;
}
?>