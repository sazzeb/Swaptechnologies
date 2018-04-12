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
          <div class="row">
            <div class="col-sm-12 col-xs-12">
            <?php if($big_pic == "") { ?>
             <a href="<?= base_url() ?>swapblog/upload_image/<?= $update_id ?>"><button name="submit" value="Submit" type="submit" class="btn btn-info btn-rounded">Upload Image</button></a>
             <?php
            } else {
            ?>
             <a href="<?= base_url() ?>swapblog/delete_image/<?= $update_id ?>"><button name="submit" value="Submit" type="submit" class="btn btn-danger btn-rounded">Delete This Image</button></a>
             <?php
              }
              if ($update_id>2) { ?>

             <a href="<?= base_url() ?>swapblog/deleteconf/<?= $update_id ?>"><button name="submit" value="Submit" type="submit" class="btn btn-danger btn-rounded">Delete The Entire Writeup</button></a>
             <?php
              }
              ?>
             <a href="<?= base_url() ?>swapblog/view/<?= $update_id ?>"><button name="submit" value="Cancel" class="btn btn-default btn-rounded" type="submit">View In Home Page</button></a>
              </div>
           </div>
      </div>
  </div>
</div>
<?php } ?>



<?php if($big_pic != '') { ?>
<div class="row">
  <div class="col-sm-12">
      <div class="panel panel-info">
         <div class="panel-heading"> Uploaded Images</div>
          <p class="text-muted m-b-30 font-13"></p>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
                <img src="<?= base_url() ?>blog/big_pics/<?= $big_pic ?>">
              </div>
           </div>
      </div>
  </div>
</div>
<?php } ?>



<div class="row">
<div class="col-sm-12">
    <div class="panel panel-info">
       <div class="panel-heading"> <?= $headline ?></div>
        <p class="text-muted m-b-30 font-13"></p>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
            <div class="error_align"><?= validation_errors("<p style='color: red;'>", "</p>") ?></div>
      </div>
      <?php
          $form_location = base_url()."swapblog/create/".$update_id;
          ?>
            <form class="form-horizontal" method="post" action="<?= $form_location ?>">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="state-info">Year Published: </label>
                        <div class="col-md-3">
                            <input type="text" name="date_published" value="<?= $date_published ?>" class="form-control icon-calender" id="datepicker-autoclose" placeholder="mm/dd/yyyy"> <span class="input-group-addon"><i class="icon-calender"></i></span>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="state-info">First Name: </label>
                        <div class="col-md-6">
                            <input type="text" name="firstname" value="<?= $firstname ?>" class="form-control" placeholder="Enter the audio title here"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="state-info">Last Name: </label>
                        <div class="col-md-6">
                            <input type="text" name="lastname" value="<?= $lastname ?>" class="form-control" placeholder="Enter artist full name"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="state-info">Blog Title: </label>
                        <div class="col-md-6">
                            <input type="text" name="page_title" value="<?= $page_title ?>" class="form-control" placeholder="Enter song album"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="state-info">Add Keyword: </label>
                        <div class="col-md-6">
                            <input type="text" name="page_keywords" value="<?= $page_keywords ?>" class="form-control" placeholder="Enter add lebel to song"> </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="state-info">Content Or Position: </label>
                        <div class="col-md-6">
                            <input type="text" name="page_content" value="<?= $page_content ?>" class="form-control" placeholder="Enter add lebel to song"> </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="state-info">Describe the Blog in Details: </label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="page_description" id="mymce" rows="9"><?= $page_description ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="state-info"></label>
                       <div class="col-md-2">
                          <button name="submit" value="Submit" class="btn btn-block btn-info btn-rounded form-control">Submit</button>
                      </div>
                      <div class="col-md-2">
                          <button name="submit" value="Cancel" class="btn btn-block btn-default btn-rounded form-control">Cancel</button>
                      </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
