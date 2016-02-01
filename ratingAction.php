<?php
	header("Access-Control-Allow-Origin: http://andrewg8460.ccacolchester.com");
	header("Access-Control-Allow-Methods: POST");
	header("Content-Type: application/json; charset=UTF-8");
	session_start();
	
	class BookReview {
		var $customerid;
		var $bookheading;
		var $bookcomments;
		var $bookrating;
		var $reviewdate;
		
		function BookReview($customerid, $bookheading, $bookcomments, $bookrating, $reviewdate){
			$this->customerid = $customerid;
			$this->bookheading = $bookheading;
			$this->bookcomments = $bookcomments;
			$this->bookrating = $bookrating;
			$this->reviewdate = $reviewdate;
		}
		
	};
	
	require('cross_site_scripting.php');
	require('db_connect.php');
	
	/*Validation to check to see if anything has been entered into the fields below for bookheading, bookreview and bookcomments*/
	if (empty ($_POST['bookheading']))
	{
		$errors = 'You must enter a book name.<br>';
	}
	
	else
	{
		$bookheading = stripslashes($bookheading);
		$bh = mysqli_real_escape_string($db, trim($_POST['bookheading']));
	}
	
	if (empty ($_POST['bookrating']))
	{
		$errors = 'You must enter a book title.<br>';
	}
	
	else
	{
		$bookrating = stripslashes($bookrating);
		$br = mysqli_real_escape_string($db, trim($_POST['bookrating']));
	}
	
	if (empty ($_POST['bookcomments']))
	{
		$errors = 'You must enter comments about the book.<br>';
	}
	
	else
	{
		$bookcomments = stripslashes($bookcomments);
		$bc = mysqli_real_escape_string($db, trim($_POST['bookcomments']));
	}

	/*Test to see if rating form can have values inserted into MySQL database*/
	$sql = "INSERT INTO Review (customerid, bookheading, bookcomments, bookrating, reviewdate) 
	VALUES('{$_SESSION['customerid']}', '$bh', '$bc', '$br', NOW())";
	$r = mysqli_query($db, $sql);
	
	$BooksReview = array();
	
	/*Table to be printed out showing current eBook review added*/
	if ($r)
	{
		$BookReview = new BookReview($row['customerid'], $row['bookheading'], $row['bookcomments'], $row['bookrating'], $row['reviewdate']);
		array_push($BooksReview, $BookReview);	
	}
	
	else
	{
		header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error: " . mysqli_error($db), true, 500);		
		foreach ($errors as $msg)
		{
			echo " - $msg. Please try again.<br>";
		}
	}
	
	mysqli_close($db);
	
	echo json_encode($BooksReview);	
?>
