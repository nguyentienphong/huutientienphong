<div id="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5">
                        <?php
                          $list_news= $metting_event->list_news();
                          foreach($list_news as $k=>$v) {
                             change_language_value($list_news[$k]);
                          }
                          foreach($list_news as $row) {
                        ?>
						<article class="animate-box">
							<div class="blog-img" style="background-image: url(<?=$row['met_image']?>);"></div>
							<div class="desc">
								<div class="meta">
									<p>
										<span><?=getDateTime(($lang_id+1),0,1,1,'',$row['met_date'])?> </span>
										<span>admin </span>
									</p>
								</div>
								<h2><a href="/hoi-nghi-va-su-kien/<?=$row['met_alias']?>.html"><?=$row['met_title']?></a></h2>
								<p><?=$row['met_summary']?></p>
							</div>
						</article>
                        <?php } ?>
						<nav>
                        <?=generatePageBar('',$page,$metting_event->page_size,$metting_event->total_news(),'','main_page_btn','active','<<','>>','Đầu','Cuối',1,1)?>
                        </nav>
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