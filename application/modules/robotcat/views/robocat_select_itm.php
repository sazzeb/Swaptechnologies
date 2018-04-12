<?php 
	$this->load->module('timedate');
	foreach ($cat_legos_query->result() as $init_row) {
		$get_vide_nrt = $init_row->videos;
		$get_pics_one = $init_row->big_pic_one;
		$terete = word_limiter($init_row->item_description, 20);
		$terete_event = $init_row->event;
		$terete_school_name = $init_row->school_name;
		$terete_names = $init_row->names;
		$terete_item_title = $init_row->item_title;
		$terete_date_published = $init_row->date_published;
		$terete_date_publish = $this->timedate->get_nice_date($terete_date_published, 'full');
		$terete_item_url = $init_row->item_url;
		$url_target_vibe = base_url().'robotics/videos/'.$get_vide_nrt;
		$url_target_vibe_pic = base_url().'robotics/images/big_pics/'.$init_row->big_pic;
		$vd_thumbnail_name_sm = str_replace('.', '_thumb.', $init_row->small_pic_one);
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
	    <h2><?= $terete_item_title ?></h2>
	      <p><?= $terete ?> </p>
	      <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="<?= base_url() ?>legorobotics/lego/<?= $init_row->item_url ?>" role="button">View details &raquo;</a></p>
	    </div>
	</div>
<?php }elseif($get_pics_one){ ?>

	<div class="row">
	    <div class="col-md-6">
	        <img src="<?= $url_target_vibe_one ?>" alt ="<?= $terete_item_title ?>" class="img-responsive">
	    </div>

	    <div class="col-md-6 perisuan">
	    
	    <h2><?= $terete_item_title ?></h2>
	    <h5 style="font-size: 0.8em;"><?= $terete_names ?><h5/>
	    <h5 style="font-size: 0.8em;"><?= $terete_date_publish ?><h5/>
	    <h5 style="font-size: 0.8em;"><?= $terete_event ?> => <?= $terete_school_name ?><h5/>

	      <p><?= $terete ?></p>
	      <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="<?= base_url() ?>legorobotics/lego/<?= $init_row->item_url ?>" role="button">View details &raquo;</a></p>
	    </div>
	</div>
<?php }
} ?>
