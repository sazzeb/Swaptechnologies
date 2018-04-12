<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
           <div class="panel-heading"> <?= $headline ?></div>
            <p class="text-muted m-b-30 font-13"></p>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                <div class="error_align"><?= validation_errors("<p style='color: red;'>", "</p>") ?></div>
                </div>
                <?php
                  $form_location = base_url()."developers_sub/update_created/".$parent_id;
                  ?>
                    <form class="form-horizontal" method="post" action="<?= $form_location ?>">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="state-info">Describe The Project: </label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="item_two_description" id="mymce" rows="12"><?= $item_two_description ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="state-info">Paste Your Code Here: </label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="item_two_describe" rows="25"><?= $item_two_describe ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="state-info"></label>
                             <div class="col-md-2">
                                <button name="submit" value="Submit" class="btn btn-block btn-info btn-rounded form-control">Submit</button>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>