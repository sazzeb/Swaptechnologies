<?php 
	if($big_pic != '') {
		$bg_img_pics = base_url().'developer/big_pics/'.$big_pic;
?>
<div class="row">
	<div class="col-md-2">
		
	</div>
	<div class="col-md-8">
		<img src="<?= $bg_img_pics ?>" class="img-responsive" alt="<?= $item_title ?>">
	</div>
	<div class="col-md-2">
		
	</div>
</div>
<?php } ?>