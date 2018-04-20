<?php include('dash_header.php');  ?>


  <table>
  <tr>
    <img src="bg/addinfo.jpg" width="100%">
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
 <table align="left" cellpadding="60">
 	<tr>
 		<td align='center'>
 			<font style='color:white;font-size:160px'>
 				<i class='fa fa-users' aria-hidden='true'></i>
 			</font>

 			<br>
 			<font size='6' color='white'>Add New User</font>

 			<br><br>
 			<a href='addNewUser.php' onclick=''>
				<button class='cusBtn' style='width:30%'>
						<font size='4'>Add</font>
				</button>
			</a>
 		</td>

 		<td align="center">
 			<font color="white" style='font-size: 100px'>/</font>
 		</td>

 		<td align='center'>
 			<font style='color:white;font-size:160px'>
 				<i class='fa fa-archive' aria-hidden='true'></i>
 			</font>

 			<br>
 			<font size='6' color='white'>Add New Product</font>

 			<br><br>
 			<a href='addNewPro.php' onclick=''>
				<button class='cusBtn' style='width:30%'>
						<font size='4'>Add</font>
				</button>
			</a>
 		</td>
 	</tr>
 </table>
 <?php include('footer.php') ?>