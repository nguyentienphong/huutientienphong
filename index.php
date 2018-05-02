<?php
session_start();
ob_start();
$time = microtime(true);
$lang_id = 0;
$url = $_SERVER['REQUEST_URI'];
   if(preg_match('/\?lang=en/',$url)){
      setcookie('lang_id', 1, time() + 10800, "/");
      $_COOKIE['lang_id'] = 1;
      $lang_id = 1;
   }
   if(preg_match('/\?lang=vn/',$url)){
      setcookie('lang_id', 0, time() + 10800, "/");
      $_COOKIE['lang_id'] = 0;
      $lang_id = 0;
   }
if(isset($_COOKIE['lang_id'])) $lang_id = $_COOKIE['lang_id'];
require 'home/config.php';
$rewrite = new Rewrite();
$file = $_GET['file'];
$alias = $_GET["alias"];
require "home/$file.php";
?>