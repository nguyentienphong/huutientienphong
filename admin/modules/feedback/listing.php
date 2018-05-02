<?php
require 'inc_security.php';
                          
$list = new dataGrid('fee_id',20);
$list->add('fee_fullname','Tên khách hàng','string',1,1, 'width="120px"');
$list->add('fee_email','Email','string',1,1, 'width="120px"');
$list->add('fee_province','Thành phố','array',0,0, 'width="120px"');
$list->add('fee_content','Nội dung','string',0,0, 'width="120px"');
$list->add('fee_point','Số sao','string',0,0, 'width="120px"');
//$list->add('fee_cat_id','Danh mục','array',1,1);
$list->add('','Nổi bật','string');
$list->add('','Xuất bản','string');
//$list->add('','Sửa','edit');
$list->add('','Xóa','delete');
$db_count = new db_count('SELECT count(*) as count 
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().'
                            ');
$total = $db_count->total;unset($db_count);

$db_listing = new db_query('SELECT * 
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().'
                            ORDER BY '.$list->sqlSort().' fee_id DESC , fee_date DESC
                            '.$list->limit($total));
$total_row = mysql_num_rows($db_listing->result);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
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
                  <?=$list->start_tr($i,$row[$id_field])?>
                  <td>
                     <?=$row['fee_fullname']?>                     
                  </td>
                  <td>
                     <?=$row['fee_email']?>                     
                  </td>
                  <td>
                     <?=$arr_provinces[$row['fee_province']]?>
                  </td>
                  <td>
                     <?=$row['fee_content']?>
                  </td>
                  <td>
                     <?=$row['fee_point']?>
                  </td>
                  <?/*<td><?=form_dropdown('fee_cat_id'.$row[$id_field],$fee_cat_id,$row['fee_cat_id'],'class="form-control input-sm" onchange="check_edit(\'record_'.$i.'\')"')?></td>*/?>
                  <?=$list->showCheckbox('fee_hot',$row['fee_hot'],$row[$id_field])?>
                  <?=$list->showCheckbox('fee_active',$row['fee_active'],$row[$id_field])?>
                  <?//=$list->showEdit($row[$id_field])?>
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