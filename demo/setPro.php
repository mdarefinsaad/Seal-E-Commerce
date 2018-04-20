<?php
    session_start();
    $_SESSION['adminViewPro'] = $_COOKIE['proId'];
    $page = $_COOKIE['page'];
    if($page == "dash")
    {
      header("location:dash.php");
    }
    else if($page == "inventory"){
      header("location:inventory.php");
    }

    $_SESSION['adminViewPro'] = "";
    setcookie("proId","",time()-56666);
    setcookie("proId","",time()-56666);
    setcookie("page","",time()-56666);
    setcookie("page","",time()-56666);
 ?>
