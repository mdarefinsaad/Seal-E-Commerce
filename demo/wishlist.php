<?php
    session_start();ob_start();
    // var_dump($GLOBALS);
    if(empty($_COOKIE['searchBy'])){$_COOKIE['searchBy'] = "";}

    if(!empty($_POST))
    {
      foreach ($_POST as $key => $value) 
      {
        for ($i=0; $i < 3; $i++) 
        { 
           setcookie($key,$value,time()+566666666);
           setcookie($key,$value,time()+566666666);
               // unset($_POST[$key]); 
        }
      }
    }

?>
<?php include_once("header.php");?>

<script type="text/javascript">
        function delPro(proid)
        {
          if (confirm('Are you sure you want to Delete?')) {
            document.cookie = "deletePro="+proid;
            document.cookie = "page=cart";
          }
        }

        function discardWish()
        {
          document.cookie = "wish="+"";
        }
</script>


<table>
  <tr>
    <img src="bg/wishlist.jpg" width="100%">
  </tr>
</table>


  <center>
        <div style="width:80%;background-color:white">
          <?php
                $host = 'localhost';
                $user = 'root';
                $dpass = '';
                $db = 'seal';
                $con = mysqli_connect($host,$user,$dpass,$db);
                // $result = mysqli_query($con,$query);
                if(!empty($_COOKIE['wish']))
                {

                    $cartCookie = $_COOKIE['wish'];
                    $cartItem = explode(",",$cartCookie);
                    $total = 0;
                    $UnitTotal = 0;
                    echo "<table border='1'>";
                    
                    echo "<tr>

                    <td colspan='2' align='center'>&emsp;ITEM</td>
                    <td align='center'>QUANTITY</td>
                    <td align='center'>PRICE</td>
                    <td align='center'>DELETE</td>
                    <td align='center'>CART</td>
                    </tr>";
                    $j = 0;
                    
                    // var_dump($cartItem);
                    for($i=0;$i < count($cartItem);$i++)
                    {
                      $pro = $cartItem[$i];
                      $query = "SELECT * FROM product WHERE id='$pro'";
                      $result = mysqli_query($con,$query);
                      if($result)
                      {
                            while($row = mysqli_fetch_assoc($result))
                            {
                              global $j;
                              $j++;
                              
                              echo
                              "<tr>
                                 <td width='12%' style='border-top:none;border-right:none;border-left:none;'>
                                   <center>
                                      <a><img class='proImg2' src='$row[image]' width='100%'></a>
                                   </center>
                                  </td>

                                  <td style='padding:1%;border-top:none;border-left:none' width='20%'>
                                   <font size='2'>
                                   <b>$row[name]</b><br>
                                   Catagory  : $row[catg]<br>
                                   Brand : $row[brand]<br>
                                   Color : $row[color]
                                   </font>
                                  </td>

                                  <td align='center' width='20%' style='padding:1%;border-top:none;border-left:none'>
                                      <b>$row[quantity] Pieces</b> <br> are available
                                  </td>

                                  <td width='15%' align='center' style='border-top:none;border-left:none'>
                                    <font size='5'>$row[price]</font> .BDT
                                  </td>";

                                  echo "<td width='20%' align='center' style='border-top:none;border-left:none'>
                                  	<a href='' onclick='DeleteFromWish($row[id])'>
                  										<button class='cusBtn' style='width:25%'>
                  												<i class='fa fa-trash' aria-hidden='true'></i>
                  										</button>
									                  </a>
                                  </td>

                                  <td width='20%' align='center' style='border-top:none;border-right:none;border-left:none'>
                                    <a href='' onclick='ToCart($row[id])'>
                                      <button class='cusBtn' style='width:25%'>
                                          <i class='fa fa-shopping-cart' aria-hidden='true'></i>
                                      </button>
                                    </a>
                                  </td>

                              </tr>";
                            }
                      }
                      else
                      {
                        echo "<h1='color:white;padding:2% 2% 2% 3%'>Wishlist is Empty...!!!</h1>";
                      }
                    }
                    echo "</form>";
                    if($j != 0)
                    {
                      echo "<tr>
                      <td colspan='5' align='right' style='border:none'>
                        <a href='wishlist.php' onclick='discardWish()'>
                          <button class='cusBtn' style='width:15%;background-color:black;color:white'>
                          <font>Discard All</font>
                          </button>
                        </a>&nbsp;

                        <a href='wishlist.php'>
                          <button class='cusBtn' style='width:15%;background-color:black;color:white'>
                          <font>Refresh</font>
                          </button>
                        </a>&nbsp;
                      </td>
                    </tr>
                    </table>";
                    }
                    else 
                    {
                        echo "<table border='2' width='100%' height='50%'>
                        <tr>
                          <td align='center'>
                            <h1>Cart is Empty 
                            <i class='fa fa-shopping-cart' aria-hidden='true'></i></h1>
                          </td>
                        </tr>
                      </table>";
                    }



                }
                else {
                  echo "<table width='100%' height='50%'>
                        <tr>
                          <td align='center'>
                            <h1>Wish is Empty  <i class='fa fa-shopping-cart' aria-hidden='true'></i></h1></h1>
                          </td>
                        </tr>
                      </table>";
                }



          // echo "<a href='destroy.php'>Delete</button>";
         ?>
        </div>
        <?php include("footer.php"); ?>
  </center>
  
