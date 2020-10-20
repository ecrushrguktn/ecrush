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
$visits=mysqli_query($con,"SELECT * FROM page_logs where dates='$today' and stuid='$stuid' and page='Facts'");
$cm=mysqli_num_rows($visits);
  if($cm<=0){
mysqli_query($con,"INSERT INTO page_logs(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','Facts','E-Skills','$stuid')");
mysqli_query($con,"INSERT INTO page_logs_log(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','Facts','E-Skills','$stuid')");
   }else{
mysqli_query($con,"UPDATE page_logs SET no_of_times=no_of_times+1 where dates='$today' and page='Facts' and stuid='$stuid'");
mysqli_query($con,"INSERT INTO page_logs_log(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','Facts','E-Skills','$stuid')");        
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
       <title>E-Skills || E-Crush</title>   
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="../assets/js/modernizr.min.js"></script>              
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
                                    <h4 class="page-title">Facts</h4>
                                  
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
	

               <div class="row">       
                                                        
           	<?php
           	$i=0; 
	       $k=mysqli_query($con,"SELECT * FROM eskills_facts where visibility='1' order by dates DESC limit 12");
	       $c=mysqli_num_rows($k);
	       if($c>0){	       	
	       while($r=mysqli_fetch_array($k,MYSQLI_BOTH)){
	       	echo'	       	
	       	<div class="col-sm-4 col-lg-3 col-xs-12">
                   <div class="card m-b-20">
                       <img class="card-img-top img-fluid" src="Facts_images/'.$r['fact'].'" alt="Fact Images">
                              <div class="card-body">
                                <hr><center>';?>
                                <?php 
                                if($i%2==0){                                	
                                ?>
                                <span class="badge badge-primary"><?php echo $r['dates'] ?></span> <?php if($date==$r['dates']){ echo '<span><img src="images/2.gif">'; } ?><br>
                            <?php } else if($i%3==0){?>
                            	<span class="badge badge-purple"><?php echo $r['dates'] ?> </span><?php if($date==$r['dates']){ echo '<span><img src="images/2.gif">'; } ?><br>
                            <?php }else { ?>
                            	<span class="badge badge-pink"><?php echo $r['dates'] ?></span><?php if($date==$r['dates']){ echo '<span><img src="images/2.gif">'; } ?><br>
                            <?php } ?>
                               <br><button class="btn btn-primary" onclick="like_fact('<?php echo $r['id'] ?>')"><i class="fa fa-thumbs-up"></i>( <?php echo $r['likes'] ?> )</buttom>
                                        <button class="btn btn-warning" onclick="dislike_fact('<?php echo $r['id'] ?>')"><i class="fa fa-thumbs-down"></i>  ( <?php echo $r['dislikes'] ?>)</button>                           </center>
                                 </div>
                      </div>
              </div>
                
           <?php
           $i++;
			 }

			 }else{
            echo'
            <div class="col-md-12">
            <center>
                <div class="alert alert-danger alert-dismissible" style="width:100%">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Not Available!</h4>
                Sorry Facts are not available.Please visit Later.
              </div></center></div>';
        }?>		       	    
			</div>
          <center><button class="btn btn-success"> <i class="fa fa-refresh"></i> Load More</button></center>
          </div>       <br><br>                
                       
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
        <script src="../plugins/notifyjs/dist/notify.min.js"></script>
        <script src="../plugins/notifications/notify-metro.js"></script>

        <!-- Page js  -->
        <script src="../assets/pages/jquery.dashboard.js"></script>
        
        <!-- Custom main Js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
         
        <script type="text/javascript">              
function like_fact(cou){
    $.ajax({
        url : "../pages/like_fact.php",
        type: "POST",
        data:"cou="+cou,
        success:function(data){
            if(data==1){
                $.Notification.autoHideNotify('success', 'bottom right', 'Success','Thank You.Liked !!!');
            }else if(data==2){
                $.Notification.autoHideNotify('error', 'bottom right', 'Error Occured',' Some Error Occured !!!');
            }else if(data==3){
                $.Notification.autoHideNotify('custom', 'bottom right', 'Already Finished','You Can give only Like or Dislike.But nice try :)');
            }else{
                $.Notification.autoHideNotify('error', 'bottom right', 'Server Error','Some Error Occured !!!');
            }
        },
        cache:false
    });
}

function dislike_fact(cou){
    $.ajax({
        url : "../pages/dislike_fact.php",
        type: "POST",
        data:"cou="+cou,
        success:function(data){
            if(data==1){
                $.Notification.autoHideNotify('success', 'bottom right', 'Success','Sorry We will try to upload best content !!!');
            }else if(data==2){
                $.Notification.autoHideNotify('error', 'bottom right', 'Error Occured',' Some Error Occured !!!');
            }else if(data==3){
                $.Notification.autoHideNotify('custom', 'bottom right', 'Already Finished','You Can give only Like or Dislike.But nice try :)');
            }else{
                $.Notification.autoHideNotify('error', 'bottom right', 'Server Error','Some Error Occured !!!');
            }
        },
        cache:false
    });
}
   
        </script>


    </body>
</html>