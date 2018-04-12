<style type="text/css">
    .sort {
        list-style: none;
        border: 1px #aaa solid;
        color: #333;
        padding: 10px;
        margin-bottom: 4px;
    }
</style>

<ul id="sortlist">
    <?php
    $this->load->module('programcat');
    foreach($query->result() as $row) { 
        $num_sub_cats = $this->programcat->_count_sub_cats($row->id);
        $edit_item_url = base_url()."programcat/create/".$row->id;
        $view_item_url = base_url()."programcat/view/".$row->id;

        if ($row->develop_parent_cat_id==0) {
          $parent_cat_title = "&nbsp;";
        } else {
          $parent_cat_title = $this->programcat->_get_cat_title($row->develop_parent_cat_id);
        }                            
    ?>
    <li class="sort" id="<?= $row->id ?>"><i class="icon-sort"></i> <?= $row->cat_title ?>

    <?= $parent_cat_title ?>
        <?php
        if ($num_sub_cats<1) {
          echo "&nbsp;";
        } else {

          if ($num_sub_cats==1) {
            $entity = "Robotcategory";
          } else {
            $entity = "Robotcategories";
          }

          $sub_cat_url = base_url()."programcat/manage/".$row->id;

          ?>
          <a class="btn btn-rounded btn-default" href="<?= $sub_cat_url ?>">
            <i class="fa fa-eye"></i> <?php
            echo $num_sub_cats." Sub ".$entity;
            ?> 
          </a>

          <a class="btn btn-rounded btn-info" href="<?= $edit_item_url ?>">
            <i class="fa fa-bullseye" style="color: black;"></i>  
         </a>

          <?php
        }
        ?>
    </li>
    <?php
    }
    ?>
</ul>