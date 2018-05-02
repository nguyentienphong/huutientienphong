<?php
require 'inc_security.php';
                       
$list = new dataGrid('phu_id',30);
$list->add('con_name','Tên','string',1,0);
$list->add('con_email','Địa chỉ email','string',0,0);
$list->add('con_subject','Tiêu đề');
$list->add('con_detail','Chi tiết');
$db_count = new db_count('SELECT count(*) as count 
                            FROM contact
                            WHERE 1 '.$list->sqlSearch().'
                            ');
$total = $db_count->total;unset($db_count);

$db_listing = new db_query('SELECT * 
                            FROM contact
                            WHERE 1 '.$list->sqlSearch().'
                            ORDER BY '.$list->sqlSort().' con_date DESC
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
    <?=$list->start_tr($i,$row['con_id'])?>
    <td><?=$row['con_name']?></td>
    <td><?=$row['con_email']?></td>
    <td><?=$row['con_subject']?></td>
    <td>
        <label>Thời gian gửi : <?=date('d/m/Y - h:i a',$row['con_date'])?></label>
        <p><?=$row['con_detail']?></p>
    </td>
    <?=$list->end_tr()?>
    <?}?>
    <?=$list->showFooter()?>
</div>
</body>
</html>