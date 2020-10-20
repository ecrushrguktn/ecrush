<?php
error_reporting(0);
session_start();
if(isset($_SESSION['ecrushstream_admin'])!="")
{
  header("Location:home");
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
        <title> E-Crush</title>        
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="../assets/js/modernizr.min.js"></script>

        
        
    </head>


   <div class="topbar">
<!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="#" class="logo"><i class=" mdi mdi-book"></i> <span>E-Crush</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <nav class="navbar-custom"></nav>

            </div>


        <div class="wrapper-page">

            <div class="container">                    
                        <div class="col-md-4"></div>                        
                       <div class="row">
                            <div class="col-md-12">
                                
                                <div class="card-box">
                                    <h4 class="text-dark  header-title m-t-0"><i class="mdi mdi-login"></i> Login Here</h4><hr>
                                 

            <div class="text-center">
                 <img src="../assets/images/logo.png" style="width:150px;height:140px;border-radius:100px;border:3px solid #eee;"><br>
            
            </div><br>
              <div id="error"></div>
              
            <form class="form-horizontal m-t-20" id="login-form">

                <div class="form-group row">
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="mdi mdi-account"></i></span>
                            <input class="form-control" type="text" required="" name="user_idno"  id="user_idno" placeholder="Username">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="mdi mdi-radar"></i></span>
                            <input class="form-control" type="password" required=""  name="password" id="password"  placeholder="Password">
                        </div>
                    </div>
                </div>
<br>
                <div class="form-group row">
                    <div class="col-12">
                        <button class="btn btn-primary btn-custom w-md" type="submit" name="btn-login" id="btn-login">Login</button>
                         <a class="btn btn-primary btn-custom w-md" data-toggle="tooltip" data-placement="right" title="Please Mail to Us" style="float:right;color:white !important;">Forgot Password</a>               
                    </div>
                </div>
            </form>
           
       
                                </div>
                           </div>
                        </div>
                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->
  <footer class="footer_login" style=" !important;">
                    2019 © E-Cruh<span class="hide-phone">-WEBTEAM. All Rights Reserved</span>
                </footer>
               
        

        </div>
        <!-- END wrapper -->


    
        <script>
            var resizefunc = [];
        </script>

        <!-- ../plugins  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>        
        <script src="../assets/js/detect.js"></script>
        <script src="../assets/js/fastclick.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>        
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        
        <!-- Custom main Js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
         <script src="../plugins/notifyjs/dist/notify.min.js"></script>
        <script src="../plugins/notifications/notify-metro.js"></script>
        <script src="../assets/js/admin_script.js"></script>
        <script src="../assets/js/validation.min.js"></script>
    </body>
</html>