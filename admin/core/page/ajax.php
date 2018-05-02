<?php
require_once 'inc_security.php';
$action = getValue('action','str','POST','');
switch($action){
    case 'alias':
        $title = getValue('title','str','POST','');
        echo removeTitle($title);
    break;
}
?>