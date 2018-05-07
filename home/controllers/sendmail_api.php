<?php
	$re_id = $_GET['id'];
	log_message('Gửi mail thông báo đặt phòng : ' . $re_id, 'error');
	$m_send_mail = new send_mail();
	$request_book_room = $m_send_mail->book_room_info($re_id);
	if(!empty($request_book_room)){
		
		$template_mail = file_get_contents('media/template/thong_bao_dat_phong.php');
		$template_mail = str_replace('{phone_numb}', $request_book_room[0]['custumer_phone'], $template_mail);
		$template_mail = str_replace('{email}', $request_book_room[0]['custumer_email'], $template_mail);
		$template_mail = str_replace('{checkin}', $request_book_room[0]['checkin_date'], $template_mail);
		$template_mail = str_replace('{checkout}', $request_book_room[0]['checkout_date'], $template_mail);
		$subject_mail = "THÔNG BÁO ĐẶT PHÒNG";
		$list_acc_recive_mail = $m_send_mail->list_acc_recive_mail();
		foreach($list_acc_recive_mail as $acc_admin){
			if($acc_admin['adm_mail'] != ''){
				$sendmail = send_mailer($acc_admin['adm_mail'], $subject_mail, $template_mail, ""); 
			} else {
				log_message('tài khoản quản trị không có email', 'error');
			}
		}
	} else {
		log_message('không lấy được thông tin đặt phòng: ' . $re_id, 'error');
	}
?>