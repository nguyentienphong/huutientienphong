<?
   $services_page = true;
   $services = new Services($alias);
   var_dump($alias);
   $services_detail = $services->result;
   if($services_detail){
   foreach($services_detail as $k=>$v) {
       change_language_value($services_detail);
    }}
?>
<!DOCTYPE html>
<html lang="en" class="product  product-detail  not-opacity">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?=$services->Seo()?>

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
        <div class="col-md-4 col-sm-4">
            <!--
            <div id="menu-service">

                <div class="menu-title font_OpenSansBold">Dịch vụ</div>
                <div id="menu-content">
                    <ul class="ul_lv1">
                        <li class="li_lv1 li_lv1_click"><a  href="#">Dịch vụ thanh toán<i class="glyphicon glyphicon-chevron-right"></i></a>
                            <ul class="ul_lv2">
                                <li class="li_lv2 li_lv2_click">
                                    <a title="" href="#" class="a_lv2 a_link">
                                        Test submeu1</a>
                                </li>
                                <li class="li_lv1_back"><a href="javascript: void(0)" class="a_back">
                                    <?=$language[$lang_id]['quaylai']?><i class="glyphicon glyphicon-arrow-left"></i></a></li>
                            </ul>
                        </li>
                        <li class="li_lv1 li_lv1_click"><a href="#">Dịch vụ Topup</a></li>
                        <li class="li_lv1 li_lv1_click"><a href="#">Ví điện tử</a></li>
                        <li class="li_lv1 li_lv1_click"><a href="#">Megacard</a></li>
                    </ul>
                </div>
                -->
            <div id="sidebar_cat">
                <div class="sb_title"><?=$language[$lang_id]['dichvu']?></div>
                <div id="sb_content" class="sb_content">
                    <ul class="ul_lv1">
                        <?
                            $i=0;
                            foreach($services_cat as $row) {
                            $i++;
                            $services_list_cat = $services->services_list_cat($row['cat_id']);
                            foreach($services_list_cat as $k=>$v) {
                                 change_language_value($services_list_cat[$k]);
                            }
                            if($i<=3){
                        ?>
                                <li class="li_lv1 li_lv1_click">
                                    <a title="<?=$row['cat_name']?>" href="javascript:;" class="a_lv1">
                                        <?=$row['cat_name']?><i class="glyphicon glyphicon-chevron-right"></i>
                                    </a>
                                    <ul class="ul_lv2">
                                        <?foreach($services_list_cat as $row1) {?>
                                            <li class="li_lv2 li_lv2_click">
                                                <a href="/dich-vu/<?=$row1['ser_alias']?>.html" class="a_lv2 a_link"><?=$row1['ser_title']?></a>
                                            </li>
                                        <? } ?>
                                            <li class="li_lv1_back">
                                                <a href="javascript: void(0)" class="a_back"><?=$language[$lang_id]['quaylai']?><i class="glyphicon glyphicon-arrow-left"></i></a>
                                            </li>
                                    </ul>
                                </li>
                        <? }else{?>
                                <li class="li_lv2 li_lv2_click">
                                    <a title="<?=$row['cat_name']?>" href="/dich-vu/the-megacard.html" class="a_lv2 a_link">
                                        <?=$row['cat_name']?>
                                    </a>
                                </li>
                        <?}} ?>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>

            <!--<div id="block-adv">
                <a href="#"><img src="/home/image/adver.jpg" alt=""></a>
            </div>-->
        </div>
        <div class="product-detail-content col-sm-8 col-md-8">
            <h3 class="product-detail-title text-uppercase OpenSansExtraBold"><?=$services_detail['ser_title']?></h3>
            <?=$services_detail['ser_detail']?>
        </div>
    </div>

</section>
<?php include('view/common/vic_footer.php');?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/home/js/main.js"></script>
<script src="/home/js/jquery.flexslider-min.js"></script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/home/js/bootstrap.min.js"></script>
<script>
    var sidebarCat = {
        menuDomEle: $("#sidebar_cat"),
        menuContentDomEle: $("#sb_content"),
        menuUl2DomEle: $("#sb_content").find(".ul_lv2"),
        menuUl3DomEle: $("#sb_content").find(".ul_lv3"),
        menuUlActive: $("#sb_content").find("ul.active"),
        linkDomEle: $("#sb_content").find(".a_link")
    }
    $(function () {
// Di chuyen toi level 2
        $(document).on("click", ".li_lv1_click", function () {
            var $this = $(this);
            var $this_ul2 = $this.find(".ul_lv2");
            var left = -(parseInt(sidebarCat.menuDomEle.width()));
            var menu_txt = $this.find(".a_lv1").text();
            sidebarCat.menuUl2DomEle.hide();
            $this_ul2.show();
            sidebarCat.menuContentDomEle.animate({left: left}, 400);
            sidebarCat.menuContentDomEle.height($this_ul2.height());

            return false;
        });
// Di chuyen toi level 3
        $(document).on("click", ".li_lv2_click", function () {
            var $this = $(this);
            var $this_ul3 = $this.find(".ul_lv3");
            var left = -(parseInt(sidebarCat.menuDomEle.width())) * 2;
            var menu_txt = $this.find(".a_lv2").text();
            sidebarCat.menuUl3DomEle.hide();
            $this_ul3.show();
            sidebarCat.menuContentDomEle.animate({left: left}, 400);
            sidebarCat.menuContentDomEle.height($this_ul3.height());

            return false;
        });
// Tro lai level 1
        $(document).on("click", ".li_lv1_back", function () {
            var $this = $(this);
            var $this_ul1 = $this.parents('.ul_lv1');
            var left = 0;
            sidebarCat.menuContentDomEle.animate({left: left}, 400);
            sidebarCat.menuContentDomEle.height($this_ul1.height());

            return false;
        });
// Tro lai level 2
        $(document).on("click", ".li_lv2_back", function () {
            var $this = $(this);
            var $this_ul2 = $this.parents('.ul_lv2');
            var left = -(parseInt(sidebarCat.menuDomEle.width()));
            sidebarCat.menuContentDomEle.animate({left: left}, 400);
            sidebarCat.menuContentDomEle.height($("#sb_content").find(".ul_lv2.active").height());

            return false;
        });
// Neu co link thi chuyen huong theo link
        sidebarCat.linkDomEle.click(function () {
            window.location.href = $(this).attr("href");
            return false;
        });
    // Giu lai trang thai menu tuong ung voi bai viet hien tai
var left = -(parseInt(sidebarCat.menuDomEle.width())) * 1;
sidebarCat.menuUlActive.show();
   sidebarCat.menuContentDomEle.height(sidebarCat.menuUlActive.last().height());
//sidebarCat.menuContentDomEle.css({left : left});

    });
</script>
</body>
</html>