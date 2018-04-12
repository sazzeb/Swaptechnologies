<?php 
	$this->load->module('timedate');
	foreach ($query_pour_all->result() as $init_rows) {
		$get_vide_nrt = $init_rows->videos;
		$get_pics_one = $init_rows->big_pic_one;
		$terte = word_limiter($init_rows->item_description, 20);
		$terte_event = $init_rows->event;
		$terte_school_name = $init_rows->school_name;
		$terte_names = $init_rows->names;
		$terte_item_title = $init_rows->item_title;
		$terte_date_published = $init_rows->date_published;
		$terte_date_publish = $this->timedate->get_nice_date($terte_date_published, 'full');
		$terte_item_url = $init_rows->item_url;
		$url_target_vibe = base_url().'robotics/videos/'.$get_vide_nrt;
		$url_target_vibe_pic = base_url().'robotics/images/big_pics/'.$init_rows->big_pic;
		$vd_thumbnail_name_sm = str_replace('.', '_thumb.', $init_rows->small_pic_one);
		$url_target_vibe_one = base_url().'robotics/picture/big_pics/'.$get_pics_one;
	if($get_vide_nrt != '') {
?>
	<div class="row">
	    <div class="col-md-7 video-wrap">
	        <div class="embed-responsive embed-responsive-16by9">
	          <video class="embed-responsive-item" style="width: 100%; height: 100%" poster="<?= $url_target_vibe_pic ?>" controls="controls" preload="none" ><source type="video/mp4" src="<?= $url_target_vibe ?>" />
	            </video>
	          </div>
	    </div>

	    <div class="col-md-5">
	    <h2><?= $terte_item_title ?></h2>
	      <p><?= $terte ?> </p>
	      <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="<?= base_url() ?>legorobotics/lego/<?= $init_rows->item_url ?>" role="button">View details &raquo;</a></p>
	    </div>
	</div>
<?php }elseif($get_pics_one){ ?>

	<div class="row">
		<div class="col-md-1">
			
		</div>
	    <div class="col-md-5">
	        <img src="<?= $url_target_vibe_one ?>" alt ="<?= $terte_item_title ?>" class="img-responsive">
	    </div>

	    <div class="col-md-6 perisuan">
	    
	    <h2><?= $terte_item_title ?></h2>
	    <h5 style="font-size: 0.8em;"><?= $terte_names ?><h5/>
	    <h5 style="font-size: 0.8em;"><?= $terte_date_publish ?><h5/>
	    <h5 style="font-size: 0.8em;"><?= $terte_event ?> => <?= $terte_school_name ?><h5/>

	      <p><?= $terte ?></p>
	      <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="<?= base_url() ?>legorobotics/lego/<?= $init_rows->item_url ?>" role="button">View details &raquo;</a></p>
	    </div>
	</div>
<?php }
} ?>
