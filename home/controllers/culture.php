<?
   $culture_page = true;
   $culture = new Culture();
?>
<!DOCTYPE html>
<html lang="en" class="introduction_culture not-opacity">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Văn hóa doanh nghiệp - VNPT EPAY JSC</title>

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
<?php include('view/common/vic_submenu.php');?>
<section id="slider">
    <div class="container-full">
        <div class="flexslider">
            <ul class="slides">
                <?
                  $i=0;
                  $slides = $culture->slides();
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
        <div id="view-intro-culutre">
            <div class="view-header text-center">
                <h2 class="view-title text-uppercase"><?=$language[$lang_id]['vanhoadoanhnghiep']?></h2>

                <div class="divide-block"></div>
            </div>
            <div class="content">
                <?
                  $i=0;
                  $culture_list = $culture->culture_list();
                  foreach($culture_list as $k=>$v) {
                     change_language_value($culture_list[$k]);
                  }
                  foreach($culture_list as $row) {
                     $i++;
                     if($i%2==1){
                ?>
                    <div class="row block-culture-<?=$i?>">
                        <div class="col-md-5 col-sm-5 view-image">
                            <img src="<?=$row['cul_image']?>" alt="">
                        </div>
                        <div class="col-md-7 col-sm-7">
                            <p class="btn view-culture-title  text-uppercase font_OpenSansBold"><?=$row['cul_title']?></p>
                            <?=$row['cul_detail']?>
                        </div>
                    </div>
                <? }
                    if($i%2==0){
                ?>
                    <div class="row block-culture-<?=$i?>">

                        <div class="col-md-7 col-sm-7">
                            <p class="btn view-culture-title  text-uppercase font_OpenSansBold"><?=$row['cul_title']?></p>
                            <?=$row['cul_detail']?>
                        </div>
    
                        <div class="col-md-5 col-sm-5 view-image">
                            <img src="<?=$row['cul_image']?>" alt="">
                        </div>
                    </div>
                <?
                    }
                } ?>
            </div>

        </div>

</section>
<?php include('view/common/vic_footer.php');?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/home/js/main.js"></script>
<script src="/home/js/jquery.flexslider-min.js"></script>

<script>
    $(document).ready(function () {
        $('.flexslider').flexslider({
        });

    });
</script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/home/js/bootstrap.min.js"></script>
</body>
</html>