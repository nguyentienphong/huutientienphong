<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('DOMAIN', 'http://'.$_SERVER['HTTP_HOST']);
define('TEMPLATE_PATH', '/home/');
define('PATH_IMAGE_THEME', '/themes/img/');
define('services_img', '/pictures/services/');
define('cat_img', '/pictures/categories_multi/');
define('news_img', '/pictures/news/');
define('slides_img', '/pictures/slides/');
define('forms_img', '/pictures/forms/');
define('faqs_img', '/pictures/faqs/');
define('page_img', '/pictures/page_static/');
define('partner_img', '/pictures/partner/');
define('noavt', '/pictures/avatar/noavt.png');
define('noimg', '/pictures/no.jpg');
define('FACEBOOK_ADMIN', '100004609203263');
define('FACEBOOK_APP', '707486842630166');
require_once("initsession.php");
require_once(ROOT."/config/config_db.php");
require_once(ROOT."/classes/database.php");
require_once(ROOT."/classes/data_func.php");
require_once(ROOT."/classes/rewrite.php");
require_once(ROOT."/classes/generate_form.php");
require_once(ROOT."/classes/user.php");
require_once(ROOT."/classes/upload.php");
require_once(ROOT.'/classes/generate_form.php');
require_once(ROOT.'/classes/mobile_detect.php');
require_once(ROOT.'/functions/form.php');
require_once(ROOT."/functions/functions.php");
require_once(ROOT."/functions/function_mailer.php");
require_once(ROOT."/functions/phuongdong_functions.php");
require_once(ROOT."/functions/access_function.php");
require_once(ROOT."/functions/form.php");
require_once(ROOT."/functions/rewrite_function.php");
require_once(ROOT."/functions/date_functions.php");
require_once(ROOT."/functions/file_functions.php");
require_once(ROOT."/functions/pagebreak.php");

function _loadMod($router){
    $router = strtolower($router);
    if(file_exists(ROOT.'/home/model/'.$router.'.php'))
        require_once ROOT.'/home/model/'.$router.'.php';
}
function _loadClass($router){
    $router = strtolower($router);
    if(file_exists(ROOT.'/classes/'.$router.'.class.php'))
        require_once ROOT.'/classes/'.$router.'.class.php';
}
spl_autoload_register('_loadMod');
spl_autoload_register('_loadClass');
$general_cache = ROOT.'/cache/general.cache';
if(file_exists($general_cache)){
   $general_info_array = json_decode(file_get_contents($general_cache),1);
}
$general = new General();
$google_analytics = "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87386147-1', 'auto');
  ga('send', 'pageview');

</script>";
$myuser = new user();

$arr_lang = array(0=>'Tiếng Việt',1=>'Tiếng Anh');
require_once(ROOT."/home/lang/lang.php");

//Hàm chuyển giá trị của phần tử tiếng việt của mảng sang phần tử tiếng anh tương ứng ví dụ $arr['title'] = $arr['title_en']
function change_language_value(&$array) {
   if(isset($_COOKIE['lang_id']) && ($_COOKIE['lang_id'] == 1)) {
      foreach($array as $k=>$v) {
         if(isset($array[$k.'_en'])){
            $array[$k] = $array[$k.'_en'];
         }
      }
   }
} 
$array_month = array('01'=>'Tháng một',
                    '02'=>'Tháng hai',
                    '03'=>'Tháng ba',
                    '04'=>'Tháng tư',
                    '05'=>'Tháng năm',
                    '06'=>'Tháng sáu',
                    '07'=>'Tháng bảy',
                    '08'=>'Tháng tám',
                    '09'=>'Tháng chín',
                    '10'=>'Tháng mười',
                    '11'=>'Tháng mười một',
                    '12'=>'Tháng mười hai');
$services_cat = $general->services_cat();
foreach($services_cat as $k=>$v) {
    change_language_value($services_cat[$k]);
}
$aboutus_detail = $general->aboutus();
foreach($aboutus_detail as $k=>$v) {
    change_language_value($aboutus_detail);
}
$office = $general->list_office();
foreach($office as $k=>$v) {
    change_language_value($office[$k]);
}
?>