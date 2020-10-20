<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A Website For Giving Lab Resources to Students.">
        <meta name="author" content="E-Crush Developers">

        <link rel="shortcut icon" href="assets/images/logo.png">

        <title>Notifications | E-Crush</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>

        <!-- DataTables -->
        <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />        

    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
<div id="view-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#00b19d !important;">&nbsp;
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                            <h4 class="modal-title" id="myLargeModalLabel"></h4>
                                        </div>
                                        <div class="modal-body">
                                          <div id="dynamic-content"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        <script src="assets/js/jquery.min.js"></script>                            
<script>
$(document).ready(function(){
  
  $(document).on('click', '#getUser', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row
    
    $('#dynamic-content').html(''); // leave it blank before ajax call
      $('#modal-loader').show();// load ajax loader
    
    $.ajax({
      url: 'getnotice.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#dynamic-content').html('');    
      $('#dynamic-content').html(data); // load response 
        $('#modal-loader').hide();  // hide ajax loader 
    })
    .fail(function(){
      $('#dynamic-content').html('<i class="fa fa-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loader').hide();
    });
    
  });
  
});
</script>                            
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
                                    <h4 class="page-title">Notifications</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">E-Crush</a></li>
                                        <li class="breadcrumb-item active">Notifications</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b></b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                       
                                    </p>

                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Title</th>
                                            <th>Send by</th>
                                            <th>Send To</th>
                                            <th>Sent Time</th>
                                            <th>Views</th>                                         
                                        </tr>
                                        </thead>
                                        <tbody>
                                       <?php
include'connect.php';
  $k=mysqli_query($con,"SELECT * FROM notices where visibility='1'  order by id DESC");
while($m=mysqli_fetch_array($k,MYSQLI_BOTH)){
$id=$m['id'];
$title=$m['subject'];
$send_by=$m['sent_by'];
$sent_time=$m['sent_time'];
$Views=$m['views'];
$nv=$m['notice_visible'];
$cm=time()-$nv;


                           echo'         <tr>
                                        <td ><span class="badge badge-primary">'.$id.'</span></td>';
                                        ?>
                                        <td ><a href="#" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $m['id']; ?>" id="getUser">
                                            <?php echo $title ?> <?php if($cm<84600){ ?>&nbsp;&nbsp;<span class="badge badge-danger">New</span> <?php } ?></a></td>
                                            <?php
                                            echo'
                                        <td ><span class="badge badge-purple">'.$send_by.'</span></td>
                                        <td ><span class="badge badge-primary">'.$m['sent_to'].'-'.$m['department'].'</span></td>
                                        <td ><span class="badge badge-pink">'.$sent_time.'</span></td>
                                        <td ><span class="badge badge-warning">'.$Views.'</span></td>
                                   
                                    </tr>';
                                }
                                    ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!-- end row -->


                       

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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">            
$('#datatable').dataTable( {
  "ordering": false
} );
        </script>

    </body>
</html>
