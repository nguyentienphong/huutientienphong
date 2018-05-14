<?
    $rooms = new Rooms();
    $listing_rooms = $rooms->listing_rooms();
    foreach($listing_rooms as $k=>$v) {
        change_language_value($listing_rooms[$k]);
    }
            $i=0;
            foreach($listing_rooms as $row) {
             $i++;
        ?>
        <div class="item">
								<a href="<?=$row['roo_image']?>" class="room image-popup-link" style="background-image: url(<?=$row['roo_image']?>);"></a>
								<div class="desc text-center">
									<span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
									<h3><a href="/phong/<?=$row['roo_alias']?>.html"><?=$row['roo_name']?></a></h3>
									<p class="price">
										
										<span class="price-room"><?=number_format($row['roo_price'])?></span>
                                        <span class="currency"><?//=$language[$lang_id]['donvi']?>VNĐ</span>
										<span class="per">/ <?=$language[$lang_id]['motdem']?></span>
									</p>
									<ul>
										<!--li><i class="icon-check"></i> <?//=$row['roo_number']?></li>
										<li><i class="icon-check"></i> <?//=$language[$lang_id][($row['roo_status'] ==0) ?'hetphong':'conphong']?></li-->
									</ul>
									<p><a class="btn btn-primary btn-book"><?=$language[$lang_id]['datphong']?>!</a></p>
								</div>
							</div>
<? } ?>