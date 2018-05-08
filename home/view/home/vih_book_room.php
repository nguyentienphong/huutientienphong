<?php
	$bg_errorMsg = "";
	$book_room = new bookroom();
	$listing = $book_room->listing_rooms();
	$action = getValue('book-room','str','POST','');
	$myform = new generate_form();
	$myform->add('checkin_date','check-in-date',0,0,0,1, $language[$lang_id]['checkin_date_require']);
	$myform->add('checkout_date','check-out-date',0,0,0,1, $language[$lang_id]['checkout_date_require']);
	$myform->add('custumer_phone','phone',0,0,'',1,$language[$lang_id]['phone_require']);
	$myform->add('custumer_email','email',0,0,'',1,$language[$lang_id]['email_require']);
	if(!empty($action)){
		$bg_errorMsg .= $myform->checkdata();
		if($bg_errorMsg == ''){
			$myform->addTable('manage_book_room');
			$myform->removeHTML(0);
			$db_insert = new db_execute_return();
			$last_id = $db_insert->db_execute($myform->generate_insert_SQL());
			if($last_id > 0){
				$bg_errorMsg = $language[$lang_id]['book_room_message_success'];
				$show_modal = 'errorFroomBookRoom';
				
				$target = $_SERVER['HTTP_HOST'] . "/gui-mail/" . $last_id;
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $target);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
				curl_setopt($ch, CURLOPT_TIMEOUT, 1);
				$output = curl_exec($ch);
				$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				curl_close($ch);
			}
		} else {
			$show_modal = 'errorFroomBookRoom';
		}
	}
?>
<div id="colorlib-reservation">
			<div class="container">
				<div class="row">
					<div class="col-md-12 search-wrap">
						<form method="post" class="colorlib-form">
		              	<div class="row">
		                <div class="col-md-3">
		                  <div class="form-group">
		                    <label for="date"><?php echo $language[$lang_id]['checkin']?>:</label>
		                    <div class="form-field">
		                      <i class="icon icon-calendar2"></i>
		                      <input name="check-in-date" type="text" id="date" class="form-control date" placeholder="<?php echo $language[$lang_id]['checkin']?>" value="<?php echo getValue('check-in-date','str','POST','') ?>">
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-3">
		                  <div class="form-group">
		                    <label for="date"><?php echo $language[$lang_id]['Check-out']?>:</label>
		                    <div class="form-field">
		                      <i class="icon icon-calendar2"></i>
		                      <input name="check-out-date" type="text" id="date" class="form-control date" placeholder="<?php echo $language[$lang_id]['Check-out']?>" value="<?php echo getValue('check-out-date','str','POST','') ?>">
		                    </div>
		                  </div>
		                </div>
						<div class="col-md-3">
						  <div class="form-group">
							<label for="date"><?php echo $language[$lang_id]['email']?>:</label>
							<div class="form-field">
							  <input name="email" type="text" class="form-control" placeholder="Email" value="<?php echo getValue('email','str','POST','') ?>">
							</div>
						  </div>
						</div>
						<div class="col-md-2">
						  <div class="form-group">
							<label for="date"><?php echo $language[$lang_id]['phone-numb']?>:</label>
							<div class="form-field">
							  <input name="phone" type="text" class="form-control" placeholder="<?php echo $language[$lang_id]['phone-numb']?>" value="<?php echo getValue('phone','str','POST','') ?>">
							</div>
						  </div>
						</div>

		                <!--div class="col-md-2">
		                  <div class="form-group">
		                    <label for="adults">Adults</label>
		                    <div class="form-field">
		                      <i class="icon icon-arrow-down3"></i>
		                      <select name="people" id="people" class="form-control">
		                        <option value="#">1</option>
		                        <option value="#">2</option>
		                        <option value="#">3</option>
		                        <option value="#">4</option>
		                        <option value="#">5+</option>
		                      </select>
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-2">
		                  <div class="form-group">
		                    <label for="children">Children</label>
		                    <div class="form-field">
		                      <i class="icon icon-arrow-down3"></i>
		                      <select name="people" id="people" class="form-control">
		                        <option value="#">1</option>
		                        <option value="#">2</option>
		                        <option value="#">3</option>
		                        <option value="#">4</option>
		                        <option value="#">5+</option>
		                      </select>
		                    </div>
		                  </div>
		                </div-->
						
		                <div class="col-md-1">
		                  <input type="submit" name="book-room" id="submit" value="<?php echo $language[$lang_id]['book-room']?>" class="btn btn-primary btn-block">
		                </div>
		              </div>
		            </form>
					</div>
				</div>
			</div>
		</div>
		
<div class="modal fade" id="errorFroomBookRoom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $language[$lang_id]['notification']?></h4>
      </div>
      <div class="modal-body">
		<?php echo $bg_errorMsg; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $language[$lang_id]['close']?></button>
      </div>
    </div>
  </div>
</div>
