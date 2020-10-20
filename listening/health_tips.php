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
$visits=mysqli_query($con,"SELECT * FROM page_logs where dates='$today' and stuid='$stuid' and page='Health tips'");
$cm=mysqli_num_rows($visits);
  if($cm<=0){
mysqli_query($con,"INSERT INTO page_logs(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','Health tips','Listening','$stuid')");
mysqli_query($con,"INSERT INTO page_logs_log(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','Health tips','Listening','$stuid')");
   }else{
mysqli_query($con,"UPDATE page_logs SET no_of_times=no_of_times+1 where dates='$today' and page='Health tips' and stuid='$stuid'");
mysqli_query($con,"INSERT INTO page_logs_log(ip,enter_time,no_of_times,dates,page,hub,stuid) VALUES('$ip','$dat','1','$today','Health tips','Listening','$stuid')");        
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
        <title>Listening || E-Crush</title>        
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="../assets/js/modernizr.min.js"></script>            
        <link href="../assets/css/video_style.css" rel="stylesheet" type="text/css">
        <style type="text/css">     
       #video{
    width:100%; 
    height:500px;
    margin-top:2%;
    background-color:black;
    box-shadow:10px 10px 10px 10px silver;               
  }
  #vid{  
    width:100%;
    height:500px;        
    background-color:black;             
  }
     </style>


<!-- Script For Likes & Dislikes -->

<script type="text/javascript">
function cwRating(id,type,target){
  $.ajax({
    type:'POST',
    url:'rating.php',
    data:'id='+id+'&type='+type,
    success:function(msg){
      if(msg == 'err'){
        alert('Some problem occured, please try again.');
      }else{
        $('#'+target).html(msg);
      }
    }
  });
}
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

<?php
$m=mysqli_query($con,"SELECT * FROM students Where stu_id='$session_id'");
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
                                  <h4 class="page-title">Health Tips Videos</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                            <div id="video">

<?php
$session=$_SESSION['ecrushstream'];
$dates=date('d-m-Y');
$mk=("SELECT * FROM videos where visibility='1' and category='Health Tips Videos' order by id DESC");
    $sk=mysqli_query($con,$mk);
    while($ro=mysqli_fetch_array($sk,MYSQLI_BOTH))
    {
      $videoname=$ro['related'];
      $views=$ro['views'];
      $views=$views+1;
      $id=$ro['id'];
    }
    $up=("UPDATE videos SET views='$views' where id='$id'");
    mysqli_query($con,$up);
    ?>
 		 <?php echo '<a href="videos/'.$videoname.'.mp4" download="'.$videoname.'.mp4" style="display:none" id="downll"></a>';?>
		<center>
  			<?php echo '<video src="videos/'.$videoname.'.mp4" controls preload="auto"  type="video/mp4" id="vid" download></video>';?>
		</center>
						</div>

<?php
include_once("tutorial.php");
$tutorial = new Tutorial();
$trows = $tutorial->get_rows();
?>
<!-- Recently Uploaded Videos Code Begins -->      

<br><hr><center><h3>Recently Uploaded Videos</h3></center><hr>

