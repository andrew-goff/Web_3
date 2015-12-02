<?php 
	session_start();
	
	include('includes/header.html');
	/*Get sin variable from hidden field */
	$sin = $_POST['sin'];
	include('db_connect.php');
	
	echo "<h1>Read Reviews</h1>";
	
	/*PHP test to search for reviews by current sin using inner join in the MySQL database */
	$sql = "SELECT b.sin, b.title, r. * 
	FROM Review r
	INNER JOIN eBook b ON r.customerid
	WHERE b.sin = '{$sin}'";
	
	$r = mysqli_query($db, $sql);
	
	if($r)
	{
		echo "<h3>eBook Rating Results:</h3>";
		
		echo "<table border='1.5'>";
		$num = mysqli_num_rows($r);
		
		/*Test to make sure if number of rows is greater than zero then the rows are printed out */
		if ($num > 0 )
		{
			while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
			    echo "<tr><td>'{$row['sin']}'</td></tr>";
				echo "<tr><td>" . $row['title'] . "</td></tr>";
				echo "<tr><td>" . $row['customerid'] . "</td></tr>";
				echo "<tr><td>" . $row['bookrating'] . "</td></tr>";
				echo "<tr><td>" . $row['bookcomments'] . "</td></tr>";
				echo "<tr><td>" . $row['reviewdate'] . "</td></tr>";
			}
		}
		
		echo "</table>";
		mysqli_close($db);

	}
	
	echo "<p><a href='user_home.php'>Home</a>"; 
?>