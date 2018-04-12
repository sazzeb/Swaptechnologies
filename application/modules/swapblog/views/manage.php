<?php
if (isset($flash)) {
  echo $flash;
}
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
           <div class="panel-heading"> Create New Web Blog Entry</div>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                           <th>Picture</th>
                            <th>Date Published</th>
                            <th>Author</th>
                            <th> Blog Url</th>
                            <th> Blog Headline</th>
                            <th class="span2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          $this->load->module('timedate');
                            foreach($query->result() as $row) {
                            $edit_page_url =base_url().'swapblog/create/'.$row->id; 
                            $view_page_url =base_url().'swapblog/view/'.$row->id; 
                            $date_published = $this->timedate->get_nice_date($row->date_published,'mini');
                            $small_pic = $row->small_pic;
                            $thumbnail_name = str_replace('.', '_thumb.', $small_pic);
                            $thumbnail_path = base_url().'blog/small_pics/'.$thumbnail_name;
                            $firstname =  $row->firstname;
                            $lastname = $row->lastname;
                            $author = $lastname.' '.$firstname
                         ?>
                        <tr>
                            <td><img src="<?= $thumbnail_path ?>"></td>
                            <td><?= $date_published ?></td>
                            <td><?= $author ?></td>
                            <td><?= $row->page_url ?></td>
                            <td class="center"><?= $row->page_keywords ?></td>
                            <td class="center">
                                <a class="btn btn-info btn-rounded" href="<?= $edit_page_url ?>">
                                <i class="fa fa-eye" style="color: black;"></i></a>
                                <a class="btn btn-primary btn-rounded" href="<?= $view_page_url ?>">
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




