<?php
 session_start();
 include('includes/header.html');
 require('db_connect.php');
 /*Customer id is given via the session */
 $customerid = $_SESSION['customerid'];
 /*Check to see if form input is submitted */
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
  
    if (empty ($errors))
    { 
	/*Test to see if form can have values inserted into MySQL database*/
	$sql = "UPDATE eBook_Customer Set customerfirstname = '$cfn', customerlastname = '$cln', customeraddress = '$cad', customeremail = '$ce' WHERE customerid = {$customerid}";
    $r = mysqli_query ($db, $sql);
	
    if($r)
    {
      echo '<p>Your details are now updated.</p>
      <p><a href="customer_home.php">Home</a></p>';   
    }
	mysqli_close($db);
	exit();
	}
	/*Check for errors in empty forms and display error message */
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

   
?>