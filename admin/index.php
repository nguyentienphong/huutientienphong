<?php
session_start();
error_reporting(E_ALL);
require_once("../functions/functions.php");
require_once('../config/config_db.php');
require_once("../classes/database.php");
require_once("resources/security/functions.php");
require_once("resources/security/functions_1.php");
checkLogged('login.php');
$isAdmin = getValue('isAdmin','int','SESSION',0);
?>
<!DOCTYPE html>
<!-- saved from url=(0031)http://adminex.themebucket.net/ -->
<html lang="en" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" style="overflow: hidden;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Quản trị website Vienduongcatba.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <link rel="shortcut icon" href="#" type="image/png">

  <!--common-->
  <link href="resources/css/style.css" rel="stylesheet">
  <link href="resources/css/style-responsive.css" rel="stylesheet">
  <link href="resources/css/common.css" rel="stylesheet">
  
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
   <style>
   #main_frame{
      border: none;
      z-index: 1;
   }
   </style>
</head>

<body class="sticky-header" style="" cz-shortcut-listen="true">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side" id="home_left" tabindex="5000" style="overflow: hidden; outline: none;">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="/admin/index.php"><img src="/home/img/logo.png" alt="" style="height: 50px;;margin: 0 auto;"></a>
        </div>

        <div class="logo-icon text-center">
            <a href="/admin/index.php"><img src="resources/img/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
               <li>
                  <a href="/admin/index.php"><i class="fa fa-tachometer font-size14"></i><span>Bảng điều khiển</span></a>
               </li>
               <?php include 'resources/php/inc_left.php';?>
            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
    
    <!-- main content start-->
   <div  class='rlt' id="home_right">
      <div class="header-section">
         <a class="toggle-btn" id="wrapper-fullscreen"><i class="fa fa-bars" id="ft_icon_fscr"></i></a>
         <?php include 'resources/php/inc_header.php'?>
         <span class="abs" id="viewHomePage" title="Xem trang chủ"><a href="/" target="_blank"><i class="fa fa-home icon-green font-size17"></i></a></span>
         <span class="abs" id="viewBackPage" title="Xem trang trước" onclick="window.history.back()"><i class="fa fa-arrow-circle-left icon-green font-size17"></i></span>
         <span class="abs" id="reloadFrame" title="Nạp lại khung"><i class="fa fa-refresh icon-green font-size17"></i></span>
         <a href="/huongdansudung.docx" style="float: left;margin: 14px 190px;"> Click đây để download tài liệu hướng dẫn sử dụng CMS</a>
      </div>
      
      <iframe src="intro.php" id="main_frame" class='main-content'>
            
      </iframe>
   </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="resources/js/jquery-1.10.2.min.js"></script>
<script src="resources/js/home.js" type="text/javascript"></script>
<script src="resources/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="resources/js/jquery-migrate-1.2.1.min.js"></script>
<script src="resources/js/bootstrap.min.js"></script>
<script src="resources/js/modernizr.min.js"></script>
<script src="resources/js/jquery.nicescroll.js"></script>


<!--common scripts for all pages-->
<script src="resources/js/scripts.js?v=2"></script>
<script>
$(document).ready(function(){
    var width_left = $('#home_left').width();
    var widthW = $(window).width();
    var heightW = $(window).height();
    $('#home_left').height(heightW - 55);
    $('#main_frame').width(widthW - width_left );
    $('#main_frame').height(heightW - 16);
});
$(window).resize(function(){
    var width_left = $('#home_left').width();
    var widthW = $(window).width();
    var heightW = $(window).height();
    $('#home_left').height(heightW - 55);
    $('#main_frame').width(widthW - width_left +1);
    $('#main_frame').height(heightW - 16);
})
</script>

<script>
wFrameFull = $(window).width();
$('#wrapper-fullscreen').click(function(){
    if($('#ft_icon_fscr').hasClass('icon-resize-small')){
        $('#ft_icon_fscr').removeClass('icon-resize-small').addClass('icon-resize-full');
        $('#main_frame').animate({
            width:wFrameFull - 240
        },100);
    }else{
        $('#ft_icon_fscr').removeClass('icon-resize-full').addClass('icon-resize-small');
        $('#main_frame').animate({
            width:wFrameFull - 51
        },100);
    }
})
/*$('#main_frame').load(function(){//Đưa thanh cuộn về top khi load iframe
        $(this).show();
        var nice = $("html").getNiceScroll()[0];
        nice.setScrollTop(0); 
    });*/
</script>

</body></html>