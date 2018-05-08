<?
require_once '../../resources/security/security.php';
$module_id	= 15;
$module_name = 'Hội nghị và sự kiện';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
checkAccessModule($module_id);
$bg_errorMsg = '';
$bg_table = 'metting_event';
$id_field = 'met_id';
$name_field = 'met_title';
$cat_id_field = 'met_cat_id';
$image_field = 'met_image';
$alias_field = 'met_alias';
?>