<?php
    $this->load->module('timedate');
    foreach ($developers_content_query_code->result() as $bello) {
        $bello_item_description = $bello->item_description;
        $bello_item_title = $bello->item_title;
        $bello_date_published = $bello->date_published;
        $bello_date_publish = $this->timedate->get_nice_date($bello_date_published, 'full');
        $bello_item_describe = $bello->item_describe;
        $bello_program_name = $bello->program_name;
        $bello_programmers_name = $bello->programmers_name;
        $bello_item_describe_limit = word_limiter($bello_item_describe, '50');
?>
<div class="row" style="margin-bottom: 12px;">
  <div class="col-md-12">
    <h1><?= $bello_program_name ?></h1>
    <h3><?= $bello_item_title ?></h3>
    Date Published: <i><?= $bello_date_publish ?></i>
    <p><?= $bello_item_describe_limit ?></p>
    <pre>
      <code class="JavaScript" style="max-height: 500px;"><?= $bello_item_description ?></code></pre>
      Question or Remark: <i><?= $bello_programmers_name ?></i>
      <p><a class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" href="<?= base_url() ?>programming/project/<?= $bello->item_url ?>" role="button">View details &raquo;</a></p>
      <hr>
    </div>
</div>
<?php } ?>


