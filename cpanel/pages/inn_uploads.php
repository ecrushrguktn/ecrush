<?php
session_start();
//error_reporting(0);
include'../../connect.php';
    $session=$_SESSION['ecrushstream_admin'];
     $dates=mysqli_real_escape_string($con,$_POST['dates']);        
   $filename = $_FILES['file']['name'];   
     $venkateshfname = $_FILES['file']['name'];
    $tmpname  = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    $ftype = $_FILES['file']['type'];
    $extension=strpbrk($_FILES['file']['name'],".");
     $vpb_file_extensions = pathinfo($filename, PATHINFO_EXTENSION); // File Extension
    $vpb_allowed_file_extensions = array("jpg","jpeg","png","gif");
    $date=date('d-m-Y');
    $time=time();
    $ip=$_SERVER['REMOTE_ADDR'];
    $fp = fopen($tmpname, 'r');
    fclose($fp);
     $fileDir = '../../E-skills/Innvoation_images/';        
    if (!in_array($vpb_file_extensions, $vpb_allowed_file_extensions)) 
    {
       echo "55";
    }
    else 
    {
      $filePath = $fileDir . $filename;
      $result = move_uploaded_file($tmpname, $filePath);
      if (!$result) {
        echo "44";
      exit;
      }else{
       $r=mysqli_query($con,"SELECT * FROM eskills_innovations where dates='$dates'"); 
       $c=mysqli_num_rows($r);       
       if($c<=0){
          $o=mysqli_query($con,"INSERT INTO eskills_innovations(innovation,dates,added_by,added_ip) VALUES('$filename','$dates','$session','$ip')");
          if($o==true){
            echo "11";
          }else{
            echo "22";
          }
      }else{
        echo "33";
      }
    }
  }
?>
	