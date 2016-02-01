<?php
	header("Access-Control-Allow-Origin: http://andrewg8460.ccacolchester.com");
	header("Access-Control-Allow-Methods: POST");
	header("Content-Type: application/json; charset=UTF-8");

	class Book {
		var $sin;
		var $title;
		var $genre;
		var $publisher;
		var $publicationdate;
		
		function Book($sin, $title, $genre, $publisher, $publicationdate) {
			$this->sin = $sin;
			$this->title = $title;
			$this->genre = $genre;
			$this->publisher = $publisher;
			$this->publicationdate = $publicationdate;
		}
	};

	require('cross_site_scripting.php');
	
	//if (isset($_SESSION['customerid'])) {
		require('db_connect.php');
		
		/*PHP test to select everything from the eBook table in the MySQL database */
		$sql = "SELECT * FROM eBook";	
		$r = mysqli_query($db, $sql);
		$eBooks = array();	
		
		if ( mysqli_num_rows ($r) > 0 )
		{	
			/*Table to be printed out showing a list of all eBooks */
			while ($row = mysqli_fetch_array ($r, MYSQL_ASSOC))
			{   
				$eBook = new Book($row['sin'], $row['title'], $row['genre'], $row['publisher'], $row['publicationdate']);
				array_push($eBooks, $eBook);
			}
		}

		mysqli_close($db);
	//}
	
	echo json_encode($eBooks);
?>	
