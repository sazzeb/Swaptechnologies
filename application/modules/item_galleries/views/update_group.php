
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
				 <a href="<?= base_url() ?>robotics/create/<?= $parent_id ?>"><button class="btn btn-default btn-rounded">Previos Page</button></a>
				<a href="<?= base_url() ?>item_galleries/upload_image/<?= $parent_id ?>"><button class="btn btn-info btn-rounded">Upload Image</button></a>
				 </div>
			</div>
		</div>
	</div>
</div>

	<?php

	if($num_rows<1)	
	{
		echo 'So far you have not uploaded any gallery '.$entity_name.' for '.$parent_title.'.' ;
	}
	else{   ?>

   
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-info">
	       <div class="panel-heading"> Existing Picture</div>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
			  <thead>
				  <tr>
				  	  <th>Picture</th>
					  <th class="span2">Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  <?php 
			  $this->load->module('timedate');
			  foreach($query->result() as $row ){ 

			  		$delete_url=base_url().'item_galleries/deleteconf/'.$row->id;
			  		$picture=$row->picture;
			  		$picture_path=base_url().'robotics/images_galleries/'.$picture;
			  		
			  	?>
				<tr>
					<td><?php 
					if($picture!=''){ ?>
					<img src="<?= $picture_path ?>" class="img-responsive">
					<?php 
				     }
				     ?>
					</td>
					<td class="center">
                    	<a class="btn btn-info btn-rounded" href="<?= $delete_url ?>">
                    	<i class="fa fa-trash-o" style="color: black;"></i></a>
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
</div><!--/row-->
<?php 
 }
 ?>
