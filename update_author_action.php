<?php
 session_start();
 include('includes/header.html');
 require('db_connect.php');
  /*Author id is given via the session */
  $authorid = $_SESSION['authorid'];
  /*Check to see if form input is submitted */
  $errors = array();
  /*Validation to check to see if anything has been entered into the fields below for first name, last name, email and password*/
  if (empty ($_POST['authorfirstname']))
  {
    $errors[] = 'You must enter a first name.<br>';
  }
  
  else
  {
	$authorfirstname = stripslashes($authorfirstname);
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
    $errors[] = 'You must enter a email address.<br>';
  }
  
  else
  {
	$authoremail = stripslashes($authoremail);
    $ae =  mysqli_real_escape_string($db, trim($_POST['authoremail']));
  } 
  
    if (empty ($errors))
    { 
	/*Test to see if form can have values inserted into MySQL database*/
	$sql = "UPDATE Author Set authorfirstname = '$afn', authorlastname = '$aln', authoremail = '$ae' WHERE authorid = {$authorid}";
    $r = mysqli_query ($db, $sql);

    if($r)
    {
      echo '<p>Your details are now updated.</p>
      <p><a href="author_home.php">Home</a></p>';   
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