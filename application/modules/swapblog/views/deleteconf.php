<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
     <div class="x_title">
        <h1>Upload Files Here</h1>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
                     
        </ul>>
      </div>
  <div class="x_content">
<p>Are you sure you want to delete the page</p>
<?php 
$attributes = array('class' => 'form-horizontal');
echo form_open('drilling/delete/'.$update_id, $attributes);
//<form class="form-horizontal">
?>
<fieldset>
<div class="control-group" style="height: 80px;">
<button type="submit" name="submit" value="Yes - Delete  Blog Entry" class="btn btn-round btn-danger">Yes - Delete  Blog Entry</button>
  <button type="submit" name="submit" value="Cancel" class="btn btn-round btn-default ">Cancel</button>
  </div>
</div>			
		
</fieldset>
</form>   

   </div>
    </div>
   </div>
 </div>