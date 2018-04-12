<h1><?= $headline ?></h1>
<?= validation_errors("<p style='color: red;'>", "</p>") ?>

<?php
if (isset($flash)) {
  echo $flash;
}
?>

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
              <a href="<?= base_url() ?>webpages/deleteconf/<?= $update_id ?>"><button class="btn btn-default btn-rounded">Delete Page</button></a>
              <a href="<?= base_url().$page_url ?>"><button class="btn btn-danger btn-rounded">View Page</button></a>
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
                  $form_location = base_url()."webpages/create/".$update_id;
                  ?>
                    <form method="post" action="<?= $form_location ?>" class="form-horizontal form-bordered">
                        <div class="form-body">
                            
                            <div class="form-group">
                                <label class="control-label col-md-3">Enter The Webpage:</label>
                                <div class="col-md-5">
                                    <input type="text" placeholder="Enter The Webpage Here" name="page_title" value="<?= $page_title ?>" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Enter Page KeyWords</label>
                                <div class="col-md-5">
                                    <input type="text" name="page_keywords" value="<?= $page_keywords ?>" class="form-control" placeholder="Enter Page KeyWords"></div>
                            </div>
                            <div class=" form-group">
                                <label class="control-label col-md-3"></label>
                                <div class="col-md-offset-3 col-md-6">
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