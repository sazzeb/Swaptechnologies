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
                            <th>Names</th>
                            <th>Item title</th>
                            <th>School Name</th>
                            <th>Event</th>
                            <th>Start date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php
                            $this->load->module('timedate');
                            foreach($query->result() as $row) { 
                                $edit_item_url = base_url()."robotics/create/".$row->id;
                                $view_item_url = base_url()."robotics/view/".$row->id;
                                $date_made = $this->timedate->get_nice_date($row->date_made,'full');
                                $names = $row->names;
                            	$item_title = $row->item_title;
                                $school_name = $row->school_name;
                                $event = $row->event;
                            ?>
                        <tr>
                            <td><?= $names ?></td>
                            <td><?= $item_title ?></td>
                            <td><?= $school_name ?></td>
                            <td><?= $event ?></td>
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

