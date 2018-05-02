<?php
class dataGrid{
    var $stt = 0;
    private $field_id;
    private $arrayField = array();
    private $arraySearch = array();
    private $arrayAddSearch = array();
    private $arraySort = array();
    private $arrayLabel = array();
    private $arrayType = array();
    private $arrayExtra = array();
    private $total_row = 0;
    private $page_size = 30;
    public function __construct($field_id,$page_size = 30){
        $this->field_id = $field_id;
        $this->page_size = $page_size;
    }
    
    //Các hàm add field để hiển thị trong bảng listing
    function add($field_name,$label,$type = 'string',$search = 0 ,$sort = 0,$extra = ''){
        $this->arrayField[$this->stt] = $field_name;
        $this->arrayLabel[$this->stt] = $label;
        $this->arrayType[$this->stt] = $type;
        $this->arrayExtra[$this->stt] = $extra;
        if($search) $this->arraySearch[$this->stt] = $field_name;
        if($sort) $this->arraySort[$this->stt] = $field_name;
        $this->stt++;
    }
    /*
	ham add them cac truong search
	name : tiêu đề
	field : tên trường
	type : kiểu search
	value : giá trị nếu kiểu array thì truyền vào một array
	default: giá trị mặc định
	*/
    function addSearch($name,$field,$type,$value = '',$default=""){
        $str = '';
        $value = $value ? $value : $default;
        $str .= '&nbsp;' .$name . '&nbsp;';
        switch($type){
            //kiểu array
            case "array":
                $str .= '<select name="' . $field . '" id="' . $field . '" class="textbox">';
                foreach($value as $id=>$text){
                    $str .= '<option value="' . $id . '" ' . (($default==$id) ? 'selected' : '') . '>' . $text . '</option>';
                }
                $str .= '</select>';
                break;

            //kiểu ngày tháng
            case "date":
                $value = getValue($field,"str","GET","yyyy/mm/dd");
                $str .= '<input type="text" name="'.$field.'" id="'.$field.'" value="'.$value.'" datepick-element="1" >';
                break;

            //kiểu text box
            case "text":
                $value = getValue($field,"str","GET","Nhập từ khóa");
                $str .= '<input type="text" name="' . $field . '" id="' . $field . '" value="' . $value . '">';
                break;
        }
        $this->arrayAddSearch[] = $str;
    }
    /**
     * $author_search = 1 thi them loc theo nguoi dang trong bang log_add
     */
    function showHeader($total_row,$extra = '',$author_search = 0){
        $this->total_row = $total_row;
        //Hiển thị phần search và header của table
        if(count($this->arraySearch) > 0 || $author_search == 1) {
            $header = '<div class="dataTables_filter" id="dynamic-table_filter"><form name="grid_search" class="form-inline" action="' . $_SERVER['SCRIPT_NAME'] . '" methor="get">';
           $header .= form_hidden('search',1);
           foreach($this->arraySearch as $key=>$value){
               $fieldname = $this->arrayField[$key];
               $strExtra = isset($this->arrayExtra[$key]) ? $this->arrayExtra[$key] : '';
               switch($this->arrayType[$key]){
                   case 'string':
                       //Field lấy ra là string
                       //value lấy ra từ query string
                       $queryValue = getValue($fieldname,'str','GET','');
                       $header .= '<input type="text" class="form-control" name="'.$value.'" placeholder="'.$this->arrayLabel[$key].'" value="'.$queryValue.'" '.$strExtra.' />&nbsp;';
                   break;
                   case 'array':
                       //Field lấy ra là select box
                       global $$fieldname;
                       $header .= '<select class="form-control" name="'.$value.'" '.$strExtra.'>';
                       $header .= '<option value="-1">'.$this->arrayLabel[$key].'</option>';
                       $slValue = getValue($fieldname,'str','GET','');
                       foreach($$fieldname as $k=>$v){
                           $selected = ($k == $slValue ? 'selected="selected"' : '');
                           $header .= '<option value="'.$k.'" '.$selected.'>'.$v.'</option>';
                       }
                       $header .= '</select>&nbsp;';
                   break;
                   
               }
           }
           //Hiển thị phần custom search
           foreach($this->arrayAddSearch as $value){
               $header .= $value;
           }
            if($author_search == 1) {
                 $header .= '<select class="form-control" name="authorId">';
                 $header .= '<option value="0">Người thêm</option>';
                 $db_author = new db_query('SELECT adm_id,adm_loginname FROM admin_users WHERE 1');
                 $author = $db_author->resultArray();
                 foreach($author as $value){
                     $selected = ($value['adm_id'] == getValue('authorId') ? 'selected="selected"' : '');
                     $header .= '<option value="'.$value['adm_id'].'" '.$selected.'>'.$value['adm_loginname'].'</option>';
                 }
                 $header .= '</select>&nbsp;';
            }
           $header .= '<input type="submit" value="Tìm kiếm" class="btn btn-primary"/>';
           $header .= '</form></div>'.'<script type="text/javascript">$(document).ready(function(){Grid = new Grid();});</script>'.$extra;
        }//Kết thúc phần search
        
        //Bắt đầu hiển thị phần header của table
        $header .= form_open_multipart('quickedit.php',array('name'=>'listing'),array('iQuick'=>'update'));
        $header .= '<table class="display table table-bordered table-hover dataTable" id="dynamic-table">';
        $header .= '<thead><tr>';
        $header .= '<th width="40">STT</th>
                    <th width="40">
                    <div class="" >
                    <i class="fa fa-square-o icon-green font-size17" style="position: relative;">
               <input style="position: absolute;
               top: -20%;
               left: -20%;
               display: block;
               width: 140%;
               height: 140%;
               margin: 0px;
               padding: 0px;
               border: 0px;
               opacity: 0;
               background: rgb(255, 255, 255);" type="checkbox" id="check_all" class="check" onclick="Grid.checkall()"></i></div></th>';
        if(file_exists('quickedit.php')){
            $header .= '<th width="40"><i class="fa fa-save pointer icon-green font-size17 " onclick="document.listing.submit()"></i></th>';
        }else{
            //$header .= '<th>STT</th>';
        }
        foreach($this->arrayLabel as $key=>$label){
            $c = isset($this->arraySort[$key]) ? $this->urlsort($this->arrayField[$key]) : ''; 
            $header .= '<th>'.$label.''.$c.'</th>';
        }
        $header .= '</tr></thead>';
        return $header;
        
    }
    function start_tr($i, $record_id, $add_html = ""){
      if($i%2==0) $bg_tr = 'odd';else $bg_tr = 'even';      
		$page = getValue("page");
		if($page<1) $page = 1;
		$str = '<tr id="tr_'.$record_id.'" class="gradeX '.$bg_tr.'">';
        $str .= $this->showId($i, $page);
        $str .= $this->showCheck($i, $record_id);

		return $str;
		
	}
	function end_tr(){
		$str = '</tr>';
		return $str;
	}
    
