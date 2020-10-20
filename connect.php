<?php
$con = mysqli_connect("localhost","root","amma@143","ecrush2k18");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $date=date('Y-m-d'); 
  $ip=$_SERVER['REMOTE_ADDR'];		
	$week = date('W');  
?>