<?php
error_reporting(0);
session_start();
if(isset($_SESSION['ecrushstream_admin'])==false)
{
  header("Location:index");
  exit(0);
}
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A Website For Giving Lab Resources to Students.">
        <meta name="author" content="E-Crush Developers">

        <link rel="shortcut icon" href="../assets/images/logo.png">

        <title>Notifications | E-Crush</title>

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
        <script src="../assets/js/jquery.min.js"></script>                            
<script>
$(document).ready(function(){
  
  $(document).on('click', '#delfile', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row   
      $('#dynamc-content').html(''); // leave it blank before ajax call
      $('#modal-loade').show();// load ajax loader         
    $.ajax({
      url: 'del_notice.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#dynamc-content').html('');    
      $('#dynamc-content').html(data); // load response 
        $('#modal-loade').hide();  // hide ajax loader 
    })
    .fail(function(){
      $('#dynamc-content').html('<i class="fa fa-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loade').hide();
    });
    
  });
  
});

$(document).ready(function(){
  
  $(document).on('click', '#restorefile', function(e){
    
    e.preventDefault();
    
    var uid = $(this).data('id');   // it will get id of clicked row   
      $('#dynamc-content').html(''); // leave it blank before ajax call
      $('#modal-loade').show();// load ajax loader         
    $.ajax({
      url: 'restore_notice.php',
      type: 'POST',
      data: 'id='+uid,
      dataType: 'html'
    })
    .done(function(data){
      console.log(data);  
      $('#dynamc-content').html('');    
      $('#dynamc-content').html(data); // load response 
        $('#modal-loade').hide();  // hide ajax loader 
    })
    .fail(function(){
      $('#dynamc-content').html('<i class="fa fa-info-sign"></i> Something went wrong, Please try again...');
      $('#modal-loade').hide();
    });
    
  });
  
});

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
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b></b></h4>
                                   <div id="dynamc-content"></div>
                         <div id="modal-loade" style="display:none;">
                            <div class="alert alert-info" >
                                                <strong>Query runing Please Wait.....</strong>
                                            </div>
                         </div>

                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                    <th>S.no</th>
                    <th>Subject</th>                  
                    <th>Send To</th>
                    <th>Dept</th>
                    <th>Send Date</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php     
                    include'../connect.php';    
                    $session=$_SESSION['ecrushstream_admin'];
                    $k=mysqli_query($con,"SELECT * FROM admin where username='$session'");
                    while($t=mysqli_fetch_array($k,MYSQLI_BOTH)){
                        $stype=$t['role'];
                    }
                    if($stype=='admin'){
                    $a=mysqli_query($con,"SELECT * FROM notices  order by id DESC ");  
                  }else{
                    $a=mysqli_query($con,"SELECT * FROM notices where sent_by='$stype' or added_by='$session'  order by id DESC ");
                  }
                    while($r=mysqli_fetch_array($a,MYSQLI_BOTH)){
                      $dept=$r['department'];
                      $sent_time=$r['sent_date'];
                      $nv=$r['notice_visible'];
                        $cm=time()-$nv;
                    echo'
                    <tr>
                        <td><span class="badge badge-primary">'.$r['id'].'</span></td>';                        
                        ?>                        
                      <td><a href="#" style="text-transform:capitalize !important;" data-toggle="modal" data-target="#view-modal" data-id="<?php echo $r['id']; ?>" id="getUser">
                          <b><?php echo $r['subject']; ?></b></a><?php if($cm<84600){  ?>&nbsp;&nbsp;<span class="badge badge-warning">New</span> <?php } ?></td>
                        <?php 
                        echo'                      
                        <td><span class="badge badge-info">'.$r['sent_to'].'</span></td>'; ?>
                        <?php 
                        if($dept==""){
                        echo'<td><span class="badge badge-primary">No</span></td>';  
                        }else{
                        echo'
                        <td><span class="badge badge-primary">'.$r['department'].'</span></td>';
                        }
                        ?>
                        <?php
                        echo'
                        <td><span class="badge badge-success">'.$r['sent_date'].'</span></td>
                        <td><a href="edit_notice.php?id='.$r['id'].'" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a>';
                        ?>
                        <?php 
                        if($r['visibility']==1){
                       echo'
                            <a href="#" data-id="'.$r['id'].'" id="delfile" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
                        }else{
                            echo'
                            <a href="#" data-id="'.$r['id'].'" id="restorefile" class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i></a>';
                        }
                        if($r['files_count']<=0){
                           echo'
                          <a href="edit_notice.php?id='.$r['id'].'"  class="btn btn-sm btn-info"><i class="fa fa-cloud-upload"></i></a>';
                        }else{
                           echo'
                          <a href="#"  class="btn btn-sm btn-success"><i class="fa fa-cloud-download"></i></a>';
                        }
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
                        </div> <!-- end row -->


                       

                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->
        <footer class="footer">
                    2018 © E<span class="hide-phone">-WEBTEAM</span>
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


           
        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- ../plugins  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/detect.js"></script>
        <script src="../assets/js/fastclick.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>
        <script src="../assets/js/jquery.blockUI.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- Required datatable js -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
    
        <!-- Responsive examples -->
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

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
        </script>

    </body>
</html>
