<?php
    session_start();ob_start();
    // var_dump($GLOBALS);
    setcookie('page',"confirm",time()+56666);
?>


<?php include("header.php");?>
  <div style='background-color:white'>
    <table width="100%" height="70%">
        <tr>
          <td align='center' colspan="2">
          <font size='5'>Total Amount of Purchase : </font>
          <font size='10'><?php echo $_SESSION['amount'];?></font>
          <font size='5'><?php echo " .BDT";?></font>
          </td>
        </tr>

        <tr>
          <td align="center" width="60%">
            
            <font size='5'>Are You Sure Want Purchase ?</font>
            &nbsp;<a href='prepurchase.php'>
              <button class='cusBtn' style='width:5%;background-color:black;color:white'>
                <font>Yes</font>

              </button>
            </a>

            &nbsp;<a href='cart.php'>
              <button class='cusBtn' style='width:5%;background-color:black;color:white'>
                <font>No</font>
              </button>
            </a>

            <br><br><font size='4'>(Only Registered Customer Are Allowed to Purchase.)</font>
          </td> 
        </tr>
    </table>
  </div>

<?php include("footer.php");?>