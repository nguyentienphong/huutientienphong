<div id="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
                        <?php
                          $list_news= $news->list_news();
                          foreach($list_news as $k=>$v) {
                             change_language_value($list_news[$k]);
                          }
                          foreach($list_news as $row) {
                        ?>
						<article class="animate-box">
							<div class="blog-img" style="background-image: url(<?=$row['pos_image']?>);"></div>
							<div class="desc">
								<div class="meta">
									<p>
										<span><?=getDateTime(($lang_id+1),0,1,1,'',$row['pos_date'])?> </span>
										<span>admin </span>
									</p>
								</div>
								<h2><a href="/tin-tuc/<?=$row['pos_alias']?>.html"><?=$row['pos_title']?></a></h2>
								<p><?=$row['pos_summary']?></p>
							</div>
						</article>
                        <?php } ?>
						<nav>
                        <?=generatePageBar('',$page,$news->page_size,$news->total_news(),'','main_page_btn','active','<<','>>','Đầu','Cuối',1,1)?>
                        </nav>
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
	
		<div id="colorlib-subscribe" style="background-image: url(images/img_bg_2.jpg);">
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
		</div>