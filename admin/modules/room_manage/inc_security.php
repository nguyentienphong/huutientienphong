<?
require_once '../../resources/security/security.php';
$module_id	= 27;
$module_name = 'phòng khách sạn';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
checkAccessModule($module_id);
$bg_errorMsg = '';
$bg_table = 'rooms';
$id_field = 'roo_id';
$name_field = 'roo_name';
//$cat_id_field = 'par_cat_id';
$image_field = 'roo_image';
$alias_field = 'roo_alias';
?>