<?php 
  session_start();
  ob_start();
  // var_dump($GLOBALS);
  include('dash_header.php');  
?>


  <table>
  <tr>
    <img src="bg/adduser.jpg" width="100%">
  </tr>
</table>
<div style="padding:5%;display:inline-block;float:left">
              <nav role='sub'>
                <span>
                  <ul>
                 <li><a class="active"><b>Admin Panel</b></a></li>
                 <li><a href="dash.php">Dashboard</a></li>
                 <li><a href="admin.php"><b>ADMIN</b></a></li>
                 <li><a href="user.php">Users</a></li>
                 <li><a href="inventory.php">Inventory</a></li>
                 <li><a href="addChoose.php">Add New</a></li>
                 <li><a href="log.php">Purchase History</a></li>
                 <li><a href="status.php">Status</a></li>
                 <li><a href="report.php">Report</a></li>
                 <li><a href="freport.php">Finance Report</a></li>
                </ul>
                </span>
              </nav>
 </div>
 <table width="70%" cellpadding="40">
    <tr align="center">
      <td>
          <div class="proBackg"s style="width: 768px"><br>
          <font size="6">Admin's Information :</font>
              <form method="post" enctype="multipart/form-data"><br>
                    <input type="text" name="name" placeholder="Name" required="required"><br><br>
                    <input type="text" name="username" placeholder="Username" required="required"><br><br>
                    <input type="text" name="email" placeholder="Email" required="required"><br><br>
                    <input type="text" name="password" placeholder="Password" required="required"><br><br>
                    <input type="text" name="mobile" placeholder="Mobile No." required="required"><br><br>

                    Gender : <select name='gender' required="required">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    </select><br><br>

                    <textarea class="textbox" name="address" placeholder="Address" style="height:100px" required="required"></textarea><br><br>

                    User Type : <select name='userType'>
                    <option value="admin" selected="selected">Admin</option>
                    </select><br><br>

                    Image : <input type="file" class="textbox"  name="fileToUpload" accept=".png,.jpg" 
                    required="required"/><br><br>

                    <input type="submit" name="" value="Create User"/>
              </form>
          </div>
      </td>
    </tr>
 </table>

 <?php
  $name="";
  $email="";
  $uname="";
  $pass="";
  $mobile="";
  $address="";
  $gender="";
  $userType="";
  $image="";
  //$name = $email = $id = $pass = $Utype = "";
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $userType = $_POST['userType'];
        $image =$_FILES['fileToUpload']['name'];
    //  if($name==""){
    //    echo "Name can not be empty";
    //  }
    //  else{
    //    $temp = explode(" ", $name);
    //    if((count($temp) > 1) && (preg_match('/^[a-z|A-Z| |.|-]*$/', $name)))
    //    {
    //      $name = ucwords($name);
    //      echo  $name;
    //    }
    //
    //    else{
    //      echo "<script type='text/javascript'> alert('Invalid Name')</script>"; ;
    //    }
    //  }
    //
    //
    // if($email ==""){
    //  echo "Email cannot empty";
    // }
    // else{
    //  $email1 = explode(' ',$email);
    //  //var_dump($email1);
    //  if(preg_match('/@/',$email) && preg_match('/.com/',$email) && count($email1)=="1"){
    //    echo $email;
    //  }
    //
    //  else{
    //    echo "<script type='text/javascript'> alert('Invalid Email')</script>";
    //  }
    //
    // }
    //
    //
    //  if($uname==""){
    //    echo "Name can not be empty";
    //  }
    //  else{
    //    $temp = explode(" ", $uname);
    //    if((count($temp) < 1) && (preg_match('/^[a-z|A-Z| |.|-]*$/', $uname)))
    //    {
    //      $uname = ucwords($uname);
    //      echo  $uname;
    //    }
    //
    //    else{
    //      echo "invalid name <br> " ;
    //    }
    //  }



  if(!empty($name) && !empty($email) && !empty($uname) && !empty($pass) && !empty($mobile)
    && !empty($gender) && !empty($address) && !empty($userType))
    {

      $image = "admin/".$_FILES["fileToUpload"]["name"];
      move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image);

      //Inserting data in database
      $host = 'localhost';
      $user = 'root';
      $db = 'seal';
      //name of database
      $dpass = '';

      //connection to database
      $con = mysqli_connect($host,$user,$dpass,$db);
      //var_dump($con);

      $query = "INSERT INTO admin(username,name,email,password,mobile,gender,address,userType,image)
          VALUES ('$uname','$name','$email','$pass','$mobile','$gender','$address','$userType','$image')";

      $result = mysqli_query($con,$query);
      if($result)
      {
        echo "<script type='text/javascript'> alert('Registered');</script>";
        header("location:admin.php");
      }
      else
      {
        echo "<script type='text/javascript'> alert('Username has already taken');</script>";
      }

    }
  }
?>

