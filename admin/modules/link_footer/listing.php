<?php
require 'inc_security.php';
     
$list = new dataGrid('lft_id',30);
$list->add('lft_title','Tiêu đề','string',1,1, 'width="120px"');
$list->add('lft_link','Link','string',0,0, 'width="120px"');
$list->add('lft_position','Thứ tự','string',0,1);
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
                            ORDER BY '.$list->sqlSort().' lft_position ASC
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
<div class="module_header bold fix"><?=$module_name?></div>
<div id="wrapper">
    <?=$list->showHeader($total_row)?>
    <?php
    $i = 0; 
    ?>
    <?php while($row = mysql_fetch_assoc($db_listing->result)){
        $i++;
    ?>
    <?=$list->start_tr($i,$row[$id_field])?>
    <td>
        <div class="row">
            <div class="span3"><?=form_input('lft_title'.$row[$id_field],$row['lft_title'],'class="span3" onkeyup="check_edit(\'record_'.$i.'\')"')?></div>
        </div>
    </td>
    
    <td>
        <div class="row">
            <div class="span6"><?=form_input('lft_link'.$row[$id_field],$row['lft_link'],'class="span6" onkeyup="check_edit(\'record_'.$i.'\')"')?></div>
        </div>
    </td>
    <td class="center"><?=form_input('lft_position'.$row[$id_field],$row['lft_position'],'style="width:30px;text-align:center" onkeyup="check_edit(\'record_'.$i.'\')"')?></td>
   
    <?=$list->showCheckbox('lft_active',$row['lft_active'],$row[$id_field])?>
    <?=$list->showEdit($row[$id_field])?>
    <?=$list->showDelete($row[$id_field])?>
    <?=$list->end_tr()?>
    <?}?>
    <?=$list->showFooter()?>
</div>
</body>
</html>