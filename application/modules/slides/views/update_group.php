<h1><?= $headline ?></h1>
<?php
if (isset($flash)) {
  echo $flash;
}

$create_page_url = base_url()."blog/create";
echo Modules::run('slides/_draw_create_modal', $parent_id);
if($num_rows<1)
{
  echo 'So far you have not uploaded any '.$entity_name.' for '. $parent_id .'.';
}else{
?>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
         <div class="panel-heading"> Custom Blog</div>
            <div class="table-responsive">
          <table id="myTable" class="table table-striped">
          <thead>
              <tr>
                  <th>Picture</th>
                  <th class="span2">Actions</th>
              </tr>
          </thead>   
          <tbody>
            <?php
            $this->load->module('timedate');
            foreach($query->result() as $row) { 
              $target_url = $row->target_url;
              $edit_page_url = base_url()."slides/view/".$row->id;
              if($target_url!='')
              {
                $view_page_url = $target_url;
              }
              $picture = $row->picture;
              $pic_path = base_url().'slider_pics/'.$picture;
            ?>
            <tr>
                <td><?php if($picture!='') { ?>
                <img src="<?= $pic_path ?>" class="img-responsive">
                <?php } ?></td>
                <td class="center">
                <?php if(isset($view_page_url)) {?>
                  <a class="btn btn-info btn-rounded" href="<?= $view_page_url ?>">
                  <i class="fa fa-eye" style="color: black;"></i></a>
                <?php } ?>
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