<?php
    session_start();
    ob_start();
    // var_dump($GLOBALS);
    if(empty($_COOKIE['searchBy'])){$_COOKIE['searchBy'] = "";}

?>
<?php 
	if(!empty($_COOKIE['TypeUser']))
	{
		if($_COOKIE['TypeUser'] ==  'admin')
		{
			 include('dash_header.php');
		}
		else
		{
			include('header.php');		
		}
	}
	else
	{
		include('header.php');
	}
			
?>


		  <!--Product info -->
				<?php

							$host = 'localhost';
							$user = 'root';
							$dpass = '';
							$db = 'seal';
							if(!empty($_COOKIE['TypeUser']))
							{
								if($_COOKIE['TypeUser'] ==  'admin')
								{
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
	                                         <li><a href='freport.php'>Financial Report</a></li>
	                                        </ul>
	                                        </span>
	                                      </nav>
	                                </div>";
								}
							}
							
							$con = mysqli_connect($host,$user,$dpass,$db);
							if(!empty($_COOKIE['ProId']))
							{
								$coke = $_COOKIE['ProId'];
								$query = "SELECT * FROM product WHERE id='$coke'";

								$result = mysqli_query($con,$query);
								if($result)
								{
									echo "<table width='70%' align='right'><tr>";
										while($row = mysqli_fetch_assoc($result))
										{
											echo "<td width='50%' align='center'>
														 <img class='proImg1' src='$row[image]' width='80%'></a>
														 <br><br>
													<center>

												  </td>
											
											<td style='margin:5%'>
														<div class='proBackg1' style='padding:7%'>
																<h1 style='text-shadow:0px 0px 2px black'>
																<b>$row[name]</b></h1>
																<hr>
																<font size='5'>
																		Catagory : <b>$row[catg]</b>
																		<br><br>
																		Brand : <b>$row[brand]</b>
																		<br><br>
																		Color : &nbsp;<b>$row[color]</b>
																		<br>
																		
																</font>
																<font>
																    ($row[quantity] pieces available)
																</font>";

																if($_COOKIE['TypeUser'] == 'admin')
																{
																	echo "
																	<font size='5'>
																			<br><br>
																			Selling Price : <b>$row[price]</b>
																			
																	</font>
																	<font size='5'>
																			<br><br>
																			Buying Price : <b>$row[Bprice]</b>
																			<br><br>
																	</font>";
																}
																else
																{
																	echo "
																	<font size='5'>
																			<br><br>
																		     Price : <b>$row[price]</b>
																			
																	</font><br><br>";
																}
																if(!empty($_COOKIE['TypeUser']))
																{
																	if($_COOKIE['TypeUser'] == 'admin')
																	{
																		echo " <a href='delPro.php' onclick='delPro($row[id])'>
																					<button class='cusBtn' style='width:70%'>
																							<font size='3'>Delete</font>
																					</button>
												 								</a>

									                                            <a href='editPro.php' onclick='getProId($row[id])'>
																					<button class='cusBtn2' style='width:20%'>
																						<i class='fa fa-pencil-square' aria-hidden='true'></i>
																					</button>
																				</a>";
																	}
																	else
																	{
																		echo "<a onclick='ToCart($row[id])'>
								                                              <button class='cusBtn' style='width:60%'>
								                                                  <font size='4'><b>Add to Cart</b> <i class='fa fa-shopping-cart' aria-hidden='true'></i></font>
								                                              </button>
								                                    	</a>";
																	}	
																}
																else
																{
																	echo "<a onclick='ToCart($row[id])'>
							                                              <button class='cusBtn' style='width:60%'>
							                                                  <font size='4'><b>Add to Cart</b> <i class='fa fa-shopping-cart' aria-hidden='true'></i></font>
							                                              </button>
							                                    	</a>";
																}
																
																

														echo "</td>";
										}
										echo "</tr></table>";

								}
							}
							else
							{
									header("location:shop.php");
							}

				?>

      <?php include_once("footer.php");?>
	</body>
</html>
