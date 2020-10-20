<?php
session_start();
//error_reporting(0);
include'../../connect.php';
  $session=$_SESSION['ecrushstream_admin'];
  $que=mysqli_real_escape_string($con,$_POST['question']); 
  $opt1=mysqli_real_escape_string($con,$_POST['option1']); 
  $opt2=mysqli_real_escape_string($con,$_POST['option2']); 
  $opt3=mysqli_real_escape_string($con,$_POST['option3']); 
  $opt4=mysqli_real_escape_string($con,$_POST['option4']); 
  $ans=mysqli_real_escape_string($con,$_POST['answer']); 
  $dates=($_POST['dates']);
  $dates=mysqli_real_escape_string($con,$dates); 
  $date=date('Y-m-d');          
       $r=mysqli_query($con,"SELECT * FROM gk_questions where added_for='$dates'"); 
       $c=mysqli_num_rows($r);       
       if($c<=0){
          $o=mysqli_query($con,"INSERT INTO gk_questions(question,option1,option2,option3,option4,answer,added_by,added_ip,added_date,added_for,visibility) VALUES('$que','$opt1','$opt2','$opt3','$opt4','$ans','$session','$ip','$date','$dates','1')");
          if($o==true){
            echo "11";
          }else{
            echo "22";
          }
      }else{
        echo "33";
      }      
?>
	