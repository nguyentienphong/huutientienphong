<div class="col-md-4">
            <div id="block-views-news-hot">
                <div class="views-title text-center text-uppercase"><?=$language[$lang_id]['tinhot']?></div>
                    <?
                        $news_hot = $news->news_hot();
                        foreach($news_hot as $k=>$v) {
                            change_language_value($news_hot[$k]);
                        }
                        $i=0;
                        foreach($news_hot as $row) {
                         $i++;
                    ?>
                        <div class="views-row clearfix">
                            <div class="views-image pull-left">
                                <a href="/tin-tuc/<?=$row['pos_alias']?>.html"> <img src="<?=get_image_size($row['pos_image'],'small_')?>" style="max-width: 80px;"></a>
                            </div>
                            <div class="views-right ">
                                <div class="views-summary">
                                    <a href="/tin-tuc/<?=$row['pos_alias']?>.html"><?=$row['pos_title']?></a>
                                </div>
                                <div class="views-date">
                                   <span class="icon-date"></span> <?=$language[$lang_id]['dangngay']?>: <?=getDateTime(($lang_id+1),0,1,1,'',$row['pos_date'])?>
                                </div>
                            </div>
                        </div>
                    <? } ?>
            </div>
            <!--<div id="block-adv">
                <a href="#"><img src="/home/image/adver.jpg" alt=""></a>
            </div>-->
        </div>