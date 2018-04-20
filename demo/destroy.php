<?php
  session_start();

  foreach ($_COOKIE as $key => $value) {
    if($key == 'loggedInUser' || $key == 'TypeUser')
    {
      continue;
    }
    else
    {
      setcookie ($key,"",time()-5656565);
      setcookie ($key,"",time()-5656565);  
    }
  	
  }
  // var_dump($GLOBALS);
  echo "<script type='text/javascript'>
                                      alert('Thanks for Purchasing');
                                      window.location.href = 'shop.php';
                                    </script>";
 ?>
