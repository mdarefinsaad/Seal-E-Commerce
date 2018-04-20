
<?php
	// var_dump($GLOBALS);
	include('dash_header.php'); 
 ?>

 <table>
  <tr>
    <img src="bg/users.jpg" width="100%">
  </tr>
</table>
	<!--Logo and the Search bar -->
	<table class="srchBx">
			<tr>
				<td align="right" >
					<img src="image/demologo1.png" width="25%" style="margin:2% 3% 2% 2%"><br>
					<font size="3" Color="white">"Our Service is Best"</font>
					<h1></h1>
				</td>
				<td width="70%">
					<form method="post">
					<font face="sans-serif" size="3" color="white">&emsp;I'm looking for ...</font><br>
					<input type="search" height="200px" name='searchUser' onkeyup="request(this.value)" class="txtbx"/>
					<button type="submit" class="cusBtn"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
				</form>
				</td>
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
	<!-- Shop page -->
<table align="center" width="70%">
<tbody>
<tr>
	<td width="65%">
				<div class="cusDiv2">
				<?php
					$host = 'localhost';
					$user = 'root';
					$dpass = '';
					$db = 'seal';

					$con = mysqli_connect($host,$user,$dpass,$db);
					echo "<table><center><h1 style='color:white'><b>Users <i class='fa fa-users' aria-hidden='true'></i></u></b></h1><center>";
					if(empty($_POST['searchUser']))
					{
						
						$query = "SELECT * FROM user";
							$i = 0;
							$result = mysqli_query($con,$query);
							if($result)
							{
									
									while($row = mysqli_fetch_assoc($result))
									{
										global $i;$i++;
										echo"<td>
															<div class='proBackg'>
																	 <center>
																			<a href='viewUser.php'  onclick='getUserId($row[userid])'>
																			<img class='proImg' src='$row[image]' width='90%'></a>
																	 </center>
																	 <p><b>User id  : $row[userid]</b></p>
																	 <p><b>Name : $row[name]</b></p>
																	 <p>Username : $row[username]</p>
																	 
																	 
																	 <p>Gender : $row[gender]</p>
																	 
																	 <center>
																	 <a href='delUser.php' onclick='delUser($row[userid])'>
																		<button class='cusBtn' style='width:70%'>
																				<font size='3'>Delete</font>
																		</button>
																	 </a>

																	<a href='editUser.php' onclick='getUserId($row[userid])'>
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
									
							}
							else
							{
								echo "EROOR";
							}

					}
					else
					{
						$x = $_POST['searchUser'];

						$query = "SELECT * FROM user 
	                    WHERE userid LIKE '%$x%' OR name LIKE '%$x%' OR username LIKE '%$x%' 
	                    or email LIKE '%$x%' OR gender LIKE '%$x%' 
	                    OR area LIKE '%$x%' OR mobile LIKE '%$x%'
	                    OR address LIKE '%$x%'";

	                    $nothingFound = true;
						$i = 0;
						$result = mysqli_query($con,$query);
						if($result)
						{
								
								while($row = mysqli_fetch_array($result))
								{
									$nothingFound = false;

									global $i;$i++;
									echo"<td>
														<div class='proBackg'>
																 <center>
																		<a href='viewUser.php'  onclick='getUserId($row[userid])'>
																		<img class='proImg' src='$row[image]' width='90%'></a>
																 </center>
																 <p><b>User Id : $row[userid]</b></p>
																 <p><b>Name : $row[name]</b></p>
																 <p>Username : $row[username]</p>
																 
																 
																 <p>Gender : $row[gender]</p>
																 
																 <center>
																 <a href='delUser.php' onclick='delUser($row[userid])'>
																	<button class='cusBtn' style='width:70%'>
																			<font size='3'>Delete</font>
																	</button>
																 </a>

																<a href='editUser.php' onclick='getUserId($row[userid])'>
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
	                              <tr style='border:none'>
	                                <td colspan='8'><br><h1 style='color:white'>Nothing Found :( </h1><br></td>
	                              </tr>"; 
								}
								

						}
						else
						{
								echo "<script type='text/javascript'> alert('Error Happened/Value Exist')</script>";
						}
					}
					echo "</table>";
				?>
				</div>
</td>
</tr>
</tbody>
</table>
</body>
<?php include('footer.php'); ?>
