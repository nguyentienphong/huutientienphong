<?
require_once '../../resources/security/security.php';
$module_id	= 37;
$module_name = 'Văn hóa doanh nghiệp';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
checkAccessModule($module_id);
$bg_errorMsg = '';
$bg_table = 'culture';
$id_field = 'cul_id';
$name_field = 'cul_title';
//$cat_id_field = 'cul_cat_id';
$image_field = 'cul_image';
$alias_field = 'cul_alias';
?>