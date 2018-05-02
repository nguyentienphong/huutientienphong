<?php
$news_page = true;
$post = new Post($alias);
$post_detail = $post->result;
foreach($post_detail as $k=>$v) {
   change_language_value($post_detail);
}
?>
<?php
$news = new News($alias);
$array_month = array(0=>array('01'=>'Tháng một',
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
                    '12'=>'Tháng mười hai'),
                    1=>array('01'=>'January',
                    '02'=>'February',
                    '03'=>'March',
                    '04'=>'April',
                    '05'=>'May',
                    '06'=>'June',
                    '07'=>'July',
                    '08'=>'August',
                    '09'=>'September',
                    '10'=>'October',
                    '11'=>'November',
                    '12'=>'December'));
?>
<!DOCTYPE html>
<html lang="en" class="news_detail not-opacity">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?=$news->Seo()?>

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
        <? include("social_plugins/facebook.php");?>
        <?php include('view/common/vic_header.php');?>
        <section id="breadcrumb-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="/"><?=$language[$lang_id]['trangchu']?></a></li>
                    <li><a href="/tin-tuc/"><?=$language[$lang_id]['tintuc']?></a></li>
                    <li class="active"><?=$post_detail['pos_title']?></li>
                </ol>
            </div>
        </section>

        <section id="main-content">
            <div class="container">
                <div  class="col-md-8 clearfix">
                    <div class="page-news-detail" style="display:inline-block;width: 100%;">
                        <div class="news-detail-image">
                            <?if($post_detail['pos_image_cover']){ ?><img src="<?=$post_detail['pos_image_cover']?>"/><?}?>
                        </div>
                        <div class="news-detail-date text-right pull-left">
                           <span> <?=date('d',$post_detail['pos_date'])?></span><br/>
                            <span><?=$array_month[$lang_id][date('m',$post_detail['pos_date'])]?></span><br/>
                            <span><?=date('Y',$post_detail['pos_date'])?></span>
                        </div>
                        <div class="news-detail-description pull-left">
                            <div class="news-detail-title font_OpenSansBold">
                                <?=$post_detail['pos_title']?>
                            </div>
                            <div class="content" style="display:inline-block;width: 100%;">
                               <?=$post_detail['pos_detail']?>
                            </div>
                            <div style=" padding: 10px 10px;border: 1px solid #E1E1E1;width:100%;margin-bottom: 20px;" ><div class="fb-like" data-href="<?=DOMAIN.$_SERVER['REQUEST_URI']?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div></div>
                            
                            
                            <?php include('view/news/vin_relate.php');?>
                            
                        </div>
                    </div>
        
                </div>
        
                <?php include('view/news/vin_hot.php');?>
        
            </div>
        
        </section>
        <?php include('view/common/vic_footer.php');?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="/home/js/jquery.flexslider-min.js"></script>
        <script src="/home/js/main.js"></script>
        
        <script>
        
            $(document).ready(function () {
                $('.flexslider').flexslider({
                    animation: "slide"
                });
        
            });
        </script>
        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/home/js/bootstrap.min.js"></script>
        
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=896784770339063&version=v2.3";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    </body>
</html>