<?
include($_SERVER['DOCUMENT_ROOT']. "/home/config.php");
   $action				= getValue("action", "str", "POST", "");
   $time					=	0;
   $return_login['status'] = 0;
   $return_login['mes']			=	"";
   //Lấy ra link continue nếu có
   $url_continue = get_link_redirect();
   if($myuser->logged()){
       redirect($url_continue);
   }
   if($action == 'action'){
   	$username			= getValue("txtusername", "str", "POST", "", 1);
   	$password			= getValue("txtpassword", "str", "POST", "", 1);
   	$remember			= getValue("remember_me", "int", "POST", 0);
   	if($remember 		==	 0){
   		$time				=	time() + (1 * 86400);
   	}else{
   		$time				=	time() + (365 * 86400);
   	}
   	$myuser = new user($username, $password);
   	
   	$myuser->savecookie($time);
   
   	if($myuser->logged() != 1){
   		$return_login['mes'] = "Tài khoản đăng nhập hoặc mật khẩu không đúng ! Xin vui lòng nhập lại.";
   	}else{
         $return_login['status'] = 1;
         if($myuser->use_active ==0) $return_login['status'] = 2;// tài khoản chưa được active
   	}
   }
   echo json_encode($return_login);
   exit();
?>
