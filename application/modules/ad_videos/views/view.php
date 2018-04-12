<?php 
 $this->load->module('timedate');
 $sh_vid_date_pub = $this->timedate->get_nice_date($date_published,'full');
  $sh_vid_thumbnail_path = base_url().'videos/images/big_pics/'.$big_pic;
    $sh_default_video_image_path = base_url().'audio_mp3/mp31.png';
    if($big_pic != '')
      {
          $sh_vid_video_image_select = $sh_vid_thumbnail_path;
      }else{
          $sh_vid_video_image_select = $sh_default_video_image_path;
      }
      $shw_all_real_vid_path = base_url().'videos/'.$videos;
?>
<div id="post-2117" class="post-2117 page type-page status-publish hentry">
    <section class="page-content nz-clearfix">
        <div class="nz-section horizontal autoheight-false animate-false full-width-false " data-animation-speed="35000" data-parallax="false" id="div_503c_2">
        </div>
        <div class="container">
          <div class="row">
          <div class="col-md-4">
              <h2><?= $item_title ?></h2>
              <h5><?= $artist ?></h5>
              <h6>Date Published<?= $sh_vid_date_pub ?></h6>
              <p><?= $item_description ?> </p>

            </div>
            <div class="col-md-6 video-wrap">
              <div class="embed-responsive embed-responsive-16by9" >
                <video class="embed-responsive-item" style="width: 100%; height: 100%" poster="<?= $sh_vid_video_image_select ?>" controls="controls" preload="none" ><source type="video/mp4" src="<?= $shw_all_real_vid_path ?>" />
                  </video>
                </div>
            </div>
          <div class="col-md-2">
              <h2>Heading</h2>
              <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
              <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="#" role="button">View details &raquo;</a></p>
            </div>
        </div>
      </div>
    </section>
  </div>
    <div id="post-2117" class="post-2117 page type-page status-publish hentry">
    <section class="page-content nz-clearfix">
        <div class="nz-section horizontal autoheight-false animate-false full-width-false " data-animation-speed="35000" data-parallax="false" id="div_503c_2">
        </div>
    </section>
  </div>
