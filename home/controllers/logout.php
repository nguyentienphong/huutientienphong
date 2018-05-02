<?
$lang_id	=	1;

require_once("config.php");

$myuser 	= new user();
$myuser->logout();
redirect("/");
//print_r($_COOKIE);
?>