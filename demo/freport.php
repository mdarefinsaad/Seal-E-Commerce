<?php 
	include('dash_header.php');
	$host = 'localhost';
    $user = 'root';
    $dpass = '';
    $db = 'seal';
    $con = mysqli_connect($host,$user,$dpass,$db);

    //TOTAL EXPENSE OF The Company
    $Expense = "SELECT sum(Cquan*Bprice) as COST from product";
    $result = mysqli_query($con,$Expense);
    $rowExpense = mysqli_fetch_array($result);

    //Break Even point ...when revenue and expenses are equal
    $BreakEvenPoint = $rowExpense['COST'];

    //Expected Revenue from The Company
    $ExpectedRevenue = "SELECT sum(Cquan*price) as REV from product";
    $result2 = mysqli_query($con,$ExpectedRevenue);
    $rowExpectedRevenue = mysqli_fetch_array($result2);

    //CURRENT INCOME
    $CurrentIncome = "SELECT sum(sold*price) as INC from product";
    $result3 = mysqli_query($con,$CurrentIncome);
    $rowCurrentIncome = mysqli_fetch_array($result3);

?>
<head>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>  
           <script type="text/javascript">  
           google.load("visualization", "1", {packages:["barchart"]});
      	   google.setOnLoadCallback(drawChart);
      	
      	function drawChart() {
        var data = google.visualization.arrayToDataTable([
         ['Element', '$Dollar'],
         <?php 
         echo "['Total Expense',".$rowExpense['COST']."],
               ['Break Even Point',".$BreakEvenPoint."],
               ['Expected Revenue',".$rowExpectedRevenue['REV']."],
               ['Cash incoming',".$rowCurrentIncome['INC']."],"
          ?>
         
      ]);
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 900, height: 440, is3D: true, title: 'Bar Chart of Financial Report'});
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
    <div class='proBackg' style='width:65%;display:inline-block;border:1px solid white'><br><br>
      
      <center>
        <font face='Roboto Light' size='7'>
          Financial Status/Report
        </font>
      </center>
      <br><br><br><br>


      &emsp;<font face='Roboto Light' size='6'>Total Expense : <b>$<?php echo $rowExpense['COST'] ?></b></font><br><br>
      &emsp;<font face='Roboto Light' size='6'>Break Even Point : <b>$<?php echo $rowExpense['COST'] ?></b></font><br><br>
      &emsp;<font face='Roboto Light' size='6'>Expected Revenue : <b>$<?php echo $rowExpectedRevenue['REV'] ?></b></font><br><br>
      &emsp;<font face='Roboto Light' size='6'>Cash Incoming : <b>$<?php echo $rowCurrentIncome['INC'] ?></b></font><br><br>
      &emsp;<font face='Roboto Light' size='6'>Status : </font>
      <?php 
              if($rowCurrentIncome['INC'] == $BreakEvenPoint)
              {
                echo "<font face='Roboto Light' size='6'><b>In Break Even Point</b></font>";
              }
              else if($rowCurrentIncome['INC'] <  $BreakEvenPoint)
              {
               echo "<font face='Roboto Light' size='6' color='red'><b>In Loss</b></font>"; 
              }
              else
              {
               echo "<font face='Roboto Light' size='6' color='green'><b>In Profit</b></font>"; 
              }
            ?>
            <br><br><br>
    	<div id='chart_div'></div><br><br><br>
    </div><br><br><br><br>
<?php include('footer.php');?>