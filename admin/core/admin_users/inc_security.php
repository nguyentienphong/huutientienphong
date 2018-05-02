<?
require_once '../../resources/security/security.php';
require_once '../../../classes/category.class.php';
$module_id	= 14;
$module_name = 'Quản trị người dùng';
//Kiem tra dang nhap
checkLogged();
//Kiem tra quyen truy cap module
if(!checkAccessModule($module_id)){
	redirect($fs_denypath);
}
$bg_errorMsg = '';
$bg_table = 'admin_users';
$id_field = 'adm_id';
$name_field = 'adm_loginname';
$bg_filepath = '../../../pictures/admin_users/';
$bg_extension = 'jpg,jpe,png,gif,jpeg';
$limit_size = 10000;
$arr_resize = array( "small_" => array("quality" => 100, "width" => 30, "height" => 10000),
					 "medium_" => array("quality" => 100, "width" => 100, "height" => 10000)
					);
?>