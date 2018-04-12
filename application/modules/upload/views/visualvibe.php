<div id="post-2117" class="post-2117 page type-page status-publish hentry">
    <section class="page-content nz-clearfix">
        <div class="nz-section horizontal autoheight-false animate-false full-width-false " data-animation-speed="35000" data-parallax="false" id="div_503c_2">
        </div>
          <div class="container">
                <div class="row">
                  <div class="col-md-10">
                    <?= Modules::run('ad_videos/_mix_videos_from_tower') ?>
                  </div>
                  <div class="col-md-2">
                    <h2>Robotics Update</h2>
                    <?php foreach($robotics_query_links->result() as $linkRw_robotics) { 
                      $rob_tit = $linkRw_robotics->item_title;
                      $rob_ul = $linkRw_robotics->item_url;
                      $rob_base_url_links = base_url().'legorobotics/lego/'.$rob_ul;
                      ?>
                    <div>
                      <a href="<?= $rob_base_url_links ?>"><?= $rob_tit ?></a>
                    </div>
                    <?php } ?>
                    <br>
                    <hr>
                    <h2>Programming</h2>
                    <?php foreach($developers_query_links->result() as $linkRw_developers) { 
                      $dev_tit = $linkRw_developers->item_title;
                      $dev_ul = $linkRw_developers->item_url;
                      $dev_base_url_links = base_url().'programming/project/'.$dev_ul;
                      ?>
                    <div>
                      <a href="<?= $dev_base_url_links ?>"><?= $dev_tit ?></a>
                    </div>
                    <?php } ?>
                    <br>
                    <hr>
                    <h2>Cool Music</h2>
                    <?php foreach($ad_audio_query_links->result() as $linkRw_ad_audio) { 
                      $aud_tit = $linkRw_ad_audio->item_title;
                      $aud_ul = $linkRw_ad_audio->item_url;
                      $aud_base_url_links = base_url().'musical/training/'.$aud_ul;
                      ?>
                    <div>
                      <a href="<?= $aud_base_url_links ?>"><?= $aud_tit ?></a>
                    </div>
                    <?php } ?>
                  </div>
                </div>

                <hr>
          </div>
    </section>
  </div>
