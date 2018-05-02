<?php
require_once '../../resources/security/security.php';
$module_id	= 30; 
$module_name = 'Giới thiệu công ty';
//check dang nh?p và b?o m?t
checkLogged();
//check quy?n s? d?ng module
checkAccessModule($module_id);
$bg_table = 'aboutus';
$bg_errorMsg = '';
?>