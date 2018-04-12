<div class="row">
  <div class="col-sm-12">
      <div class="panel panel-info">
         <div class="panel-heading">Image Options</div>
          <p class="text-muted m-b-15 font-5"></p>
          <div class="row">
              <div class="col-sm-12 col-xs-12">
              <p><?= $btn_info ?></p>
              <?php 
                if($got_pic == FALSE) {
               ?>
              <a href="<?= base_url() ?>slides/upload_image/<?= $update_id ?>"><button class="btn btn-info btn-rounded">Upload Image</button></a>
              <?php } else{
              echo "<img src='".$pic_path."' class='img-responsive'>";
              } ?>
              <a href="<?= base_url() ?>slides/deleteconf/<?= $update_id ?>"><button class="btn btn-danger btn-rounded" <?= $btn_style ?> >Delete Image</button></a>
              </div>
           </div>
      </div>
  </div>
</div>