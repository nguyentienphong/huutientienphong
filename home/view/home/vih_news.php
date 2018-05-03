<div id="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2><?=$language[$lang_id]['tinhot']?></h2>
					</div>
				</div>
				<div class="blog-flex">
					<div class="video colorlib-video" style="background-image: url(/home/images/blog-3.jpg);">
						<a href="https://vimeo.com/channels/staffpicks/93951774" class="popup-vimeo"><i class="icon-video"></i></a>
						<div class="overlay"></div>
					</div>
					<div class="blog-entry">
						<div class="row">
                            <?
                                $news_hot = $index->news_hot();
                                foreach($news_hot as $k=>$v) {
                                    change_language_value($news_hot[$k]);
                                }
                                $i=0;
                                foreach($news_hot as $row) {
                                 $i++;
                            ?>                        
    							<div class="col-md-12 animate-box">
    								<a href="/tin-tuc/<?=$row['pos_alias']?>.html" class="blog-post">
    									<span class="img" style="background-image: url(<?=get_image_size($row['pos_image'],'medium_')?>);"></span>
    									<div class="desc">
    										<span class="date"><?=getDateTime(($lang_id+1),1,1,1,'',$row['pos_date'])?></span>
    										<h3><?=$row['pos_title']?></h3>
    									</div>
    								</a>
    							</div>
                            <? } ?>                            
						
							<div class="col-md-12 animate-box text-right">
								<a href="#"><?=$language[$lang_id]['xemtatca']?> <i class="icon-arrow-right3"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>