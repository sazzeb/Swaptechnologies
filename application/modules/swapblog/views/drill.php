<div class="l-inner-page-container">
    <div class="container">
        <div class="row">

<div class="col-md-9">
<?php
$this->load->module('timedate');
foreach($query->result() as $row) {
    $article_preview = word_limiter($row->page_content, 25);
    $picture = $row->picture;
    $thumbnail_name = str_replace('.', '_thumb.', $picture);
    $thumbnail_path = base_url().'made/firstmade/img_small/'.$thumbnail_name;
    $date_published = $this->timedate->get_nice_date($row->date_published, 'mini');
    $blog_url = base_url().'blog/article/'.$row->page_url;
    $view_page_url =base_url().'igaps/u/'.$row->page_url;
    $firstname = $row->firstname;
    $lastname = $row->lastname;
    $author = $lastname.' '.$firstname;
?>

    <div class="b-blog-one-column__row b-some-examples-secondary">
    <div class="row">
        <div class="col-sm-6 col-md-4">
          <div class="b-some-examples__item_img view view-sixth">
    <img data-retina="" src="<?= $thumbnail_path ?>" alt="">
    <div class="b-item-hover-action f-center mask">
        <div class="b-item-hover-action__inner">
            <div class="b-item-hover-action__inner-btn_group">
                <a href="<?= $view_page_url ?>" class="b-btn f-btn b-btn-light f-btn-light info"><i class="fa fa-link"></i></a>
            </div>
        </div>
    </div>
</div>
        </div>
        <div class="col-sm-6 col-md-8">
            <div class="b-form-row f-primary-l f-title-big c-secondary f-h4-special b-blog__title"><a href="<?= $view_page_url ?>"><?= $row->page_title ?></a></div>
            <div class="b-form-row f-h4-special clearfix">
                <div class="b-blog-one-column__info_container">
                    <div class="b-blog-one-column__info">
                        <span class="b-txt-wrap"><span class='b-blog-one-column__info_delimiter'></span> Made : <a href='<?= $view_page_url ?>' class='f-more'><?= $date_published ?></a>
                        <span class="b-blog-one-column__info_delimiter"></span></span>
                        <span class="b-txt-wrap"> <a href="<?= $view_page_url ?>" class="f-more"><?= $author ?></a></span>
                    </div>
                </div>
            </div>
            <div class="b-form-row b-blog-one-column__text"><?= $article_preview ?></div>
            <div class="b-form-row b-null-bottom-indent">
                <a href="<?= $view_page_url ?>" class="b-btn f-btn b-btn-md b-btn-default f-primary-b">View More</a>
            </div>
        </div>
    </div>
</div>
<?php
}
?>
</div>
<div class="visible-xs-block visible-sm-block b-hr"></div>
    <div class="col-md-3">
       <div class="row">
           <div class="row b-col-default-indent">
             <div class="col-md-12">
                <div class="b-categories-filter">
    <h4 class="f-primary-b b-h4-special f-h4-special--gray f-h4-special">UpComing and New</h4>
    <ul>
           <?php
            $this->load->module('timedate');
            foreach($query->result() as $row) {
            $view_page_url =base_url().'igaps/u/'.$row->page_url;
            ?>
        <li>
            <a class="f-categories-filter_name" href="<?= $view_page_url ?>"><?= $row->page_title ?></a>
            <span class="b-categories-filter_count f-categories-filter_count">new</span>
        </li>
            <?php } ?>
    </ul>
</div>
</div>
</div>
</div>
</div>
        </div>
    </div>



</div>
