<?php include('header.php'); ?>


    <table align='center' width='70%' style='background-color: white'>
        <tr>
            <center><font color='white' size='8'>Password Recovery</font></center>
        </tr>

        <tr>
            <td align ='center'>
                <form method="post">
                    <br><br><br>
                    Your Username : 
                    <input type="text" name="username" placeholder="Username"><br><br>
                    New Password :
                    <input type="password" name="newPass" placeholder="New Password"><br><br>

                    <input type="submit" value='Change Password'>
                    <br><br><br>
                </form>
            </td>
        </tr>

        <tr>
            <td>
                <center><font size='5'> Forgot Your Previous Password ??</font></center><br>
                <center><font size='3'> Send A Mail to Us - seal@gmail.com</font></center><br><br><br>
            </td>
        </tr>
    </table>

<?php include("footer.php"); ?>



<?php 
                     $host = 'localhost';
                      $user = 'root';
                      $db = 'seal';
                      $dpass = '';

                      //setting up connection to MySQL database
                      $con = mysqli_connect($host,$user,$dpass,$db);



                        if($_SERVER['REQUEST_METHOD']=="POST")
                        {
                                $x = '';
                                $userid = '';
                                $uname = trim($_POST['username']);
                                $newPass = trim($_POST['newPass']);

                                if(!empty($uname) || !empty($newPass))
                                {
                                    $checkUser = "SELECT userid,username from user where username='$uname'";
                                    $resultCheckPass = mysqli_query($con,$checkUser);
                                    if($resultCheckPass)
                                    {

                                        while($row = mysqli_fetch_assoc($resultCheckPass))
                                        {
                                            $x = $row['username'];
                                            $userid = $row['userid'];
                                        }

                                        if($x == $uname)
                                        {
                                            $updateQuery = "UPDATE user set password = '$newPass' WHERE userid='$userid'";
                                            $resultUpdate = mysqli_query($con,$updateQuery);
                                            if($resultUpdate)
                                            {
                                                echo "<script type='text/javascript'>alert('Password Successfully Changed');</script>";       
                                                
                                            }
                                            header("location:signin.php");
                                        }
                                        else
                                        {
                                            echo "<script type='text/javascript'>alert('This is not your Previous Password');</script>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<script type='text/javascript'>alert('Unknown User');</script>";
                                    }
                                }
                                else
                                {
                                    echo "<script type='text/javascript'>alert('Any Of the Field is Empty');</script>";
                                }
                        }

                            
 ?>
 
