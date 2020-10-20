<?php
error_reporting(0);
session_start();
if(isset($_SESSION['ecrushstream'])==true)
{
  header("Location:home");
  exit(0);
}
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A Website For Giving Resources to Students.">
        <meta name="author" content="E-Crush Developers">
        <link rel="shortcut icon" href="assets/images/logo.png">
        <title> E-Crush</title>                
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="assets/js/modernizr.min.js"></script>            
    </head>


    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
<?php include 'top_bar.php' ?>


            <!-- ========== Left Sidebar Start ========== -->
  <?php include 'sidebar.php' ?>
           
            <!-- Left Sidebar End -->

<?php
$m=mysqli_query($con,"SELECT * FROM users Where stu_id='$session_id'");
while($r=mysqli_fetch_array($m,MYSQLI_BOTH)){
    $Student_name = $r['stu_name'];
    $Student_category = $r['category'];
}
?>


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
                                    <div class="Iam">
                                    <h4 class="page-title"></h4>
                                    <b>
                                    <div class="innerIam">
                                       Welcome ! to E-crush  Website<br /> <br />                                       
    Let Us Speak in English<br />  <br />  
    Carrer Matters! So, English Matters <br />   <br />                                 
    Thank You For Visiting <br> <br>
    
    </div>
</b>
</div>

                                 
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                        <div class="col-md-14">
    
                            </div>



                       <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                <div class="col-lg-6">                                          
                                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="carousel-item active">
                                                        <img class="d-block img-fluid" src="assets/images/1.jpg" alt="First slide" />
                                                        <div class="carousel-caption d-none d-md-block">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block img-fluid" src="assets/images/2.jpg" alt="Second slide" />
                                                        <div class="carousel-caption d-none d-md-block">
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block img-fluid" src="assets/images/3.jpg" alt="Third slide" />
                                                        <div class="carousel-caption d-none d-md-block">
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">                                          
                                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="carousel-item active">
                                                        <img class="d-block img-fluid" src="assets/images/11.jpg" alt="First slide" />
                                                        <div class="carousel-caption d-none d-md-block">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block img-fluid" src="assets/images/22.jpg" alt="Second slide" />
                                                        <div class="carousel-caption d-none d-md-block">
                                                          
                                                        </div>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block img-fluid" src="assets/images/33.jpg" alt="Third slide" />
                                                        <div class="carousel-caption d-none d-md-block">
                                                           </div>
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                <div class="card-box">
                                    <h4 class="text-dark  header-title m-t-0">About Us</h4><hr>
                                   <p class="font-20" style="word-spacing:5px;">
This site is intended to provide best resources to the IIITN'S.The reason, for starting this is to create a platform where a student can learn english from the basics and be able to speak fluently in English with out errors and with confidence.We believe that a language can be learnt only when we speak, listen and write in that language. But we are going to take one step more to make this. It is by involving as many students of us as possible so that learning will be fun. You may call it learning by doing. You can post your valuable suggestions and if you have any new, innovative ideas you can share with us. We would love to hear from you.
                   <p class="font-20" style="margin-left: 75%;">Thank You</p>
                    <p class="font-20" style="margin-left: 80%;margin-top: -1% !important;">-E-crush team.</p>
 

                                    </p>
                                </div>
                           </div>
                        </div>
                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->
<?php include 'footer.php'; ?>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        

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
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="plugins/switchery/switchery.min.js"></script>
    

        <!-- Page js  -->
        <script src="assets/pages/jquery.dashboard.js"></script>
        
        <!-- Custom main Js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>