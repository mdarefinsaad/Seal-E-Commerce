<?php
    // var_dump($GLOBALS);
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
							$coke = $_COOKIE['loggedInUser'];
							$query = "SELECT * FROM user WHERE userid='$coke'";
                            echo "<table width='100%' style='padding:2%'>";
							$result = mysqli_query($con,$query);
							if($result)
							{
									while($row = mysqli_fetch_assoc($result))
									{
                                        echo "
                                          <tr>
                                            <td align='center' width='60%'>
                                               <img class='proImg1' src='$row[image]' width='50%'>
                                            </td>

                                            <td>
                                                <div class='proBackg1'>
                                                <h1 style='text-shadow:0px 0px 2px black'>
                                                <b>$row[name]</b></h1>
                                                <hr>
                                                <font size='4'>
                                                <p><b>Name : $row[name]</b></p>
                                                <p>Username : $row[username]</p>
                                                <p>Email : $row[email]</p>
                                                 <p>Credit Card No : $row[ccardno]</p>
                                                 <p>Credit Card Pin : *******</p>
                                                <p>Gender : $row[gender]</p>
                                                <p>Area : $row[area]</p>
                                                <p>Mobile no. : $row[mobile]</p>
                                                <p>Address : $row[address]</p></font>

                                                <a href='profileEdit.php' onclick='doEdit($row[userid])'>
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
			</div><br>

            
            <?php 
                $coke = $_COOKIE['loggedInUser'];
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

    <?php include("footer.php"); ?>

	</body>
</html>
