<?
require_once '../../resources/security/security.php';
$module_id	= 23;
$module_name = 'Slides';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
$bg_errorMsg = '';
$bg_table = 'slides';
$id_field = 'sli_id';
$name_field = 'sli_title';
$bg_filepath = '../../../pictures/slides/';
$bg_extension = 'jpg,jpe,png,gif,jpeg';
$domain = 'http://'.$_SERVER['HTTP_HOST'];
$cat_type = 'slides';
$cat_id_field = 'sli_cat_id';
$limit_size = 12000;
$arr_resize = array( "small_" => array("quality" => 100, "width" => 112, "height" => 1000),
					 "medium_" => array("quality" => 100, "width" => 224, "height" =>10000)
					);
?>