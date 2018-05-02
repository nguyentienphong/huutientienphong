<?
function generatePageBar($page_prefix, $current_page, $page_size, $total_record, $url, $normal_class, $selected_class, $previous='<', $next='>', $first='<<', $last='>>', $break_type=1, $page_rewrite=0, $page_space=3, $obj_response='', $page_name="page"){
	$page_query_string	= "&" . $page_name . "=";
	// Nếu dùng ModRewrite thì dùng dấu , để phân trang
	if($page_rewrite == 1) $page_query_string = "trang-";
	if($total_record % $page_size == 0) $num_of_page = $total_record / $page_size;
	else $num_of_page = (int)($total_record / $page_size) + 1;
	$start_page = $current_page - $page_space;
	if($start_page <= 0) $start_page = 1;
	$end_page = $current_page + $page_space;
	if($end_page > $num_of_page) $end_page = $num_of_page;
	// Remove XSS
	$url = str_replace('\"', '"', $url);
	$url = str_replace('"', '', $url);
	if($break_type < 1) $break_type = 1;
	if($break_type > 4) $break_type = 4;
	// Pagebreak bar
	$page_bar = "<ul class='pagination'>";
	// Write prefix on screen
	if($page_prefix != "") $page_bar .= '<font class="' . $normal_class . '">' . $page_prefix . '</font> ';
	// Write frist page
	if($break_type == 1){
		if(($start_page != 1) && ($num_of_page > 1)){
			if($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . '1' . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . '1';
			$page_bar .=  '<li><a href="' . $href . '" class="' . $normal_class . ' firstpage" title="Trang đầu">' . $first . '</a></li> ';
		}
	}
	// Write previous page
	if($break_type == 1 || $break_type == 2 || $break_type == 4){
		if(($current_page > 1) && ($num_of_page > 1)){
			if($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . ($current_page - 1) . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . ($current_page - 1);
			$page_bar .= ' <li><a href="' . $href . '" class="' . $normal_class . ' prevpage" title="Trang trước">' . '<span aria-hidden="true">«</span>' . '</a></li> ';
			if(($start_page > 1) && ($break_type == 1 || $break_type == 2)){
				$page_dot_before = $start_page - 1;
				if($page_dot_before < 1) $page_dot_before = 1;
				if($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $page_dot_before . '\',\'' . $obj_response . '\')';
				else $href = $url . $page_query_string . $page_dot_before;
				$page_bar .= '<li><a href="' . $href . '" class="' . $normal_class . ' notUndeline">...</a></li> ';
			}
		}
	}
	// Write page numbers
	if($break_type == 1 || $break_type == 2 || $break_type == 3){
		$start_loop = $start_page;
		if($break_type == 3) $start_loop = 1;
		$end_loop	= $end_page;
		if($break_type == 3) $end_loop = $num_of_page;
		for($i=$start_loop; $i<=$end_loop; $i++){
			if($i != $current_page){
				if($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $i . '\',\'' . $obj_response . '\')';
				else $href = $url . $page_query_string . $i;
				$page_bar .= '<li> <a href="' . $href . '" class="' . $normal_class . '">' . $i . '</a></li> ';
			}
			else{
				$page_bar .= '<li> <a class="' . $selected_class . '">' . $i . '</a></li> ';
			}
		}
	}
	// Write next page
	if($break_type == 1 || $break_type == 2 || $break_type == 4){
		if(($current_page < $num_of_page) && ($num_of_page > 1)){
			if($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . ($current_page + 1) . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . ($current_page + 1);
			if(($end_page < $num_of_page) && ($break_type == 1 || $break_type == 2)){
				$page_dot_after = $end_page + 1;
				if($page_dot_after > $num_of_page) $page_dot_after = $num_of_page;
				if($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $page_dot_after . '\',\'' . $obj_response . '\')';
				else $href = $url . $page_query_string . $page_dot_after;
				$page_bar .= '<li><a href="' . $href . '" class="' . $normal_class . ' notUndeline">...</a></li> ';
			}
			$page_bar .= ' <li><a href="' . $href . '" class="' . $normal_class . ' nextpage" title="Trang tiếp">' . '<span aria-hidden="true">»</span>' . '</a></li> ';
		}
	}
	// Write last page
	if($break_type == 1){
		if(($end_page < $num_of_page) && ($num_of_page > 1)){
			if($obj_response != '') $href = 'javascript:load_data(\'' . $url . $page_query_string . $num_of_page . '\',\'' . $obj_response . '\')';
			else $href = $url . $page_query_string . $num_of_page;
			$page_bar .= ' <li><a href="' . $href . '" class="' . $normal_class . ' lastpage" title="Trang cuối">' . $last . '</a></li>';
		}
	}
    $page_bar .= '</ul>';
	// Return pagebreak bar
	return $page_bar;
}
function NewsPageBreak($url, $total_record, $PageSize, $CurrenPage, $main_pager = "main_pager",$main_page_btn = "main_page_btn", $not_avaiable = "not_avaiable"){
   $html_page = "";
   $first	= false;
   $preview	= false;
   $last	= false;
   $next	= false;
   if($total_record / $PageSize == 0) $num_page = $total_record / $PageSize;
   else $num_page = (int)($total_record / $PageSize) + 1;
   if($num_page > 1){
      if($CurrenPage > 1){
        $first = true;
        $preview = true; 
      } 
      if($CurrenPage < $num_page) {
         $last = true;
         $next = true;  
      }
   }
   $start   = $CurrenPage - 2;
   $end     = $CurrenPage + 2;
   if($start <= 0) $start = 1;
   if($end >= $num_page) $end = $num_page; 
   $html_page .='
   <nav class= '.$main_pager.'>
      <ul>
         <li class="'.$main_page_btn.(($first? "" : " not_avaiable")).'"><a class="vpage1">Đầu</a></li>
         <li class="'.$main_page_btn.(($preview? "" : " not_avaiable")).'"><a class="vpage'.($CurrenPage -1).'"">&lt;</a></li>';
         for($i = $start; $i<= $end; $i ++){
			    $html_page .='        
			         <li class="'.$main_page_btn.(($CurrenPage == $i)? " active" : "").'"><a class="vpage'.$i.'" >'. $i.'</a></li>';         	
			}
  	if(($CurrenPage + 2) < $num_page){   $html_page .='    
							 		<li>...<li>   
									<li class="'.$main_page_btn.'"><a class="vpage'.$num_page.'" >'. $num_page.'</a></li>';
							 }
	 $html_page .='  
         <li class="'.$main_page_btn.(($next? "" : " not_avaiable")).'"><a class="vpage'.($CurrenPage + 1).'" >&gt;</a></li>
         <li class="'.$main_page_btn.(($last? "" : " not_avaiable")).'"><a class="vpage'.$num_page.'"  >Cuối</a></li>
      </ul>
   </nav>';
   if($total_record > $PageSize)   return $html_page;
}
?>