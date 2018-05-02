<?
require_once '../../resources/security/security.php';
$module_id	= 31;
$module_name = 'Đội ngũ quản lý';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
checkAccessModule($module_id);
$bg_errorMsg = '';
$bg_table = 'manager';
$id_field = 'mng_id';
$name_field = 'mng_name';
$alias_field = 'mng_alias';
//$cat_id_field = 'par_cat_id';
$image_field = 'par_avatar';
?>