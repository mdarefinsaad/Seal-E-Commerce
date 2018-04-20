<?php 
    include('dash_header.php'); 

    //DATABASE CONNECTION
    $host = 'localhost';
    $user = 'root';
    $dpass = '';
    $db = 'seal';
    $con = mysqli_connect($host,$user,$dpass,$db);

    //Brands of product we have
    $query = "SELECT brand,count(*) as quantity from product group by brand";
    $result = mysqli_query($con,$query);

    $query2 = "SELECT sum(quantity)as Quantity,sum(sold)as Sold from product";
    $result2 = mysqli_query($con,$query2);

    $query3 = "SELECT catg as Category,count(*) as Number from product group by catg";
    $result3 = mysqli_query($con,$query3);

?>
    <head>
         <script type="text/javascript" src="gstatic/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);
           google.charts.setOnLoadCallback(drawChart2);
           google.charts.setOnLoadCallback(drawChart3);    
            
            //
            function drawChart()  
            {  
                var data = google.visualization.arrayToDataTable([ 
                        //Database Column name 
                          ['brand', 'quantity'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["brand"]."', ".$row["quantity"]."],";  
                          }  
                          ?>  
                     ]); 

                var options = {
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
            }


            function drawChart2()  
            {  
                var data2 = google.visualization.arrayToDataTable([ 

                          ['Quantity', 'Sold'],
                        <?php  while($row = mysqli_fetch_array($result2))
                        {
                            echo "['In Stock',".$row["Quantity"]."],['Sold',".$row["Sold"]."],";
                        }
                        ?>
                     ]); 

                var options2 = {
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));  
                chart.draw(data2, options2);  
            }

            function drawChart3()  
            {  
                var data = google.visualization.arrayToDataTable([ 
                        //Database Column name 
                          ['Category', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row["Category"]."', ".$row["Number"]."],";  
                          }  
                          ?>  
                     ]); 

                var options = {
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart3'));  
                chart.draw(data, options);  
            }              
           </script>  
    </head>
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
    <br><br>
    <div class='proBackg' style='width:65%;display:inline-block;border:1px solid white'>
        <br><br>
        <center>
            <font size='5' face='Roboto'>Brands of Product We have</font>
            <div id='piechart' style="padding-left:12%;width: 700px; height: 400px"></div>
            <font size='5' face='Roboto'>Types of Product We have</font>
            <div id='piechart3' style="padding-left:12%;width: 700px; height: 400px"></div>
            <font size='5' face='Roboto'>Product Quantity Status</font>
            <div id='piechart2' style="padding-left:12%;width: 700px; height: 400px"></div>
        </center>
    </div>
<?php include('footer.php'); ?>