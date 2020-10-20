<?php
session_start();
//error_reporting(0);
include'../../connect.php';
  $session=$_SESSION['ecrushstream_admin'];
  $cat=mysqli_real_escape_string($con,$_POST['category']);
  $du=mysqli_real_escape_string($con,$_POST['f_du']);              
  $vpb_file_name=($_FILES['file']['name']);
  $vpb_file_name = mysqli_real_escape_string($con,$vpb_file_name);
  $vpb_img_name= strip_tags($_FILES['thumbimg']['name']);
  $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $vpb_file_name); //File Name
  $vpb_file_extensions = pathinfo($vpb_file_name, PATHINFO_EXTENSION);
  $vpb_file_extensions_img = pathinfo($vpb_img_name, PATHINFO_EXTENSION);
  $vpb_file_size = $_FILES['file']['size']; // File Size
  $vpb_allowed_file_extensions = array("mp4");
  $vpb_image_size = $_FILES['thumbimg']['size'];
  $vpb_uploaded_image_location = '../../listening/images/';
  $vpb_uploaded_files_location = '../../listening/videos/'; //This is the directory where uploaded files are saved on your server
  $vpb_final_img_location = $vpb_uploaded_image_location . $vpb_img_name;
  $vpb_final_location = $vpb_uploaded_files_location . $vpb_file_name;

    if (!in_array($vpb_file_extensions, $vpb_allowed_file_extensions)) 
    {
       echo "55";
    }
    else 
    {
     if(!(move_uploaded_file(strip_tags($_FILES['file']['tmp_name']), $vpb_final_location)) and (move_uploaded_file(strip_tags($_FILES['thumbimg']['tmp_name']), $vpb_final_img_location)))
    {     
        echo "44";
      exit;
      }else{
        $date=date('m-d-Y');
        $v_code=md5($withoutExt);
       $r=mysqli_query($con,"SELECT * FROM videos where video='$vpb_file_name'"); 
       $c=mysqli_num_rows($r);       
       if($c<=0){
          $o=mysqli_query($con,"INSERT INTO videos(video_by,video,video_code,category,related,full_time,ip,v_image,videotime) VALUES
            ('$session','$vpb_file_name','$v_code','$cat','$withoutExt','$date','$ip','$vpb_img_name','$du')");
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
	