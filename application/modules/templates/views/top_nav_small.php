<ul  class="menu">
    <li class="menu-item current-menu-item current_page_item menu-item-home menu-item-has-children" data-mm="false" data-mmc="2"><a href="<?= base_url() ?>"><span class="mi"></span><span class="txt">Home</span><span class="di icon-arrow-right9"></span></a>
    </li>

    

    <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt">Robotics</span><span class="di icon-arrow-right9"></span></a>
        <ul class="sub-menu">
            <li class="menu-item" data-mm="false" data-mmc="2"><a href="<?= base_url() ?>legorobotics"><span class="mi"></span><span class="txt">lego robotics</span><span class="di icon-arrow-right9"></span></a></li>
              <?php
              $this->load->module('robotcat');
              foreach ($robot_parent_categories_small as $robot_small_key => $robot_small_value) {
                $robot_parent_cat_id_small = $robot_small_key;
                $robot_parent_cat_title = $robot_small_value;
              ?>
            <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt"><?= $robot_parent_cat_title ?></span><span class="di icon-arrow-right9"></span></a>
                <ul class="sub-menu">
                    <?php
                      $robot_query = $this->robotcat->get_where_custom('robot_parent_cat_id', $robot_parent_cat_id_small);
                      foreach($robot_query->result() as $robot_small_row) {
                        $robot_small_url = $robot_small_row->cat_url; 
                        ?>
                    <li class="icon-airplane2 menu-item" data-mm="false" data-mmc="2"><a href="<?= $robot_target_url_small.$robot_small_url ?>"><span class="mi"></span><span class="txt"><?= $robot_small_row->cat_title ?></span><span class="di icon-arrow-right9"></span></a></li>
                    <?php 
                    }
                    ?>
                </ul>
            </li>
            <?php 
            }
            ?>
        </ul>
    </li>

    <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt">Programming</span><span class="di icon-arrow-right9"></span></a>
        <ul class="sub-menu">
            <li class="menu-item" data-mm="false" data-mmc="2"><a href="<?= base_url() ?>programming"><span class="mi"></span><span class="txt">Programming Lessons</span><span class="di icon-arrow-right9"></span></a></li>
              <?php
              $this->load->module('programcat');
              foreach ($program_parent_categories_small as $program_small_key => $program_value_small) {
                $develop_parent_cat_id_small = $program_small_key;
                $program_parent_cat_title_small = $program_value_small;
              ?>
            <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt"><?= $program_parent_cat_title_small ?></span><span class="di icon-arrow-right9"></span></a>
                <ul class="sub-menu">
                    <?php
                      $program_query_small = $this->programcat->get_where_custom('develop_parent_cat_id', $develop_parent_cat_id_small);
                      foreach($program_query_small->result() as $program_small_row) {
                        $program_url_small = $program_small_row->cat_url; 
                        ?>
                    <li class="icon-airplane2 menu-item" data-mm="false" data-mmc="2"><a href="<?= $program_target_url_small.$program_url_small ?>"><span class="mi"></span><span class="txt"><?= $program_small_row->cat_title ?></span><span class="di icon-arrow-right9"></span></a></li>
                    <?php 
                    }
                    ?>
                </ul>
            </li>
            <?php 
            }
            ?>
        </ul>
    </li>

    <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt">Music</span><span class="di icon-arrow-right9"></span></a>
        <ul class="sub-menu">
            <li class="menu-item" data-mm="false" data-mmc="2"><a href="<?= base_url() ?>musical"><span class="mi"></span><span class="txt">Musical Training</span><span class="di icon-arrow-right9"></span></a></li>
              <?php
              $this->load->module('audiocat');
              foreach ($music_parent_categories_small as $music_key_small => $music_value_small) {
                $audio_parent_cat_id_small = $music_key_small;
                $music_parent_cat_title_small = $music_value_small;
              ?>
            <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt"><?= $music_parent_cat_title_small ?></span><span class="di icon-arrow-right9"></span></a>
                <ul class="sub-menu">
                    <?php
                      $music_query_small = $this->audiocat->get_where_custom('audio_parent_cat_id', $audio_parent_cat_id_small);
                      foreach($music_query_small->result() as $music_row_small) {
                        $music_url_small = $music_row_small->cat_url; 
                        ?>
                    <li class="icon-airplane2 menu-item" data-mm="false" data-mmc="2"><a href="<?= $music_target_url_small.$music_url_small ?>"><span class="mi"></span><span class="txt"><?= $music_row_small->cat_title ?></span><span class="di icon-arrow-right9"></span></a></li>
                    <?php 
                    }
                    ?>
                </ul>
            </li>
            <?php 
            }
            ?>
        </ul>
    </li>
    <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt">Concert</span><span class="di icon-arrow-right9"></span></a>
        <ul class="sub-menu">
            <li class="menu-item" data-mm="false" data-mmc="2"><a href="<?= base_url() ?>upload"><span class="mi"></span><span class="txt">Videos Upload</span><span class="di icon-arrow-right9"></span></a></li>
              <?php
              $this->load->module('videocat');
              foreach ($video_parent_categories_small as $video_key_small => $video_value_small) {
                $video_parent_cat_id_small = $video_key_small;
                $video_parent_cat_title_small = $video_value_small;
              ?>
            <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt"><?= $video_parent_cat_title_small ?></span><span class="di icon-arrow-right9"></span></a>
                <ul class="sub-menu">
                    <?php
                      $video_query_small = $this->videocat->get_where_custom('video_parent_cat_id', $video_parent_cat_id_small);
                      foreach($video_query_small->result() as $video_row_small) {
                        $video_url_small = $video_row_small->cat_url; 
                        ?>
                    <li class="icon-airplane2 menu-item" data-mm="false" data-mmc="2"><a href="<?= $video_target_url_small.$video_url_small ?>"><span class="mi"></span><span class="txt"><?= $video_row_small->cat_title ?></span><span class="di icon-arrow-right9"></span></a></li>
                    <?php 
                    }
                    ?>
                </ul>
            </li>
            <?php 
            }
            ?>
        </ul>
    </li>
    <li class="menu-item current_page_item menu-item-home menu-item-has-children" data-mm="false" data-mmc="2"><a href="<?= base_url() ?>"><span class="mi"></span><span class="txt">Service</span><span class="di icon-arrow-right9"></span></a>
    </li>
    <li class="menu-item current_page_item menu-item-home menu-item-has-children" data-mm="false" data-mmc="2"><a href="<?= base_url() ?>aboutus"><span class="mi"></span><span class="txt">Team</span><span class="di icon-arrow-right9"></span></a>
    </li>
    <li class="menu-item current_page_item menu-item-home menu-item-has-children" data-mm="false" data-mmc="2"><a href="<?= base_url() ?>contactus"><span class="mi"></span><span class="txt">Contact</span><span class="di icon-arrow-right9"></span></a>
    </li>
</ul>