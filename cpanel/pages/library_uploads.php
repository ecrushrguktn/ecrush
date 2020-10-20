<?php
session_start();
error_reporting(0);
include'../../connect.php';
    $session=$_SESSION['ecrushstream_admin'];
     $cat=mysqli_real_escape_string($con,$_POST['category']);        
     $sc=mysqli_real_escape_string($con,$_POST['s_category']);        
   $filename = $_FILES['file']['name'];   
     $venkateshfname = $_FILES['file']['name'];
     $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
    $tmpname  = $_FILES['file']['tmp_name'];
    $filesize = $_FILES['file']['size'];
    $ftype = $_FILES['file']['type'];
    $extension=strpbrk($_FILES['file']['name'],".");
     $vpb_file_extensions = pathinfo($filename, PATHINFO_EXTENSION); // File Extension
    $vpb_allowed_file_extensions = array("pdf","ppt","docx");
    $date=date('d-m-Y');
    $time=time();
    $ip=$_SERVER['REMOTE_ADDR'];
    $fp = fopen($tmpname, 'r');
    fclose($fp);
     $fileDir = '../../E-library/'.$cat.'/'.$sc.'/';        
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
       $r=mysqli_query($con,"SELECT * FROM e_library where file_name='$withoutExt'"); 
       $c=mysqli_num_rows($r);       
       if($c<=0){
          $o=mysqli_query($con,"INSERT INTO e_library(file_name,file_type,extension,file_size,category,sub_category,upload_by,upload_ip,visibility) VALUES
            ('$withoutExt','$ftype','$extension','$filesize','$cat','$sc','$session','$ip','1')");
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
	