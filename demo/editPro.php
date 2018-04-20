<?php

include('dash_header.php');  
ob_start()

?>
<div style="padding:5%;display:inline-block;float:left">
              <nav role='sub'>
                <span>
                  <ul>
                 <li><a class="active"><b>Admin Panel</b></a></li>
                 <li><a href="dash.php">Dashboard</a></li>
                 <li><a href="admin.php"><b>ADMIN</b></a></li>
                 <li><a href="user.php">Users</a></li>
                 <li><a href="inventory.php">Inventory</a></li>
                 <li><a href="addChoose.php">Add New</a></li>
                 <li><a href="log.php">Purchase History</a></li>
                 <li><a href="status.php">Status</a></li>
                 <li><a href="report.php">Report</a></li>
                 <li><a href="freport.php">Finance Report</a></li>
                </ul>
                </span>
              </nav>
 </div>


<?php 
      $host = 'localhost';
      $user = 'root';
      $dpass = '';
      $db = 'seal';

      $con = mysqli_connect($host,$user,$dpass,$db);
      if(!empty($_COOKIE['ProId']))
      {
        $coke = $_COOKIE['ProId'];
        $query = "SELECT * FROM product WHERE id='$coke'";

        $result = mysqli_query($con,$query);
        if($result)
        {
          while($row = mysqli_fetch_assoc($result))
          {
                    echo "
                    <table width='70%'>
                    <tr width='50%' align='center'>
                      <td width='50%' align='center'>
                             <img class='proImg1' src='$row[image]' width='80%'></a>
                      </td>
                      <td>
                          <div class='proBackg' style='width: 400px'><br>
                          <font size='6'>Product Information :</font>
                              <form method='post' enctype='multipart/form-data'><br>


                              <input type='hidden' name='id' value='$row[id]'/><br><br>

                                <input type='text' name='name' placeholder='Product's Name' required='required' value='$row[name]'/><br><br>

                                <input type='text' name='color' placeholder='Color' required='required' value='$row[color]'/><br><br>

                                <input type='text' name='quantity' placeholder='Quantity' required='required' value='$row[quantity]'/><br><br>

                                <input type='text' name='price' placeholder='Selling Price' required='required' value='$row[price]'/><br><br>

                                <input type='text' name='Bprice' placeholder='Buying Price' required='required' value='$row[Bprice]'/><br><br>

                                <input type='text' name='brand' placeholder='Price' required='required' value='$row[brand]'/><br><br>

                                <input type='text' name='category' placeholder='Price' required='required' value='$row[catg]'/><br><br>";
                                
                                 
                               
                                
                            
                                echo "<input type='file' name='fileToUpload' accept='.png,.jpg'/><br><br>
                                
                                <input type='submit' value='Update'/>
                                
                            </form>
                            <a href='product.php'>
                                  <button>Cancel</button>
                            </a><br><br>
                          </div>
                      </td>
                    </tr>
                 </table>
                    ";
          }
        }
    }
       
?>
 <?php include('footer.php') ?>



 <?php



    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
       if(!empty($_POST['name']) && !empty($_POST['category'])&& !empty($_POST['Bprice'])
        && !empty($_POST['brand']) 
        &&!empty($_POST['quantity']) && !empty($_POST['price']) && !empty($_POST['color']))
          {
              $id = $_POST['id'];
              $name = $_POST['name'];
              $category = $_POST['category'];
              $brand = $_POST['brand'];
              $Bprice = $_POST['Bprice'];
              $price = $_POST['price'];
              $color = $_POST['color'];
              $Cquan = $_POST['quantity'];
              $quantity = $_POST['quantity'];
              $image = "";

              $c = "";
              $q = "SELECT Cquan from product where id='$id'";
              $r = mysqli_query($con,$q);
              if($r)
              {
                while($row = mysqli_fetch_array($r))
                {
                  $c = $row['Cquan'];
                }
              }
              if(!empty($_FILES['fileToUpload']['name']))
              {
                $image = $_FILES['fileToUpload']['name'];; 
              }

              //Database
              $host = 'localhost';
              $user = 'root';
              $dpass = '';
              $db = 'seal';
              $result = "";

              $con = mysqli_connect($host,$user,$dpass,$db);
              if($image == "")
              {
                if($c >= $quantity)
                {
                 $query =  "UPDATE product SET name='$name',catg='$category',brand='$brand' 
                        ,color='$color',quantity='$quantity',price='$price',Bprice='$Bprice' 
                        WHERE id='$id'";
                        $result = mysqli_query($con,$query); 
                }
                else
                {
                    $query =  "UPDATE product SET name='$name',catg='$category',brand='$brand' 
                        ,color='$color',Cquan='$Cquan',quantity='$quantity',price='$price',Bprice='$Bprice' 
                        WHERE id='$id'";
                        $result = mysqli_query($con,$query);  
                }
              }
              else
              {
                if($c >= $quantity)
                {
                  $image = "users/".$_FILES["fileToUpload"]["name"];
                  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image);
                  $query =  "UPDATE product SET name='$name',catg='$category',brand='$brand' 
                        ,color='$color',quantity='$quantity',price='$price',Bprice='$Bprice',
                        image='$image' 
                        WHERE id='$id'";
                  $result = mysqli_query($con,$query);
                }
                else
                {
                  $image = "users/".$_FILES["fileToUpload"]["name"];
                  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image);
                  $query =  "UPDATE product SET name='$name',catg='$category',brand='$brand' 
                        ,color='$color',Cquan='$Cquan',quantity='$quantity',price='$price',Bprice='$Bprice',
                        image='$image' 
                        WHERE id='$id'";
                  $result = mysqli_query($con,$query);
                }
              }
              
             
              // var_dump($result);
              if($result)
              {
                  echo "<script type='text/javascript'>
                      window.location = 'http://localhost/demo/product.php';
                  </script>";
              }
              else
              {
                  echo "<script type='text/javascript'> alert('Error Happened/Value Exist')</script>";
              }

        }
    }



    //$con = mysqli_connect($host,$user,$dpass,$db);
?>