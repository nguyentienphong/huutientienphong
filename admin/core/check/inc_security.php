<?
require_once '../../resources/security/security.php';
$module_id	= 10;
$module_name = 'Check thông tin liên hệ - đăng ký';
checkLogged();
//Kiem tra quyen truy cap module
if(!checkAccessModule($module_id)) redirect($fs_denypath);

?>