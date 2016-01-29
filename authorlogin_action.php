<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	require('db_connect.php');
	require('authorlogin_tool.php');
  
	list($check, $data) = validate($db, $_POST['authoremail'], $_POST['authorpassword']);
  
	/*Checks that there is data being posted from the session */
	if ($check)
	{	
		session_start();
		$_SESSION['authorid'] = $data ['authorid'];
		$_SESSION['authorfirstname'] = $data['authorfirstname'];
		$_SESSION['authorlastname'] = $data['authorlastname']; 
		
		load('author_home.php');
	}	
	
	else
	{
		$errors = $data;
		echo '<p>There is an error in the data submitted. Try again</p>';
		mysqli_close($db);
		
		include ('author_login.php');
	} 
}

?>