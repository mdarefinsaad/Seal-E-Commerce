<?php
  ob_start();
?>
<?php include("header.php");?>



<head>
	<script src="js/validation.js"></script> 	
</head> 



<body>
<style type="text/css">
	form ul li{
		font-size: 80%;
	}
</style>
	<table width="100%" bgcolor="white" background="bg.png">

	    <tr>
		  <td align="right" style="padding-right:6%">
		  <br/><br/><br/><br/>
	        <text>
	          <font style="text-shadow:0px 0px 5px black"size="12" color="white" face="Roboto Light">Create Your Seal ID</font>
	        </text>
		  <br/>
		  <br/>
		  <br/>
		  <br/>
		  <br/>
		  <br/>
		  <br/>
		  </td>
		</tr></table><br/>
	<table width="100%" style='background-color:white'>
		<tr align="center">
			<td>
				<text><font size="5" color="black" face="Roboto Light">One Seal ID is all you need to access all Seal service</font></text>
				<br/>
				<text><font size="5" color="black" face="Roboto Light">Already have a Seal ID?</font></text>
				<a href='signin.php'><font size="5" color="black" face="Roboto Light">Find it here ></font></a> <br><br><br><br>
			</td>
		</tr></table>

  	<hr width="60%">
		  <table align="center" bgcolor="white" style='background-color:white'>
			<tr align="right">
			<td width="center%">
			</td>






			<!-- FORM STARTS FROM HERE -->
			<td align="left">
			<form method="POST" action='validationPHP.php' enctype="multipart/form-data" onsubmit="return check()">

        	<br><br>

			<font size="4" face="Roboto Light" color="black"><b>Name</b></font>&emsp;&emsp;<br/>		 
			 <input class="textbox" size="60" type="text" name="name" required="required" /> 
			 <br>
			 <ul>
			 	<li>Name Should contain only letter</li>
			 	<li>Like - 'Bob Alan' , 'Mike Harras' etc.</li>
			 </ul>
			 


			<font size="4" face="Roboto Light" color="black"><b>Email</b></font>&emsp;&emsp;<br/>
 			 <input class="textbox" size="60" type="text" name="email" required="required"/>
 			 <br>
 			 <ul>
			 	<li>Email Should be a valid email</li>
			 	<li>Like - 'dotdot@dotmail.com' etc.</li>
			 </ul> 
	


			<font align="right" size="4" face="Roboto Light" color="black"><b>User Name</b></font>&emsp;&emsp;<br/>
			 <input class="textbox" size="60" type="text" name="username" required="required"/> 
			 <br>
			<ul>
			 	<li>Username should contain only letter and number</li>
			 	<li>Like - 'bob123','alan123' etc.</li>
			</ul> 




			<font align="right" size="4" face="Roboto Light" color="black"><b>Password</b></font>&emsp;&emsp;<br/>	
			 <input class="textbox" size="60" type="text" name="password" required="required"/>
			 <br>
			 <ul>
			 	<li>Password should contain letter and number</li>
			 	<li>Password can contain '@' , '_' , '.' , '#'</li>
			 	<li>Password must be 5 characters long</li>
			 	<li>etc.</li>
			 </ul> 



			<font align="right" size="4" face="Roboto Light" color="black"><b>Credit Card No</b></font>&emsp;&emsp; <br/>
			 <input class="textbox" size="60" type="text" name="ccno" required="required"/>
			 <br>
			 <ul>
			 	<li>Credit Card No can contain numbers only</li>
			 	<li>Credit Card No should be 10 - 14 characters long</li>
			 </ul>
			 <br/> <br/>


	    	<font align="right" size="4" face="Roboto Light" color="black"><b>Credit Card Pin</b></font>&emsp;&emsp; <br/> 
 			<input class="textbox" size="60" type="text" name="ccpin" required="required">
 			 <br>
			 <ul>
			 	<li>Credit Card Pin contain numbers only</li>
			 	<li>Credit Card Pin should be minimum 4 characters long</li>
			 </ul>
			 <br/> <br/>


		    <font align="right" size="4" face="Roboto Light" color="black"><b>Mobile No</b></font>&emsp;&emsp;<br/>
			<input class="textbox" size="60" type="text" name="mobile" required="required"/>
			<br>
			 <ul>
			 	<li>Mobile No should be numbers only</li>
			 	<li>Mobile No should contain 11 digits exactly</li> 
			 	<li>Like - '017XXXXXXXX' etc.</li> 
			 	<li>Only <b>Grameenphone,Airtel,Banglalink,<br>Teletalk,Robi</b> - Carriers are acceptable</li>
			 </ul>
			 <br/> <br/>

       		<font align="right" size="4" face="Roboto Light" color="black"><b>City</b></font>&emsp;&emsp;<br/>
      		<select class="select" name="city" required="required">
			   <option value="dhaka">Dhaka</option>
			   <option value="comilla">Comilla</option>
			   <option value="chittagong">Chittagong</option>
			   <option value="rajshahi">Rajshahi</option>
			   <option value="khulna">Khulna</option>
			   <option value="borishal">Borishal</option>
			   <option value="sylhet">Sylhet</option>
			</select> <br/><br/>


      		<font align="right" size="4" face="Roboto Light" color="black"><b>Gender</b></font>&emsp;&emsp;<br/>		
			<select class="select" name="gender" required="required">
			   <option value="male">Male</option>
			   <option value="female">Female</option>
			</select> <br/><br/><br/>


      		<font align="right" size="4" face="Roboto Light" color="black"><b>Address</b></font>&emsp;&emsp;<br/>      	
      		<textarea class="textbox" name="address" required="required" style="height:100px"></textarea><br><br>


      		<font align="right" size="4" face="Roboto Light" color="black"><b>User Type</b></font>&emsp;&emsp;<br/>
     		 <select class="select" name="userType" required="required">
			   <option value="customer" selected="selected">Customer</option>
			</select> <br/><br/>

     	

     	 	<font align="right" size="4" face="Roboto Light" color="black"><b>Upload Your Image : </b></font>&emsp;&emsp;<br/>
      		<input type="file" class="textbox" name="fileToUpload" accept=".gif,.jpg"/>


	      	<br><br>
	      	<center>
	      		<input type="submit" value="Register"/>
	      	</center>
	      	<br>

			<hr/>
			</form>
			</td>
		</tr>
	</table>


	<table width="100%">
	    <tr>
		   <td><br/></td>
		</tr>
		<br/>

	</table>

  <?php include("footer.php");?>
</body>
</html>


