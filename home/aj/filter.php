<?
require_once '../config.php';
global $arr_filter;
$arr_filter = getValue('arr_filter','arr','POST',NULL);
$fl_ticket_type = getValue('direction','str','POST',1);
//dump($arr_filter);
$result_json = getValue('result_json','arr','POST','');
//dump($result_json);
function ft2($var) 
      {
         return (is_array($var) && $var['fl_price'] <= 1000000);
      }
function ft3($var) 
      {
         return (is_array($var) && $var['fl_price'] > 1000000 && $var['fl_price'] <= 1500000 );
      }
function ft4($var) 
      {
         return (is_array($var) && $var['fl_price'] > 1500000);
      }
function ft6($var) 
      {
         return (is_array($var) && $var['airline_id'] == 1);
      }
function ft7($var) 
      {
         return (is_array($var) && $var['airline_id'] == 2);
      }
function ft8($var) 
      {
         return (is_array($var) && $var['airline_id'] == 3);
      }
function ft10($var) 
      {
         return (is_array($var) && $var['fl_stops'] == 0);
      }
function ft11($var) 
      {
         return (is_array($var) && preg_match('/1/',$var['fl_stops']));
      }
   $ft2 = array_filter($result_json, 'ft2');
   $ft3 = array_filter($result_json, 'ft3');
   $ft4 = array_filter($result_json, 'ft4');
   
   $arr_ft_gia = $result_json;
   if(in_array(2,$arr_filter)) $arr_ft_gia = $ft2;
   if(in_array(3,$arr_filter)) $arr_ft_gia = $ft3;
   if(in_array(4,$arr_filter)) $arr_ft_gia = $ft4;
   if(in_array(2,$arr_filter) && in_array(3,$arr_filter)) $arr_ft_gia = array_merge($ft2,$ft3);
   if(in_array(2,$arr_filter) && in_array(4,$arr_filter)) $arr_ft_gia = array_merge($ft2,$ft4);
   if(in_array(3,$arr_filter) && in_array(4,$arr_filter)) $arr_ft_gia = array_merge($ft3,$ft4);
   if(in_array(2,$arr_filter) && in_array(3,$arr_filter) && in_array(4,$arr_filter)) $arr_ft_gia = array_merge($ft2,$ft3,$ft4);
   
   $ft6 = array_filter($arr_ft_gia, 'ft6');
   $ft7 = array_filter($arr_ft_gia, 'ft7');
   $ft8 = array_filter($arr_ft_gia, 'ft8');
   
   $arr_ft_gia_hang = $arr_ft_gia;
   if(in_array(6,$arr_filter)) $arr_ft_gia_hang = $ft6;
   if(in_array(7,$arr_filter)) $arr_ft_gia_hang = $ft7;
   if(in_array(8,$arr_filter)) $arr_ft_gia_hang = $ft8;
   if(in_array(6,$arr_filter) && in_array(7,$arr_filter)) $arr_ft_gia_hang = array_merge($ft6,$ft7);
   if(in_array(6,$arr_filter) && in_array(8,$arr_filter)) $arr_ft_gia_hang = array_merge($ft6,$ft8);
   if(in_array(7,$arr_filter) && in_array(8,$arr_filter)) $arr_ft_gia_hang = array_merge($ft7,$ft8);
   if(in_array(6,$arr_filter) && in_array(7,$arr_filter) && in_array(8,$arr_filter)) $arr_ft_gia_hang = array_merge($ft6,$ft7,$ft8);
   
   $ft10 = array_filter($arr_ft_gia_hang, 'ft10');
   $ft11 = array_filter($arr_ft_gia_hang, 'ft11');
   $arr_ft_gia_hang_diemdung = $arr_ft_gia_hang;
   if(in_array(10,$arr_filter)) $arr_ft_gia_hang_diemdung = $ft10;
   if(in_array(11,$arr_filter)) $arr_ft_gia_hang_diemdung = $ft11;
   //dump($arr_ft_gia_hang_diemdung);
   if($arr_ft_gia_hang_diemdung){
      foreach ($arr_ft_gia_hang_diemdung as $key => $row) {
          $volume[$key]  = $row['fl_price'];
          $edition[$key] = $row['fl_departs'];
      }
      array_multisort($volume, SORT_ASC, $edition, SORT_ASC, $arr_ft_gia_hang_diemdung);
      $arr_ft_gia_hang_diemdung_json = json_encode($arr_ft_gia_hang_diemdung);
?>
   <div class="search_result_list_go filtered">
<?
   $i=0;
      foreach($arr_ft_gia_hang_diemdung as $row){
         $i++;
         if($i<=25){
         $loc_name_from = $general->loc_name($row['fl_from']);
         $loc_name_to = $general->loc_name($row['fl_to']);
?>
            <div class="search_result_one">
               <div class="search_result_one_left">
                  <p class="price"><?=format_price($row['fl_price'])?></p>
                  <div class="btn_order">
                     <a href="javascript:;" onclick="return <?=($fl_ticket_type ==1 )? 'order_two_direction_go(this)':'order_one_direction(this)'?>" fl_id='<?=$row['id']?>' airline_id ="<?=$row['airline_id']?>" pr_go="<?=$row['fl_price_go']?>" price_comeback="<?=$row['fl_price_comeback']?>">Đặt vé</a>
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
   }else echo "Không có kết quả nào !";
   
?>
<div id="loadmoreajaxloader" onclick="return loadmore1(this)" page=2><center>Click để xem thêm</center></div>
<script>
function loadmore1(obj){
   var i = parseInt($(obj).attr('page'));
   $(obj).attr('page',i+1);
   //alert(i);
   $.ajax({
      type:'post',
     url: "/home/aj/loadmore.php",
     data:{page:i, ticket_type:<?=$fl_ticket_type?> <?if($arr_ft_gia_hang_diemdung_json){?> ,result_json:<?=$arr_ft_gia_hang_diemdung_json?><?}?>},
     success: function(html)
     {
         if(html)
         {
             $(".search_result_list_go").append(html);
             //$('div#loadmoreajaxloader').hide();
         }else
         {
             $('div#loadmoreajaxloader').show();
             $('div#loadmoreajaxloader').html('<center>Không còn chuyến bay.</center>');
         }
     }
     });
}
   /*function loadmore1(j){
      $.ajax({
         type:'post',
        url: "/home/aj/loadmore.php",
        data:{page:j, ticket_type:<?=$fl_ticket_type?> <?if($arr_ft_gia_hang_diemdung_json){?> ,result_json:<?=$arr_ft_gia_hang_diemdung_json?><?}?>},
        success: function(html)
        {
            if(html)
            {
                $(".search_result_list_go").append(html);
                //$('div#loadmoreajaxloader').hide();
            }else
            {
                $('div#loadmoreajaxloader').show();
                $('div#loadmoreajaxloader').html('<center>Không còn chuyến bay.</center>');
            }
        }
        });
}*/
            
</script>
</div>
<div class="search_result_list_comeback">
                     
                     </div>