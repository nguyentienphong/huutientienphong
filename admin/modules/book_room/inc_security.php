<?
require_once '../../resources/security/security.php';
$module_id	= 27;
$module_name = 'Quản lý đặt phòng';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
checkAccessModule($module_id);
$bg_errorMsg = '';
$bg_table = 'manage_book_room';
$id_field = 'row_id';
$name_field = 'row_id';
//$cat_id_field = 'par_cat_id';
$image_field = 'row_id';
$alias_field = 'row_id';
?>