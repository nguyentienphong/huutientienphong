<div id="colorlib-rooms" class="colorlib-light-grey">
	<div class="container">
		<div class="row">
			<?php
				$list_room = $rooms->listing_rooms();
				foreach($list_room as $rooms):
			?>
				<div class="col-md-4 room-wrap animate-box">
					<a href="/phong/<?=$rooms['roo_id']; ?>" class="room image-popup-link" style="background-image: url(<?=$rooms['roo_image']; ?>);"></a>
					<div class="desc text-center">
						<!--span class="rate-star"><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span-->
						<h3><a href="/phong/<?=$rooms['roo_id']; ?>"><?=$rooms['roo_name']; ?></a></h3>
						<p class="price">
							<span class="price-room"><?=number_format($rooms['roo_price']); ?></span>
							<span class="currency">vnđ</span>
							<span class="per">/ <?php echo $language[$lang_id]['per_night']?></span>
						</p>
						<!--ul>
							<li><i class="icon-check"></i> Only 10 rooms are available</li>
							<li><i class="icon-check"></i> Breakfast included</li>
							<li><i class="icon-check"></i> Price does not include VAT &amp; services fee</li>
						</ul-->
						<p><a class="btn btn-primary" href="/">Book now!</a></p>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
