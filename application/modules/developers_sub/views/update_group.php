
<!-- for manging the items -->
<h1><?= $headline ?></h1>
<h2><?= $sub_headline ?></h2>

<?php  
if (isset($flash)) 
{
	echo $flash;
}
?>

<div class="row">
	<div class="col-sm-12">
	    <div class="panel panel-info">
	       <div class="panel-heading">Make Changes To Uploaded Data</div>
	        <p class="text-muted m-b-15 font-5"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
				 <a href="<?= base_url() ?>developers/create/<?= $parent_id ?>"><button class="btn btn-default btn-rounded">Previos Page</button></a>
				<a href="<?= base_url() ?>developers_sub/upload_view/<?= $parent_id ?>"><button class="btn btn-info btn-rounded">Add More Content</button></a>
				 </div>
			</div>
		</div>
	</div>
</div>

	<?php

	if($num_rows<1)	
	{
		echo 'You have not added any stuff '.$entity_name.' for '.$parent_title.'.' ;
	}
	else{   ?>
 
<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">Add Sub Content</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
			  <?php 
			  $this->load->module('timedate');
			  foreach($query->result() as $row ){ 

			  		$delete_url = base_url().'developers_sub/deleteconf/'.$row->id;
			  		$edit_url = base_url().'developers_sub/update_view/'.$row->id;
			  		$item_two_description = $row->item_two_description;
			  		$item_two_describe = $row->item_two_describe;
			  		
			  	?>
                <div class="form-body">
                    <div class="form-group">
                        <div class="control-label col-md-8" style="text-align: left;"><pre style="max-height: 400px;"><code><?= $item_two_describe ?></code></pre>
                        <p><?= $item_two_description ?></p>
                        </div>
                        <div class="col-md-4">
                            <a href="<?= $edit_url ?>" style="text-align: right;"><button class="btn btn-success btn-rounded">Edit Content</button></a>
					<a href="<?= $delete_url ?>" style="text-align: right;"><button class="btn btn-danger btn-rounded">Delete Content</button></a></div>
                    </div>
                </div>
					
				<?php 
			     }
			     ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
 }
 ?>