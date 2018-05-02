<?php
$recruitment = new Recruitment();
$recruitment_page = true;
?>
<?
$rer_filename = 'filename';
$bg_filepath = ROOT."/file/resume/";
$bg_extension = 'doc,docx,xls,xlsx,ppt,pptx,pdf,jpg';
$limit_size = 3072;// 3MB
$bg_errorMsg = '';
$bg_success = '';
$err = '';  
$action = getValue('action','str','POST','');
if($action != ''){
    $ref = $_SERVER['HTTP_REFERER'];
    if($ref != DOMAIN.'/ung-tuyen/') die("Bạn ko thể thực hiện thao tác này");
    $token = $_SESSION['delete_customer_token'];
    unset($_SESSION['delete_customer_token']);
    if ($token && $_POST['token']==$token) {
        $email_field = getValue('email','str','POST','',2);
        if(!filter_var($email_field, FILTER_VALIDATE_EMAIL)){
            $bg_errorMsg .= 'Email không đúng định dạng <br>';
        }
        $name = getValue('name','str','POST','',2);
        $name = replaceMQ($name);
        $birthday = getValue('birthday','str','POST','',2);
        $birthday = replaceMQ($birthday);
        $birthday = convertDateTime($birthday);
        $sex = getValue('sex','int','POST',0,2);
        $sex = replaceMQ($sex);
        $message = getValue('message','str','POST','',2);
        $message = replaceMQ($message);
        $phone = getValue('phone','str','POST','',2);
        $phone = replaceMQ($phone);
        $ctname = getValue('ctname','str','POST','',2);
        $ctname = replaceMQ($ctname);
        $rer_date = time();
        $myform = new generate_form();
        $myform->add('rer_name','name',0,1,'',1,'Bạn chưa nhập họ và tên');
        $myform->add('rer_birthday','birthday',1,1,0,1,'Bạn chưa nhập ngày sinh');
        $myform->add('rer_phone','phone',0,1,'',1,'Bạn chưa nhập số điện thoại');
        $myform->add('rer_sex','sex',0,1,'',1,'Bạn chưa nhập giới tính');
        $myform->add('rer_address','address',0,0,'',0,'Bạn chưa nhập địa chỉ');
        $myform->add('rer_position','vitrituyendung',1,0,0,1,'Bạn chưa nhập vị trí tuyển dụng');
        $myform->add('rer_diploma','bangcap',1,0,0,1,'Bạn chưa nhập bằng cấp');
        $myform->add('rer_diploma_detail','bangcap_chitiet',0,0,'',0,'Bạn chưa nhập chi tiết bằng cấp');
        $myform->add('rer_salary','salary',1,0,0,0,'Bạn chưa nhập số lương');
        $myform->add('rer_email','email_field',0,1,'',1,'Bạn chưa nhập email');
        
        $myform->add('rer_message','message',0,1,'',1,'Bạn chưa nhập tự giới thiệu');
        $myform->add('rer_other','message_other',0,0,'',0,'');
        $myform->add('rer_date','rer_date',1,1,0);
        
          
        $myform->addTable('recruitment_resume');
        $bg_errorMsg .= $myform->checkdata();  
        $captcha = getValue('captcha','str','POST','');
        if($captcha == $_SESSION["securitycode"]) { 
            if($bg_errorMsg == ''){
                /*$upload_file = new upload('file_cv', $bg_filepath, $bg_extension, $limit_size,'',$name.'_');
                //var_dump($upload_file) ;
                if($upload_file->file_name !=""){
                    $rer_filename = $upload_file->file_name;
                    $myform->add("rer_filename", "rer_filename", 0, 1, " ", 0, "Bạn chưa chọn file CV");    
                    
                }
                $bg_errorMsg .= $upload_file->common_error; 
                $upload_file_other = new upload('file_other', $bg_filepath, $bg_extension, $limit_size,'',$name.'_');
                //var_dump($upload_file) ;
                if($upload_file_other->file_name !=""){
                    $rer_filename_other = $upload_file_other->file_name;
                    $myform->add("rer_filename_other", "rer_filename_other", 0, 1, " ", 0, "Bạn chưa chọn file upload khác");    
                    $bg_errorMsg .= $upload_file_other->common_error; 
                }*/
                
                if($bg_errorMsg == ''){            
                    $db = new db_execute($myform->generate_insert_SQL());
                    send_mailer('tuyendung@vnptepay.com.vn',"Hồ sơ tuyển dụng mới",'Kiểm tra hệ thống để xem hồ sơ tuyển dụng mới nhất',"");
                    $bg_success = 1;                
                }
               
            } 
    }else $err = 1; 
        }else echo 'CSRF attack?' ;   
    
    }
