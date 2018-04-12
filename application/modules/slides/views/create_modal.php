<p style="margin-top: 30px;">


<p style="color: red; text-align: center;"><?= $headline ?></p>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
           <div class="panel-heading">Upload Image Here</div>
            <p class="text-muted m-b-30 font-13"></p>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                <div class="error_align"><?= validation_errors("<p style='color: red;'>", "</p>") ?></div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="state-info"></label>
                             <div class="col-md-2">
                                <a href="#myModal" role="button" data-toggle="modal"><button class="btn btn-block btn-info btn-rounded form-control">Create New Slides</button></a>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= base_url() ?>sliders/create/<?= $parent_id ?>"><button type="button" class="btn btn-block btn-default btn-rounded form-control">Previous Page</button></a>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Create Slides, and put the Url Target</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="<?= $form_location ?>" method="post">
          <p>
          <div class="control-group ">
            <div class="col-md-6">
            <label class="control-label" for="typeahead">Target Url:</label>
              <input type="text" class="form-control" name="target_url" placeholder="Enter the Target Url here">
            </div>
          </div>
          <div class="control-group">
            <div class="col-md-6">
            <label class="control-label" for="typeahead">Subject:</label>
              <input type="text" class="form-control" name="alt_text" placeholder="Enter the Alt_text here">
            </div>
          </div>         

          </p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-rounded btn-default" data-dismiss="modal" aria-hidden="true">Close</button>
          <button class="btn btn-rounded btn-primary" name="submit" value="Submit" type="text">Submit</button>
        </div>
        <?php
        echo form_hidden('parent_id', $parent_id);
        ?>
      </form>  
    </div>
  </div>
</div>





















</p>








