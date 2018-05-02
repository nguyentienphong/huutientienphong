<?
var_dump($alias);
   $services_page = true;
   $services = new Services($alias);
?>
<!DOCTYPE html>
<html lang="en" class="product not-opacity">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dịch vụ - VNPT EPAY JSC</title>

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
<section id='submenu_wrapper' style="top: 99px;">
    <div class="container">
        <ul class="nav nav navbar-nav">
            <?
                $i=0;
                foreach($services_cat as $row) {
                 $i++;
            ?>
            <li> <a href="javascript:;" block="<?=$row['cat_alias']?>" class="text-uppercase  <?=(@$alias ==$row['cat_alias']) ? 'active':''?>"><?=$row['cat_name']?></a> </li>
            <? } ?>
        </ul>
    </div>
</section>
<section id="slider">
    <div class="container-full">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <img src="/home/image/product_slider<?=($lang_id == 0) ? '':'_en'?>.jpg" alt=""/>
                </li>
            </ul>
        </div>
    </div>
</section>

<section id="main-content">
    <div class="container">
        <div id="product-page" class="row">
            <?
              $i=0;
              $cat_service = $general->services_cat();
              foreach($cat_service as $k=>$v) {
                 change_language_value($cat_service[$k]);
              }
              foreach($cat_service as $row) {
                 $i++;
                 $services_list_cat = $services->services_list_cat($row['cat_id']);
                 foreach($services_list_cat as $k=>$v) {
                     change_language_value($services_list_cat[$k]);
                }
                if($i<=3){
            ?>
                <div class="product-payment text-center product-block <?=$row['cat_alias']?>">
                    <h2 class="view-title text-uppercase"><?=$row['cat_name']?></h2>
    
                    <p class="text-uppercase"><?=$row['cat_description']?></p>
    
                    <div class="divide-block"></div>
    
                    <div class="row">
                        <?foreach($services_list_cat as $row1) {?>
                        <div class="col-md-<?=(count($services_list_cat)==2) ? 6 : 4?> col-sm-4 col-xs-4 block-border">
                            <div class="block-image">
                                <a href="/dich-vu/<?=$row1['ser_alias']?>.html">
                                    <img src="<?=$row1['ser_image']?>"> 
                                </a>
                            </div>
                            <a href="/dich-vu/<?=$row1['ser_alias']?>.html" class="font_OpenSansBold title text-uppercase"><?=$row1['ser_title']?></a>
    
                        </div>
                        <? } ?>
                    </div>
                </div>
                <? }else{?>
                    <div class="product-payment text-center product-block <?=$row['cat_alias']?>">
                        <h2 class="view-title text-uppercase"><?=$row['cat_name']?></h2>
        
                        <p class="text-uppercase"><?=$row['cat_description']?></p>
        
                        <div class="divide-block"></div>
        
                        <div class="row">
                            <?
                            $af = array();
                            foreach($services_list_cat as $row1) {
                                $af[] = $row1['ser_alias'];
                                ?>
                                
                            <a href="/dich-vu/<?=$af[0]?>.html">
                                <img src="<?=$row1['ser_image']?>"/> 
                            </a>
                            <? } ?>
                        </div>
                    </div>
                <?}?>
            <? } ?>
        </div>
    </div>

</section>
<?php include('view/common/vic_footer.php');?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/home/js/main.js"></script>
<script src="/home/js/jquery.flexslider-min.js"></script>
<?if($alias != 'dich-vu'){?>
<script>
    $('html, body').animate({
        scrollTop: $(".<?=$alias?>").offset().top
    }, 200);
</script>
<?}?>
<script>
    $('.navbar-nav a').click(function(){
        block = $(this).attr('block');
        $('.navbar-nav a').removeClass('active');
        $(this).addClass('active');
        $('html, body').animate({
        scrollTop: $("."+block).offset().top
    }, 300);})
</script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/home/js/bootstrap.min.js"></script>
</body>
</html>