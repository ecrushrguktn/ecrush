<?php
error_reporting(0);
session_start();
if(isset($_SESSION['ecrushstream_admin'])=="")
{
  header("Location:index");
  exit(0);
}

?>

<?php
		 
	require_once '../connect.php';
	
	if (isset($_REQUEST['id'])) {
			
$id = mysql_real_escape_string(stripslashes(htmlspecialchars(htmlentities(($_REQUEST['id'])))));
		$query = "SELECT * FROM notices WHERE id='$id'";
	    $m=mysqli_query($con,$query);

	    while($n=mysqli_fetch_array($m,MYSQLI_BOTH))
			{           
           $u="UPDATE notices set visibility='0' where id='$id'";
           $l=mysqli_query($con,$u);
	
	        if($l==true){
                            ?>
                             <div class="alert alert-success">
                                                <strong>Deleted!</strong>Succesfully.Please <a href=""><i class="fa fa-refresh"></i> Refresh Page</a> For Result. 
                                            </div>
                        <?php
                        }
                        ?>    
		<?php	
					
	}
}
	?>