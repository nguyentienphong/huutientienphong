<?php
require 'inc_security.php';
checkPermission('edit');
$bg_success = '';
$general_array = array();
$general_cache = ROOT.'/cache/general.cache';
if(!file_exists($general_cache)){
   $general_array['site_name'] = '';
   $general_array['site_email'] = '';
   $general_array['site_timezone'] = 'Asia/Bangkok';
   $general_array['site_status'] = '1';
   $general_array['site_message'] = '';
   //$general_array['site_bonus'] = 0;
   $general_array_json = json_encode($general_array);
   file_put_contents($general_cache,$general_array_json);   
}else {
   $general_array = json_decode(file_get_contents($general_cache),1);
}
$action = getValue('action','str','POST','');
if($action == 'execute') {
   $general_array['site_name'] = getValue('site_name','str','POST','');
   $general_array['site_email'] = getValue('site_email','str','POST','');
   $general_array['site_timezone'] = getValue('site_timezone','str','POST','Asia/Bangkok');
   $general_array['site_status'] = getValue('site_status','int','POST',0);
   $general_array['site_message'] = getValue('site_message','str','POST','');
    //$general_array['site_bonus'] = getValue('site_bonus','int','POST',0);
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
       Cấu hình chung
   </h3>
   <ul class="breadcrumb">
       <li>
           <a href="#">Cấu hình</a>
       </li>
       <li class="active"> Cấu hình chung </li>
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
                   Thông tin chung
               </header>
               <div class="panel-body">
                  <div class="form-group">
                        <label class="col-sm-2 control-label">Tên website</label>
                        <div class="col-sm-10">
                            <input type="text" name="site_name" class="form-control" value="<?=$general_array['site_name']?>" />
                        </div>
                    </div>
               </div>
               <div class="panel-body">
                   <div class="form-group">
                        <label class="col-sm-2 control-label">Email admin</label>
                        <div class="col-sm-10">
                            <input type="text" name="site_email" class="form-control" value="<?=$general_array['site_email']?>" />
                        </div>
                    </div>
               </div>
               <div class="panel-body">
                   <div class="form-group">
                        <label class="col-sm-2 control-label">Timezone</label>
                        <div class="col-sm-10">
                            <select name="site_timezone" class="form-control m-bot15">
                                <?=str_replace('value="'.$general_array['site_timezone'].'"','value="'.$general_array['site_timezone'].'" selected="selected"',$time_zone_select)?>
                            </select>
                        </div>
                    </div>
               </div>
           </section>
       </div>
   </div>
   <div class="row">
       <div class="col-md-12">
           <section class="panel">
               <header class="panel-heading">
                   Trạng thái website
               </header>
               <div class="panel-body">
                  <div class="form-group">
                        <label class="col-sm-2 control-label">Tắt / Bật</label>
                        <div class="col-sm-10">
                            <div class="slide-toggle">
                                <div>
                                    <input type="checkbox" name="site_status" class="js-switch"<?=$general_array['site_status'] == 1 ? ' checked="checked"' : ''?> value="1" />
                                </div>
                            </div>
                        </div>
                    </div>
               </div>
               <div class="panel-body message-web-stt"<?=$general_array['site_status'] == 1 ? ' style="display: none;"' : ''?> >
                   <div class="form-group">
                        <label class="col-sm-2 control-label">Thông báo khi tắt website</label>
                        <div class="col-sm-10">
                            <textarea name="site_message" rows="6" class="form-control"><?=$general_array['site_message']?></textarea>
                        </div>
                    </div>
               </div>
           </section>
       </div>
   </div>
   <div class="panel-body">
       <div class="form-group">
         <input type="hidden" name="action" value="execute" />
          <button class="btn btn-info" type="submit">Lưu cấu hình</button>
       </div>
   </div>
</form>
</div>
<script>
$('.slide-toggle div').click(function(){
   var web_stt = $('.js-switch').prop('checked');
   $('.message-web-stt').toggle('medium');
})
</script>
<script src="/admin/resources/js/ios-switch/switchery.js" type="text/javascript"></script>
<script src="/admin/resources/js/ios-switch/ios-init.js" type="text/javascript"></script>
</body>
</html>