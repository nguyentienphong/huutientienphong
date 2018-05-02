<?
require_once '../../resources/security/security.php';
$module_id	= 33;
$module_name = 'Dịch vụ';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
$bg_errorMsg = '';
$bg_table = 'services';
$id_field = 'ser_id';
$name_field = 'ser_title';
$alias_field =  'ser_alias';
$bg_filepath = '../../../pictures/services/';
$bg_extension = 'jpg,jpe,png,gif,jpeg';
$domain = 'http://'.$_SERVER['HTTP_HOST'];
$limit_size = 12000;
$arr_resize = array( "small_" => array("quality" => 100, "width" => 112, "height" => 1000),
					 "medium_" => array("quality" => 100, "width" => 224, "height" =>10000)
					);
?>