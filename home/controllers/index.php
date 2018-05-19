<?php
$index = new Index();
$general_array = array();
$general_cache = ROOT.'/cache/seo.cache';
$general_array = json_decode(file_get_contents($general_cache),1);
$home_page = true;
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$general_array['seo_title']?></title>
    <meta content="<?=$general_array['seo_keyword']?>" name="keywords"/>
    <meta content="<?=$general_array['seo_description']?>" name="description"/>	
    <meta name="robots" content="index,follow" />
  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content="<?=$general_array['seo_title']?>"/>
	<meta property="og:image" content="http://vienduongcatba.com/home/images/logo.png"/>
	<meta property="og:url" content="http://vienduongcatba.com/"/>
    <meta property="og:type" content="website" />
	<meta property="og:site_name" content="Viễn dương cát bà"/>
	<meta property="og:description" content="<?=$general_array['seo_description']?>"/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="http://vienduongcatba.com/home/images/logo.png" />
	<meta name="twitter:url" content="http://vienduongcatba.com/" />
	<meta name="twitter:card" content="" />
    <link rel="icon" href="../../../favicon.ico?v=1">

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
	<link rel="stylesheet" href="/home/css/bootstrap-datepicker.css">
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
		<?php include(ROOT.'/home/view/home/vih_book_room.php');?>
        <?php include(ROOT.'/home/view/home/vih_services.php');?>
		

		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2><?php echo $language[$lang_id]['phong']?></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="owl-carousel owl-carousel2">
                            <?php include(ROOT.'/home/view/room/vir_listing.php');?>
							
						</div>
					</div>
					<div class="col-md-12 text-center animate-box">
						<a href="#"><?php echo $language[$lang_id]['xemtatca']?><i class="icon-arrow-right3"></i></a>
					</div>
				</div>
			</div>
		</div>

        <?php //include(ROOT.'/home/view/home/vih_restaurant.php');?>
		
        <?php include(ROOT.'/home/view/home/vih_news.php');?>
		

		<?php include(ROOT.'/home/view/home/vih_feedback.php');?>


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
	<!-- cookie -->
	<script src="/home/js/jquery.cookie.js"></script>
	<!-- Main -->
	<script src="/home/js/main.js"></script>

	</body>
<?php if(isset($show_modal) && $show_modal != ""): ?>
	<script>
		$('#<?php echo $show_modal; ?>').modal('show');
	</script>
<?php endif; ?>
</html>

