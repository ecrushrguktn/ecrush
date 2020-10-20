<?php
	session_start();
	require_once 'dbconfig.php';
				include'connect.php';
				$ip=$_SERVER['REMOTE_ADDR'];		
				include ('includes/device.php');	
	if(isset($_POST['btn-login']))
	{
		//$user_name = $_POST['user_name'];
		$user_idno = trim(strtoupper($_POST['user_idno']));
		$user_password = trim($_POST['password']);
		$password = $user_password;
		$encrypt=md5($password);
		try
		{			
			$stmt = $db_con->prepare("SELECT * FROM users WHERE stu_id=:idno");
			$stmt->execute(array(":idno"=>$user_idno));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();	
			$status=$row['status'];
			if($count>0){
			if($status==0){
				echo'1';
				mysqli_query($con,"INSERT INTO user_logs (login_by,login_ip,login_os,login_browser,login_status) Values ('$user_idno','$ip','$user_os','$user_browser','Inactive')");			
				
			}else if($status==2){
				echo'2';
				mysqli_query($con,"INSERT INTO user_logs (login_by,login_ip,login_os,login_browser,login_status) Values ('$user_idno','$ip','$user_os','$user_browser','Blocked')");			
				

			}else{
				if($row['stu_passwd']==$encrypt){
				echo "3"; // log in				
				$_SESSION['ecrushstream'] = $row['stu_id'];	
				    $date=date('Y-m-d');
    
/*$sql="CREATE TABLE IF NOT EXISTS `leaderboard_daily_".$date."` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(7) NOT NULL,
  `name` varchar(200) NOT NULL,
  `class` varchar(10) NOT NULL,
  `points` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
mysqli_query($con,$sql);*/
					$ha=mysqli_query($con,"SELECT * FROM students where stu_id='$user_idno'");
						while($kk=mysqli_fetch_array($ha,MYSQLI_BOTH)) {
							$profile=$kk['stu_pic'];
							if($profile==''){
								$profile='logo.png';
							}else{
								$profile=$kk['stu_pic'];
							}
							
							$name=$kk['stu_name'];
							$class=$kk['stu_class'];
					}

					$week = date('W');
					$reason='Logined into website succesfully';
					$cha=mysqli_query($con,"SELECT * FROM leaderboard where username='$user_idno' and date='$date'");
					$cm=mysqli_num_rows($cha);
						if($cm<1){
							 /*$hh=mysqli_query($con,"SELECT * FROM leaderboard_logs  where reason='$reason' and date='$date' and username='$s'");  
        						$ma=mysqli_num_rows($hh);  */
        					
							$b=mysqli_query($con,"INSERT INTO leaderboard (username,name,class,points,date,profile_img,week) VALUES ('$user_idno','$name','$class','1','$date','$profile','$week') ");
								mysqli_query($con,"INSERT INTO leaderboard_weekly (username,name,class,points,date,profile_img,week) VALUES ('$user_idno','$name','$class','1','$date','$profile','$week') ");		
	   							if($b==true){
		     				mysqli_query($con,"INSERT INTO leaderboard_logs (username,name,class,points,date,hub,reason,status,profile_img) VALUES ('$user_idno','$name','$class','1','$date','Logined','$reason','Success','$profile') ");
	    						}else{
							mysqli_query($con,"INSERT INTO leaderboard_logs (username,name,class,points,date,hub,reason,status,profile_img) VALUES ('$user_idno','$name','$class','1','$date','Logined','$reason','Failed','$profile') ");
	    						}
	 						}
							
				mysqli_query($con,"INSERT INTO user_logs (login_by,login_ip,login_os,login_browser,login_status) Values ('$user_idno','$ip','$user_os','$user_browser','login')");	
				/*mysqli_query($con,"INSERT INTO activity_logs (username,name,class,date,hub,reason,status,profile_img) VALUES ('$user_idno','$name','$class','$date','Logined','$reason','Success','$profile') ");									*/	
					}
					else{
				mysqli_query($con,"INSERT INTO user_logs (login_by,login_ip,login_os,login_browser,login_status) Values ('$user_idno','$ip','$user_os','$user_browser','Failed')");				
						echo '4'; // wrong details 
					}
			}
			}else{
				mysqli_query($con,"INSERT INTO user_logs (login_by,login_ip,login_os,login_browser,login_status) Values ('$user_idno','$ip','$user_os','$user_browser','Not Available')");			
						echo "5"; // wrong details 

			}	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>
