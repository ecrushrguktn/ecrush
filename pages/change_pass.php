                    <?php
                       if(isset($_POST['change'])){
                        $Old = mysqli_real_escape_string($con,$_POST['old']);
                        $New = mysqli_real_escape_string($con,$_POST['new']);
                        $Confirm = mysqli_real_escape_string($con,$_POST['confirm']);
                        $e=mysqli_query($con,"SELECT * FROM users where stu_id='$session_id'");
                        while($r=mysqli_fetch_array($e,MYSQLI_BOTH)){
                            $pre_old = $r['stu_password'];
                        }
                        if($Old==$pre_old){
                            if($New==$Confirm){
                                $w=mysqli_query($con,"UPDATE users Set stu_password='$encrypt' where stu_id='$session_id' ");
                                if($w==true){
                                    echo"11";
                                }else{
                                    echo"22";
                                }

                            }else{
                                echo"33";
                            }
                         }else{
                                echo"44";
                         }                            

                        }
                       ?>