<?php
	session_start();
	/*Check to make sure customer is logged in and customer id is stored in session */
	if(!isset($_SESSION['customerid']))
	{
		require('customerlogin_tool.php');
		load();
	}

	$page_title = 'eBook Site Home';
	
	include('includes/header.html');

	$customerid = $_SESSION['customerid'];

	/*Get the customer name from the session data */
	echo "<p>You are now logged in as a customer.
	{$_SESSION['customerfirstname']} {$_SESSION['customerlastname']}
	</p>";

	require ('db_connect.php');

	echo '<table border="2"><tr>';

	/*PHP test to join Item and eBook together and select the eBook books that the customer owns in the MySQL database */
	$sql = "SELECT b.sin, b.title, b.genre, i.paymentid, i.amountdue, i.url FROM eBook b INNER JOIN Item i ON b.sin = i.sin INNER JOIN Purchase p ON i.paymentid = p.paymentid WHERE p.customerid = {$customerid} AND i.url IS NOT NULL";
	$rb = mysqli_query($db, $sql);
	
	if ($rb)
	{
		$num = mysqli_num_rows($rb);
				
		/*Test to make sure if number of rows is greater than zero then the rows are printed out */
		if ($num > 0 )
		{
			while ($row = mysqli_fetch_array ($rb, MYSQL_ASSOC))
			{
				echo '<tr><td>' . $row['sin'] . '</td></tr>';
				echo '<tr><td><strong>' . $row['title'] . '</td></tr>';
				echo '<tr><td>' . $row['genre'] . '</td></tr>';
				echo '<tr><td>' . '&pound' . $row['amountdue'] . '</td></tr>';				
				echo '<tr><td>'. $row['paymentid'] . '</td></tr>';
				echo '<tr><td><a href=\"'. $row['url'] . '\">Download</a></td></tr>';
				echo "<tr><td><form id =\"addReview\"  method=\"post\" action=\"add_review.php\">";
				echo "<input type=\"hidden\" name=\"customerid\" value=\"{$customerid}\">";
				echo "<input type=\"hidden\" name=\"sin\" value=\"{$row['sin']}\">";
				echo "<input type=\"submit\" value=\"Add Review\"></form></td></tr>";	
			}
		}
		else
		{
			/*Statement brought up if the customer owns no books */
			echo "<p>There are no eBooks currently owned by 
			{$_SESSION['customerfirstname' ]} {$_SESSION['customerlastname']}</p>";
		}
	}
	else
	{
		echo '<p>'.mysqli_error($db).'</p>';
	}
	
	echo '</tr></table><p>
	<a href="ebook_search.php">Search for an eBook</a> | <a href="ebook_rating.php">Review an ebook</a> | <a href="ebook_rating_view.php">View an ebook rating</a> |  
	<a href="update_customer.php">Update details</a> |
	<a href="logout.php">Logout</a>
	</p>';

	mysqli_close($db);
	
	include('includes/footer.html');
?>