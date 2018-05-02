<?
   $username = getValue('email', 'str','POST','',3);
   $pass		        =  getValue('password', 'str', 'POST', '',3);
   $config_password =  getValue('password_again','str','POST','',3);
   $use_security	  =  rand(111111,999999);
   $password        =  md5($pass . $use_security);
   $use_date		  =  time();
   $use_active		  =	1;
   $myform = new generate_form();
   $myform->add('use_email','username',0,1,'',1,'Lỗi nhập email',1,'Email này đã được sử dụng');
   $myform->add('use_password', 'password', 0, 1, '', 1, 'Bạn chưa nhập mật khẩu.', 0, '');
   /*$myform->add('use_phone','phone',0,0,'',0,'Bạn chưa nhập số điện thoại',0);
   $myform->add('use_firstname','firstname',0,0,'',0,'Bạn chưa nhập họ',0);
   $myform->add('use_lastname','lastname',0,0,'',0,'Bạn chưa nhập tên',0);
   $myform->add('use_contact','address',0,0,'',0,'',0);*/
   $myform->add('use_date', 'use_date', 1, 1, 0, 0, '', 0, '');
   $myform->add('use_security', 'use_security', 1, 1, '', 0, '', 0, '');
   $myform->add('use_active', 'use_active', 1, 1, 0, 0, '', 0, '');
   
   $myform->addTable('users');
   
   $myform->evaluate();
   $action	= getValue('action_res', 'str', 'POST', '');
?>
<!DOCTYPE html>
<html lang="en">
<head>	
	<title>Đăng ký</title>
	<meta name="google-site-verification" content="gkB9RQiF61Fg779oj1do-N0_IcXutfYartJIAF7Dbtw" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta property="og:image" content=""/>
   <meta name="description" content="" />
   <meta name="keywords" content="" />
   <!-- css -->
   <link rel="stylesheet" type="text/css" href="/home/css/base.css"/>
   <link rel="stylesheet" type="text/css" href="/home/css/home.css"/>
   <link type="text/css" rel="stylesheet" href="/plupload/jquery.ui.plupload/css/jquery-ui.min.css?v=1" media="screen" />
   
   <!-- js -->
   <script type="text/javascript" src="/home/js/jquery-1.9.0.min.js"></script>
   <script type="text/javascript" src="/home/js/common.js"></script>
</head>
<body>
   <div id="pagewrapper">   
      <?include('view/common/vic_header.php')?>
      <div class="contentwrapper">
         <?include('view/common/vic_main_menu.php')?>
         <div class="register_wrap">
            <h2>ĐĂNG KÝ</h2>
                  <?
                     if($action			==	'action_res'){
                         $captcha = getValue('captcha','str','POST','');
                         if($captcha == $_SESSION["securitycode"]) {
                             if($config_password == $pass){
                         		$errorMsg_res		.=	$myform->checkdata();
                         		 if($errorMsg_res == ''){
                         		 	$db_ex		=	new db_execute_return();
                         			$last_id		=	$db_ex->db_execute($myform->generate_insert_SQL());
                         			if($last_id	> 0){
                         				$myuser = new user($username, $password);
                         				$myuser->savecookie(time() + (365 * 86400));
                                         $link_home = '"/"';
                         				echo "<script>alert('Bạn đã đăng ký thành công !','Thông báo',(setTimeout('window.location.href=".$link_home."', 3000)));</script>";
                         			}
                                     else {
                                         echo "<script>alert('Có lỗi xảy ra !')</script>";
                                     }
                         		 }else echo '<div class="red">'.$errorMsg_res.'</div>';
                          	}
                         }
                         else {
                             echo "<script>alert('Mã bảo mật không đúng !')</script>";        
                         }
                     	
                     }
                  ?>
            <form action="" method="post" onsubmit="return validSend();">
               <div class="create_control">
                  <div class="create_control_1">Email</div>
                  <div class="create_control_2">
                     <input type="email" name="email" class="email" onchange="javascript:check_username()" value="<?=$username?>"/> <span class="red"> (*) </span>
                  </div>
               </div>
               <div class="create_control">
                  <div class="create_control_1">Mật khẩu</div>
                  <div class="create_control_2">
                     <input type="password" name="password" class="password" onchange="javascript:check_password()" value="<?=$pass?>"/> <span class="red"> (*) </span>
                     <div class="check_password_result red"></div>
                  </div>
               </div>
               <div class="create_control">
                  <div class="create_control_1">Nhập lại mật khẩu</div>
                  <div class="create_control_2">
                     <input type="password" name="password_again" class="password_again" onchange="javascript:check_password_again()"/> <span class="red"> (*) </span>
                     <div class="check_password_again_result red"></div>
                  </div>
               </div>
               <div class="create_control">
                  <div class="create_control_1">Mã xác nhận</div>
                  <div class="create_control_2">
                     <input type="text" name="captcha" class="captcha" style="float:left;min-width: 70px;width:80px"/> 
                     <img src="/home/securitycode.php" id="myimg" style="float: left;margin: 0 3px;height: 32px;"/>  
                     <a href="javascript:void(0)" onclick="imgsecuri_click()" class="reloadCaptcha" title="Click để lấy mã khác" style="font-size: 12px;margin: 6px 8px 0 0;float: left;">Click để lấy mã khác</a>
                     <span class="red"  style="margin-top: 6px;float: left;"> (*) </span>
                     <script>
                                    function imgsecuri_click() {
                                        var myimg = document.getElementById('myimg');
                                        myimg.style.display = "";
                                        myimg.src = '/home/securitycode.php';
                                    } 
                     </script>    
                  </div>
               </div>
                 
               <div class="create_control">
                  <div class="create_control_1">&nbsp;</div>
                  <div class="create_control_2">
                     <input type="hidden" name="action_res" value="action_res" />
               		<input type="submit" value="Đăng ký" name="submit" class="submit_creat" />
                  </div>
               </div>
            </form>
         </div>
      </div>
      <?
         include('view/common/vic_footer.php');
      ?>
   </div>
</body>
</html>