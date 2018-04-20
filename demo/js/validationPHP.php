<?php



	  $name = $uname = $email = $pass = $cardno = $cardpin = $mobile = $gender = $city = $address = $userType = $image = "";
	  $nameCheck = $unameCheck = $emailCheck = $passCheck = $cardnoCheck = $cardpinCheck = $mobileCheck = $genderCheck = $cityCheck = $addressCheck = $userTypeCheck = $imageCheck = false;
	  
	//$name = $email = $id = $pass = $Utype = "";
	if($_SERVER['REQUEST_METHOD']=="POST")
	{

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
		    $image =$_FILES["fileToUpload"]["name"];
			
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


			$image = "users/".$_FILES["fileToUpload"]["name"];
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


			if($nameCheck == true && $unameCheck == true && $emailCheck == true && $passCheck == true &&
			   $cardnoCheck == true && $cardpinCheck == true && $genderCheck == true && $mobileCheck == true
			   && $addressCheck == true && $cityCheck == true && $userTypeCheck == true)
			{
				if($image === 'users/')
				{
					$image = "";
				}

				$query = "INSERT INTO user(name,username,email,password,ccardno,ccardpin,gender,area,mobile,address,userType,image)
  						  VALUES ('$name','$uname','$email','$pass','$cardno','$cardpin','$gender','$city','$mobile','$address','$userType','$image')";	
  				$result = mysqli_query($con,$query);
				if($result)
				{
					echo "<script type='text/javascript'> alert('Registration Done');</script>";
		    		header("location:signin.php");
				}
				else
				{
					echo "<script type='text/javascript'> alert('Username Already Exist');</script>";
					header("location:signup.php");
				}
					
			}
			else
			{
				echo "<script type='text/javascript'> alert('Problem in Any Check Varible');</script>";
			}
			

			
	}
	else
	{

	}
?>



