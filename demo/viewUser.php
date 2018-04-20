<?php
    // session_start();

    if($_COOKIE['TypeUser'] == 'admin')
    {
        include("dash_header.php");
    }
    else
    {
        include("header.php");
    }    
?>

<style type="text/css">
  #pro{
      color : #4682b4;
      text-decoration: none !important;
  }
</style>
		  <!--Product info -->
			<div>
				<?php

							$host = 'localhost';
							$user = 'root';
							$dpass = '';
							$db = 'seal';

							$con = mysqli_connect($host,$user,$dpass,$db);
							$coke = $_COOKIE['UserId'];
							$query = "SELECT * FROM user WHERE userid='$coke'";
                            echo "<div style='padding:5%;display:inline-block;float:left'>
                                        <br><br><br><br>
                                      <nav role='sub'>
                                        <span>
                                          <ul>
                                         <li><a class='active'><b>Admin Panel</b></a></li>
                                         <li><a href='dash.php'>Dashboard</a></li>
                                         <li><a href='admin.php'><b>ADMIN</b></a></li>
                                         <li><a href='user.php'>Users</a></li>
                                         <li><a href='inventory.php'>Inventory</a></li>
                                         <li><a href='addChoose.php'>Add New</a></li>
                                         <li><a href='log.php'>Purchase History</a></li>
                                         <li><a href='status.php'>Status</a></li>
                                         <li><a href='report.php'>Report</a></li>
                                          <li><a href='freport.php'>Finance Report</a></li>
                                        </ul>
                                        </span>
                                      </nav>
                                </div>";
                            echo "<table style='padding:2%' width='70%' align='right'>";
							$result = mysqli_query($con,$query);
							if($result)
							{
									while($row = mysqli_fetch_assoc($result))
									{
                                        echo "
                                          <tr>
                                            <td align='center' style='padding:2%' width='50%'>
                                               <img class='proImg1' src='$row[image]' width='80%'>
                                            </td>

                                            <td style='margin:5%'>
                                                <div class='proBackg1'>
                                                <h1 style='text-shadow:0px 0px 2px black'>
                                                <p><b>User ID : $row[userid]</b></p>
                                                <b>$row[name]</b></h1>
                                                <hr>
                                                <font size='4'>
                                                <p><b>Name : $row[name]</b></p>
                                                <p>Username : $row[username]</p>
                                                <p>Email : $row[email]</p>
                                                 
                                                <p>Gender : $row[gender]</p>
                                                <p>Area : $row[area]</p>
                                                <p>Mobile no. : 0$row[mobile]</p>
                                                <p>Address : $row[address]</p></font>


                                                <a href='delUser.php' onclick='delUser($row[userid])'>
                                                  <button class='cusBtn'style='width:50%;margin-bottom:10%'>
                                                      <font size='3'>Delete</font>
                                                  </button>
                                                </a>

                                                <a href='editUser.php' onclick='getUserId($row[userid])'>
                                                <button class='cusBtn2' style='width:20%'>
                                                        <i class='fa fa-pencil-square' aria-hidden='true'></i>
                                                        </button>
                                                </a>
                                            </td>
                                         </tr>
                                        </table";
									}

                                echo "</table>";
									

							}
							else
							{
									echo "<script type='text/javascript'> alert('Error Happened/Value Exist')</script>";
							}

				?>
			</div>
      


      <?php 
                $coke = $_COOKIE['UserId'];
                $queryHis = "SELECT user.userid,user.name,product.id,log.quan,product.name as Pname,product.price,log.quan*product.price as Total,date, time from log,user,product where log.userid = user.userid and log.id = product.id and log.userid = '$coke'";
                $resultHis = mysqli_query($con,$queryHis);
            ?>        
            
            <table cellpadding='5%' width='100%' style='background-color: white;padding:2%;text-align: center'>
                <br><br><br><br><br><br>
                <center><font size='8' color='white'>Purchase History</font></center>
                <br><br><br>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Purchase Date</th>
                <th>Purchase Time</th>
                
                <?php 
                    if($resultHis)
                    {
                        while($row = mysqli_fetch_assoc($resultHis))
                        {
                            echo "<tr>
                            <td>
                                <a href='product.php' id='pro' onclick='getProId($row[id])'>$row[Pname]</a>
                            </td>
                            <td>
                                $row[price]
                            </td>
                            <td>
                                $row[quan]
                            </td>
                            <td>
                                $row[Total]
                            </td>
                            <td>
                                $row[date]
                            </td>
                            <td>
                                $row[time]
                            </td>
                            </tr>";
                        }
                    }
                    else
                    {
                        echo "jhamela ase ";
                    }
                 ?>

                
            </table>
            <br><br><br><br><br><br>

	</body>
</html>
