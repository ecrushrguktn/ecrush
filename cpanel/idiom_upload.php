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
        <meta name="description" content="A Website For Giving Resources to Students.">
        <meta name="author" content="E-Crush Developers">
        <link rel="shortcut icon" href="../assets/images/logo.png">
        <title> Idiom Upload || E-Crush</title>    
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="../assets/js/modernizr.min.js"></script>
        <script src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript">
           $(document).ready(function (e) {
                $("#form").on('submit',(function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: "pages/idiom_uploads.php",
                        type: "POST",
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                    beforeSend: function()
                    {                   
                        $("#btn-send").html(' Sending ...');
                    },
                    success: function(check){                           
                        if(check==11){
                            $("#btn-send").html('Upload');
                            $.Notification.autoHideNotify('success', 'bottom right', 'Hey Great !!','Suceesfully uploaded');                           
                        }else if(check==22){
                            $("#btn-send").html('Upload');
                            $.Notification.autoHideNotify('error', 'bottom right', 'Hey Fields are Missing !!','Some Fiels are Missing');
                        }else if(check==33){
                            $("#btn-send").html('Upload');
                            $.Notification.autoHideNotify('custom', 'bottom right', 'Hey Already Upload !!','Alread Uploaded the Vocabulary for the date');
                        }else{
                            $("#btn-send").html('Upload');
                            $.Notification.autoHideNotify('error', 'bottom right', 'Hey Server Error !!','Some error occured at server');
                        }
                    }
                });
                    return false;
      }));
});;
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
                                    <h4 class="page-title">Idiom Upload</h4>                                                                       
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                      


                       
                            <div class="col-md-6">
                                <div class="card-box">
                                    <h4 class="text-dark  header-title m-t-0">Idiom Upload</h4><hr>
                                    <div class="col-md-12">
                                    <form id="form" action="#" method="post" enctype="multipart/form-data">
                                    <input type="text" class="form-control" id="date" placeholder="YY-MM-DD" class="form-control" name="dates" required="" value="<?php echo  date('Y-m-d')?>"><br>
                                        <input type="text" placeholder="Word" class="form-control" name="word" class="form-control" required><br>
                                        <input type="text" placeholder="Meaning" class="form-control" name="meaning" required><br>
                                        <input type="text" placeholder="Example" class="form-control" name="example" required><br>
                                        <button type="submit" name="submit" id="btn-send" class="btn btn-primary">Upload</button>
                                        </form>    
                                        </div>                                                                        
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

        <!-- ../plugins  -->        
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
   

        <!-- Page js  -->
        <script src="../assets/pages/jquery.dashboard.js"></script>
        <!-- Custom main Js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
        <script src="../plugins/notifyjs/dist/notify.min.js"></script>
        <script src="../plugins/notifications/notify-metro.js"></script>
        <script src="../plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript">
            jQuery('#datepicker').datepicker({
                autoclose: true,
                format: "yyyy-mm-dd",
                todayHighlight: true
            });
            jQuery('#datepicker-autoclose').datepicker({
                autoclose: true,
                format: "yyyy-mm-dd",
                todayHighlight: true
            });
        </script>

    </body>
</html>
