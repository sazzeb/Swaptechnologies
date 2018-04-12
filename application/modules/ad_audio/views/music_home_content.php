<div class="container">
    <div class="nz-row">
        <div class="col vc_col-sm-12 col12  element-animate-false valign-top"  data-effect="none" data-align="left">
            <div class="col-inner" >
                <div id="nz-testimonials-1" data-autoplay="true" data-columns="2" class="none nz-testimonials lazy">
                <?php foreach($music_content_query->result() as $ms) {
                    $music_item_description = word_limiter($ms->item_description, 15);
                    $ms_small_pics = $ms->small_pic;
                    $ms_thumbnail_name = str_replace('.', '_thumb.', $ms_small_pics);
                    $ms_thumbnail_path = base_url().'audio_mp3/images/small_pics/'.$ms_thumbnail_name;
                    $ms_project_url = base_url().'musical/training/'.$ms->item_url;
                    $ms_music_player = base_url().'audio_mp3/audio/'.$ms->audio_mp3;
                ?>
                    <div class="testimonial form-group">
                        <div class="test-wrap nz-clearfix"><img src="<?= $ms_thumbnail_path ?>" alt="<?= $ms->item_title ?>">
                            <div class="text">
                            <?= $music_item_description ?>
                            </div>
                            <div class="players " id="player2-container">
                                <div class="media-wrapper audio-wrap">
                                    <audio id="player2"  preload="none" controls class="form-control">
                                        <source src=" <?= $ms_music_player ?>" type="audio/mp3" >
                                    </audio>
                                </div>
                                
                            </div>
                            <div class="test-data"><a href="<?= $ms_project_url ?>"><span class="name"><?= $ms->artist ?></span></a><span class="title"><a href="<?= $ms_project_url ?>"><?= $ms->item_title ?></a></span></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>



