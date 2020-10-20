<?php
include'../connect.php';
session_start();
error_reporting(0);
$student=$_SESSION['s_id'];
$m=("SELECT * FROM students where s_id='$student' and (category='admin' or  category='twister_admin') ");
$secure=mysqli_query($con,$m);
    if(mysqli_fetch_array($secure,MYSQLI_BOTH)==true){
    }
else{
   echo "<script>window.location='../../index.php'</script>";
   exit(0);
}
?>

<center><h1>Today's Tongue Twister</h1></center>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<title>Create Topic</title>
<form action="create_twister.php" method="post">
<center>  <input type="date" name="dates" placeholder="Date: YY:MM:DD (2017-07-01)" class="form-control" style="width:50%" required><br><br>
  <input type="text" name="twister" placeholder="Tongue Twister" class="form-control" style="width:50%" required><br><br>
    <input type="submit" value="submit" name="submit" class="btn btn-primary"></center>
</form>
<?php
include '../connect.php';
$sender="Admin";
if(isset($_POST['submit']))
{
	$twister=(htmlspecialchars(htmlspecialchars_decode($_POST['twister'])));
$twister=mysqli_real_escape_string($con,$twister);
$dates=(htmlspecialchars(htmlspecialchars_decode($_POST['dates'])));
$dates=mysqli_real_escape_string($con,$dates);
$ip=$_SERVER['REMOTE_ADDR'];
$s=("SELECT * FROM twisters where dates='$dates'");
$k=mysqli_query($con,$s);
if(mysqli_fetch_array($k,MYSQLI_BOTH)!=true)
{
	$f=("INSERT INTO twisters (sender,twister,dates,ip) VALUES ('$student','$twister','$dates','$ip')");
	$o=mysqli_query($con,$f);
	if($o==true)
	{
		echo "<p style='background-color:blue;color:white;text-align:center;padding:10px;'> Updated Succesfully..For ".$dates."</p>";
	}

}
else{
	echo "<p style='background-color:green;color:white;text-align:center;padding:10px;'> Already Updated For ".$dates."</p>";
}
}
?>
<div class="container" style="background-color:whitesmoke;width:90%;padding:10px;border-radius:10px;">
		<table style="width:100%" border='1'>
			<tr style="background-color:teal;color:white;text-align:center">
				<th style="text-align:center;" width="80">Topic</th>
				<th style="text-align:center;" width="10%">Date</th>
				<th style="text-align:center;" width="10%">Delete</th>
			</tr>
<?php
include'../connect.php';
$g=("SELECT * FROM twisters order by dates DESC");
$sql=mysqli_query($con,$g);
while($r=mysqli_fetch_array($sql,MYSQLI_BOTH))
{
	$date=$r['dates'];
	$twister=$r['twister'];
	$id=$r['id'];
	echo "<tr>
	<td style='text-align:center;'>".$twister."</td>
	<td style='text-align:center;'>".$date."</td>
	<td style='text-align:center;'><a href='del_link.php?cat=twister&&link=".$id."' class='btn btn-danger' target='_blank'>Delete</a><br><br></td></tr>";
}
?>
</table>
</div>
