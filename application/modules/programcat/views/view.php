<div id="post-2117" class="post-2117 page type-page status-publish hentry">
    <section class="page-content nz-clearfix">
        <div class="nz-section horizontal autoheight-false animate-false full-width-false " data-animation-speed="35000" data-parallax="false" id="div_503c_2">
        </div>
        <div class="container">
          <div class="row">
          <div class="col-md-2">
              <h2>Heading</h2>
              <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
              <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-8">
            <?php
            foreach ($cat_program_query->result() as $cat_trow) {
              $itm_item_title = $cat_trow->item_title;
              $itm_program_name = $cat_trow->program_name;
              $this->load->module('timedate');
              $itm_item_description = $cat_trow->item_description;
              $itm_date_published = $cat_trow->date_published;
              $itm_date_publish = $this->timedate->get_nice_date($itm_date_published, 'full');
              $itm_item_describe = $cat_trow->item_describe;
              $itm_programmers_name = $cat_trow->programmers_name;
              $itm_item_describe_limit = word_limiter($itm_item_describe, '50');

            ?>
               <h2><?= $itm_program_name ?></h2>
               <h3><?= $itm_item_title ?></h3>
                Date Published: <i><?= $itm_date_publish ?></i>
                <p><?= $itm_item_describe_limit ?></p>
                <pre>
                <code class="JavaScript" style="max-height: 500px;"><?= $itm_item_description ?></code></pre>
                Question or Remark: <i><?= $itm_programmers_name ?></i>
                <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="<?= base_url() ?>programming/project/<?= $cat_trow->item_url ?>" role="button">View details &raquo;</a></p>
                <hr>
              <?php } ?>
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
