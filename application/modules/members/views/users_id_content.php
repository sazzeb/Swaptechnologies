<div class="containefr nz-clearfix">
<div class="slogan nz-clearfix">
    <div id="div_c7b1_1">
        <div class="nz-bar"><span class="nz-icon none small icon-phone animate-false"></span><span class="header-top-label">Call Programmers</span> +(234) 8034759252</div>
    </div>
</div>

<nav class="header-top-menu nz-clearfix">
    <ul id="header-top-menu" class="menu">
        <?php 
        if($user_session_id > 0)  {
            foreach($query_single->result() as $entity_row)
            {
                $username = $entity_row->username;
                $username_upper = strtoupper($username);
                $small_pic = $entity_row->small_pic;

                if($small_pic != '')
                {
                    $pic_show = str_replace('.', '_thumb.', $small_pic);
                    $small_pic_show = base_url().'users_img/small_pics/'.$pic_show;
                }else{
                    $small_pic_show = base_url().'asset/passport/images.jpg';
                }
            }
        ?>
        <li id="menu-item-4554" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4554"><a href="?" style="text-decoration-line: none;"><span class="mi" ></span><b style="font-size: 1.5em;color: red;">Hello: </b><span class="txt" style="color: blue;font-size: 1.8em;"><?= $username_upper ?></span></a>
            <ul class="sub-menu">
                <li id="menu-item-4572" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4572"><a href="#"><span class="mi"></span><span class="txt">USERNAME</span></a></li>
                <li id="menu-item-4573" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4573"><a href="<?= base_url() ?>members/upload/<?= $member_session_id ?>"><span class="mi"></span><span class="txt"><img src="<?= $small_pic_show ?>" alt="no image" class="rounded float-right img_btn_user" style="max-height: 40px;max-width: 60px;">UPDATE PHOTO</span></a></li>
                <li id="menu-item-4574" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4574"><a href="#"><span class="mi"></span><span class="txt">UPDATE USERS INFO</span></a></li>
                <li id="menu-item-4575" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4575"><a href="#"><span class="mi"></span><span class="txt">UPLOAD</span></a></li>
                <li id="menu-item-4576" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4576"><a class="btn btn-default btn-sm" href="#" role="button"><span class="mi"></span><span class="txt">DOWNLOAD</span></a></li>
                <li id="menu-item-4578" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4578"><a href="<?= base_url() ?>members/logout"><button name="submit" class="button button-ghost pink full-false small round animate-false anim-type-ghost hover-scene element-animate-fals" value="Submit" type="button"><span class="mi"></span><span class="txt">logout</span></button></a></li>
            </ul>
        </li>
        <li id="menu-item-4553" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4553"><a href="?"><span class="mi"></span><span class="img_btn"><img src="<?= $small_pic_show ?>" alt="no image" class="rounded float-right img_btn_user" style="max-height: 40px;max-width: 40px;"></span></a>
        </li>
        <?php }else{ ?>
        <li id="menu-item-4553" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4553"><a href="?" style="text-decoration-line: none;"><span class="mi"></span><span class="txt" style="font-size: 1.5em; margin-right: 4em; color: #000"><b>Sign-in</b></span></a>
            <ul class="sub-menu">
                <li id="menu-item-4564" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4564"><a href="<?= base_url() ?>member"><span class="mi"></span><span class="txt">Sign-in</span></a></li>
                <li id="menu-item-4565" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-4565"><a href="<?= base_url() ?>member/register"><span class="mi"></span><span class="txt" >Sign-up</span></a></li>
            </ul>
        </li>
        <?php } ?>

    </ul>
</nav>

</div>