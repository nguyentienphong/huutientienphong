<?
require_once '../config.php';
$result_json = getValue('result_json','arr','POST','');
$page = getValue('page','int','POST',1);
$fl_ticket_type = getValue('ticket_type','int',"POST",1);
$i=0;
foreach($result_json as $row){
   if($row['fl_price_go']!= 999999999){
      
      $i++;
      if($i>($page-1)*25 && $i<=$page*25 ){
      $loc_name_from = $general->loc_name($row['fl_from']);
      $loc_name_to = $general->loc_name($row['fl_to']);
?>
   <div class="search_result_one">
      <div class="search_result_one_left">
         <p class="price"><?=($fl_ticket_type == 1) ? format_price($row['fl_price_total']) : format_price($row['fl_price'])?></p>
         <div class="btn_order">
         <?if($fl_ticket_type == 1){?>
            <a href="javascript:;" onclick="return <?=($fl_ticket_type == 1) ? 'order_two_direction_go(this)': 'order_one_direction(this)'?>" fl_id='<?=$row['id']?>' airline_id ="<?=$row['airline_id']?>" pr_go="<?=$row['fl_price_go']?>" price_comeback="<?=$row['fl_price_comeback']?>">Đặt vé</a>
         <?}?>
         <?if($fl_ticket_type == 2){?>
            <a href="javascript:;" onclick="return <?=($fl_ticket_type == 1) ? 'order_two_direction_go(this)': 'order_one_direction(this)'?>" fl_id='<?=$row['id']?>' airline_id ="<?=$row['airline_id']?>">Đặt vé</a>
         <?}?>
         </div>
         <div class="bonus">
            <b>Tặng</b> <span>50.000</span>
         </div>
      </div
      ><div class="search_result_one_right">
         <div class="airline">
            <img src="/home/img/small_logo<?=$row['airline_id']?>.png"/><span class="airlines_name"><?=$airline_name[$row['airline_id']]?> - </span><span class="airlines_code"><?=$row['fl_flight']?></span>
            <a href="javascript:;" class="view_more" onclick="return view_more(this);" stt='<?=$i?>' fl_id='<?=$row['id']?>' airline_id ="<?=$row['airline_id']?>"><img src="/home/img/cong.png"/> Chi tiết chuyến bay</a>
         </div>
         <div class="fl_time_total fl_time_total_<?=$i?>">
            <span><?=getDateTime(1,1,1,0,'',$row['fl_time'])?></span>
            <span style="float: right;"><b>Thời gian bay : <?=fl_duration($row['airline_id'],$row['fl_duration'])?></b></span>
         </div>
         <div class="fl_info">
            <div class="fl_info_base_<?=$i?>">
               <p><b>Ngày bay</b> <?=getDateTime(1,1,1,0,'',$row['fl_time'])?></p>
               <div class="fl_info_blockone">
                  <span><b>Giờ bay</b> <?=$row['fl_departs']?></span><br />
                  <span><b>Bay từ</b> <?=$loc_name_from?> (<?=$row['fl_from']?>)</span><br />
                  <span><b>Mã hiệu</b> <?=$row['fl_flight']?></span>
               </div>
               <div class="fl_info_blockone" style="margin-top: 10px;">
                  <span class="fui-triangle-right-large"></span>
               </div>
               <div class="fl_info_blockone">
                  <span><b>Giờ đến</b>  <?=$row['fl_arrives']?></span><br />
                  <span><b>Bay đến</b> <?=$loc_name_to?> (<?=$row['fl_to']?>)</span><br />
               </div>
               <div class="fl_info_blockone" style="width: 105px;">
                  <?
                     $diemdung = $general->stops($row['fl_stops'])
                  ?>
                  <span><?=$diemdung?> </span><br />
               </div>
            </div>
            <div class="fl_info_detail fl_info_detail_<?=$i?>">
               
            </div>
         </div>
      </div>
   </div>

<?    
   }}
}
?>