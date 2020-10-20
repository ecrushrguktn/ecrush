<?php
error_reporting(0);
session_start();
include 'connect.php';
if(isset($_SESSION['ecrushstream'])==false)
{
  header("Location:index");
  exit(0);
}
$stuid=$_SESSION['ecrushstream'];
$ip=$_SERVER['REMOTE_ADDR'];
$today=date('Y-m-d');
$currentDate =  time(); 
include 'includes/device.php';
$dat=date("Y-m-d H:i:s", $currentDate);
$visits=mysqli_query($con,"SELECT * FROM page_logs where dates='$today' and stuid='$stuid' and page='Birthday'");
$cm=mysqli_num_rows($visits);
  if($cm<=0){
mysqli_query($con,"INSERT INTO page_logs(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','Birthday','Birthday','$stuid')");
mysqli_query($con,"INSERT INTO page_logs_log(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','Birthday','Birthday','$stuid')");
   }else{
mysqli_query($con,"UPDATE page_logs SET no_of_times=no_of_times+1 where dates='$today' and page='Birthday' and stuid='$stuid'");
mysqli_query($con,"INSERT INTO page_logs_log(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','Birthday','Birthday','$stuid')");        
    }
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A Website For Giving Resources to Students.">
        <meta name="author" content="E-Crush Developers">
        <link rel="shortcut icon" href="assets/images/logo.png">
        <title>Birthday || E-Crush</title>                
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="assets/css/ballon-style.css">
        <script src="assets/js/modernizr.min.js"></script>      
           <style>
  .qss{font-size:20px;color:orange;}
  .ans{color:blue;}
  .news_list{
    list-style:none;
    overflow: auto;
    width:100%;
  }
  .news_list li{
    display: inline-block;
    padding:30px;
  }
  
  </style>     
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
    $Student_category = $r['category'];
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
                    <div class="card-box">
                         <div style="height:auto;overflow-x:auto;overflow-y:hidden;white-space:nowrap;">
  <ul class="news_list">
    <?php
    $todayyy=date('m/d');    
    $student=$_SESSION['ecrushstream'];
    if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM students where stu_dob='$todayyy'"))==0)
    {
      echo "<center><h1 style='font-size:50px'>No Birthday's Today</h1></center>";
      
    }
    else{
         echo '
         <div class="balloon">
    <div><span class="ballon-text">H</span></div>
    <div><span class="ballon-text">A</span></div>
    <div><span class="ballon-text">P</span></div>
    <div><span class="ballon-text">P</span></div>
    <div><span class="ballon-text">Y</span></div>
    <div><span class="ballon-text">B\'</span></div>
    <div><span class="ballon-text">D</span></div>
    <div><span class="ballon-text">A</span></div>
    <div><span class="ballon-text">Y</span></div>
  </div><br><br><br><br><br><br>
';
    
    $resultsPerPage=4;
    $query=mysqli_query($con,"SELECT * FROM students where stu_dob='$todayyy' ORDER BY stu_id");
    while($data=mysqli_fetch_array($query,MYSQLI_BOTH))
    {
      $userprofile=$data['stu_pic'];
      $stuname=$data['stu_name'];
      $gen=$data['stu_gender'];
   
      echo "<li>";
      if($userprofile!=""){
      echo '<img src="'.$userprofile.'" style="width:200px;height:200px;border-radius:100px;"><br>';
      }else{
      echo '<img src="assets/images/logo.png" style="width:200px;height:200px;border-radius:100px;"><br>';
      }
      echo "<center><p style='font-family:Malgun Gothic;text-transform:Capitalize;font-weight:bolder;'>".$stuname."</p></center></li>";
      ?>
    <?php
    }
  
    ?>
    
  </ul>
</div>
<br><br>
    <form id="birthday_form"  method="post" enctype="multipart/form-data">
    <div style="background-color:lightgray;width:50%;padding:10px;border-radius:10px;margin-left:30%;">
        <p class="lead emoji-picker-container">
  <textarea type="description" class="form-control" name="wish" rows="5" cols="5" placeholder="Wish Here....." data-emojiable="true" required></textarea>
</p><br/>
  <button type="submit" id="btn-birthday" class="btn btn-primary">Wish them</button>
</div>
</form>
<br>
    <div style="background-color:white;box-shadow:1px 2px 5px black;width:50%;padding:10px;border-radius:10px;margin-left:30%;">
      <ul class="list-group">
      <?php
      $i=0;
      $sql=mysqli_query($con,"SELECT * FROM birthday_wishes where birthdate='$todayyy' ORDER BY wished_time");
      while($row=mysqli_fetch_array($sql,MYSQLI_BOTH))
      {
        $wished_by=$row['wished_by'];
        $wish=$row['wishes'];
        $times=$row['wished_time'];
        if($i%2==0){
            $color='primary';
        }else{
            $color='danger';
        }
        echo'  <div class="card m-b-20 card-body text-xs-center">
                                        <h5 class="card-title"><span class="badge badge-success">Wished by: <b>'.$wished_by.'</b></h5>
                                        <p class="card-text">'.$wish.'</span></p>
                                        <p class="card-text">
                                            <small class="text-muted"><span class="badge badge-dark"> <i class="fa fa-history"></i> '.$times.' </span></small>
                                        </p>
                                    </div>
                                   ';
      $i++;
        }
        }      
      ?>     
  </ul>
      </div>
                    </div>
                </div>

                    </div>
                    <!-- end container -->
                </div>

                <!-- end content -->
<?php include 'footer.php'; ?>

            </div>
        

         

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
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="plugins/switchery/switchery.min.js"></script>
    

        <!-- Page js  -->
        <script src="assets/pages/jquery.dashboard.js"></script>
        
        <!-- Custom main Js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script src="assets/js/birthday.js"></script>
        <script src="plugins/notifyjs/dist/notify.min.js"></script>
        <script src="plugins/notifications/notify-metro.js"></script>
    </body>
</html>