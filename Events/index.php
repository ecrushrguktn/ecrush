<?php
error_reporting(0);
session_start();
include '../connect.php';
if(isset($_SESSION['ecrushstream'])==false)
{
  header("Location:../index");
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
        <link rel="shortcut icon" href="../assets/images/logo.png">
        <title> E-Crush</title>        
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="../assets/js/modernizr.min.js"></script>            
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
    $Student_category = $r['role'];
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
   Hi ! <?php echo $Student_name ?><br />  <br />  
   Hi ! Thank You For Visiting <br />   <br />                                 
   Hi ! All the Best to Your Bright Future <br> <br>
   From Your Lovely Webteam
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
                                <div class="card-box">
                                    <h4 class="text-dark  header-title m-t-0">About Us</h4><hr>
                                    <center><img src="sitemap.png" alt="Sitemap Image"></center>
                                   <p class="font-20" style="word-spacing:5px;">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<span style="font-weight:bolder;font-size:25px !important;">T</span>his site is intended to provide best resources to the ECEIIITN'S. ECE is among the leading departments of its kind in the nation,
 built on fundamentals of applied mathematics and engineering physics, providing multidisciplinary,systems-oriented education and research in eleven core areas:
Applied Ocean Sciences , Communication Theory & Systems , Electronic Circuits & Systems , Electronic Devices & Materials , Intelligent Systems, Robotics & Control ,Medical Devices & Systems , Nanoscale Devices & Systems , Photonics ,Radio and Space Science , and Signal & Image Processing .<br><br>

 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<span style="color:deeppink;font-weight:bolder;font-size:25px !important;">E</span>lectronic communications engineering is the utilization of science and math applied to practical problems in the field 
of communications. Electronic communications engineers engage in research, design, development and testing of the electronic equipment used in various communications systems. It is due to electrical engineers that we enjoy 
such modern communication devices as cellular telephones, radios and television.<br><br>

 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color:deeppink;font-weight:bolder;font-size:25px !important;">C</span>areer Opportunities: Electronics & communication Engineering offers scope in the field of research,mobile communication, Microwave communication, robotics, defense, radio communication, TV broadcasting, telegraphy & telephony, VLSI design, DSP, nuclear science, wireless communication and biotechnology.<br><br>

 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color:deeppink;font-weight:bolder;font-size:25px !important;">E</span>CE-LAB Website is the result of great efforts and Skill of the Webteam. It is the Design of Advanced Versions of Scripts and Code.
One of the best we used is Bootstrap V4.0. When Coming to Database We used Advanced Web Server Side Script.
We hope it may useful to  improve your knowledge and to get best ranks to rise the fame of our ECE Department.<br>
                   <p class="font-20" style="margin-left: 75%;">Thank You</p>
                    <p class="font-20" style="margin-left: 80%;margin-top: -1% !important;">-Webteam.</p>
 

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
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/detect.js"></script>
        <script src="../assets/js/fastclick.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>        
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>
    

        <!-- Page js  -->
        <script src="../assets/pages/jquery.dashboard.js"></script>
        
        <!-- Custom main Js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

    </body>
</html>