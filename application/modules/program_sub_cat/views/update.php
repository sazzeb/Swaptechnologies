<h1><?= $headline ?></h1>
<?= validation_errors("<p style='color: red;'>", "</p>") ?>

<?php
if (isset($flash)) {
  echo $flash;
}
?>

<?php
$form_location = base_url()."program_sub_cat/submit/".$item_id;
?>


<?php
if ($num_rows>0) { ?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
         <div class="panel-heading">Assigned Categories For This Item</div>
            <div class="table-responsive">
              <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>Count</th>
                    <th>Category Title</th>
                    <th>Actions</th>
                </tr>
            </thead>   
            <tbody>
              <?php
              $count = 0;
              $this->load->module('programcat');
              foreach($query->result() as $row) { 
                  $count++;
                  $delete_url = base_url()."program_sub_cat/delete/".$row->id;
                  $parent_cat_title = $this->programcat->_get_parent_cat_title($row->cat_id);
                  $cat_title = $this->programcat->_get_cat_title($row->cat_id);
                  $long_cat_title = $parent_cat_title." > ".$cat_title;
              ?>
              <tr>
                  <td><?= $count ?></td>
                  <td class="center"><?= $long_cat_title ?></td>
                  
                  
                  <td class="center">
                      <a class="btn btn-rounded btn-danger" href="<?= $delete_url ?>">
                          <i class="fa fa-trash"></i> Remove Option 
                      </a>
                  </td>
              </tr>
              <?php
              }
              ?>
            </tbody>
        </table>            
      </div>
  </div><!--/span-->
</div>
</div><!--/row-->

<?php
}
?>
<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> New Categories</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form method="post" action="<?= $form_location ?>" class="form-horizontal form-bordered">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Robotcat Parent Dropdown</label>
                                <div class="col-md-5">
                                    <?php
                                  $additional_dd_code = 'id="selectError3" class="form-control"';
                                  echo form_dropdown('cat_id', $options, $cat_id, $additional_dd_code);
                                  ?>
                                </div>
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
