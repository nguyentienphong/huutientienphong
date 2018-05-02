<?php
$categories = new Categories($alias);
switch($categories->type) {
   case 'post': 
      require 'news_cat.php';
      break;
   case 'project': 
      require 'project_cat.php';
      break;
   default :
      require 'post_cat.php';
      break;
}
?>