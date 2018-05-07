<?php
require 'inc_security.php';
/*$catBase = new Category;
$list_cat = array();
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="'.$bg_table.'"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $list_cat[$cat["cat_id"]] = $tt . $cat["cat_name"];
}
$cat_id_field = $list_cat;*/
                      
$list = new dataGrid('par_id',30);
$list->add('','Số điện thoại','string',1,1, 'width="120px"');
$list->add('','Email','string');;
$list->add('','Ngày nhận phòng','string');
$list->add('','Ngày trả phòng','string');
$list->add('','Ngày tạo yêu cầu','string');
$list->add('','Sửa','edit');
//$list->add('','Xóa','delete');
$db_count = new db_count('SELECT count(*) as count 
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().' '.$list->authorSearch($bg_table,$id_field).'
                            ');
$total = $db_count->total;unset($db_count);

$db_listing = new db_query('SELECT * 
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().' '.$list->authorSearch($bg_table,$id_field).'
                            ORDER BY '.$list->sqlSort().' '.$id_field.' DESC
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
               <td width='350'>
                  <a class="llink" href="edit.php?record_id=<?=$row[$id_field]?>"><?=$row['custumer_phone']?></a>
               </td>
               <td>
                  <div class="lrow"><?=$row['custumer_email']?></div>
               </td>
               <td>
                  <div class="lrow"><?=$row['checkin_date']?></div>
               </td>
			   <td>
                  <div class="lrow"><?=$row['checkout_date']?></div>
               </td>
			   <td>
                  <div class="lrow"><?=$row['create_date']?></div>
               </td>
				<?//=$list->showCheckbox('par_hot',$row['par_hot'],$row[$id_field])?>
				   <?//=$list->showCheckbox('par_active',$row['par_active'],$row[$id_field])?>
				   <?=$list->showEdit($row[$id_field])?>
				   <?//=$list->showDelete($row[$id_field])?>
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