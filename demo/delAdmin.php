<?php

    if(!empty($_COOKIE['loggedInUser']))
    {
      if($_COOKIE['TypeUser'] != 'admin')
      {
        header('location:signin.php');
      }
    }
    else
    {
        header('location:signin.php');
    }
    session_start();
    $host = 'localhost';
    $user = 'root';
    $dpass = '';
    $db = 'seal';


   
    $id = $_COOKIE['deleteAdmin'];
    $con = mysqli_connect($host,$user,$dpass,$db);
    $query = "DELETE FROM admin WHERE adminid='$id'";
    $result = mysqli_query($con,$query);
    if($result)
    {
      setcookie("deleteAdmin","",time()-56666666);
      header('location:adminList.php');
    }
    
 ?>
