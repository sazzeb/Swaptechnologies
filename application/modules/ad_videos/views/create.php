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
	           	<?php if($videos == "") { ?>
	           	<a href="<?= base_url() ?>ad_videos/upload_video/<?= $update_id ?>"><button class="btn btn-info btn-rounded">Upload Video</button></a>
	           	<?php }else{ ?>
	           	<a href="<?= base_url() ?>ad_videos/delete_video/<?= $update_id ?>"><button class="btn btn-danger btn-rounded">Delete video</button></a>
	           	<?php } ?>
	           	<?php if($big_pic == "") { ?>
	           	<a href="<?= base_url() ?>ad_videos/upload_image/<?= $update_id ?>"><button class="btn btn-info btn-rounded">Add Image To Video</button></a>
	           	<?php }else{ ?>
	           	<a href="<?= base_url() ?>ad_videos/delete_image/<?= $update_id ?>"><button class="btn btn-danger btn-rounded">Delete Attach Image</button></a>
	           	<?php } ?>
	           	<a href="<?= base_url() ?>video_sub_cat/update/<?= $update_id ?>"><button class="btn btn-info btn-rounded">Assign To Category</button></a>
	           	<a href="<?= base_url() ?>ad_videos/deleteconf/<?= $update_id ?>"><button type="button" class="btn btn-danger btn-rounded">Delete Complete Item</button></a>
	           	<a href="<?= base_url() ?>ad_videos/view/<?= $update_id ?>"><button class="btn btn-default btn-rounded">View In Website</button></a>
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
			                    <source src="<?= base_url() ?>videos/<?= $videos ?>" type="video/mp4" name="lang">
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
			      $form_location = base_url()."ad_videos/create/".$update_id;
			      ?>
			        <form class="form-horizontal" method="post" action="<?= $form_location ?>">

	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Item Title: </label>
	                        <div class="col-md-6">
	                            <input type="text" name="item_title" value="<?= $item_title ?>" class="form-control" placeholder="Enter the iten title here"> </div>
	                    </div>
	                     <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Videos Made By: </label>
	                        <div class="col-md-6">
	                            <input type="text" name="artist" value="<?= $artist ?>" class="form-control" placeholder="Enter your name"> </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Date Video Was Made: </label>
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

