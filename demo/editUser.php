<?php

include('dash_header.php');  
ob_start()

?>
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


<?php 
      $host = 'localhost';
      $user = 'root';
      $dpass = '';
      $db = 'seal';

      $con = mysqli_connect($host,$user,$dpass,$db);
      if(!empty($_COOKIE['UserId']))
      {
        $coke = $_COOKIE['UserId'];
        $query = "SELECT * FROM user WHERE userid='$coke'";
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
                          <font size='6'>User's Information :</font>
                              <form method='POST' enctype='multipart/form-data'><br>


                              <input type='hidden' name='userid' value='$row[userid]'/><br><br>

                                <input type='text' name='name' placeholder='User's Name' required='required' value='$row[name]'/><br><br>

                                <input type='text' name='username' placeholder='username' required='required' value='$row[username]'/><br><br>
                                
                                <input type='text' name='email' placeholder='email' required='required' value='$row[email]'/><br><br>
                                
                                <input type='password' name='password' placeholder='password' required='required' value='$row[password]'/><br><br>

                                <input type='text' name='mob' placeholder='mobile no' required='required' value='$row[mobile]'/><br><br>
                                
                                <input type='text' name='area' placeholder='area' required='required' value='$row[area]'/><br><br>
                                
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
                                echo "</select>";

                              
                                User:
                                echo "<select name='userType'>
                                        <option value='customer' selected='selected'>$row[userType]</option>
                                      </select><br><br>";


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

    

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
       if(!empty($_POST['name']) && !empty($_POST['username'])&& !empty($_POST['email']) 
        &&!empty($_POST['password']) && !empty($_POST['mob']) && !empty($_POST['area'])
        && !empty($_POST['address']) && !empty($_POST['gender']) && !empty($_POST['userType']))
          {
              $userid = $_POST['userid'];
              $name = $_POST['name'];
              $username = $_POST['username'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              $mob = $_POST['mob'];
              $area = $_POST['area'];
              $address = $_POST['address'];
              $gender = $_POST['gender'];
              $userType = $_POST['userType'];
              $image = "";

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
                $query =  "UPDATE user SET name='$name',username='$username',email='$email',password='$password' 
                ,gender='$gender',area='$area',mobile='$mob',address='$address',userType='$userType' 
                WHERE userid='$userid'";
      
                $result = mysqli_query($con,$query);
              }
              else
              {

                $image = "users/".$_FILES["fileToUpload"]["name"];
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image);

                $query =  "UPDATE user SET name='$name',username='$username',email='$email',password='$password' 
                ,gender='$gender',area='$area',mobile='$mob',address='$address',userType='$userType',image='$image' 
                WHERE userid='$userid'";
      
                $result = mysqli_query($con,$query);
              }
              var_dump($result);
              if($result)
              {
                  echo "<script type='text/javascript'>
                      window.location = 'http://localhost/demo/viewUser.php';
                  </script>";
              }
              else
              {
                  echo "<script type='text/javascript'> alert('Error Happened/Value Exist')</script>";
              }  

        }
    }



    //$con = mysqli_connect($host,$user,$dpass,$db);
?>