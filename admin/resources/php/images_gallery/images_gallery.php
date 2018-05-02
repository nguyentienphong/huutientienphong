<?php
   require 'inc_security.php';  
   $view = getValue('view','str','GET','list');     
   $action = getValue('action','str','GET','');  
   $block = getValue('block','str','GET','');           
   $list = new dataGrid('imu_id',12);
   $list->add('imu_image','Tên','string',1,0, 'width="120px"');
   $db_count = new db_count('SELECT count(*) as count 
                               FROM images_upload
                               WHERE 1 '.$list->sqlSearch());
   $total = $db_count->total;unset($db_count);
   
   $db_listing = new db_query('SELECT * 
                               FROM images_upload
                               WHERE 1 '.$list->sqlSearch().'
                               ORDER BY '.$list->sqlSort().' imu_id DESC 
                               '.$list->limit($total));
   $total_row = mysql_num_rows($db_listing->result);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="" xmlns:fb="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=$load_header?>
   <script src="/plupload/plupload.full.min.js" type="text/javascript"></script>
   <script type="text/javascript" src="/plupload/jquery-ui.min.js" charset="UTF-8"></script>
   <script type="text/javascript" src="/plupload/jquery.ui.plupload/jquery.ui.plupload.min.js" charset="UTF-8"></script>
   <script type="text/javascript" src="/plupload/themeswitcher.js" charset="UTF-8"></script>
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
      .choose_quick{
         display:none;
         position: absolute;
         top: 40%;
         left: 9%;
         height:20px;
         width:40%;
         margin-top:-10px;
         text-align: center;
         background: rgba(0,0,0,0.6);
         border-radius: 3px;
      }
      .images{
         position: relative;
      }
      .media-gal .item:hover .choose_quick{
         display:block;
         color:#fff
      }
      .choose_quick:hover{
         text-decoration: none;
         color:#65CEA7
      }
      .dataTables_paginate {
         padding:0;
         margin:0
      }
      .view_detail_imu{
         display:none;
         position: absolute;
         top: 40%;
         right: 9%;
         height:20px;
         width:40%;
         margin-top:-10px;
         text-align: center;
         background: rgba(0,0,0,0.6);
         border-radius: 3px;
      }
      .media-gal .item:hover .view_detail_imu{
         display:block;
         color:#fff
      }
      .view_detail_imu:hover{
         text-decoration: none;
         color:#65CEA7
      }
   </style>
</head>
<body>

<div class="wrapper">
   <div class="row">
      <div class="col-sm-12">
         <section class="panel">
            <header class="panel-heading custom-tab ">
                <ul class="nav nav-tabs">
                    <li class="<?=($view == 'add') ? 'active' :''?>">
                        <a href="#add" data-toggle="tab">Thêm mới</a>
                    </li>
                    <li class="<?=($view == 'list') ? 'active' :''?>">
                        <a href="#list" data-toggle="tab">Danh sách</a>
                    </li>
                </ul>
            </header>  
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane" id="add">
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
                         
                                chunk_size: '2mb',
                         
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
                                                window.location.href='images_gallery.php?view=list&action=<?=$action?>&block=<?=$block?>';
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
                    <div class="tab-pane active media-gal isotope" id="list">
                        <div class="dataTables_filter" id="dynamic-table_filter" style="width: 100%;">
                           <form name="grid_search" class="form-inline" action="/admin/resources/php/images_gallery/images_gallery.php?view=list" method="get" style="float:left">
                              <input type="hidden" name="search" value="1"/>
                              <input type="text" class="form-control" name="imu_image" placeholder="Tên" value="<?=getValue('imu_image','str','GET','')?>" width="120px">&nbsp;
                              <input type="submit" value="Tìm kiếm" class="btn btn-primary"/>
                           </form>
                           <div style="width: 50%;float: right;">
                              <?=$list->generate_page()?>
                           </div>
                        </div>
                        
                        <?php
                        $i = 0; 
                        ?>
                        <?php while($row = mysql_fetch_assoc($db_listing->result)){
                          $i++;
                        ?>
                           <div class="images item  isotope-item">
                              <a href="#myModal" data-toggle="modal" imu_id='<?=$row['imu_id']?>'>
                                  <img src="<?=$bg_filepath.img_filepath($row['imu_date']).'medium_'.$row['imu_image']?>" alt="">
                              </a>
                              <p><?=cut_string($row['imu_image'],21)?></p>
                              <?if($action == 'avatar'){
                                 ?>
                              <a href="javascript:;" onclick="choose_imu('<?='/media/images/'.img_filepath($row['imu_date']).$row['imu_image']?>',<?=$row['imu_id']?>,'<?=$block?>')" class="choose_quick btn-primary">Thêm <i class="fa fa-check imu_choosed imu_choosed<?=$row['imu_id']?>"></i></a>
                              
                              <?
                                 }else{
                              ?>
                                    <input type="hidden" name="imu_image_alt" value="<?=$row['imu_alt']?>" class="span3 imu_image_alt imu_image_alt<?=$row['imu_id']?>" imu_id="<?=$row['imu_id']?>"/>
                                    <a href="javascript:;" onclick="insert_images('<?='/media/images/'.img_filepath($row['imu_date']).$row['imu_image']?>',<?=$row['imu_id']?>)" class="choose_quick btn-primary">Thêm <i class="fa fa-check imu_choosed imu_choosed<?=$row['imu_id']?>"></i></a>
                              <? } ?>
                              <a href="#myModal" data-toggle="modal" class="view_detail_imu btn-primary" imu_id='<?=$row['imu_id']?>'>
                                 Xem chi tiết
                              </a>
                           </div>
                             
                        <? } ?>
                        <?=$list->generate_page()?>
                        <script>
                           $('.images a').click(function(){
                              var imu_id = $(this).attr('imu_id');
                              $.post('ajax.php',{'imu_id':imu_id,'action':'image_info'},function(data){
                                 $('.modal-body').html(data['info']);
                              },'json')
                           })
                        </script>
                    </div>
                    <div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                       <div class="modal-dialog">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                   <h4 class="modal-title">Thông tin ảnh</h4>
                               </div>
                               <div class="modal-body row">
                               </div>
                               <script>
                                 function submit_info(imu_id){
                                    var name = $('#name').val();
                                    var caption = $('#caption').val();
                                    var alt = $('#alt').val();
                                    $.post('ajax.php',{'imu_id':imu_id,'name':name,'alt':alt,'caption':caption,'action':'update_image_info'},function(data){
                                       if(data.success == 1){
                                          alert('Thay đổi thành công !');
                                          window.location.reload();
                                       } 
                                    },'json')
                                 }
                                 function imu_delete(imu_id){
                                    if(confirm('Bạn muốn xóa ảnh này?')){
                                       $.post('ajax.php',{'imu_id':imu_id,'action':'imu_delete'},function(data){
                                          if(data.success == 1){
                                             alert('Xóa thành công !');
                                             window.location.reload();
                                          } 
                                       },'json')
                                    }
                                 }
                                 function choose_imu(url,imu_id,block){
                                    if(!$('.imu_choosed'+imu_id).hasClass('choosed')){
                                       $('.imu_choosed'+imu_id).addClass('choosed');
                                       window.parent.$('.'+block+'_block').show();
                                       window.parent.$('.'+block+'_block img').attr('src',url);
                                       window.parent.$('[name='+block+']').val(url);   
                                       $('.imu_choosed'+imu_id).toggle('medium');  
                                       window.parent.$('.fancybox-close').click();
                                    }else{
                                       $('.imu_choosed'+imu_id).removeClass('choosed')
                                       window.parent.$('.'+block+'_block').hide();
                                       window.parent.$('.'+block+'_block img').attr('src','');
                                       window.parent.$('[name='+block+']').val('');   
                                       $('.imu_choosed'+imu_id).toggle('medium');  
                                    }
                                                             
                                 }
                                 function insert_images(path_image,imu_id){
                                    if(!$('.imu_choosed'+imu_id).hasClass('choosed')){
                                       $('.imu_choosed'+imu_id).addClass('choosed');
                                       $('.imu_choosed'+imu_id).toggle('medium');  
                                    }
                                    var image_alt = $('.imu_image_alt'+imu_id).val();
                                    var img = '<img src="'+path_image+'" title="'+image_alt+'" alt = "'+image_alt+'" />';
                                    window.parent.tinyMCE.execCommand("mceInsertContent",false,img);
                                 }
                              </script>
                           </div>
                       </div>
                   </div>
                </div>
            </div>               
         </section>
      </div>
   </div>
</div>
</body>
</html>