    private function showId($i, $page){
		$str = '<td class="center"><span style="color:#142E62; font-weight:bold">' . ($i+(($page-1)*$this->page_size)) . '</span></td>';
		return $str;
	}
	private function showCheck($i, $record_id){ 
		$str = '<td  class="center"><div class="" style="position: relative;">
      <i class="fa fa-square-o icon-green font-size17">
               <input style="position: absolute;
               top: -20%;
               left: -20%;
               display: block;
               width: 140%;
               height: 140%;
               margin: 0px;
               padding: 0px;
               border: 0px;
               opacity: 0;
               background: rgb(255, 255, 255);" type="checkbox" class="check" name="record_id[]" id="record_' . $i . '" onclick="return check_one(\'record_' . $i . '\')" value="' . $record_id . '"></i></div></td>';
		if(file_exists('quickedit.php')){
		    $str .= '<td  class="center"><i class="fa fa-save pointer icon-green font-size17 " onclick="document.getElementById(\'record_' . $i . '\').checked = true;document.listing.submit()"></i></td>';
		}
        return $str;				
	}
    function showCheckbox($field,$value,$record_id){
        $input = form_checkbox($field,1,$value,'onclick="Grid.update_active(\''.$field.'\','.$record_id.')" id="'.$field.'_'.$record_id.'" ');
        $str = '<td width="10" class="center">'.$input.'</td>';
        return $str;
    }
	function showEdit($record_id, $extra = ''){
		return '<td width="10" class="center"><a href="edit.php?record_id=' .  $record_id . '"><i class="fa fa-pencil-square-o icon-green font-size17"></i></a></td>';
	}
	function showDelete($record_id, $extra = ''){
		return '<td width="10" class="center"><a href="#" onclick="Grid.delete_one('.$record_id.');return false;"><i class="fa fa-trash-o icon-red font-size17"></i></a></td>';	
	}
   function showDeleteImage($record_id, $extra = ''){
		return '<td width="10" class="center"><a href="#" onclick="Grid.delete_one_image('.$record_id.');return false;"><i class="fa fa-trash-o icon-red font-size17"></i></a></td>';	
	}
    function showFooter(){
        $cols = $this->stt + 3;
        $footer = '<tr class="footer"><td colspan="'.$cols.'">';
        $footer .= '&nbsp;<a href="#" onclick="Grid.delete_all('.$this->total_row.');return false;" style="float:left;margin-right:20px;">Xóa đã chọn <i class="fa fa-trash-o icon-red font-size17"></i></a>';
        $footer .= '<span class="fl">Tổng : '. $this->total_row .'</span>';
        $footer .= $this->generate_page();
        $footer .= '</td></tr></table>';
        return $footer;
    }
    function showFooterImages(){
        $cols = $this->stt + 3;
        $footer = '<tr class="footer"><td colspan="'.$cols.'">';
        $footer .= '&nbsp;<a href="#" onclick="Grid.delete_all_images('.$this->total_row.');return false;" style="float:left;margin-right:20px;">Xóa đã chọn <i class="icon-remove icon-red"></i></a>';
        $footer .= '<span class="fl">Tổng : '. $this->total_row .'</span>';
        $footer .= $this->generate_page();
        $footer .= '</td></tr></table>';
        return $footer;
    }
    function sqlSearch(){
        $search		= getValue("search","int","GET",0);
		$str 			= '';
		if($search == 1){
			
			foreach($this->arraySearch as $key=>$field){
			
				$keyword		= getValue($field,"str","GET","");
				if($keyword == $this->arrayLabel[$key]) $keyword = "";
				$keyword		= str_replace(" ","%",$keyword);
				$keyword		= str_replace("\'","'",$keyword);
				$keyword		= str_replace("'","''",$keyword);
				switch($this->arrayType[$key]){
					case "string":
						if(trim($keyword)!='') $str 		.= ' AND ' . $field . ' LIKE "%' . $keyword . '%" ';
					break;
					case "array":
						if(intval($keyword)> -1) $str 		.= ' AND ' . $field . '=' . intval($keyword) . ' ';
					break;
				}
			}
		}
		return $str;
    }
    function sqlSort(){
		$sort 		= getValue("sort","str","GET","");
		$field	 	= getValue("sortname","str","GET","");
		$str 			= '';
		if(in_array($field,$this->arraySort) && ($sort == "asc" || $sort == "desc")){
			$str 		= $field . ' ' . $sort . ',';
		}
		return $str;
	}
   function authorSearch($bg_table,$id_field) {
      $search		= getValue("search","int","GET",0);
		$str 			= '';
		if($search == 1){
		    $authorId = getValue('authorId','int','GET',0);
          if($authorId > 0) {
               $str_id = '0';
               $db_author_add = new db_query('SELECT lga_record_id FROM log_add WHERE lga_admin_id = '.$authorId.' AND lga_type = "'.$bg_table.'"');
               $author_add = $db_author_add->resultArray();
               foreach($author_add as $value) {
                  $str_id .= ','.$value['lga_record_id'];
               }
               $str .= 'AND '.$id_field.' IN('.$str_id.')';
          }
		}
      return $str;
   }
    function urlsort($field){
		$str 	= '';
		if(in_array($field,$this->arraySort)){

			$url 			= getURL(0,1,1,1,"sort|sortname");
			$sort 		= getValue("sort","str","GET","");
			$sortname 	= getValue("sortname","str","GET","");
			if($sortname!=$field) $sort = "";
			switch($sort){
				case "asc":
					$url 	= $url . '&sort=desc';
				break;
				case "desc":
					$url 	= $url . '&sort=asc';
				break;
                default:
					$url 	= $url . "&sort=asc";
				break;
			}
			$url 	= $url . '&sortname=' . $field;	
			$str = '<a href = "'.$url.'" onclick="loadpage(this)"><i class="fa fa-caret'.($sort=='asc' ? '-up' : '-down').' icon-green mgl5"></i></a>';
		}
		return $str;
	}
    
    function generate_page(){
		$str = '<div class="dataTables_paginate paging_bootstrap pagination"><ul>';
		if($this->total_record>$this->page_size){
		
			$total_page 	= ceil($this->total_record/$this->page_size);
			$page			   = getValue("page","int","GET",1);
			if($page<1) $page = 1;
			$str 				.= '<li class="prev"><a href="' . getURL(0,1,1,1,"page") . '&page=1"><i class="fa fa-arrow-circle-left icon-green"></i></a></li>';
			if($page>1) $str 	.= '<li><a href="' . getURL(0,1,1,1,"page") . '&page=' . ($page-1) .'">←</a></li>';
			
			$start = $page-5;
			if($start<1) $start = 1;
			
			$end = $page+5;
			if($page<5) $end = $end+(5-$page);
			
			if($end > $total_page) $end=intval($total_page);
			if($end < $total_page) $end++;
			
			for($i=$start;$i<=$end;$i++){
				$str 			.= '<li class="'.(($i==$page) ? 'active':'').'"><a href="' . getURL(0,1,1,1,"page") . '&page=' . $i . '">' . (($i==$page) ? '' . $i . '' : '<span>' . $i . '</span>') . '</a></li>';
			}
			
			if($page<$total_page) $str 	.= '<li><a href="' . getURL(0,1,1,1,"page") . '&page=' . ($page+1) .'">→</a></li>';
			$str 				.= '<li><a href="' . getURL(0,1,1,1,"page") . '&page=' . $total_page . '"><i class="fa fa-arrow-circle-right icon-green"></i></a></li>';
		
		}
		$str .= '</ul></div>';
		return $str;
	}
    
    function limit($total_record){
		$this->total_record = $total_record;
		$page			   = getValue("page","int","GET",1);
		if($page<1) $page = 1;
		$str = "LIMIT " . ($page-1) * $this->page_size . "," . $this->page_size;
		return $str;
	}
    function getPictureThumb($filename,$field_name = ''){
        $str = '';
        if(!$field_name){
            //Không có sửa ảnh
            $str .= '<div style="width:80px;height:80px;margin:0 auto;padding-bottom:5px;"><img src="'.$filename.'" style="width:100%" alt="Không có ảnh"/></div>';
            return $str;
        }
    }
}
?>