<?php
require 'inc_security.php';
//Kiem tra quyen addedit
checkPermission('edit');
$record_id = getValue('record_id');
$catBase = new Category;
$album = db_array("SELECT * FROM project_images WHERE pji_prj_id =".$record_id);
$list_cat = array(''=>' - Chọn danh mục - ');
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="'.$bg_table.'"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}


$myform = new generate_form();
$prj_date_start = convertDateTime(getValue('prj_date_start','str','POST',''));
$prj_date_end = convertDateTime(getValue('prj_date_end','str','POST',''));
$myform->add('prj_date_start','prj_date_start',1,1,0);
$myform->add('prj_date_end','prj_date_end',1,1,0);
$myform->add('prj_customer','prj_customer',0,0,'',0,'Bạn chưa nhập tên khách hàng');
$myform->add('prj_title','prj_title',0,0,'',1,'Bạn chưa nhập tên');
$myform->add('prj_title_en','prj_title_en',0,0,'',0,'Bạn chưa nhập tên tiếng anh');
$myform->add('prj_cat_id','prj_cat_id',1,0,0,1,'Bạn chưa chọn danh mục');
$myform->add('prj_active','prj_active',1,0,0);
//$myform->add('prj_hot','prj_hot',1,0,0);
$myform->add('prj_tags','prj_tags',0,0,'');
$myform->add('prj_summary','prj_summary',0,0,'');
$myform->add('prj_summary_en','prj_summary_en',0,0,'');
$myform->add('prj_detail','prj_detail',0,0,'',1,'Bạn chưa nhập chi tiết');
$myform->add('prj_detail_en','prj_detail_en',0,0,'',0,'Bạn chưa nhập chi tiết tiếng anh');
$myform->add('prj_image','imu',0,0,'',0,'Bạn chưa chọn ảnh đại diện');
$myform->removeHTML(0);
$myform->addTable($bg_table);
$action = getValue('action','str','POST','');
if($action == 'execute'){
   $prj_title = getValue('prj_title','str','POST','');
   $prj_alias = getValue('prj_alias','str','POST','');
   $prj_alias = get_alias($prj_alias,$prj_title,$bg_table,$id_field,$alias_field,$record_id);
   $myform->add('prj_alias','prj_alias',0,1,'',1,'Bạn chưa nhập đường dẫn');
   
    $bg_errorMsg .= $myform->checkdata();
    if($bg_errorMsg == ''){
        $db_insert = new db_execute($myform->generate_update_SQL($id_field,$record_id));
        //edit lai meta seo
        editSeoMeta($record_id,$bg_table);
        //ghi lai log nguoi sua
        log_edit($record_id,$bg_table);
        //redirect theo action cua nut nguoi dung click
        form_redirect($record_id);
    }
}

//lấy dữ liệu record cần sửa đổi
$db_data 	= new db_query("SELECT * FROM " . $bg_table . " WHERE " . $id_field . " = " . $record_id);
if($row 		= mysql_fetch_assoc($db_data->result)){
	foreach($row as $key=>$value){
		$$key = $value;
	}
}else{
		exit();
} 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=$load_header?>
<link type="text/css" rel="stylesheet" href="/plupload/jquery.ui.plupload/css/jquery-ui.min.css" media="screen" />
                  <link type="text/css" rel="stylesheet" href="/plupload/jquery.ui.plupload/css/jquery.ui.plupload.css" media="screen" />
                  
                  <script type="text/javascript" src="/plupload/plupload.full.min.js" charset="UTF-8"></script>    
                  <script type="text/javascript" src="/plupload/jquery-ui.min.js" charset="UTF-8"></script>
                  <script type="text/javascript" src="/plupload/jquery.ui.plupload/jquery.ui.plupload.min.js" charset="UTF-8"></script>
                  <script type="text/javascript" src="/plupload/themeswitcher.js" charset="UTF-8"></script>
                  <script type="text/javascript" src="/home/js/jquery.slimscroll.min.js"></script>
                  <style>
                     .img{
                        float:left;
                        position: relative;
                        margin: 5px;
                     }
                     #slim_scroll .img:hover .delete_image{
                        display: block;
                     }
                     #slim_scroll .img img{
                        width: 174px;
                        height: 140px;
                     }
                     .delete_image{
                        background: url('/home/img/icon_popup_close.png');
                        position: absolute;
                        top:0px;
                        right:0px;
                        width:16px;
                        height:17px;
                        display: none;
                        z-index: 11;
                     }
                  </style>
