<?php
$page_search = true;
$keyword = getValue('keyword','str','POST','');
if($keyword == ''){
   redirect('/');
}
$db_all_act = new db_query('SELECT *
                            FROM activities
                            WHERE act_title LIKE "%'.$keyword.'%"
                            ORDER BY act_id DESC 
                            LIMIT 9');
$listAct = $db_all_act->resultArray();unset($db_all_act);
$db_all_news = new db_query('SELECT pos_id,pos_title,pos_title_en,pos_alias,pos_image,cat_name,cat_id,
                                    pos_summary,pos_summary_en,pos_date,
                                    MATCH(pos_title) AGAINST("'.$keyword.'" IN BOOLEAN MODE) AS score 
                            FROM post 
                            LEFT JOIN categories ON cat_id = pos_cat_id 
                            WHERE pos_active = 1 
                            AND (MATCH(pos_title) AGAINST("'.$keyword.'" IN BOOLEAN MODE)
                                                OR pos_title LIKE "%'.$keyword.'%") 
                            ORDER BY score DESC, pos_date DESC, pos_id DESC 
                            LIMIT 10');
$listNews = $db_all_news->resultArray();unset($db_all_news);
$db_all_projects = new db_query('SELECT *
                            FROM project 
                            LEFT JOIN categories ON cat_id = prj_cat_id 
                            WHERE prj_title LIKE "%'.$keyword.'%"
                            ORDER BY prj_id DESC 
                            LIMIT 10');
$listProjects = $db_all_projects->resultArray();unset($db_all_projects);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta content="vi" http-equiv="content-language"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <title>Tìm kiếm</title>
   <!-- css -->
   <link rel="stylesheet" type="text/css" href="/home/css/base.css"/>
   <link rel="stylesheet" type="text/css" href="/home/css/home.css"/>
   <link rel="stylesheet" type="text/css" href="/home/css/news.css"/>
   <!-- js -->
   <script type="text/javascript" src="/themes/js/jquery-1.9.0.min.js"></script>
   <script type="text/javascript" src="/home/js/common.js"></script>
   <style>
      .search_title{
         margin:20px 0;
         font-size:20px;
      }
      .news_ct_left{
         max-width:1140px
      }
      .news_one_right_inf {
         max-width: 732px
      }
   </style>
</head>
<body>
   <div id="pagewrapper">   
      <?include('view/common/vic_header.php')?>
      <div class="bcum_wrapper">
         <div class="bcum_inner maxwidthpage">
            <h1 class="bcum_title"><?=$language[$lang_id]['timkiem']?></h1>
            <div class="bcum"><?=$language[$lang_id]['trangchu']?> / <?=$language[$lang_id]['timkiem']?></div>
         </div>
      </div>
      <div class="contentwrapper">
         <div class="news_content maxwidthpage">
            <div class="news_ct_left">
               <p class="search_title"><?=($lang_id ==0) ? 'Kết quả tìm kiếm Tin tức cho từ khóa':'Result for News'?>: <?=$keyword?></p>
               <?php
                  foreach($listNews as $k=>$v) {
                     change_language_value($listNews[$k]);
                  }
                  if($listNews){
                  foreach($listNews as $row) {
               ?>
                     <div class="news_one">
                        <a href="/tin-tuc/<?=$row['pos_alias']?>.html"><img src="<?=get_image_size($row['pos_image'],'medium_')?>"/></a>
                        <div class="news_one_right_inf">
                           <a href="/tin-tuc/<?=$row['pos_alias']?>.html" class="news_title_r" title="<?=$row['pos_title']?>"><?=cut_string($row['pos_title'],130)?></a>
                           <p class="news_date_r"><?=$language[$lang_id]['dangboi']?> <?=get_log_add_frontend($row['pos_id'],'post')?> | <?=date('d/m/Y',$row['pos_date'])?></p>
                           <p class="news_des_r">
                              <?=cut_string($row['pos_summary'],200)?>  
                           </p>
                        </div>
                     </div>
               <?}}else echo ($lang_id ==0) ? 'Không có kết quả nào':'Not found';?>
               <p class="search_title"><?=($lang_id ==0) ? 'Kết quả tìm kiếm Lĩnh vực hoạt động cho từ khóa':'Result for Activities'?>: <?=$keyword?></p>
               <?php
                  foreach($listAct as $k=>$v) {
                     change_language_value($listAct[$k]);
                  }
                  if($listAct){
                  foreach($listAct as $row) {
               ?>
                     <div class="news_one">
                        <a href="/linh-vuc-hoat-dong/<?=$row['act_alias']?>.html"><img src="<?=get_image_size($row['act_image'],'medium_')?>"/></a>
                        <div class="news_one_right_inf">
                           <a href="/linh-vuc-hoat-dong/<?=$row['act_alias']?>.html" class="news_title_r" title="<?=$row['act_title']?>"><?=cut_string(act_name($row['act_title'],1),130)?><br /> <?=cut_string(act_name($row['act_title'],2),130)?></a>
                           
                           <p class="news_des_r">
                              <?=cut_string($row['act_summary'],200)?>  
                           </p>
                        </div>
                     </div>
               <?}}else echo ($lang_id ==0) ? 'Không có kết quả nào':'Not found';?>
               <p class="search_title"><?=($lang_id ==0) ? 'Kết quả tìm kiếm Dự án đầu tư cho từ khóa':'Result for Project'?>: <?=$keyword?></p>
               <?php
                  foreach($listProjects as $k=>$v) {
                     change_language_value($listProjects[$k]);
                  }
                  if($listProjects){
                  foreach($listProjects as $row) {
               ?>
                     <div class="news_one">
                        <a href="/du-an-dau-tu/<?=$row['prj_alias']?>.html"><img src="<?=get_image_size($row['prj_image'],'medium_')?>"/></a>
                        <div class="news_one_right_inf">
                           <a href="/du-an-dau-tu/<?=$row['prj_alias']?>.html" class="news_title_r" title="<?=$row['prj_title']?>"><?=cut_string($row['prj_title'],130)?></a>
                           
                           <p class="news_des_r">
                              <?=cut_string($row['prj_summary'],200)?>  
                           </p>
                        </div>
                     </div>
               <?}}else echo ($lang_id ==0) ? 'Không có kết quả nào':'Not found';?>
            </div
            ><div class="news_ct_right">
               <?//include('view/common/vic_news_right.php')?>
            </div>
         </div>
         
      </div>
      <?include('view/common/vic_footer.php')?>
   </div>
</body>
</html>