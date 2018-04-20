<?php 
	
	if(isset($_POST['query']))
	{
		$output = '';
		$x = $_POST['query'];
		$host = 'localhost';
	    $user = 'root';
	    $dpass = '';
	    $db = 'seal';
	    $con = mysqli_connect($host,$user,$dpass,$db);


	    $query = "SELECT * FROM product 
		WHERE name LIKE '$x%'";

		// $query = "SELECT * FROM product 
		// WHERE name LIKE '%$x%' OR brand LIKE '%$x%' 
		// or category LIKE '%$x%' OR price LIKE '%$x%'
		// OR color LIKE '%$x%'";

		$result = mysqli_query($con,$query);
		$output .= '<ul>';
		if($result)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$output .='<a href='' onclick='getProId($row[id])'><li>'.$row['name'].'</li></a>';
			}
		}
		else
		{
			$output .= '<li>Nothing Found</li>';
		}	
		$output .= '</ul>';
	}

	

 ?>