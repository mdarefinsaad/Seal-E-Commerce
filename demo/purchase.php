<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form method='post'>
    <input type="submit" name="yes" value='yes'>  
    <input type="submit" name="no" value='no'>  
  </form>
</body> 

</html>

<?php 
      session_start();ob_start();
      var_dump($_COOKIE);
      if(!empty($_COOKIE['loggedInUser']))
      {
        if($_COOKIE['TypeUser'] != 'customer')
        {
          header('location:signin.php');
        }
      }
      else
      {
        header('location:signin.php');
      }

      if(!empty($_POST['yes']))
      {
        //echo "<script type='text/javascript'>alert('In');</script>";
                        $host = 'localhost';
                        $user = 'root';
                        $db = 'seal';
                        $dpass = '';

                        $con = mysqli_connect($host,$user,$dpass,$db);

                        $cartCookie = $_COOKIE['cart'];
                        $cartItem = explode(",",$cartCookie);
                        

                        $proid = "";
                        $quan = "";
                        $user = "";

                        $dd = (string)date("d-m-Y");
                        $tt = (string)date("h:i:sa");

                        print($dd."<br>".$tt);

                        echo "<script type='text/javascript'>alert('In');</script>";

                        for($i = 0;$i < count($cartItem);$i++)
                        {
                            $id = $cartItem[$i];
                            foreach ($_COOKIE as $key => $value) 
                            {
                                if($key == $id)
                                {
                                  $proid = $key;
                                  $quan = $value;
                                  $user = $_COOKIE['loggedInUser'];

                    

                                  //This query checks 
                                  $query2 = "SELECT quantity FROM PRODUCT WHERE id = '$proid'";
                                  $result2 = mysqli_query($con,$query2);

                                  $query3 = "SELECT sold FROM PRODUCT WHERE id = '$proid'";
                                  $result3 = mysqli_query($con,$query3);
                                  if($result2 && $result3)
                                  {
                                    $row=mysqli_fetch_assoc($result2);
                                    $row2=mysqli_fetch_assoc($result3);

                                    $quanCheck = $row['quantity'];
                                    $num = $quanCheck - $quan;

                                    $TotalSold = $row2['sold'] + $quan;

                                    
 
                                    if($num >= 0)
                                    {                                        
                                          $updateQuery = "UPDATE PRODUCT SET quantity='$num',sold='$TotalSold' WHERE id='$proid'";
                                          $resUpdate = mysqli_query($con,$updateQuery);
                                          if($resUpdate){print("Updated");}else{print("NotUpdated");}


                                          // //Inserting Value to Log
                                          $insertQuery = "INSERT INTO log(userid,date,id,quan,time)VALUES ('$user','$dd','$proid','$quan','$tt')";
                                          $resultForAddingRow = mysqli_query($con, $insertQuery);
                                          if($resultForAddingRow){echo "Row Inserted";}else{echo "Not Inserted";}
                                          header('location:destroy.php');

                                    }
                                    else
                                    {
                                          echo "<script type='text/javascript'>alert('Out of Quantity...Please Check your cart');</script>";
                                          header("location:cart.php");
                                    }
                                  }
                                }
                            }

                        }
                            
                            // $user = $_COOKIE['loggedInUser'];
                            // $query ="SELECT * FROM log WHERE id='$user'";
                            // $result = mysqli_query($con, $query);
                            // if($result)
                        //     {

                        //       if($row=mysqli_fetch_assoc($result))
                        //       {
                        //         $total = $row['total'].",".$total;
                                
                        //         if($date != $row['dd'])
                        //         {

                        //           $item = $row['item'].",".$item;
                        //         }
                        //         else
                        //         {
                        //           $item = $row['item'].",".$item;
                        //         }

                        //         $date = $row['dd'].",".$date;
                        //         $updateQuery =  "UPDATE log SET total='$total',item='$item',dd='$date' WHERE id='$user'";
                            
                        //         $result = mysqli_query($con,$updateQuery);
                        //         if($result)
                        //         {
                        //           echo "Updated";
                        //         }     
                        //         else
                        //         {
                        //           echo "Not Updated";
                        //         }
                        //       }
                        //       else
                        //       {

                                    // $insertQuery = "INSERT INTO log(id,dd,total,item)
                                    // VALUES ('$user','$date','$total','$item')";
                                    // $resultForAddingRow = mysqli_query($con, $insertQuery);
                                    // if($resultForAddingRow){echo "Row Inserted";}else{echo "Not Inserted";}
                                  
                        //       }
                        //     }
                        //     else
                        //     {
                        //       echo "<script type='text/javascript'>alert('Not Done');</script>";
                        //     }
                        // }      


                        // $cartCookie = $_COOKIE['cart'];
                        // $cartItem = explode(",",$cartCookie);
                        // for($i = 0;$i < count($cartItem);$i++)
                        // {
                          
                        //   //Grabbing all the info of all these Item in Cart
                        //   $x = $cartItem[$i];
                        //   $query = "SELECT * FROM product WHERE id='$x'";
                        //   $result = mysqli_query($con,$query);
                        //   if($result)
                        //   {
                        //     while($row = mysqli_fetch_assoc($result))
                        //     {
                        //       foreach ($_COOKIE as $key => $value) 
                        //       {
                        //         if($row['id'] == $key)
                        //         {
                        //           $x = $row['quantity'] - $value;
                        //           $productId = $row['id'];
                        //           if($x > 0)
                        //           { 
                        //             // Updating the quantity of the Product
                        //             $upQuery = "UPDATE product SET quantity='$x' WHERE id='$productId'";
                        //             $result1 = mysqli_query($con,$upQuery);
                        //             if($result1)
                        //             {
                        //                 header('location:destroy.php');
                        //             }
                        //             else
                        //             {
                        //               echo "Error";
                        //             }
                        //           }
                        //           else if($x == 0)
                        //           {
                        //             $delQuery = "DELETE FROM product WHERE id='$productId'";
                        //             $result2 = mysqli_query($con,$delQuery);
                        //             if($result2)
                        //             {
                        //               header('location:destroy.php');
                        //             }
                        //             else
                        //             {
                        //               echo "Error Del";
                        //             }
                        //           }
                        //           else
                        //           {
                        //             // echo "<script type='text/javascript'>
                        //             //   alert('We do not have sufficient quantity.');</script>";
                        //             header('location:cart.php');
                        //           }

                        //         }
                        //       }
                              
                        //     }
                        //   }
                        //   else
                        //   {
                        //     echo "First Q Error";
                        //   }
                        // }
      }
      else
      {
          echo "<script type='text/javascript'>alert('Out');</script>";
      }
?>
