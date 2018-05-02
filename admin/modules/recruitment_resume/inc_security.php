<?
require_once '../../resources/security/security.php';
$module_id	= 29;
$module_name = 'Hồ sơ ứng viên';
//check đăng nhập và bảo mật
checkLogged();
//check quyền sử dụng module
$bg_errorMsg = '';
$bg_table = 'recruitment_resume';
$id_field = 'rer_id';
$name_field = 'rer_name';
$bg_filepath = '../../../file/resume/';
$bg_extension = 'jpg,jpe,png,gif,jpeg';
$domain = 'http://'.$_SERVER['HTTP_HOST'];
$limit_size = 12000;
$arr_resize = array( "small_" => array("quality" => 100, "width" => 112, "height" => 1000),
					 "medium_" => array("quality" => 100, "width" => 224, "height" =>10000)
					);
$arr_sex = array(1=>"Nam",
                2=>"Nữ");
$arr_diploma = array(0=>"Chưa chọn bằng cấp",
                1=>'Trên đại học',
                2=>"Đại học",
                3=>'Cao đắng',
                4=>'Khác');

function arr_categories($cat_type = "recruitment") {
     $arr = db_array('SELECT *
                     FROM categories
                     WHERE cat_type = "'.$cat_type.'" AND cat_parent_id = 0');
     $arr_name = array();
     foreach($arr as $row){
        $arr_name[$row['cat_id']] = $row['cat_name'];
     }
     return $arr_name;
   }
function recruitment_list() { // danh sách tuyển dụng
    $arr = db_array('SELECT *
                    FROM recruitment
                    WHERE rec_active = 1 ORDER BY rec_id DESC
                    ');
    $arr_name = array();
     foreach($arr as $row){
        $arr_name[$row['rec_id']] = $row['rec_title'];
     }
     return $arr_name;              
}
?>