<?php
$n=mysqli_query($con,"SELECT * FROM user_logs where login_by='$session_id' and login_status='login'");
$visits=mysqli_num_rows($n);
?>
 				<footer class="footer">
                   <?php include '../counter.php';?> 2018 © E-Crush<span class="hide-phone">-WEBTEAM</span><p style="float:right;font-weight:bolder;">Your Visits: <?php echo $visits ?></p>
                </footer>
