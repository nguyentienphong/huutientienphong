<section id="slider">
    <div class="container-full">
        <div class="flexslider">
            <ul class="slides">
                <?
                  $i=0;
                  $slides = $index->slides();
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