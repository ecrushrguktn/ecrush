<?php
include '../connect.php';
session_start();
error_reporting(0);
$session_id=$_SESSION['ecrushstream'];
    $today=date('Y-m-d');
    $ip=$_SERVER['REMOTE_ADDR'];
    if(isset($_POST['Feedback'])){
    $feedback=strip_tags(htmlspecialchars(htmlentities($_POST['Feedback'])));
    $feedback=(mysqli_real_escape_string($con,$feedback));
    $sent_to=htmlspecialchars_decode(strip_tags(htmlspecialchars($_POST['req_person'])));
    $sent_to=mysqli_real_escape_string($con,$sent_to);
    $type=mysqli_real_escape_string($con,$_POST['type']);
    
        $m=mysqli_query($con,"INSERT INTO feedbacks (sent_by,message,type,sent_date,sent_to,sent_ip) Values ('$session_id','$feedback','$type','$today','$sent_to','$ip')");
        if($m==true){
          echo "11";
        }else{
        echo "22";
       }
   }else{
    echo'<script>alert("Don\'t Act Smart");</script>';
   }
?>
