<?php
if(isset($_SESSION['ecrushstream'])){
$n=mysqli_query($con,"SELECT * FROM user_logs where login_by='$session_id' and login_status='login'");
$visits=mysqli_num_rows($n);
}
?>
 				<footer class="footer">
                   <?php include 'counter.php';?> 2018 © E-Crush<span class="hide-phone">-WEBTEAM</span><p style="float:right;font-weight:bolder;">Your Visits: <?php if(isset($_SESSION['ecrushstream'])) { echo $visits; } else { echo '0'; } ?></p>
                </footer>
