<?php 
//get the url and make it active
?>
<ul  class="menu">
    <li class="menu-item current-menitem current_page_item menu-item-home menu-item-has-children" data-mm="false" data-mmc="2"><a href="<?= base_url() ?>"><span class="mi"></span><span class="txt">Home</span><span class="di icon-arrow-right9"></span></a>
    </li>

    

    <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt">Robotics</span><span class="di icon-arrow-right9"></span></a>
        <ul class="sub-menu">
            <li class="menu-item" data-mm="false" data-mmc="2"><a href="<?= base_url() ?>legorobotics"><span class="mi"></span><span class="txt">lego robotics</span><span class="di icon-arrow-right9"></span></a></li>
              <?php
              $this->load->module('robotcat');
              foreach ($robot_parent_categories as $robot_key => $robot_value) {
                $robot_parent_cat_id = $robot_key;
                $robot_parent_cat_title = $robot_value;
              ?>
            <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt"><?= $robot_parent_cat_title ?></span><span class="di icon-arrow-right9"></span></a>
                <ul class="sub-menu">
                    <?php
                      $robot_query = $this->robotcat->get_where_custom('robot_parent_cat_id', $robot_parent_cat_id);
                      foreach($robot_query->result() as $robot_row) {
                        $robot_url = $robot_row->cat_url; 
                        ?>
                    <li class="icon-airplane2 menu-item" data-mm="false" data-mmc="2"><a href="<?= $robot_target_url.$robot_url ?>"><span class="mi"></span><span class="txt"><?= $robot_row->cat_title ?></span><span class="di icon-arrow-right9"></span></a></li>
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
              foreach ($program_parent_categories as $program_key => $program_value) {
                $develop_parent_cat_id = $program_key;
                $program_parent_cat_title = $program_value;
              ?>
            <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt"><?= $program_parent_cat_title ?></span><span class="di icon-arrow-right9"></span></a>
                <ul class="sub-menu">
                    <?php
                      $program_query = $this->programcat->get_where_custom('develop_parent_cat_id', $develop_parent_cat_id);
                      foreach($program_query->result() as $program_row) {
                        $program_url = $program_row->cat_url; 
                        ?>
                    <li class="icon-airplane2 menu-item" data-mm="false" data-mmc="2"><a href="<?= $program_target_url.$program_url ?>"><span class="mi"></span><span class="txt"><?= $program_row->cat_title ?></span><span class="di icon-arrow-right9"></span></a></li>
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
              foreach ($music_parent_categories as $music_key => $music_value) {
                $audio_parent_cat_id = $music_key;
                $music_parent_cat_title = $music_value;
              ?>
            <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt"><?= $music_parent_cat_title ?></span><span class="di icon-arrow-right9"></span></a>
                <ul class="sub-menu">
                    <?php
                      $music_query = $this->audiocat->get_where_custom('audio_parent_cat_id', $audio_parent_cat_id);
                      foreach($music_query->result() as $music_row) {
                        $music_url = $music_row->cat_url; 
                        ?>
                    <li class="icon-airplane2 menu-item" data-mm="false" data-mmc="2"><a href="<?= $music_target_url.$music_url ?>"><span class="mi"></span><span class="txt"><?= $music_row->cat_title ?></span><span class="di icon-arrow-right9"></span></a></li>
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
              foreach ($video_parent_categories as $video_key => $video_value) {
                $video_parent_cat_id = $video_key;
                $video_parent_cat_title = $video_value;
              ?>
            <li class="menu-item menu-item-has-children" data-mm="false" data-mmc="2"><a href="#"><span class="mi"></span><span class="txt"><?= $video_parent_cat_title ?></span><span class="di icon-arrow-right9"></span></a>
                <ul class="sub-menu">
                    <?php
                      $video_query = $this->videocat->get_where_custom('video_parent_cat_id', $video_parent_cat_id);
                      foreach($video_query->result() as $video_row) {
                        $video_url = $video_row->cat_url; 
                        ?>
                    <li class="icon-airplane2 menu-item" data-mm="false" data-mmc="2"><a href="<?= $video_target_url.$video_url ?>"><span class="mi"></span><span class="txt"><?= $video_row->cat_title ?></span><span class="di icon-arrow-right9"></span></a></li>
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