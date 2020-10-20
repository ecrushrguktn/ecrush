<?php
include'../connect.php';
session_start();
error_reporting(0);
$student=$_SESSION['s_id'];
$m=("SELECT * FROM students where s_id='$student' and (category='admin' or category='material_admin') ");
$secure=mysqli_query($con,$m);
    if(mysqli_fetch_array($secure,MYSQLI_BOTH)==true){
    }
else{
   echo "<script>window.location='../../index.php'</script>";
   exit(0);
}

?>
<center><h1>Post Material</h1></center>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<title>Post Material</title>
<form action="create_file.php" method="POST" enctype="multipart/form-data">
<center>
  Choose file: <input type="file" name="upload" class="form-control" style="width:50%" required><br><br>
  <select name="filet" class="form-control" style="width:50%;">
  	<option>Select File Type</option>
  	<option value="pdf">PDF</option>
  	<option value="mp4">MP4</option>
  	<option value="doc">DOC</option>
  </select><br>
  <select name="category" class="form-control" style="width:50%;">
  	<option>Select Category</option>
  	<option value="Reading">Reading</option>
    <option value="Writing">Writing</option>
  	<option value="Grammar">Grammar</option>
  	<option value="Dictionaries">Dictionaries</option>
  	<option value="Placements">Placements</option>
  </select><br>
  <select name="sub_category" class="form-control" style="width:50%;">
    <option value="">Select Sub Category</option>
    <option style="background-color:black;color:yellow">Reading Sub Categories</option>
    <option value="Biographies">Biographies</option>
    <option value="Autobiographs">Autobiographies</option>
    <option value="Novels">Novels</option>
    <option value="Stories">Stories</option>
    <option value="EnglishLearningTips">English Learning Tips</option>
    <option style="background-color:black;color:yellow">Writing Sub Categories</option>
    <option value="CV">CV</option>
    <option value="Letter">Letter Writing</option>
    <option value="Paragraph">Paragraph Writing</option>
    <option style="background-color:black;color:yellow">Dictionaries Sub Categories</option>
    <option value="">Dictionaries</option>
    <option style="background-color:black;color:yellow">Placements Stuff Sub Categories</option>
    <option value="Aptitude">Aptitude</option>
    <option value="GD">Group Discussion</option>
    <option value="Interview">Interview Tips</option>
    <option style="background-color:black;color:yellow">Grammar Sub Categories</option>
    <option value="Articles">Articles</option>
    <option value="Adverbs">Adverbs</option>
    <option value="Degrees Of Comparison">Degrees Of Comparison</option>
    <option value="Exercises">Exercises</option>
    <option value="If Conditionals">If Conditionals</option>
    <option value="Parts Of Speech">Parts Of Speech</option>
    <option value="Punctuations">Punctuations</option>
    <option value="QuestionTags">QuestionTags</option>
    <option value="Speech">Speech</option>
    <option value="Tenses">Tenses</option>
    <option value="Voices">Voices</option>
  </select><br>
    <input type="submit" name="submit" value="submit" class="btn btn-primary"></center>
</form>
<title>Post Video</title>
<?php
include '../connect.php';
if(isset($_POST['submit']))
{
  $s_id="Admin";
  $cat=(htmlspecialchars(htmlspecialchars_decode(stripcslashes($_POST['filet']))));
  $cat=mysqli_real_escape_string($con,$cat);
  $category=(htmlspecialchars(htmlspecialchars_decode(stripcslashes($_POST['category']))));
  $category=mysqli_real_escape_string($con,$category);
  $sub_category=(htmlspecialchars(htmlspecialchars_decode(stripcslashes($_POST['sub_category']))));
  $sub_category=mysqli_real_escape_string($con,$sub_category);
  $sd=$_SESSION['s_id'];
//video file uploading...
  $filename=($_FILES['upload']['name']);
     $filename = mysqli_real_escape_string($con,$filename);
     $venkateshfname = $_FILES['upload']['name'];
     $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
    $tmpname  = $_FILES['upload']['tmp_name'];
    $filesize = $_FILES['upload']['size'];
    $ftype = $_FILES['upload']['type'];
    $extension=strpbrk($_FILES['upload']['name'],".");
     $vpb_file_extensions = pathinfo($filename, PATHINFO_EXTENSION); // File Extension
    $vpb_allowed_file_extensions = array("pdf","mp4","docx","xlss","odt");
    $date=date('Y-m-d');
    $time=time();
    $ip=$_SERVER['REMOTE_ADDR'];
    $venkateshfname=($filename);
    $venkateshfname=mysqli_real_escape_string($con,$venkateshfname);
    $fp = fopen($tmpname, 'r');
    fclose($fp);
    if($sub_category=="")
    {
    $uploadDir = '../../Books/'.$category.'/';
    }
    else{
    $uploadDir = '../../Books/'.$category.'/'.$sub_category.'/';
    }
        
          if (!in_array($vpb_file_extensions, $vpb_allowed_file_extensions)) 
    {
        //Display file type error error
        echo "<p style='background-color:red;color:white;padding:10px;text-align:center;'>only mp4,doc,pdf are allowed</p>";
    }
    else 
    {
            $filePath = $uploadDir . $venkateshfname;
$result = move_uploaded_file($tmpname, $filePath);
if (!$result) {
echo "<p style='background-color:red;color:white;padding:10px;text-align:center;'>Error Uploading </p";
exit;
}
else{
          $aa=("INSERT INTO material(send_by,material,filetype,ip,dates,category,sub_category) values('$student','$venkateshfname','$cat','$ip','$date','$category','$sub_category')");
          $aaa=mysqli_query($con,$aa);
 if($aaa==true)
 {
 echo "<p style='background-color:blue;color:white;padding:10px;text-align:center;'>Material ".$venkateshfname." Uploaded Succesfully </p>";
 }
 else{
 echo "<p style='background-color:red;color:white;padding:10px;text-align:center;'>Material ".$venkateshfname." is not uploaded </p>";
 }
        }
}
}
?>