?>
<!DOCTYPE html>
<html lang="en" class=" recruitment_form  not-opacity">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ứng tuyển ngay - VNPT EPAY JSC</title>

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
<section id="slider">
    <div class="container-full">
        <div class="flexslider">
            <ul class="slides">
                    <li>
                        <img src="/home/image/bg_recruitment_form.jpg" />
                    </li>
            </ul>
        </div>
    </div>
</section>
<section id="main-content">
    <div class="container">

        <div id="form-recruitment" >
            <?=($bg_errorMsg ? '<div class="alert red">'.$bg_errorMsg.'</div>' : '')?>
            <?=($err ? '<div class="alert red"><b>Mã bảo vệ không trùng khớp !</b></div>' : '')?> 
            <?=($bg_success ? '<div class="alert"><b>'.'Cảm ơn bạn đã gửi hồ sơ. Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất!'.'</b></div>' : '')?>
            <form role="form" method="POST" enctype="multipart/form-data" novalidate="novalidate" onsubmit="return validSend1()">
                <?
                    $token= md5(uniqid());
                    $_SESSION['delete_customer_token']= $token;
                ?>
                <div class="form-group">
                    <label for="name"><i><?=$language[$lang_id]['hovaten']?></i><span>*</span></label>
                    <input type="text" class="form-control name" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="datetimepicker1"><i><?=$language[$lang_id]['ngaysinh']?></i><span>*</span></label>

                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control datepicker birthday" name="birthday"/>
                    <span class="input-group-addon" style="cursor: pointer;">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>

                </div>
                <div class="form-group">
                    <label for="gender"><i><?=$language[$lang_id]['gioitinh']?></i><span>*</span></label>
                    <select class="form-control sex" id="gender" name="sex">
                        <option value=""><?=$language[$lang_id]['chongioitinh']?></option>
                        <option value="1"><?=$language[$lang_id]['nam']?></option>
                        <option value="2"><?=$language[$lang_id]['nu']?></option>
                    </select>

                </div>

                <div class="form-group">
                    <label for="email"><i>Email</i><span>*</span></label>
                    <input type="email" class="form-control email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="phone"><i><?=$language[$lang_id]['sodienthoai']?></i><span>*</span></label>
                    <input type="text" class="form-control phone" id="phone" name="phone">
                </div>
                <div class="form-group">
                    <label for="address"><i><?=$language[$lang_id]['diachi']?></i></label>
                    <input type="text" class="form-control address" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="gender"><i><?=$language[$lang_id]['vitriungtuyen']?></i><span>*</span></label>
                    <select class="form-control vitrituyendung" id="vitrituyendung" name="vitrituyendung">
                        <option value=""><?=$language[$lang_id]['chonvitri']?></option>
                        <?
                            $recruitment = new Recruitment();
                            $recruitment_list = $recruitment->recruitment_list();
                            
                            foreach($recruitment_list as $row){
                        ?>
                                <option value="<?=$row['rec_id']?>"><?=$row['rec_title']?></option>
                        <?
                            }
                        ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="gender"><i><?=$language[$lang_id]['bangcap']?></i><span>*</span></label>
                    <select class="form-control bangcap" id="bangcap" name="bangcap">
                        <option value=""><?=$language[$lang_id]['chonbangcap']?></option>
                        <option value="1"><?=$language[$lang_id]['trendaihoc']?></option>
                        <option value="2"><?=$language[$lang_id]['daihoc']?></option>
                        <option value="3"><?=$language[$lang_id]['caodang']?></option>
                        <option value="4"><?=$language[$lang_id]['khac']?></option>
                    </select>

                </div>
                <div class="form-group">
                    <label for="bangcap_chitiet"><i><?=$language[$lang_id]['chitietbangcap']?></i></label>
                    <textarea class="form-control bangcap_chitiet" id="bangcap_chitiet" name="bangcap_chitiet" placeholder="<?=$language[$lang_id]['vidu']?>: Bách khoa, CCNA ,DBA ..." rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="salary"><i><?=$language[$lang_id]['mucluong']?></i></label>
                    <input type="text" class="form-control salary" id="salary" name="salary" placeholder="<?=$language[$lang_id]['vidu']?>: 5000000">
                </div>
                <?/*
                <div class="form-group">
                    <label for="file_cv"><i>File CV</i> <span>*</span></label>
                    <input type="file" class="form-control file_cv" data-bfi-disabled id="file_cv" name="file_cv">

                    <p class="help-block text-right"><i><?=$language[$lang_id]['dinhdangteptin']?>: doc, docx, xls, xlsx, ppt, pptx, pdf,
                        jpg<br/>
                        <?=$language[$lang_id]['dungluongkhongqua3mb']?></i></p>

                </div>
                <div class="form-group">
                    <label for="file_other"><i><?=$language[$lang_id]['hosokhac']?></i> </label>
                    <input type="file" class="form-control" id="file_other" name="file_other">

                    <p class="help-block text-right"><i><?=$language[$lang_id]['dinhdangteptin']?>: doc, docx, xls, xlsx, ppt, pptx, pdf,
                        jpg<br/>
                        <?=$language[$lang_id]['dungluongkhongqua3mb']?></i></p>
                </div>*/?>
                <div class="form-group">
                    <label for="message"><i><?=$language[$lang_id]['tugioithieu']?></i><span>*</span></label>
                    <textarea class="form-control message" id="message" name="message" placeholder="" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="message"><i><?=$language[$lang_id]['kynangkhac']?></i></label>
                    <textarea class="form-control message_other" id="message_other" name="message_other" placeholder="" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="captcha"><?=$language[$lang_id]['mabaove']?><span>*</span></label>
                    <input type="text" id="captcha" name="captcha" value="" class="captcha form-control" style="  width: 78%;  display: inline-block;vertical-align: top;margin-right:27px">
                    <a href="javascript:void(0)" onclick="imgsecuri_click()" class="reloadCaptcha" title="Click để lấy mã khác" style="font-size: 12px;  margin: 2px 0px 0 0px;display: inline-block;">
                    <img src="/home/securitycode.php" id="myimg" style="display: inline-block;  margin: 0 5px 0px 0;;height: 29px;"/>  
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
                        <button type="submit" class="btn btn-default text-uppercase font_OpenSansBold "><?=$language[$lang_id]['guithongtin']?></button>
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
<script src="/home/js/bootstrap-datepicker.js?v=1"></script>

