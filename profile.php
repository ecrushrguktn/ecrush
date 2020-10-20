
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A Website For Giving Resources to Students.">
        <meta name="author" content="E-Crush Developers">
        <link rel="shortcut icon" href="assets/images/logo.png">

        <title>Profile || E-Crush</title>            

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
     
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
$m=mysqli_query($con,"SELECT * FROM students Where stu_id='$session_id'");
while($r=mysqli_fetch_array($m,MYSQLI_BOTH)){
    $name = $r['stu_name'];
    $class = $r['stu_class'];
    $year = $r['stu_year'];
    $branch = $r['stu_branch'];
    $gender = $r['stu_gender'];
    $stu_pic=$r['stu_pic'];
    $hobbies=$r['stu_hobbies'];
    $area=$r['stu_area'];
    $last_update=$r['last_update'];
    $ai=$r['academic_info'];
    $pi=$r['personal_info'];
    $pic=$r['ppic'];
    $dob=$r['stu_dob'];
    $mobile=$r['stu_mobile'];
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
                                    <h4 class="page-title">Profile</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">E-Crush</a></li>                                        
                                        <li class="breadcrumb-item active">Profile</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    <div class="alert alert-danger">
                        <strong><i class="fa fa-warning"></i> Fill Your Details Correctly, If Once Data is Submitted You are not able to Edit it. Last Update : <?php echo $last_update;?> </strong>
                    </div>

                        <div class="row">
                            <div class="col-xl-3 col-lg-4">
                                <div class="text-center card-box">
                                    <div class="member-card">
                                        <div class="thumb-xl member-thumb m-b-10 center-block">
                                            <?php
                                        if($stu_pic=='') {
                                            if($Student_gender=='F'){
                                               echo' <img src="assets/images/user_f.png" class="rounded-circle img-thumbnail" alt="profile-image">';
                                            }else{
                                            echo '<img src="assets/images/default.png" class="rounded-circle img-thumbnail" alt="profile-image">';
                                            }
                                        }else{
                                            echo '<img src="profiles/images/'.$stu_pic.'" class="rounded-circle img-thumbnail" alt="profile-image">';
                                        }
                                        ?>
                                        </div>

                                        <div class="">
                                            <h5 class="m-b-5"><?php echo $name ?></h5>
                                            <p class="text-muted">@<?php echo $session_id ?></p>
                                        </div>                             
                                        <div class="text-left m-t-10">
                                            <p class="text-muted font-13"><strong>Full Name :</strong> <span class="m-l-15"><?php echo $name ?></span></p>
                                          
                                        </div>                                        

                                    </div>

                                </div> <!-- end card-box -->

                                

                            </div> <!-- end col -->


                            <div class="col-lg-8 col-xl-9">
                                <div class="">
                                    <div class="card-box">
                                        <ul class="nav nav-tabs tabs-bordered">
                                            <li class="nav-item">
                                                <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                    Change Password
                                                </a>
                                            </li> 
                                            <li class="nav-item">
                                                <a href="#aca" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                    Academic Info
                                                </a>
                                            </li> 
                                            <li class="nav-item">
                                                <a href="#per" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                                    Personal Info
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#pic" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                    Profile Pic
                                                </a>
                                            </li>  
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home">
                                                <div class="col-md-8">

                                            <form id="pass_form" action="#" method="post" enctype="multipart/form-data">
                                                <input type="password" class="form-control" placeholder="Old Password" name="old" required=""><br>
                                                <input type="password" class="form-control" placeholder="New Password" name="new" required=""><br>
                                                <input type="password" class="form-control" placeholder="Confirm Password" name="confirm" required=""><br>  
                                                <button class="btn btn-warning" type="submit"  id="pass">Change Password</button>
                                            </form>
                                                 </div>                       
                                            </div>
                                            <div class="tab-pane" id="aca">
                                                <div class="col-md-8">
                                                    <?php if($ai=='0') { ?>
                                            <form id="aca_form" action="#" method="post" enctype="multipart/form-data">
                                            <select class="form-control" name="year" required="">
                                                <option value="">Select Year</option>
                                                <option value="P1">P1</option>
                                                <option value="P2">P2</option>
                                                <option value="E1">E1</option>
                                                <option value="E2">E2</option>
                                                <option value="E3">E3</option>
                                                <option value="E4">E4</option>
                                            </select><br>
                                            <select class="form-control" name="branch" required="">
                                                <option value="">Select Branch</option>
                                                <option value="PUC">PUC</option>
                                                <option value="CSE">CSE</option>
                                                <option value="ECE">ECE</option>
                                                <option value="ME">ME</option>
                                                <option value="CHEM">CHEM</option>
                                                <option value="CE">CE</option>
                                                <option value="MME">MME</option>
                                            </select><br>
                            <input type="text" class="form-control" placeholder="Class (EX : CG-01)" name="class" required=""><br>  
                                                <button class="btn btn-warning" type="submit"  id="acad">Update</button>       
                                             </form>
                                         <?php } else {?>
                                            <div class="alert alert-danger">
                        <strong><i class="fa fa-warning"></i>  If You want to update contact the team.</strong>
                    </div>
                                            <table class="table table-responsive table-bordered">
                                                <tr>
                                                    <td><b>Year</b></td>
                                                    <td><?php echo $year ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Branch</b></td>
                                                    <td><?php echo $branch ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Class</b></td>
                                                    <td><?php echo $class ?></td>
                                                </tr>
                                            </table>
                                         <?php } ?>
                                                 </div>                       
                                            </div>
                                            <div class="tab-pane " id="per">
                                                <div class="col-md-8">
                                                        <?php if($pi=='0') { ?>
                                            <form id="pers_form" action="#" method="post" enctype="multipart/form-data">
                            <input type="text" class="form-control" placeholder="Mobile Number" name="mobile" maxlength="10" minlength="10" required=""><br>  
                                                <select class="form-control" name="gender" required="">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            
                                            </select><br>
                                        <input type="date" class="form-control" placeholder="Date Of Birth" name="dob" required=""><br> 
                                         <b>Put (,) between to separate Intersted Areas</b>
                                        <textarea cols="5" rows="5" class="form-control" placeholder="Intersted Areas" name="inarea" required=""></textarea><br>
                                        <b>Put (,) between to separate hobbies</b>
                                        <textarea cols="5" rows="5" class="form-control" placeholder="Hobbies" name="hobbies" required=""></textarea><br>


                                                <button class="btn btn-warning" type="submit"  id="pers" >Update</button>       
                                            </form>
                                             <?php } else{ ?>
                                                    <div class="alert alert-danger">
                        <strong><i class="fa fa-warning"></i>  If You want to update contact the team.</strong>
                    </div>
                     <table class="table table-responsive table-bordered">
                                                <tr>
                                                    <td><b>Gender</b></td>
                                                    <td><?php echo $gender ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Mobile</b></td>
                                                    <td><?php echo $mobile ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>DOB</b></td>
                                                    <td><?php echo $dob ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Hobbies</b></td>
                                                    <td><?php echo $hobbies ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Interested Areas</b></td>
                                                    <td><?php echo $area ?></td>
                                                </tr>
                                            </table>
                <?php } ?>
                                                 </div>                       
                                            </div>
                                            <div class="tab-pane " id="pic">
                                                <div class="col-md-8">
                                                     <?php if($pic=='0') { ?>
                                                <form id="pic_form" action="#" method="post" enctype="multipart/form-data">
                                                <select class="form-control" name="type" required="">
                                                    <option value="me">I will Upload</option>                                                    
                                                </select>   <br>
                                                <input type="file" class="form-control" id="file" name="file" required><br>
                                                <button class="btn btn-warning" type="submit" id="pic_u" >Update</button>       
                                                    </form>
                                                <?php } else{ ?>
                                                    <div class="alert alert-danger">
                        <strong><i class="fa fa-warning"></i>  If You want to update contact the team.</strong>
                    </div>
                <?php } ?>
                                                 </div>                       
                                            </div>

                                            
                                </div>

                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->

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
        
        
        <!-- Custom main Js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script src="assets/js/profile.js"></script>
        <script src="plugins/notifyjs/dist/notify.min.js"></script>
        <script src="plugins/notifications/notify-metro.js"></script>
    </body>
</html>
