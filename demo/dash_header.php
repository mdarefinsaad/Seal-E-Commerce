<?php
	// session_start();
	// var_dump($GLOBALS);
	if(!empty($_COOKIE['loggedInUser']))
    {
      if($_COOKIE['TypeUser'] != 'admin')
      {
        header('location:signin.php');
      }
    }
    else
    {
    	header('location:signin.php');
    }
 ?>

<head>
	<title>Seal - We Serve The Best Service</title>
	<!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/
	4.7.0/css/font-awesome.min.css"
	rel="stylesheet"
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
	crossorigin="anonymous">-->

	<link rel="icon" href="Seal_2.png" type="image\png">
	<link rel="stylesheet" type="text/css" href="allCss/abc.css">
	<link rel="stylesheet" href="icon/css/font-awesome.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/cookie.js"></script>
	<script src="js/script.js"></script>
	
</head>
<body>
<!-- For Navigation Bar -->

						<table width="100%" bgcolor="#121111"style='box-shadow:0px 2px 50px black;padding:8px;margin-top:-5px;position:relative;bottom:-0px'>
							<tr>
							<td width="20%">
								<a href="dash.php">
									<center><img src="image/demologo1.png" width="18%"></center>
								</a>
							</td>


							<td width="65%">

							</td>

							<td>
								<a href='status.php'  class='cusBtn2'>
									<i class='fa fa-area-chart' aria-hidden='true'></i>
								</a>
<!-- 

								<a href="wishlist.php"  class="cusBtn2">
									<i class="fa fa-heart" aria-hidden="true"></i>
								</a> -->



									<?php
												if(!empty($_COOKIE['loggedInUser']))
												{
													echo "<a href='adminProfile.php' class='cusBtn2'>
														<i class='fa fa-user-circle-o' aria-hidden='true'></i>
													</a>
													<a href='signOut.php'  class='cusBtn2'>
														<i class='fa fa-sign-out' aria-hidden='true'></i>
													</a>";
												}else {
													echo "<a href='signin.php'  class='cusBtn2'>
															<i class='fa fa-users' aria-hidden='true'></i>
													</a>";
												}
									 ?>

								</td>
							</tr>
						</table>