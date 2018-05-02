<?
require_once '../../resources/security/security.php';
$module_id	= 15;
$module_name = 'Quản lý link dưới chân trang';
//check đăng nhập và bảo mật
checkLogged();
$bg_errorMsg = '';
$bg_table = 'link_footer';
$id_field = 'lft_id';
$name_field = 'lft_title';
$bg_filepath = '../../../pictures/link_footer/';
$bg_extension = 'jpg,jpe,png,gif,jpeg';
$limit_size = 1200;
$arr_resize = array( "small_" => array("quality" => 100, "width" => 240, "height" => 135),
					 "medium_" => array("quality" => 100, "width" => 400, "height" => 225)
					);
$arr_page_type = array('introduction'=>'Giới thiệu',
                        'service'=>'Dịch vụ',
                        'project'=>'Dự án')
?>