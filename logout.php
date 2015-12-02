<?php

	session_start();
	/*Check to make sure customer is logged in and customer id is stored in session or the author is logged in and authorr id is stored in session*/
	if (!isset($_SESSION['customerid']))
	{
		require('customerlogin_tool.php');
		load();
	}

	else if (!isset($_SESSION['authorid']))
	{
		require('authorlogin_tool.php');
		load();
	}

	$page_title = 'Logout';
	include('includes/header.html');
	
	$_SESSION = array();
	/*Destroy the session once either the author or customer has logged out */
	session_destroy();

	echo '<p>You are now logged out!</p>';
	echo '<p><a href="customer_login.php">Login as a customer</a> | <a href="author_login.php">Login as a author</a></p>';
	
	include ('includes/footer.html');
?>