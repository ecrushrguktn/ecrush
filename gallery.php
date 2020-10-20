<?php
session_start();
error_reporting(0);
include'connect.php' ;
$session_id = $_SESSION['stu_id'];
if(isset($_SESSION['stu_id'])==true){
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A Website For Giving Lab Resources to Students.">
        <meta name="author" content="E-Crush Developers">

        <link rel="shortcut icon" href="assets/images/logo.png">

        <title> Gallery | ECE LAB</title>

        <link href="plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="plugins/jquery-circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css" />

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>

        <!--venobox lightbox-->
        <link rel="stylesheet" href="plugins/magnific-popup/dist/magnific-popup.css"/>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include 'top_bar.php' ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

           <?php include 'sidebar.php' ?>
            <!-- Left Sidebar End -->




            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Gallery</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">ECE LAB</a></li>                                        
                                        <li class="breadcrumb-item active">Gallery</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>


                        <!-- SECTION FILTER
                        ================================================== -->
                        <div class="row">
                            <div class="col-12">
                                <div class="portfolioFilter text-center">
                                    <a href="#" data-filter="*" class="current">All</a>
                                    <a href="#" data-filter=".edc">EDC</a>
                                    <a href="#" data-filter=".et">ET</a>
                                    <a href="#" data-filter=".aec">AEC</a>
                                    <a href="#" data-filter=".de">DE</a>
                                    <a href="#" data-filter=".ac">AC / DC</a>
                                    <a href="#" data-filter=".dsp">DSP</a>
                                    <a href="#" data-filter=".rf">RF & MW</a>
                                    <a href="#" data-filter=".mp">MP & MC</a>
                                    <a href="#" data-filter=".vlsi">VLSI</a>
                                </div>
                            </div>
                        </div>

                        <div class="port m-b-20">
                            <div class="portfolioContainer">
                                <div class="col-sm-6 col-lg-3 col-md-4 edc illustrator">
                                    <div class="gal-detail thumb">
                                        <a href="assets/images/gallery/1.jpg" class="image-popup" title="Screenshot-1">
                                            <img src="assets/images/gallery/1.jpg" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 et illustrator photography">
                                    <div class="gal-detail thumb">
                                        <a href="assets/images/gallery/2.jpg" class="image-popup" title="Screenshot-2">
                                            <img src="assets/images/gallery/2.jpg" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 aec graphicdesign">
                                    <div class="gal-detail thumb">
                                        <a href="assets/images/gallery/3.jpg" class="image-popup" title="Screenshot-3">
                                            <img src="assets/images/gallery/3.jpg" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 illustrator de">
                                    <div class="gal-detail thumb">
                                        <a href="assets/images/gallery/4.jpg" class="image-popup" title="Screenshot-4">
                                            <img src="assets/images/gallery/4.jpg" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 ac photography">
                                    <div class="gal-detail thumb">
                                        <a href="assets/images/gallery/5.jpg" class="image-popup" title="Screenshot-5">
                                            <img src="assets/images/gallery/5.jpg" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 dsp photography">
                                    <div class="gal-detail thumb">
                                        <a href="assets/images/gallery/6.jpg" class="image-popup" title="Screenshot-6">
                                            <img src="assets/images/gallery/6.jpg" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 illustrator rf graphicdesign">
                                    <div class="gal-detail thumb">
                                        <a href="assets/images/gallery/7.jpg" class="image-popup" title="Screenshot-7">
                                            <img src="assets/images/gallery/7.jpg" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 graphicdesign photography mp">
                                    <div class="gal-detail thumb">
                                        <a href="assets/images/gallery/8.jpg" class="image-popup" title="Screenshot-8">
                                            <img src="assets/images/gallery/8.jpg" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 vlsi illustrator">
                                    <div class="gal-detail thumb">
                                        <a href="assets/images/gallery/9.jpg" class="image-popup" title="Screenshot-9">
                                            <img src="assets/images/gallery/9.jpg" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 photography edc">
                                    <div class="gal-detail thumb">
                                        <a href="assets/images/gallery/10.jpg" class="image-popup" title="Screenshot-10">
                                            <img src="assets/images/gallery/10.jpg" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 graphicdesign et">
                                    <div class="gal-detail thumb">
                                        <a href="assets/images/gallery/11.jpg" class="image-popup" title="Screenshot-11">
                                            <img src="assets/images/gallery/11.jpg" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-3 col-md-4 webdesign vlsi illustrator">
                                    <div class="gal-detail thumb">
                                        <a href="assets/images/gallery/12.jpg" class="image-popup" title="Screenshot-12">
                                            <img src="assets/images/gallery/12.jpg" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- End row -->


                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->
                <footer class="footer">
                    2018 © ECE LAB<span class="hide-phone">-WEBTEAM</span>
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <div class="">
                    <ul class="nav nav-tabs tabs-bordered nav-justified">
                        <li class="nav-item">
                            <a href="#home-2" class="nav-link active" data-toggle="tab" aria-expanded="false">
                                Activity
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages-2" class="nav-link" data-toggle="tab" aria-expanded="true">
                                Settings
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home-2">
                            <div class="timeline-2">
                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">5 minutes ago</small>
                                        <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">30 minutes ago</small>
                                        <p><a href="#" class="text-info">Lorem</a> commented your post.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">59 minutes ago</small>
                                        <p><a href="#" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">1 hour ago</small>
                                        <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">3 hours ago</small>
                                        <p><a href="#" class="text-info">Lorem</a> commented your post.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>

                                <div class="time-item">
                                    <div class="item-info">
                                        <small class="text-muted">5 hours ago</small>
                                        <p><a href="#" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                        <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane" id="messages-2">

                            <div class="row m-t-20">
                                <div class="col-8">
                                    <h5 class="m-0 font-15">Notifications</h5>
                                    <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#3bafda" data-size="small"/>
                                </div>
                            </div>

                            <div class="row m-t-20">
                                <div class="col-8">
                                    <h5 class="m-0 font-15">API Access</h5>
                                    <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#3bafda" data-size="small"/>
                                </div>
                            </div>

                            <div class="row m-t-20">
                                <div class="col-8">
                                    <h5 class="m-0 font-15">Auto Updates</h5>
                                    <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#3bafda" data-size="small"/>
                                </div>
                            </div>

                            <div class="row m-t-20">
                                <div class="col-8">
                                    <h5 class="m-0 font-15">Online Status</h5>
                                    <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                                </div>
                                <div class="col-4 text-right">
                                    <input type="checkbox" checked data-plugin="switchery" data-color="#3bafda" data-size="small"/>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- Plugins  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>
        <script src="plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script src="assets/pages/jquery.sweet-alert.init.js"></script>
        <!-- Gallery js -->
        <script type="text/javascript" src="plugins/isotope/dist/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(window).on('load', function () {
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });

                $('.portfolioFilter a').click(function(){
                    $('.portfolioFilter .current').removeClass('current');
                    $(this).addClass('current');

                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                });
            });
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
        </script>

    </body>
</html>
<?php
}else{
      header("Location:index.php");  
}
?>