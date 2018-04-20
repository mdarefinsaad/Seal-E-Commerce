<?php
// var_dump($GLOBALS);
include('dash_header.php');  
ob_start()

?>
<div style='padding:5%;display:inline-block;float:left'>
              <nav role='sub'>
                <span>
                  <ul>
                 <li><a class='active'><b>Admin Panel</b></a></li>
                 <li><a href='dash.php'>Dashboard</a></li>
                 <li><a href="admin.php"><b>ADMIN</b></a></li>
                 <li><a href='user.php'>Users</a></li>
                 <li><a href='inventory.php'>Inventory</a></li>
                 <li><a href='addChoose.php'>Add New</a></li>
                 <li><a href="log.php">Log</a></li>
                 <li><a href="report.php">Report</a></li>
                </ul>
                </span>
              </nav>
 </div>


<?php 
      $host = 'localhost';
      $user = 'root';
      $dpass = '';
      $db = 'seal';

      $con = mysqli_connect($host,$user,$dpass,$db);
      if(!empty($_COOKIE['loggedInUser']))
      {
        $coke = $_COOKIE['loggedInUser'];
        $query = "SELECT * FROM admin WHERE adminid='$coke'";
        echo "<table width='70%'>";
        $result = mysqli_query($con,$query);
        if($result)
        {
          while($row = mysqli_fetch_assoc($result))
          {
                    echo "
                    <table width='70%'>
                    <tr width='50%' align='center'>
                      <td width='50%'>
                             <img class='proImg1' src='$row[image]' width='80%'></a>
                      </td>
                      <td>
                          <div class='proBackg' style='width: 400px'><br>
                          <font size='6'>Admin's Information :</font>
                              <form method='POST' enctype='multipart/form-data'><br>

                                <input type='text' name='name' placeholder='Admin's Name' required='required' value='$row[name]'/><br><br>

                                <input type='text' name='username' placeholder='username' required='required' value='$row[username]'/><br><br>

                                <input type='text' name='email' placeholder='email' required='required' value='$row[email]'/><br><br>

                                <input type='password' name='password' placeholder='password' required='required' value='$row[password]'/><br><br>

                                <input type='text' name='mobile' placeholder='mobile no' required='required' value='$row[mobile]'/><br><br>
                                Adress : <br>

                                <textarea class='textbox' name='address' style='height:100px'>$row[address]</textarea><br>";


                                // echo $row['brand'];
                                Gender :
                                echo "<br><select name='gender'>";
                                echo " <option value='male' ";
                                if($row['gender'] == "male")
                                {   
                                    echo "selected=selected";

                                }
                                echo ">male</option>";

                                echo "<option value='female' ";
                                if($row['gender'] == "female")
                                { 
                                    echo "selected=selected";
                                }
                                echo ">female</option>";
                                echo "</select><br>";

                              

                                echo "<input type='file' name='fileToUpload' accept='.png,.jpg'/><br><br>";
                                echo"
                                <br><input type='submit' value='Update'/>
                                
                            </form>
                            <a href='viewUser.php'>
                                  <button>Cancel</button>
                            </a><br><br>
                          </div>
                      </td>
                    </tr>
                 </table>
                    ";
          }
        }
    }
       
?>
 <?php include('footer.php') ?>



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
        $userType = 'admin';
        $image =$_FILES['fileToUpload']['name'];
    

    if(!empty($name) && !empty($email) && !empty($uname) && !empty($pass) && !empty($mobile)
    && !empty($gender) && !empty($address) && !empty($userType))
      {
              

              if(!empty($_FILES['fileToUpload']['name']))
              {
                $image = $_FILES['fileToUpload']['name']; 
              }
            

              $host = 'localhost';
              $user = 'root';
              $dpass = '';
              $db = 'seal';
              $con = mysqli_connect($host,$user,$dpass,$db); 
              $result = "";

              if($image == "")
              {
                $query =  "UPDATE admin SET username='$uname',name='$name',email='$email',password='$pass',mobile='$mobile',gender='$gender',address='$address',userType='$userType' 
                WHERE adminid='$coke'";

                $result = mysqli_query($con,$query);
                
              }
              else
              {

                $image = "admin/".$_FILES["fileToUpload"]["name"];
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image);

                $query =  "UPDATE admin SET username='$uname',name='$name',email='$email',password='$pass',mobile='$mobile',gender='$gender',address='$address',userType='$userType',image='$image'
                WHERE adminid='$coke'";
      
                $result = mysqli_query($con,$query);
              }
              
              if($result)
              {

                  echo "<script type='text/javascript'>
                      alert('Updated');
                      window.location = 'http://localhost/demo/adminProfile.php';
                  </script>";
              }
              else
              {
                  echo "<script type='text/javascript'> alert('Error Happened/Value Exist')</script>";
              }  

        }
        else
        {
          echo "<script type='text/javascript'> alert('DHUKE NA')</script>";
        }
    }



    //$con = mysqli_connect($host,$user,$dpass,$db);
?>