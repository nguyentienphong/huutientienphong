<?php
$index = new Index();
$general_array = array();
$general_cache = ROOT.'/cache/seo.cache';
$general_array = json_decode(file_get_contents($general_cache),1);
$home_page = true;
?>
<!DOCTYPE html>
<html lang="en" class="index">
<head>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta content="vi" http-equiv="content-language"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?=$general_array['seo_title']?></title>
    <meta content="<?=$general_array['seo_keyword']?>" name="keywords"/>
    <meta content="<?=$general_array['seo_description']?>" name="description"/>	

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="/home/js/main.js"></script>
        <script src="/home/js/jquery.flexslider-min.js"></script>
        
        
        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/home/js/bootstrap.min.js"></script>    
</head>
    <body>
        <?php include(ROOT.'/home/view/common/vic_header.php');?>
        <?php include(ROOT.'/home/view/home/vih_slider.php');?>
        <script>
            $(document).ready(function () {
                $('.flexslider').flexslider({
                });
        
            });
        </script>
        <section id="main-content">
            <div class="container">
                <?php include(ROOT.'/home/view/home/vih_services.php');?>
            </div>
        </section>
        <section id="news">
            <div class="container">
                <?php include(ROOT.'/home/view/home/vih_news.php');?>
            </div>
        </section>
        
        <section id="recruitment">
            <div class="container">
                <?php include(ROOT.'/home/view/home/vih_recruitment.php');?>
            </div>
        </section>
        <?php include(ROOT.'/home/view/common/vic_footer.php');?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        
    </body>
</html>
