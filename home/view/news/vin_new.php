<div id="view-news" class="col-md-8">
    <?php
      $list_news= $news->list_news();
      foreach($list_news as $k=>$v) {
         change_language_value($list_news[$k]);
      }
      foreach($list_news as $row) {
    ?>
        <div class="views-row clearfix">
                <div class="views-hot btn btn-default text-uppercase"><?=$language[$lang_id]['tinmoi']?></div>
                <div class="views-img">

                    <a href="/tin-tuc/<?=$row['pos_alias']?>.html">
                        <img src="<?=$row['pos_image']?>">
                    </a>
                </div>
                <div class="views-title">
                    <a href="/tin-tuc/<?=$row['pos_alias']?>.html"><?=$row['pos_title']?></a></div>
                <div class="views-date">
                    <?=$language[$lang_id]['dangngay']?>: <?=getDateTime(($lang_id+1),0,1,1,'',$row['pos_date'])?>
                </div>
                <div class="views-description">
                    <p><?=$row['pos_summary']?>  </p>
                </div>
                <div class="views-button">
                    <a class="btn btn-default" href="/tin-tuc/<?=$row['pos_alias']?>.html"><?=$language[$lang_id]['xemthem']?> ></a>
                </div>
            </div>
    <? } ?>         
    <div >
    <nav>
    <?=generatePageBar('',$page,$news->page_size,$news->total_news(),'','main_page_btn','active','<<','>>','Đầu','Cuối',1,1)?>
    </nav>
      
  </div>
</div>