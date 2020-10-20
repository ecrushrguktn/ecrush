<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A Website For Giving Resources to Students.">
        <meta name="author" content="E-Crush Developers">
        <link rel="shortcut icon" href="assets/images/logo.png">
        <title>Leaderboard (Daily) || E-Crush</title>                
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


<div id="jssor_1" style="position:relative;margin:0 auto;top:30px;left:0px;width:1100px;height:150px;overflow:hidden;visibility:hidden;">        
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:1100px;height:150px;overflow:hidden;">
             <?php
               include'connect.php';               
            $date=date('Y-m-d');
            $q=mysqli_query($con,"SELECT * FROM leaderboard where date='$date' order by points DESC limit 10");            
            $c=mysqli_num_rows($q);
            while($r=mysqli_fetch_array($q,MYSQLI_BOTH)){
            ?>
            <div data-p="43.75">
                <a href="#"><img data-u="image" src="Profiles/images/<?php echo $r['profile_img']; ?>" / style="border-radius:10px;"></a>
            </div>
           <?php } ?>
        </div>
    </div>

    <div class="col-md-12">                        
            <div class="card-box" style="margin-top: 5%;">
              <?php                           
            if($c>0){
              ?>
        <div class="table-responsive">
          <table  class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>S.no</th>
              <th>University Id</th>
              <th>Name</th>
              <th>Class</th>
              <th>Points</th>              
            </tr>
          </thead>
          <tbody>
            <?php   
            $i=1;          
            $q=mysqli_query($con,"SELECT * FROM leaderboard where date='$date' order by points DESC limit 50");                  
            while($r=mysqli_fetch_array($q,MYSQLI_BOTH)){
              echo'
              <tr>
              <td><span class="badge badge-dark">'.$i.'</span></td>              
              <td><span class="badge badge-success">'.$r['username'].'</span></td>
              <td><span class="badge badge-primary">'.$r['name'].'</span></td>
               <td><span class="badge badge-warning">'.$r['class'].'</span></td>
               <td><span class="badge badge-danger">'.$r['points'].'</span></td>
            </tr>

              ';
              $i=$i+1;
            }
          }else{
            echo'<center><div class="alert alert-danger alert-dismissible" style="width:100%">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Not Available!</h4>
                Sorry Leaderboard Scores of '.$date.' are not available.Please visit Later.
              </div></center>';
          }
            ?>                                  
          </tbody>         
          </table>
        </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->          
      </div>
     </div> 


                    
                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->
<?php include 'footer.php'; ?>

            </div>
          

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
        <script src="assets/js/jssor.slider-26.9.0.min.js"></script>
        <script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 0,
              $SlideDuration: 5000,
              $SlideEasing: $Jease$.$Linear,
              $PauseOnHover: 4,
              $SlideWidth: 200,
              $SlideSpacing: 25,
              $Cols: 7,
              $Align: 390
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH =1000;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        });
    </script>
    </body>
</html>