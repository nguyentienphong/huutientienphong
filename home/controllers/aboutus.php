<?
   $aboutus_page = true;
   $aboutus = new Aboutus();
?>
<!DOCTYPE html>
<html lang="en" class="introduction_general not-opacity">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Giới thiệu - VNPT EPAY JSC</title>

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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="/home/js/main.js"></script>
    <script src="/home/js/jquery.flexslider-min.js"></script>
    
    <script>
        $(document).ready(function () {
            $('.flexslider').flexslider({
            });
    
        });
    </script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/home/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('view/common/vic_header.php');?>
<?php include('view/common/vic_submenu.php');?>
<section id="slider">
    <div class="container-full">
        <div class="flexslider">
            <ul class="slides">
                <?
                  $i=0;
                  $slides = $aboutus->slides();
                  foreach($slides as $k=>$v) {
                     change_language_value($slides[$k]);
                  }
                  foreach($slides as $row) {
                     $i++;
                ?>
                    <li>
                        <img src="<?=$row['sli_image']?>" alt=""/>
                    </li>
                
               <?}?> 
            </ul>
        </div>
    </div>
</section>

<section id="main-content">
    <div class="container">
        <div id="intro_gene">
            <div class="view-header text-center">
                <h2 class="view-title text-uppercase"><?=$language[$lang_id]['gioithieuvevnptepay']?></h2>

                <p class="text-uppercase"><?=$language[$lang_id]['1trong3doanhnghiep']?></p>

                <div class="divide-block"></div>
            </div>
            <div class="content">
                <?=$aboutus_detail['abu_content']?>
            </div>
        </div>
        <div id="intro_gene">
            <div class="view-header text-center">
                <h2 class="view-title text-uppercase"><?=$language[$lang_id]['bomayvamohinhtochuc']?></h2>

                <p class="" style="text-align: justify;"><?=$language[$lang_id]['gioithieuvebomay']?></p>

                <div class="divide-block"></div>
            </div>
            <div class="content">
                <img src="/home/image/bomaytochuc<?=($lang_id == 0) ? '':'_en'?>.jpg" style="width: 100%;"/>
            </div>
        </div>

    </div>

</section>
<?php include('view/common/vic_footer.php');?>



</body>
</html>