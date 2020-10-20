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
          $(document).ready(function (e) {
                $("#form").on('submit',(function(e) {
                    e.preventDefault();                                       
                    $.ajax({
                        url: "pages/mark_att.php",
                        type: "POST",
                        data: {username:username, status:status},                        
                        cache: false,                        
                   
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
                                    <table class="table table-responsive table-bordered table-stripped">
                                        <thead>
                                            <tr>
                                                <td>Sno</td>
                                                <td>Username</td>                                                
                                                <td>Overall</td>
                                                <td>Status</td>
                                                <td>Mark</td>
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
                                                $uname=$ee['username'];
                                               echo'
                                               <tr>
                                                    <td>'.$i.'</td>
                                                    <td>'.$ee["username"].'</td>                                                    
                                                    ';
                                                    $ca=mysqli_query($con,"SELECT * FROM admin where username='$uname'");
                                                        while ($cms=mysqli_fetch_array($ca,MYSQLI_BOTH)) {
                                                            $full=$cms['att'];
                                                    }

                                                    $m=mysqli_query($con,"SELECT distinct att_date from att_meet");
                                                    $g=mysqli_num_rows($m);
                                                    $at=$g/$full;
                                                    ?>                                                                                                    
                                                    <?php echo '
                                                    <td><div class="progress progress-sm">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="'.$ee["att"].'" aria-valuemin="'.$ee["att"].'" aria-valuemax="100" style="width:'.$at.'%">
                                            </div>
                                        </div>('.$at.')</td> ';?>
                                                    <td>
                                                        <?php
                                                         $cc=mysqli_query($con,"SELECT * FROM att_meet where username='$uname' and att_date='$date'");
                                                         $cm=mysqli_num_rows($cc);
                                                         while ($cs=mysqli_fetch_array($cc,MYSQLI_BOTH)) {
                                                             $s=$cs['att_status'];
                                                        if($cm<=0){
                                                            echo "<span class='badge badge-primary'>Not Filled</span>";
                                                        }else if($s=='0'){
                                                            echo "<span class='badge badge-danger'>Absent</span>";
                                                        }else if($s=='1'){
                                                            echo "<span class='badge badge-success'>Present</span>";
                                                        }else{
                                                            echo "<span class='badge badge-primary'>Not Filled</span>";
                                                        }
                                                    }
                                                        ?>
                                                    </td>
                                                <td>
                            <button type="button" name="submit" id="btn-send" onclick="mark_att('<?php echo $ee['username'] ?>')" class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>
                            <button type="button" name="submit" id="btn-sends" onclick="mark_att_ab('<?php echo $ee['username'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                                </td>
                                                                                             
                                               </tr>

                                              <?php
                                               $i++;
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
            <script type="text/javascript">
            function mark_att(cou){               
    $.ajax({
        url : "pages/mark_att.php",
        type: "POST",
        data:"cou="+cou,
        cache:false,
         beforeSend: function()
                    {                   
                        $("#btn-send").html('<i class="fa fa-spinner fa-spin"></i>');
                    },
        success:function(check){
                                     
                        if(check==11){
                            $("#btn-send").html('<i class="fa fa-check"></i>');
                            $.Notification.autoHideNotify('success', 'bottom right', 'Hey Great !!','Suceesfully Marked as Present');                           
                        }else if(check==22){
                            $("#btn-send").html('<i class="fa fa-check"></i>');
                            $.Notification.autoHideNotify('error', 'bottom right', 'Hey Fields are Missing !!','Some Fiels are Missing');
                        }else if(check==33){
                            $("#btn-send").html('<i class="fa fa-check"></i>');
                            $.Notification.autoHideNotify('custom', 'bottom right', 'Hey Already Marked !!','Alread Marked for '+cou+'');
                        }else{
                            $("#btn-send").html('<i class="fa fa-check"></i>');
                            $.Notification.autoHideNotify('error', 'bottom right', 'Hey Server Error !!','Some error occured at server');
                        }
                    }                
    });
}
function mark_att_ab(name){
                
    $.ajax({
        url : "pages/mark_att.php",
        type: "POST",
        data:"name="+name,
        cache:false,
         beforeSend: function()
                    {                   
                        $("#btn-sends").html('<i class="fa fa-spinner fa-spin"></i>');
                    },
        success:function(check){
                                     
                        if(check==11){
                            $("#btn-sends").html('<i class="fa fa-check"></i>');
                            $.Notification.autoHideNotify('success', 'bottom right', 'Hey Great !!','Suceesfully Marked as Absent.Tell him / her to attend the meets');                           
                        }else if(check==22){
                            $("#btn-sends").html('<i class="fa fa-check"></i>');
                            $.Notification.autoHideNotify('error', 'bottom right', 'Hey Fields are Missing !!','Some Fiels are Missing');
                        }else if(check==33){
                            $("#btn-sends").html('<i class="fa fa-check"></i>');
                            $.Notification.autoHideNotify('custom', 'bottom right', 'Hey Already Marked !!','Alread Marked for '+name+'');
                        }else{
                            $("#btn-sends").html('<i class="fa fa-check"></i>');
                            $.Notification.autoHideNotify('error', 'bottom right', 'Hey Server Error !!','Some error occured at server');
                        }
                    }                
    });
}
        </script>


    </body>
</html>
