<?php
	session_start();
	require_once '../dbconfig.php';
				include'../connect.php';
				$ip=$_SERVER['REMOTE_ADDR'];		
				include ('../includes/device.php');	
	if(isset($_POST['btn-login']))
	{
		//$user_name = $_POST['user_name'];
		$user_idno = trim(($_POST['user_idno']));
		$user_password = trim($_POST['password']);
		$password = $user_password;
		$encrypt=md5($password);
		try
		{			
			$stmt = $db_con->prepare("SELECT * FROM admin WHERE username=:idno");
			$stmt->execute(array(":idno"=>$user_idno));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();	
			$status=$row['status'];
			if($count>0){
			if($status==0){
				echo'1';
				mysqli_query($con,"INSERT INTO admin_logs (login_by,login_ip,login_os,login_browser,login_status) Values ('$user_idno','$ip','$user_os','$user_browser','Inactive')");			
				
			}else if($status==2){
				echo'2';
				mysqli_query($con,"INSERT INTO admin_logs (login_by,login_ip,login_os,login_browser,login_status) Values ('$user_idno','$ip','$user_os','$user_browser','Blocked')");			
				

			}else{
				if($row['password']==$encrypt){
				echo "3"; // log in				
				$_SESSION['ecrushstream_admin'] = $row['username'];	
				    $date=date('Y-m-d');							
				mysqli_query($con,"INSERT INTO admin_logs (login_by,login_ip,login_os,login_browser,login_status) Values ('$user_idno','$ip','$user_os','$user_browser','login')");					
					}
					else{
				mysqli_query($con,"INSERT INTO admin_logs (login_by,login_ip,login_os,login_browser,login_status) Values ('$user_idno','$ip','$user_os','$user_browser','Failed')");				
					echo "6"; // wrong details 
					}
			}
			}else{
				mysqli_query($con,"INSERT INTO admin_logs (login_by,login_ip,login_os,login_browser,login_status) Values ('$user_idno','$ip','$user_os','$user_browser','Not Available')");			
						echo "5"; // wrong details 

			}	
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>
