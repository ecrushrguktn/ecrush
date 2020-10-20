 <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li class="menu-title"></li>

                            <li>
                                <a href="../index" class="waves-effect waves-primary"><i
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
                           <li class="menu-title">Categories</li>   


        <li><a href="events" class="waves-effect waves-primary"><i class="fa fa-trophy"></i><span>Events</span> </a> </li>

        <li><a href="../leaderboard_daily" class="waves-effect waves-primary"><i class="fa fa-trophy"></i><span>Leaderboard (Daily)</span> </a> </li>
        <li><a href="../leaderboard_weekly"  class="waves-effect waves-primary"><i class="fa fa-trophy"></i><span>Leaderboard (Weekly)</span> </a> </li>
        <li><a href="../contact"  class="waves-effect waves-primary"><i class="fa fa-send"></i><span>Contact Us</span></a></li>  
        <li><a href="../team"  class="waves-effect waves-primary"><i class="fa fa-heart"></i><span>Team</span></a></li>  
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>