<?
   $manager = new Manager($alias);
   $manager_detail = $manager->result;
   foreach($manager_detail as $k=>$v) {
      change_language_value($manager_detail);
   }
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta content="vi" http-equiv="content-language"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <title><?=$manager_detail['mng_name']?></title>
   <meta content="" name="keywords"/>
   <meta content="" name="description"/>	
 
   <!-- css -->
   <link type="text/css" rel="stylesheet" href="/plupload/jquery.ui.plupload/css/jquery-ui.min.css?v=1" media="screen" />
   <link rel="stylesheet" type="text/css" href="/home/css/base.css"/>
   <link rel="stylesheet" type="text/css" href="/home/css/home.css"/>
   <link rel="stylesheet" href="/home/nivoslider/nivo-slider.css" type="text/css" />
   <link rel="stylesheet" type="text/css" href="/home/css/aboutus.css?v=2"/>
   <link rel="stylesheet" type="text/css" href="/home/css/manager.css?v=2"/>
   
   <!-- js -->
   <script type="text/javascript" src="/home/js/jquery-1.9.0.min.js"></script>
   <script type="text/javascript" src="/home/js/jquery-ui-1.9.2.custom.min.js"></script>
   <script type="text/javascript" src="/home/js/common.js"></script>
   <script src="/home/nivoslider/jquery.nivo.slider.pack.js" type="text/javascript"></script>
   <script type="text/javascript" src="/home/js/jquery.carouFredSel-6.2.1.js"></script>
</head>
<body>
   <div id="pagewrapper">   
      <?include('view/common/vic_header.php')?>
      <div class="bcum_wrapper">
         <div class="bcum_inner maxwidthpage">
            <h1 class="bcum_title"><?=$language[$lang_id]['doinguquanly']?></h1>
            <div class="bcum"><?=$language[$lang_id]['trangchu']?> / <?=$language[$lang_id]['doinguquanly']?></div>
         </div>
      </div>
      <div class="contentwrapper">
         <div class="content maxwidthpage">
            <div class="manager_left">
               <p><span class="mng_name"><?=$manager_detail['mng_name']?></span> - <span class="mng_position"><?=$manager_detail['mng_position']?></span></p>
               <div class="mng_detail">
                  <?=$manager_detail['mng_detail']?>
               </div>
            </div
            ><div class="manager_right">
               <p><span class="mng_name"><?=$language[$lang_id]['duanquanly']?></span></p>
               <div class="mng_detail mng_project">
                  <?
                  if($manager_detail['mng_project']){
                     $arr_project = db_array("SELECT * FROM project WHERE prj_id IN(".$manager_detail['mng_project'].")");
                     foreach($arr_project as $k=>$v) {
                        change_language_value($arr_project[$k]);
                     }
                     foreach($arr_project as $key=>$row){
                  ?>   
                  <div class="mng_project_one <?=(($key+1)%2 == 0) ? 'mgr0':''?>">
                     <a href="/du-an-dau-tu/<?=$row['prj_alias']?>.html" title="<?=$row['prj_title']?>"><img src="<?=$row['prj_image']?>" width="247" height="176" style="border: 6px solid #f8f7f7;"/></a>
                  </div>
                  <?
                     }}
                  ?> 
               </div>
            </div>
         </div>
      </div>
      <div class="manager_wrap">
         <div class="manager maxwidthpage">
            <div class="manager_list">
               <?php
               $manager_list = $manager->manager_list();
               foreach($manager_list as $k=>$v) {
                  change_language_value($manager_list[$k]);
               }
                  foreach($manager_list as $row) {
               ?>
               <div class="mng_one">
                  <a href="/doi-ngu-quan-ly/<?=$row['mng_alias']?>.html"><img  src="<?=$row['mng_avatar']?>"/></a>
                  <a href="/doi-ngu-quan-ly/<?=$row['mng_alias']?>.html"><p class="mng_name"><?=$row['mng_name']?></p></a>
                  <p class="mng_position"><?=$row['mng_position']?></p>
                  <p class="mng_des"><?=cut_string($row['mng_description'],100)?></p>
                  <a href="/doi-ngu-quan-ly/<?=$row['mng_alias']?>.html"><p class="mng_more"><?=$language[$lang_id]['chitiet']?></p></a>
               </div
               >
               <?}?>
               
            </div>
         </div>
      </div>
      <?include('view/common/vic_footer.php')?>
   </div>
</body>
</html>
