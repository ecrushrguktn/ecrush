<?php
session_start();
error_reporting(0);
include'../../connect.php';
    $session=$_SESSION['ecrushstream_admin'];
 $word=($_POST['word']);
  $word=mysqli_real_escape_string($con,$word);
  $meaning=($_POST['meaning']);
  $meaning=mysqli_real_escape_string($con,$meaning);
  $usage=($_POST['example']);
  $usage=mysqli_real_escape_string($con,$usage);
  $dates=($_POST['dates']);
  $dates=mysqli_real_escape_string($con,$dates); 
          
       $r=mysqli_query($con,"SELECT * FROM eskills_idioms where dates='$dates'"); 
       $c=mysqli_num_rows($r);       
       if($c<=0){
          $o=mysqli_query($con,"INSERT INTO eskills_idioms(word,meaning,dates,example,added_by,added_ip) VALUES('$word','$meaning','$dates','$usage','$session','$ip')");
          if($o==true){
            echo "11";
          }else{
            echo "22";
          }
      }else{
        echo "33";
      }      
?>
	