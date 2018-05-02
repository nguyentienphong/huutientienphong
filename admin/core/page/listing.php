<?php
require 'inc_security.php';
     
$list = new dataGrid('pag_id',30);
$list->add('pag_title','Tiêu đề','string',1,1);
$list->add('','Thông tin','string');
$list->add('','Xuất bản','string');
$list->add('','Sửa','edit');
$list->add('','Xóa','delete');
$db_count = new db_count('SELECT count(*) as count 
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().' '.$list->authorSearch($bg_table,$id_field).'
                            ');
$total = $db_count->total;unset($db_count);

$db_listing = new db_query('SELECT * 
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().' '.$list->authorSearch($bg_table,$id_field).'
                            ORDER BY '.$list->sqlSort().' pag_id DESC
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
               <?=$list->showHeader($total_row,'',1)?>
               <?php
               $i = 0; 
               ?>
               <?php while($row = mysql_fetch_assoc($db_listing->result)){
                 $i++;
               ?>
               <?=$list->start_tr($i,$row[$id_field])?>
               <td style="width:580px">
                  <a class="llink" href="edit.php?record_id=<?=$row[$id_field]?>"><?=$row[$name_field]?></a>
               </td>
               <td>
                  <div class="lrow">
                     <div class="span1 ltitle">Ngày</div>
                     <div class="span3 lcontent"><?=date('d/m/Y - H:ia',$row['pag_date'])?></div>
                  </div>
                  <div class="lrow">
                     <div class="span1 ltitle"></div>
                     <div class="span3 lcontent">
                        <?=get_log_add($row[$id_field],$bg_table)?>
                        <?=get_log_edit($row[$id_field],$bg_table)?>
                     </div>
                  </div>
               </td>
               <?=$list->showCheckbox('pag_active',$row['pag_active'],$row[$id_field])?>
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