<script>
    $(document).ready(function () {
        $('.flexslider').flexslider({
            animation: "slide"
        });

    });
    $('#datetimepicker1').datepicker()
</script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/home/js/bootstrap.min.js"></script>
</body>
</html>
<script>

   function validSend1(){	
      if($('.name').val()==''){
   		alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?> ');
   		$('.name').focus();
         return false;
   	}
    if($('.birthday').val()==''){
   		alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?>');
   		$('.birthday').focus();
         return false;
   	}
    if($('.sex').val()==''){
   		alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?>');
   		$('.sex').focus();
         return false;
   	}
      if(!isemail($('.email').val())){
   		alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?>');
   		$('.email').focus();
         return false;
   	}
    if($('.phone').val()==''){
   		alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?>');
   		$('.phone').focus();
         return false;
   	}
    if($('.vitrituyendung').val()==''){
   		alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?>');
   		$('.vitrituyendung').focus();
         return false;
   	}
    if($('.bangcap').val()==''){
   		alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?>');
   		$('.bangcap').focus();
         return false;
   	}
    /*if($('.file_cv').val()==''){
   		alert('<?//=$language[$lang_id]['vuilongnhapduthongtin']?>');
   		$('.file_cv').focus();
         return false;
   	}*/
    if($('.message').val()==""){
        alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?>');
        $('.message').focus();
        return false;
    }  
    if($('.captcha').val()==""){
        alert('<?=$language[$lang_id]['vuilongnhapduthongtin']?>');
        $('.captcha').focus();
        return false;
    }    	
}
</script>