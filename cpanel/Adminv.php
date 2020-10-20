

<script src="assets/js/jquery.js"></script>
<link href="../assets/css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<div class="container">
<h2 style="color:magenta"><center>Post Video</center></h2>
<div class="jumbotron">

<center>
	
<form action="Adminv.php" method="post" enctype="multipart/form-data">
	<center><h5 style="color:red;font-size:18px;">Please Upload Only Videos..See Uploaded Videos and Delete Extra Files. If any video has no image Please upload it</h5></center>
    <select name="category" class="form-control" style="color:#404ffa;width:50%;" required>
		<option value="">Select Category</option>
		<option value="English Learning Videos">English Learning Videos</option>
		<option value="Wonderful Study Videos">Wonderful Study Videos</option>
		<option value="Health Tips Videos">Health Tips Videos</option>
		<option value="Science and Technology Videos">Science and Technology Videos</option>
		<option value="Motivational Videos">Motivational Videos</option>
		<option value="TED show videos">TED show videos</option>
		<option value="Interview Videos">Interview Videos</option>

	</select><br>
    <b style="color:navy;font-family:arial;">Choose your Video file:</b>
    <input type="file" class="form-control" id="fup" name="upload" id="fileToUpload" minlength="1" style="width:50%;" required><br>
    <label >Video Duration</label>
    <input type="text" name="f_du" id="f_du" class="form-control" size="5" style="width:10%;"/><br>
    <audio id="audio"></audio>
    <b style="color:navy;font-family:arial;">Choose your Image file:</b>
    <input type="file" class="form-control" name="thumbimg" minlength="1" style="width:50%;" required><br>
    <input type="submit" value="Post" name="submit" class="btn btn-info" title="Post Video">
    <script>
    var f_duration=0;
    document.getElementById('audio').addEventListener('canplaythrough',function(e){
        f_duration = Math.round(e.currentTarget.duration);
        document.getElementById('f_du').value=f_duration;
        URL.revokeObjectURL(obUrl);
    });
    var obUrl;
    document.getElementById('fup').addEventListener('change',function(e){
        var file = e.currentTarget.files[0];
        if(file.name.match(/\.(avi|mp3|mp4|mpeg|ogg)$/i)){
            obUrl = URL.createObjectURL(file);
            document.getElementById('audio').setAttribute('src',obUrl);
        }
    });
    </script>
    <script>
	var uploader = document.getElementById("myuploader");
	uploader.onchange = function(){
		reader = new FileReader();
		reader.onload = function(e){
			var videoElement = document.createElement('video');
			videoElement.SRC = e.target.result;
			var timer = setInterval(function (){
				if (videoElement.readystate == 4){

					console.log("The Duration is:" + videoElement.duration.toFixed(2) + "seconds");
					clearInterval(timer);
				}
			},500)
		};
		reader.readASDataURL(files[0]);
	}
</script>
</form>
</center>
</div>
</div>

<?php
include'../connect.php';
if(isset($_POST['submit']))
{
	$vpb_file_name=($_FILES['upload']['name']);
	$vpb_file_name = mysqli_real_escape_string($con,$vpb_file_name);
	$vpb_img_name= strip_tags($_FILES['thumbimg']['name']);
	$withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $vpb_file_name); //File Name
	$vpb_file_size = $_FILES['upload']['size']; // File Size
	$vpb_allowed_file_extensions = array("mp4");
	$vpb_image_size = $_FILES['thumbimg']['size'];
	$vpb_uploaded_image_location = '../../Video/images/';
	$vpb_uploaded_files_location = '../../Video/videos/'; //This is the directory where uploaded files are saved on your server
	$vpb_final_img_location = $vpb_uploaded_image_location . $vpb_img_name;
	$vpb_final_location = $vpb_uploaded_files_location . $vpb_file_name; //Directory to save file plus the file to be saved
	//Without Validation and does not save filenames in the database
 
	if((move_uploaded_file(strip_tags($_FILES['upload']['tmp_name']), $vpb_final_location)) and (move_uploaded_file(strip_tags($_FILES['thumbimg']['tmp_name']), $vpb_final_img_location)))
	{
		//Display the file id
		$video_by=$_SESSION['s_id'];
		$date=date('d-m-Y');
		$today=date('Y-m-d');
        $ip=$_SERVER['REMOTE_ADDR'];
        $v_code=md5($withoutExt);
        $cat=($_POST['category']);
        $cat=mysqli_real_escape_string($con,$cat);
        $dur=($_POST['f_du']);
        $dur=mysqli_real_escape_string($con,$dur);
        $s=("SELECT * FROM videos where video='$vpb_file_name'");
        $search=mysqli_query($con,$s);
        //if($search!=true){
		$sql=("INSERT INTO videos (video_by,video,video_code,category,related,full_time,ip,v_image,videotime) VALUES ('$video_by','$vpb_file_name','$v_code','$cat','$withoutExt','$date','$ip','$vpb_img_name','$dur')"); 
		$k=mysqli_query($con,$sql);
		if($k==true){
	    $stu=$_SESSION['s_id'];
		$p=''.$vpb_file_name.'Video has been uploaded in '.$cat.' See it in Video Section';
		$d=mysqli_query($con,"INSERT INTO notify (notification,sent_time,send_by,category) values('$p','$today','$stu','updates')");
		echo '<p style="background-color:blue;color:white;padding:10px;width:50%;margin-left:25%;text-align:center;"> Video'.$vpb_file_name.' is Uploaded Succesfully in '.$cat.'<a href="../../home.php">Go to Home</a></p>';

	   //}else{
        // echo'<p style="background-color:green;color:white;padding:10px;width:50%;margin-left:25%;text-align:center;">'.$vpb_file_name.' is 
        // <b>Already Uploaded in '.$cat.'</b></p>';
	   //}
	}else{
	echo '<p style="background-color:red;color:white;padding:10px;width:50%;margin-left:25%;text-align:center;">Not Uploaded'.$vpb_file_name.'</p>';		
	}
}
}
?>

<div class="" style="margin-left:10%;">
	<table border="1" style="width:90%;text-align:center;">
		<thead style="background-color:teal;color:white;text-align:center !important;">
			<tr>
			<th style="text-align:center;">Videoname</th>
            <th style="text-align:center;">Category</th>
            <th style="text-align:center;">Image</th>
            <th style="text-align:center;">Uploaded_Date</th>

            <th>Action</th>
            <tr>
		</thead>
		<tbody>
		<tr>
<?php
$n=("SELECT * FROM videos order by category DESC");
$view=mysqli_query($con,$n);
while($u=mysqli_fetch_array($view,MYSQLI_BOTH))
{
	$videoname=$u['video'];
	$category=$u['category'];
	$uplddate=$u['full_time'];
	$id=$u['id'];
	$image=$u['v_image'];

?>
<?php
echo"
			<td>".$videoname."</td>
			<td>".$category."</td>
			<td>".$image."</td>
			<td>".$uplddate."</td>
			
			<td><a href='del_link.php?cat=videos&&link=".$id."'  target='_blank'class='btn btn-danger'>Delete</a><br><br></td>
		</tr>";
		?>	
<?php
}
?>
		</tbody>
	</table><br><br>
</div>
