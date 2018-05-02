<?
require_once '../../resources/security/security.php';
$module_id	= 21;
$module_name = 'Khách hàng đánh giá';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
$bg_errorMsg = '';
$bg_table = 'contact';
$id_field = 'con_id';
$name_field = 'con_name';
$bg_filepath = '../../../pictures/feedback/';
$bg_extension = 'jpg,jpe,png,gif,jpeg';
$domain = 'http://'.$_SERVER['HTTP_HOST'];
$limit_size = 12000;
$arr_resize = array( "small_" => array("quality" => 100, "width" => 112, "height" => 1000),
					 "medium_" => array("quality" => 100, "width" => 224, "height" =>10000)
					);
?>