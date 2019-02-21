<?php	
	header("Access-Control-Allow-Origin: http://andrewg8460.ccacolchester.com");
	header("Access-Control-Allow-Methods: POST");
	header("Content-Type: application/json; charset=UTF-8");
	session_start();

	class Search {
		var $title;
		var $sin;
		var $authorid;
		var $synopsis;
		var $author;
		var $genre;
		var $publisher;
		var $price;
		var $format;
		
		function Search($title, $sin, $authorid, $synopsis, $author, $genre, $publisher, $price, $format) {
			$this->title = $title;
			$this->sin = $sin;
			$this->authorid = $authorid;
			$this->synopsis = $synopsis;
			$this->author = $author;
			$this->genre = $genre;
			$this->publisher = $publisher;
			$this->price = $price;
			$this->format = $format;
		}
	};
	
	require('cross_site_scripting.php');
	require('db_connect.php');
	
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
		$clause = " WHERE " . $clause;
	}
	
	/*PHP test to check that eBook data is being selected and search for all eBooks by title from the MySQL database */
	$sql = "SELECT title, sin, authorid, synopsis, author, genre, publisher, price, format FROM eBook" . $clause;
	$r = mysqli_query($db, $sql);

	$Searches = array();
	
	if ($r)
	{			
		/*Check to make sure that there are more than 0 rows and display row results*/	
		if ( mysqli_num_rows ($r) > 0 )
		{			
			/*Table to be printed out showing a list of all eBooks searched*/
			while ($row = mysqli_fetch_array ($r, MYSQL_ASSOC))
			{
				$Search = new Search($row['title'], $row['sin'], $row['authorid'], $row['synopsis'], $row['author'], $row['genre'], $row['publisher'], $row['price'], $row['format']);
				array_push($Searches, $Search);
			}		
		}
	}
	
	mysqli_close($db);

	echo json_encode($Searches);
?>
