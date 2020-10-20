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
$k=mysqli_query($con,"SELECT * FROM admin_notices where visibility='1' order by id DESC");
while($m=mysqli_fetch_array($k,MYSQLI_BOTH)){
$nv=$m['notice_visible'];
$cm=time()-$nv;
if($cm<84600){
    $c++;
}
}
?>
                            <li>
                                <a href="<?php if(isset($_SESSION['ecrushstream_admin'])){  echo 'notices'; } else { echo'index'; }?>" class="waves-effect waves-primary"><i
                                        class="fa fa-bell"></i><span> Notifications </span><span
                                        class="badge badge-pink pull-right"><?php if($c>0) { echo $c; } ?></span></a>
                            </li>

                            <li class="menu-title">Categories</li>     
                            <?php  
                            include '../connect.php';                           
                            $session=$_SESSION['ecrushstream_admin'];
                            $k=mysqli_query($con,"SELECT * FROM admin where username='$session'");
                            $ch=mysqli_num_rows($k);                            
                            while($r=mysqli_fetch_array($k,MYSQLI_BOTH)) {
                                $hub=$r['hub'];
                                $role=$r['role'];
                            }

                            if(($role=='coordinator') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){
                            ?>                      
        <li><a href="<?php if(isset($_SESSION['ecrushstream_admin'])){  echo 'notice_dashboard'; } else { echo'index'; }?>"><i class="fa fa-dashboard"></i><span>Notice Dashboard</span></a></li> 
        <li><a href="<?php if(isset($_SESSION['ecrushstream_admin'])){  echo 'send_notice'; } else { echo'index'; }?>"><i class="fa fa-send"></i><span>Send Notice</span></a></li>                 
    <?php } ?>    