</head>
<body>
<div class="wrapper">
   <div class="row">
      <div class="col-sm-12">
         <section class="panel">
            <header class="panel-heading">
               Sửa <?=$module_name?>  
               <?php $form = new form();?>                      
               <?=$form->textnote('Các trường có dấu (<span class="form-asterick">*</span>) là bắt buộc nhập')?>       
            </header>        
            <div class="panel-body">
               <?php print_error_msg($bg_errorMsg)?>
               <?=$form->form_open()?>
               <?=$form->text(array('label'=>'Tên',
                                 'name'=>'prj_title',
                                 'id'=>'prj_title',
                                 'value'=>getValue('prj_title','str','POST',$prj_title),
                                 'require'=>1, 'errorMsg'=>'Bạn chưa nhập tên', 
                                 'placeholder'=> 'Tên không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Tên tiếng anh',
                                 'name'=>'prj_title_en',
                                 'id'=>'prj_title_en',
                                 'value'=>getValue('prj_title','str','POST',$prj_title_en),
                                 'require'=>1, 'errorMsg'=>'Bạn chưa nhập tên tiếng anh', 
                                 'placeholder'=> 'Tên không dài quá 255 ký tự',
                                 'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Đường dẫn',
                                   'name'=>'prj_alias',
                                   'id'=>'prj_alias',
                                   'require'=>1,                                    
                                   'value'=>getValue('prj_alias','str','POST',$prj_alias),
                                   'helptext'=>'"Đường dẫn" cho URL thân thiện hơn. Yêu cầu: là chữ thường, không dấu, nối nhau bằng dấu gạch ngang. Ví dụ: danh-muc-bai-viet',
                                   'class'=>'col-sm-9')
               )?>
               <script>
                    $("#prj_title").on("change",function(){
                        var title = $(this).val();
                        $.ajax({
                             type:'post',
                             url:'ajax.php',
                             data:{title:title,action:'alias'},
                             success:function(html){
                                 $('#prj_alias').val(html);
                             }
                         })
                    });
                 </script>
               <?=$form->showImagesGallery(array('label'=>'Ảnh đại diện',
                                                 'title'=>'Ảnh đại diện',
                                                 'name'=>'imu',
                                                 'id'=>'imu',
                                                 'class'=>'col-sm-9',
                                                 'value'=>getValue('prj_image','str','POST',$prj_image)))?>
               <div class="form-group">
                  <label class="control-label fl" for="prj_title_en">Ảnh slide</label>
                  <div class="controls col-sm-9">
                     <div id="slim_scroll">
                           <?
                              if($album){
                                 foreach($album as $row){
                           ?>
                                    <div class="img" id="img<?=$row['pji_id']?>" style="display: block;">
                                       <a href="javascript:;" class="delete_image" pji_id ="<?=$row['pji_id']?>" hash ="<?=md5('m8_m8'.$row['pji_id'])?>"></a>
                                       <a class="fancybox" href="<?="/pictures/project/".$row['pji_image']?>" rel="gallery1" >
                                          <img src="<?="/pictures/project/small_".$row['pji_image']?>" alt=""/>
                                       </a>
                                    </div>
                           <?
                                 }
                              }
                           ?>
                        </div>
                        
                        <script>
                           $(document).ready(function() {
                              $(".fancybox").fancybox({
                           		openEffect	: 'none',
                           		closeEffect	: 'none'
                           	});
                              $('#slim_scroll').slimScroll({
                                height: '<?if(count($album)<=3)  echo '200px';
                                           if(3 < count($album) && count($album) <= 6)  echo '400px';
                                           if(count($album)>6) echo '660px';
                                
                                          ?>',
                                color: '#ccc',
                              });
                              $('.delete_image').click(function(){
                                 var pji_id = $(this).attr('pji_id');
                                 var hash = $(this).attr('hash');
                                 if(confirm('Bạn muốn xóa ảnh này ?')){
                                    $.post('ajax.php',{pji_id:pji_id,hash:hash,action:'delete_image'},function(data){
                                       if(data['suc']== 1){
                                          if (document.getElementById("img"+pji_id).style.display == "block"){
                                             jQuery("#img"+pji_id).slideUp();
                                          }
                                       } 
                                    },'json')
                                 }
                              })
                           });
                        </script>
                  </div>
               </div>
               <div class="form-group">
                  <label class="control-label fl" for="prj_title_en">Upload ảnh slide dự án</label>
                  <div class="controls col-sm-9">
                     <div class="create_control_2" id="">
                        <div id="uploader">
                            <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
                        </div>
                     </div>
                     <script type="text/javascript">
                     $(document).ready(function(){
                     // Initialize the widget when the DOM is ready
                     $(function() {
                         $("#uploader").plupload({
                             // General settings
                             runtimes : 'html5,flash,silverlight,html4',
                             url : "/home/images_upload.php?record_id=<?=$record_id?>",
                      
                             // Maximum file size
                             max_file_size : '112mb',
                      
                             chunk_size: '111mb',
                      
                             // Specify what files to browse for
                             filters : [
                                 {title : "Image files", extensions : "<?=$img_extension?>"}
                             ],
                      
                             // Rename files by clicking on their titles
                             rename: false,
                              
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
                             flash_swf_url : '/plupload/Moxie.swf',
                          
                             // Silverlight settings
                             silverlight_xap_url : '/plupload/Moxie.xap',
                              preinit: {
                                         Init: function (up, info) {
                                             //log('[Init]', 'Info:', info, 'Features:', up.features);
                                         },
                      
                                         UploadFile: function (up, file) {
                                             //log('[UploadFile]', file);
                                         },
                      
                                         UploadComplete: function (up, file) {
                                             //plupload_add
                                             location.reload();
                                             
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
                     	$('.form_pg').submit(function(e) {   	      
                        	   if($('.fullname').val()==''){
                           		alert('Hãy nhập họ tên.');
                                 $('.fullname').focus();
                           		return false;
                           	}
                           	if($('.birthday').val()==''){
                           		alert('Hãy nhập Ngày sinh.');
                           		$('.birthday').focus();
                                 return false;
                           	}
                                //var uploader = $('#uploader').plupload('getUploader');  
                                //uploader.start(); 
                              if($('.plupload_add').html().search("queued") == -1) {
                                 $('.form_pg')[0].submit();  
                              } else{
                                 alert("Upload hình ảnh trước khi cập nhật hồ sơ");
                                 return false;   
                              }              
                                // Files in queue upload them first
                                
                             
                           });
                        });
                     })
                     </script>
                  </div>
               </div>
                  
               <?=$form->select(array('label'=>'Danh mục',
                                   'name'=>'prj_cat_id', 
                                   'id'=>'prj_cat_id',
                                   'option'=>$list_cat, 
                                   'title'=>'Chọn danh mục',
                                   'require'=>1,
                                   'errorMsg'=>'Bạn chưa chọn danh mục',
                                   'selected'=>getValue('prj_cat_id','int','POST',$prj_cat_id),
                                   'class'=>'col-sm-9')
               )?>
               <?=$form->text(array('label'=>'Ngày bắt đầu','name'=>'prj_date_start','id'=>'prj_date_start','isdatepicker'=>1,'value'=>date('d/m/Y',$prj_date_start),'class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Ngày kết thúc','name'=>'prj_date_end','id'=>'prj_date_end','isdatepicker'=>1,'value'=>date('d/m/Y',$prj_date_end),'class'=>'col-sm-9'))?>
               <?=$form->text(array('label'=>'Tên khách hàng',
                                    'name'=>'prj_customer',
                                    'id'=>'prj_customer',
                                    'value'=>getValue('prj_customer','str','POST',$prj_customer),
                                    'require'=>0, 
                                    'errorMsg'=>'Bạn chưa nhập tên khách hàng', 
                                    'class'=>'col-sm-9')
               )?>
               <?/*=$form->text(array('label'=>'Tags bài viết',
                                 'name'=>'prj_tags',
                                 'id'=>'prj_tags',
                                 'value'=>getValue('prj_tags','str','POST',$prj_tags),
                                 'placeholder'=>'Các từ khóa liên quan, hỗ trợ SEO web, cách nhau bởi dấu phẩy',
                                 'class'=>'col-sm-9')
               )*/?>
               <?//=$form->checkbox(array('label'=> 'Nổi bật', 'name'=> 'prj_hot', 'id'=> 'prj_hot', 'value'=>1 ,'currentValue'=>getValue('prj_hot','int','POST',$prj_hot), 'helptext'=> 'Tin tức được đánh dấu nổi bật'))?>
               <?=$form->checkbox(array('label'=> 'Xuất bản', 
                                     'name'=> 'prj_active', 
                                     'id'=> 'prj_active', 
                                     'value'=>1 ,
                                     'currentValue'=>getValue('prj_active','int','POST',$prj_active), 
                                     'helptext'=> 'Xuất bản - hiển thị ra website',
                                     'class'=>'col-sm-9',
                                     'extra'=>' onclick="return check_one(\'prj_active\');"')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt', 
                                     'name'=> 'prj_summary', 
                                     'id'=> 'prj_summary',
                                     'value'=>getValue('prj_summary','str','POST',$prj_summary), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->textarea(array('label'=> 'Tóm tắt tiếng anh', 
                                     'name'=> 'prj_summary_en', 
                                     'id'=> 'prj_summary_en',
                                     'value'=>getValue('prj_summary','str','POST',$prj_summary_en), 
                                     'style'=>'width:100%;height:100px', 
                                     'class'=>'col-sm-9')
               )?>
               <?=$form->tinyMCE('Nội dung', 
                              'prj_detail', 
                              'prj_detail', 
                              getValue('prj_detail','str','POST',$prj_detail), 
                              '100%'
               )?>
               <?=$form->tinyMCE('Nội dung tiếng anh', 
                              'prj_detail_en', 
                              'prj_detail_en', 
                              getValue('prj_detail_en','str','POST',$prj_detail_en), 
                              '100%'
               )?>
               <?=$form->seoMeta($bg_table,$record_id)?>
               <?=$form->form_action_edit()?>
               <?=$form->form_preview(DOMAIN.'/du-an-dau-tu/'.$prj_alias.'.html')?>
               <?=$form->form_close()?>
            </div>                      
         </section>
      </div>
   </div>
</div>
</body>
</html>