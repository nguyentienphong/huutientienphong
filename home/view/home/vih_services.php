<div id="block-view-service" class="row">
    <div class="view-header text-center">
        <h2 class="view-title text-uppercase"><?=$language[$lang_id]['dichvu']?></h2>

        <p class="text-uppercase"><?=$language[$lang_id]['gioithieuvedichvu']?></p>

        <div class="divide-block"></div>
    </div>

    <div class="row row1">
        <?
            $i=0;
            foreach($services_cat as $row) {
             $i++;
             if($i<3){
        ?>
                <div id="block-<?=$i?>" class="col-md-6 col-sm-6 block-service text-right">
                    <div class="content">
                        <div class="pull-left text-right">
                            <div class="block-title ">
                                <a href="/dich-vu/<?=$row['cat_alias']?>" class="text-uppercase"><?=$row['cat_name']?></a>
                            </div>
                            <div class="cat_ser_des"><?=$row['cat_description']?></div>

                        </div>
                        <div class="pull-right">
                               <a href="/dich-vu/<?=$row['cat_alias']?>"><span class="icon-service icon-service-<?=$i?> pull-right"></span></a>
                        </div>
                    </div>
                </div>
        <? }} ?>
    </div>
    <div class="row row1">
        <?
            $i=0;
            foreach($services_cat as $row) {
             $i++;
             if($i>=3 && $i<5){
        ?>
        <div id="block-<?=$i?>" class="col-md-6 col-sm-6 block-service text-right">
            <div class="content">
                <div class="pull-left text-right">
                    <div class="block-title">
                        <a href="/dich-vu/<?=$row['cat_alias']?>" class="text-uppercase"><?=$row['cat_name']?></a>
                    </div>

                    <div class="cat_ser_des"><?=$row['cat_description']?></div>
                </div>
                <div class="pull-right">
                    <span class="icon-service icon-service-<?=$i?> pull-right"></span>
                </div>
            </div>
        </div>
        <? }} ?>
    </div>
    <div class="row">
        <?
            $i=0;
            foreach($services_cat as $row) {
             $i++;
             if($i>=5){
        ?>
        <div id="block-<?=$i?>" class="col-md-6 col-sm-6 block-service text-right">
            <div class="content">
                <div class="pull-left text-right">
                    <div class="block-title">
                        <a href="/dich-vu/<?=$row['cat_alias']?>" class="text-uppercase"><?=$row['cat_name']?></a>
                    </div>

                    <div class="cat_ser_des"><?=$row['cat_description']?></div>
                </div>
                <div class="pull-right">
                    <span class="icon-service icon-service-<?=$i?> pull-right"></span>
                </div>
            </div>
        </div>
        <? }} ?>
    </div>
</div>

<div class="text-center">
    <h2 class="view-title text-uppercase"><?=$language[$lang_id]['tintuc']?></h2>
    <div class="divide-block"></div>
</div>