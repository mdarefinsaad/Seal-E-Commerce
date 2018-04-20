<?php
    //  unset($_COOKIE['loggedInUser']);
    // unset($_COOKIE['TypeUser']);

    foreach ($_COOKIE as $key => $value) 
    {
      setcookie ($key,"",time()-5656565);
      setcookie ($key,"",time()-5656565);  
    }

    header("location:signin.php");
 ?>
