<?php
error_reporting(0);
session_start();
if(isset($_SESSION['ecrushstream_admin'])==false)
{
  header("Location:index");
  exit(0);
}
$session_id=$_SESSION['ecrushstream_admin'];
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A Website For Giving Resources to Students.">
        <meta name="author" content="E-Crush Developers">
        <link rel="shortcut icon" href="../assets/images/logo.png">
        <title>Team || E-Crush</title>                
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
$m=mysqli_query($con,"SELECT * FROM admin Where username='$session_id'");
while($r=mysqli_fetch_array($m,MYSQLI_BOTH)){
    $hub = $r['hub'];
    $role = $r['role'];
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
                             <div class="col-md-12">                        
            <div class="card-box" style="margin-top: 5%;">
            
        <div class="table-responsive">
          <table  class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>S.no</th>              
              <th>Name</th>
              <th>Class</th>
              <th>Branch</th>
              <th>Year</th>
              <th>Mobile</th>                        
              <th>Role</th>                        
            </tr>
          </thead>
          <tbody>
            <?php   
            $i=1;  
            if($hub=='admin'){
                $q=mysqli_query($con,"SELECT * FROM admin where visibility='1'  order by role DESC"); 
            }else{        
            $q=mysqli_query($con,"SELECT * FROM admin where visibility='1' and  hub='$hub' order by role DESC"); 
             }                
            while($r=mysqli_fetch_array($q,MYSQLI_BOTH)){
              echo'
              <tr>
              <td>'.$i.'</td>                            
              <td>'.$r['name'].'</td>
              <td>'.$r['class'].'</td>
              <td>'.$r['branch'].'</td>
              <td>'.$r['year'].'</td>
               <td>'.$r['mobile'].'</td>
              <td style="text-transform:capitalize;">'.$r['role'].'</td>
            </tr>

              ';
              $i=$i+1;
            }
            ?>
          </tbody>
        </table>
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
        <script src="plugins/switchery/switchery.min.js"></script>
    

        <!-- Page js  -->
        <script src="../assets/pages/jquery.dashboard.js"></script>
        
        <!-- Custom main Js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

    </body>
</html>