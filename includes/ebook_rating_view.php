<?php
	session_start();
	/*Check to make sure customer is logged in and customer id is stored in session */
	if(!isset($_SESSION['customerid']))
	{
		require('customerlogin_tool.php');
		load();
	}
	$customerid = $_SESSION['customerid'];
	include('includes/header.html');
	
	require('db_connect.php');
	
	/*PHP test to search for all reviews by customerid in the MySQL database */
	$sql = "SELECT customerid, bookheading, bookcomments, bookrating, reviewdate FROM Review";
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
			    echo "<tr><td>'{$row['customerid']}'</td></tr>";
				echo "<tr><td>" . $row['bookheading'] . "</td></tr>";
				echo "<tr><td>" . $row['bookcomments'] . "</td></tr>";
				echo "<tr><td>" . $row['bookrating'] . "</td></tr>";
				echo "<tr><td>" . $row['reviewdate'] . "</td></tr>";
			}
		}
		
		echo "</table>";
	}
	
	echo "<p><a href='customer_home.php'>Home</a> | <a href='ebook_search.php'>Search</a> | <a href='ebook_rating.php'>Review an eBook</a></p>";
	include('includes/footer.html');
?>