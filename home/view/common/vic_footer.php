<footer id="footer-wrapper">
    <div class="container">
        <div id="footer-first" class="clearfix">
            <div class="col-md-4">
                <h5 class="block-title font_OpenSansBold">VNPT EPAY</h5>

                <div class="content">
                    <p> <?=$aboutus_detail['abu_summary']?></p>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <h5 class="block-title text-uppercase font_OpenSansBold "><?=$language[$lang_id]['gioithieu']?></h5>
                <div class="content">
                    <ul>
                        <li><a href="/gioi-thieu/"><?=$language[$lang_id]['gioithieu']?></a></li>
                        <li><a href="/tam-nhin-su-menh/"><?=$language[$lang_id]['tamnhinsumenh']?></a></li>
                        <li><a href="/van-hoa-doanh-nghiep/"><?=$language[$lang_id]['vanhoadoanhnghiep']?></a></li>
                        <li><a href="/doi-tac/"><?=$language[$lang_id]['doitac']?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <h5 class="block-title text-uppercase font_OpenSansBold"><?=$language[$lang_id]['dichvu']?></h5>

                <div class="content">
                    <ul>
                        <?
                            foreach($services_cat as $row) {
                        ?>
                        <li><a href="/dich-vu/<?=$row['cat_alias']?>"><?=$row['cat_name']?></a></li>
                        <? } ?>
                    </ul>
                </div>
            </div>
            <div id="block-contact" class="col-md-4 ">
                <h5 class="block-title font_OpenSansBold text-uppercase"><?=$language[$lang_id]['lienhe']?></h5>
                <div class="content">
                    <?
                      foreach($office as $row) {
                    ?>
                        <p><?=$row['off_name']?> : <?=$row['off_address']?> <br/> <?=$language[$lang_id]['dienthoai']?>:
                        <?=$row['off_phone']?> | Fax: <?=$row['off_fax']?></p>
                    <?}?>
                </div>
            </div>
        </div>
        <div id="footer-second" class="clearfix">
            <p class="font_OpenSansSemibold">© 2008 VNPT EPAY. All rights reserved.</p>
        </div>
    </div>
</footer>