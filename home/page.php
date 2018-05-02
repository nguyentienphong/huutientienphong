<?php
$page = new Page($alias);
$page_detail = $page->result;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <meta content="vi" http-equiv="content-language"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?=$page->Seo();?>
   <!-- css -->
   <link rel="stylesheet" type="text/css" href="/home/css/base.css"/>
   <link rel="stylesheet" type="text/css" href="/home/css/home.css"/>

   <!-- js -->
   <script type="text/javascript" src="/themes/js/jquery-1.9.0.min.js"></script>
   <script type="text/javascript" src="/themes/js/common.js"></script>
</head>
<body>
   <div id="pagewrapper">   
      <?include('view/common/vic_header.php')?>
      <div class="contentwrapper">
         <?include('view/common/vic_main_menu.php')?>
         <?php
         dump($page_detail);
         ?>
      </div>
      <?include('view/common/vic_footer.php')?>
   </div>
</body>
</html>