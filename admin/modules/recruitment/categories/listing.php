<?php
require 'inc_security.php';
$list = new dataGrid('cat_id',30);
$list->add('cat_name','Tên danh mục','string',1,1);
$list->add('cat_alias','Đường dẫn','string',1,0);
$list->add('cat_order','Thứ tự','string',0,1);
$list->add('','Xuất bản','string');
$list->add('','Sửa','edit');
$list->add('','Xóa','delete');
$arrCat = $catBase->list_categories(0,'cat_type = "'.$cat_type.'" '. $list->sqlSearch(),'cat_id,cat_parent_id,cat_order,cat_active,cat_name,cat_alias,cat_type',$list->sqlSort().'cat_id ASC');
$db_count = new db_count('SELECT count(*) as count
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().'
                            ');
$total = $db_count->total;unset($db_count);
$list->total_record = $total;
$total_row = $total;
$list_cat = array();
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|— ';
    $list_cat[$cat["cat_id"]]['cat_name'] = $cat["cat_name"];
    $list_cat[$cat['cat_id']]['cat_alias'] = $cat['cat_alias'];
    $list_cat[$cat['cat_id']]['cat_type'] = $cat['cat_type'];
    $list_cat[$cat['cat_id']]['cat_order'] = $cat['cat_order'];
    $list_cat[$cat['cat_id']]['cat_active'] = $cat['cat_active'];
    $list_cat[$cat['cat_id']]['cat_parent_id'] = $cat['cat_parent_id'];
    $list_cat[$cat['cat_id']]['cat_level'] = $cat['level'];
    $list_cat[$cat['cat_id']]['cat_level_str'] = $tt;

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=$load_header?>
<style>
#table-listing input {
   border: none;
   background: transparent;
   box-shadow: none;
}
#table-listing input:hover {
   border: 1px solid #fc8888;
   background: #fff;
   border-color: rgba(82, 168, 236, 0.8);
  outline: 0;
  outline: thin dotted \9;
  /* IE6-9 */

  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
}
</style>
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
               <a href="add.php"><button class="btn btn-success mgl5" type="button"><i class="fa fa-plus-square"></i> Thêm mới </button></a>
               <?=$list->showHeader($total_row)?>
                <?php
                $i = 0;
                ?>
                <?php foreach($list_cat as $key=>$value){
                    $i++;
                    ?>
                    <?=$list->start_tr($i,$key)?>
                    <td><?=$value['cat_level_str']?><?=form_input('cat_name'.$key,$value['cat_name'],'class="form-control input-sm"" onkeyup="check_edit(\'record_'.$i.'\')"')?></td>
                    <td class="center"><?=form_input('cat_alias'.$key,$value['cat_alias'],'class="form-control input-sm" onkeyup="check_edit(\'record_'.$i.'\')"')?></td>
                    <td class="center"><?=form_input('cat_order'.$key,$value['cat_order'],'style="width:30px;text-align:center" onkeyup="check_edit(\'record_'.$i.'\')"')?></td>
                    <?=$list->showCheckbox('cat_active',$value['cat_active'],$key)?>
                    <?=$list->showEdit($key)?>
                    <?=$list->showDelete($key)?>
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