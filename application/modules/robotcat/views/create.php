<h1><?= $headline ?></h1>
<?= validation_errors("<p style='color: red;'>", "</p>") ?>

<?php
if (isset($flash)) {
  echo $flash;
}
?>

<?php
$form_location = base_url()."robotcat/create/".$update_id;
?>
<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> With Border Form</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form method="post" action="<?= $form_location ?>" class="form-horizontal form-bordered">
                        <div class="form-body">
                        <?php
                          if ($num_dropdown_options>1) { ?>
                            <div class="form-group">
                                <label class="control-label col-md-3">Robotcat Parent Dropdown</label>
                                <div class="col-md-5">
                                    <?php
                                  $additional_dd_code = 'id="selectError3" class="form-control"';
                                  echo form_dropdown('robot_parent_cat_id', $options, $robot_parent_cat_id, $additional_dd_code);
                                  ?>
                                </div>
                            </div><?php
                              } else {
                                echo form_hidden('robot_parent_cat_id', 0);
                              }
                              ?>
                            <div class="form-group">
                                <label class="control-label col-md-3">Robotcat Details</label>
                                <div class="col-md-5">
                                    <input type="text" placeholder="Enter The Parent Category Or Sub Category" class="form-control" name="cat_title" value="<?= $cat_title ?>"></div>
                            </div>
                          <div class="form-group">
                             <label class="control-label col-md-3"></label>
                              <div class="col-md-offset-3 col-md-9">
                                  <button type="submit" class="btn btn-rounded btn-success"  name="submit" value="Submit"> <i class="fa fa-check"></i> Submit</button>
                                  <button type="submit" class="btn btn-rounded btn-default" name="submit" value="Cancel">Cancel</button>
                              </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
