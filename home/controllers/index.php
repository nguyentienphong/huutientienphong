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
	<title>Luxehotel Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

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
		<?php include(ROOT.'/home/view/home/vih_book_room.php');?>
        <?php include(ROOT.'/home/view/home/vih_services.php');?>
		

		<div id="colorlib-rooms" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2><?php echo $language[$lang_id]['phong']?></h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
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


		<div id="colorlib-dining-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>Dining &amp; Bar</h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
					<div class="diningbar-flex">
						<div class="half animate-box">
							<ul class="nav nav-tabs text-center" role="tablist">
								<li role="presentation" class="active"><a href="#mains" aria-controls="mains" role="tab" data-toggle="tab">Mains</a></li>
								<li role="presentation"><a href="#desserts" aria-controls="desserts" role="tab" data-toggle="tab">Desserts</a></li>
								<li role="presentation"><a href="#drinks" aria-controls="drinks" role="tab" data-toggle="tab">Drinks</a></li>
							</ul>
			            <!-- Tab panes -->
			            <div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="mains">
									<div class="row">
										<div class="col-md-12">
											<ul class="menu-dish">
							              <li>
							                <figure class="image"><img src="images/menu-1.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$25.99</span>
							                  <h3>Grilled Pork</h3>
							                  <p class="cat">Meat / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-2.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$30.99</span>
							                  <h3>Tuna Roast Source</h3>
							                  <p class="cat">Tuna / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-3.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$40.00</span>
							                  <h3>Roast Beef (4 sticks)</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-4.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$20.50</span>
							                  <h3>Salted Fried Chicken</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							            </ul>
										</div>
									</div>
								</div>

								<div role="tabpanel" class="tab-pane" id="desserts">
									<div class="row">
										<div class="col-md-12">
											<ul class="menu-dish">
							              <li>
							                <figure class="image"><img src="images/menu-1.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$39.90</span>
							                  <h3>Fried Potatoes with Garlic</h3>
							                  <p class="cat">Viggies / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-3.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$20.99</span>
							                  <h3>Tuna Roast Source</h3>
							                  <p class="cat">Tuna / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-3.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$50.00</span>
							                  <h3>Roast Beef (4 sticks)</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-4.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$29.00</span>
							                  <h3>Salted Fried Chicken</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							            </ul>
										</div>
									</div>
								</div>

								<div role="tabpanel" class="tab-pane" id="drinks">
									<div class="row">
										<div class="col-md-12">
											<ul class="menu-dish">
							              <li>
							                <figure class="image"><img src="images/menu-8.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$25.00</span>
							                  <h3>Fried Potatoes with Garlic</h3>
							                  <p class="cat">Viggies / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-9.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$20.50</span>
							                  <h3>Tuna Roast Source</h3>
							                  <p class="cat">Tuna / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-3.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$30.00</span>
							                  <h3>Roast Beef (4 sticks)</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							              <li>
							                <figure class="image"><img src="images/menu-4.jpg" alt="Free Bootstrap Template by colorlib.com"></figure>
							                <div class="text">
							                  <span class="price">$29.99</span>
							                  <h3>Salted Fried Chicken</h3>
							                  <p class="cat">Crab / Potatoes / Rice</p>
							                </div>
							              </li>
							            </ul>
										</div>
									</div>
								</div>
			            </div>
			         </div><!-- end half -->
			         <div class="half diningbar-img" style="background-image: url(images/cover_img_1.jpg);"></div><!-- end half -->
			      </div>
			   </div>
	      </div>
		</div>

		<div id="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>Recent Blog</h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="blog-flex">
					<div class="video colorlib-video" style="background-image: url(images/blog-3.jpg);">
						<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video"></i></a>
						<div class="overlay"></div>
					</div>
					<div class="blog-entry">
						<div class="row">
							<div class="col-md-12 animate-box">
								<a href="blog.html" class="blog-post">
									<span class="img" style="background-image: url(images/blog-1.jpg);"></span>
									<div class="desc">
										<span class="date">January 14, 2018</span>
										<h3>A Definitive Guide to the Best Dining</h3>
										<span class="cat">Activities</span>
									</div>
								</a>
							</div>
							<div class="col-md-12 animate-box">
								<a href="blog.html" class="blog-post">
									<span class="img" style="background-image: url(images/blog-2.jpg);"></span>
									<div class="desc">
										<span class="date">January 14, 2018</span>
										<h3>How These 5 People Found The Path to Their Dream Trip</h3>
										<span class="cat">Activities</span>
									</div>
								</a>
							</div>
							<div class="col-md-12 animate-box">
								<a href="blog.html" class="blog-post">
									<span class="img" style="background-image: url(images/blog-3.jpg);"></span>
									<div class="desc">
										<span class="date">January 14, 2018</span>
										<h3>Our Secret Island Boat Tour Is just for You</h3>
										<span class="cat">Activities</span>
									</div>
								</a>
							</div>
							<div class="col-md-12 animate-box text-right">
								<a href="#">View all blog post <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="colorlib-testimony" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>Our Satisfied Guests says</h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
				<div class="col-md-4 animate-box">
					<div class="testimony text-center">
						<span class="img-user" style="background-image: url(images/person2.jpg);"></span>
						<span class="user">Brian Doe</span>
						<small>Satisfied Customer</small>
						<blockquote>
							<p></i> Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</blockquote>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="testimony text-center">
						<span class="img-user" style="background-image: url(images/person1.jpg);"></span>
						<span class="user">Nathalie Miller</span>
						<small>Satisfied Customer</small>
						<blockquote>
							<p></i> Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</blockquote>
					</div>
				</div>
				<div class="col-md-4 animate-box">
					<div class="testimony text-center">
						<span class="img-user" style="background-image: url(images/person3.jpg);"></span>
						<span class="user">Shara Jones</span>
						<small>Satisfied Customer</small>
						<blockquote>
							<p></i> Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
						</blockquote>
					</div>
				</div>
			</div>
			</div>
		</div>

	
		<!--<div id="colorlib-subscribe" style="background-image: url(images/img_bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>Sign Up for a Newsletter</h2>
						<p>Get A 50% Discounts in every Rooms, Book now!</p>
						<form class="form-inline qbstp-header-subscribe">
							<div class="row">
								<div class="col-md-12 col-md-offset-0">
									<div class="form-group">
										<input type="text" class="form-control" id="email" placeholder="Enter your email">
										<button type="submit" class="btn btn-primary">Subscribe</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>-->
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

