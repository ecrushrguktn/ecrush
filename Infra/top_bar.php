<?php
session_start();
error_reporting(0);
$session_id = $_SESSION['ecrushstream'];
include '../connect.php' ;
?>
 <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="../index" class="logo"><i class=" mdi mdi-book "></i> <span>E-Crush</span></a>
                    </div>
                </div>
                
                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">

                        

<?php
$m=mysqli_query($con,"SELECT * FROM students Where stu_id='$session_id'");
while($r=mysqli_fetch_array($m,MYSQLI_BOTH)){
    $Student_name = $r['stu_name'];
    $student_gender = $r['stu_gender'];
    $category= $r['category'];
    $ppic=$r['ppic'];
    $pic=$r['stu_pic'];
}
?>
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                      <?php
                                           if($ppic=='0'){
                                            echo '<img src="../assets/images/default.png" class="rounded-circle" alt="profile-image" style="border:2px solid rgba(255,255,255,0.9);">';        
                                            }else{
                                                echo '<img src="../profiles/images/'.$pic.'" class="rounded-circle" alt="profile-image" style="border:2px solid rgba(255,255,255,0.9);">';        
                                            }                              
                                        ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                <!-- item-->
                                <?php 
                                if(isset($_SESSION['ecrushstream'])){
                                ?>
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small style="text-transform: capitalize;">Welcome ! <?php echo $session_id ?></small> </h5>
                                </div>

                                <!-- item-->
                                <a href="../profile" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-star-variant"></i> <span>Profile</span>
                                </a>

                                <!-- item-->
                                <a href="../feedback" class="dropdown-item notify-item">
                                    <i class="mdi mdi-share"></i> <span>Your Queries</span>
                                </a>
                          
                                <!-- item-->
                                <a href="../logout" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout"></i> <span>Logout</span>
                                </a>
                            <?php } else {?>

                                 <a href="../login" class="dropdown-item notify-item">
                                    <i class="mdi mdi-login"></i> <span>Login</span>
                                </a>
                              
                            <?php } ?>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        
                        
                    </ul>

                </nav>

            </div>
