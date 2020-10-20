<?php
session_start();
error_reporting(0);
include'../../connect.php';
if(isset($_POST['cou'])){
    $session=$_SESSION['ecrushstream_admin'];
    $uname=mysqli_real_escape_string($con,$_POST['cou']);                 
    $date=date("Y-m-d");
       $r=mysqli_query($con,"SELECT * FROM att_meet where att_date='$date' and username='$uname'"); 
       $c=mysqli_num_rows($r);       
       if($c<=0){
          $o=mysqli_query($con,"INSERT INTO att_meet(username,att_date,att_status,att_by) VALUES('$uname','$date','1','$session')");
          if($o==true){
            mysqli_query($con,"UPDATE admin set att=att+1 where username='$uname'");
            echo "11";
          }else{
            echo "22";
          }
      }else{
        $o=mysqli_query($con,"UPDATE att_meet set att_status='1' where username='$uname' and att_date='$date'");
          if($o==true){            
            echo "11";
          }else{
            echo "22";
          }
      }      
    }
if(isset($_POST['name'])){
    $session=$_SESSION['ecrushstream_admin'];
    $uname=mysqli_real_escape_string($con,$_POST['name']);                 
    $date=date("Y-m-d");
       $r=mysqli_query($con,"SELECT * FROM att_meet where att_date='$date' and username='$uname'"); 
       $c=mysqli_num_rows($r);       
       if($c<=0){
          $o=mysqli_query($con,"INSERT INTO att_meet(username,att_date,att_status,att_by) VALUES('$uname','$date','0','$session')");
          if($o==true){ 
                    
            echo "11";
          }else{
            echo "22";
          }
      }else{
        $o=mysqli_query($con,"UPDATE att_meet set att_status='0' where username='$uname' and att_date='$date'");        
          if($o==true){            
            echo "11";
          }else{
            echo "22";
          }
      }      
    }    
?>
	