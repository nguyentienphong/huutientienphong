<?php
require_once 'resources/security/security.php';
require_once ROOT.'/functions/analytics_function.php';
$arr_analytics = array();
$arr_analytics_month = array();
$totime = time();
for($i=30;$i>=0;$i--) {
   $thdate = getdate($totime - $i*86400);
   $thday = $thdate['mday'];
   $thmonth = $thdate['mon'];
   $thyear = $thdate['year'];
   $tharr = array();
   $tharr['day'] = $thday.'-'.$thmonth.'-'.$thyear;
   $tharr['access'] = analytics_day($thday,$thmonth,$thyear);
   $arr_analytics[] = $tharr;
}
for($j=11;$j>=0;$j--) {
   $format_time = '- '.$j.' month';
   $time_get = strtotime($format_time,$totime);
   $thdate = getdate($time_get);
   $thmonth = $thdate['mon'];
   $thyear = $thdate['year'];
   $tharr = array();
   $tharr['day'] = $thmonth.'-'.$thyear;
   $tharr['access'] = analytics_month($thmonth,$thyear);
   $arr_analytics_month[] = $tharr;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?=$load_header?>
<link rel="stylesheet" type="text/css" href="/admin/resources/js/morris-chart/morris-0.4.3.min.css">
<script type="text/javascript" src="/admin/resources/js/morris-chart/raphael-min.js"></script>
<script type="text/javascript" src="/admin/resources/js/morris-chart/morris-0.4.3.min.js"></script>
</head>

<body>
<div class="page-heading">
   <h3>
       Chào mừng bạn đến với trang quản lý
   </h3>
</div>
<div class="wrapper">
   <div class="row">
       <div class="col-md-8">
           <section class="panel">
               <header class="panel-heading">
                   Truy cập website 30 ngày gần đây
               </header>
               <div class="panel-body">
                   <div id="graph-line">
                     
                  </div>
               </div>
           </section>
       </div>
       <div class="col-md-4">
            <section class="panel">
               <header class="panel-heading">
                   Truy cập website 12 tháng gần đây
               </header>
               <div class="panel-body">
                   <div id="graph-line-month">
                     
                  </div>
               </div>
           </section>
       </div>
   </div>
</div>
<script>
	new Morris.Line({
	  // ID of the element in which to draw the chart.
	  element: 'graph-line',
	  // Chart data records -- each entry in this array corresponds to a point on
	  // the chart.
	  data: [
     <?php
     foreach($arr_analytics as $value) {
         ?>
         { date: '<?=$value['day']?>', value: <?=$value['access']?> },
         <?
     }
     ?>
	  ],
	  // The name of the data record attribute that contains x-values.
	  xkey: 'date',
	  // A list of names of data record attributes that contain y-values.
	  ykeys: ['value'],
	  // Labels for the ykeys -- will be displayed when you hover over the
	  // chart.
	  labels: ['Truy cập'],
     //Bo dinh dang thoi gian cua morris xkey
	  parseTime: false,
     //cỡ chữ trên các cột xy
     gridTextSize: 10,
     //độ rộng đường biểu đồ
     lineWidth: 2
	});
	new Morris.Line({
	  // ID of the element in which to draw the chart.
	  element: 'graph-line-month',
	  // Chart data records -- each entry in this array corresponds to a point on
	  // the chart.
	  data: [
     <?php
     foreach($arr_analytics_month as $value) {
         ?>
         { date: '<?=$value['day']?>', value: <?=$value['access']?> },
         <?
     }
     ?>
	  ],
	  // The name of the data record attribute that contains x-values.
	  xkey: 'date',
	  // A list of names of data record attributes that contain y-values.
	  ykeys: ['value'],
	  // Labels for the ykeys -- will be displayed when you hover over the
	  // chart.
	  labels: ['Truy cập'],
     //Bo dinh dang thoi gian cua morris xkey
	  parseTime: false,
     //cỡ chữ trên các cột xy
     gridTextSize: 10,
     //độ rộng đường biểu đồ
     lineWidth: 2
	});
</script>
</body>
</html>
