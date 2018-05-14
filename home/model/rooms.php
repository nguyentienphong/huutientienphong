<?
/**
 * Đây là các class chứa các funtion dùng cho rooms
*/
class Rooms extends Base{
    var $fieldsort = '';//Sắp xếp theo trường nào
    var $sort		= '';//Sắp xếp tăng hay giảm
    var $page		= 1;//Trang hiện tại
    var $page_size = 8;//Kích cỡ 1 trang hiển thị bao nhiêu kết quả
    
    public function listing_rooms() {
        $rooms = db_array('SELECT *
                        FROM rooms
                        WHERE roo_active = 1 ORDER BY roo_position ASC
                        ');
        return $rooms;                
    }
	
	public function detail_rooms($roo_id){
		$rooms = db_array("SELECT *
                        FROM rooms
                        WHERE roo_active = 1 AND roo_id = $roo_id ORDER BY roo_position ASC
                        ");
		
        if(count($rooms) > 0){
			return $rooms[0];
		}
		
	}
}
?>