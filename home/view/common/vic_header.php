<?=$google_analytics?>
<header id="header-wrapper">
    <div class="container">
        <nav class="navbar navbar-default">
            <div id="dropdown_language" class="pull-right">
                <ul class="nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle text-uppercase" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="/home/img/icon_<?=($lang_id==0) ? 'vi':'en'?>.jpg"/> <span><?=($lang_id==0) ? 'Tiếng Việt':'English'?><span class="caret"></span></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="javascript:langVn()" class="text-uppercase <?=($lang_id==0) ? 'lang_active':''?>"><img src="/home/img/icon_vi.jpg"> <span>Tiếng Việt</span></a></li>
                            <li><a href="javascript:langEn();" class="text-uppercase <?=($lang_id==1) ? 'lang_active':''?>"><img src="/home/img/icon_en.jpg"> <span>English</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu1" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <div id="logo" class="pull-left"> <a class="navbar-brand" href="/"><img src="/home/img/logo.png" alt=""></a></div>
            </div>
            <div id="menu1" class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li class="<?=(@$home_page) ? 'active':''?>"><a href="/"><?=$language[$lang_id]['trangchu']?></a></li>
                    <li class="<?=(@$aboutus_page) ? 'active':''?>"><a href="/gioi-thieu/"><?=$language[$lang_id]['gioithieu']?></a></li>
                    <li class="<?=(@$services_page) ? 'active':''?>"><a href="/dich-vu/"><?=$language[$lang_id]['dichvu']?></a></li>
                    <li class="<?=(@$news_page) ? 'active':''?>"><a href="/tin-tuc/"><?=$language[$lang_id]['tintuc']?></a></li>
                    <li class="<?=(@$recruitment_page) ? 'active':''?>"><a href="/tuyen-dung/"><?=$language[$lang_id]['tuyendung']?></a></li>
                    <li class="<?=(@$contact_page) ? 'active':''?>"><a href="/lien-he/"><?=$language[$lang_id]['lienhe']?></a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </nav>
    </div><!-- /.container-fluid -->
</header>