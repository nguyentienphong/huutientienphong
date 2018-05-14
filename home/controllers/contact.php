<?
$index = new Index();
$bg_errorMsg = '';
$bg_success = '';
$err = '';  
$action = getValue('action','str','POST','');
if($action == 'action'){
    $ref = $_SERVER['HTTP_REFERER'];
    if($ref != DOMAIN.'/lien-he/') die("Bạn ko thể thực hiện thao tác này");
    $token = $_SESSION['delete_customer_token'];
    unset($_SESSION['delete_customer_token']);
    if ($token && $_POST['token']==$token) {
        $email_field = getValue('ctemail','str','POST','',2);
        $email_field = replaceMQ($email_field);
        if(!filter_var($email_field, FILTER_VALIDATE_EMAIL)){
            $bg_errorMsg .= 'Email không đúng định dạng <br>';
        }
        $title_field = getValue('title','str','POST','',2);
        $title_field = replaceMQ($title_field);
        $content_field = getValue('ctcontent','str','POST','',2);
        $content_field = replaceMQ($content_field);
        $ctphone = getValue('ctphone','str','POST','',2);
        $ctphone = replaceMQ($ctphone);
        $ctname = getValue('ctname','str','POST','',2);
        $ctname = replaceMQ($ctname);
        $con_date = time();
        $myform = new generate_form();
        $myform->add('con_name','ctname',0,1,'',1,'Bạn chưa nhập tên');
        $myform->add('con_email','email_field',0,1,'',1,'Bạn chưa nhập email');
        $myform->add('con_phone','ctphone',0,1,'',0,'Bạn chưa nhập số điện thoại');
        $myform->add('con_detail','content_field',0,1,'',1,'Bạn chưa nhập nội dung');
        $myform->add('con_date','con_date',1,1,0);
        $myform->addTable('contact');
        $bg_errorMsg .= $myform->checkdata();  
        $captcha = getValue('captcha','str','POST','');
        if($captcha == $_SESSION["securitycode"]) { 
           if($bg_errorMsg == ''){
               $db = new db_execute($myform->generate_insert_SQL());
               $bg_success = 1;
           } 
        }else $err = 1;   
    }else echo 'CSRF attack?' ;
}

$contact_page = true;

?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Liên hệ Viễn Dương Cát Bà</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content="http://vienduongcatba.com/home/images/logo.png"/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="http://vienduongcatba.com/home/images/logo.png" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
    <link rel="icon" href="../../../favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="/home/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/home/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/home/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="/home/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="/home/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="/home/css/owl.carousel.min.css">
	<link rel="stylesheet" href="/home/css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="/home/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="/home/css/style.css">
    <link rel="stylesheet" href="/home/css/mystyle.css">
	<!-- Modernizr JS -->
	<script src="/home/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		
		<?php include(ROOT.'/home/view/common/vic_header.php');?>
        <?php include(ROOT.'/home/view/home/vih_slider.php');?>
		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3><?=$language[$lang_id]['lienhe']?></h3>
                        <?
                          foreach($office as $row) {
                        ?>
						<div class="row contact-info-wrap">
							<div class="col-md-3">
								<p><span><i class="icon-location-2"></i></span> <?=$row['off_address']?></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-phone3"></i></span> <a href="tel://<?=$row['off_phone']?>"><?=$row['off_phone']?></a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-paperplane"></i></span> <a href="mailto:<?=$row['off_email']?>"><?=$row['off_email']?></a></p>
							</div>
							<div class="col-md-3">
								<p><span><i class="icon-globe"></i></span> <a href="#"><?=$row['off_website']?></a></p>
							</div>
						</div>
                        <?php } ?>
					</div>
					<div class="col-md-10 col-md-offset-1 animate-box">
						<h3><?=$language[$lang_id]['lienhevoichungtoi']?></h3>
                        <?=($bg_errorMsg ? '<div class="alert red">'.$bg_errorMsg.'</div>' : '')?>
               <?=($err ? '<div class="alert red"><b>Mã bảo vệ không trùng khớp !</b></div>' : '')?> 
               <?=($bg_success ? '<div class="alert" style=" color:red"><b>'.'Cảm ơn bạn đã gửi liên hệ. Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất!'.'</b></div>' : '')?>
						<form method="POST" role="form" onsubmit="return validSend1()">
                        <?
                            $token= md5(uniqid());
                            $_SESSION['delete_customer_token']= $token;
                        ?>
							<div class="row form-group">
								<div class="col-md-6">
									<label for="fname"><?=$language[$lang_id]['hovaten']?>*</label>
									<input type="text" id="ctname" class="form-control ctname" placeholder="<?=$language[$lang_id]['hovaten']?>" name="ctname">
								</div>
								<div class="col-md-6">
									<label for="lname"><?=$language[$lang_id]['dienthoai']?></label>
									<input type="text" name="ctphone" id="ctphone" class="form-control ctphone" placeholder="<?=$language[$lang_id]['dienthoai']?>">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="email">Email*</label>
									<input type="text" id="email" class="form-control ctemail" name="ctemail" placeholder="Email">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">
									<label for="message"><?=$language[$lang_id]['noidung']?>*</label>
									<textarea name="ctcontent" id="ctcontent" cols="30" rows="10" class="form-control ctcontent" placeholder="<?=$language[$lang_id]['noidung']?>"></textarea>
								</div>
							</div>
                            <div class="row form-group">
                                <div class="col-md-12">
                                <label for="captcha" style="width: 100%;"><?=$language[$lang_id]['mabaove']?><span>*</span></label>
                                <input type="text" id="captcha" name="captcha" value="" class="captcha form-control" style="width: 78%;  display: inline-block;vertical-align: top;margin-right: 18px;">
                                <a href="javascript:void(0)" onclick="imgsecuri_click()" class="reloadCaptcha" title="Click để lấy mã khác" style="font-size: 12px;  margin: 2px 0px 0 0;display: inline-block;">
                                <img src="/home/controllers/securitycode.php" id="myimg" style="display: inline-block;  margin: 0 5px 29px 0;;height: 29px;"/>  
                                </a>
                                <script>
                                              function imgsecuri_click() {
                                                  var myimg = document.getElementById('myimg');
                                                  myimg.style.display = "";
                                                  myimg.src = '/home/controllers/securitycode.php';
                                              } 
                                </script>                              
                               
                               </div>
                            </div>
							<div class="form-group text-center">
								<button type="submit" class="btn btn-primary text-uppercase"><?=$language[$lang_id]['guithongtin']?></button>
                                <input type="hidden" id="action" name="action" value="action">  
                                <input type="hidden" name="token" value="<?php echo $token; ?>" />
							</div>

						</form>		
					</div>
				</div>
			</div>
		</div>
		
		<?php include(ROOT.'/home/view/common/vic_footer.php');?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="/home/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/home/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/home/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/home/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="/home/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="/home/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="/home/js/jquery.magnific-popup.min.js"></script>
	<script src="/home/js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="/home/js/bootstrap-datepicker.js"></script>
	<!-- Main -->
	<script src="/home/js/main.js"></script>

	</body>
</html>
<script>

   function validSend1(){	
      if($('.ctname').val()==''){
   		alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?>');
   		$('.ctname').focus();
         return false;
   	}
      if(!isemail($('.ctemail').val())){
   		alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?>');
   		$('.ctemail').focus();
         return false;
   	} 
      if($('.ctcontent').val()==""){
         alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?>');
   		$('.ctcontent').focus();
         return false;
      }  
      if($('.captcha').val()==""){
         alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?>');
   		$('.captcha').focus();
         return false;
      }    	
   }
</script>