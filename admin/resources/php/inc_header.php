<div class="fl" id="cmsfunc">
   CMS 2015&nbsp;&nbsp;
   <?php
      //kiem tra xem neu la o tren localhost thi moi co quyen cau hinh
      $url = $_SERVER['SERVER_NAME'];
      if($isAdmin==1 && ($url == "localhost" || strpos($url,"192.168.1")!==false)){
   ?>
      <a href="#" id="websetting"><i class="icon-wrench icon-black fa fa-cog"></i></a>
   <?php }?>
    
</div>
<div class="menu-right">
    <ul class="notification-menu">
      <li class="">
         <?php
            $adm_info = admin_user_info($user_id);
         ?>
            <a href="http://adminex.themebucket.net/#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo '/pictures/admin_users/'.$adm_info['adm_avatar']?>" alt="" onerror="this.src='/pictures/admin_users/small_noavt.png'">
                <?php echo $adm_info['adm_name']?>
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                <!--<li><a href="http://adminex.themebucket.net/#"><i class="fa fa-user"></i>  Profile</a></li>-->
                <li><a href="#" id="infoacc"><i class="fa fa-cog icon-black"></i>Đổi mật khẩu</a></li>
                <li><a href="/admin/logout.php" style="padding: 8px;"><i class="fa fa-sign-out"></i> Thoát đăng nhập</a></li>
            </ul>
        </li>

    </ul>
</div>