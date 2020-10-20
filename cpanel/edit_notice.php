<?php
error_reporting(0);
session_start();
if(isset($_SESSION['ecrushstream_admin'])==false)
{
  header("Location:index");
  exit(0);
}
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A Website For Giving Resources to Students.">
        <meta name="author" content="E-Crush Developers">
        <link rel="shortcut icon" href="../assets/images/logo.png">
        <title> Edit Notice || E-Crush</title>    
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <script src="../assets/js/modernizr.min.js"></script>                
    </head>


    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
<?php include 'top_bar.php' ?>


            <!-- ========== Left Sidebar Start ========== -->
  <?php include 'sidebar.php' ?>
           
            <!-- Left Sidebar End -->

<?php include ('../includes/device.php') ?>
        <?php
include "../connect.php";
 if(isset($_GET['id'])){
    $get_id = mysql_real_escape_string(stripslashes(htmlspecialchars(htmlentities(($_REQUEST['id'])))));
  } 
if(isset($_POST['send_notice'])){  
    $g_id=mysqli_real_escape_string($con,$_POST['get_id']);  
     $filename=($_FILES['file_img']['name']);     
     $filename = mysqli_real_escape_string($con,$filename); 
        $session=$_SESSION['ecrushstream_admin'];   
     $l=mysqli_query($con,"SELECT * FROM admin where username='$session'");
     $k=mysqli_fetch_array($l,MYSQLI_BOTH);
     $added_by=$k['role'];   
     $sent_by=mysqli_real_escape_string($con,$_POST['sd']);
     if($sent_by==""){
     $sent_by=$k['role'];     
      }
    $date=date('Y-m-d');
     $brand=mysqli_real_escape_string($con,$_POST['subject']);
     $pro=mysqli_real_escape_string($con,$_POST['description']);     
     $pr=mysqli_real_escape_string($con,$_POST['sent_to']);  
     $dep=mysqli_real_escape_string($con,$_POST['department']);             
    $fname = $_FILES['file_img']['name'];
     $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
     $tmpname  = $_FILES['file_img']['tmp_name'];
     $filesize = $_FILES['file_img']['size'];
     $ftype = $_FILES['file_img']['type'];
     $extension=strpbrk($_FILES['file_img']['name'],".");
     $vpb_file_extensions = pathinfo($filename, PATHINFO_EXTENSION); // File Extension
     $vpb_allowed_file_extensions = array("png","jpg","jpeg","gif","pdf","xlsx","zip","rar","docx","doc");
     $time=time();
     $ip=$_SERVER['REMOTE_ADDR'];
     $fname=($filename);
     $fname=mysqli_real_escape_string($con,$fname);
     $fp = fopen($tmpname, 'r');
     fclose($fp);                            
      $uploads_dir = '../notice_files/';  
      $images_name ="";
      $c=0;
      foreach ($_FILES["file_img"]["error"] as $key => $error) {
          $c++;
          $count=$key['number'];
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["file_img"]["tmp_name"][$key];
            $name = $_FILES["file_img"]["name"][$key];
            $result =  move_uploaded_file($tmp_name, "$uploads_dir/$name");         
            $images_name =$images_name.",".$name;            
          //  $count=sizeof($images_name);
        }
      } 
          if($images_name!="") {
        if (!$result) {
          echo'<script>alert("Error Uploading.Please Try Again")</script>';          
        exit;
        }
          else{

          $ip=$_SERVER['REMOTE_ADDR'];          
          $l=mysqli_query($con,"UPDATE notices set subject='$brand',description='$pro',sent_to='$pr',sent_by='$sent_by',sent_date='$date',sent_ip='$ip',sent_os='$user_os',sent_browser='$user_browser',file='$images_name',files_count='$c',department='$dep',notice_visible='$time' where id='$g_id' ");   
          if($l==true){
              mysqli_query($con,"INSERT INTO notices_logs (subject,description,sent_to,sent_by,sent_date,sent_ip,sent_os,sent_browser,file,files_count,status,department,added_by,notice_visible) VALUES ('$brand','$pro','$pr','$sent_by','$date','$ip','$user_os','$user_browser','$images_name','$c','Updated Succesfully with file','$dep','$session','$time') ");  
              echo'<script>alert("Edited Succesfully");window.location="notice_dashboard"</script>';
          }else{
              mysqli_query($con,"INSERT INTO notices_logs (subject,description,sent_to,sent_by,sent_date,sent_ip,sent_os,sent_browser,file,files_count,status,department,added_by,notice_visible) VALUES ('$brand','$pro','$pr','$sent_by','$date','$ip','$user_os','$user_browser','$images_name','$c','Updated fields are Missing with file','$dep','$session','$time') ");
              echo'<script>alert("Some fields are missing")</script>';
          }
        }
      }else{
        $ip=$_SERVER['REMOTE_ADDR'];          
         $l=mysqli_query($con,"UPDATE notices set subject='$brand',description='$pro',sent_to='$pr',sent_by='$sent_by',sent_date='$date',sent_ip='$ip',sent_os='$user_os',sent_browser='$user_browser',department='$dep',notice_visible='$time' where id='$g_id' ");            
          if($l==true){
             mysqli_query($con,"INSERT INTO notices_logs (subject,description,sent_to,sent_by,sent_date,sent_ip,sent_os,sent_browser,status,department,added_by,notice_visible) VALUES ('$brand','$pro','$pr','$sent_by','$date','$ip','$user_os','$user_browser','Updated Succesfully without file','$dep','$session','$time') ");  
              echo'<script>alert("Edited Succesfully");window.location="notice_dashboard"</script>';
          }else{
              mysqli_query($con,"INSERT INTO notices_logs (subject,description,sent_to,sent_by,sent_date,sent_ip,sent_os,sent_browser,status,department,added_by,notice_visible) VALUES ('$brand','$pro','$pr','$sent_by','$date','$ip','$user_os','$user_browser','Updated fields are Missing without file','$dep','$session','$time') ");
              echo'<script>alert("Some fields are missing")</script>';
          }

      }
}
              ?> 

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">                                    
                                    <h4 class="page-title">Send Notice(Main)</h4>                                                                       
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>



                       <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="text-dark  header-title m-t-0">Edit Notice</h4><hr>
                                    <div class="container" ><br>  
        <div class="alert alert-info"> 
          <i class="fa fa-warning"></i><strong> Please Provide Subject Length in between 100 Characters for best view </strong>
          </div>

          <table class="table table-bordered table-stripped">
          <?php   
          $p=mysqli_query($con,"SELECT * FROM notices where id='$get_id'");
          while($g=mysqli_fetch_array($p,MYSQLI_BOTH)){
              $sent=$g['sent_to'];
                  echo'<form  action="edit_notice.php" method="POST" class="forms-sample" enctype="multipart/form-data">';
                  ?>
                  <input type="hidden" name="get_id" value="<?php echo $g['id'] ?>">
                  <tr>
                  <td>                    
                    <div class="form-group">
                      <label for="exampleInputName1">Subject</label>
                    </td>
                    <td>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Subject" name="subject" value="<?php echo $g['subject'] ?>"  required="">
                    </td>
                    </div>
                  </tr>
                  <tr>
                    <td>
                     <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                    </td>
                    <td>
                      <textarea class="form-control" id="elm1" name="description"><?php echo $g['description'] ?></textarea>
                    </td>
                    </div>
                  </tr>
                  <tr>
                    <td>
                    <div class="form-group"> 
                    <label for="exampleSelectGender">Year</label>                     
                  </td>
                  <td>
                    <div class="row">
                      <div class="col-md-1">
                      <input type="radio" name="sent_to" value="ALL" onclick="show2()" <?php if($sent=="ALL"){?>checked=""<?php }?> >&nbsp;ALL
                    </div>
                     <div class="col-md-1">
                      <input type="radio" name="sent_to" value="P1" onclick="show2()" <?php if($sent=="P1"){?>checked=""<?php }?> >&nbsp;P1
                    </div>
                     <div class="col-md-1">
                      <input type="radio" name="sent_to" value="P2" onclick="show2()" <?php if($sent=="P2"){?>checked=""<?php }?> >&nbsp;P2
                    </div>
                     <div class="col-md-1">
                      <input type="radio" name="sent_to" value="E1" onclick="show1()" <?php if($sent=="E1"){?>checked=""<?php }?> >&nbsp;E1
                    </div>
                     <div class="col-md-1">
                      <input type="radio" name="sent_to" value="E2" onclick="show1()" <?php if($sent=="E2"){?>checked=""<?php }?> >&nbsp;E2
                    </div>
                     <div class="col-md-1">
                      <input type="radio" name="sent_to" value="E3" onclick="show1()" <?php if($sent=="E3"){?>checked=""<?php }?> >&nbsp;E3
                    </div>
                     <div class="col-md-1">
                      <input type="radio" name="sent_to" value="E4" onclick="show1()" <?php if($sent=="E4"){?>checked=""<?php }?> >&nbsp;E4
                    </div>
                    </div>
                  </td>
                    </div>
                    <p style="color:red;font-weight:bolder;">* Please Re-check the Checked Value.</p>  
                    <tr><td><label for="exampleTextarea1">Department</label></td>
                      <td>
                     <div style="display:none;" id="dept">
                      <div class="form-group" >                                          
                        <select class="form-control" name="department">                        
                          <option value="<?php echo $g['department'] ?>"><?php echo $g['department'] ?></option>
                          <option value="ALL">All Departments</option>                          
                          <option value="CSE">CSE</option>
                          <option value="ECE">ECE</option>
                          <option value="ME">MECH</option>
                          <option value="CE">CIVIL</option>
                          <option value="MME">MME</option>
                          <option value="CHEM">CHEM</option>                          
                        </select>                     
                      </div> 
                    </div> 
                    </td>       
                  </tr>
                    <!--div class="form-group">
                      <label for="exampleSelectGender">Send to</label>
                        <select class="form-control" id="exampleSelectGender" required="" name="sent_to">
                          <option value="">Select Year</option>
                          <option value="All">All</option>
                          <option value="P1">PUC1</option>
                          <option value="P2">PUC2</option>
                          <option value="E1" onsubmit="dep()">ENGG-1</option>
                          <option value="E2">ENGG-2</option>
                          <option value="E3">ENGG-3</option>
                          <option value="E4">ENGG-4</option>                          
                        </select>
                      </div-->  
                                        
                       
                    
                    <tr>
                      <td>
                    <div class="form-group">                      
                      <label>File upload</label>
                    </td>
                    <td>
                      <p class="text-muted">Only JPG, PNG, JPEG, XLSX, DOCX, DOC, PDF, RAR, ZIP, PPT are allowed.</p>
                      <input class="form-control" type="file" name="file_img[]" multiple />                    
                    </td>
                    </div>  
                  </tr>
                   <tr>
                      <td>
                    <div class="form-group">
                      <label for="exampleInputName1">Sent Date</label>
                      </td>
                    <td>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Sent Date" name="sent_date" value="<?php echo $g['sent_date'] ?>">
                      </td>
                    </div> 
                     </tr>
                    <?php 
                    $session=$_SESSION['ecrushstream_admin'];
                    $d=mysqli_query($con,"SELECT * FROM admin where username='$session'");
                    $q=mysqli_fetch_array($d,MYSQLI_BOTH);
                    ?>
                    <tr>
                      <td>
                      <div class="form-group">
                      <label for="exampleInputName1">Sd/-</label>
                    </td>
                    <?php
                    if ($q['role']=="CO") {
                        $usertype="Convenor";
                    }else if($q['role']=="EC"){
                        $usertype="Executive Coordinator";
                    }else if ($q['role']=="AEC") {
                        $usertype="Associative Executive Coordinator";
                    }else if ($q['role']=="OC") {
                        $usertype="Overall Coordinator";
                    }else if ($q['role']=="admin") {
                        $usertype="Admin";
                    }else if ($q['role']=="coordinator") {
                        $c=$q['hub'];
                        $usertype="".$c." Co-ordinator";
                    }else if ($q['role']=="organizer") {
                        $usertype="organizer";
                    }
                    ?>
                    <td>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Sd/-" name="sd" value="<?php echo $usertype ?>" readonly="">
                    </td>
                    </div>                                                       
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group">
                      <label for="exampleInputName1">Actions</label>
                    </td>
                    <td>
                    <input type="submit" class="btn btn-info" name="send_notice" value="Send Notice">
                    <button class="btn btn-danger" type="reset">Reset</button>
                  </td>
                </div>
              </tr>
                  </form>
                      <?php } ?>
          </table>
    </div> <!-- /container -->
                                </div>
                           </div>
                        </div>
                    </div>
                    <!-- end container -->
                </div>
                <!-- end content -->
