<?
require_once '../home/config.php';
require_once '../api_pavietnam/api_config.php';
$whois = getValue('whois','str','POST','');
$domain 	= trim($whois);
$array_return = array();
$result 	= file_get_contents(API_URL."?cmd=get_whois&apikey=".API_KEY."&username=".USERNAME."&domain=".$domain);
$array_return['whois'] = $result;
die(json_encode($array_return));
?>