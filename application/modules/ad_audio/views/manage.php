<?php
if (isset($flash)) {
  echo $flash;
}
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
	       <div class="panel-heading"> <?= $headline ?></div>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Item title</th>
                            <th>Date Published</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                            $this->load->module('timedate');
                            foreach($query->result() as $row) { 
                                $edit_item_url = base_url()."ad_audio/create/".$row->id;
                                $view_item_url = base_url()."ad_audio/view/".$row->id;
                                $date_made = $this->timedate->get_nice_date($row->date_published,'full');
                            	$item_title = $row->item_title;
                            ?>
                        <tr>
                            <td><?= $item_title ?></td>
                            <td><?= $date_made ?></td>
                            <td class="center">
                            	<a class="btn btn-info btn-rounded" href="<?= $edit_item_url ?>">
                            	<i class="fa fa-eye" style="color: black;"></i></a>
                            	<a class="btn btn-primary btn-rounded" href="<?= $view_item_url ?>">
                            	<i class="fa fa-bullseye" style="color: black;"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

