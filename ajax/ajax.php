<?
require_once '../home/config.php';
$type = getValue('type','str','POST','');
$rt = array();
$rt['suc'] = 0;
switch($type){
   case 'email_receive_news':
      $input_email = getValue('email','str','POST','');
      if($input_email == '') exit();
      $id_field = 'eqt_id';
      $eqt_date = time();
         $myform = new generate_form();
      
         $myform->add('eqt_cus_email', 'input_email', 0, 1, '', 1, 'Bạn chưa nhập email', 1, 'Email này bạn đã đăng ký nhận tin rồi !');
         $myform->add('eqt_date', 'eqt_date', 1, 1, 0, 0, '', 0, '');
         $myform->addTable('email_quote');
         
         
         $action	= getValue('action', 'str', 'POST', '');
         if($action			==	'excute'){
            $errorMsg_res = '';
            $errorMsg_res		.=	$myform->checkdata();
               if($errorMsg_res == ''){
                  $db_ex		=	new db_execute_return();
             			$last_id		=	$db_ex->db_execute($myform->generate_insert_SQL());
             			if($last_id	> 0){   			
             			  //send_mailer('vattucongnghiepdonganh@gmail.com',"Khách hàng gửi email nhận báo giá",'Kiểm tra hệ thống để xem khách hàng gửi email nhận báo giá mới nhất',"");
          		         $rt['rt'] = "Bạn đã đăng ký nhận tin thành công !";
                     }
          			
               }else $rt['rt'] = "Email này bạn đã đăng ký nhận tin rồi !";
         }
      $rt['suc'] = 1;     
      echo json_encode($rt);
   break;     
}
   
?>