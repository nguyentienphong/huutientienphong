<?php
require 'inc_security.php';
//Kiem tra quyen addedit
checkPermission('add');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=$load_header?>
<script src="/plupload/plupload.full.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/plupload/jquery-ui.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="/plupload/jquery.ui.plupload/jquery.ui.plupload.min.js?v=11" charset="UTF-8"></script>
<script type="text/javascript" src="/plupload/themeswitcher.js" charset="UTF-8"></script>
</head>
<style>
   .plupload_wrapper {
      font: normal 11px Verdana,sans-serif;
      width: 100%;
      min-width: 820px;
   }
   .plupload_container {
      min-height: 450px;
      position: relative;
   }
</style>
<body>
<div class="wrapper">
   <div class="row">
      <div class="col-sm-12">
         <section class="panel">
            <header class="panel-heading">
               Thêm mới <?=$module_name?>
            </header>  
            <div class="panel-body">
               <div id="uploader" style="min-height: 500px !important;">
                   <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
               </div>
 
               <script type="text/javascript">
               // Initialize the widget when the DOM is ready
               $(function() {
                   $("#uploader").plupload({
                       // General settings
                       runtimes : 'html5,flash,silverlight,html4',
                       url : "images_upload.php",
                
                       // Maximum file size
                       max_file_size : '2mb',
                
                       chunk_size: '1mb',
                
                       // Resize images on clientside if we can
               
                
                       // Specify what files to browse for
                       filters : [
                           {title : "Image files", extensions : "jpg,gif,png,jpeg"}
                       ],
                
                       // Rename files by clicking on their titles
                       rename: true,
                        
                       // Sort files
                       sortable: true,
                
                       // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
                       dragdrop: true,
                
                       // Views to activate
                       views: {
                           list: true,
                           thumbs: true, // Show thumbs
                           active: 'thumbs'
                       },
                
                       // Flash settings
                       flash_swf_url : '../../resources/js/plupload/Moxie.swf',
                    
                       // Silverlight settings
                       silverlight_xap_url : '../../resources/js/plupload/Moxie.xap',
                        preinit: {
                                   Init: function (up, info) {
                                       //log('[Init]', 'Info:', info, 'Features:', up.features);
                                   },
                
                                   UploadFile: function (up, file) {
                                       //log('[UploadFile]', file);
                                   },
                
                                   UploadComplete: function (up, file) {
                                       //plupload_add
                                       window.location.href='listing.php';
                                   },
                
                                   UploadProgress: function (up,file) {
                                   },
                
                                   PostInit: function (up) {
                
                                   },
                
                                   QueueChanged: function (up) {
                                   }
                               }
                   });
               
               	// Client side form validation
               	$('form').submit(function(e) {
               	  
                       var uploader = $('#uploader').plupload('getUploader');
               
                       // Files in queue upload them first
                       if (uploader.files.length > 0) {
                           // When all files are uploaded submit form
                           uploader.bind('StateChanged', function() {
                               if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
                                   $('form')[0].submit();
                               }
                           });
                               
                           uploader.start();
                           
                                       
                       } else
                           //alert('You must at least upload one file.');
                        //dung trong trường bắt buộc upload ảnh
                       //return false;
                       return true;
                       
                   });
               });
               </script>
            </div> 
         </section>
      </div>
   </div>   
</div>
</body>
</html>