<?php include 'footer.php'; ?>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


           
        </div>
        <!-- END wrapper -->


    
        <script>
            var resizefunc = [];
        </script>

        <!-- ../plugins  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/detect.js"></script>
        <script src="../assets/js/fastclick.js"></script>
        <script src="../assets/js/jquery.slimscroll.js"></script>
        <script src="../assets/js/jquery.blockUI.js"></script>
        <script src="../assets/js/waves.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/jquery.nicescroll.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>
        <!-- Page js  -->
        <script src="../assets/pages/jquery.dashboard.js"></script>

        <!-- Custom main Js -->
        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

        <script src="../plugins/tinymce/tinymce.min.js"></script> 
        <script type="text/javascript">
         
       function show1(){        
          document.getElementById('dept').style.display ="block"; 
          }       
      function show2(){        
          document.getElementById('dept').style.display ="none"; 
          }       
     </script>
     <script type="text/javascript">
          $(document).ready(function () {
          if($("#elm1").length > 0){
              tinymce.init({
                  selector: "textarea#elm1",
                  theme: "modern",
                  height:100,
                  plugins: [
                      "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                      "save table contextmenu directionality emoticons template paste textcolor"
                  ],
                  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                  style_formats: [
                      {title: 'Bold text', inline: 'b'},
                      {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                      {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                      {title: 'Example 1', inline: 'span', classes: 'example1'},
                      {title: 'Example 2', inline: 'span', classes: 'example2'},
                      {title: 'Table styles'},
                      {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                  ]
              });
          }
      });
        </script> 
        </script>


    </body>
</html>
