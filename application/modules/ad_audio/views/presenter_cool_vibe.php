<?php 
    $this->load->module('timedate');
    foreach($query_show_all_audio->result() as $ShwAu) {
        $sh_aud_big_pics = $ShwAu->big_pic;
        $sh_aud_thumbnail_path = base_url().'audio_mp3/images/big_pics/'.$sh_aud_big_pics;
        $sh_default_audio_image_path = base_url().'audio_mp3/mp31.png';
        if($sh_aud_big_pics != '')
          {
              $sh_aud_audio_image_select = $sh_aud_thumbnail_path;
          }else{
              $sh_aud_audio_image_select = $sh_default_audio_image_path;
          }
        $sh_aud_head = $ShwAu->item_title;
        $sh_aud_artist = $ShwAu->artist;
        $sh_aud_label = $ShwAu->label;
        $sh_aud_album = $ShwAu->album;
        $sh_aud_date_pub = $this->timedate->get_nice_date($ShwAu->date_published,'full');
        $shw_real_ved = $ShwAu->audio_mp3;
        $shw_all_desc = word_limiter($ShwAu->item_description, 20);
        $shw_all_real_aud_path = base_url().'audio_mp3/audio/'.$shw_real_ved;
?>
<?php if($shw_real_ved != '') { ?>
    <div class="row">
        <div class="col-md-5">
            <img src="<?= $sh_aud_audio_image_select ?>" class="img-responsive" alt="<?= $sh_aud_artist ?>">
        </div>
        <div class="col-md-7 video-wrap">
            <h3><?= $sh_aud_head ?></h3>
            <h6><?= $sh_aud_artist ?></h6>
            <div class="players " id="player2-container">
                <audio class="embed-responsive-item" style="height: 100%;width: 100%;" preload="none" controls class="form-control">
                    <source src=" <?= $shw_all_real_aud_path ?>" type="audio/mp3" >
                </audio>
            </div>
            <h6>Date <?= $sh_aud_date_pub ?></h6>
            <h6>Label: <?= $sh_aud_label ?></h6>
            <h6>Album: <?= $sh_aud_album ?></h6>
            <p><?= $shw_all_desc ?></p>
            <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="#" role="button">View details &raquo;</a></p>
        </div>
    </div>
    <div id="post-2117" class="post-2117 page type-page status-publish hentry">
        <section class="page-content nz-clearfix">
            <div class="nz-section horizontal autoheight-false animate-false full-width-false " data-animation-speed="25000" data-parallax="false" id="div_503c_2">
            </div>
        </section>
    </div>

<?php } 
}
?>