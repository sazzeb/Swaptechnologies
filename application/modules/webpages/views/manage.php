<h1>Content Management System</h1>
<?php
if (isset($flash)) {
  echo $flash;
}

$create_page_url = base_url()."webpages/create";
?><p style="margin-top: 30px;">
    <a href="<?= $create_page_url ?>"><button type="button" class="btn btn-rounded btn-primary">Create New Webpage</button></a></p>

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
         <div class="panel-heading">Custom Webpages</div>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                  <thead>
                      <tr>
                          <th>Page URL</th>
                          <th>Page Title</th>
                          <th class="span2">Actions</th>
                      </tr>
                  </thead>   
                  <tbody>
                    <?php
                    foreach($query->result() as $row) { 
                        $edit_page_url = base_url()."webpages/create/".$row->id;
                        $view_page_url = base_url().$row->page_url;
                    ?>
                    <tr>
                        <td><?= $view_page_url ?></td>
                        <td class="center"><?= $row->page_title ?></td>
                        <td class="center">
                            <a class="btn btn-rounded btn-success" href="<?= $view_page_url ?>">
                                <i class="fa fa-eye" style="color: black;"></i>  
                            </a>
                            <a class="btn btn-rounded btn-info" href="<?= $edit_page_url ?>">
                                <i class="fa-bullseye" style="color: black;"></i>  
                            </a>
                          
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
  </div>
</div><!--/row-->