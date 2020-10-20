
<?php
		 
	require_once 'connect.php';
	error_reporting(0);
	if (isset($_REQUEST['id'])) {
			
		$id = mysql_real_escape_string(stripslashes(htmlspecialchars(htmlentities(($_REQUEST['id'])))));
		$query = "SELECT * FROM notices WHERE id='$id'";
	    $m=mysqli_query($con,$query);

	    while($n=mysqli_fetch_array($m,MYSQLI_BOTH))
			{
           $views=$n['views'];
           $views=$views+1;
           $u="UPDATE notices set views='$views' where id='$id'";
           $l=mysqli_query($con,$u);
		?>
	          <center>
	          <h3><?php echo $n['subject']; ?></h3>
              </center>
	          <br>
	           <p><?php echo $n['description']; ?></p>	
	         <div class="modal-footer">
	         	<div style="float:left !important;">
	     <span class="badge badge-info"  ><i class="fa fa-download"></i> Attachment:</span>
	     <?php if($n['file']==""){
	     	echo'<span class="badge badge-warning">No file</span>';
	     }else{
	     	//$temp = explode(',','hau','hai');
	     	$file =$n['file'];
			$temp = explode(',',$file);	     	
	     	//$temp1=preg_split("/[,]+/", $file);	     		     	
	     	$count=$n['files_count'];
			$i=0;
			while($i<=$count){
				echo'<a href="notice_files/'. $temp[$i].'" class="badge badge-primary" download="ecrush_notice/'. $temp[$i].'" >'. $temp[$i].'</a>';
				$i++;
	     ?>		     	    
	 <?php }} ?>
	 	</div>

	     <span class="badge badge-purple"><i class="fa fa-hand-o-right"></i> Sd/-: <?php echo $n['sent_by']; ?></span>          
		   

		    </div>
		<?php	
					
	}
}
	?>