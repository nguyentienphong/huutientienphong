<?php
function analytics_day($day,$month,$year) {
   $to_date = getdate();
   if(!$day) {
      $day = $to_date['mday'];
   }
   if(!$month) {
      $month = $to_date['mon'];
   }
   if(!$year) {
      $year = $to_date['year'];
   }
   $query = new db_count('SELECT count(ana_ip) as count FROM analytics WHERE ana_day = '.$day.' AND ana_month = '.$month.' AND ana_year = '.$year.'');
   $access = $query->total;
   unset($query);
   return $access;
}
function analytics_month($month,$year) {
   $to_date = getdate();
   if(!$month) {
      $month = $to_date['mon'];
   }
   if(!$year) {
      $year = $to_date['year'];
   }
   $query = new db_count('SELECT count(ana_ip) as count FROM analytics WHERE ana_month = '.$month.' AND ana_year = '.$year.'');
   $access = $query->total;
   unset($query);
   return $access;
}
function analytics_year($year) {
   $to_date = getdate();
   if(!$year) {
      $year = $to_date['year'];
   }
   $query = new db_count('SELECT count(ana_ip) as count FROM analytics WHERE ana_year = '.$year.'');
   $access = $query->total;
   unset($query);
   return $access;
}
function analytics_all() {
   $query = new db_count('SELECT count(ana_ip) as count FROM analytics WHERE 1');
   $access = $query->total;
   unset($query);
   return $access;
}
?>