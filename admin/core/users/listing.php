<?php
require 'inc_security.php';
                          
$list = new dataGrid('use_id',30);
//$list->add('','Ảnh','string',0,0);
$list->add('use_email','Email','string',1,1, 'width="180px;"');
//$list->add('use_phone','Điện thoại','string',1,1);
//$list->add('use_contact','Đia chỉ','string',0,0);
$list->add('','Active','string');
$list->add('','Edit','edit');
$list->add('','Delete','delete');
$db_count = new db_count('SELECT count(*) as count 
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().'
                            ');
$total = $db_count->total;unset($db_count);

$db_listing = new db_query('SELECT * 
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().'
                            ORDER BY '.$list->sqlSort().' use_id DESC , use_date DESC
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
            
            <div class="span3"><?=form_input('use_email'.$row[$id_field],$row['use_email'],'class="span3" onkeyup="check_edit(\'record_'.$i.'\')"')?></div>
        </div>
    </td>
    <?=$list->showCheckbox('use_active',$row['use_active'],$row[$id_field])?>
    <?=$list->showEdit($row[$id_field])?>
    <?=$list->showDelete($row[$id_field])?>
    <?=$list->end_tr()?>
    <?}?>
    <?=$list->showFooter()?>
</div>
</body>
</html>