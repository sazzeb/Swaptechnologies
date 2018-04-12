<?php 
$form_location = base_url().'slides/submit/'.$update_id;
 ?>

<h1><?= $headline ?></h1>
<?php
if (isset($flash)) {
  echo $flash;
}
?>
<div class="error_align"><?= validation_errors("<p style='color: red;'>", "</p>") ?></div>
<a href="<?= base_url() ?>slides/update_group/<?= $parent_id ?>"><button type="button" class="btn btn-default">Previous Page</button></a>
<div style="clear: both;margin-top: 14px;"> 
<?= Modules::run('slides/_draw_img_btn',$update_id);?>
</div>

<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"><?= $headline ?></div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                <?php
                  $form_location = base_url()."slides/view/".$update_id;
                  ?>
                    <form method="post" action="<?= $form_location ?>" class="form-horizontal form-bordered">
                        <div class="form-body">
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Target Url<span style="color: green;">
                                  (optional)</span>:</label>
                                <div class="col-md-5">
                                    <input type="text" name="target_url" value="<?= $target_url ?>" class="form-control" placeholder="Enter Your Name"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Alt Text<span style="color: green;">
                                (optional)</span>:</label>
                                <div class="col-md-5">
                                    <input type="text" name="alt_text" value="<?= $alt_text ?>" class="form-control" placeholder="Enter The Program Name"></div>
                            </div>
                            <div class=" form-group">
                              <label class="control-label col-md-3"></label>
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



