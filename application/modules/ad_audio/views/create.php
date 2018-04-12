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
	        <div class="row" style="height: 60px;">
	            <div class="col-sm-12 col-xs-12">
	           	<?php if($audio_mp3 == "") { ?>
	           	<a href="<?= base_url() ?>ad_audio/upload_audio/<?= $update_id ?>"><button class="btn btn-info btn-rounded">Upload Audio Music</button></a>
	           	<?php }else{ ?>
	           	<a href="<?= base_url() ?>ad_audio/delete_audio/<?= $update_id ?>"><button class="btn btn-danger btn-rounded">Delete Audio Music</button></a>
	           	<?php } ?>
	           	<?php if($big_pic == "") { ?>
	           	<a href="<?= base_url() ?>ad_audio/upload_image/<?= $update_id ?>"><button class="btn btn-info btn-rounded">Add Image To Song</button></a>
	           	<?php }else{ ?>
	           	<a href="<?= base_url() ?>ad_audio/delete_image/<?= $update_id ?>"><button class="btn btn-danger btn-rounded">Delete Attach Image</button></a>
	           	<?php } ?>
	           	<a href="<?= base_url() ?>audio_sub_cat/update/<?= $update_id ?>"><button class="btn btn-info btn-rounded">Assign To Category</button></a>
	           	<a href="<?= base_url() ?>ad_audio/deleteconf/<?= $update_id ?>"><button type="button" class="btn btn-danger btn-rounded">Delete Complete Item</button></a>
	           	<a href="<?= base_url() ?>ad_audio/view/<?= $update_id ?>"><button class="btn btn-default btn-rounded">View In Website</button></a>
	            </div>
	         </div>
	    </div>
	</div>
</div>
<?php } ?>

<?php if($audio_mp3 != '') {
	if(($big_pic) != '')
	{
		$audioImage = $imageDisplay;
	}else{
		$audioImage = "<img src='".base_url()."audio_mp3/mp31.png'> class='img-responsive'";
	}
?>
<div class="row">
	<div class="col-sm-12">
	    <div class="panel panel-info">
	       <div class="panel-heading"> Uploaded Audio Item here</div>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	            <div class="col-sm-12 ">
			        <div class="table-responsive">
		                <table id="myTable" class="table table-striped">
		                    <tbody>
		                        <tr>
		                            <td>Album: </td>
		                            <td><?=  $album  ?></td>
		                        </tr>
		                        <tr>
		                            <td>Song Name</td>
		                            <td><?= $item_title ?></td>
		                        </tr>
		                        <tr>
		                            <td>Label Of Song</td>
		                            <td><?= $label ?></td>
		                        </tr>
		                        <tr>
		                            <td>Date Made </td>
		                            <td><?= $date_publish ?></td>
		                        </tr>
		                        <tr>
		                            <td>Name Of Artist </td>
		                            <td><?= $artist ?></td>
		                        </tr>
		                    </tbody>
		                </table>
	            	</div>
	            	
	            <div class="col-sm-12 col-xs-12"><?= $audioImage ?></div>
	            <div class="col-sm-12 col-xs-12">
	            <label class="col-md-3 control-label" for="state-info">Play</label>
	            <div class="col-md-6">
		            
			        <div class="players" id="player2-container">
			            <div class="media-wrapper">
			                <audio id="player2" preload="none" controls style="max-width:100%;">
			                    <source src="<?= base_url()?>audio_mp3/audio/<?= $audio_mp3 ?>" type="audio/mp3">
			                </audio>
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
				</div>
				<?php
			      $form_location = base_url()."ad_audio/create/".$update_id;
			      ?>
			        <form class="form-horizontal" method="post" action="<?= $form_location ?>">

	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Audio Title: </label>
	                        <div class="col-md-6">
	                            <input type="text" name="item_title" value="<?= $item_title ?>" class="form-control" placeholder="Enter the audio title here"> </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Artist Name: </label>
	                        <div class="col-md-6">
	                            <input type="text" name="artist" value="<?= $artist ?>" class="form-control" placeholder="Enter artist full name"> </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Album: </label>
	                        <div class="col-md-6">
	                            <input type="text" name="album" value="<?= $album ?>" class="form-control" placeholder="Enter song album"> </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Add Label: </label>
	                        <div class="col-md-6">
	                            <input type="text" name="label" value="<?= $label ?>" class="form-control" placeholder="Enter add lebel to song"> </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-md-3 control-label" for="state-info">Year Published: </label>
	                        <div class="col-md-3">
	                            <input type="text" name="date_published" value="<?= $date_published ?>" class="form-control icon-calender" id="datepicker-autoclose" placeholder="mm/dd/yyyy"> <span class="input-group-addon"><i class="icon-calender"></i></span>
	                            </div>
	                    </div>
	                    <div class="form-group">
	                    	<label class="col-md-3 control-label" for="state-info">Audio Description: </label>
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
