<?php
    $recruitment = new Recruitment($alias);
    $recruitment_page = true;
    $recruitment_detail = $recruitment->result;
    if(!$recruitment_detail) redirect('/');
    /*foreach($recruitment_detail as $k=>$v) {
        change_language_value($recruitment_detail);
    }*/
?>
<!DOCTYPE html>
<html lang="en" class="recruitment recruitment_detail not-opacity">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?=$recruitment->Seo()?>

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
            <li class="active"><?=$language[$lang_id]['tuyendung']?></li>
        </ol>
    </div>
</section>
<section id="recruitment">
    <div class="container">
        <div id="block-recruitment" class="text-center">
            <h2 class="view-title text-uppercase"><?=$language[$lang_id]['tuyendung']?></h2>

            <p class="text-uppercase"><?=$language[$lang_id]['gioithieuvetuyendung']?></p>
            <a class="btn btn-default text-uppercase" href="/ung-tuyen/"><?=$language[$lang_id]['ungtuyenngay']?></a>
        </div>
    </div>
</section>
<section id="main-content">
    <div class="container">
        <div class="page-recruitment">
            <div class="page-recruitment-title text-uppercase font_OpenSansSemibold"><?=$language[$lang_id]['danhsachtintuyendung']?></div>
            <div id="sub-menu-recruitment" class="col-md-3 col-sm-3">
                <ul>
                    <?
                      $i=0;
                      $recruitment_cat = $general->categories('recruitment');
                      /*foreach($recruitment_cat as $k=>$v) {
                         change_language_value($recruitment_cat[$k]);
                      }*/
                      
                      foreach($recruitment_cat as $row) {
                         $i++;
                         $recruitment_list_cat = $recruitment->recruitment_list_cat($row['cat_id']);
                         $recruitment_list_cat_arr[] = $recruitment_list_cat;
                    ?>
                        <li  class="" <?=($i == 1) ? 'aria-expanded="true"':''?>><a class="" href="/tuyen-dung/<?=$row['cat_alias']?>"><?=$row['cat_name']?> (<?=count($recruitment_list_cat)?>) </a></li>
                    <? } ?>
                </ul>
            </div>
            <div class="col-md-9 col-sm-9">

                <div class="block-recruitment-title text-uppercase"><?=$language[$lang_id]['vitridangtuyen']?></div>
                <div id="block-recruitment-content">
                    <h3 class="block-content-title"><?=$recruitment_detail['rec_title']?> </h3>
                    <?=$recruitment_detail['rec_detail']?> 
                </div>
                <div class="addthis_native_toolbox"></div>
                <div class="recruitment-button text-center">
                    <a href="/ung-tuyen/" class="btn font_OpenSansBold text-uppercase"><?=$language[$lang_id]['ungtuyenngay']?> <i class="glyphicon glyphicon-triangle-right"></i> </a>
                </div>
            </div>
        </div>
    </div>

</section>
<?php include('view/common/vic_footer.php');?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="/home/js/main.js"></script>
<script src="/home/js/jquery.flexslider-min.js"></script>

<script>
    $(document).ready(function () {
        $('.flexslider').flexslider({
            animation: "slide"
        });

    });
</script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/home/js/bootstrap.min.js"></script>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-530579e15989723d"></script> 
</body>
</html>