<div id="colorlib-rooms" class="colorlib-light-grey">
	<div class="container">
		<div class="row">
			<?php
				$room_detail = $rooms->detail_rooms($re_id);
				
			?>
			<div class="col-md-10 col-md-offset-1 animate-box fadeInUp animated-fast">
				<h3><?=$room_detail['roo_name']; ?></h3>
				<div class="row contact-info-wrap">
					<div class="colorlib-heading">
						<a href="#" class="room image-popup-link" style="background-image: url(<?=$room_detail['roo_image']; ?>);"></a>
						
						<div class="book_in_detail text-center">
							<p class="price_in_detail">
								<span class="price-room"><?=number_format($room_detail['roo_price']); ?></span>
								<span class="currency">vnđ</span>
								<span class="per">/ <?php echo $language[$lang_id]['per_night']?></span>
							</p>
							
							<p><a class="btn btn-primary" href="/">Book now!</a></p>
						</div>
					</div>
					
					<div class="colorlib-heading">
						<span></span>
						<h4><?php echo $language[$lang_id]['tong_quan']?></h4>
						<p><?=$room_detail['roo_description']; ?></p>
					</div>
					
					<div class="colorlib-heading">
						<span></span>
						<h4><?php echo $language[$lang_id]['tien_ich']?></h4>
						<p><?=$room_detail['roo_detail']; ?></p>
					</div>
					
				</div>
			</div>
						
		</div>
	</div>
</div>
