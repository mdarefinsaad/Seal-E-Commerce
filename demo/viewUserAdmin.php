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

		  <!--Product info -->
			<div>
				<?php

							$host = 'localhost';
							$user = 'root';
							$dpass = '';
							$db = 'seal';

							$con = mysqli_connect($host,$user,$dpass,$db);
							$coke = $_COOKIE['adminId'];
							$query = "SELECT * FROM admin WHERE adminid='$coke'";
                            echo "<div style='padding:5%;display:inline-block;float:left'>
                                        <br><br><br><br>
                                      <nav role='sub'>
                                        <span>
                                          <ul>
                                         <li><a class='active'><b>Admin Panel</b></a></li>
                                         <li><a href='dash.php'>Dashboard</a></li>
                                         <li><a href='admin.php'><b>ADMIN</b></a></li>
                                         <li><a href='user.php'>Users</a></li>
                                         <li><a href='addChoose.php'>Add New</a></li>
                                         <li><a href='inventory.php'>Inventory</a></li>
                                         <li><a href='log.php'>Log</a></li>
                                         <li><a href='status.php'>Status</a></li>
                                         <li><a href='report.php'>Report</a></li>
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
                                                <p>Admin Id : <b>$row[adminid]</b></p>
                                                <b>$row[name]</b></h1>
                                                <hr>
                                                <font size='4'>
                                                <p><b>Name : $row[name]</b></p>
                                                <p>Username : $row[username]</p>
                                                <p>Email : $row[email]</p>
                                                <p>Gender : $row[gender]</p>
                                                <p>Mobile no. : 0$row[mobile]</p>
                                                <p>Address : $row[address]</p></font>


                                                <a href='delAdmin.php' onclick='delAdmin($row[adminid])'>
                                                  <button class='cusBtn'style='width:50%;margin-bottom:10%'>
                                                      <font size='3'>Delete</font>
                                                  </button>
                                                </a>

                                                <a href='editAdmin.php' onclick='getAdminId($row[adminid])'>
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


	</body>
</html>
