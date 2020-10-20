<?php
error_reporting(0);
session_start();
include '../connect.php';
if(isset($_SESSION['ecrushstream'])==false)
{
  header("Location:../index");
  exit(0);
}
$stuid=$_SESSION['ecrushstream'];
$ip=$_SERVER['REMOTE_ADDR'];
$today=date('Y-m-d');
$currentDate =  time(); 
$dat=date("Y-m-d H:i:s", $currentDate);
$visits=mysqli_query($con,"SELECT * FROM page_logs where dates='$today' and stuid='$stuid' and page='GD'");
$cm=mysqli_num_rows($visits);
  if($cm<=0){
mysqli_query($con,"INSERT INTO page_logs(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','GD','E-library','$stuid')");
mysqli_query($con,"INSERT INTO page_logs_log(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','GD','E-library','$stuid')");
   }else{
mysqli_query($con,"UPDATE page_logs SET no_of_times=no_of_times+1 where dates='$today' and page='GD' and stuid='$stuid'");
mysqli_query($con,"INSERT INTO page_logs_log(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','GD','E-library','$stuid')");        
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
        <title>E-library || E-Crush</title>        
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="../assets/js/modernizr.min.js"></script>  
        <!-- DataTables -->
        <link href="../plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="../plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />          
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
                                    <h4 class="page-title">Group Discussion</h4>
                                  
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
		<?php 
    	$n=mysqli_query($con,"SELECT * FROM e_library where category='Placements' and sub_category='Gd' and visibility='1'order by id DESC");
    	$count=mysqli_num_rows($n);
    	?>

                      <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">                                   
				  	<table id="datatable" class="table table-bordered">
					<thead>
						<tr>
							<th>S.no</th>
							<th>File Name</th>
							<th>File Type</th>
							<th>File Size</th>
							<th>Category</th>
							<th>Downloads</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while($r=mysqli_fetch_array($n,MYSQLI_BOTH)){
							echo'
						<tr>
							<td>'.$r['id'].'</td>
							<td>'.$r['file_name'].'</td>
							<td><span class="badge badge-purple">'.strtoupper($r['file_type']).'</span></td>
							<td><span class="badge badge-warning">'.$r['file_size'].'</span></td>
							<td><span class="badge badge-success">'.$r['sub_category'].'</span></td>
							<td><span class="badge badge-danger">'.$r['downloads'].'</span></td>';
							?>
							<td><a href="<?php echo $r['category'] ?>/<?php echo $r['sub_category'] ?>/<?php echo $r['file_name'] ?><?php echo $r['extension'] ?>" class="btn btn-sm btn-primary" onclick="updatecount('<?php echo $r['id'] ?>')"><i class="fa fa-cloud-download"></i> Download</a>
							<?php 
							?>
							</td>
						</tr>
						<?php
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
        <script src="../plugins/switchery/switchery.min.js"></script>
    

        <!-- Page js  -->
        <script src="../assets/pages/jquery.dashboard.js"></script>
        
        <!-- Custom main Js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
                <!-- Required datatable js -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
    
        <!-- Responsive examples -->
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );
$('#datatable').dataTable( {
  "ordering": false
} );
  
function updatecount(cou){
    $.ajax({
        url : "updatedownloads.php",
        type: "POST",
        data:"cou="+cou,
        success:function(data){},
        cache:false
    });
}
        </script>


    </body>
</html>