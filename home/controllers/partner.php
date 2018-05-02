<?
   $partner_page = true;
   $partner = new Partner();
?>
<!DOCTYPE html>
<html lang="en" class="introduction_vision not-opacity">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Đối tác - VNPT EPAY JSC</title>

    <!-- Bootstrap -->
    <link href="/home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/home/css/flexslider.css" rel="stylesheet">
    <link href="/home/css/style.css?v=1" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.2/respond.min.js"></script>

    <![endif]-->
</head>
<body>
<?php include('view/common/vic_header.php');?>
<?php include('view/common/vic_submenu.php');?>
<section id="slider">
    <div class="container-full">
        <div class="flexslider">
            <ul class="slides">
                <?
                  $i=0;
                  $slides = $partner->slides();
                  foreach($slides as $k=>$v) {
                     change_language_value($slides[$k]);
                  }
                  foreach($slides as $row) {
                     $i++;
                ?>
                    <li>
                        <img src="<?=$row['sli_image']?>" alt=""/>
                    </li>
                
               <?}?> 
            </ul>
        </div>
    </div>
</section>

<section id="main-content">
    <div class="container">
        <div id="view-intro-partner">
            <div class="view-header text-center">
                <h2 class="view-title text-uppercase"><?=$language[$lang_id]['doitaccuavnptepay']?></h2>

                <p class="text-uppercase"><?=$language[$lang_id]['gioithieuvedoitac']?></p>

                <div class="divide-block"></div>
            </div>
            <div class="content">
                <?
                  $i=0;
                  $partner_list = $partner->partner_list();
                  foreach($partner_list as $k=>$v) {
                     change_language_value($partner_list[$k]);
                  }
                  foreach($partner_list as $row) {
                     $i++;
                     
                ?>
                    <?if($i%5==1){?>
                        <div class="row">
                    <?}?>
                                <div class="row-partner"><a href="#"><img src="<?=get_image_size($row['par_image'],'medium_')?>"/> </a> </div>
                    <?if($i%5==0){?>
                        </div>
                    <?}?>
                <?}?>
            </div>
        </div>

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
</body>
</html>