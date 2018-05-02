<?
require_once '../../resources/security/security.php';
$module_id	= 26;
$module_name = 'Dự án đầu tư';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
checkAccessModule($module_id);
$bg_errorMsg = '';
$bg_table = 'project';
$id_field = 'prj_id';
$name_field = 'prj_title';
$cat_id_field = 'prj_cat_id';
$image_field = 'prj_image';
$alias_field = 'prj_alias';
$img_extension = 'jpg,gif,png,jpeg';
?>