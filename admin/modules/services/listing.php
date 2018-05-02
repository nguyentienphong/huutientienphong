<?php
require 'inc_security.php';
$catBase = new Category;
$ser_cat_id = array();
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="services"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $ser_cat_id[$cat["cat_id"]] = $tt . $cat["cat_name"];
}
                          
$list = new dataGrid('ser_id',20);
$list->add('','Ảnh','string',0,0);
$list->add('ser_title','Tiêu đề','string',1,1, 'width="120px"');
$list->add('ser_cat_id','Danh mục','array',1,1);
$list->add('','Tác giả','string');
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
                            ORDER BY '.$list->sqlSort().' ser_id DESC , ser_date DESC
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
                        <img src="<?=$row['ser_image']?>" alt="Không có ảnh"/>
                    </div>
                  </td>
                  <td>
                  
                        <?=form_input('ser_title'.$row[$id_field],$row['ser_title'],'class="form-control input-sm" onkeyup="check_edit(\'record_'.$i.'\')"')?>                     
                  </td>
                  <td><?=form_dropdown('ser_cat_id'.$row[$id_field],$ser_cat_id,$row['ser_cat_id'],'class="form-control input-sm" onchange="check_edit(\'record_'.$i.'\')"')?></td>
                  <td>
                  <div class="lrow">
                        <div class="span3 lcontent">
                           <?=get_log_add($row[$id_field],$bg_table)?>
                           <?=get_log_edit($row[$id_field],$bg_table)?>
                        </div>
                     </div>
                  </td>
                  <?=$list->showCheckbox('ser_hot',$row['ser_hot'],$row[$id_field])?>
                  <?=$list->showCheckbox('ser_active',$row['ser_active'],$row[$id_field])?>
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