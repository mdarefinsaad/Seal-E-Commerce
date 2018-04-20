<?php include('dash_header.php'); ?>
<style type="text/css">
	#anchor{
		color : #4682b4;
		/*color : red;*/
	}
</style>


 	<table>
  <tr>
    <img src="bg/status.jpg" width="100%">
  </tr>
</table>
	<table class="srchBx">
			<tr>
				<td align="right" >
					<img src="image/demologo1.png" width="25%" style="margin:2% 3% 2% 2%"><br>
					<font size="3" Color="white">"Our Service is Best"</font>
					<h1></h1>
				</td>
				<td width="70%">
					<form method='POST'>
					<input type="search" height="200px" name='searchItem' onkeyup="request(this.value)" class="txtbx"/>
					<button type="submit" class="cusBtn"><i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
				</form>
				</td>
			</tr>
	</table>
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

    <table cellpadding="10%" width='70%' style="background-color: white;display:inline-block;">
    	<th>Product Id</th>
    	<th>Product Name</th>
    	<th>Product Category</th>
    	<th>Product Brand</th>
    	<th>Product Quantity</th>
    	<th>Product Price</th>
    	<th>Buying Price</th>
    	<th>Sold Quantity</th>
    	<th>Edit</th>

    			<?php 
    				$host = 'localhost';
							$user = 'root';
							$dpass = '';
							$db = 'seal';

							$con = mysqli_connect($host,$user,$dpass,$db);
							if(!empty($_POST['searchItem']))
							{	
								$nothingFound = true;
								$x = $_POST['searchItem'];
			                    $query = "SELECT * FROM product 
			                    WHERE name LIKE '%$x%' OR brand LIKE '%$x%' 
			                    or catg LIKE '%$x%' OR price LIKE '%$x%'
			                    OR color LIKE '%$x%'";

								$result = mysqli_query($con,$query);
								if($result)
								{
									while($row = mysqli_fetch_assoc($result))
									{
										$nothingFound = false;
										if($row['quantity'] < 5)
										{
											echo "<tr style='background-color:#C70039;color:white'>";						
										}
										else if($row['quantity'] < 8)
										{
											echo "<tr style='background-color:#FF5733;color:white'>";
										}
										else
										{
											echo "<tr>";
										}
										echo"
	    									<td><a id='anchor' href='product.php' onclick='getProId($row[id])'><b>$row[id]</b></a></td>
	    									<td><a id='anchor' href='product.php' onclick='getProId($row[id])'><b>$row[name]</b></a></td>
	    									<td>$row[catg]</td>
	    									<td>$row[brand]</td>
	    									<td>$row[quantity]</td>
	    									<td>$row[price]</td>
	    									<td>$row[Bprice]</td>
	    									<td>$row[sold]</td>
	    									<td>
												<a href='product.php' onclick='getProId($row[id])'>
						                        <button>
						                          <i class='fa fa-info' aria-hidden='true'></i>
						                        </button>
						                      	</a>
	    									</td>

	    								</tr>
	    								";
	    								
									}


									if($nothingFound)
									{
										
										echo"
			                              <tr style='border:none'>
			                                <td colspan='8'><br><h1 style='color:black'>Nothing Found :( </h1><br></td>
			                              </tr>"; 
									}
								}
							}
							else
							{
								$query = "SELECT * FROM product";
								$result = mysqli_query($con,$query);
								if($result)
								{
									while($row = mysqli_fetch_array($result))
									{
										if($row['quantity'] < 5)
										{
											echo "<tr style='background-color:#C70039;color:white'>";						
										}
										else if($row['quantity'] < 8)
										{
											echo "<tr style='background-color:#FF5733;color:white'>";
										}
										else
										{
											echo "<tr>";
										}

										echo"
	    									
	    									<td><a id='anchor' href='product.php' onclick='getProId($row[id])'><b>$row[id]</b></a></td>
	    									<td><a id='anchor' href='product.php' onclick='getProId($row[id])'><b>$row[name]</b></a></td>
	    									<td>$row[catg]</td>
	    									<td>$row[brand]</td>
	    									<td>$row[quantity]</td>
	    									<td>$row[price]</td>
	    									<td>$row[Bprice]</td>
	    									<td>$row[sold]</td>
	    									<td>
												<a href='product.php' onclick='getProId($row[id])'>
						                        <button>
						                          <i class='fa fa-info' aria-hidden='true'></i>
						                        </button>
						                      	</a>
	    									</td>
	    								</tr>
	    								";
	    								
									}
								}
							}
    			 ?>
    </table><br><br>
<?php include('footer.php'); ?>