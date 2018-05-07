<?
/**
 * Đây là các class chứa các funtion dùng cho rooms
*/
class send_mail extends Base{
    var $fieldsort = '';//Sắp xếp theo trường nào
    var $sort		= '';//Sắp xếp tăng hay giảm
    var $page		= 1;//Trang hiện tại
    var $page_size = 8;//Kích cỡ 1 trang hiển thị bao nhiêu kết quả
    
    public function list_acc_recive_mail() {
        $accs = db_array('SELECT *
                        FROM admin_users
                        WHERE recivice_email_notify = 1
                        ');
        return $accs;
    }
	
	public function book_room_info($id){
		$info = db_array("SELECT *
                        FROM manage_book_room
                        WHERE row_id = $id
                        ");
        return $info;
	}
}
?>