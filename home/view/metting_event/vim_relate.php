<div class="views-relate">
    <div class="view-relate-title font_OpenSansSemibold text-uppercase">TIN LIÊN QUAN KHÁC</div>
    <ul>
        <?php
          $news_connection= $news->news_connection($post_detail['pos_date']);
          foreach($news_connection as $k=>$v) {
             change_language_value($news_connection[$k]);
          }
          foreach($news_connection as $row) {
        ?>
            <li><a href="/tin-tuc/<?=$row['pos_alias']?>.html"><?=$row['pos_title']?>.</a> </li>
        <? } ?>
        
    </ul>
</div>