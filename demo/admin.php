<?php  include('dash_header.php');?>
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

    <table align="left" cellpadding="60" style="margin: 5%;margin-left: 10%">
 	<tr>
 		<td align='center'>
 			<font style='color:white;font-size:100px'>
 				<i class='fa fa-users' aria-hidden='true'></i>
 			</font>

 			<br><br>
 			<font size='4' color='white'>Create New Admin</font>

 			<br><br>
 			<a href='addAdmin.php' onclick=''>
				<button class='cusBtn' style='width:50%'>
						<font size='4'>Create</font>
				</button>
			</a>
 		</td>

 		<td align="center">
 			<font color="white" style='font-size: 100px'>/</font>
 		</td>

 		<td align='center'>
 			<font style='color:white;font-size:100px'>
 				<i class="fa fa-list" aria-hidden="true"></i>
 			</font>

 			<br><br>
 			<font size='4' color='white'>See Admin List</font>

 			<br><br>
 			<a href='adminList.php' onclick=''>
				<button class='cusBtn' style='width:50%'>
						<font size='4'>See</font>
				</button>
			</a>
 		</td>
 	</tr>
 </table>
<?php  include('footer.php');?>