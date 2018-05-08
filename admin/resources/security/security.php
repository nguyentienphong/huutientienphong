<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('DOMAIN', 'http://'.$_SERVER['HTTP_HOST']);
require_once(ROOT.'/classes/database.php');
require_once(ROOT.'/classes/data_func.php');
require_once(ROOT.'/classes/generate_form.php');
require_once(ROOT.'/classes/upload.php');
require_once(ROOT.'/classes/category.class.php');
require_once(ROOT.'/classes/tutorial.class.php');
require_once(ROOT.'/classes/share.class.php');
require_once(ROOT.'/functions/functions.php');
require_once(ROOT.'/functions/rewrite_function.php');
require_once(ROOT.'/functions/form.php');
require_once(ROOT.'/functions/date_functions.php');
require_once(ROOT.'/functions/file_functions.php');

require_once(ROOT.'/config/config_db.php');
require_once('functions.php');
require_once('grid.php');
require_once('functions_1.php');

$admin_id 				= getValue("user_id","int","SESSION");
$isAdmin	=	getValue("isAdmin", "int", "SESSION", 0);
$rand_v = rand(1,1000);
$css_global = '';
$css_global .= '<link rel="stylesheet" type="text/css" href="/admin/resources/css/bootstrap.min.css?v='.$rand_v.'" />';
$css_global .= '<link rel="stylesheet" type="text/css" href="/admin/resources/css/style.css?v='.$rand_v.'" />';
$css_global .= '<link rel="stylesheet" type="text/css" href="/admin/resources/css/DT_bootstrap.css?v='.$rand_v.'" />';
$css_global .= '<link rel="stylesheet" type="text/css" href="/admin/resources/css/demo_table.css?v='.$rand_v.'" />';
$css_global .= '<link rel="stylesheet" type="text/css" href="/admin/resources/css/common.css?v='.$rand_v.'" />';
$css_global .= '<link rel="stylesheet" type="text/css" href="/admin/resources/css/template.css?v='.$rand_v.'" />';
$css_global .= '<link rel="stylesheet" type="text/css" href="/admin/resources/css/datepick.css?v='.$rand_v.'" />';
$css_global .= '<link rel="stylesheet" type="text/css" href="/admin/resources/css/switchery.css?v='.$rand_v.'" />';
$css_global .= '<link rel="stylesheet" type="text/css" href="/themes/css/jquery.fancybox.css?v='.$rand_v.'" />';
$css_global .= '<link rel="stylesheet" type="text/css" href="/admin/resources/css/icheck/minimal.css?v='.$rand_v.'" />';
$css_global .= '<link rel="stylesheet" type="text/css" href="/admin/resources/css/icheck/green.css?v='.$rand_v.'" />';
$css_global .= '<link rel="stylesheet" type="text/css" href="/admin/resources/css/template.css?v='.$rand_v.'" />';
$css_global .= '<link type="text/css" rel="stylesheet" href="/plupload/jquery.ui.plupload/css/jquery-ui.min.css" media="screen" />
                <link type="text/css" rel="stylesheet" href="/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css" media="screen" />';

$css_global .= '<link rel="stylesheet" type="text/css" href="/admin/resources/css/bootstrap-datetimepicker.css?v='.$rand_v.'" />';
$js_global = '';

$js_global .= '<script src="/admin/resources/js/jquery-1.10.2.min.js" type="text/javascript"></script>';
$js_global .= '<script src="/themes/js/jquery-ui-1.9.2.custom.min.js" type="text/javascript"></script>';
$js_global .= '<script src="/plupload/plupload.full.min.js" type="text/javascript"></script>';
$js_global .= '<script src="/admin/resources/js/bootstrap.min.js" type="text/javascript"></script>';
$js_global .= '<script src="/admin/resources/js/tinymce/tinymce.min.js" type="text/javascript"></script>';
$js_global .= '<script src="/admin/resources/js/jquery.autocomplete.js" type="text/javascript"></script>';
$js_global .= '<script src="/admin/resources/js/moment-with-locales.js?v='.$rand_v.'" type="text/javascript"></script>';
$js_global .= '<script src="/admin/resources/js/bootstrap-datetimepicker.js?v='.$rand_v.'" type="text/javascript"></script>';
$js_global .= '<script src="/admin/resources/js/script.js?v=1111111111111111" type="text/javascript"></script>';
$js_global .= '<script src="/themes/js/jquery.fancybox.pack.js" type="text/javascript"></script>';
$js_global .= '<script src="/admin/resources/js/icheck/jquery.icheck.js?v=3" type="text/javascript"></script>';
$js_global .= '<script src="/admin/resources/js/icheck/icheck-init.js?v=3" type="text/javascript"></script>';
$js_global .= '<script src="/admin/resources/js/jquery.nicescroll.js?v=3" type="text/javascript"></script>';
$js_global .= '<script src="/admin/resources/js/scripts.js?v='.$rand_v.'" type="text/javascript"></script>';
$load_header = $css_global.$js_global;
$load_header .= '<title>Hệ thống quản lý CMS</title>';
$arr_provinces = array( 1=>'Hà Nội',
                        2=>'Hồ Chí Minh',
                        3=>'Hải Phòng',
                        4=>'Đà Nẵng',
                        5=>'Hà Giang',
                        6=>'Cao Bằng',
                        7=>'Lai Châu',
                        8=>'Lào Cai',
                        9=>'Tuyên Quang',
                        10=>'Lạng Sơn',
                        11=>'Bắc Kạn',
                        12=>'Thái Nguyên',
                        13=>'Yên Bái',
                        14=>'Sơn La',
                        15=>'Phú Thọ',
                        16=>'Vĩnh Phúc',
                        17=>'Quảng Ninh',
                        18=>'Bắc Giang',
                        19=>'Bắc Ninh',
                        20=>'Hải Dương',
                        21=>'Hưng Yên',
                        22=>'Hòa Bình',
                        23=>'Hà Nam',
                        24=>'Nam Định',
                        25=>'Thái Bình',
                        26=>'Ninh Bình',
                        27=>'Thanh Hóa',
                        28=>'Nghệ An',
                        29=>'Hà Tĩnh',
                        30=>'Quảng Bình',
                        31=>'Quảng Trị',
                        32=>'Thừa Thiên Huế',
                        33=>'Quảng Nam',
                        34=>'Quảng Ngãi',
                        35=>'Kontum',
                        36=>'Bình Định',
                        37=>'Gia Lai',
                        38=>'Phú Yên',
                        39=>'Đăk Lăk',
                        40=>'Khánh Hòa',
                        41=>'Lâm Đồng',
                        42=>'Bình Phước',
                        43=>'Bình Dương',
                        44=>'Ninh Thuận',
                        45=>'Tây Ninh',
                        46=>'Bình Thuận',
                        47=>'Đồng Nai',
                        48=>'Long An',
                        49=>'Đồng Tháp',
                        50=>'An Giang',
                        51=>'Bà Rịa - Vũng Tàu',
                        52=>'Tiền Giang',
                        53=>'Kiên Giang',
                        54=>'Cần Thơ',
                        55=>'Bến Tre',
                        56=>'Vĩnh Long',
                        57=>'Trà Vinh',
                        58=>'Sóc Trăng',
                        59=>'Bạc Liêu',
                        60=>'Cà Mau',
                        61=>'Điện Biên',
                        62=>'Đăk Nông',
                        63=>'Hậu Giang'); 
function user_name($user_id){
   $user_name = db_one("SELECT use_name FROM users WHERE use_id=".$user_id);
   if(!$user_name) $user_name = "Admin";
   return $user_name;
}
?>