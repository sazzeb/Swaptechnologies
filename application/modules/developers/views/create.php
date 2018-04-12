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
	            <a href="<?= base_url() ?>developers_sub/update_group/<?= $update_id ?>"><button class="btn btn-success btn-rounded">Add Sub Programming</button></a>
	           	<?php if($big_pic == "") { ?>
	           	<a href="<?= base_url() ?>developers/upload_image/<?= $update_id ?>"><button class="btn btn-info btn-rounded">Upload Image</button></a>
	           	<?php }else{ ?>
	           	<a href="<?= base_url() ?>developers/delete_image/<?= $update_id ?>"><button class="btn btn-danger btn-rounded">Delete Image</button></a>
	           	<?php } ?>
	           	<a href="<?= base_url() ?>program_sub_cat/update/<?= $update_id ?>"><button class="btn btn-info btn-rounded">Assign To Category</button></a>
	           	<a href="<?= base_url() ?>developers/deleteconf/<?= $update_id ?>"><button type="button" class="btn btn-danger btn-rounded">Delete Complete Item</button></a>
	           	<a href="<?= base_url() ?>developers/view/<?= $update_id ?>"><button class="btn btn-default btn-rounded">View In Website</button></a>
	            </div>
	         </div>
	    </div>
	</div>
</div>
<?php } ?>

<?php if($big_pic != '') { ?>
<div class="row">
	<div class="col-sm-12">
	    <div class="panel panel-info">
	       <div class="panel-heading"> Uploaded Images</div>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	            <img src="<?= base_url() ?>developer/big_pics/<?= $big_pic ?>">
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
				</div>
				<?php
			      $form_location = base_url()."developers/create/".$update_id;
			      ?>
			        <form class="form-horizontal" method="post" action="<?= $form_location ?>">

			        	<div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Year Published: </label>
	                        <div class="col-md-3">
	                            <input type="text" name="date_published" value="<?= $date_published ?>" class="form-control icon-calender" id="datepicker-autoclose" placeholder="mm/dd/yyyy"> <span class="input-group-addon"><i class="icon-calender"></i></span>
	                            </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Type Of Programming Language </label>
	                        <div class="col-md-6">
	                            <input type="text" name="program_name" value="<?= $program_name ?>" class="form-control" placeholder="Enter Your Name"> </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Title Of The Project </label>
	                        <div class="col-md-6">
	                            <input type="text" name="item_title" value="<?= $item_title ?>" class="form-control" placeholder="Enter the iten title here"> </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Advice, Lesson or Question to Student: </label>
	                        <div class="col-md-6">
	                            <input type="text" name="programmers_name" value="<?= $programmers_name ?>" class="form-control" placeholder="Enter The Program Name"> </div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="col-md-3 control-label" for="state-info">Describe The Project: </label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="item_describe" id="mymce" rows="12"><?= $item_describe ?></textarea>
                            </div>
                        </div>
	                    <div class="form-group">
	                    	<label class="col-md-3 control-label" for="state-info">Paste Your Code Here: </label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="item_description" rows="25"><?= $item_description ?></textarea>
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