<div class="row">
<?php
  $i=0;
  $today=date('Y-m-d');
  $q=("SELECT * FROM videos where visibility='1' and  category='Health Tips Videos' ORDER BY id DESC LIMIT 3");
  $sq=mysqli_query($con,$q);
  if($i%2==0){ $color='pink'; }else if($i%3==0){ $color='purple'; }else{ $color='primary';}
  while($v=mysqli_fetch_array($sq,MYSQLI_BOTH))
  {
    $video=$v['video'];
    $videoby=$v['video_by'];
    $videoname=$v['related'];
    $videocode=$v['video_code'];
    $views=$v['views'];
    $dates=$v['full_time'];
    $today=date('d-m-Y');
    $id=$v['id'];
    $image=$v['v_image'];
    $v_time=$v['videotime'];
     
  
      echo' <div class="col-md-4 resent-grid recommended-grid slider-top-grids">
                   <div class="resent-grid-img recommended-grid-img">
                  <a  href="#" class="m1" onclick="load_video(\'play.php?v='.$videocode.'\')" title="'.$videoname.'">';
   ?>
     <?php
    if($image!=""){ echo '<img src="images/'.$image.'" style="width:355px;height:250px;">'; }
    else {echo '<img src="images/home.png" style="width:355px;height:250px;">';}
    ?>
              </a>
           <?php
include_once("tutorial.php");
$tutorial = new Tutorial();
$trows = $tutorial->get_rows();
?>        
           <div class="time"></div>
              <div class="clck" style="font-weight:400;">
                <span class="badge badge-<?php echo $color ?>">
                <i class="fa fa-history" aria-hidden="true"></i>
                <?php if($v_time=="") { echo "00:00:00";} else  { $c=gmdate("H:i:s",$v_time); echo $c; } ?>
                 </span>
              </div>
   			</div>
   			<!-- Video Information -->                    

            <div class="resent-grid-info recommended-grid-info">
              <h3><a href="#" onclick="ru1()" class="title title-info" style="text-transform: capitalize;"><?php echo $videoname ?></a>
              <?php if($today==$dates) { echo '<span class="badge badge-primary">New</span>'; } ?></h3>
              <ul style="cursor: pointer;">
		            <li><p class="author author-info">
                  <?php 
                  $k=mysqli_query($con,"SELECT * FROM video_likes where liked_by='$session' AND liked_video='$videoname'");
                  $c=mysqli_num_rows($k);
                  while($r=mysqli_fetch_array($k,MYSQLI_BOTH)){
                    $type=$r['type'];
                  }
                  if($type=='Liked'){
                  $code='<span class="counter fa fa-thumbs-o-up" style="color:blue !important;">&nbsp;&nbsp;'.$v["like_num"].'&nbsp;&nbsp;&nbsp;</span><span class="fa fa-thumbs-o-down">&nbsp;&nbsp;'.$v["dislike_num"].'&nbsp;&nbsp;&nbsp;</span>';
                  }elseif ($type=='Disliked') {
                    $code='<span class="counter fa fa-thumbs-o-up">&nbsp;&nbsp;'.$v["like_num"].'&nbsp;&nbsp;&nbsp;</span><span class="fa fa-thumbs-o-down" style="color:blue !important;">&nbsp;&nbsp;'.$v["dislike_num"].'&nbsp;&nbsp;&nbsp;</span>';
                  }
                  if($c>0){
                    echo $code;
                  }else{
                  ?>
                                   <!-- Like Icon HTML -->
                    <span class="fa fa-thumbs-o-up" onClick="cwRating(<?php echo $v['id']; ?>,1,'like_count<?php echo $v['id']; ?>')"></span>&nbsp;
                    <!-- Like Counter -->
                    <span class="counter" id="like_count<?php echo $v['id']; ?>"><?php echo $v['like_num']; ?></span>&nbsp;&nbsp;&nbsp;
                    
                    <!-- Dislike Icon HTML -->
                    <span class="fa fa-thumbs-o-down" onClick="cwRating(<?php echo $v['id']; ?>,0,'dislike_count<?php echo $v['id']; ?>')"></span>&nbsp;
                    <!-- Dislike Counter -->
                    <span class="counter" id="dislike_count<?php echo $v['id']; ?>"><?php echo $v['dislike_num']; ?></span>&nbsp;&nbsp;&nbsp;
                    <?php
                     }
                    echo'<a href="videos/'.$video.'" download="'.$videoname.'@E-Crush.mp4" id="downll">';?>
                    <span class="fa fa-download" onClick="cwRating(<?php echo $v['id']; ?>,2,'downloads<?php echo $v['id']; ?>')"></span></a>&nbsp;
                    
                    <span class="counter" id="downloads<?php echo $v['id']; ?>"><?php echo $v['downloads']; ?></span>

                <li class="right-list"><p class="views views-info" "><i class="fa fa-eye fa-lg"> </i>&nbsp;&nbsp;<?php echo $views ?> views</p></li>
                </p>
              </ul>
            </div>
          </div>
          
  <?php 
  $i++; 
	}
   ?>  

        </div> 

   

   <!-- English Learning Videos Code Begins -->      

<br><hr><center><h3>English Learning Videos</h3></center><hr>

