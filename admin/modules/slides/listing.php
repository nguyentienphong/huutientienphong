<?php
require 'inc_security.php';
$catBase = new Category;
$list_cat = array();
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="'.$cat_type.'"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}
$sli_cat_id = $list_cat;
                          
$list = new dataGrid('sli_id',20);
$list->add('','Ảnh slide','string',0,0);
$list->add('sli_title','Tiêu đề ảnh','string',1,1, 'width="120px"');
//$list->add('sli_link','Link - đường dẫn','string',1,1,'width="120px"');
$list->add('sli_cat_id','Danh mục','array',1,0,'style="width: auto;"');
$list->add('sli_position','Thứ tự','string',0,1);
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
                            ORDER BY '.$list->sqlSort().' sli_id DESC 
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
                  <td class="center">
                    <div class="img_thumb">
                        <img src="<?=$row['sli_image']?>" alt="Không có ảnh"/>
                    </div>
                  </td>
                  <td>
                  
                        <?=form_input('sli_title'.$row[$id_field],$row['sli_title'],'class="form-control input-sm" onkeyup="check_edit(\'record_'.$i.'\')"')?>                     
                  </td>
                  <td>
                      <?=form_dropdown($cat_id_field.$row[$id_field],$list_cat,$row[$cat_id_field],'class="form-control input-sm" onchange="check_edit(\'record_'.$i.'\')"')?>
                   </td>
                  <td>
                  
                        <?=form_input('sli_position'.$row[$id_field],$row['sli_position'],'class="form-control input-sm" onkeyup="check_edit(\'record_'.$i.'\')"')?>                     
                  </td>
                  <?/*<td><?=form_dropdown('sli_cat_id'.$row[$id_field],$sli_cat_id,$row['sli_cat_id'],'class="form-control input-sm" onchange="check_edit(\'record_'.$i.'\')"')?></td>*/?>
                  <?//=$list->showCheckbox('sli_hot',$row['sli_hot'],$row[$id_field])?>
                  <?=$list->showCheckbox('sli_active',$row['sli_active'],$row[$id_field])?>
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