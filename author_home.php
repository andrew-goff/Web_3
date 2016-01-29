<?php
session_start();

	if(!isset($_SESSION['authorid']))
	{
		require('authorlogin_tool.php');
		load();
	}
	
	$page_title = 'eBook Site Home';
	
	include('includes/header.html');
	echo "<h1>eBook Home</h1>

	<p>You are now logged in as a author:
	{$_SESSION['authorfirstname' ]} {$_SESSION['authorlastname']}
	</p>";

	require ('db_connect.php');
	
	echo '<table border="2"><tr>';  
	/*PHP test to select everything from the eBook table in the MySQL database */
	$sql = "SELECT b.sin, b.title, b.publisher, a.authorfirstname, a.authorlastname FROM eBook b INNER JOIN Author a ON a.authorid = b.authorid WHERE b.authorid = {$_SESSION['authorid']}";  
	$r = mysqli_query($db, $sql);
  
	if ($r)
	{   

		$num = my_sqli_num_rows;
		
		if ( mysqli_num_rows ($r) > 0 )
		{
			while ($row = mysqli_fetch_array ($r, MYSQL_ASSOC))
			{
				echo "<tr><td><form action=\"update_ebook.php\" method=\"POST\">" .  $row['sin'] . "</td></tr>";
				echo "<tr><td>" . $row['title'] . "</td></tr>";
				echo "<tr><td>" . $row['authorfirstname'] . "</td></tr>";
				echo "<tr><td>" . $row['authorlastname'] . "</td></tr>";
				echo "<tr><td>" . $row['publisher'] . "</td></tr>";
				echo "<tr><td><input type=\"submit\" value=\"Update an eBook\"></td></tr></form>";
				echo "<tr><td><form action=\"delete_ebook.php\" method=\"POST\"</td></tr>";
				echo "<tr><td><input type=\"submit\" value=\"Delete an eBook\"></td></tr></form>";
			}	
			
			
		}
		
		else
		{
			echo "<p>There are no eBooks currently published by 
			{$_SESSION['authorfirstname' ]} {$_SESSION['authorlastname']}</p>";
		}
		
		echo "<form action=\"add_ebook.php\" method=\"POST\">";
		echo "<input type=\"submit\" value=\"Add an eBook\"></form>";
	}
	
	else
	{
		echo '<p>'. mysqli_error($db) . '</p>';
	}	

	echo '</tr></table>';
	echo '<p>
	<a href="ebook_search.php">Search for an eBook</a> | <a href="update_author.php">Update details</a> |
	<a href="logout.php">Logout</a>
	</p>';

	mysqli_close($db);
?>