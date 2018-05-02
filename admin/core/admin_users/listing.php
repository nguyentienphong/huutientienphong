<?php
require 'inc_security.php';
$list = new dataGrid('adm_id', 30);
$list->add('adm_loginname', 'Tên đăng nhập', 'string', 1, 1);
$list->add('', 'Phân quyền');
$list->add('', 'Mật khẩu mặc định');
$list->add('', 'Hoạt động', 'string');
$list->add('', 'Sửa', 'edit');
$list->add('', 'Xóa', 'delete');

$db_count = new db_count('SELECT count(*) as count 
                            FROM ' . $bg_table . '
                            WHERE 1 ' . $list->sqlSearch() . ' AND adm_isadmin = 0
                            ');
$total = $db_count->total;
unset($db_count);
$db_listing = new db_query('SELECT * 
                            FROM ' . $bg_table . '
                            WHERE 1 ' . $list->sqlSearch() . ' AND adm_isadmin = 0
                            ORDER BY ' . $list->sqlSort() . 'adm_loginname ASC
                            ' . $list->limit($total));
$total_row = mysql_num_rows($db_listing->result);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <?= $load_header ?>
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
                <?= $list->showHeader($total_row) ?>
                <?php
                $i = 0;
                ?>
                <?php while ($row = mysql_fetch_assoc($db_listing->result)) {
                    $i++;
                    ?>
                    <?= $list->start_tr($i, $row[$id_field]) ?>
                    <td class="center"><?= $row['adm_loginname'] ?></td>
                    <td class="center">
                        <?
                        $db_module = new db_query('SELECT adu_admin_module_id,mod_name
                                               FROM admin_users_right
                                               LEFT JOIN modules ON mod_id = adu_admin_module_id
                                               WHERE adu_admin_id = ' . $row['adm_id'] . '
                                               ORDER BY adu_admin_module_id ASC');
                        while ($row1 = mysql_fetch_assoc($db_module->result)) {
                            ?>
                            <span class="label label-success"><?= $row1['mod_name'] ?></span>
                        <? } ?>
                    </td>
                    <td class="center"><a
                            href="<?= call_module_file('admin_users', 'resetpass') ?>?id=<?= $row['adm_id'] ?>" title="Click vào đây để lấy lại mật khẩu mặc định là : 123456">123456</a></td>
                    <?= $list->showCheckbox('adm_active', $row['adm_active'], $row[$id_field]) ?>
                    <?= $list->showEdit($row[$id_field]) ?>
                    <?= $list->showDelete($row[$id_field]) ?>
                    <?= $list->end_tr() ?>
                <? } ?>
                <?= $list->showFooter() ?>
               </div>                      
            </section>
         </div>
      </div>
   </div>
</body>
</html>