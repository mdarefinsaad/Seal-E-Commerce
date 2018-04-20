<?php
session_start();
//       ob_start();
$_SESSION['page'] = "";
  include('header.php');
  if(empty($_COOKIE['loggedInUser']))
                  {
                    echo "<script type='text/javascript'>alert('In order to purhcase ... You have to Sign Up / Sign');
                    window.location.href='signin.php';
                    </script>";
                    
  }
?>

  <!DOCTYPE html>
  <html>
  <head>
    <title></title>
  </head>
  <body>
  <form method="post">
      <div style='background-color:white'>
        <table width="100%" height="100%">
          <tr>
            <td align='center'>
              Please Insert Your Card No.<br>
              <input type='text' name='cardno' required="required" /><br>
              Insert Your Pin No.<br>
              <input type='text' name='cardpin' required="required"/><br>
              <input type='submit' name='submit' value='Check'/>
            </td>
          </tr>
        </table>
      </div>
  </form>
  </body>
  </html>




<?php 
      
                      if($_COOKIE['TypeUser'] == 'customer')
                      {
                        $host = 'localhost';
                        $user = 'root';
                        $db = 'seal';
                        $dpass = '';

                        $con = mysqli_connect($host,$user,$dpass,$db);

                        if(!empty($_POST['cardno']) || !empty($_POST['cardpin']))
                        {

                        $uid = $_COOKIE['loggedInUser'];
                        $UCCno = $_POST['cardno'];
                        $UCCpin = $_POST['cardpin'];
                        //userid amount fetching from Database
                        $UserQuery = "SELECT * FROM user WHERE userid='$uid'";
                        $result = mysqli_query($con,$UserQuery);
                          if($result)
                          {
                            while($row = mysqli_fetch_assoc($result))
                            {
                              if($UCCno == $row['ccardno'])
                              {
                                if($UCCpin == $row['ccardpin'])
                                {
                                  header('location:purchase.php');
                                }
                                else
                                {
                                  echo "<script type='text/javascript'>
                                  alert('Wrong Pin Number');</script>";
                                }
                              }
                              else
                              {
                                echo "<script type='text/javascript'>
                                  alert('Wrong Card Number');</script>";
                              }
                              
                            }
                          }
                        }
                      }
                    
                
?>

<?php
  include('footer.php');
?>