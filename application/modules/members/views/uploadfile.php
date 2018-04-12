<div class="container">
    <div class="row profile">
		<div class="col-md-4">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					<img src="<?= base_url() ?>asset/passport/765-default-avatar.png" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitlfe">
					<div class="profile-usertitle-name">
						Marcus Doe
					</div>
					<div class="profile-usfertitle-job">
						Developer
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				
			</div>
		</div>
		<div class="col-md-4">
            <div class="profile-content">
            	<p style="color: red; text-align: center;"><?= $headline ?></p>
            	<img src="<?= base_url() ?>asset/passport/765-default-avatar.png" alt="" class="img-responsive">
			  	
            	<div class="error_align"><?= validation_errors("<p style='color: red;'>", "</p>") ?></div>
                <div  class="flash_align" ">
                    <?php
                if (isset($flash)) {
                  echo $flash;
                }
                ?>
                </div>
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open_multipart('members/do_upload/'.$member_session_id, $attributes);
                ?>

			  		<p>Upload</p>
				  	<input type="file" name="userfile"><p>&nbsp;</p>
					<button type="submit" name="submit" class="button button-normal sky full-false small round animate-false anim-type-ghost hover-fill element-animate-false">upload</button>
					<button type="submit" name="submit" value="Cancel" class="button button-normal pink full-false small round animate-false anim-type-ghost hover-fill element-animate-false">cancel</button>
			  	</form>
			</div>
          </div>
         <div class="col-md-4">
			
		</div>
		</div>
	</div>
</div>