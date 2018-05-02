<?
require_once '../../resources/security/security.php';
$module_id	= 36;
$module_name = 'Tầm nhìn sứ mệnh';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
checkAccessModule($module_id);
$bg_errorMsg = '';
$bg_table = 'mission';
$id_field = 'mis_id';
$name_field = 'mis_title';
//$cat_id_field = 'mis_cat_id';
$image_field = 'mis_image';
$alias_field = 'mis_alias';
?>