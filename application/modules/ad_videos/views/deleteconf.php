<p style="color: red; text-align: center;"><?= $headline ?></p>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
           <div class="panel-heading">Delete Entry</div>
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
    				echo form_open('ad_videos/delete/'.$update_id, $attributes);
    				?>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="state-info"></label>
                             <div class="col-md-4">
                                <button type="submit" value="Delete Item" name="submit" class="btn btn-block btn-danger btn-rounded form-control">Do You Want To Delete Entire Item</button>
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


