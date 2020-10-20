 <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title"></li>

                            <li>
                                <a href="index" class="waves-effect waves-primary"><i
                                        class="fa fa-home"></i><span> Home</span></a>
                            </li>

                            <?php
$c=0;
$k=mysqli_query($con,"SELECT * FROM notices where visibility='1' order by id DESC");
while($m=mysqli_fetch_array($k,MYSQLI_BOTH)){
$nv=$m['notice_visible'];
$cm=time()-$nv;
if($cm<84600){
    $c++;
}
}
?>
                            <li>
                                <a href="notices" class="waves-effect waves-primary"><i
                                        class="fa fa-bell"></i><span> Notifications </span><span
                                        class="badge badge-pink pull-right"><?php echo $c ?></span></a>
                            </li>

                            <li class="menu-title">Hubs</li>                           
        <li><a href="<?php if(isset($_SESSION['ecrushstream'])){  echo 'E-library/'; } else { echo'login'; }?>"><i class="fa fa-book"></i><span>E-library</span></a></li>         
        <li><a href="<?php if(isset($_SESSION['ecrushstream'])){  echo 'E-Skills/'; } else { echo'login'; }?>"><i class="fa fa-lightbulb-o"></i><span>E-Skills</span></a></li> 
        <li><a href="<?php if(isset($_SESSION['ecrushstream'])){  echo 'Quiz/'; } else { echo'login'; }?>"><i class="fa fa-pencil"></i><span>Quiz</span></a></li> 
        <li><a href="<?php if(isset($_SESSION['ecrushstream'])){  echo 'Listening/'; } else { echo'login'; }?>"><i class="fa fa-video-camera"></i><span>Listening</span></a></li> 
        <li><a href="<?php if(isset($_SESSION['ecrushstream'])){  echo 'Designing/'; } else { echo'login'; }?>"><i class="fa fa-image"></i><span>Designing</span></a></li> 
        <li><a href="<?php if(isset($_SESSION['ecrushstream'])){  echo 'Soft/'; } else { echo'login'; }?>"><i class="fa fa-users"></i><span>Soft Skills</span></a></li> 
        <li><a href="<?php if(isset($_SESSION['ecrushstream'])){  echo 'Infra/'; } else { echo'login'; }?>"><i class="fa fa-trophy"></i><span>Infra</span></a></li> 
        <li><a href="<?php if(isset($_SESSION['ecrushstream'])){  echo 'Technical/'; } else { echo'login'; }?>"><i class="fa fa-windows"></i><span>Technical</span></a></li> 
        <li><a href="<?php if(isset($_SESSION['ecrushstream'])){  echo 'Promotions/'; } else { echo'login'; }?>"><i class="fa fa-trophy"></i><span>Promotions</span></a></li> 
        <li><a href="leaderboard_daily"><i class="fa fa-trophy"></i><span>Leaderboard (Daily)</span> </a> </li>
        <li><a href="leaderboard_weekly"><i class="fa fa-trophy"></i><span>Leaderboard (Weekly)</span> </a> </li>
        <li><a href="contact"><i class="fa fa-send"></i><span>Contact Us</span></a></li>  
        <li><a href="team"><i class="fa fa-heart"></i><span>Team</span></a></li>  
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>