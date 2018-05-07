<?=$google_analytics?>
<nav class="colorlib-nav" role="navigation">
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<p class="site">vienduongcatba.com</p>
						</div>
						<div class="col-xs-8 text-right">
							<p class="num"><?php echo $language[$lang_id]['dienthoai']?>: +01-123-456</p>
							<ul class="colorlib-social">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
                            <ul class="colorlib-social">
							     <li><a href="javascript:langKo()" class="<?=($lang_id==2) ? 'lang_active':''?>"><img src="/home/images/ko-icon.png" style="width: 30px;height:30px"/></a></li>	
								<li><a href="javascript:langEn()" class="<?=($lang_id==1) ? 'lang_active':''?>"><img src="/home/images/en-icon.png" style="width: 30px;height:30px"/></a></li>
								
                                <li><a href="javascript:langVn()" class="<?=($lang_id==0) ? 'lang_active':''?>"><img src="/home/images/vi-icon.png" style="width: 30px;height:30px"/></a></li>
							</ul>
						</div>
                        <div class="col-xs-8 text-right">
                            
                        </div>
					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="/">Vienduongcatba</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="active"><a href="/"><?php echo $language[$lang_id]['trangchu']?></a></li>
								<li class="has-dropdown">
									<a href="/phong/"><?php echo $language[$lang_id]['phong']?></a>
									<ul class="dropdown">
										<li><a href="#">Web Design</a></li>
										<li><a href="#">eCommerce</a></li>
										<li><a href="#">Branding</a></li>
										<li><a href="#">API</a></li>
									</ul>
								</li>
								<li><a href="/nha-hang/"><?php echo $language[$lang_id]['nhahang']?></a></li>
								<li><a href="/hoi-nghi-va-su-kien/"><?php echo $language[$lang_id]['hoinghivasukien']?></a></li>
								<li><a href="/tin-tuc/"><?php echo $language[$lang_id]['tintuc']?></a></li>
								<li><a href="/gioi-thieu/"><?php echo $language[$lang_id]['gioithieu']?></a></li>
								<li><a href="/lien-he/"><?php echo $language[$lang_id]['lienhe']?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>