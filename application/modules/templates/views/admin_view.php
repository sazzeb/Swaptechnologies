
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>asset/setup/swap1.ico">
    <title>SwapTechnologies</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>asset/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/admin/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?= base_url() ?>asset/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?= base_url() ?>asset/admin/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?= base_url() ?>asset/admin/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>asset/admin/css/style.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>asset/admin/plugins/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="<?= base_url() ?>asset/admin/plugins/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link rel='stylesheet' href='<?= base_url() ?>asset/highlighter/styles/darcula.css' type='text/css' />
    <link href="<?= base_url() ?>asset/admin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <link rel='stylesheet' href='<?= base_url() ?>asset/public/css/mediaelementplayer.min.css' type='text/css' media='all' />
    <style>
    .mejs__overlay-button {
        background-image: url(<?= base_url() ?>asset/public/css/mejs-controls.svg);
    }
    .mejs__overlay-loading-bg-img {
        background-image: url(<?= base_url() ?>asset/public/css/mejs-controls.svg);
    }
    .mejs__button > button {
        background-image: url(<?= base_url() ?>asset/public/css/mejs-controls.svg);
    }
    </style>
                              
    <!-- color CSS -->
    <link href="<?= base_url() ?>asset/admin/css/colors/megna.css" id="theme" rel="stylesheet">
    <link href="<?= base_url() ?>asset/admin/css/style2.css" id="theme" rel="stylesheet">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="<?= base_url() ?>asset/admin/cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                <div class="top-left-part"><a class="logo" href="#"><b><img src="<?= base_url() ?>asset/admin/plugins/images/eliteadmin-logo.png" alt="home" /></b><span class="hidden-xs"><strong>elite</strong>hospital</span></a></div>
                <ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="user-img"> <img src="<?= base_url() ?>asset/admin/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="<?= base_url() ?>asset/admin/plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="<?= base_url() ?>asset/admin/plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <a href="#">
                                        <div class="user-img"> <img src="<?= base_url() ?>asset/admin/plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown"> <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><i class="icon-note"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
                        <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 2</strong> <span class="pull-right text-muted">20% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%"> <span class="sr-only">20% Complete</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 3</strong> <span class="pull-right text-muted">60% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"> <span class="sr-only">60% Complete (warning)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p> <strong>Task 4</strong> <span class="pull-right text-muted">80% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%"> <span class="sr-only">80% Complete (danger)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-tasks -->
                    </li>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?= base_url() ?>asset/admin/plugins/images/users/d1.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Dr. Steave</b> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i>  My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i>  Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i>  Account Setting</a></li>
                            <li><a href="login.html"><i class="fa fa-power-off"></i>  Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                        <!-- input-group -->
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                        <!-- /input-group -->
                    </li>
                    <li class="user-pro">
                        <a href="#" class="waves-effect"><img src="<?= base_url() ?>asset/admin/plugins/images/users/d1.jpg" alt="user-img" class="img-circle"> <span class="hide-menu">Mr SwapTechnologies<span class="fa arrow"></span></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">Main Menu</li>
                    <li> <a href="<?= base_url() ?>dashboard/home" class="waves-effect"><i class="ti-dashboard p-r-10"></i> <span class="hide-menu">Dashboard</span></a> </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="icon-envelope p-r-10"></i> <span class="hide-menu"> Mailbox </a>
                        <ul class="nav nav-second-level">
                            <li> <a href="inbox.html">Inbox</a></li>
                            <li> <a href="inbox-detail.html">Inbox detail</a></li>
                            <li> <a href="compose.html">Compose mail</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap m-t-10">Professional Content</li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-scribd"></i> <span class="hide-menu">LEGO ROBOTICS<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url() ?>robotics/create">Create Lego Content</a> </li>
                            <li> <a href="<?= base_url() ?>robotics/manage">Manage Lego</a> </li>
                            <li> <a href="<?= base_url() ?>robotcat/create">Create Lego Category</a> </li>
                            <li> <a href="<?= base_url() ?>robotcat/manage">Manage Lego Catgeory</a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-pause-circle-o"></i> <span class="hide-menu">Audio mp3<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url() ?>ad_audio/create">Create Audio Conten</a> </li>
                            <li> <a href="<?= base_url() ?>ad_audio/manage">Manage Audio Content</a> </li>
                            <li> <a href="<?= base_url() ?>audiocat/create">Create Music Category</a> </li>
                            <li> <a href="<?= base_url() ?>audiocat/manage">Manage Music Category</a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void();" class="waves-effect"><i class=" fa fa-file-movie-o"></i> <span class="hide-menu">Videos<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url() ?>ad_videos/create">Create Videos Content</a> </li>
                            <li> <a href="<?= base_url() ?>ad_videos/manage">Manage Videos Content</a> </li>
                            <li> <a href="<?= base_url() ?>videocat/create">Create Videos Category</a> </li>
                            <li> <a href="<?= base_url() ?>videocat/manage">Manage Videos Category</a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-file-picture-o"></i> <span class="hide-menu">Progromming<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url() ?>developers/create">Create Content</a> </li>
                            <li> <a href="<?= base_url() ?>developers/manage">Manage Content</a> </li>
                            <li> <a href="<?= base_url() ?>programcat/create">Create Content Category</a> </li>
                            <li> <a href="<?= base_url() ?>programcat/manage">Manage Content Category</a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-edge"></i> <span class="hide-menu">Swaptech Blog Feed<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url() ?>swapblog/create">Create Blog</a> </li>
                            <li> <a href="<?= base_url() ?>swapblog/manage">Manage Blog</a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-edge"></i> <span class="hide-menu">Webpages<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="<?= base_url() ?>webpages/create">Create WebPages</a> </li>
                            <li> <a href="<?= base_url() ?>webpages/manage">Manage WebPages</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Hospital Dashboard</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
                        <ol class="breadcrumb">
                            <li><a href="#">Hospital</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!--row -->
                <?php
                if (isset($view_file)) {
                    $this->load->view($view_module.'/'.$view_file);
                }
                ?>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Swaptechnologies. Have an endless experience with us </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?= base_url() ?>asset/admin/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>asset/admin/bootstrap/dist/js/tether.min.js"></script>
    <script src="<?= base_url() ?>asset/admin/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>asset/admin/plugins/bower_components/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url() ?>asset/admin/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url() ?>asset/admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?= base_url() ?>asset/admin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>asset/admin/js/waves.js"></script>
    <!--Morris JavaScript -->
    <script src="<?= base_url() ?>asset/admin/plugins/bower_components/raphael/raphael-min.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="<?= base_url() ?>asset/admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- jQuery peity -->
    <script src="<?= base_url() ?>asset/admin/plugins/bower_components/peity/jquery.peity.min.js"></script>
    <script src="<?= base_url() ?>asset/admin/plugins/bower_components/peity/jquery.peity.init.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url() ?>asset/admin/js/custom.min.js"></script>
    
    <!--Style Switcher -->
     <script src="<?= base_url() ?>asset/admin/js/jasny-bootstrap.js"></script> 

     <!--date picker js -->
    <script src="<?= base_url() ?>asset/admin/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    
    <script type='text/javascript' src='<?= base_url() ?>asset/public/js/mediaelement-and-player.min.js'></script>
    <!-- Date range Plugin JavaScript -->
    <script src="<?= base_url() ?>asset/admin/plugins/bower_components/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?= base_url() ?>asset/admin/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>asset/highlighter/highlight.pack.js"></script>

    <script>
    
    $(document).ready(function () {
        if ($("#mymce").length > 0) {
            tinymce.init({
                selector: "textarea#mymce"
                , theme: "modern"
                , height: 300
                , plugins: [
   "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker"
   , "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking"
   , "save table contextmenu directionality emoticons template paste textcolor"
   ]
                    , toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons"
                , });
            }
        });


    // Clock pickers
      
        // Date Picker
        jQuery('.mydatepicker, #datepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true
            , todayHighlight: true
        });
        jQuery('#date-range').datepicker({
            toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });
        // Daterange picker
        $('.input-daterange-datepicker').daterangepicker({
            buttonClasses: ['btn', 'btn-sm']
            , applyClass: 'btn-danger'
            , cancelClass: 'btn-inverse'
        });
        $('.input-daterange-timepicker').daterangepicker({
            timePicker: true
            , format: 'MM/DD/YYYY h:mm A'
            , timePickerIncrement: 30
            , timePicker12Hour: true
            , timePickerSeconds: false
            , buttonClasses: ['btn', 'btn-sm']
            , applyClass: 'btn-danger'
            , cancelClass: 'btn-inverse'
        });
        $('.input-limit-datepicker').daterangepicker({
            format: 'MM/DD/YYYY'
            , minDate: '06/01/2015'
            , maxDate: '06/30/2015'
            , buttonClasses: ['btn', 'btn-sm']
            , applyClass: 'btn-danger'
            , cancelClass: 'btn-inverse'
            , dateLimit: {
                days: 6
            }
        });

        $(document).ready(function(){$('video, audio').mediaelementplayer();});
      
    </script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script src="<?= base_url() ?>asset/admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>