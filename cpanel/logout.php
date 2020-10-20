<?php
    include 'connect.php';
    include ('includes/device.php');
    session_start();
    $session=$_SESSION['ecrushstream_admin'];
    $ip=$_SERVER['REMOTE_ADDR'];
    unset($_SESSION['ecrushstream_admin']);   
    if(session_destroy())
    {
    mysqli_query($con,"INSERT INTO admin_logs (login_by,login_ip,login_os,login_browser,login_status) Values ('$session','$ip','$user_os','$user_browser','logout')");       
    }
    header("Location: index");
?>