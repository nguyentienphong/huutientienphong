<?
ob_start();
session_start();	
error_reporting(E_ALL);
require_once '../config/config.php';
$type = getValue('type','str','POST','');
$rt = array();
$rt['suc'] = 0;
switch($type){
   case 'langEn':
      setcookie('lang_id', 1, time() + 10800, "/");
      setcookie('lang_id', 1, time() + 10800, "/");            
      $rt['suc'] = 1;
      echo json_encode($rt);
   break;
   case 'langVn':
      setcookie('lang', 'vn', time() + 10800, "/");
      setcookie('lang_id', 0, time() + 10800, "/");
      $rt['suc'] = 1;
      echo json_encode($rt);
   break;
}
?>