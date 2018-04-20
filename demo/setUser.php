<?php
    session_start();
    $_SESSION['adminViewUser'] = $_COOKIE['uid'];
    $page = $_COOKIE['page'];

      header("location:viewUser.php");


    //
    $_SESSION['adminViewUser'] ="";
    setcookie("uid","",time()-56666);
    setcookie("uid","",time()-56666);
    setcookie("page","",time()-56666);
    setcookie("page","",time()-56666);
 ?>
