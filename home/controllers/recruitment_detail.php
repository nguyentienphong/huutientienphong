<?php
    $recruitment = new Recruitment($alias);
    $recruitment_detail = $recruitment->result;
    if(!$recruitment_detail) redirect('/');
    foreach($recruitment_detail as $k=>$v) {
        change_language_value($recruitment_detail);
    }
        $news = new News($alias);
    $recruitment_page = true;
    $index = new Index();
?>
<!DOCTYPE html>
<html lang="en" class="recruitment recruitment_detail not-opacity">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?=$recruitment->Seo()?>

   <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content="http://vienduongcatba.com/home/images/logo.png"/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="http://vienduongcatba.com/home/images/logo.png" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
    <link rel="icon" href="../../../favicon.ico">

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
							<div class="desc">
								<div class="meta">
									<p>
										<span><?=getDateTime(($lang_id+1),0,1,1,'',$recruitment_detail['rec_date'])?> </span>
										<span>admin </span>
									</p>
								</div>
								<h2><a href="/tuyen-dung/<?=$recruitment_detail['rec_alias']?>.html"><?=$recruitment_detail['rec_title']?></a></h2>
								<p><?=$recruitment_detail['rec_detail']?></p>
							</div>
						</article>
                        
					</div>

					<div class="col-md-4 col-md-pull-7">
						
						<div class="aside animate-box">
							<h3><?=$language[$lang_id]['tinhot']?></h3>
                            <?
                                $news_hot = $news->news_hot();
                                foreach($news_hot as $k=>$v) {
                                    change_language_value($news_hot[$k]);
                                }
                                $i=0;
                                foreach($news_hot as $row) {
                                 $i++;
                            ?>   
							<div class="blog-entry-side">
								<a href="/tin-tuc/<?=$row['pos_alias']?>.html" class="blog-post">
									<span class="img" style="background-image: url(<?=get_image_size($row['pos_image'],'medium_')?>);"></span>
									<div class="desc">
										<span class="date"><?=getDateTime(($lang_id+1),1,1,1,'',$row['pos_date'])?></span>
										<h3><?=$row['pos_title']?></h3>
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