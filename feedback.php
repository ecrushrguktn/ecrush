<?php
error_reporting(0);
session_start();
include 'connect.php';
if(isset($_SESSION['ecrushstream'])==false)
{
  header("Location:index");
  exit(0);
}
$stuid=$_SESSION['ecrushstream'];
$ip=$_SERVER['REMOTE_ADDR'];
$today=date('Y-m-d');
$currentDate =  time(); 
$dat=date("Y-m-d H:i:s", $currentDate);
$visits=mysqli_query($con,"SELECT * FROM page_logs where dates='$today' and stuid='$stuid' and page='Feedback'");
$cm=mysqli_num_rows($visits);
  if($cm<=0){
mysqli_query($con,"INSERT INTO page_logs(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','Feedback','Feedback','$stuid')");
mysqli_query($con,"INSERT INTO page_logs_log(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','Feedback','Feedback','$stuid')");
   }else{
mysqli_query($con,"UPDATE page_logs SET no_of_times=no_of_times+1 where dates='$today' and page='Feedback' and stuid='$stuid'");
mysqli_query($con,"INSERT INTO page_logs_log(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','Feedback','Feedback','$stuid')");        
    }
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A Website For Giving Lab Resources to Students.">
        <meta name="author" content="E-Crush Developers">

        <link rel="shortcut icon" href="assets/images/logo.png">

        <title> Feedback || E-Crush</title>

        <link href="plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="plugins/jquery-circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
        <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>
<script type="text/javascript">

  window.setTimeout(function() {
    $("#dismiss").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 10000);
</script>

        
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
                                    <h4 class="page-title">Feedback</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="index.php">E-Crush</a></li>
                                        <li class="breadcrumb-item active">Feedback</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

             
                         <div class="alert alert-primary">
              If You Want to See all options in table Please click this option <i class="mdi mdi-menu"></i> i.e at topbar.
                             </div>
                   <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-30"></h4>
                                            <form id="form" action="#" method="post" enctype="multipart/form-data">
                                                <select class="form-control" name="type" required="">
                                        <option value="">Select type</option>
                                        <option value="Feedback to Webteam" onclick="get_feed();">Feedback to Webteam</option>
                                        <option value="Request For a Resource" onclick="get_res();">Request For a Resource</option>
                                                  
                                            </select><br>
                                             <div id="feed">
                                                <select class="form-control" name="req_person">
                                                <option value="admin">Send to Webteam</option>
                                                <option value="CO">Send to Convenor</option>
                                                <option value="EC">Send to Executive Coordinator</option>
                                                <option value="AEC">Send to Associative Coordinator</option>
                                                <option value="OC">Send to Overall Coordinator</option>
                                                <option value="E-Skills">Send to E-Skills Coordinator</option>
                                                <option value="E-Library">Send to E-Library Coordinator</option>
                                                <option value="Quiz">Send to Quiz Coordinator</option>
                                                <option value="Listening">Send to Listening Coordinator</option>
                                                <option value="Designing">Send to Designing Coordinator</option>
                                                <option value="Softskills">Send to Softskills Coordinator</option>
                                                <option value="Infra">Send to Infra Coordinator</option>
                                                <option value="Technical">Send to Technical Coordinator</option>
                                                <option value="Promotions">Send to Promotions Coordinator</option>         
                                            </select><br>
                                            </div>
                                            <div id="req" style="display:none;">
                                             <select class="form-control" name="req_person" required="">
                                                <option value="admin">Ask Webteam</option>
                                                <option value="CO">Ask Convenor</option>
                                                <option value="EC">Ask Executive Coordinator</option>
                                                <option value="AEC">Ask Associative Coordinator</option>
                                                <option value="OC">Ask Overall Coordinator</option>
                                                <option value="E-Skills">Ask E-Skills Coordinator</option>
                                                <option value="E-Library">Ask E-Library Coordinator</option>
                                                <option value="Quiz">Ask Quiz Coordinator</option>
                                                <option value="Listening">Ask Listening Coordinator</option>
                                                <option value="Designing">Ask Designing Coordinator</option>
                                                <option value="Softskills">Ask Softskills Coordinator</option>
                                                <option value="Infra">Ask Infra Coordinator</option>
                                                <option value="Technical">Ask Technical Coordinator</option>
                                                <option value="Promotions">Ask Promotions Coordinator</option>
                                            </select><br>
                                        </div>
                                <textarea class="form-control" cols="10" rows="10" placeholder="Type Feedback here...." name="Feedback" required=""></textarea><br>
                                                <button type="submit" class="btn btn-primary" name="sent_feedback" id="btn-send">Send Feedback</button>
                                            </form>                                            
                                        </div>
                                       
                                        
                                       
                                  
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                       <div class="row">
                            <div class="col-md-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b></b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                       
                                    </p>

                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Message</th>
                                            <th>Reply</th>
                                            <th>Type</th>
                                            <th>Sent_time</th>
                                            <th>Sent_to</th>                                         
                                        </tr>
                                        </thead>


                                        <tbody>
                                       <?php
$select=mysqli_query($con,"SELECT * FROM feedbacks where sent_by='$stuid' order by id ASC ");
while($m=mysqli_fetch_array($select,MYSQLI_BOTH)){
$id=$m['id'];
$message=$m['message'];
$reply=$m['reply'];
$type=$m['type'];
$time=$m['sent_time'];
$send_to=$m['sent_to'];


                           echo'         <tr>
                                        <td ><span class="badge badge-purple">'.$id.'</span></td>
                                        <td >'.$message.'</td>
                                        <td >'.$reply.'</td>
                                        <td >'.$type.'</td>
                                        <td ><span class="badge badge-warning">'.$time.'</span></td>
                                        <td ><span class="badge badge-primary">'.$send_to.'</span></td>
                                   
                                    </tr>';
                                }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->                  

               <?php include 'footer.php'?>

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
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="plugins/switchery/switchery.min.js"></script>

        <!-- Required datatable js -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
        
        <!-- Responsive examples -->
        <script src="plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="assets/js/feedback.js"></script>
        <script src="plugins/notifyjs/dist/notify.min.js"></script>
        <script src="plugins/notifications/notify-metro.js"></script>
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();                
            } );
            function get_res(){            
                document.getElementById('feed').style.display='none';
                document.getElementById('req').style.display='block';
            }
            function get_feed(){                
                document.getElementById('req').style.display='none';
                document.getElementById('feed').style.display='block';
            }
        </script>   
                    
    </body>
</html>
