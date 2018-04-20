<?php

include('header.php');  
ob_start()
?>

<?php 
      // var_dump($GLOBALS);
      $host = 'localhost';
      $user = 'root';
      $dpass = '';
      $db = 'seal';

      $con = mysqli_connect($host,$user,$dpass,$db);
      if(!empty($_COOKIE['loggedInUser']))
      {
        $coke = $_COOKIE['loggedInUser'];
        $query = "SELECT * FROM user WHERE userid='$coke'";
        echo "<center><table width='70%'>";
        $result = mysqli_query($con,$query);
        if($result)
        {
           while($row = mysqli_fetch_assoc($result))
          {
                    echo "
                    
                    <tr width='50%'>
                      <td width='50%'>
                             <img class='proImg1' src='$row[image]' width='80%'></a>
                      </td>
                      <td>
                          <div class='proBackg' style='width: 400px'><br>
                          <font size='6'>User's Information :</font>
                              <form method='POST' enctype='multipart/form-data'><br>


                              <input type='hidden' name='userid' value='$row[userid]'/><br><br>




                                <input type='text' name='name' placeholder='User's Name' required='required' value='$row[name]'/><br>
                                 <ul>
                                  <li>Name Should contain only letter</li>
                                  <li>Like - 'Bob Alan' , 'Mike Harras' etc.</li>
                                 </ul>



                                <input type='text' name='username' placeholder='username' required='required' value='$row[username]'/><br>
                                      <ul>
                                        <li>Username should contain only letter and number</li>
                                        <li>Like - 'bob123','alan123' etc.</li>
                                      </ul> 



                                
                                <input type='text' name='email' placeholder='email' required='required' value='$row[email]'/><br><br>
                                       <ul>
                                          <li>Email Should be a valid email</li>
                                          <li>Like - 'dotdot@dotmail.com' etc.</li>
                                         </ul> 
                                



                                <input type='text' name='password' placeholder='password' required='required' value='$row[password]'/><br><br>
       <ul>
        <li>Password should contain letter and number</li>
        <li>Password can contain '@' , '_' , '.' , '#'</li>
        <li>Password must be 5 characters long</li>
        <li>etc.</li>
       </ul> 




                                <input type='text' name='ccno' placeholder='email' required='required' value='$row[ccardno]'/><br><br>
                                       <ul>
        <li>Credit Card No can contain numbers only</li>
        <li>Credit Card No should be 10 - 14 characters long</li>
       </ul>





                                <input type='text' name='ccpin' placeholder='email' required='required' value='$row[ccardpin]'/><br><br>
                                       <ul>
        <li>Credit Card Pin contain numbers only</li>
        <li>Credit Card Pin should be minimum 4 characters long</li>
       </ul>





                                <input type='text' name='mobile' placeholder='mobile no' required='required' value='0$row[mobile]'/><br><br>
                                <ul>
        <li>Mobile No should be numbers only</li>
        <li>Mobile No should contain 11 digits exactly</li> 
        <li>Like - '017XXXXXXXX' etc.</li> 
        <li>Only <b>Grameenphone,Airtel,Banglalink,<br>Teletalk,Robi</b> - Carriers are acceptable</li>
       </ul>

                                
                                <input type='text' name='city' placeholder='area' required='required' value='$row[area]'/><br><br>
                                
                                Adress : <br>
                                <input type='text' value='$row[address]'  name='address'>";


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
                            <a href='userProfile.php'>
                                  <button>Cancel</button>
                            </a><br><br>
                          </div>
                      </td>
                    </tr>
                 </table></center>
                    ";
          }
        }
    }
       
?>
 <?php include('footer.php') ?>


    

