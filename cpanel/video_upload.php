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
        <title> Listening Upload || E-Crush</title>    
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
                        url: "pages/video_uploads.php",
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
                            $.Notification.autoHideNotify('error', 'bottom right', 'Hey Fields are Missing !!','Some Fiels are Missing'+check+'');
                        }else if(check==33){
                            $("#btn-send").html('Upload');
                            $.Notification.autoHideNotify('custom', 'bottom right', 'Hey Already Upload !!','Alread Uploaded this fact');
                        }else if(check==44){
                            $("#btn-send").html('Upload');
                            $.Notification.autoHideNotify('error', 'bottom right', 'Hey File Not Uploaded !!','File Not Uploaded...Try Again');
                        }else if(check==55){
                            $("#btn-send").html('Upload');
                            $.Notification.autoHideNotify('error', 'bottom right', 'Hey File Extension Error !!','Only MP4 for video & PNG JPG for image are allowed.');
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
                                    <h4 class="page-title">Listening Upload</h4>                                                                       
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                      


                       <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="text-dark  header-title m-t-0">Listening Upload</h4><hr>
                                    <form id="form" action="fact_uploads.php" method="post" enctype="multipart/form-data">  
                                         <select name="category" class="form-control" required>
                                                <option value="">Select Category</option>
                                                <option value="English Learning Videos">English Learning Videos</option>
                                                <option value="Wonderful Study Videos">Wonderful Study Videos</option>
                                                <option value="Health Tips Videos">Health Tips Videos</option>
                                                <option value="Science and Technology Videos">Science and Technology Videos</option>
                                                <option value="Motivational Videos">Motivational Videos</option>
                                                <option value="TED show videos">TED show videos</option>
                                                <option value="Interview Videos">Interview Videos</option>
                                        </select><br>                                            
                                            <br>
                                        <input type="file" class="form-control" id="file" name="file" required><br>
                                        <input type="text" name="f_du" id="f_du" class="form-control" placeholder="Video Duration" size="5"/><br>
                                        <audio id="audio"></audio>
                                        <b style="color:navy;font-family:arial;">Choose your Image file:</b>
                                        <input type="file" class="form-control" name="thumbimg" minlength="1" required><br>
                                        <button type="submit" name="submit" id="btn-send" class="btn btn-primary">Upload</button>
                                        </form>                                                                            
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
    <script>
    var f_duration=0;
    document.getElementById('audio').addEventListener('canplaythrough',function(e){
        f_duration = Math.round(e.currentTarget.duration);
        document.getElementById('f_du').value=f_duration;
        URL.revokeObjectURL(obUrl);
    });
    var obUrl;
    document.getElementById('file').addEventListener('change',function(e){
        var file = e.currentTarget.files[0];
        if(file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)){
            obUrl = URL.createObjectURL(file);
            document.getElementById('audio').setAttribute('src',obUrl);
        }
    });
    </script>
    
   
    </body>
</html>
