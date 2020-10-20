<?php
    include 'connect.php';
    include ('includes/device.php');
    session_start();
    $session=$_SESSION['ecrushstream'];
    $ip=$_SERVER['REMOTE_ADDR'];
    unset($_SESSION['ecrushstream']);   
    if(session_destroy())
    {
    mysqli_query($con,"INSERT INTO user_logs (login_by,login_ip,login_os,login_browser,login_status) Values ('$session','$ip','$user_os','$user_browser','logout')");       
    }
    header("Location: index");
?>