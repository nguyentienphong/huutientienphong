<?php
$news = new News($alias);
$news->page_size = 7;
$categories = new Categories($alias);
$page = @$_GET['page'];
if(!$page) $page = 1;
$categories->page = $page;
$categories->page_size = 7;
$news_page = true;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta content="vi" http-equiv="content-language"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <title>Tin tức</title>
   <!-- css -->
   <link rel="stylesheet" type="text/css" href="/home/css/base.css"/>
   <link rel="stylesheet" type="text/css" href="/home/css/home.css"/>
   <link rel="stylesheet" type="text/css" href="/home/css/news.css"/>
   <!-- js -->
   <script type="text/javascript" src="/themes/js/jquery-1.9.0.min.js"></script>
   <script type="text/javascript" src="/home/js/common.js"></script>
</head>
<body>
   <div id="pagewrapper">   
      <?include('view/common/vic_header.php')?>
      <div class="bcum_wrapper">
         <div class="bcum_inner maxwidthpage">
            <h1 class="bcum_title"><?=$language[$lang_id]['tintuc']?></h1>
            <div class="bcum"><?=$language[$lang_id]['trangchu']?> / <?=$language[$lang_id]['tintuc']?></div>
         </div>
      </div>
      <div class="contentwrapper">
         <div class="news_content maxwidthpage">
            <div class="news_ct_left">
               <?php
                  $list_news= $categories->list_news();
                  foreach($list_news as $k=>$v) {
                     change_language_value($list_news[$k]);
                  }
                  foreach($list_news as $row) {
               ?>
                     <div class="news_one">
                        <a href="/tin-tuc/<?=$row['pos_alias']?>.html"><img src="<?=$row['pos_image']?>"/></a>
                        <div class="news_one_right_inf">
                           <a href="/tin-tuc/<?=$row['pos_alias']?>.html" class="news_title_r" title="<?=$row['pos_title']?>"><?=cut_string($row['pos_title'],30)?></a>
                           <p class="news_date_r"><?=$language[$lang_id]['dangboi']?> <?=get_log_add_frontend($row['pos_id'],'post')?> | <?=date('d/m/Y',$row['pos_date'])?></p>
                           <p class="news_des_r">
                              <?=cut_string($row['pos_summary'],200)?>  
                           </p>
                        </div>
                     </div>
               <?}?>
               <div class="pager">
                  <?=generatePageBar('',$page,7,$categories->total_news(),'','main_page_btn','page_selected','<<','>>','Đầu','Cuối',1,1)?>
               </div>
            </div
            ><div class="news_ct_right">
               <?include('view/common/vic_news_right.php')?>
            </div>
         </div>
         
      </div>
      <?include('view/common/vic_footer.php')?>
   </div>
</body>
</html>