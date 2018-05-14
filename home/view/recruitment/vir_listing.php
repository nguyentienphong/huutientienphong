<div id="colorlib-blog">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-md-push-5">
                <?php
                  $list_news= $recruitment->recruitment_list();
                  foreach($list_news as $k=>$v) {
                     change_language_value($list_news[$k]);
                  }
                  foreach($list_news as $row) {
                ?>
				<article class="animate-box">
					
					<div class="desc">
						<div class="meta">
							<p>
								<span><?=getDateTime(($lang_id+1),0,1,1,'',$row['rec_date'])?> </span>
								<span>admin </span>
							</p>
						</div>
						<h2><a href="/tuyen-dung/<?=$row['rec_alias']?>.html"><?=$row['rec_title']?></a></h2>
						<p><?=$row['rec_summary']?></p>
					</div>
				</article>
                <?php } ?>
				<nav>
                <?=generatePageBar('',$page,$recruitment->page_size,$recruitment->total_recruitment(),'','main_page_btn','active','<<','>>','Đầu','Cuối',1,1)?>
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