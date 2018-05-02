<?
/**
*class user
*Developed by FinalStyle.com
*/
class user{
	var $avatar	=	"";
	protected $logged = 0;
	var $use_name;
	var $password;
    var $firstname;
    var $lastname;
    var $fullname;
    var $email;
    var $phone;
    var $contact;
    var $date;
    var $use_type;
    var $use_had_profile = 0;
    var $use_active;
	var $u_id = -1;
	var $use_security;
   var $login_oauth = 0;
	var $useField = array();
	/*
	init class
	use_name : ten truy cap
	password  : password (no hash)
	level: nhom user; 0: Normal; 1: Admin (default level = 0)
	*/
	function user($use_name="",$password="",$login_oauth = 0){
		$this->logged = 0;
		if ($use_name==""){
			if (isset($_COOKIE["use_name"])) $use_name = $_COOKIE["use_name"];
		}
		if ($password==""){
			if (isset($_COOKIE["PHPSESS1D"])) $password = $_COOKIE["PHPSESS1D"];
         if(isset($_COOKIE[md5('login_oauth')]) && $_COOKIE[md5('login_oauth')] == 1){
             $this->login_oauth = 1;
         }
		}
		else{
			//remove \' if gpc_magic_quote = on
			$password = str_replace("\'","'",$password);
		}
		
      if($login_oauth == 1){
         $this->login_oauth = 1;
      }
		if ($use_name=="" && $password=="") return;
		else {
		    if($this->login_oauth == 1){
             //check dang nhap qua facebook roi
             $sql_user = 'SELECT * FROM users WHERE use_email = "'.$use_name.'"';
         }else{
            $db_security = new db_query('SELECT use_security FROM users WHERE use_email = "'.$use_name.'"');
            $security = mysql_fetch_assoc($db_security->result);unset($db_security);
            //Tao chuoi hash password de check
            $pass_check = md5($password . $security['use_security']);
            $sql_user = "SELECT use_id,use_password,use_security,use_name, use_avatar,use_firstname,use_lastname,
                                      use_phone,use_contact,use_date,use_email,use_type,use_had_profile,use_active
                                       FROM users
                                       WHERE use_email = '" . $this->removequote($use_name) . "' AND use_password = '".$pass_check."' ";
      		
      		
         }
		}
      $db_query = new db_query($sql_user);
		if ($row=mysql_fetch_array($db_query->result)){
			$this->logged        = 1;
			$this->use_name 		= $use_name;
			$this->avatar 		= $row["use_avatar"] ? '/pictures/avatar/'.$row["use_avatar"] : '/pictures/avatar/noavt.png';
			$this->password 		= $password;
          $this->firstname  = $row['use_firstname'];
          $this->lastname  = $row['use_lastname'];
          $this->fullname = $this->firstname.' '.$this->lastname;
          $this->email = $row['use_email'];
          $this->phone = $row['use_phone'];
          $this->contact = $row['use_contact'];
          $this->date = $row['use_date'];
          $this->use_type = $row['use_type'];
          $this->use_had_profile = $row['use_had_profile'];
          $this->use_active = $row['use_active'];
			$this->use_security	= $row["use_security"];
			$this->u_id 			= intval($row["use_id"]);
			$this->useField  		= $row;

		}
        unset($db_query);
	}
	/*
	Ham lay truong thong tin ra
	*/
	function row($field){
		if(isset($this->useField[$field])){
			return $this->useField[$field];
		}else{
			return '';
		}
	}
	/*
	save to cookie
	time : thoi gian save cookie, neu = 0 thi` save o cua so hien ha`nh
	*/
	function savecookie($time=0){
		if ($this->logged!=1) return false;
		if ($time > 0){
			setcookie("use_name",$this->use_name,time()+$time,"/");
			if($this->login_oauth) {
              setcookie(md5('login_oauth'),1,time()+$time,"/");
         }
         else {
			   setcookie("PHPSESS1D",$this->password,time()+$time,"/");
         }
		}
		else{
			setcookie("use_name",$this->use_name,null,"/");
			if($this->login_oauth) {
           setcookie(md5('login_oauth'),1,null,"/");
         }
         else {
			   setcookie("PHPSESS1D",$this->password,null,"/");
         }
		}
	}
	
	
	/*
	Logout account
	*/
	function logout(){
		setcookie("use_name"," ",null,"/");
		setcookie("PHPSESS1D"," ",null,"/");
      setcookie(md5('login_oauth'),null,null,'/');
		$_COOKIE["use_name"] = "";
		$_COOKIE["PHPSESS1D"] = "";
      unset($_COOKIE[md5('login_oauth')]);
		//setcookie("u_id","",time()-200000);
		$this->logged=0;
	}
	//kiem tra password de thay doi email
	function check_password($password){
		$db_user = new db_query("SELECT use_password,use_security
										 FROM users 
										 WHERE use_name = '" . $this->removequote($this->use_name) . "'");
		if ($row=mysql_fetch_array($db_user->result)){
			$password=md5($password . $row["use_security"]);
			if($password==$row["use_password"]) return 1;
		}
		unset($db_user);
	}
	function logged(){
		return $this->logged;
	}
	/*
	Remove quote
	*/
	function removequote($str){
		$temp = str_replace("\'","'",$str);
		$temp = str_replace("'","''",$temp);
		return $temp;
	}
	
	
	/*
	change password : Sau khi change password phải dùng hàm save cookie. Su dung trong truong hop Change Profile
	*/
	function change_password($old_password,$new_password){
		
		//replace quote if gpc_magic_quote = on
		$old_password = str_replace("\'","'",$old_password);
		$new_password = str_replace("\'","'",$new_password);
		
		//chua login -> fail
		if ($this->logged!=1) return 0;
		//old password ko đúng -> fail
		if (md5($old_password . $this->use_security)!=$this->password) return 0;
		
		//change password
		$db_update = new db_execute("UPDATE users
									 SET use_password = '" . md5($new_password . $this->use_security). "'
									 WHERE use_id = " . intval($this->u_id));
		//reset password
		$this->password = md5($new_password . $this->use_security);
		return 1;
	}
	
	
}
?>