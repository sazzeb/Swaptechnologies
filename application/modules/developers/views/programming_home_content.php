
<div class="container" style="margin-top: 12px;">
    <div class="nz-row">
        <?php foreach($developers_content_query->result() as $dv) { 
            $developer_item_description = word_limiter($dv->item_description, 15);
            $dv_small_pics = $dv->small_pic;
            $dv_thumbnail_name = str_replace('.', '_thumb.', $dv_small_pics);
            $dv_thumbnail_path = base_url().'developer/small_pics/'.$dv_thumbnail_name;
            $dv_project_url = base_url().'programming/project/'.$dv->item_url;
            ?>
        <div class="col vc_col-sm-3 col4  element-animate-false valign-top"  data-effect="none" data-align="center">
            <div class="col-inner" >
                <a class="nz-single-image" target="self" href="<?= $dv_project_url ?>"><img class="alignnone size-full wp-image-5403 " src="<?= $dv_thumbnail_path ?>" alt="<?= $dv->item_title ?>" width="440" height="340"></a>
                <div class='gap nz-clearfix' id="div_5b48_0">&nbsp;</div>
                <h2 id="h2_5b48_0" class="vc_custom_heading"><?= $dv->item_title ?></h2>
                <div class="sep-wrap element-animate element-animate-false center nz-clearfix" data-effect="none">
                    <div class="nz-separator solid" id="div_5b48_1">&nbsp;</div>
                </div>
                <div  class="nz-column-text nz-clearfix  element-animate-false" data-effect="none" data-effect-speed="50">
                    <p id="p_5b48_0"><?= $developer_item_description ?></p>
                    <p>
                </div>
                <div class='gap nz-clearfix' id="div_5b48_2">&nbsp;</div><a class="button button-normal grey_light full-false small round animate-false anim-type-ghost hover-fill custom-grey-button-color element-animate-false" href="<?= $dv_project_url ?>" target="_self" data-effect="none"><span class="txt">Read more</span></a></div>
        </div>
        <?php } ?>
        </div>
    </div>
</div>