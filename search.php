<?php	
	session_start();
	
	$page_title = 'eBook Search Results';
	
	include('includes/header.html');

	echo "<h1>eBook Results</h1>";

	require('db_connect.php');
	/*PHP test to check that eBook data is being selected from the MySQL database */
	$sql = "SELECT title, sin, authorid, synopsis, author, genre, publisher, price, format, publicationdate FROM eBook";	

	/*Tests to check whether there is data in search fields  */
	if(!empty ($_POST['title']))
	{
		$clause = " title = '{$_POST['title']}'";
	}
	
	if(!empty ($_POST['author']))
	{
		if($clause)
		{
			$clause = $clause . " AND ";
		}
		
		$clause = $clause . " author = '{$_POST['author']}'";	
	}

	if(!empty ($_POST['genre']))
	{
		if ($clause)
		{
			$clause = $clause . " AND ";
		}
		
		$clause = $clause . " genre = '{$_POST['genre']}'";		
	}

	if(!empty ($_POST['publisher']))
	{
		if($clause)
		{
			$clause = $clause . " AND ";
		}
		
		$clause = $clause . " publisher = '{$_POST['publisher']}'";
	}

	if(!empty ($_POST['price']))
	{
		if($clause)
		{
			$clause = $clause . " AND ";
		}
		
		$clause = $clause . " price = '{$_POST['price']}'";
	}

	if(!empty ($_POST['format']))	
	{ 	
		if ($clause)
		{
			$clause = $clause . " AND ";
		}
		
		$clause = $clause . " format = '{$_POST['format']}'";
	}

	if ($clause)
	{
		$clause = $sql = $sql .  " WHERE " . $clause;
	}
	
	echo '<table border = "1.5"><tr>';
	/*PHP test to search for all eBooks by title in the MySQL database */
	$ra = mysqli_query($db, $sql);
	
	if ($ra)
	{			
		echo "<h3>Search Result:</h3>";
			
		$num = mysqli_num_rows($ra);
		/*Check to make sure that there are more than 0 rows and display row results*/	
		if ($num > 0 )
		{
			while ($row = mysqli_fetch_array ($ra, MYSQL_ASSOC))
			{
				echo "<tr><td>" . $row['title'] . "</td></tr>";
				echo "<tr><td>" . $row['sin'] . "</td></tr>";
				echo "<tr><td>" . $row['authorid'] . "</td></tr>"; 
				echo "<tr><td>" . $row['synopsis'] . "</td>"; 
				echo "<tr><td>" . $row['author'] . "</td></tr>"; 
				echo "<tr><td>" . $row['genre'] . "</td></tr>";
				echo "<tr><td>" . $row['publisher'] . "</td></tr>";
				echo "<tr><td>" . "&pound" . $row['price'] . "</td></tr>";
				echo "<tr><td>" . $row['format'] . "</td></tr>";
				echo "<tr><td>" . $row['publicationdate'] . "</td></tr>"; 
				echo "<tr><td><form id =\"basketAdd\"  method=\"post\" action=\"basket_add.php\">";
				echo "<input type=\"hidden\" name=\"sin\" value=\"{$row['sin']}\">";
				echo "<input type=\"submit\" value=\"Add to Basket\"></form></td></tr>";	
				echo "<tr><td><form id =\"readReviews\"  method=\"post\" action=\"read_review.php\">";
				echo "<input type=\"hidden\" name=\"sin\" value=\"{$row['sin']}\">";
				echo "<input type=\"submit\" value=\"Read Reviews\"></form></td></tr>";	
			}		
		}
		
		/*Statement to displayed showing no books found in search */
		else
		{
			echo "<p>No books match that search.</p>";
		}
	}
	else
	{
		'<p>' . mysqli_error($db) . '</p>';
	}
		
	echo '</tr></table>';
	
	echo '<p><a href="ebook_search.php">Search for an eBook</a></p>';

	mysqli_close($db);

	include('includes/footer.html');
?>