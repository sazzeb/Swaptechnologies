<div id="post-2117" class="post-2117 page type-page status-publish hentry">
    <section class="page-content nz-clearfix">
        <div class="nz-section horizontal autoheight-false animate-false full-width-false " data-animation-speed="35000" data-parallax="false" id="div_503c_2">
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-2">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="#" role="button">View details &raquo;</a></p>
            </div>
            <div class="col-md-8">
             <h1><?= $program_name ?></h1>
		    <h3><?= $item_title ?></h3>
		    <?php 
		    $this->load->module('timedate');
		    $date_publish = $this->timedate->get_nice_date($date_published, 'full');
        echo Modules::run('developers/_draw_pics_from_id', $update_id);
		     ?>
		    Date Published: <i><?= $date_publish ?></i>
		    <p><?= $item_describe ?></p>
              <pre><code class="JavaScript" style="max-height: 500px;"><?= $item_description ?></code></pre>
              <?= Modules::run('developers/_draw_from_sub_content', $update_id) ?>
              Question or Remark: <i><?= $programmers_name ?></i>
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



