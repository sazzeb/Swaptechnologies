<div class="row">
<?php if($got_gallery_pic != '') {
		foreach($query_gallery->result() as $rowtrs) {
		  	$gallery_pictures = $rowtrs->picture;
		  	$gallery_pictures_get = base_url().'robotics/images_galleries/'.$gallery_pictures;
	?>
		<div class="col-md-3">
			<img src="<?= $gallery_pictures_get ?>" class="img-responsive" alt="<?= $item_title ?>">
		</div>
<?php } 
}
?></div>