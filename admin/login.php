<?php 
session_start();	
error_reporting(E_ALL);
require_once("../functions/functions.php");
require_once('../config/config_db.php');
require_once("../classes/database.php");
require_once("resources/security/functions.php");
require_once("resources/security/functions_1.php");
$username	= getValue("username", "str", "POST", "", 1);
$password	= getValue("password", "str", "POST", "", 1);
$action		= getValue("action", "str", "POST", "");



?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator Managerment</title>
<link rel="stylesheet" type="text/css" href="resources/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="resources/css/common.css" />
<link rel="stylesheet" type="text/css" href="resources/css/home.css" />
<link href="resources/css/style.css" rel="stylesheet">
<link href="resources/css/style-responsive.css" rel="stylesheet">
<script src="resources/js/jquery-1.10.2.min.js"></script>
<script src="resources/js/bootstrap.min.js"></script>
</head>
<body class="login-body" cz-shortcut-listen="true">

<div class="container">

    <form class="form-signin" action="" method="post">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">Đăng nhập</h1>
            <img src="/home/img/logo.png" alt="">
        </div>
        <div class="login-wrap">
        <?
            if($action == "login"){
                $token = $_SESSION['delete_customer_token'];
                unset($_SESSION['delete_customer_token']);
                if ($token && $_POST['token']==$token) {
                	$user_id	= 0;
                	$user_id = checkLogin($username, $password);
                	if($user_id != 0){
                		$isAdmin		= 0;
                		$db_isadmin	= new db_query("SELECT adm_isadmin FROM admin_users WHERE adm_id = " . $user_id);
                		$row			= mysql_fetch_array($db_isadmin->result);
                		if($row["adm_isadmin"] != 0) $isAdmin = 1;
                		//Set SESSION
                		$_SESSION["logged"]			= 1;
                		$_SESSION["user_id"]		= $user_id;
                		$_SESSION["userlogin"]		= $username;
                		$_SESSION["password"]		= md5($password);
                		$_SESSION["isAdmin"]			= $isAdmin;
                		
                		unset($db_isadmin);
                        redirect('index.php');
                	}else{
                	  echo '<div class="alert alert-block alert-danger fade in"><button type="button" class="close close-sm" data-dismiss="alert"><i class="fa fa-times"></i></button>Sai tài khoản hoặc mật khẩu!</div></p>';
                	}
                }else echo 'CSRF attack?' ;
            }
        ?>
            <input type="text" class="form-control" placeholder="Tên đăng nhập" autofocus="" name="username">
            <input type="password" class="form-control" placeholder="Mật khẩu" name="password">

            <button class="btn btn-lg btn-login btn-block" type="submit">
            <input type="hidden" name="action" value="login"/>
            <i class="fa fa-check"></i>
            </button>
            <?
                $token= md5(uniqid());
                $_SESSION['delete_customer_token']= $token;
            ?>
            <input type="hidden" name="token" value="<?php echo $token; ?>" />
            <!--<label class="checkbox">
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Quên mật khẩu?</a>

                </span>
            </label>-->

        </div>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-primary" type="button">Submit</button>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->

</body>
</html>