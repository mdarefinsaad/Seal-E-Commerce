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


   
    // $id = $_COOKIE['deletePro'];
    // $con = mysqli_connect($host,$user,$dpass,$db);
    // $query = "DELETE FROM product WHERE id='$id'";
    // $result = mysqli_query($con,$query);
    // if($result)
    // {
    //   setcookie("deletePro","",time()-56666666);
    //   header('location:inventory.php');
    // }


    $id = $_COOKIE['deletePro'];
    $con = mysqli_connect($host,$user,$dpass,$db);
    $check = "SELECT id from log WHERE id='$id'";
    $resCheck = mysqli_query($con,$check);
    if($resCheck)
    {
        $row = mysqli_fetch_array($resCheck);
        if(empty($row['id']))
        {
            $query = "DELETE FROM product WHERE id='$id'";
            $result = mysqli_query($con,$query);
            if($result)
            {
                setcookie("deletePro","",time()-56666666);
                header('location:inventory.php');
            }
        }
        else
        {
            $queryLog = "DELETE FROM log WHERE id='$id'";
            $resLog = mysqli_query($con,$queryLog);
            if($resLog)
            {
                $query = "DELETE FROM product WHERE id='$id'";
                $result = mysqli_query($con,$query);
                if($result)
                {
                    setcookie("deletePro","",time()-56666666);
                    header('location:inventory.php');
                }
            }
        }
    }
    
 ?>
