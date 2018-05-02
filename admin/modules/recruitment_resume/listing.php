<?php
require 'inc_security.php';
$arr_position = recruitment_list(); 
$rer_position = $arr_position;                         
$list = new dataGrid('rer_id',20);

$list->add('rer_date','Ngày gửi','string',1,1, 'width="120px"');
$list->add('rer_name','Tên','string',1,1, 'width="120px"');
$list->add('rer_birthday','Ngày sinh','string',0,0, 'width="120px"');
$list->add('rer_sex','Giới tính','int',0,0, 'width="120px"');
$list->add('rer_email','Email','string',0,0, 'width="120px"');
$list->add('rer_phone','Điện thoại','string',0,0, 'width="120px"');
$list->add('rer_address','Địa chỉ','string',0,0, 'width="120px"');
$list->add('rer_position','Vị trí','array',1,0, 'width="120px"');
$list->add('rer_diploma','Bằng cấp','int',1,0, 'width="120px"');
$list->add('rer_diploma_detail','Chi tiết bằng cấp','string',0,0, 'width="120px"');
$list->add('rer_salary','Mức lương','string',0,0, 'width="120px"');
$list->add('rer_message','Nội dung','string',0,0, 'width="120px"');
$list->add('rer_other','Kỹ năng khác','string',0,0, 'width="120px"');
//$list->add('rer_cat_id','Danh mục','array',1,1);
//$list->add('','Nổi bật','string');
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
                            ORDER BY '.$list->sqlSort().' rer_id DESC , rer_date ASC
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
                <form method="POST" action="exportexcel_spout.php" style="float: right;">
                    <input type="hidden" class="form-control" name="rer_name" placeholder="Tên" value="" width="120px">
                    <input type="hidden" class="form-control" name="rer_position" placeholder="Tên" value="" width="120px">
                    <input type="hidden" class="form-control" name="rer_sql_search" placeholder="Tên" value="<?=$list->sqlSearch()?>" width="120px">
                    <input type="submit" value="Xuất excel" class="btn btn-primary"/>
                  </form>
                  <?=$list->showHeader($total_row)?>
                  
                  <?php
                  $i = 0; 
                  ?>
                  <?php while($row = mysql_fetch_assoc($db_listing->result)){
                    $i++;
                  ?>
                  <?=$list->start_tr($i,$row[$id_field])?>
                  <td>
                     <?=date('d/m/Y H:i:s',$row['rer_date'])?>                     
                  </td>
                  <td>
                     <?=$row['rer_name']?>                     
                  </td>
                  
                  <td>
                     <?=date('d/m/Y',$row['rer_birthday'])?>                     
                  </td>
                  <td>
                     <?=$arr_sex[$row['rer_sex']]?>                     
                  </td>
                  <td>
                     <?=$row['rer_email']?>                     
                  </td>
                  <td>
                     <?=$row['rer_phone']?>                     
                  </td>
                  <td>
                     <?=$row['rer_address']?>                     
                  </td>
                  <td>
                     <?=($row['rer_position'] ==0 || empty($arr_position[$row['rer_position']])) ?'Chưa chọn vị trí': $arr_position[$row['rer_position']]?>                     
                  </td>
                  <td>
                     <?=$arr_diploma[$row['rer_diploma']]?>                     
                  </td>
                  <td>
                     <?=$row['rer_diploma_detail']?>                     
                  </td>
                  <td>
                     <?=$row['rer_salary']?>                     
                  </td>
                  <td>
                     <?=$row['rer_message']?>
                  </td>
                  <td>
                     <?=$row['rer_other']?>
                  </td>
                  <?/*<td><?=form_dropdown('rer_cat_id'.$row[$id_field],$rer_cat_id,$row['rer_cat_id'],'class="form-control input-sm" onchange="check_edit(\'record_'.$i.'\')"')?></td>*/?>
                  <?//=$list->showCheckbox('rer_hot',$row['rer_hot'],$row[$id_field])?>
                  <?//=$list->showCheckbox('rer_active',$row['rer_active'],$row[$id_field])?>
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