<h1>Manage Robotic Categories</h1>
<?php
if (isset($flash)) {
  echo $flash;
}

$create_item_url = base_url()."robotcat/create";
?><p style="margin-top: 30px;">
    <a href="<?= $create_item_url ?>"><button type="button" class="btn btn-rounded btn-info">Add New Category</button></a>
    </p>

<div class="row">
  <div class="col-sm-12">
      <div class="panel panel-info">
         <div class="panel-heading">Existing Robotic Categories</div>
          <p class="text-muted m-b-15 font-5"></p>
          <div class="row">
              <div class="col-sm-8 col-xs-8">
          <?php
          echo Modules::run('robotcat/_draw_sortable_list', $robot_parent_cat_id);
          ?>       
        </div>
    </div><!--/span-->
    </div>
  </div>
</div><!--/row-->