<div class="row">
<?php
  $i=0;
  $today=date('Y-m-d');
  $q=("SELECT * FROM videos where visibility='1' and  category='Health Tips Videos' ORDER BY id");
  $sq=mysqli_query($con,$q);
  if($i%2==0){ $color='pink'; }else if($i%3==0){ $color='purple'; }else{ $color='primary';}
  while($v=mysqli_fetch_array($sq,MYSQLI_BOTH))
  {
    $video=$v['video'];
    $videoby=$v['video_by'];
    $videoname=$v['related'];
    $videocode=$v['video_code'];
    $views=$v['views'];
    $dates=$v['full_time'];
    $today=date('d-m-Y');
    $id=$v['id'];
    $image=$v['v_image'];
    $v_time=$v['videotime'];
     
  
      echo' <div class="col-md-4 resent-grid recommended-grid slider-top-grids">
                   <div class="resent-grid-img recommended-grid-img">
                  <a  href="#" class="m1" onclick="load_video(\'play.php?v='.$videocode.'\')" title="'.$videoname.'">';
   ?>
     <?php
    if($image!=""){ echo '<img src="images/'.$image.'" style="width:355px;height:250px;">'; }
    else {echo '<img src="images/home.png" style="width:355px;height:250px;">';}
    ?>
              </a>
           <?php
include_once("tutorial.php");
$tutorial = new Tutorial();
$trows = $tutorial->get_rows();
?>        
           <div class="time"></div>
              <div class="clck" style="font-weight:400;">
                <span class="badge badge-<?php echo $color ?>">
                <i class="fa fa-history" aria-hidden="true"></i>
                <?php if($v_time=="") { echo "00:00:00";} else  { $c=gmdate("H:i:s",$v_time); echo $c; } ?>
                 </span>
              </div>
   			</div>
   			<!-- Video Information -->                    

            <div class="resent-grid-info recommended-grid-info">
              <h3><a href="#" onclick="ru1()" class="title title-info" style="text-transform: capitalize;"><?php echo $videoname ?></a>
              <?php if($today==$dates) { echo '<span class="badge badge-primary">New</span>'; } ?></h3>
              <ul style="cursor: pointer;">
		            <li><p class="author author-info">
                  <?php 
                  $k=mysqli_query($con,"SELECT * FROM video_likes where liked_by='$session' AND liked_video='$videoname'");
                  $c=mysqli_num_rows($k);
                  while($r=mysqli_fetch_array($k,MYSQLI_BOTH)){
                    $type=$r['type'];
                  }
                  if($type=='Liked'){
                  $code='<span class="counter fa fa-thumbs-o-up" style="color:blue !important;">&nbsp;&nbsp;'.$v["like_num"].'&nbsp;&nbsp;&nbsp;</span><span class="fa fa-thumbs-o-down">&nbsp;&nbsp;'.$v["dislike_num"].'&nbsp;&nbsp;&nbsp;</span>';
                  }elseif ($type=='Disliked') {
                    $code='<span class="counter fa fa-thumbs-o-up">&nbsp;&nbsp;'.$v["like_num"].'&nbsp;&nbsp;&nbsp;</span><span class="fa fa-thumbs-o-down" style="color:blue !important;">&nbsp;&nbsp;'.$v["dislike_num"].'&nbsp;&nbsp;&nbsp;</span>';
                  }
                  if($c>0){
                    echo $code;
                  }else{
                  ?>
                                   <!-- Like Icon HTML -->
                    <span class="fa fa-thumbs-o-up" onClick="cwRating(<?php echo $v['id']; ?>,1,'like_count<?php echo $v['id']; ?>')"></span>&nbsp;
                    <!-- Like Counter -->
                    <span class="counter" id="like_count<?php echo $v['id']; ?>"><?php echo $v['like_num']; ?></span>&nbsp;&nbsp;&nbsp;
                    
                    <!-- Dislike Icon HTML -->
                    <span class="fa fa-thumbs-o-down" onClick="cwRating(<?php echo $v['id']; ?>,0,'dislike_count<?php echo $v['id']; ?>')"></span>&nbsp;
                    <!-- Dislike Counter -->
                    <span class="counter" id="dislike_count<?php echo $v['id']; ?>"><?php echo $v['dislike_num']; ?></span>&nbsp;&nbsp;&nbsp;
                    <?php
                     }
                    echo'<a href="videos/'.$video.'" download="'.$videoname.'@E-Crush.mp4" id="downll">';?>
                    <span class="fa fa-download" onClick="cwRating(<?php echo $v['id']; ?>,2,'downloads<?php echo $v['id']; ?>')"></span></a>&nbsp;
                    
                    <span class="counter" id="downloads<?php echo $v['id']; ?>"><?php echo $v['downloads']; ?></span>

                <li class="right-list"><p class="views views-info" "><i class="fa fa-eye fa-lg"> </i>&nbsp;&nbsp;<?php echo $views ?> views</p></li>
                </p>
              </ul>
            </div>
          </div>
          
  <?php 
  $i++; 
	}
   ?>  

        </div> 


                    </div>
                    <!-- end container -->
                </div>
                <br><br>
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
    

        <!-- Page js  -->
        <script src="../assets/pages/jquery.dashboard.js"></script>
        
        <!-- Custom main Js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>
        <script type="text/javascript">
        	 function load_video(pageloc,pageid){  
    $("html, body").animate({ scrollTop: 0 }, 1000);      
       $('#vid').load(pageloc);
}

        </script>
    </body>
</html>