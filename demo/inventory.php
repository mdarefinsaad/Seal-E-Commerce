<?php
    session_start();ob_start();
    // var_dump($GLOBALS);
    include('dash_header.php');

                  $host = 'localhost';
                  $user = 'root';
                  $dpass = '';
                  $db = 'seal';
                  $con = mysqli_connect($host,$user,$dpass,$db);
?>


  <table>
  <tr>
    <img src="bg/inventory.jpg" width="100%">
  </tr>
</table>
      <!-- Welcome to Seal-->
      <!-- <img src="Bg.png" width="100%"> -->

      <!--Logo and the Search bar -->
      <table class="srchBx">
          <tr>
            <td align="right" >
              <img src="image/demologo1.png" width="25%" style="margin:2% 3% 2% 2%"><br>
              <font size="3" Color="white">"Our Service is Best"</font>
              <h1></h1>
            </td>
            <td width="70%">
              <form method='post'>
              <font face="sans-serif" size="3" color="white">&emsp;I'm looking for ...</font><br>
              <input type="search" height="200px" name='searchItem' class="txtbx"/>
              <button type="submit" class="cusBtn"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
            </form>
            </td>
          </tr>
      </table>
      <br>


      <!-- Left SIdebar -->
      <div style="padding:5%;display:inline-block;float:left">
              <nav role='sub'>
              <span>
                  <ul>
                 <li><a class="active"><b>Admin Panel</b></a></li>
                 <li><a href="dash.php">Dashboard</a></li>
                 <li><a href="admin.php"><b>ADMIN</b></a></li>
                 <li><a href="user.php">Users</a></li>
                 <li><a href="inventory.php" id='inventory'>Inventory</a></li>
                  <li><a href="addChoose.php">Add New</a></li>
                  <li><a href="log.php">Purchase history</a></li>
                 <li><a href="status.php">Status</a></li>
                 <li><a href="report.php">Report</a></li>
                 <li><a href="freport.php">Financial Report</a></li>
                </ul>
                </span>
                <br><br>
                <span>
                  <ul>
                    <li><a class="active"><b>Catagory</b></a></li>
                    <li><a href='' id='all'><b>All</b></a></li>
                    <?php 
                        $query = "SELECT catg from product group by catg";
                        $result = mysqli_query($con,$query);
                        if($result)
                        {
                          while($row = mysqli_fetch_assoc($result))
                          {
                            echo "<li><a href='' id='$row[catg]'>$row[catg]</a></li>";
                          }
                        }
                     ?>
                </ul>
                </span>
                <br><br>
                <span >
                  <ul>
                 <li><a  class="active"><b>Brand</b></a></li>
                 <?php 
                        $query = "SELECT brand from product group by brand";
                        $result = mysqli_query($con,$query);
                        if($result)
                        {
                          while($row = mysqli_fetch_assoc($result))
                          {
                            echo "<li><a href='' id='$row[brand]'>$row[brand]</a></li>";
                          }
                        }
                     ?>
                </ul>
                </span>
              </nav>
        </div>


        <!-- Shop page -->
       <div style="width:70%;display:inline-block">
                <?php
                  
                  $getCookie = $_COOKIE['searchBy'];

                  
                  if(!empty($_COOKIE['searchBy']))
                  {

                    if($getCookie == "mobile" || $getCookie == "tablet" || $getCookie == "laptop" ||
                      $getCookie == "desktop" || $getCookie == "tv")
                      {
                        $query = "SELECT * FROM product WHERE catg='$getCookie'";
                        $result = mysqli_query($con,$query);
                        if($result)
                        {
                            // echo "<script type='text/javascript'>alert('yes');</script>";
                            $nothingFound = true;
                            $i = 0;
                            echo "<table cellpadding='15%'>";
                            while($row = mysqli_fetch_assoc($result))
                            {
                              $nothingFound = false;
                              global $i;
                              $i++;
                              echo"<td>
                                        <div class='proBackg'>
                                             <center>
                                                <a href='product.php' onclick='getProId($row[id])'>
                                                  <img class='proImg' src='$row[image]' width='90%'>
                                                </a>
                                             </center>
                                             <p><b>$row[name]</b></p>
                                             <p>Price : $row[price]</p>
                                             <p>Color : $row[color]</p>

                                             <center>
                                            <a href='delPro.php' onclick='delPro($row[id])'>
                      												<button class='cusBtn' style='width:70%'>
                      														<font size='3'>Delete</font>
                      												</button>
                      											 </a>

                      <a href='editPro.php' onclick='getProId($row[id])'>
												<button class='cusBtn2' style='width:20%'>
													<i class='fa fa-pencil-square' aria-hidden='true'></i>
												</button>
											</a>

                                             </center>
                                             <h1></h1>
                                         </div>
                                         <br>
                                     </td>";
                                     if($i == 3)
                                     {
                                       $i = 0;
                                       echo "<tbody>";
                                     }
                            }
                            if($nothingFound)
                            {
                              echo"
                              <tr>
                                <td><br><br><h1 style='color:white'>Nothing Found ... !!!</h1></td>
                              </tr>";
                            }
                            echo "</table>";

                        }
                      }
                      else
                      {
                        $query = "SELECT * FROM product WHERE brand='$getCookie'";
                        $result = mysqli_query($con,$query);
                        if($result)
                        {
                            $nothingFound= true;
                            $i = 0;
                            echo "<table cellpadding='15%'>";
                            while($row = mysqli_fetch_assoc($result))
                            {
                              $nothingFound = false;
                              global $i;
                              $i++;
                              echo"<td>
                                        <div class='proBackg'>
                                             <center>
                                                <a href='product.php'  onclick='getProId($row[id])'><img class='proImg' src='$row[image]' width='90%'></a>
                                             </center>
                                             <p><b>$row[name]</b></p>
                                             <p>Price : $row[price]</p>
                                             <p>Color : $row[color]</p>
                                             <center>
                                             <a onclick='ToCart($row[id])'>
                                             <a href='delPro.php' onclick='delPro($row[id])'>
												<button class='cusBtn' style='width:70%'>
														<font size='3'>Delete</font>
												</button>
											 </a>

                          <a href='editPro.php' onclick='getProId($row[id])'>
                        <button class='cusBtn2' style='width:20%'>
                          <i class='fa fa-pencil-square' aria-hidden='true'></i>
                        </button>
                      </a>

                                             </center>
                                             <h1></h1>
                                         </div>
                                         <br>
                                     </td>";
                                     if($i == 3)
                                     {
                                       $i = 0;
                                       echo "<tbody>";
                                     }
                            }
                            if($nothingFound)
                            {
                              echo"
                              <tr>
                                <td><br><br><h1 style='color:white'>Nothing Found ... !!!</h1></td>
                              </tr>";
                            }
                            echo "</table>";

                        }
                      }
                  }
                  else if (!empty($_POST['searchItem'])) 
                  {
                    $x = $_POST['searchItem'];
                    $query = "SELECT * FROM product 
                    WHERE name LIKE '%$x%' OR brand LIKE '%$x%' 
                    or catg LIKE '%$x%' OR price LIKE '%$x%'
                    OR color LIKE '%$x%'";
                    $nothingFound = true;
                    $result = mysqli_query($con,$query);
                     if($result)
                    {
                        $i = 0;
                        echo "<table>";
                        while($row = mysqli_fetch_assoc($result))
                        {
                          $nothingFound = false;
                          global $i;
                          $i++;
                          echo"<td>
                                    <div class='proBackg'>
                                         <center>
                                            <a href='product.php'  onclick='getProId($row[id])'><img class='proImg' src='$row[image]' width='90%'></a>
                                         </center>
                                         <p><b>$row[name]</b></p>
                                         <p>Price : $row[price]</p>
                                         <p>Color : $row[color]</p>
                                         <center>
                                         <a onclick='ToCart($row[id])'>
                                          <button class='cusBtn' style='width:70%'>
                                              <font size='3'>Add to Cart</font>
                                          </button>
                                         </a>

                                            <a onclick='ToWish($row[id])'>
                                            <button class='cusBtn2' style='width:20%'>
                                                    <i class='fa fa-heart' aria-hidden='true'></i>
                                            </button>
                                            </a>

                                         </center>
                                         <h1></h1>
                                     </div>
                                     <br>
                                 </td>";
                                 if($i == 3)
                                 {
                                   $i = 0;
                                   echo "<tbody>";
                                 }
                        }
                        if($nothingFound)
                            {
                              echo"
                              <tr>
                                <td><br><br><h1 style='color:white'>Nothing Found ... !!!</h1></td>
                              </tr>";
                            }
                        echo "</table>";
                    }

                  }
                  else
                  {
                    $_COOKIE['searchBy'] = "";
                    $query = "SELECT * FROM product";
                    $result = mysqli_query($con,$query);
                    if($result)
                    {
                        $i = 0;
                        echo "<table cellpadding='15%'>";
                        while($row = mysqli_fetch_assoc($result))
                        {

                          global $i;
                          $i++;
                          echo"<td>
                                    <div class='proBackg'>
                                         <center>
                                            <a href='product.php'  onclick='getProId($row[id])'><img class='proImg' src='$row[image]' width='90%'></a>
                                         </center>
                                         <p><b>$row[name]</b></p>
                                         <p>Price : $row[price]</p>
                                         <p>Color : $row[color]</p>
                                         <center>
                                         <a href='delPro.php' onclick='delPro($row[id])'>
												<button class='cusBtn' style='width:70%'>
														<font size='3'>Delete</font>
												</button>
										 </a>

                      <a href='editPro.php' onclick='getProId($row[id])'>
                        <button class='cusBtn2' style='width:20%'>
                          <i class='fa fa-pencil-square' aria-hidden='true'></i>
                        </button>
                      </a>

                                         </center>
                                         <h1></h1>
                                     </div>
                                     <br>
                                 </td>";
                                 if($i == 3)
                                 {
                                   $i = 0;
                                   echo "<tbody>";
                                 }
                        }
                        echo "</table>";

                    }
                  }
                ?>
                </div>
        </td>
      </tr>
    </tbody>
    </table>
    </body>


    <?php include_once("footer.php");
     ?>
