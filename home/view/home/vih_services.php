
<div id="colorlib-services">
			<div class="container">
				<div class="row">
                    <?
                        $i=0;
                        $services = new Services();
                        $services_list= $services->services_list();
                        foreach($services_list as $k=>$v) {
                            change_language_value($services_list[$k]);
                        }
                        foreach($services_list as $row) {
                         $i++;
                    ?>
					<div class="col-md-3 animate-box text-center">
						<div class="services">
							<img src="<?=$row['ser_image']?>" style="width: 100px;height:100px"/>
							<h3><?=$row['ser_title']?></h3>
							<p><?=$row['ser_summary']?></p>
						</div>
					</div>
                    <? } ?>
					
				</div>
			</div>
		</div>