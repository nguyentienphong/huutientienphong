<?php
function replace_keyword_search($keyword, $lower=1){
	if($lower == 1) $keyword	= mb_strtolower($keyword, "UTF-8");
	$keyword	= replaceMQ($keyword);
	//$arrRep	= array( "-", '"', "+", "=", "*", "?", "/", "!", "~", "#", "@", "%", "$", "^", "&", "(", ")", ";", ":", "\\", ".", ",", "[", "]", "{", "}", "‘", "’", '“', '”');
	$arrRep	= array( "-", '"', "+", "=", "*", "/", "~", "#", "@", "%", "$", "^", "(", ")", ";", "\\",  ",", "[", "]", "{", "}", "‘", "’", '“', '”');
	$keyword	= str_replace($arrRep, " ", $keyword);
	$keyword	= str_replace("  ", " ", $keyword);
	$keyword	= str_replace("  ", " ", $keyword);
	return $keyword;
}
function dump($value) {
    echo '<pre>';
    print_r($value);
    echo '</pre>';
}
function showSeoMeta($table_name,$post_id) {
    $db_seo_meta = new db_query('SELECT * FROM meta_seo WHERE met_type = "'.$table_name.'" AND met_post_id = '.$post_id.' LIMIT 1');
    $seo_meta = mysql_fetch_assoc($db_seo_meta->result);unset($db_seo_meta);
    if($seo_meta && $seo_meta != '') {
        return '<title>'.$seo_meta['met_title'].'</title>
        <meta name="description" content="'.$seo_meta['met_description'].'"/>';
    }else {
        return '';
    }
}
function cut_string($str, $length, $char=" ..."){
	//Nếu chuỗi cần cắt nhỏ hơn $length thì return luôn
	$strlen	= mb_strlen($str, "UTF-8");
	if($strlen <= $length) return $str;
	
	//Cắt chiều dài chuỗi $str tới đoạn cần lấy
	$substr	= mb_substr($str, 0, $length, "UTF-8");
	if(mb_substr($str, $length, 1, "UTF-8") == " ") return $substr . $char;
	
	//Xác định dấu " " cuối cùng trong chuỗi $substr vừa cắt
	$strPoint= mb_strrpos($substr, " ", "UTF-8");
	
	//Return string
	if($strPoint < $length - 20) return $substr . $char;
	else return mb_substr($substr, 0, $strPoint, "UTF-8") . $char;
}
function deleteDir($dir){
    //kiem tra ton tai
    if(!file_exists($dir) || !is_dir($dir)){
        return true;
    }
    $it = new RecursiveDirectoryIterator($dir);
    $files = new RecursiveIteratorIterator($it,
        RecursiveIteratorIterator::CHILD_FIRST);
    foreach($files as $file) {
        if ($file->getFilename() === '.' || $file->getFilename() === '..') {
            continue;
        }
        if ($file->isDir()){
            rmdir($file->getRealPath());
        } elseif($file->isFile()) {
            unlink($file->getRealPath());
        }
    }
    rmdir($dir);
}
function error_page($code){
    switch($code){
        case '404':
            redirect('/home/404.php');
            break;
    }
}
function format_number($number, $edit=0){
	if($edit == 0){
		$return	= number_format($number, 2, ".", ",");
		if(intval(substr($return, -2, 2)) == 0) $return = number_format($number, 0, ".", ",");
		elseif(intval(substr($return, -1, 1)) == 0) $return = number_format($number, 1, ".", ",");
		return $return;
	}
	else{
		$return	= number_format($number, 2, ".", "");
		if(intval(substr($return, -2, 2)) == 0) $return = number_format($number, 0, ".", "");
		return $return;
	}
}
function format_price($price){
    return number_format($price, 0, ',', '.') . ' đ';
}
function format_price_fontend($price){
    return number_format($price, 0, ',', '.');
}
function getValue($value_name, $data_type = "int", $method = "GET", $default_value = 0, $advance = 0){
	$value = $default_value;
	switch($method){
		case "GET": if(isset($_GET[$value_name])) $value = $_GET[$value_name]; break;
		case "POST": if(isset($_POST[$value_name])) $value = $_POST[$value_name]; break;
		case "COOKIE": if(isset($_COOKIE[$value_name])) $value = $_COOKIE[$value_name]; break;
		case "SESSION": if(isset($_SESSION[$value_name])) $value = $_SESSION[$value_name]; break;
		default: if(isset($_GET[$value_name])) $value = $_GET[$value_name]; break;
	}
	$valueArray	= array("int" => @intval($value), "str" => @trim(strval($value)), "flo" => @floatval($value), "dbl" => @doubleval($value), "arr" => $value);
	foreach($valueArray as $key => $returnValue){
		if($data_type == $key){
			if($advance != 0){
				switch($advance){
					case 1:
						$returnValue = replaceMQ($returnValue);
						break;
					case 2:
						$returnValue = htmlspecialbo($returnValue);
						break;
				}
			}
			//Do số quá lớn nên phải kiểm tra trước khi trả về giá trị
			if((@strval($returnValue) == "INF") && ($data_type != "str") && ($data_type != 'arr')) return 0;
			return $returnValue;
			break;
		}
	}
	return (intval($value));
}
function getURL($serverName=0, $scriptName=0, $fileName=1, $queryString=1, $varDenied=''){
	$url	 = '';
	$slash = '/';
	if($scriptName != 0)$slash	= "";
	if($serverName != 0){
		if(isset($_SERVER['SERVER_NAME'])){
			$url .= 'http://' . $_SERVER['SERVER_NAME'];
			if(isset($_SERVER['SERVER_PORT'])) $url .= ":" . $_SERVER['SERVER_PORT'];
			$url .= $slash;
		}
	}
	if($scriptName != 0){
		if(isset($_SERVER['SCRIPT_NAME']))	$url .= substr($_SERVER['SCRIPT_NAME'], 0, strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
	}
	if($fileName	!= 0){
		if(isset($_SERVER['SCRIPT_NAME']))	$url .= substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
	}
	if($queryString!= 0){
		$url .= '?';
		reset($_GET);
		$i = 0;
		if($varDenied != ''){
			$arrVarDenied = explode('|', $varDenied);
			while(list($k, $v) = each($_GET)){
				if(array_search($k, $arrVarDenied) === false){
					$i++;
					if($i > 1) $url .= '&' . $k . '=' . @urlencode($v);
					else $url .= $k . '=' . @urlencode($v);
				}
			}
		}
		else{
			while(list($k, $v) = each($_GET)){
				$i++;
				if($i > 1) $url .= '&' . $k . '=' . @urlencode($v);
				else $url .= $k . '=' . @urlencode($v);
			}
		}
	}
	$url = str_replace('"', '&quot;', strval($url));
	return $url;
}


function getYouTubeIdFromURL($url)
{
    //$url_string = parse_url($url, PHP_URL_QUERY);
    $url_string = parse_url($url);
    if(preg_match('/ytimg.com/i', $url) > 0) {
        $prts = explode('/', $url);
        return isset($prts[4]) ? $prts[4] : '';
    } else {
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
        $tmp = isset($matches[0]) ? $matches[0] : '';
        if($tmp){
            $tmp = explode('#',$tmp);
            $tmp = $tmp[0];
        }
        return $tmp;
    }
}


function htmlspecialbo($str){
	$arrDenied	= array('<', '>', '\"', '"');
	$arrReplace	= array('&lt;', '&gt;', '&quot;', '&quot;');
	$str = str_replace($arrDenied, $arrReplace, $str);
	return $str;
}



function get_link_redirect(){
    return urldecode(getValue('continue','str','GET',''));
}

/**
 * insert text vào bảng suggest, phục vụ cho việc suggest
 */
function insert_suggest_text($array_text){
    if(is_array($array_text)){
        if(empty($array_text))    return false;
        $str = '';
        foreach($array_text as $text){
            $str .= '("'.$text . '"),';
        }

        $str = rtrim($str,',');
        $db_ex = new db_execute('INSERT IGNORE INTO suggestion_text(sug_text) VALUES '.$str);
    }else{
        $db_ex = new db_execute('INSERT IGNORE INTO suggestion_text(sug_text) VALUES ("'.$array_text.'")');
    }

    unset($db_ex);
}
function link_redirect($url_redirect, $url_return){
    return $url_redirect . '?continue='.urlencode($url_return);
}
function microtime_float(){
   list($usec, $sec) = explode(" ", microtime());
   return ((float)$usec + (float)$sec);
}

function prepare_text_article($str){
    if(!$str) return '';
    //Xử lý dấu nháy đơn trong các từ tiếng anh
    $str = strtr($str,"''","&#39;");
    $str = stripslashes(removeScript($str));
    return $str;
}

function random(){
	$rand_value = "";
	$rand_value.= rand(1000,9999);
	$rand_value.= chr(rand(65,90));
	$rand_value.= rand(1000,9999);
	$rand_value.= chr(rand(97,122));
	$rand_value.= rand(1000,9999);
	$rand_value.= chr(rand(97,122));
	$rand_value.= rand(1000,9999);
	return $rand_value;
}
function removeSign($str){
    $coDau=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
    "ằ","ắ","ặ","ẳ","ẵ",
    "è","é","ẹ","ẻ","ẽ","ê","ề" ,"ế","ệ","ể","ễ",
    "ì","í","ị","ỉ","ĩ",
    "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
    ,"ờ","ớ","ợ","ở","ỡ",
    "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
    "ỳ","ý","ỵ","ỷ","ỹ",
    "đ",
    "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
    ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
    "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
    "Ì","Í","Ị","Ỉ","Ĩ",
    "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
    ,"Ờ","Ớ","Ợ","Ở","Ỡ",
    "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
    "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
    "Đ","ê","ù","à");

    $khongDau=array("a","a","a","a","a","a","a","a","a","a","a"
    ,"a","a","a","a","a","a",
    "e","e","e","e","e","e","e","e","e","e","e",
    "i","i","i","i","i",
    "o","o","o","o","o","o","o","o","o","o","o","o"
    ,"o","o","o","o","o",
    "u","u","u","u","u","u","u","u","u","u","u",
    "y","y","y","y","y",
    "d",
    "A","A","A","A","A","A","A","A","A","A","A","A"
    ,"A","A","A","A","A",
    "E","E","E","E","E","E","E","E","E","E","E",
    "I","I","I","I","I",
    "O","O","O","O","O","O","O","O","O","O","O","O"
    ,"O","O","O","O","O",
    "U","U","U","U","U","U","U","U","U","U","U",
    "Y","Y","Y","Y","Y",
    "D","e","u","a");
    return str_replace($coDau,$khongDau,$str);
}
function redirect($url){
	$url	= htmlspecialbo($url);
	echo '<script type="text/javascript">window.location.href = "' . $url . '";</script>';
	exit();
}
function removeHTML($string){
	$string = preg_replace ('/<script.*?\>.*?<\/script>/si', ' ', $string); 
	$string = preg_replace ('/<style.*?\>.*?<\/style>/si', ' ', $string); 
	$string = preg_replace ('/<.*?\>/si', ' ', $string); 
	$string = str_replace ('&nbsp;', ' ', $string);
	return $string;
}
function removeScript($string){
	$string = preg_replace ('/<script.*?\>.*?<\/script>/si', '<br />', $string);
	$string = preg_replace ('/on([a-zA-Z]*)=".*?"/si', ' ', $string);
	$string = preg_replace ('/On([a-zA-Z]*)=".*?"/si', ' ', $string);
	$string = preg_replace ("/on([a-zA-Z]*)='.*?'/si", " ", $string);
	$string = preg_replace ("/On([a-zA-Z]*)='.*?'/si", " ", $string);
	return $string; 
}
function removeXML($string){
    $string = preg_replace('/<xml>.*?<\/xml>/si','',$string);
    //$string = preg_replace('/<!--.*?-->/si','',$string);
    return $string;
}
function replaceMQ($text){
	$text	= str_replace("\'", "'", $text);
	$text	= str_replace("'", "''", $text);
	return $text;
}

