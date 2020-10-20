<?php
include '../connect.php';
session_start();
error_reporting(0);
$s=$_SESSION['ecrushstream'];
    $today=date('Y-m-d');
    $ip=$_SERVER['REMOTE_ADDR'];
    $m=mysqli_query($con,"SELECT * FROM users Where stu_id='$s'");
    while($r=mysqli_fetch_array($m,MYSQLI_BOTH)){
      $old_p = $r['stu_password'];
    }
    $ha=mysqli_query($con,"SELECT * FROM students where stu_id='$s'");
            while($kk=mysqli_fetch_array($ha,MYSQLI_BOTH)) {
              $Birthday=$kk['stu_pic'];
              $name=$kk['stu_name'];
              $class=$kk['stu_class'];
          }
    $week = date('W');
    
 if((isset($_POST['wish']))){
    $wish=mysqli_real_escape_string($con,$_POST['wish']);    
    $birth=date('m/d');
    $o=mysqli_query($con,"SELECT * FROM birthday_wishes where wished_by='$s' and birthdate='$birth'");
    $cr=mysqli_num_rows($o);
    if($cr>=1){
      echo "33";
    }else{
    $m=mysqli_query($con,"INSERT INTO birthday_wishes (wished_by,wished_ip,wishes,birthdate) VALUES ('$s','$ip','$wish','$birth')");
              if($m==true){
                $reason="Wished the birthday persons";   
$cha=mysqli_query($con,"SELECT * FROM leaderboard where username='$s' and date='$date'");
    $cm=mysqli_num_rows($cha);
      if($cm>0){
        $b=mysqli_query($con,"UPDATE leaderboard set points=points+2 where username='$s' and date='$date'");  
        mysqli_query($con,"UPDATE leaderboard_weekly set points=points+2 where username='$s' and week='$week'");                
        if($b==true){
            mysqli_query($con,"INSERT INTO leaderboard_logs (username,name,class,points,date,hub,reason,status,week) VALUES ('$s','$name','$class','1','$date','Birthday','$reason','Success','$week') ");
          }else{
            mysqli_query($con,"INSERT INTO leaderboard_logs (username,name,class,points,date,hub,reason,status) VALUES ('$s','$name','$class','1','$date','Birthday','$reason','Failed','$week') ");
            }
      }else{
        $b=mysqli_query($con,"INSERT INTO leaderboard (username,name,class,points,date,week) VALUES ('$s','$name','$class','1','$date','$week') ");
        if($b==true){
          mysqli_query($con,"INSERT INTO leaderboard_logs (username,name,class,points,date,hub,reason,status,week) VALUES ('$s','$name','$class','1','$date','Birthday','$reason','Success','$week') ");  
        }else{
          mysqli_query($con,"INSERT INTO leaderboard_logs (username,name,class,points,date,hub,reason,status,week) VALUES ('$s','$name','$class','1','$date','Birthday','$reason','Failed','$week') ");
          }
      }
                    echo "11";
              }else{
                    echo "22";
              }
            }

}else{
    echo'<script>alert("Don\'t Act Smart");</script>';
  }
    
?>
