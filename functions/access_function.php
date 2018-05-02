<?php
date_default_timezone_set('Asia/Bangkok');
$remote_addr = $_SERVER['REMOTE_ADDR'];
//Thống kê đang online
$access_time_in = time();
$access_time_log= $access_time_in - 900; //15 phut truoc
$online_count = 0;

$online_cache = $_SERVER['DOCUMENT_ROOT'].'/cache/online.cache';
$lines = file($online_cache);
$new_lines = '';
$remote_addr_line = $remote_addr.'++***++'.$access_time_in;
$new_lines .= "$remote_addr_line";
if(count($lines) > 0) {
   foreach($lines as $line_num => $line) {
      $if_loc = strpos($line,'++***++');
      $line_ip = substr($line,0,$if_loc);
      $line_time = substr($line,$if_loc+7);
      if($line_time > $access_time_log) {
         if($line_ip != $remote_addr) {
            $new_lines .= rtrim("\n$line");
         }
         $online_count++;
      }
   }
}
$open_w = fopen($online_cache, "w");
fwrite($open_w,"$new_lines");

//Lưu truy cập phiên theo ngày tháng năm
$accsess_time = getdate();
$ana_day = $accsess_time['mday'];
$ana_month = $accsess_time['mon'];
$ana_year = $accsess_time['year'];
if(!isset($_SESSION['analytics'])) {
    $_SESSION['analytics'] =  $remote_addr;
    $insert_access = new db_execute('INSERT INTO analytics(ana_ip,ana_day,ana_month,ana_year) VALUES("'.$remote_addr.'",'.$ana_day.','.$ana_month.','.$ana_year.')');
    unset($insert_access);
}
?>