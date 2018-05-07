<?
////////////////////////////////////////////////
// Ban khong thay doi cac dong sau:
function send_mailer($to,$title,$content,$id_error="",$filename = false){
	if(file_exists("../classes/mailer/class.phpmailer.php")){
	    require_once("../classes/mailer/class.phpmailer.php");
        require_once("../classes/mailer/class.smtp.php");
	}else{
	  if(file_exists("classes/mailer/class.phpmailer.php")){
	     require_once("classes/mailer/class.phpmailer.php");  
         require_once("classes/mailer/class.smtp.php");
	  }else{
	     require_once("/classes/mailer/class.phpmailer.php");
         require_once("/classes/mailer/class.smtp.php");
	  }
	   
	}
	
	$mail_server	=	"";
	$user_name		=	"";
	$password		=	"";
	//Lấy account mail có lần gửi ít nhất		
	
   $mail_server 	= "smtp.gmail.com";
   $random        = rand(0,3);
   
   if($random==0){
      $randstr = "";
   }else{
      $randstr = "0".$random;
   }
   

	/** fix */
   //$mail_server   = "123.30.208.146";
   //$mail_port		= 6500;
   $mail_port = 465;// gmail
   $user_name     =  "phongnt@vnptepay.com.vn";
   $password      =  "wpppmjwtmmxdehym";		
	
	
	//bắt đầu thực hiện gửi mail
	$mail 					= new PHPMailer();
	$mail->IsSMTP();
	$mail->Host     		= $mail_server;
	$mail->Port       	= $mail_port;       
	$mail->SMTPAuth 		= true;
	$mail->CharSet 		= "UTF-8";
	$mail->ContentType	= "text/html";
	
	
	////////////////////////////////////////////////
	// Ban hay sua cac thong tin sau cho phu hop
	
	$mail->Username = $user_name;				// SMTP username
	$mail->Password = $password; 				// SMTP password
	
	$mail->From     = $user_name;				// Email duoc gui tu???
	$mail->FromName = "Admin";			// Ten hom email duoc gui
	$to_array = explode(",",$to);
	for ($i=0; $i<count($to_array); $i++){
		$mail->AddAddress($to_array[$i],"Admin");	 	// Dia chi email va ten nhan
	}
	//$mail->AddReplyTo("vatgia@truonghocso.com","Information");		// Dia chi email va ten gui lai
	
	$mail->IsHTML(true);						// Gui theo dang HTML
	
	$mail->Subject  =  $title;				// Chu de email
	$mail->Body     =  $content;			// Noi dung html
	
	//Nếu là google mail
	if ($mail->Host == "smtp.gmail.com"){
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Port       = 465;                   // set the SMTP port		
	}
   if($filename != false){
   $mail->AddAttachment($filename);   }   // Đính kèm
   //$mail->AddAttachment("dinhkem/200_100.jpg"); // Đính kèm

	if(!$mail->Send())
	{
		//Nếu không send được thì thử lại với account khác, chỉ thử lại max đến 2 lần là dừng lại
		//strlen($id_error) <= 3 - Ứng với 1 lần retry
		if (strlen($id_error) <= 3){
			///send_mailer($to, $title, $content, $id_error);
		}
	}else{
		return true;
	}
}

?>