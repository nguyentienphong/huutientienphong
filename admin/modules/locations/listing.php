<?php
require 'inc_security.php';
/*$catBase = new Category;
$loc_cat_id = array();
$arrCat = $catBase->list_categories(0,'cat_active = 1 AND cat_type="services"','cat_id,cat_name,cat_type','cat_id ASC');
foreach($arrCat as $i=>$cat){
    $tt = '';
    for($j=0;$j<$cat["level"];$j++) $tt .= '|--';
    $loc_cat_id[$cat["cat_id"]] = $tt . $cat["cat_name"];
}*/
                          
$list = new dataGrid('loc_id',30);
$list->add('loc_code','Mã','string',1,1, 'width="120px"');
$list->add('loc_name','Tên quốc tế','string',1,1);
$list->add('loc_name_vn','Tên việt','string',1,1);
$list->add('loc_flight_code','Hãng hàng không','string',1,1);
$db_count = new db_count('SELECT count(*) as count 
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().'
                            ');
$total = $db_count->total;unset($db_count);

$db_listing = new db_query('SELECT * 
                            FROM '.$bg_table.'
                            WHERE 1 '.$list->sqlSearch().'
                            ORDER BY '.$list->sqlSort().' loc_id DESC
                            '.$list->limit($total));
$total_row = mysql_num_rows($db_listing->result);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?=$load_header?>
<style>
.footer a:first-child{
   display:none
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
                  <?=$list->showHeader($total)?>
                  <?php
                  $i = 0; 
                  ?>
                  <?php while($row = mysql_fetch_assoc($db_listing->result)){
                    $i++;
                  ?>
                  <?=$list->start_tr($i,$row[$id_field])?>
                  <td class="center">
                       <?=$row['loc_code']?>
                  </td>
                  <td class="center">  
                        <?=$row['loc_name']?>             
                  </td>
                  <td class="center">  
                        <?=$row['loc_name_vn']?>             
                  </td>
                  <td class="center">  
                        <?=$row['loc_flight_code']?>             
                  </td>
                  <?//=$list->showCheckbox('loc_hot',$row['loc_hot'],$row[$id_field])?>
                  <?//=$list->showCheckbox('loc_active',$row['loc_active'],$row[$id_field])?>
                  <?//=$list->showEdit($row[$id_field])?>
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