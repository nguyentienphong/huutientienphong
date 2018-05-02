<?
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
<!DOCTYPE html>
<html lang="en" class="contact not-opacity">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Liên hệ - VNPT EPAY JSC</title>

    <!-- Bootstrap -->
    <link href="/home/css/bootstrap.min.css" rel="stylesheet">
    <link href="/home/css/flexslider.css" rel="stylesheet">
    <link href="/home/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.2/respond.min.js"></script>

    <![endif]-->
</head>
    <body>
        <?php include('view/common/vic_header.php');?>
        <section id="breadcrumb-wrapper">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="/"><?=$language[$lang_id]['trangchu']?></a></li>
                    <li class="active"><?=$language[$lang_id]['lienhe']?></li>
                </ol>
            </div>
        </section>
        <section id="main-content">
            <div class="container">
                <div id="block-address" class="col-md-5">
                    <?
                      foreach($office as $row) {
                    ?>
                            <p><span class="address-title text-uppercase"> <?=$row['off_name']?> :</span><br/><?=$language[$lang_id]['diachi']?>:<?=$row['off_address']?><br/>
                                <?=$language[$lang_id]['dienthoai']?>: <?=$row['off_phone']?><br/>
                                Fax: <?=$row['off_fax']?></p>
                    <? } ?>
                </div>
                <div id="web-form" class="col-md-7">
                    <p class="web-form-title text-uppercase"><?=$language[$lang_id]['lienhevoichungtoi']?></p>
                    <?=($bg_errorMsg ? '<div class="alert red">'.$bg_errorMsg.'</div>' : '')?>
               <?=($err ? '<div class="alert red"><b>Mã bảo vệ không trùng khớp !</b></div>' : '')?> 
               <?=($bg_success ? '<div class="alert"><b>'.'Cảm ơn bạn đã gửi liên hệ. Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất!'.'</b></div>' : '')?>
                    <form method="POST" role="form" onsubmit="return validSend1()">
                        <?
                            $token= md5(uniqid());
                            $_SESSION['delete_customer_token']= $token;
                        ?>
                        <div class="form-group">
                            <label for="name"><?=$language[$lang_id]['hovaten']?><span>*</span></label>
                            <input type="text" class="form-control ctname" name="ctname" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span>*</span></label>
                            <input type="email" class="form-control ctemail" name="ctemail" id="email">
                        </div>
                        <div class="form-group">
                            <label for="phone"><?=$language[$lang_id]['dienthoai']?></label>
                            <input type="text" class="form-control ctphone" name="ctphone" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="message"><?=$language[$lang_id]['noidung']?><span>*</span></label>
                            <textarea class="form-control ctcontent" id="message" name="ctcontent" placeholder="" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="captcha" style="width: 100%;"><?=$language[$lang_id]['mabaove']?><span>*</span></label>
                            <input type="text" id="captcha" name="captcha" value="" class="captcha form-control" style="width: 78%;  display: inline-block;vertical-align: top;margin-right: 18px;">
                            <a href="javascript:void(0)" onclick="imgsecuri_click()" class="reloadCaptcha" title="Click để lấy mã khác" style="font-size: 12px;  margin: 2px 0px 0 0;display: inline-block;">
                            <img src="/home/securitycode.php" id="myimg" style="display: inline-block;  margin: 0 5px 29px 0;;height: 29px;"/>  
                            </a>
                            <script>
                                          function imgsecuri_click() {
                                              var myimg = document.getElementById('myimg');
                                              myimg.style.display = "";
                                              myimg.src = '/home/securitycode.php';
                                          } 
                            </script>                              
                           
                           
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-default text-uppercase"><?=$language[$lang_id]['guithongtin']?></button>
                                <input type="hidden" id="action" name="action" value="action">  
                                <input type="hidden" name="token" value="<?php echo $token; ?>" />
                            </div>
                        </div>
        
                    </form>
                </div>
            </div>
        
        </section>
        <?php include('view/common/vic_footer.php');?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="/home/js/jquery.flexslider-min.js"></script>
        <script src="/home/js/main.js"></script>
        <script>
            $(document).ready(function () {
                $('.flexslider').flexslider({
                    animation: "slide"
                });
        
            });
        </script>
        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/home/js/bootstrap.min.js"></script>
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