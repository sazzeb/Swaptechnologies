 <?php 
    $this->load->module('timedate');
    foreach($mp3_audio_query->result() as $ad_rows) {
    $date_published = $this->timedate->get_nice_date($ad_rows->date_published,'full');
    $item_description = word_limiter($ad_rows->item_description, 25);
  ?>
<div class="row">
  <div class="col-md-5" style="margin-bottom: 12px;">
    <img src="<?= base_url() ?>audio_mp3/images/big_pics/<?= $ad_rows->big_pic ?>" class="img-responsive" alt="<?= $ad_rows->item_title ?>">
  </div>
  <div class="col-md-7 video-wrap">
    <h3><?= $ad_rows->item_title ?></h3>
    <h6><?= $ad_rows->artist ?></h6>
      <div class="players " id="player2-container">
        <audio class="embed-responsive-item" style="height: 100%;width: 100%;" preload="none" controls class="form-control">
            <source src="<?= base_url() ?>audio_mp3/audio/<?= $ad_rows->audio_mp3 ?>" type="audio/mp3" >
        </audio>
      <h6>Date <?= $date_published ?></h6>
      <h6>Label: <?= $ad_rows->label ?></h6>
      <h6>Album: <?= $ad_rows->album ?></h6>
      <p><?= $item_description ?></p>
      <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="<?= base_url() ?>musical/training/<?= $ad_rows->item_url ?>" role="button">View details &raquo;</a></p>
    </div>
  </div>
</div>
<?php } ?>