<?php 
//$l=mysqli_query($con,"SELECT * FROM queries where ");
?>
        <?php if(($hub=='E-Library') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>   
                    <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fa fa-book"></i><span>E-Library</span>
                                    <span class="menu-arrow"></span></a>
                                   <ul class="list-unstyled"> 

            <?php if(($role=='coordinator') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO') || ($role=='uploader')){ ?> 
                                        <li><a href="library_upload"><i class=" mdi mdi-arrow-right "></i> Books Upload</a></li>
                                   <?php } ?>

                    <?php if(($role=='coordinator') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>   
                                                                      
                                        <li><a href="team"><i class=" mdi mdi-arrow-right "></i> Team Details</a></li> 
                                        <li><a href="queries"><i class=" mdi mdi-arrow-right "></i> Queries</a></li> 
                    <?php } ?>    

                                </ul>
                    </li>
                  <?php } ?>  
        <?php if(($hub=='E-skills') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>   
                    <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fa fa-lightbulb-o"></i> <span> E-Skills</span>
                                    <span class="menu-arrow"></span></a>
                                   <ul class="list-unstyled">  

        <?php if(($role=='coordinator') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO') || ($role=='uploader')){ ?>   
                                        <li><a href="hindu_upload"><i class=" mdi mdi-arrow-right "></i> Hindu Upload</a></li>
                                        <li><a href="hansindia_upload"><i class=" mdi mdi-arrow-right "></i> HansIndia Upload</a></li>
                                        <li><a href="facts_upload"><i class=" mdi mdi-arrow-right "></i> Facts Upload</a></li>
                                        <li><a href="voc_upload"><i class=" mdi mdi-arrow-right "></i> Vocabulary Upload</a></li>
                                        <li><a href="idiom_upload"><i class=" mdi mdi-arrow-right "></i> Idiom Upload</a></li>
                                         <!--li><a href="ttwister_upload"><i class=" mdi mdi-arrow-right "></i> Tongue Twister</a></li-->
                                         <li><a href="innovation_upload"><i class=" mdi mdi-arrow-right "></i> Innovation Upload</a></li>
                                         <?php } ?>   

                <?php if(($role=='coordinator') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>   
                                                                      
                                        <li><a href="team"><i class=" mdi mdi-arrow-right "></i> Team Details</a></li> 
                                        <li><a href="queries"><i class=" mdi mdi-arrow-right "></i> Queries</a></li> 
                    <?php } ?>  

                                    </ul>                            
                            </li> 
                    <?php } ?> 
        <?php if(($hub=='Quiz') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>   
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fa fa-pencil"></i> <span> Quiz</span>
                                    <span class="menu-arrow"></span></a>
                                   <ul class="list-unstyled">  

        <?php if(($role=='coordinator') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO') || ($role=='uploader')){ ?>   
                                        <li><a href="dailyquiz_upload"><i class=" mdi mdi-arrow-right "></i> Daily Quiz Upload</a></li>
                                        <?php } ?>   

                <?php if(($role=='coordinator') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>   
                                                                      
                                        <li><a href="team"><i class=" mdi mdi-arrow-right "></i> Team Details</a></li> 
                                        <li><a href="queries"><i class=" mdi mdi-arrow-right "></i> Queries</a></li> 
                    <?php } ?> 

                                 </ul>
                            </li> 
                     <?php } ?> 
        <?php if(($hub=='Listening') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>           
                    <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fa fa-video-camera"></i> <span> Listening</span>
                                    <span class="menu-arrow"></span></a>
                                   <ul class="list-unstyled">  
    <?php if(($role=='coordinator') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO') || ($role=='uploader')){ ?>   
                                        <li><a href="video_upload"><i class=" mdi mdi-arrow-right "></i>Video Upload</a></li>
                                        <?php } ?>   
                                                                        
                                        <li><a href="team"><i class=" mdi mdi-arrow-right "></i> Team Details</a></li> 
                                        <li><a href="queries"><i class=" mdi mdi-arrow-right "></i> Queries</a></li>                                     
                                 </ul>
                            </li>  
                       <?php } ?> 
        <?php if(($hub=='Designing') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>                          
                     <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fa fa-image"></i> <span> Designing</span>
                                    <span class="menu-arrow"></span></a>
                                   <ul class="list-unstyled">  
    <?php if(($role=='coordinator') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO') || ($role=='organizer')){ ?>                                       
                                        <li><a href="gallery_upload"><i class=" mdi mdi-arrow-right "></i>Gallery Upload</a></li>
                                        <?php } ?>   
                        <?php if(($role=='coordinator') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>   
                                                                      
                                        <li><a href="team"><i class=" mdi mdi-arrow-right "></i> Team Details</a></li>
                                        <li><a href="queries"><i class=" mdi mdi-arrow-right "></i> Queries</a></li>  
                        <?php } ?>  
                                 </ul>
                                 </li>  
                         <?php } ?>            
        <?php if(($hub=='Soft') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>                          
                     <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fa fa-users"></i> <span> Soft Skills</span>
                                    <span class="menu-arrow"></span></a>
                                   <ul class="list-unstyled">                                          
                 <?php if(($role=='coordinator') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>   
                                                                      
                                        <li><a href="team"><i class=" mdi mdi-arrow-right "></i> Team Details</a></li> 
                                        <li><a href="queries"><i class=" mdi mdi-arrow-right "></i> Queries</a></li> 
                    <?php } ?>                                    
                                 </ul>
                                 </li>
                          <?php } ?>             
        <?php if(($hub=='Infra') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>                          
                     <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-primary"><i class="fa fa-trophy"></i> <span> Infra</span>
                                    <span class="menu-arrow"></span></a>
                                   <ul class="list-unstyled">                                          
                            <?php if(($role=='coordinator') || ($role=='admin') || ($role=='EC') || ($role=='AEC') || ($role=='OC') || ($role=='CO')){ ?>   
                                                                      
                                        <li><a href="team"><i class=" mdi mdi-arrow-right "></i> Team Details</a></li> 
                                        
                    <?php } ?>  
                                 </ul>
                                 </li>  
                        <?php } ?>                                                                                                           
        <li><a href="leaderboard_er"><i class="fa fa-trophy"></i><span>ER Leaderboard</span> </a> </li>        
        <li><a href="contact"><i class="fa fa-send"></i><span>Contact Us</span></a></li>  
        <li><a href="team"><i class="fa fa-heart"></i><span>Team</span></a></li>  
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>