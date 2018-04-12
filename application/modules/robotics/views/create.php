<div  class="flash_align" ">
	<?php
	if (isset($flash)) {
	  echo $flash;
	}
?>
<h1 class="error_align"><?= $headline ?></h1>
<?php 
	if(is_numeric($update_id)) {
?>
<div class="row">
	<div class="col-sm-12">
	    <div class="panel panel-info">
	       <div class="panel-heading">Make Changes To Uploaded Data</div>
	        <p class="text-muted m-b-15 font-5"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	            <?php if($got_gallery_pic == FALSE) { ?>
	            <!-- Page others here -->
	           	<a href="<?= base_url() ?>item_galleries/update_group/<?= $update_id ?>"><button class="btn btn-info btn-rounded">LEGO IMAGES</button></a>
	           	<?php }else{ ?>
	           		            <!-- .row -->
	           	
                <div class="row el-element-overlay">
                    <!-- .usercard -->
                    <?php 
	           		foreach($query_gallery->result() as $rows) {
	           			$gallery_pictures = $rows->picture;
	           		?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="<?= base_url() ?>robotics/images_galleries/<?= $gallery_pictures ?>" />
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><a class="btn default btn-outline image-popup-vertical-fit" href="<?= base_url() ?>robotics/images_galleries/<?= $gallery_pictures ?>"><i class="icon-magnifier"></i></a></li>
                                            <li><a class="btn default btn-outline" href="<?= base_url() ?>robotics/view/<?= $update_id ?>"><i class="icon-link"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.usercard-->
                    <?php } ?>
                </div>
                <!-- /.row -->
	           	<a href="<?= base_url() ?>item_galleries/update_group/<?= $update_id ?>"><button class="btn btn-success btn-rounded">LEGO IMAGES</button></a>
	           	<?php } ?>
	           	<?php if($big_pic_one == FALSE) { ?>
	            <a href="<?= base_url() ?>robotics/upload_image_one/<?= $update_id ?>"><button class="btn btn-info btn-rounded">LEGO Image</button></a>
	            <?php }else{ ?>
	            <a href="<?= base_url() ?>robotics/deletefirst/<?= $update_id ?>"><button class="btn btn-danger btn-rounded">Delete LEGO Image</button></a>
	            <?php } ?>
	           	<?php if($videos == "") { ?>
	           	<a href="<?= base_url() ?>robotics/upload_video/<?= $update_id ?>"><button class="btn btn-info btn-rounded">LEDO Video</button></a>
	           	<?php }else{ ?>
	           	<a href="<?= base_url() ?>robotics/delete_video/<?= $update_id ?>"><button class="btn btn-danger btn-rounded">Delete video</button></a>
	           	<?php } ?>
	           	<?php if($big_pic == "") { ?>
	           	<a href="<?= base_url() ?>robotics/upload_image/<?= $update_id ?>"><button class="btn btn-info btn-rounded">Attach Videos</button></a>
	           	<?php }else{ ?>
	           	<a href="<?= base_url() ?>robotics/delete_image/<?= $update_id ?>"><button class="btn btn-danger btn-rounded">Delete Attach Image</button></a>
	           	<?php } ?>
	           	<a href="<?= base_url() ?>robotsubcat/update/<?= $update_id ?>"><button class="btn btn-info btn-rounded">Assign</button></a>
	           	<a href="<?= base_url() ?>robotics/deleteconf/<?= $update_id ?>"><button type="button" class="btn btn-danger btn-rounded">Delete Item</button></a>
	           	<a href="<?= base_url() ?>robotics/view/<?= $update_id ?>"><button class="btn btn-default btn-rounded">View In Website</button></a>
	            </div>
	         </div>
	    </div>
	</div>
</div>
<?php } ?>

<?php if($videos != '') { ?>
<div class="row">
	<div class="col-sm-12">
	    <div class="panel panel-info">
	       <div class="panel-heading"> Uploaded Images</div>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	        <label class="col-md-3 control-label" for="state-info">View Videos: </label>
	            <div class="col-sm-6 col-xs-6">
					
			        <div class="players" id="player1-container">
			            <div class="media-wrapper">
			                <video id="player1" width="640" height="360" style="max-width:100%;" poster="<?= $imageDisplay ?>" preload="none" controls playsinline webkit-playsinline>
			                    <source src="<?= base_url() ?>robotics/videos/<?= $videos ?>" type="video/mp4" name="lang">
			                </video>
			            </div>
			        </div>
	            </div>
	         </div>
	    </div>
	</div>
</div>
<?php } ?>

 <div class="row">
	<div class="col-sm-12">
	    <div class="panel panel-info">
	       <div class="panel-heading"> <?= $headline ?></div>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	            <div class="error_align"><?= validation_errors("<p style='color: red;'>", "</p>") ?></div>
				<?php
			      $form_location = base_url()."robotics/create/".$update_id;
			      ?>
			        <form class="form-horizontal" method="post" action="<?= $form_location ?>">

			        	<div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Enter Your Name: </label>
	                        <div class="col-md-6">
	                            <input type="text" name="names" value="<?= $names ?>" class="form-control" placeholder="Enter Your Name"></div>
	                    </div>

	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Enter The Title: </label>
	                        <div class="col-md-6">
	                            <input type="text" name="item_title" value="<?= $item_title ?>" class="form-control" placeholder="Enter The Robotics Title"> </div>
	                    </div>

	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">School Name: </label>
	                        <div class="col-md-6">
	                            <input type="text" name="school_name" value="<?= $school_name ?>" class="form-control" placeholder="Enter The School For the Event"> </div>
	                    </div>

	                     <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Enter The School Event: </label>
	                        <div class="col-md-6">
	                            <input type="text" name="event" value="<?= $event ?>" class="form-control" placeholder="Enter The Event"> </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Date Made: </label>
	                        <div class="col-md-3">
	                            <input type="text" name="date_published" value="<?= $date_published ?>" class="form-control icon-calender" id="datepicker-autoclose" placeholder="mm/dd/yyyy"><span class="input-group-addon"><i class="icon-calender"></i></span>
	                            </div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="col-md-3 control-label" for="state-info">Item Description: </label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="item_description" id="mymce" rows="9"><?= $item_description ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
		                    <label class="col-md-3 control-label" for="state-info"></label>
		                     <div class="col-md-2">
		                        <button name="submit" value="Submit" class="btn btn-block btn-info btn-rounded form-control">Submit</button>
		                    </div>
		                    <div class="col-md-2">
		                        <button name="submit" value="Cancel" class="btn btn-block btn-default btn-rounded form-control">Cancel</button>
		                    </div>
		                </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>

