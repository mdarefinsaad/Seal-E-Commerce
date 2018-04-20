
<?php 
	
	include('dash_header.php');  
	// var_dump($GLOBALS);
?>




<table>
  <tr>
    <img src="bg/admin.jpg" width="100%">
  </tr>
</table>

	<!--Logo and the Search bar -->

	<br>
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
	<!-- Shop page -->
	<table  align="center" width="60%">
		<tbody>
		<tr>
			<td width="50%">
						<div class="cusDiv2">
						<?php
							$host = 'localhost';
							$user = 'root';
							$dpass = '';
							$db = 'seal';

							$con = mysqli_connect($host,$user,$dpass,$db);
							$query = "SELECT * FROM user";
							$i = 0;
							$result = mysqli_query($con,$query);
							if($result)
							{
									echo "<table width='90%'><center><h1 style='color:white'><b>Users <i class='fa fa-users' aria-hidden='true'></i></u></b></h1><center>";
									while($row = mysqli_fetch_assoc($result))
									{
										global $i;$i++;
										echo"<td>
															<div class='proBackg'>
																	 <center>
																			<a href='viewUser.php'  onclick='getUserId($row[userid])'>
																			<img class='proImg' src='$row[image]' width='90%'></a>
																	 </center>
																	 <p><b>Name : $row[name]</b></p>

																	 <p>Username : $row[username]</p>
																	 
																	 <p>Gender : $row[gender]</p>
				
																	 <center>
																	 <a href='viewUser.php' onclick='getUserId($row[userid])'>
																		<button class='cusBtn' style='width:70%'>
																				<font size='3'>Details  <i class='fa fa-info-circle' aria-hidden='true'></i></font>
																		</button>
																	 </a>
																	 </center>
																	 <h1></h1>
															 </div>
															 <br>
													 </td>";
													 if($i == 3)
													 {
														 echo"<td>
																<center>
																<br>
																<a href='user.php'>
																 <button class='cusBtn2' style='width:110%'>
																		 <font size='1'>View All</font>
																 </button>
																</a>

																</center>
																<h1></h1>
																<br>
														</td>";
																		break;
													 }
									}
									echo "</tbody></table>";

							}
							else
							{
									echo "<script type='text/javascript'> alert('Error Happened/Value Exist')</script>";
							}
						?>

						<?php
							$host = 'localhost';
							$user = 'root';
							$dpass = '';
							$db = 'seal';

							$con = mysqli_connect($host,$user,$dpass,$db);
							$query = "SELECT * FROM product";
							$i = 0;
							$result = mysqli_query($con,$query);
							if($result)
							{
									echo "<table  width='90%'><center><h1 style='color:white'><b>Inventory <i class='fa fa-archive' aria-hidden='true'></i></u></b></h1><center>";
									while($row = mysqli_fetch_assoc($result))
									{
										global $i;$i++;
										echo"<td>
															<div class='proBackg'>
																	 <center>
																			<a href='product.php'  onclick='getProId($row[id])'>
																			<img class='proImg' src='$row[image]' width='90%'></a>
																	 </center>
																	 <p><b>$row[name]</b></p>
																	 <p>Brand : $row[brand]</p>
																	 <p>Quantity : $row[quantity]</p>
																	 
																	 <center>
																	 <a href='product.php' onclick='getProId($row[id])'>
																		<button class='cusBtn' style='width:70%'>
																				<font size='3'>Details  <i class='fa fa-info-circle' aria-hidden='true'></i></font>
																		</button>
																	 </a>
																	 </center>
																	 <h1></h1>
															 </div>
															 <br>
													 </td>";
													 if($i == 3)
													 {
														 echo"<td>

																<center>
																<br>
																<a href='inventory.php'>
																 <button class='cusBtn2' style='width:110%'>
																		 <font size='1'>View All</font>
																 </button>
																</a>

																</center>
																<h1></h1>

																<br>
															</td>";
																		break;

													 }
									}
									echo "</table>";

							}
							else
							{
									echo "<script type='text/javascript'> alert('Error Happened/Value Exist')</script>";
							}
						?>
						</div>
		</td>
	</tr>
</tbody>
</table>

<?php include('footer.php'); ?>

</body>
