
<?php 
$this->load->module('timedate');
$date_published = $this->timedate->get_nice_date($date_published,'full');
 if($videos != '') {
?>
<div class="row" style="margin-bottom: 10px;">
	<div class="col-md-7 video-wrap">
	        <div class="embed-responsive embed-responsive-16by9">
	          <video class="embed-responsive-item" style="width: 100%; height: 100%" poster="<?= base_url() ?>robotics/images/big_pics/<?= $big_pic ?>" controls="controls" preload="none" ><source type="video/mp4" src="<?= base_url() ?>robotics/videos/<?= $videos ?>" />
	            </video>
	          </div>
	    </div>
	<div class="col-md-5">
		<h2><?= $item_title ?></h2>
		<h6><?= $names ?></h6>
		<h6><?= $event ?> </h6>
		<h6><?= $school_name ?></h6>
		<p><?= $item_description ?></p>
		<p><?= $date_published ?></p>
	</div>
</div>
<?php }else{ ?>
<div class="row" style="margin-bottom: 12px;">
	<div class="col-md-6">
		<?php
			$img_real = base_url().'robotics/picture/big_pics/'.$big_pic_one;
		?>
		<img src="<?= $img_real ?>" class="img-responsive" alt="<?= $item_title ?>" >
	</div>
	<div class="col-md-6">
	<?php $this->load->module('timedate');
	?>
		<h2><?= $item_title ?></h2>
		<h6><?= $names ?></h6>
		<h6><?= $event ?> </h6>
		<h6><?= $school_name ?></h6>
		<p><?= $item_description ?></p>
		<p><?= $date_published ?></p>
	</div>
</div>
<?php } ?>