<?php
session_start();
error_reporting(0);
include'../../connect.php';
    $session=$_SESSION['ecrushstream_admin'];
     $dates=mysqli_real_escape_string($con,$_POST['dates']);        
   $filename = $_FILES['file']['name'];   
     $venkateshfname = $_FILES['file']['name'];
     $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
    $tmpname  = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    $ftype = $_FILES['file']['type'];
    $extension=strpbrk($_FILES['file']['name'],".");
     $vpb_file_extensions = pathinfo($filename, PATHINFO_EXTENSION); // File Extension
    $vpb_allowed_file_extensions = array("pdf");
    $date=date('d-m-Y');
    $time=time();
    $ip=$_SERVER['REMOTE_ADDR'];
    $fp = fopen($tmpname, 'r');
    fclose($fp);
     $fileDir = '../../E-skills/HansIndia_news/';        
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
        $key=md5($filename);
       $r=mysqli_query($con,"SELECT * FROM newspapers where date='$dates' and type='hans'"); 
       $c=mysqli_num_rows($r);       
       if($c<=0){
    $o=mysqli_query($con,"INSERT INTO newspapers(paper,date,added_by,added_ip,encrypt_key,type) VALUES('$withoutExt','$dates','$session','$ip','$key','hans')");
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
	