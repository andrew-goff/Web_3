<?php
 include('includes/header.html');
 require('db_connect.php');
 
 /*Check to see if form input is submitted */
 if ($_SERVER['REQUEST_METHOD'] == 'POST') 
 {
  $errors = array();
  /*Validation to check to see if anything has been entered into the fields below for first name, last name, email and password*/
  if (empty ($_POST['customerfirstname']))
  {
    $errors[] = 'You must enter a first name.<br>';
  }
  
  else
  {
	$customerfirstname = stripslashes($customerfirstname);
    $cfn = mysqli_real_escape_string($db, trim($_POST['customerfirstname']));    
  }
  
  if (empty ($_POST['customerlastname']))
  {
    $errors[] = 'You must enter a last name.<br>';
  }
  
  else
  {
	$customerlastname = stripslashes($customerlastname);
    $cln = mysqli_real_escape_string($db, trim($_POST['customerlastname']));       
  }
  
  if (empty ($_POST['customeraddress']))
  {
    $errors[] = 'You must enter a home address.<br>';
  }
  
  else
  {
	$customeraddress = stripslashes($customeraddress);
    $cad = mysqli_real_escape_string($db, trim($_POST['customeraddress']));   
  }
  
  if (empty ($_POST['customeremail']))
  {
    $errors[] = 'You must enter a email address.<br>';
  }
  
  else
  {
	$customeremail = stripslashes($customeremail);
    $ce =  mysqli_real_escape_string($db, trim($_POST['customeremail']));
  }
  
  if (empty ($_POST['customerpassword']))
  {
  $errors[] = 'You must enter a password.<br>';
  }
  
  else
  {
	$customerpassword = stripslashes($customerpassword);
    $cp = mysqli_real_escape_string($db, trim($_POST['customerpassword']));   
  }

  
  if (empty ($errors))
  { 
	/*Test to see if form can have values inserted into MySQL database*/
	$sql = "INSERT INTO eBook_Customer (customerfirstname, customerlastname, customeraddress, customeremail, customerpassword)
    VALUES('$cfn', '$cln', '$cad', '$ce', SHA1('$cp'))";
  
    $r = mysqli_query ($db, $sql);
    
    if($r)
    {
    echo '<h1>You are registered</h1>
    <p>You are now registered as an Customer</p>
    <p><a href="customer_login.php">Login</a></p>';    
    }
	mysqli_close($db);
	exit();
	}
    /*Test to bring up error message if any form fields are blank */
	else 
	{  
	echo '<h1>Error!</h1>';
	echo '<p id="err_msg">There was a problem:<br>';
  
	foreach($errors as $msg)
	{
		echo " - $msg<br>";
	}
  
	echo 'Please try again</p>';
	mysqli_close($db);
   }
 } 
   
?>