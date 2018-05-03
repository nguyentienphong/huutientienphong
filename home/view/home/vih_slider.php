<aside id="colorlib-hero">
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
                    
                    <li style="background-image: url(<?=$row['sli_image']?>);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2><?=$row['sli_title']?></h2>
										<p><a class="btn btn-primary btn-demo" href="<?=$row['sli_link']?>"></i> <?php echo $language[$lang_id]['xemthem']?></a></p>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
                
               <?}?> 
			   		   	
			  	</ul>
		  	</div>
		</aside>