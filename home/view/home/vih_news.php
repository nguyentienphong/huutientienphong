<?
    $news_hot = $index->news_hot();
    foreach($news_hot as $k=>$v) {
        change_language_value($news_hot[$k]);
    }
    $i=0;
    foreach($news_hot as $row) {
     $i++;
?>
<div class="col-md-4 col-sm-4 block-news">
    <div class="content">
        <a href="/tin-tuc/<?=$row['pos_alias']?>.html">
            <img src="<?=get_image_size($row['pos_image'],'medium_')?>" alt=""> </a>
        <div class="block-content">
            <p class="date text-uppercase"><?=getDateTime(($lang_id+1),1,1,1,'',$row['pos_date'])?></p>
            <a href="/tin-tuc/<?=$row['pos_alias']?>.html">
                <?=$row['pos_title']?>
            </a>
        </div>

    </div>
</div>
<? } ?>
