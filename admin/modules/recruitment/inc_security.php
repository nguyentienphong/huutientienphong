<?
require_once '../../resources/security/security.php';
$module_id	= 28;
$module_name = 'Tuyển dụng';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
checkAccessModule($module_id);
$bg_errorMsg = '';
$bg_table = 'recruitment';
$id_field = 'rec_id';
$name_field = 'rec_title';
//$cat_id_field = 'rec_cat_id';
//$image_field = 'rec_image';
$alias_field = 'rec_alias';
?>