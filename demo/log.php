<?php
	include('dash_header.php'); 
 ?>
<style type="text/css">
	#asd{
		color : #4682b4;
	}
</style>
 	<table>
  <tr>
    <img src="bg/log.jpg" width="100%">
  </tr>
</table>

	<!--Logo and the Search bar -->


	<div style="padding:5%;display:inline-block;float:left">
				<br><br>
              <nav role='sub'>
                <span>
                  <ul>
                 <li><a class="active"><b>Admin Panel</b></a></li>
                 <li><a href="dash.php">Dashboard</a></li>
                 <li><a href="admin.php"><b>ADMIN</b></a></li>
                 <li><a href="user.php">Users</a></li>
                 <li><a href="inventory.php">Inventory</a></li>
                 <li><a href="addChoose.php">Add New</a></li>
                 <li><a href="log.php">Purhcase History</a></li>
                 <li><a href="status.php">Status</a></li>
                 <li><a href="report.php">Report</a></li>
                 <li><a href="freport.php">Financial Report</a></li>
                </ul>
                </span>
              </nav>
    </div>
	<!-- Shop page -->
					<div class="cusDiv">
						<?php

							$host = 'localhost';
							$user = 'root';
							$dpass = '';
							$db = 'seal';
							$con = mysqli_connect($host,$user,$dpass,$db);


							echo "
							<table  cellpadding='10%' style='background-color:white'>
								<th>User Id</th>
								<th>User's Name</th>
								<th>Purchase Date</th>
								<th>Purchase Time</th>
								<th>Purchased Product Id</th>
								<th>Purchased Product Name</th>
								<th>Quantity</th>";


							

							// First find out all the users
							$query = "SELECT log.userid FROM log group by log.userid";
							$result = mysqli_query($con,$query);
							if($result)
							{
										while($row = mysqli_fetch_assoc($result))
										{	
											$usr = $row['userid'];
											
											$query2 = "SELECT user.userid,user.name as uname, 
											                  log.date,log.time, 
											                  product.id,product.name as pname,log.quan 
											                  FROM user,product,log 
											                  WHERE user.userid = log.userid 
											                  and log.id = product.id 
											                  and log.userid = '$usr'";
											$result2 = mysqli_query($con,$query2);
											if($result2)
											{
												while($row2 = mysqli_fetch_assoc($result2))
												{
													echo "
														<tr align='center'>
														<td><a href='viewUser.php' id='asd' onclick='getUserId($row2[userid])'>$row2[userid]</a></td>
														<td><a href='viewUser.php' id='asd' onclick='getUserId($row2[userid])'>$row2[uname]</a></td>
														<td>$row2[date]</td>
														<td>$row2[time]</td>
														<td><a href='product.php' id='asd' onclick='getProId($row2[id])'>$row2[id]</a></td>
														<td><a href='product.php' id='asd' onclick='getProId($row2[id])'>$row2[pname]</a></td>
														<td>$row2[quan]</td>
														</tr>";
												}
											} 
											
										}				
							}
						echo "</table>"
						?>
						<br>
					</div>
</body>
<?php include('footer.php'); ?>



