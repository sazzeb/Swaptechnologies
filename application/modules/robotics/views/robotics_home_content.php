<div class="container" style="margin-top: 24px;">
    <div class="nz-row">
        <?php foreach($robotics_content_query->result() as $rs) { 
            $robotics_item_description = word_limiter($rs->item_description, 15);
            $rs_small_pics = $rs->small_pic_one;
            $rs_thumbnail_name = str_replace('.', '_thumb.', $rs_small_pics);
            $rs_thumbnail_path = base_url().'robotics/picture/small_pics/'.$rs_thumbnail_name;
            $rs_project_url = base_url().'legorobotics/lego/'.$rs->item_url;
            ?>
        <div class="col vc_col-sm-3 col4  element-animate-false valign-top"  data-effect="none" data-align="center">
            <div class="col-inner" >
                <a class="nz-single-image" target="self" href="<?= $rs_project_url ?>"><img class="alignnone size-full wp-image-5403 " src="<?= $rs_thumbnail_path ?>" alt="5403" width="440" height="340"></a>
                <div class='gap nz-clearfix' id="div_5b48_0">&nbsp;</div>
                <h2 id="h2_5b48_0" class="vc_custom_heading"><?= $rs->item_title ?></h2>
                <div class="sep-wrap element-animate element-animate-false center nz-clearfix" data-effect="none">
                    <div class="nz-separator solid" id="div_5b48_1">&nbsp;</div>
                </div>
                <div  class="nz-column-text nz-clearfix  element-animate-false" data-effect="none" data-effect-speed="50">
                    <p id="p_5b48_0"><?= $robotics_item_description ?></p>
                    <p>
                </div>
                <div class='gap nz-clearfix' id="div_5b48_2">&nbsp;</div><a class="button button-normal grey_light full-false small round animate-false anim-type-ghost hover-fill custom-grey-button-color element-animate-false" href="<?= $rs_project_url ?>" target="_self" data-effect="none"><span class="txt">Read more</span></a></div>
        </div>
        <?php } ?>
    </div>
</div>