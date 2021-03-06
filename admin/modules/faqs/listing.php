<?php
require 'inc_security.php';
                         
$list = new dataGrid('faq_id',30);
$list->add('faq_title','Tiêu đề','string',1,0, 'width="120px"');
$list->add('faq_questions','Câu hỏi','string',1,0, 'width="120px"');;
$list->add('faq_date','Ngày','string');
$list->add('','Nổi bật','string');
$list->add('','Xuất bản','string');
$list->add('','Sửa','edit');
$list->add('','Xóa','delete');
$db_count = new db_count('SELECT count(*) as count 
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().'
                            ');
$total = $db_count->total;unset($db_count);

$db_listing = new db_query('SELECT * 
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().'
                            ORDER BY '.$list->sqlSort().' faq_id DESC , faq_date DESC
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
                  
                  <td width='350'>
                     <a class="llink" href="edit.php?record_id=<?=$row[$id_field]?>"><?=$row[$name_field]?></a>
                  </td>
                  <td class=""><?=$row['faq_questions']?></td>
                  
                  <td class="center"><?=date('d/m/Y',$row['faq_date'])?></td>
                  <?=$list->showCheckbox('faq_hot',$row['faq_hot'],$row[$id_field])?>
                  <?=$list->showCheckbox('faq_active',$row['faq_active'],$row[$id_field])?>
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