<?
require_once '../../resources/security/security.php';
$module_id	= 2;
$module_name = 'Trang đơn';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
checkAccessModule($module_id);
$bg_errorMsg = '';
$bg_table = 'page';
$id_field = 'pag_id';
$name_field = 'pag_title';
$image_field = 'pag_image';
$alias_field = 'pag_alias';
?>