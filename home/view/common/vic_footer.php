<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>Viễn Dương Cát Bà</h4>
						<p><?=$aboutus_detail['abu_summary']?></p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-3 colorlib-widget">
						<h4><?php echo $language[$lang_id]['lienket']?></h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="/phong/"><?php echo $language[$lang_id]['phong']?></a></li>
								<li><a href="/nha-hang/"><?php echo $language[$lang_id]['nhahang']?></a></li>
								<li><a href="/hoi-nghi-va-su-kien/"><?php echo $language[$lang_id]['hoinghivasukien']?></a></li>
								<li><a href="/gioi-thieu/"><?php echo $language[$lang_id]['gioithieu']?></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-3">
						<h4><?php echo $language[$lang_id]['tinhot']?></h4>
                        <ul class="colorlib-footer-links">
                        <?
                            $news_hot = $index->news_hot();
                            foreach($news_hot as $k=>$v) {
                                change_language_value($news_hot[$k]);
                            }
                            $i=0;
                            foreach($news_hot as $row) {
                             $i++;
                        ?>
                        <li><a href="/tin-tuc/<?=$row['pos_alias']?>.html"><?=$row['pos_title']?></a></li>
                        <? } ?>
						
						</ul>
					</div>

					<div class="col-md-3 col-md-push-1">
						<h4><?php echo $language[$lang_id]['lienhe']?></h4>
						<ul class="colorlib-footer-links">
                            <?
                              foreach($office as $row) {
                            ?>
                            
							<li><?=$row['off_address']?></li>
							<li><a href="tel://<?=$row['off_phone']?>"><?=$row['off_phone']?></a></li>
							<li><a href="mailto:info@yoursite.com"><?=$row['off_email']?></a></li>
							<li><a href="<?=$row['off_website']?>"><?=$row['off_website']?></a></li>
                            <?}?>
						</ul>
					</div>
				</div>
			
			</div>
		</footer>