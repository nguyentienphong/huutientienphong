<?php
function convertDateTime($strDate = "", $strTime = ""){
	//Break string and create array date time
	$array_replace	= array("/", ":");
	$strDate			= str_replace($array_replace, "-", $strDate);
	$strTime			= str_replace($array_replace, "-", $strTime);
	$strDateArray	= explode("-", $strDate);
	$strTimeArray	= explode("-", $strTime);
	$countDateArr	= count($strDateArray);
	$countTimeArr	= count($strTimeArray);
	
	//Get Current date time
	$today			= getdate();
	$day				= $today["mday"];
	$mon				= $today["mon"];
	$year				= $today["year"];
	$hour				= $today["hours"];
	$min				= $today["minutes"];
	$sec				= $today["seconds"];
	//Get date array
	switch($countDateArr){
		case 2:
			$day		= intval($strDateArray[0]);
			$mon		= intval($strDateArray[1]);
			break;
		case $countDateArr >= 3:
			$day		= intval($strDateArray[0]);
			$mon		= intval($strDateArray[1]);
			$year 	= intval($strDateArray[2]);
			break;
	}
	//Get time array
	switch($countTimeArr){
		case 2:
			$hour		= intval($strTimeArray[0]);
			$min		= intval($strTimeArray[1]);
			break;
		case $countTimeArr >= 3:
			$hour		= intval($strTimeArray[0]);
			$min		= intval($strTimeArray[1]);
			$sec		= intval($strTimeArray[2]);
			break;
	}
	//Return date time integer
	if(@mktime($hour, $min, $sec, $mon, $day, $year) == -1) return $today[0];
	else return mktime($hour, $min, $sec, $mon, $day, $year);
}

/*
 * Lấy time (int) tại thời điểm bắt đầu của ngày hiện tại
 */
function getBeginTimeToday(){
    $today			    = getdate();
    $day				= $today["mday"];
    $mon				= $today["mon"];
    $year				= $today["year"];
    return mktime(0,0,0,$mon,$day,$year);
}

/*
 * Lấy time (int) tại thời điểm kết thúc ngày hiện tại
 */
function getEndTimeToday(){
    $today			    = getdate();
    $day				= $today["mday"];
    $mon				= $today["mon"];
    $year				= $today["year"];
    return mktime(23,59,59,$mon,$day,$year);
}

function getDateTime($language=1, $getDay=1, $getDate=1, $getTime=1, $timeZone="GMT+7", $intTimestamp=0){
	if($intTimestamp > 0){
		$today	= getdate($intTimestamp);
		$day		= $today["wday"];
		$date		= date("d/m/Y", $intTimestamp);
		$time		= date("H:i", $intTimestamp);
	}
	else{
		$today	= getdate();
		$day		= $today["wday"];
		$date		= date("d/m/Y");
		$time		= date("h:i");
	}
	switch($language){
		case 1: $dayArray = array("Chủ nhật", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"); break;
		case 2: $dayArray = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"); break;
        case 3: $dayArray = array("일요일", "월요일", "화요일", "수요일", "목요일", "금요일", "토요일"); break;
		default:$dayArray = array("Chủ nhật", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7"); break;
	}
	$strDateTime = "";
	for($i=0; $i<=6; $i++){
		if($i == $day){
			if($getDay	!= 0)	$strDateTime .= $dayArray[$i] . " - ";
			if($getDate	!= 0)	$strDateTime .= $date . " ";
			if($getTime	!= 0)	$strDateTime .= $time . " ";
			$strDateTime .= $timeZone;
			if(substr($strDateTime, -2, 2) == ", ") $strDateTime = substr($strDateTime, 0, -2);
			return $strDateTime;
		}
	}
}

function today_yesterday($td_day, $td_month, $td_year, $ye_day, $ye_month, $ye_year, $compare_time){
	$ct = getdate($compare_time);
	//Kiểm tra so với hôm nay
	if($td_day==$ct["mday"] && $td_month==$ct["month"] && $td_year==$ct["year"]) return tdt("Hom_nay,_luc") . " " . date("H:i", $compare_time);
	if($ye_day==$ct["mday"] && $ye_month==$ct["month"] && $ye_year==$ct["year"]) return tdt("Hom_qua,_luc") . " " . date("H:i", $compare_time);
	//Nếu không trùng thì return lại
	return date("d/m/Y - H:i",$compare_time);
}

function getTodayYesterdayString($time){
    //So sánh với ngày hôm nay
    $now = getdate(time());
    $ct = getdate($time);
    if($ct['mday'] == $now['mday'] && 
        $ct['mon'] == $now['mon'] && 
        $ct['year'] == $now['year'] && 
        $ct['hours'] < $now['hours']-1){
        return 'Hôm nay, lúc '.$ct['hours'].':'.$ct['minutes'];
    }
    else if($ct['mday'] == $now['mday']-1 &&
            $ct['mon'] == $now['mon'] &&
            $ct['year'] == $now['year']){
                return 'Hôm qua, lúc '.$ct['hours'].':'.$ct['minutes'];
            }
    else if((time()-$time) < 60*60 && (time() - $time) > 60 ){
        return 'Khoảng '.intval((time() - $time)/60) . ' phút trước';
    } 
    else if((time()-$time) < 60){
        return 'Khoảng vài giây trước';
    }
    else {
        return ''.date('h:i a d/m/Y',$time);
    }        
}
?>