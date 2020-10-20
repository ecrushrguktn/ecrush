<?php
session_start();
error_reporting(0);
$s=$_SESSION['ecrushstream'];
include"../connect.php";
if(isset($_POST['cou'])){
		$ha=mysqli_query($con,"SELECT * FROM students where stu_id='$s'");
						while($kk=mysqli_fetch_array($ha,MYSQLI_BOTH)) {
							$profile=$kk['stu_pic'];
							$name=$kk['stu_name'];
							$class=$kk['stu_class'];
					}
					$week = date('W');
	$nid=(trim(strip_tags($_POST['cou'])));		
	$reason="Disliked the Fact (".$nid.")";	
	$c=mysqli_query($con,"SELECT * FROM eskills_inn_likes_logs where given_id='$nid' and given_by='$s' ");
	$m=mysqli_num_rows($c);
	if($m>0){
		mysqli_query($con,"INSERT INTO eskills_inn_likes_logs (type,given_id,given_by,given_ip,status) values ('dislike','$nid','$s','$ip','already')");
		echo "3";
	}else{
	$r=mysqli_query($con,"UPDATE eskills_innovations SET dislikes=dislikes+1 WHERE id='$nid'");	
	if($r==true){
		$cha=mysqli_query($con,"SELECT * FROM leaderboard where username='$s' and date='$date'");
		$cm=mysqli_num_rows($cha);
			if($cm>0){				
				$b=mysqli_query($con,"UPDATE leaderboard set points=points+1 where username='$s' and date='$date'");		
					mysqli_query($con,"UPDATE leaderboard_weekly set points=points+1 where username='$s' and week='$week'");		
				if($b==true){
						mysqli_query($con,"INSERT INTO leaderboard_logs (username,name,class,points,date,hub,reason,status,week) VALUES ('$s','$name','$class','1','$date','E-Skills','$reason','Success','$week') ");
					}else{
						mysqli_query($con,"INSERT INTO leaderboard_logs (username,name,class,points,date,hub,reason,status) VALUES ('$s','$name','$class','1','$date','E-Skills','$reason','Failed','$week') ");
						}
			}else{
				$b=mysqli_query($con,"INSERT INTO leaderboard (username,name,class,points,date,week) VALUES ('$s','$name','$class','1','$date','$week') ");
				if($b==true){
					mysqli_query($con,"INSERT INTO leaderboard_logs (username,name,class,points,date,hub,reason,status,week) VALUES ('$s','$name','$class','1','$date','E-Skills','$reason','Success','$week') ");	
				}else{
					mysqli_query($con,"INSERT INTO leaderboard_logs (username,name,class,points,date,hub,reason,status,week) VALUES ('$s','$name','$class','1','$date','E-Skills','$reason','Failed','$week') ");
					}
			}

		mysqli_query($con,"INSERT INTO eskills_inn_likes_logs (type,given_id,given_by,given_ip,status) values ('dislike','$nid','$s','$ip','success')");
		echo "1";
	}else{
		mysqli_query($con,"INSERT INTO eskills_inn_likes_logs (type,given_id,given_by,given_ip,status) values ('dislike','$nid','$s','$ip','fail')");
		echo "2";
		}
	}
}else{
	echo "<h1><center>Nice Try : ) Don't Act Smart !!!</center></h1>";
}
?> 
