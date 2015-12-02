<?php

/*Function to load current or specific URL */
function load ($page = 'author_login.php')
{    
  /*URL to begin with http protocol, server name and current directory name */
  $url =  $SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
  
  $url = rtrim($url, '/\\');
  $url .= '/' . $page;
  
  header("Location: $url");    
  exit();
}

function validate($db, $authoremail = '', $authorpassword = '')
{
  /*Function to validate all rows are correct and authoremail and authorpassword are not empty */
  $errors = array();
  
  if(empty($authoremail))
  {
    $errors[] = 'Enter your email address.<br>';
  }
  
  else
  {
	$authoremail = stripslashes($authoremail);
    $ae = mysqli_real_escape_string($db, trim($authoremail));
  }
  
  if(empty($authorpassword))
  {
    $errors[] = 'Enter your password.<br>';
  }
  
  else
  {
	$authorpassword = stripslashes($authorpassword); 
    $ap = mysqli_real_escape_string($db, trim($authorpassword));
  }
  
  
  /*Test to check if there are errors or empty rows in the MySQL data being entered */
  if (empty($errors))
  {
    $sql = "SELECT authorid, authorfirstname, authorlastname
    FROM Author 
    WHERE authoremail = '$ae'
    AND authorpassword = SHA1('$ap')";
    
    $r = mysqli_query($db, $sql);
    
    if ( mysqli_num_rows($r) >= 0 )
    {
      $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
      return array(true, $row);
    }
    
	/*Error message to be displayed if password and email are empty or not found */
    else 
    {
      $errors[] = 'Email and password are not located.<br>';
    }
  }
  
  return array(false, $errors);
}
?>