<?
require_once '../../resources/security/security.php';
$module_id	= 15;
$module_name = 'Tin tức';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
checkAccessModule($module_id);
$bg_errorMsg = '';
$bg_table = 'post';
$id_field = 'pos_id';
$name_field = 'pos_title';
$cat_id_field = 'pos_cat_id';
$image_field = 'pos_image';
$alias_field = 'pos_alias';
?>