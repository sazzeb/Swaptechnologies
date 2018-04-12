<div class="container">
    <div class="nz-row">
    <div class="col vc_col-sm-12 vc_col-lg-2 vc_col-md-2 vc_col-xs-12 col12  element-animate-false valign-top"  data-effect="none" data-align="left">
            <div class="col-inner" >
            </div>
        </div>

        <div class="col vc_col-sm-12 vc_col-lg-5 vc_col-md-5 vc_col-xs-12 col12  element-animate-false valign-top"  data-effect="none" data-align="left">
            <div class="col-inner" >
                <h2 id="h2_5c14_0" class="vc_custom_heading ninzio-latter-spacing">Recover Password</h2>
                <div class="sep-wrap element-animate element-animate-false left nz-clearfix" data-effect="none">
                    <div class="nz-separator solid" id="div_5c14_4">&nbsp;</div>
                </div>
                <p id="p_5c14_0" class="vc_custom_heading">Enter a unique password to allow access your page.</p>
                <div class='gap nz-clearfix' id="div_5c14_5">&nbsp;</div>
                <?php echo validation_errors("<p style='color: red;text-align:center;'>", "</p>") ?>
                <p style="text-align: center;">
                    <?php
                        if (isset($flash)) {
                          echo $flash;
                        }
                    ?>
                </p>
                <div role="form" class="wpcf7" id="wpcf7-f6-p3172-o1" lang="en-US" dir="ltr">
                    <div class="screen-reader-response"></div>
                    <form id="contact-form" action="<?= $form_validation ?>" method="post">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">Email:</span>
                            <input type="text" name="email" placeholder="Enter Your Username" value="<?= $email ?>" class="form-control" aria-required="true" aria-invalid="false">
                        </div><br>

                        <div class="input-group input-group-md">
                            <span class="input-group-addon">Password:</span>
                            <input type="password" name="password" placeholder="Enter your password" class="form-control" aria-required="true" aria-invalid="false" >
                        </div><br>
                        <div class="input-group input-group-md">
                            <span class="input-group-addon">Confirm Password:</span>
                            <input type="password" name="confirm_password" placeholder="Confrim your passwod here" class="form-control" aria-required="true" aria-invalid="false" >
                        </div><br>


                        <button type="submit" name="submit" value="Submit" class="button button-ghost sky full-false small round animate-false anim-type-ghost hover-scene element-animate-fals">Create</button>
                    </form>
                </div>
            </div>
        </div>
         <div class="col vc_col-sm-12 vc_col-lg-1 vc_col-md-1 vc_col-xs-12 col12  element-animate-false valign-top"  data-effect="none" data-align="left">
            <div class="col-inner" >
            </div>
        </div>
        
        <div class="col vc_col-sm-12 vc_col-lg-4 vc_col-md-4 vc_col-xs-12 col12  element-animate-false valign-top"  data-effect="none" data-align="left">
            <div class="col-inner" >
                <h2 id="h2_5c14_1" class="vc_custom_heading ninzio-latter-spacing">PHONE</h2>
                <div class="sep-wrap element-animate element-animate-false left nz-clearfix" data-effect="none">
                    <div class="nz-separator solid" id="div_5c14_6">&nbsp;</div>
                </div>
                <div  class="nz-column-text nz-clearfix  element-animate-false" data-effect="none" data-effect-speed="50">This is a paragraphy, and a of much needed help
                    <br />
                    <div class='gap nz-clearfix' id="div_5c14_7">&nbsp;</div>
                    Mobile: +8(200) 800-2000-650</div>
                <div class='gap nz-clearfix' id="div_5c14_8">&nbsp;</div>
                <h2 id="h2_5c14_2" class="vc_custom_heading ninzio-latter-spacing">ADDRESS</h2>
                <div class="sep-wrap element-animate element-animate-false left nz-clearfix" data-effect="none">
                    <div class="nz-separator solid" id="div_5c14_9">&nbsp;</div>
                </div>
                <div  class="nz-column-text nz-clearfix  element-animate-false" data-effect="none" data-effect-speed="50">Montserrat Business Center
                    <br />
                    <div class='gap nz-clearfix' id="div_5c14_10">&nbsp;</div>
                    USA, New York, North Avenue
                    <br />
                    <div class='gap nz-clearfix' id="div_5c14_11">&nbsp;</div>
                    Creative Street 15/4</div>
                <div class='gap nz-clearfix' id="div_5c14_12">&nbsp;</div>
                <h2 id="h2_5c14_3" class="vc_custom_heading ninzio-latter-spacing">EMAIL</h2>
                <div class="sep-wrap element-animate element-animate-false left nz-clearfix" data-effect="none">
                    <div class="nz-separator solid" id="div_5c14_13">&nbsp;</div>
                </div>
                <div  class="nz-column-text nz-clearfix  element-animate-false" data-effect="none" data-effect-speed="50">General: hello@ninzio.com
                    <br />
                    <div class='gap nz-clearfix' id="div_5c14_14">&nbsp;</div>
                    Editor: editor@ninzio.com</div>
                <div class="sep-wrap element-animate element-animate-false left nz-clearfix" data-effect="none">
                    <div class="nz-separator solid" id="div_5c14_15">&nbsp;</div>
                </div>
                <div class="nz-sl social-links nz-clearfix left">
                    <a class="icon-facebook" href="http://facebook.com/" target="_self"></a>
                    <a class="icon-twitter" href="http://twitter.com/" target="_self"></a>
                    <a class="icon-youtube" href="http://youtube.com/" target="_self"></a>
                    <a class="icon-linkedin" href="http://linkedin.com/" target="_self"></a>
                    <a class="icon-envelope" href="mailto:support@ninzio.com" target="_self"></a>
                </div>
            </div>
        </div>
    </div>
</div>