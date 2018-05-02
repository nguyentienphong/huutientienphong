<?
require_once '../../resources/security/security.php';
$module_id	= 27;
$module_name = 'Đối tác';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
checkAccessModule($module_id);
$bg_errorMsg = '';
$bg_table = 'partner';
$id_field = 'par_id';
$name_field = 'par_title';
//$cat_id_field = 'par_cat_id';
$image_field = 'par_image';
$alias_field = 'par_alias';
?>