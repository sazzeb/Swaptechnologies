<div  class="flash_align" ">
  <?php
  if (isset($flash)) {
    echo $flash;
  }
?>
<h1 class="error_align"><?= $headline ?></h1>
<?php 
  if(is_numeric($update_id)) {
?>
<div class="row">
  <div class="col-sm-12">
      <div class="panel panel-info">
         <div class="panel-heading">Make Changes To Uploaded Data</div>
          <p class="text-muted m-b-15 font-5"></p>
          <div class="row" style="height: 60px;">
              <div class="col-sm-12 col-xs-12">
              <a href="<?= base_url() ?>sliders/manage"><button class="btn btn-default btn-rounded">Previous Page</button></a>
              <a href="<?= base_url() ?>slides/update_group/<?= $update_id ?>"><button class="btn btn-info btn-rounded">Update Associate Sliders</button></a>
              <a href="<?= base_url() ?>sliders/deleteconf/<?= $update_id ?>"><button class="btn btn-danger btn-rounded">Delete Entire Slides</button></a>
              </div>
           </div>
      </div>
  </div>
</div>
<?php } ?>
<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"><?= $headline ?></div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                <?php
                  $form_location = base_url()."sliders/create/".$update_id;
                  ?>
                    <form method="post" action="<?= $form_location ?>" class="form-horizontal form-bordered">
                        <div class="form-body">
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Enter Sliders Title:</label>
                                <div class="col-md-5">
                                    <input type="text" placeholder="Enter Your Desire Slider  Title Here" name="slider_title" value="<?= $slider_title ?>" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Enter Sliders Target Url:</label>
                                <div class="col-md-5">
                                    <input type="text" name="target_url" value="<?= $target_url ?>" class="form-control" placeholder="Enter The Target Url For the Sliders"></div>
                            </div>
                            <div class=" form-group">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-rounded btn-info" name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>
                                    <button type="submit" name="submit" value="Cancel" class="btn btn-rounded btn-default">Cancel</button>
                                </div>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
