<div id="colorlib-testimony" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2><?=$language[$lang_id]['khachhangnoivechungtoi']?></h2>
					</div>
				</div>
				<div class="row">
                <?
                                $feedback = $index->feedback();
                                foreach($feedback as $k=>$v) {
                                    change_language_value($feedback[$k]);
                                }
                                $i=0;
                                foreach($feedback as $row) {
                                 $i++;
                            ?>   
				<div class="col-md-4 animate-box">
					<div class="testimony text-center">
						<span class="img-user" style="background-image: url(<?=get_image_size($row['fee_image'],'medium_')?>);"></span>
						<span class="user"><?=$row['fee_fullname']?></span>
						<blockquote>
							<p></i> <?=$row['fee_content']?></p>
						</blockquote>
					</div>
				</div>
                <?php } ?>
				
			</div>
			</div>
		</div>