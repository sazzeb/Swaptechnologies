
<?php
		foreach($qry_sub_drw_th->result() as $sb_draw) {
			$item_two_description = $sb_draw->item_two_description;
			$item_two_describe = $sb_draw->item_two_describe;
	?>
	<div class="row">
		<div class="col-md-12">
			<p><?= $item_two_description ?></p>
			<pre style="max-height: 400px;"><code><?= $item_two_describe ?></code></pre>
		</div>
	</div>
	<?php 
	}
?>