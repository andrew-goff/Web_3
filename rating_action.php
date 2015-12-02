<?php
	session_start();
	
	require('db_connect.php');
	
	include('includes/header.html'); 
	$errors = array();
	/*Validation to check to see if anything has been entered into the fields below for bookheading, bookreview and bookcomments*/
	if (empty ($_POST['bookheading']))
	{
		$errors[] = 'You must enter a book name.<br>';
	}
	
	else
	{
		$bookheading = stripslashes($bookheading);
		$bh = mysqli_real_escape_string($db, trim($_POST['bookheading']));
	}
	
	if (empty ($_POST['bookrating']))
	{
		$errors[] = 'You must enter a book title.<br>';
	}
	
	else
	{
		$bookrating = stripslashes($bookrating);
		$br = mysqli_real_escape_string($db, trim($_POST['bookrating']));
	}
	
	if (empty ($_POST['bookcomments']))
	{
		$errors[] = 'You must enter comments about the book.<br>';
	}
	
	else
	{
		$bookcomments = stripslashes($bookcomments);
		$bc = mysqli_real_escape_string($db, trim($_POST['bookcomments']));
	}
	
	if(empty ($errors))
	{
		/*Test to see if rating form can have values inserted into MySQL database*/
		$sql = "INSERT INTO Review (customerid, bookheading, bookrating, bookcomments, reviewdate) 
		VALUES({$_SESSION['customerid']}, '$bh', '$br', '$bc', NOW())";
	
		$r = mysqli_query($db, $sql);
		
		if ($r)
		{
			/*Statements printed out showing the customer has completed a review of the eBook */
			echo '<h1>Review completed!</h1>';
			echo "<p>Thanks for the book review: {$_SESSION['customerfirstname']} {$_SESSION['customerlastname']} at
			{$_SESSION['customeraddress']}</p>
			<p>Your book review is appreciated.</p>
			<p><a href='customer_home.php'>Home</a></p>";
		}
		
		mysqli_close($db);
		exit();			
	}
	
	/*Error message brought up from test if there are any empty rows */
	else
	{
		echo '<h1>Error!</h1>';
		echo '<p id="err_msg">There was a problem.<br>';
		
		foreach ($errors as $msg)
		{
			echo " - $msg<br>";
		}
		
		echo '<p> Please try again.</p>';
	}
	
?>