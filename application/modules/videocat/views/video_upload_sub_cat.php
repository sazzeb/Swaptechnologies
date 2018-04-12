 <?php 
  $this->load->module('timedate');
  foreach($video_sub_cat_query->result() as $showAll) {
    $sh_vid_big_pics = $showAll->big_pic;
    $sh_vid_thumbnail_path = base_url().'videos/images/big_pics/'.$sh_vid_big_pics;
    $sh_default_video_image_path = base_url().'audio_mp3/mp31.png';
    if($sh_vid_big_pics != '')
      {
          $sh_vid_video_image_select = $sh_vid_thumbnail_path;
      }else{
          $sh_vid_video_image_select = $sh_default_video_image_path;
      }
    $sh_vid_head = $showAll->item_title;
    $sh_vid_artist = $showAll->artist;
    $sh_vid_date_pub = $this->timedate->get_nice_date($showAll->date_published,'full');
    $shw_real_vid = $showAll->videos;
    $shw_all_disc = word_limiter($showAll->item_description, 20);
    $shw_all_real_vid_path = base_url().'videos/'.$shw_real_vid;
    $shw_base = $showAll->item_url;
    $shw_base_url = base_url().'upload/training/'.$shw_base;
?>
<?php if($shw_real_vid != '') { ?>
   <div class="row">
      <div class="col-md-4">
        <h4><?= $sh_vid_head ?></h4>
        <h5><?= $sh_vid_artist ?></h5>
        <h6><?= $sh_vid_date_pub ?></h6>
        <p><?= $shw_all_disc ?> </p>
        <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="<?= $shw_base_url ?>" role="button">View details &raquo;</a></p>
      </div>
      <div class="col-md-8 video-wrap" >
          <div class="embed-responsive embed-responsive-16by9" >
            <video class="embed-responsive-item" style="width: 100%; height: 100%" poster="<?= $sh_vid_video_image_select ?>" controls="controls" preload="none" ><source type="video/mp4" src="<?= $shw_all_real_vid_path ?>" />
              </video>
            </div>
      </div>
  </div>
  <div id="post-2117" class="post-2117 page type-page status-publish hentry">
    <section class="page-content nz-clearfix">
        <div class="nz-section horizontal autoheight-false animate-false full-width-false " data-animation-speed="35000" data-parallax="false" id="div_503c_2">
        </div>
    </section>
  </div>
<?php } 
}
?>