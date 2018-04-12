<p style="color: red; text-align: center;"><?= $headline ?></p>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
           <div class="panel-heading">Upload Image Here</div>
            <p class="text-muted m-b-30 font-13"></p>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                <div class="error_align"><?= validation_errors("<p style='color: red;'>", "</p>") ?></div>
                <div  class="flash_align" ">
                    <?php
                if (isset($flash)) {
                  echo $flash;
                }
                ?>
                </div>
                <?php
                $attributes = array('class' => 'form-horizontal');
                echo form_open_multipart('ad_videos/upload_file/'.$update_id, $attributes);
                ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="state-info">Item Title: </label>
                    <div class="col-md-6">
                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="file" name="userfile"> </span> <a href="" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="state-info"></label>
                             <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-info btn-rounded form-control">Submit</button>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" name="submit" value="Cancel" class="btn btn-block btn-default btn-rounded form-control">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






