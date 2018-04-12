<div id="post-2117" class="post-2117 page type-page status-publish hentry">
    <section class="page-content nz-clearfix">
            <div class="container">
                <div class="nz-row">
                    <div class="col vc_col-sm-12 col12  element-animate-false valign-top"  data-effect="none" data-align="left">
                        <div class="col-inner" >
                            <h3 id="h3_503c_10" class="vc_custom_heading ninzio-latter-spacing">Robotic Videos, Watch In Slide</h3>
                            <div class="sep-wrap element-animate element-animate-false left nz-clearfix" data-effect="none">
                                <div class="nz-separator solid" id="div_503c_20">&nbsp;</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nz-section horizontal autoheight-false animate-false full-width-true " data-animation-speed="35000" data-parallax="false" id="div_503c_21">
            <div class="nz-row">
                <div class="col vc_col-sm-12 col12  element-animate-false valign-top"  data-effect="none" data-align="left">
                    <div class="col-inner" >
                        <div id="nz-slick-carousel-1" class="lazy nz-clearfix nz-slick-carousel" data-autoplayspeed="9000" data-autoplay="true">
                            <?php foreach($video_content_query->result() as $vd) {
                                $vd_small_pics = $vd->small_pic;
                                $vd_thumbnail_name = str_replace('.', '_thumb.', $vd_small_pics);
                                $vd_thumbnail_path = base_url().'videos/images/small_pics/'.$vd_thumbnail_name;
                                $vd_default_video_image_path = base_url().'audio_mp3/mp31.png';
                                if($vd_small_pics != '')
                                {
                                    $vd_video_image_select = $vd_thumbnail_path;
                                }else{
                                    $vd_video_image_select = $vd_default_video_image_path;
                                }
                            ?>
                            
                            <div class="nz-slick-item nz-clearfix video-wrap"><video width="640" height="380" poster="<?= $vd_video_image_select ?>" controls="controls" preload="none" class="aligncenter size-full " >
                                <source type="video/mp4" src="<?= base_url() ?>videos/<?= $vd->videos ?>" />
                            </video></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
    </section>
</div>