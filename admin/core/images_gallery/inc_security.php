<?
require_once '../../resources/security/security.php';
$module_id	= 16;
$module_name = 'Thư viện ảnh';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
$bg_errorMsg = '';
$bg_table = 'images_upload';
$id_field = 'imu_id';
$name_field = 'imu_image';
$bg_filepath = '../../../media/images/';
$bg_extension = 'jpg,jpe,png,gif,jpeg';
$domain = 'http://'.$_SERVER['HTTP_HOST'];
$limit_size = 12000;
$arr_resize = array( "small_" => array("quality" => 100, "width" => 150, "height" => 10000),
					 "medium_" => array("quality" => 100, "width" => 300, "height" =>10000),
                "large_" => array("quality" => 100, "width" => 640, "height" =>10000)
					);
?>