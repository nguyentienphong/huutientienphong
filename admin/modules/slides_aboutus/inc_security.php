<?
require_once '../../resources/security/security.php';
$module_id	= 34;
$module_name = 'Slides Giới thiệu';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
$bg_errorMsg = '';
$bg_table = 'slides_aboutus';
$id_field = 'sli_id';
$name_field = 'sli_title';
$bg_filepath = '../../../pictures/slides_aboutus/';
$bg_extension = 'jpg,jpe,png,gif,jpeg';
$domain = 'http://'.$_SERVER['HTTP_HOST'];
$limit_size = 12000;
$arr_resize = array( "small_" => array("quality" => 100, "width" => 112, "height" => 1000),
					 "medium_" => array("quality" => 100, "width" => 224, "height" =>10000)
					);
?>