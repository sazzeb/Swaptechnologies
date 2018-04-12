<h1><?= $headline ?></h1>
<div class="row">
  <div class="col-sm-12">
      <div class="panel panel-info">
         <div class="panel-heading">Your Image Upload Was Successful</div>
          <p class="text-muted m-b-30 font-13"></p>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
              <?= validation_errors("<p style='color: red;'>", "</p>") ?>

          <?php
          if (isset($flash)) {
            echo $flash;
          }
          ?>
          <ul>
          <p>Thanks For Successfully Uploading that image</p>
          <p>Before you continue ensure that your cross check that every thing is ok</p>
          <p>This image is going directly to the home page</p>
          <p>It is good to take a second glance</p>
          <p>Thanks for your patience</p>
        <?php foreach ($upload_data as $item => $value):?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
        <?php endforeach; ?>
        </ul>

        <p>
          <?php
          $edit_item_url = base_url()."swapblog/create/".$update_id;
          ?>
          <a href="<?= $edit_item_url ?>"><button type="button" class="btn btn-rounded btn-primary">Previous Page</button></a>
        </p>
              </div>
           </div>
      </div>
  </div>
</div>