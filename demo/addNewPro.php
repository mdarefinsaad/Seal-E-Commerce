<?php include('dash_header.php');  var_dump($GLOBALS);?>
  <table>
  <tr>
    <img src="bg/addproduct.jpg" width="100%">
  </tr>
</table>

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

 <table width="70%">
    <tr align="center">
      <td>
          <div class="proBackg"s style="width: 768px"><br>
          <font size="6">Product Information :</font>
              <form method="post" enctype="multipart/form-data"><br>

                <input type="text" name="name" placeholder="Product's Name" required="required"/><br><br>
                <!-- <input type="text" name="brand" placeholder="Brand" required="required"/><br><br> -->
                <input type="text" name="color" placeholder="Color" required="required"/><br><br>
                <input type="text" name="quantity" placeholder="Quantity" required="required"/><br><br>
                <input type="text" name="price" placeholder="Selling Price" required="required"/><br><br>
                <input type="text" name="Bprice" placeholder="Buying Price" required="required"/><br><br>
                Brand :
                <input type="text" name="brand" placeholder="Brand" required="required"/><br><br>

                Category :
                <input type="text" name="category" placeholder="category" required="required"/><br><br>
                
                Image :
                <input type="file" name="fileToUpload" required="required"/><br><br>

                <input type="submit" value="Insert"/>
          </div>
      </td>
    </tr>
 </table>
 <?php include('footer.php') ?>
 <?php



    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       if(!empty($_POST['name']) && !empty($_POST['category'])&& !empty($_POST['brand']) 
        &&!empty($_POST['quantity']) && !empty($_POST['price']) &&!empty($_POST['Bprice']) 
        && !empty($_POST['color'])
        && !empty($_FILES['fileToUpload']['name']))
          {
              echo "<script type='text/javascript'> alert('Yes')</script>";
              $name = trim(strtolower($_POST['name']));
              $category = trim(strtolower($_POST['category']));
              $brand = trim(strtolower($_POST['brand']));
              $sold = 0;
              $price = trim($_POST['price']);
              $Bprice = trim($_POST['Bprice']);
              $color = trim(strtolower($_POST['color']));
              $quantity = trim($_POST['quantity']);
              $Cquan = trim($_POST['quantity']);
              $image = $_FILES['fileToUpload']['name'];

                        //file Upload
                        $image = "image/".$_FILES["fileToUpload"]["name"];
                        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $image);

              //Database
              $host = 'localhost';
              $user = 'root';
              $dpass = '';
              $db = 'seal';

              $con = mysqli_connect($host,$user,$dpass,$db);
              $query = "INSERT into product(name,catg,brand,color,Cquan,quantity,sold,price,Bprice,image)
              VALUES ('$name','$category','$brand','$color','$Cquan','$quantity','$sold','$price','$Bprice','$image')";
              $result = mysqli_query($con,$query);
              var_dump($result);
              if($result)
              {
                  echo "<script type='text/javascript'> alert('Value Inserted')</script>";
                  echo "<script type='text/javascript'>window.location.href = 'http://localhost/demo/inventory.php';</script>";

              }
              else
              {
                  echo "<script type='text/javascript'> alert('Error Happened/Value Exist')</script>";
              }

        }
    }



    //$con = mysqli_connect($host,$user,$dpass,$db);
?>
