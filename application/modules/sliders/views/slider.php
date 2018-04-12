<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
  <?php 
  $count = 0;
  foreach ($sliders_query->result() as $row) {
    if($count == 0)
    {
      $additional_css = ' class="active"';
    }else{
      $additional_css = '';
    }
   ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $count ?>" <?= $additional_css ?>></li>
    <?php 
    $count++;
    } ?>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <?php 
  $count = 0;
  foreach ($sliders_query->result() as $row) { 
      $target_url = $row->target_url;
      $alt_text = $row->alt_text;
      $pic_path = base_url().'slider_pics/'.$row->picture;
      if($count == 0)
    {
      $additional_css = ' active';
    }else{
      $additional_css = '';
    }

    ?>
    <div class="carousel-item <?= $additional_css ?>">
    <?php 
      if($target_url != '') { 
     ?>
      <a href="<?= $target_url ?>">
      <img src="<?= $pic_path ?>" alt="<?= $alt_text ?>" width="100%">
      </a>
      <?php 
        }else{
          ?><img src="<?= $pic_path ?>" alt="<?= $alt_text ?>" width="100%">

        <?php
        }
       ?>
       
    </div>
    <?php 
      $count++;
    }
     ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>