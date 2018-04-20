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


   
    $id = $_COOKIE['deleteUser'];
    $con = mysqli_connect($host,$user,$dpass,$db);
    $check = "SELECT userid from log WHERE userid='$id'";
    $resCheck = mysqli_query($con,$check);
    if($resCheck)
    {
        $row = mysqli_fetch_array($resCheck);
        if(empty($row['userid']))
        {
            $query = "DELETE FROM user WHERE userid='$id'";
            $result = mysqli_query($con,$query);
            if($result)
            {
                setcookie("deleteUser","",time()-56666666);
                header('location:user.php');
            }
        }
        else
        {
            $queryLog = "DELETE FROM log WHERE userid='$id'";
            $resLog = mysqli_query($con,$queryLog);
            if($resLog)
            {
                $query = "DELETE FROM user WHERE userid='$id'";
                $result = mysqli_query($con,$query);
                if($result)
                {
                    setcookie("deleteUser","",time()-56666666);
                    header('location:user.php');
                }
            }
        }
    }
    
    
 ?>
