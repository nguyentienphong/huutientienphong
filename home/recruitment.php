<?php
    $recruitment = new Recruitment();
    $recruitment_page = true;
?>
<!DOCTYPE html>
<html lang="en" class="recruitment not-opacity">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tuyển dụng - VNPT EPAY JSC</title>

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
                <?php include('view/recruitment/vir_categories.php');?>
            </div>
            <div id="" class="col-md-9 col-sm-9">
                <div class="block-recruitment-title text-uppercase"><?=$language[$lang_id]['vitridangtuyen']?></div>
                    <div id="myTabContent"class="tab-content">
                     <?
                      $i=0;
                      foreach($recruitment_cat as $key=>$row) {
                        $i++;
                        $recruitment_list_cat = $recruitment_list_cat_arr[$key];
                         /*foreach($recruitment_list_cat as $k=>$v) {
                                 change_language_value($recruitment_list_cat[$k]);    
                         }*/
                    ?>
                    <div id="<?=$row['cat_alias']?>" role="tabpanel" class="tab-pane <?=($i==1) ? 'active':''?>">
                        <div id="block-recruitment-content">
                            <? foreach($recruitment_list_cat as $row) {
                            ?>
                                    <div class="block-news-recruitment">
                                        <p><span class="date"> <?=getDateTime(1,0,1,0,'',$row['rec_date'])?> </span><span class="recrui-hot text-lowercase">New</span></p>
                                        <a class="news-title" href="/tuyen-dung/<?=$row['rec_alias']?>.html"> <?=$row['rec_title']?></a>
                
                                        <p class="summary"><?=$row['rec_summary']?></p>
                                        <div class="views-button">
                                            <a class="btn btn-default" href="/tuyen-dung/<?=$row['rec_alias']?>.html"><?=$language[$lang_id]['xemthem']?> ></a>
                                        </div>
                                    </div>
                            <?
                            }?>
                        </div>
                    </div>
                    <? } ?>
                    
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
<script>
<?if($alias !='tuyen-dung'){
    $alias  = htmlspecialbo($alias);
    $alias  = replaceMQ($alias);
    ?>
    $('#myTab a[href="#<?=$alias?>"]').tab('show')
<?}?>
    $('#myTab a').click(function (e) {
      e.preventDefault()
      $(this).tab('show');
    })
</script>
</body>
</html>