<?php
    session_start();ob_start();
    // var_dump($GLOBALS);
    if(empty($_COOKIE['searchBy']))
    {
        $_COOKIE['searchBy'] = "";
    }

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

        function discardCart()
        {
          document.cookie = "cart="+"";

        }

        //Useful block of code
        function deleteAllCookies() {
        var cookies = document.cookie.split(";");

        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            if(cookies[i] != "loggedInUser")
            {
              var eqPos = cookie.indexOf("=");
              var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
              document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";  
            }
            
        }
}
</script>


<table>
  <tr>
    <img src="bg/cart.jpg" width="100%">
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
                if(!empty($_COOKIE['cart']))
                {

                    $cartCookie = $_COOKIE['cart'];
                    $cartItem = explode(",",$cartCookie);
                    $total = 0;
                    $UnitTotal = 0;
                    echo "<table border='1'>";
                    echo "<form method='post'>";
                    echo "

                    <th align='center'>&emsp;ITEM</th>
                    <th align='center'>QUANTITY</th>
                    <th align='center'>UNIT PRICE</th>
                    <th align='center'>TOTAL</th>
                    <th align='center'>DELETE</th>
                    <th align='center'>LIKE</th>
                    ";
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
                                 
                                   
                      

                                  <td style='padding:1%;border-top:none;border-left:none' width='30%'>
                            
                                  <a><img class='proImg2' src='$row[image]' width='40%' style='float:left;margin:15px'></a><br><br>

                                   <font size='2'>
                                   <b>$row[name]</b><br>
                                   Catagory  : $row[catg]<br>
                                   Brand : $row[brand]<br>
                                   Color : $row[color]
                                   </font>
                                  </td>

                                  <td align='center' width='20%' style='padding:1%;border-top:none;border-left:none'>
                                      
                                      <select name=".$row['id'].">";
              
                                      echo "<option value='1'";
                                            if(empty($_POST))
                                              {
                                                foreach ($_COOKIE as $key => $value) 
                                                {
                                                  if($row['id'] == $key)
                                                  {
                                                    if($value == 1)
                                                    {
                                                      echo "selected='selected'";
                                                      $UnitTotal= $value * $row['price'];
                                                    }
                                                  }
                                                }
                                              }
                                              else
                                              {
                                                foreach ($_POST as $key => $value) 
                                                {
                                                  if($row['id'] == $key)
                                                  {
                                                    if($value == 1)
                                                    {
                                                      echo "selected='selected'";
                                                      $UnitTotal= $value * $row['price'];
                                                    }
                                                  }
                                                }
                                              }          
                                      echo ">1</option>";

                                      echo "<option value='2'";
                                             if(empty($_POST))
                                              {
                                                foreach ($_COOKIE as $key => $value) 
                                                {
                                                  if($row['id'] == $key)
                                                  {
                                                    if($value == 2)
                                                    {
                                                      echo "selected='selected'";
                                                      $UnitTotal= $value * $row['price'];
                                                    }
                                                  }
                                                }
                                              }
                                              else
                                              {
                                                foreach ($_POST as $key => $value) 
                                                {
                                                  if($row['id'] == $key)
                                                  {
                                                    if($value == 2)
                                                    {
                                                      echo "selected='selected'";
                                                      $UnitTotal= $value * $row['price'];
                                                    }
                                                  }
                                                }
                                              }          
                                        echo ">2</option>";

                                        echo "<option value='3'";
                                             if(empty($_POST))
                                              {
                                                foreach ($_COOKIE as $key => $value) 
                                                {
                                                  if($row['id'] == $key)
                                                  {
                                                    if($value == 3)
                                                    {
                                                      echo "selected='selected'";
                                                      $UnitTotal= $value * $row['price'];
                                                    }
                                                  }
                                                }
                                              }
                                              else
                                              {
                                                foreach ($_POST as $key => $value) 
                                                {
                                                  if($row['id'] == $key)
                                                  {
                                                    if($value == 3)
                                                    {
                                                      echo "selected='selected'";
                                                      $UnitTotal= $value * $row['price'];
                                                    }
                                                  }
                                                }
                                              }          
                                        echo ">3</option>";

                                        echo "<option value='4'";
                                              if(empty($_POST))
                                              {
                                                foreach ($_COOKIE as $key => $value) 
                                                {
                                                  if($row['id'] == $key)
                                                  {
                                                    if($value == 4)
                                                    {
                                                      echo "selected='selected'";
                                                      $UnitTotal= $value * $row['price'];
                                                    }
                                                  }
                                                }
                                              }
                                              else
                                              {
                                                foreach ($_POST as $key => $value) 
                                                {
                                                  if($row['id'] == $key)
                                                  {
                                                    if($value == 4)
                                                    {
                                                      echo "selected='selected'";
                                                      $UnitTotal= $value * $row['price'];
                                                    }
                                                  }
                                                }
                                              }                                        
                                        echo ">4</option>";
                                      echo "</select>

                                    
                                    &nbsp;
                                    <br><input class='cusBtn2' style='width:45%' type='submit' value='update'/><br>
                                  
                                    
                                    <br>
                                    <b>$row[quantity] Pieces</b> <br> are available
                                  </td>

                                  <td width='15%' align='center' style='border-top:none;border-left:none;border-right:none'>
                                    <font size='5'>$row[price]</font> .BDT
                                  </td>

                                  <td width='15%' align='center' style='border-top:none;border-left:none'>";
                                  

                                  if(empty($_POST))
                                  {
                                    $flag = true;
                                    foreach ($_COOKIE as $key => $value) 
                                    {
                                      if($row['id'] == $key)
                                      {
                                        $UnitTotal= $value * $row['price'];
                                        echo "<font size='5'>".$UnitTotal."</font> .BDT</td>";
                                        $total  = $total + $UnitTotal;
                                      }
                                    }

                                    // if($flag)
                                    // {
                                    //   // echo "<script type='text/javascript'>alert('oooo');</script>";

                                    //   // $UnitTotal = $row['price'];
                                    //   // echo "<font size='5'>".$UnitTotal."</font> .BDT</td>";
                                    //   // $total  = $total + $UnitTotal;
                                    // }                  
                                  
                                  }
                                  else
                                  {
                                    echo "<font size='5'>".$UnitTotal."</font> .BDT</td>";
                                    $total  = $total + $UnitTotal;
                                  }
                                  

                                  echo "<td width='10%' align='center' style='border-top:none;border-left:none'>
                                      
                                      <a onclick='DeleteFromCart($row[id])'>
                                            <button class='cusBtn2' style='width:50%'>
                                                    <i class='fa fa-trash' aria-hidden='true'></i>
                                            </button>
                                            </a>
                                  </td>

                                  <td width='10%' align='center' style='border-top:none;border-right:none;border-left:none'>
                                      
                                      <a onclick='ToWish($row[id])'>
                                            <button class='cusBtn2' style='width:50%'>
                                                    <i class='fa fa-heart' aria-hidden='true'></i>
                                            </button>
                                      </a>
                                  </td>

                              </tr>";
                              setcookie("amount",$total);
                            }
                      }
                      else
                      {
                        echo "<h1='color:white;padding:2% 2% 2% 3%'>Cart List Empty...!!!</h1>";
                      }
                    }
                    echo "</form>";
                    if($j != 0)
                    {
                      echo "<tr>
                      <td colspan='2' style='border:none'>

                        <a href='shop.php'>
                        <button class='cusBtn' style='width:25%;margin:3%;background-color:black;color:white'>
                        Shop More
                        </button>
                      </a>


                        <a href='cart.php' onclick='discardCart()'>
                          <button class='cusBtn' style='width:35%;background-color:black;color:white'>
                          <font>Discard All</font>
                          </button>
                        </a>&nbsp;
                        
                      </td>";
                      // <a href='cart.php'>
                        //   <input type='submit' class='cus' style='width:35%;background-color:black;color:white'>
                        //   <font>Refresh</font>
                        //   </button>
                        // </a>&nbsp;
                      echo "<td colspan='2' style='text-align:right;border:none';>
                        <div style='padding:2%'>TOTAL : <b>".$total.".BDT</b></div>
                      </td>

                      
                      <td colspan=2' align='center' style='padding:1%;border:none'>
                      <a href='confirm.php'>
                        <button class='cusBtn' style='width:55%;background-color:black;color:white'>
                        Purchase
                        </button>
                      </a>
                    </td>
                    </tr>
                    </table>";
                    $_SESSION['amount'] = $total;

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
                            <h1>Cart is Empty  <i class='fa fa-shopping-cart' aria-hidden='true'></i></h1></h1>
                          </td>
                        </tr>
                      </table>";
                }



          // echo "<a href='destroy.php'>Delete</button>";
         ?>
        </div>
        <?php include("footer.php"); ?>
  </center>
  
