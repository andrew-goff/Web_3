<?php
include('includes/header.html');
require('db_connect.php');

/*Check to see if form input is submitted */
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  $errors = array();
  /*Validation to check to see if anything has been entered into the fields below for first name, last name, email and password*/
  if (empty ($_POST['authorfirstname']))
  {
    $errors[] = 'You must enter a first name.<br>';
  }
  
  else
  {
	$authorfirstname = stripslashes($authorlastname);
    $afn = mysqli_real_escape_string($db, trim($_POST['authorfirstname']));
  }
  
  if (empty ($_POST['authorlastname']))
  {
    $errors[] = 'You must enter a last name.<br>';
  }
  
  else
  {
	$authorlastname = stripslashes($authorlastname);
    $aln = mysqli_real_escape_string($db, trim($_POST['authorlastname'])); 
  }
  
  if (empty ($_POST['authoremail']))
  {
    $errors[] = 'You must enter a correct email address format.<br>';
  }
  
  else
  {
	$authoremail = stripslashes($authoremail);
    $ae =  mysqli_real_escape_string($db, trim($_POST['authoremail']));
  }
  
  if (empty ($_POST['authorpassword']))
  {
    $errors[] = 'You must enter a password.<br>';
  }
  
  else
  {
	$authorpassword = stripslashes($authorpassword);
    $ap = mysqli_real_escape_string($db, trim($_POST['authorpassword']));
  }

  /*Test to see if form can have values inserted into MySQL database*/
  if (empty ($errors))
  {
    $sql = "INSERT INTO Author (authorfirstname, authorlastname, authoremail, authorpassword)
    VALUES('$afn', '$aln', '$ae', SHA1('$ap'))";
  
    $r = mysqli_query ($db, $sql);
    
    if($r)
    {
      echo '<h1>You are registered</h1>
      <p>You are now registered as a Author</p>
      <p><a href="author_login.php">Login</a></p>';    
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