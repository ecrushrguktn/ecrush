
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A Website For Giving Lab Resources to Students.">
        <meta name="author" content="E-Crush Developers">

        <link rel="shortcut icon" href="../assets/images/logo.png">

        <title> Events | E-Crush</title>

        <link href="../plugins/switchery/switchery.min.css" rel="stylesheet" />
        <link href="../plugins/jquery-circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css" />

        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">

        <script src="../assets/js/modernizr.min.js"></script>

        <!--venobox lightbox-->
        <link rel="stylesheet" href="../plugins/magnific-popup/dist/magnific-popup.css"/>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include 'top_bar.php' ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

           <?php include 'sidebar.php' ?>
            <!-- Left Sidebar End -->




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
                                    <h4 class="page-title">Events</h4>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="#">Infra</a></li>                                        
                                        <li class="breadcrumb-item active">Events</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>


                        

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="timeline">
                                    <?php 
$t=mysqli_query($con,"SELECT * FROM events");
$c=mysqli_num_rows($t);
while($r=mysqli_fetch_array($t,MYSQLI_BOTH)){
   
?>
 <?php                           
            if($c>0){
              ?>
                                    <article class="timeline-item alt">
                                        <div class="text-right">
                                            <div class="time-show first">
                                                <a href="#" class="btn btn-primary w-lg"><?php echo $r['event_title'];?></a>
                                            </div>
                                        </div>
                                    </article>
                                    <?php 
                                    $i=1;
                                     $tt=mysqli_query($con,"SELECT * FROM sub_events where event_id='$r[0]' order by event_date DESC");
                                        while($rr=mysqli_fetch_array($tt,MYSQLI_BOTH)){
                                            if($i%2==0){
                                                $type='';
                                                $color='warning';
                                            }else{
                                                $type='alt';
                                                $color='success';
                                            }
                                            if(($rr['status'])=='1'){
                                                $stat='<span class="badge badge-primary">Active</span>';
                                            }else if(($rr['status'])=='2'){
                                                $stat='<span class="badge badge-warning">Closed</span>';
                                            }else if(($rr['status'])=='1'){
                                                $stat='<span class="badge badge-info">Inactive</span>';
                                            }else{
                                                $stat='<span class="badge badge-info">Inactive</span>';
                                            }
                                        ?>
                               <?php echo'<article class="timeline-item '.$type.'">'; ?>
                                        <div class="timeline-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <span class="arrow-alt"></span>
                                                    <span class="timeline-icon"></span>
                                                    <p><button class="btn btn-secondary btn-custom waves-effect w-md waves-light"> <i class='fa fa-trophy'></i> <?php echo $rr['event_name'];?></button></p><br>
                                                    <p><span class="badge badge-dark"><i class='fa fa-clock-o'></i> <?php echo $rr['event_date'];?></span></p><br>
                                                   
                                <div class="card  text-white bg-<?php echo $color; ?> text-xs-center">
                                    <div class="card-body">
                                        <blockquote class="card-bodyquote">
                                            <cite>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                                                erat a ante.</cite>
                                            <footer>Someone famous in <cite title="Source Title">Source Title</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div><br>
                                  <p><button class="btn btn-outline-secondary waves-effect w-md waves-light"> <i class='fa fa-users'></i> Participants : <?php echo $rr['participants'];?></button></p><br>
                                                    <p><button class="btn btn-outline-secondary waves-effect w-md waves-light"> <i class='fa fa-heart-o'></i>  Registrations :<?php echo $rr['registrations'];?></button></p><br>
                                                   <p><span class="badge badge-purple">Status :</span> <?php echo $stat?></p><br>
                                                    <p><b><i class='fa fa-graduation-cap'></i> Organizer Details :</b></p><p><?php echo $rr['organizer_details'];?></p><br>
                                                    <p><b><i class='fa fa-trophy'></i> Winners :</b></p><p><?php echo $rr['winners'];?></p><br>
                                                    <p><b><i class='fa fa-trophy'></i> Runners :</b></p><p><?php echo $rr['runnners'];?></p><br>
                                                </div>
                                            </div>
                                        </div>
                                    </article>

                                <?php $i++;} ?>   
                                <?php }else{
            echo'<center><div class="alert alert-danger alert-dismissible" style="width:100%">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Not Available!</h4>
                We will Update soon.Please visit Later.
              </div></center>';
          }
            ?>  ?>  
<?php } ?>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->


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
        <script src="../../plugins/switchery/switchery.min.js"></script>
   

        <script src="../assets/js/jquery.core.js"></script>
        <script src="../assets/js/jquery.app.js"></script>

        

    </body>
</html>
