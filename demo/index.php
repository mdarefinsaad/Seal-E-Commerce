<?php
    session_start();ob_start();
    if(empty($_SESSION['loggedInUser']))
    {
      $_SESSION['loggedInUser'] = "";
    }
 ?>

<html>
<head>
  <title>Seal - We Serve The Best Service</title>
  <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/
  4.7.0/css/font-awesome.min.css"
  rel="stylesheet"
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
  crossorigin="anonymous">-->

  <link rel="icon" href="Seal_2.png" type="image\png"/>
  <link rel="stylesheet" type="text/css" href="allCss/slide.css"/>
  <!-- <link rel="stylesheet" type="text/css" href="allCss/img1.css"/> -->
  <link rel="stylesheet" href="icon/css/font-awesome.min.css"/>
  <style>
    body{
      background-color: white;
    }
  </style>
</head>
<!-- For Navigation Bar -->
<body >
        <?php include("header.php");?>

      <!-- For Slider -->
          <div id='slider' class='content' style='background-color:white'>
            <figure>
              <img src="image/image/5.png"/>
              <img src="image/image/4.png"/>
              <img src="image/image/3.png"/>
              <img src="image/image/2.png"/>
              <img src="image/image/1.png"/>
          </figure>
          </div>

          <table width="100%" cellpadding="20" style='background-color:white'>
            <tr>
              <th>
                <br><br><br><font size="6" face="Roboto Thin" color="black">Catagory of Products We Provide</font>
              </th>
            </tr>
            <tr>
              <td width="100%" align="center">
                <a href="shop.php" id="Mobile"><img src="Catg_image/Mobile.png" width="20%"></a>
                <a href="shop.php" id="Tablet"><img src="Catg_image/Tb.png" width="20%" ></a>
                <a href="shop.php" id="Laptop"><img src="Catg_image/Lp.png" width="20%" ></a><br>
                <a href="shop.php" id="Desktop"><img src="Catg_image/Desktop.png" width="20%" ></a>
                <a href="shop.php" id="TV"><img src="Catg_image/SMTv.png" width="20%" ></a>
              </td>
            </tr>
          </table>

          <table width="100%" height="110%" style='background-color:white;margin-top:-2%'>
            <tr>
              <th>
                <br><font size="6" face="Roboto Thin" color="black"><br>Brands We're associate with ... </font>
              </th>
            </tr>
              <tr>
                <td align="center">
                  <a href="shop.php" id="Apple"><img src="Brand/Apple.png" width="15%" ></a>
                  <a href="shop.php" id="Samsung"><img src="Brand/Samsung.png" width="15%" ></a>
                  <a href="shop.php" id="Microsoft"><img src="Brand/Microsoft.png" width="15%" ></a>
                  <a href="shop.php" id="Dell"><img src="Brand/Dell.png" width="15%" ></a><br>
                  <a href="shop.php" id="Asus"><img src="Brand/Asus.png" width="15%" ></a>
                  <!-- <a href="shop.php" id="Google"><img src="Brand/Google.png" width="15%" ></a> -->
<!--                   <a href="shop.php" id="HTC"><img src="Brand/HTC.png" width="15%" ></a>
                  <a href="shop.php" id="LG"><img src="Brand/LG.png" width="15%" ></a>
                  <a href="shop.php" id="Nokia"><img src="Brand/Nokia.png" width="15%" ></a>
                  <a href="shop.php" id="Sony"><img src="Brand/Sony.png" width="15%" ></a> -->
                </td>
              </tr><br>
              <tr>
              </tr>
          </table>
          <?php include("footer.php");?>
  </body>
</html>