function remove_magic_quote($str){
	$str = str_replace("\'", "'", $str);
	$str = str_replace("\&quot;", "&quot;", $str);
	$str = str_replace("\\\\", "\\", $str);
	return $str;
}
//Hàm sắp xếp
function sort_by_sorting_value_desc($a, $b) {
    if ($a['sorting'] == $b['sorting']) {
        return 0;
    }
    return ($a['sorting'] > $b['sorting']) ? -1 : 1;
}
function sort_by_sorting_value_asc($a, $b) {
    if ($a['sorting'] == $b['sorting']) {
        return 0;
    }
    return ($a['sorting'] < $b['sorting']) ? -1 : 1;
}
function sort_by_order_value_asc($a, $b){
    if ($a['order'] == $b['order']) {
        return 0;
    }
    return ($a['order'] < $b['order']) ? -1 : 1;
}
function sort_by_order_value_desc($a, $b){
    if ($a['order'] == $b['order']) {
        return 0;
    }
    return ($a['order'] > $b['order']) ? -1 : 1;
}

function get_client_ip() {
     if (isset($_SERVER['HTTP_CLIENT_IP']))
         return $_SERVER['HTTP_CLIENT_IP'];
     else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
         return $_SERVER['HTTP_X_FORWARDED_FOR'];
     else if(isset($_SERVER['HTTP_X_FORWARDED']))
         return $_SERVER['HTTP_X_FORWARDED'];
     else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
         return $_SERVER['HTTP_FORWARDED_FOR'];
     else if(isset($_SERVER['HTTP_FORWARDED']))
         return $_SERVER['HTTP_FORWARDED'];
     else if(isset($_SERVER['REMOTE_ADDR']))
         return $_SERVER['REMOTE_ADDR'];
     else
         return 'UNKNOWN';
}
function get_fb_statistics($links = array()){
        $posts = array();
        if(empty($links)){
            return $posts;
        }
        //echo '<pre>';print_r($links);echo '</pre>';
        $apiUrl = 'http://api.facebook.com/method/fql.query?query=select total_count,like_count,comment_count,share_count,click_count,commentsbox_count from link_stat where url IN (\''.implode('\',\'', $links).'\')&format=json';
        $apiUrl = str_replace(' ', '%20', $apiUrl);
        //$apiUrl = 'https://graph.facebook.com/?ids='.implode(',', $links);
        //echo $apiUrl,'<br />';
        //echo $_SERVER['HTTP_USER_AGENT'];
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$apiUrl);
        //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        //curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Connection: Keep-Alive", "Content-type: application/x-www-form-urlencoded;charset=UTF-8"));
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            //print "Error: " . curl_error($ch);
            foreach($links as $pid => $url){
                $posts[$pid] = array(
                    'total_count' => '0',
                    'like_count' => '0',
                    'comment_count' => '0',
                    'share_count' => '0',
                    'click_count' => '0',
                    'commentsbox_count' => '0',
                );
            }
        } else {
            // Show me the result
            //echo '<pre>';print_r($response);echo '</pre>';
            $data = json_decode($response, true);
            curl_close($ch);
            foreach($links as $pid => $url){
                $posts[$pid] = array_shift($data);
            }
        }
        //echo '<pre>';print_r($posts);echo '</pre>';
        return $posts;
}
function comment_social($width=500){
   $html = '<div class="comments_wrap">
                <div class="w1130" style="margin: 0px auto;">
                    <div class="comments">
                        <div class="comments_tab">
                            <div class="comments_tab_item comments_tab_fb active">Facebook</div>
                            <div class="comments_tab_item comments_tab_gg">Google</div>
                        </div>
                        <div class="comments_main">
                            <div class="comments_main_item comments_main_fb" style="z-index: 1000;position: relative">
                                <div class="fb-comments" data-href="'.DOMAIN.$_SERVER['REQUEST_URI'].'" data-colorscheme="dark" data-numposts="5" data-width="'.$width.'"></div>
                            </div>
                            <div class="comments_main_item comments_main_gg">
                                <div class="g-comments"
                                    data-href="'.DOMAIN.$_SERVER['REQUEST_URI'].'"
                                    data-width="'.$width.'"
                                    data-first_party_property="BLOGGER"
                                    data-view_type="FILTERED_POSTMOD">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            return $html;
}
function postDataByCurl($data, $url = '', $method = 'post', $return = true) {
        $ch = curl_init($url);
        if($method == 'post') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        if($return) {
             $data = curl_exec($ch);
             $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
             return array('status' => $status, 'respone_text' => $data);
        }
}
function postDataByForm($data,$url = '',$method = 'post') {
        $str = "<form action='".$url."' method='".$method."' name='frm'>";
        foreach ($data as $a => $b) {
            $str .= "<input type='hidden' name='".$a."' value='".$b."'>";
        }
        $str .= "</form>";
        $str .= '<script language="JavaScript">document.frm.submit();</script>';
        echo $str;
} 
function log_message($message,$folder_include_name = 'info'){ //$folder_include_name  có thể là error, slow hoặc info
    $path = $_SERVER['DOCUMENT_ROOT'] . "/log/".$folder_include_name.'/';
    $filename = date("Y_m_d_H") . ".txt";
    $time= time();
    if (file_exists($path . $filename)) {

        $str = file_get_contents($path . $filename);
        $str =  chr(13) . chr(13) . $str;
        file_put_contents($path . $filename, "Thoi gian : " . date("H:i:s") . " : " . $folder_include_name . "--------------------------------------------->" . chr(13)  . $message.$str);

    } else {

        file_put_contents($path . $filename, "Thoi gian : " . date("H:i:s") . " : " . $folder_include_name . "--------------------------------------------->" . chr(13) . $message);
        @chmod($path . $filename, 0644);
    }
}
?>
