<?php
require 'inc_security.php';
checkPermission('edit');
$bg_success = '';
$general_array = array();
$general_cache = ROOT.'/cache/seo.cache';
if(!file_exists($general_cache)){
   $general_array['seo_title'] = '';
   $general_array['seo_description'] = '';
   $general_array['seo_keyword'] = '';
   $general_array['seo_robots'] = 'Index,Follow';
   $general_array_json = json_encode($general_array);
   file_put_contents($general_cache,$general_array_json);   
}else {
   $general_array = json_decode(file_get_contents($general_cache),1);
}
$action = getValue('action','str','POST','');
if($action == 'execute') {
   $general_array['seo_title'] = getValue('seo_title','str','POST','');
   $general_array['seo_description'] = getValue('seo_description','str','POST','');
   $general_array['seo_keyword'] = getValue('seo_keyword','str','POST','');
   $general_array['seo_robots'] = getValue('seo_robots','str','POST','Index,Follow');
   $general_array_json = json_encode($general_array);
   file_put_contents($general_cache,$general_array_json);   
   $bg_success = 'Cấu hình đã được lưu lại.';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=$load_header?>
</head>
<body>
<div class="page-heading">
   <h3>
       Cấu hình seo
   </h3>
   <ul class="breadcrumb">
       <li>
           <a href="#">Cấu hình</a>
       </li>
       <li class="active"> Cấu hình seo </li>
   </ul>
</div>
<div class="wrapper">
<form action="" method="post">
<?php
if($bg_success != '') {
   ?>
   <div class="row">
       <div class="col-md-12">
           <section class="panel">
               <header class="panel-heading">
                   Thông báo trang thái
               </header>
               <div class="panel-body">
                  <div class="alert alert-success fade in">
                       <button type="button" class="close close-sm" data-dismiss="alert">
                           <i class="fa fa-times"></i>
                       </button>
                       <strong>Thành công!</strong> <?=$bg_success?>
                   </div>
               </div>
           </section>
       </div>
   </div>
   <?
}
?>
   <div class="row">
       <div class="col-md-12">
           <section class="panel">
               <header class="panel-heading">
                   Cấu hình seo cho trang chủ
               </header>
               <div class="panel-body">
                  <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="seo_title" class="form-control seo_title" value="<?=$general_array['seo_title']?>" />
                            <span class="help-block"><span class="char_seo_title bold"><?=strlen($general_array['seo_title'])?></span> ký tự. Tiêu đề (title) tốt nhất khoảng 60 - 70 ký tự</span>
                        </div>
                    </div>
               </div>
               <div class="panel-body">
                   <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea rows="6" name="seo_description" class="form-control seo_description"><?=$general_array['seo_description']?></textarea>
                            <span class="help-block"><span class="char_seo_description bold"><?=strlen($general_array['seo_description'])?></span> ký tự. Mô tả (description) tốt nhất khoảng 120 - 160 ký tự</span>
                        </div>
                    </div>
               </div>
               <div class="panel-body">
                  <div class="form-group">
                        <label class="col-sm-2 control-label">Keyword</label>
                        <div class="col-sm-10">
                            <input type="text" name="seo_keyword" class="form-control" value="<?=$general_array['seo_keyword']?>" />
                            <span class="help-block">Các từ khóa của website. Nhập từ khóa cách nhau bởi dấu phẩy ","</span>
                        </div>
                    </div>
               </div>
               <div class="panel-body">
                   <div class="form-group">
                        <label class="col-sm-2 control-label">Robots</label>
                        <div class="col-sm-10">
                            <select name="seo_robots" class="form-control m-bot15">
                                 <option value="Index,Follow"<?=$general_array['seo_robots'] == 'Index,Follow' ? ' selected="selected"' : ''?> >Index,Follow</option>
                                 <option value="Noindex,Nofollow"<?=$general_array['seo_robots'] == 'Noindex,Nofollow' ? ' selected="selected"' : ''?> >Noindex,Nofollow</option>
                                 <option value="Index,Nofollow"<?=$general_array['seo_robots'] == 'Index,Nofollow' ? ' selected="selected"' : ''?> >Index,Nofollow</option>
                                 <option value="Noindex,Follow"<?=$general_array['seo_robots'] == 'Noindex,Follow' ? ' selected="selected"' : ''?>>Noindex,Follow</option>
                            </select>
                        </div>
                    </div>
               </div>
               <div class="panel-body">
                   <div class="form-group">
                     <input type="hidden" name="action" value="execute" />
                     <label class="col-sm-2 control-label"><button class="btn btn-info" type="submit">Lưu cấu hình</button></label>
                   </div>
               </div>
           </section>
       </div>
   </div>
</form>
</div>
<script>
   $(".seo_title").on("keyup",function(){
      $(".char_seo_title").html($(this).val().length);
   });
   $(".seo_description").on("keyup",function(){
      $(".char_seo_description").html($(this).val().length);
   });
</script>
</body>
</html>