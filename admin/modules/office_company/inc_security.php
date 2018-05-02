<?
require_once '../../resources/security/security.php';
$module_id	= 32;
$module_name = 'Thông tin văn phòng';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
checkAccessModule($module_id);
$bg_errorMsg = '';
$bg_table = 'office_contact';
$id_field = 'off_id';
$name_field = 'off_name';
//$cat_id_field = 'off_cat_id';

?>