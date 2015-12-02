<?php
	session_start();
	include('includes/header.html');
	$page_title = 'eBook Site Home';

	echo "<h1>eBook Home</h1>";

	echo "<p>Available eBooks:</p>";

	require('db_connect.php');
	/*PHP test to select everything from the eBook table in the MySQL database */
	$sql = "SELECT * FROM eBook";	
	$r = mysqli_query($db, $sql);
		
	if ( mysqli_num_rows ($r) > 0 )
	{	
		echo '<table border="2">';
		
		/*Table to be printed out showing a list of all eBooks */
		while ($row = mysqli_fetch_array ($r, MYSQL_ASSOC))
		{   
			echo '<tr><td><a href=basket_add.php?id=' . $row['sin'] . '">Add to Basket</a></td>';
			echo '<td><strong>' . $row['title'] . '</td>';
			echo '<td><strong>' . $row['genre'] . '</td>';
			echo '<td>'. $row['publisher'] . '</td>';
			echo '<td>' . $row['publicationdate'] . '</td></tr>';		
		}
		
		echo '</table>';
	}

	/*Test giving out a statement showing no eBooks available in the eBook table */
	else
	{
		echo '<p>There are no eBooks currently available.</p>';
	}

	echo '<p>
	<a href="ebook_search.php">Search for an eBook</a> 
	</p>';
	
	/*Test to not display register links if customer or author already logged in */
	if (!isset($_SESSION['authorid']) && !isset($_SESSION['customerid']))
	{
		echo '<p>
		<a href="customer_register.php">Register as a customer</a> |
		<a href="author_register.php">Register as a author</a></p>';
	}
	mysqli_close($db);
	
	include('includes/footer.html');
?>