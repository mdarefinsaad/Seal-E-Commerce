<?php 
    // session_start();
  ob_start();
    // var_dump($GLOBALS);
    include("header.php");
    if(!empty($_COOKIE['TypeUser']))
    {
      if($_COOKIE['TypeUser'] == 'admin')
      {
        header('location:dash.php');
      }
      else
      {
        header('location:shop.php');  
      }
    }
?>
<style type="text/css">
    
#ss{
  color:blue;
}
</style>
			<img src="bg.png" width="100%" height="40%">

			<table  width="100%" cellpadding="40" cellspacing="20" bgcolor="white">

								<tr>

								<table align="center" class="table" width="100%" bgcolor="white">
									<tr>
									<td width="10%"></td>

									<td width="50%" align='center'>
									<form method="POST">
										<fieldset>
											<legend>
												<font size="6" face="Roboto Light"> Sign In</font>
											</legend><br><br>
										  
                      Select User Type :<br><br>
                      <select name='checkUser' required="required">
                        <option value='customer'>Customer</option>
                        <option value='admin'>Admin</option>
                      </select>
                      <br><br>

											<font size="3" face="Roboto Light">User name/Admin Id</font>
											<br>
											<input type="text"  name="uname" required="required"/>
											<br><br>

											<font>Password</font>
											<br>
											<input type="password" name="password" required="required"/>
											<br>


											&emsp;<br>
											<input class="button1" type="Submit" value='Log In'><br><br>
                      <font size="3" face="Roboto Light"><a id='ss' href="forgotPass.php">Forgot Password ?</a></font>
											<br><br><br><br><br/>
										</fieldset>
									</form>
									</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><hr class="hr" width="1" size="350"></td>
									<td align="center">
										<font size="5" face="Roboto Light">Don't You Have an Account ?</font>
										<br>
										<font size="4" face="Roboto Light"><a id='ss' href="signup.php">Create Your Account.</a></font>
									</td>


								</tr>
								</tr>
								</table>
			</table>
			<br/><br/><br/>

</body>
</html>

<?php
// if(empty($_SESSION['name']))
// {
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $uname = trim($_POST['uname']);
        $pass = trim($_POST['password']);
        $check = trim($_POST['checkUser']);

        if(!empty($uname) || !empty($pass) || !empty($check))
        {
                      $host = 'localhost';
                      $user = 'root';
                      $db = 'seal';
                      $dpass = '';

                      //setting up connection to MySQL database
                      $con = mysqli_connect($host,$user,$dpass,$db);
                      //it returns an object
                      //var_dump($con);

                      if($check == 'admin')
                      {
                            $query ="SELECT * FROM admin WHERE adminid='$uname'";

                            $result = mysqli_query($con, $query);
                            if($result)
                            {
                                //$row = mysqli_fetch_array($result);
                                $row = mysqli_fetch_assoc($result);
                                if($row['adminid'] == $uname)
                                {
                                    if($row['password'] == $pass)
                                    {
                                      
                                        if($row['userType'] == "admin")
                                        {
                                          setcookie('loggedInUser',$row['adminid'],time()+566666);
                                          setcookie('TypeUser',$row['userType'],time()+566666);
                                          
                                          echo "<script type='text/javascript'>window.location = 'http://localhost/demo/dash.php';</script>";
                                           
                                        }
                                        else
                                        {
                                          echo "<script type='text/javascript'>alert('User Type Didn't Match');</script>";
                                        }           
                                    }
                                    else
                                    {
                                      echo "<script type='text/javascript'> alert('Wrong Password');</script>";  
                                    }
                                }
                                else
                                {
                                  echo "<script type='text/javascript'> alert('Wrong Admin Id');</script>";
                                }
                            }
                            else
                            {
                                echo "<script type='text/javascript'> alert('Can't Login');</script>";
                            }
                      }
                      else
                      {
                            $query ="SELECT * FROM user WHERE username='$uname'";

                            $result = mysqli_query($con, $query);
                            if($result)
                            {
                                //$row = mysqli_fetch_array($result);
                                $row = mysqli_fetch_assoc($result);
                                if($row['username'] == $uname)
                                {
                                    if($row['password'] == $pass)
                                    {
                                      
                                        if($row['userType'] == "customer")
                                        {


                                          setcookie('loggedInUser',$row['userid'],time()+566666);
                                          setcookie('TypeUser',$row['userType'],time()+566666);
                                          // $_COOKIE['loggedInUser'] = $row['userid'];
                                          // $_COOKIE['TypeUser'] = $row['userType'];
                                          if($_COOKIE['page'] == 'confirm')
                                          {
                                            setcookie('page',"",time()-566666);
                                            echo "<script type='text/javascript'>window.location = 'http://localhost/demo/prepurchase.php';</script>";
                                          }
                                          else
                                          {
                                           echo "<script type='text/javascript'>window.location = 'http://localhost/demo/shop.php';</script>";
                                          }           
                                        }
                                        else if($row['userType'] == "admin")
                                        {
                                          setcookie('loggedInUser',$row['userid'],time()+566666);
                                          setcookie('TypeUser',$row['userType'],time()+566666);
                                          header("location:dash.php"); 
                                        }
                                    }
                                    else
                                    {
                                      echo "<script type='text/javascript'> alert('Wrong Password');</script>";  
                                    }
                                }
                                else
                                {
                                  echo "<script type='text/javascript'> alert('Wrong Username');</script>";
                                }
                            }
                            else
                            {
                                echo "<script type='text/javascript'> alert('Can't Login');</script>";
                            }
                      }
        }
}
    // }
?>
<?php include("footer.php")?>