<?php



    $name = $uname = $email = $pass = $cardno = $cardpin = $mobile = $gender = $city = $address = $userType = $image = "";
    $nameCheck = $unameCheck = $emailCheck = $passCheck = $cardnoCheck = $cardpinCheck = $mobileCheck = $genderCheck = $cityCheck = $addressCheck = $userTypeCheck = $imageCheck = false;
    
  //$name = $email = $id = $pass = $Utype = "";
  if($_SERVER['REQUEST_METHOD']=="POST")
  {
      $id = trim($_POST['userid']);
      $name = trim($_POST['name']);
        $uname = trim($_POST['username']);
        $email = trim($_POST['email']);
        $pass = trim($_POST['password']);
      $cardno = trim($_POST['ccno']);
        $cardpin = trim($_POST['ccpin']);
      $mobile = trim($_POST['mobile']);
        $gender = trim($_POST['gender']);
        $city = trim($_POST['city']);
        $address = trim($_POST['address']);
        $userType = trim($_POST['userType']);
        $image ="";


      if(!empty($_FILES['fileToUpload']['name']))
      {
        $image = $_FILES['fileToUpload']['name']; 
      }
      
        //ALL the Patterns to match
      $namePattern = "/^[a-zA-Z .-]*$/";
      $passPattern = "/^([a-z0-9.@_#]{5,})$/";
      $unamePattern = "/^[a-zA-Z0-9]+$/";
      //$email = done
      $ccnoPattern = "/^([0-9]{10,14})$/";
      $ccpinPattern = "/^([0-9]{4,})$/";
      $mobPattern = "/(017|016|018|019|015)\s?\d{2}\s?\d{6}/";
      $addrPattern = "/^[a-zA-Z0-9, ]+$/";

          //NAME
          if(!empty($name))
          {
            if(str_word_count($name) > 1)
            {
              if(preg_match($namePattern,$name))
              {
                 $nameCheck = true;
              }
              else
              {
                $nameCheck = false;
                echo "<script type='text/javascript'>alert('Name Pattern Did not Match')</script>";      
              }
            }
            else
            {
              echo "<script type='text/javascript'>alert('Name is too Short')</script>";   
            }
          }
          else
          {
            echo "<script type='text/javascript'>alert('Name Field Empty')</script>";
          }


          //USERNAME
          if(!empty($uname))
          {
            if(preg_match($unamePattern,$uname))
            {
              $unameCheck = true;
            }
            else
            {
              $unameCheck = false;
             echo "<script type='text/javascript'>alert('Username Pattern Did not match')</script>";        
            }
          }
          else
          {
            echo "<script type='text/javascript'>alert('Username Field is empty')</script>";       
          }


                  //Email
          if(!empty($email))
          {
            if(filter_var($email,FILTER_VALIDATE_EMAIL))
            {
              $emailCheck = true;
            }
            else
            {
              $emailCheck = false;
              echo "<script type='text/javascript'>alert('Email Pattern Did not Match')</script>";        
            }
          }
          else
          {
            echo "<script type='text/javascript'>alert('Email Field is Empty')</script>";       
          }


          //PASSWORD
          if(!empty($pass))
          {
            if(preg_match($passPattern,$pass))
            {
              $passCheck = true;
            }
            else
            {
              $passCheck = false;
              echo "<script type='text/javascript'>alert('Password Pattern Did not match')</script>";        
            }
          }
          else
          {
            echo "<script type='text/javascript'>alert('Password Field is Empty')</script>";       
          }



          //Credit Card Number
          if(!empty($cardno))
          {
            if(preg_match($ccnoPattern,$cardno))
            {
              $cardnoCheck = true;
            }
            else
            {
              $cardnoCheck = false;
             echo "<script type='text/javascript'>alert('CCno Pattern Did not Match')</script>";        
            }
          }
          else
          {
            echo "<script type='text/javascript'>alert('Credit Card Field is empty')</script>";       
          }


          //Credit Card Pin
          if(!empty($cardpin))
          {
            if(preg_match($ccpinPattern,$cardpin))
            {
               $cardpinCheck = true;
            }
            else
            {
              $cardpinCheck = false;
             echo "<script type='text/javascript'>alert('Credit Card pin Did not match')</script>";        
            }
          }
          else
          {
            echo "<script type='text/javascript'>alert('Credit Card Pin Field is Empty')</script>";       
          }


          // Mobile
          if(!empty($mobile))
          {
            if(preg_match($mobPattern,$mobile))
            {
              $mobileCheck = true;
            }
            else
            {
              $mobileCheck = false;
              echo "<script type='text/javascript'>alert('Mobile Pattern Did not Match')</script>";        
            }
          }
          else
          {
            echo "<script type='text/javascript'>alert('Mobile Field is Empty')</script>";       
          }


          // Address
          if(!empty($address))
          {
            if(preg_match($addrPattern,$address))
            {
              $addressCheck = true;
            }
            else
            {
              $addressCheck = false;
             echo "<script type='text/javascript'>alert('Address Pattern Did not match')</script>";        
            }
          }
          else
          {
            echo "<script type='text/javascript'>alert('ADdress Field is empty')</script>";       
          }



          if(!empty($gender))
          {
            $genderCheck = true;
          }
          else
          {
            $genderCheck = false;
              echo "<script type='text/javascript'>alert('Gender Field is Empty')</script>";       
          }
          if(!empty($city))
          {
            $cityCheck = true;
          }
          else
          {
            $cityCheck = false;
              echo "<script type='text/javascript'>alert('City Field is Empty')</script>";       
          }
          if(!empty($userType))
          {
            $userTypeCheck = true;
          }
          else
          {
            $userTypeCheck = false;
            echo "<script type='text/javascript'>alert('User type Field is empty')</script>";       
          }

      //Inserting data in database
      $host = 'localhost';
      $user = 'root';
      $db = 'seal';
      //name of database
      $dpass = '';

      //connection to database
      $con = mysqli_connect($host,$user,$dpass,$db);
      //var_dump($con);



      if($nameCheck == true && $unameCheck == true && $emailCheck == true && $passCheck == true &&
         $cardnoCheck == true && $cardpinCheck == true && $genderCheck == true && $mobileCheck == true
         && $addressCheck == true && $cityCheck == true && $userTypeCheck == true)
      {
        if($image == "")
        {
          
          $query = "UPDATE  user SET name='$name',username='$uname',email='$email',password='$pass',ccardno='$cardno',ccardpin='$cardpin',gender='$gender',area='$city',mobile='$mobile',address='$address',userType='$userType'
                  WHERE userid = '$id'";
        }
        else
        {

          $image = "users/".$_FILES["fileToUpload"]["name"];
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image);
         $query = "UPDATE  user SET name='$name',username='$uname',email='$email',password='$pass',ccardno='$cardno',ccardpin='$cardpin',gender='$gender',area='$city',mobile='$mobile',address='$address',userType='$userType',image='$image'
                  WHERE userid = '$id'"; 
        }
          
        $result = mysqli_query($con,$query);
        if($result)
        {
          echo "<script type='text/javascript'> alert('Information Updated');</script>";
            header("location:userProfile.php");
        }
        else
        {
          echo "<script type='text/javascript'> console.log('Username Already Exist');</script>";
        }
          
      }
      else
      {
        echo "<script type='text/javascript'> alert('You did mistake while giving Input.Do The Registration Properly Again');</script>";
      }
      

      
  }
  else
  {
    
  }
?>







