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
        <title> Attendance || E-Crush</title>    
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="../assets/js/modernizr.min.js"></script>
        <script src="../assets/js/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() { 
   $('input[name=status]').change(function(){
                    var i=1;
                    for(i=1;i<=10;i++){                    
                    var username = $('#username').val();                                        
                    }
                    alert(username);
                    var status = $('#status').val();                                        
                    $.ajax({
                        url: "pages/mark_att.php",
                        type: "POST",
                        data: {username:username, status:status},                        
                        cache: false,                        
                    beforeSend: function()
                    {                   
                        $("#btn-send").html(' Sending ...');
                    },
                    success: function(check){                           
                        if(check==11){
                            $("#btn-send").html('Submit');
                            $.Notification.autoHideNotify('success', 'bottom right', 'Hey Great !!','Suceesfully uploaded');                           
                        }else if(check==22){
                            $("#btn-send").html('Submit');
                            $.Notification.autoHideNotify('error', 'bottom right', 'Hey Fields are Missing !!','Some Fiels are Missing');
                        }else if(check==33){
                            $("#btn-send").html('Submit');
                            $.Notification.autoHideNotify('custom', 'bottom right', 'Hey Already Upload !!','Alread Uploaded this fact');
                        }else if(check==44){
                            $("#btn-send").html('Submit');
                            $.Notification.autoHideNotify('error', 'bottom right', 'IHey mage Not Uploaded !!','Image Not Uploaded...Try Again');
                        }else if(check==55){
                            $("#btn-send").html('Submit');
                            $.Notification.autoHideNotify('error', 'bottom right', 'Hey File Extension Error !!','Only JPG PNG JPEG GIF are allowed.');
                        }else{
                            $("#btn-send").html('Submit');
                            $.Notification.autoHideNotify('error', 'bottom right', 'Hey Server Error !!','Some error occured at server');
                        }
                    }
                });
            });
        });


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
                                    <h4 class="page-title">Attendance</h4>                                                                       
                                    <div class="clearfix"></div>
                                </div>
                            </div>


                            <div class="col-md-10">
                                <div class="card-box">
                                    <h4 class="text-dark  header-title m-t-0">Attendance on <?php echo date('Y-m-d') ?></h4><hr>
                                    <form id="form" action="#" method="post" enctype="multipart/form-data">
                                    <table class="table table-responsive table-bordered table-stripped">
                                        <thead>
                                            <tr>
                                                <td>Sno</td>
                                                <td>Username</td>
                                                <td>Status</td>
                                                <td>Overall</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            include 'connect.php';
                                            $r=mysqli_query($con,"SELECT * FROM admin where username='$session'");
                                            while ($e=mysqli_fetch_array($r,MYSQLI_BOTH)) {
                                                $hub=$e['hub'];
                                                $role=$e['role'];
                                            }
                                            $i=1;
                                            $c=mysqli_query($con,"SELECT * FROM admin where hub='$hub'");
                                            while ($ee=mysqli_fetch_array($c,MYSQLI_BOTH)) {
                                               echo'
                                               <tr>
                                                    <td>'.$i.'</td>
                                                    <td><input type="text" value="'.$ee["username"].'" class="form-control" id="username" name="username" disabled ></td>                                                    
                                                    <td>';
                                                    ?>                                                     
                                                    <input type="radio" value="1" id="status" name="status" >Present
                                                    <input type="radio" value="0" id="status" name="status" >Absent</td>
                                                    <?php echo '
                                                    <td>'.$ee["att"].'</td>                                                    
                                               </tr>

                                               ';
                                               $i++;
                                            }
                                            ?>
                                            <tr>
                                                                                           
                                                <td colspan="4">
                                                    <button type="button" name="submit" id="btn-send" class="btn btn-primary" onclick="mark()">Submit</button>
                                                </td>
                                            </tr>                                        
                                        </tbody>           
                                    </table>
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



    </body>
</html>
