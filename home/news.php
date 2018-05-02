<?php
$news = new News($alias);
$page = @$_GET['page'];
if(!$page) $page = 1;
$news->page = $page;
$news->page_size = 4;
$news_page = true;
?>
<!DOCTYPE html>
<html lang="en" class="news_category not-opacity">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tin tức - VNPT EPAY JSC</title>

    <!-- Bootstrap -->
    <link href="/home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/home/css/flexslider.css" rel="stylesheet">
    <link href="/home/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.2/respond.min.js"></script>

    <![endif]-->
</head>
    <body>
        <?php include('view/common/vic_header.php');?>
        <section id="breadcrumb-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="/"><?=$language[$lang_id]['trangchu']?></a></li>
                    <li class="active"><?=$language[$lang_id]['tintuc']?></li>
                </ol>
            </div>
        </section>
        <section id="main-content">
            <div class="container">
                <?php include('view/news/vin_new.php');?>
                <?php include('view/news/vin_hot.php');?>
            </div>
        </section>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="/home/js/main.js"></script>
        <script src="/home/js/jquery.flexslider-min.js"></script>
        
        <script>
            $(document).ready(function () {
                $('.flexslider').flexslider({
                    animation: "slide"
                });
        
            });
        </script>
        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/home/js/bootstrap.min.js"></script>
    </body>
</html>