<h1>Manage Sliders</h1>
<?php
if (isset($flash)) {
  echo $flash;
}

$create_item_url = base_url()."sliders/create";
?><p style="margin-top: 30px;">
    <a href="<?= $create_item_url ?>"><button type="button" class="btn btn-rounded btn-info">Create New Slider</button></a>
    </p>
<?php 
 if($num_rows<1)
{
    echo '<p> You have not uploaded any slider on this website yet.';
}else{
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
         <div class="panel-heading">Existing Slides</div>
            <div class="table-responsive">
          <table id="myTable" class="table table-striped">
          <thead>
              <tr>
                <th>Page Title</th>
                <th>Page URL</th>
                <th class="span2">Actions</th>
              </tr>
          </thead>   
          <tbody>
            <?php
            foreach($query->result() as $row) { 
                $edit_page_url = base_url()."sliders/create/".$row->id;
                $view_page_url = $row->target_url;
            ?>
            <tr>
                <td class="center"><?= $row->slider_title ?></td>
                <td><?= $view_page_url ?></td>
                <td class="center">
                    <a class="btn btn-info btn-rounded" href="<?= $view_page_url ?>">
                    <i class="fa fa-eye" style="color: black;"></i></a>
                    <a class="btn btn-primary btn-rounded" href="<?= $edit_page_url ?>">
                    <i class="fa fa-bullseye" style="color: black;"></i></a>
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

<?php } ?>