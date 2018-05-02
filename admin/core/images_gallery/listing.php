<?php
require 'inc_security.php';                          
   $list = new dataGrid('imu_id',30);
   $list->add('imu_image','Ảnh','string',0,0, 'width="120px"');
   $list->add('imu_image','Tên','string',1,0, 'width="120px"');
   $list->add('imu_alt','alt','string',0,0, 'width="120px"');
   $list->add('','Sửa','edit');
   $list->add('','Xóa','delete');
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
</head>
<body>

<div class="wrapper">
   <div class="row">
      <div class="col-sm-12">
         <section class="panel">
            <header class="panel-heading">
               Danh sách <?=$module_name?>               
            </header>        
               <div class="panel-body">
                  <?=$list->showHeader($total_row)?>
                  <?php
                  $i = 0; 
                  ?>
                  <?php while($row = mysql_fetch_assoc($db_listing->result)){
                    $i++;
                  ?>
                  <?=$list->start_tr($i,$row[$id_field],'width=10px')?>
                  <td class="center">
                    <div class="img_thumb">
                        <img src="<?=$bg_filepath.img_filepath($row['imu_date'])?><?=$row['imu_image']?>" alt="Không có ảnh"/>
                    </div>
                  
                  </td>
                  <td>
                     <?=form_input('imu_image'.$row[$id_field],$row['imu_image'],'class="form-control input-sm" onkeyup="check_edit(\'record_'.$i.'\')"')?>
                  </td>
                  <td class="center">
                    <?=form_input('imu_alt'.$row[$id_field],$row['imu_alt'],'class="form-control input-sm" onkeyup="check_edit(\'record_'.$i.'\')"')?> 
                  </td>
                  <?=$list->showEdit($row[$id_field])?>
                  <?=$list->showDelete($row[$id_field])?>
                  <?=$list->end_tr()?>
                  <?}?>
                  <?=$list->showFooter()?>  
               </div>                      
            </section>
         </div>
      </div>
   </div>
</body>
</html>