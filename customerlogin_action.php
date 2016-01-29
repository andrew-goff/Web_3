<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require('db_connect.php');
	require('customerlogin_tool.php');
	
	list($check, $data) = validate($db, $_POST['customeremail'], $_POST['customerpassword']);
		
	/*Checks that there is data being posted from the session */
	if ($check)
	{	
		session_start();			

		$_SESSION['customerid'] = $data ['customerid'];
		$_SESSION['customerfirstname'] = $data['customerfirstname'];
		$_SESSION['customerlastname'] = $data['customerlastname'];
		$_SESSION['customeraddress'] = $data['customeraddress'];
		$_SESSION['customeremail'] = $data['customeremail'];

		load('customer_home.php');		
	}
	
	else
	{
		$errors = $data;
		echo '<p>There is an error in the data submitted. Try again</p>';
		mysqli_close($db);

		include ('customer_login.php');	
	}
}
?>