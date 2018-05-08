<?php
$metting_event_page = true;
$post = new Metting_event($alias);
$post_detail = $post->result;
foreach($post_detail as $k=>$v) {
   change_language_value($post_detail);
}
?>
<?php
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
<?php
$metting_event = new Metting_event($alias);
$page = @$_GET['page'];
if(!$page) $page = 1;
$metting_event->page = $page;
$metting_event->page_size = 4;
$metting_event_page = true;
$index = new Index();
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<?=$metting_event->Seo()?>

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="/home/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/home/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/home/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="/home/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="/home/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="/home/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/home/css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="/home/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="/home/css/style.css">
    <link rel="stylesheet" href="/home/css/mystyle.css">
	<!-- Modernizr JS -->
	<script src="/home/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		
		<?php include(ROOT.'/home/view/common/vic_header.php');?>
        <?php include(ROOT.'/home/view/home/vih_slider.php');?>
		<div id="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
						<article class="animate-box">
							<div class="blog-img" style="background-image: url(<?=$post_detail['met_image']?>);"></div>
							<div class="desc">
								<div class="meta">
									<p>
										<span><?=getDateTime(($lang_id+1),0,1,1,'',$post_detail['met_date'])?> </span>
										<span>admin </span>
									</p>
								</div>
								<h2><a href="/hoi-nghi-va-su-kien/<?=$post_detail['met_alias']?>.html"><?=$post_detail['met_title']?></a></h2>
								<p><?=$post_detail['met_detail']?></p>
							</div>
						</article>
                        
					</div>

					<div class="col-md-4 col-md-pull-7">
						
						<div class="aside animate-box">
							<h3><?=$language[$lang_id]['tinhot']?></h3>
                            <?
                                $metting_event_hot = $metting_event->news_hot();
                                foreach($metting_event_hot as $k=>$v) {
                                    change_language_value($metting_event_hot[$k]);
                                }
                                $i=0;
                                foreach($metting_event_hot as $row) {
                                 $i++;
                            ?>   
							<div class="blog-entry-side">
								<a href="/hoi-nghi-va-su-kien/<?=$row['met_alias']?>.html" class="blog-post">
									<span class="img" style="background-image: url(<?=get_image_size($row['met_image'],'medium_')?>);"></span>
									<div class="desc">
										<span class="date"><?=getDateTime(($lang_id+1),1,1,1,'',$row['met_date'])?></span>
										<h3><?=$row['met_title']?></h3>
									</div>
								</a>
							</div>
                            <? } ?>     
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php include(ROOT.'/home/view/common/vic_footer.php');?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="/home/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/home/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/home/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/home/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="/home/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="/home/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="/home/js/jquery.magnific-popup.min.js"></script>
	<script src="/home/js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="/home/js/bootstrap-datepicker.js"></script>
	<!-- Main -->
	<script src="/home/js/main.js"></script>

	</body>
</html>

