<?php

/*Function to load current or specific URL */
function load ($page = 'customer_login.php')
{
  /*URL to begin with http protocol, server name and current directory name */
  $url = $SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']);
  
  $url = rtrim($url, '/\\');
  $url .= '/' . $page;
  
  header("Location: $url");
  exit();
}

function validate($db, $customeremail = '', $customerpassword = '')
{
  /*Function to check all rows are not empty */
  $errors = array();

  if(empty($customeremail))
  {
    $errors[] = 'Enter your email address.<br>';
  }
  
  else
  {
	$customeremail = stripslashes($customeremail);
    $ce = mysqli_real_escape_string($db, trim($customeremail));
  }
  
  if(empty($customerpassword))
  {
    $errors[] = 'Enter your password.<br>';
  }
  
  else
  {
	$customerpassword = stripslashes($customerpassword);
    $cp = mysqli_real_escape_string($db, trim($customerpassword));
  }
  
  /*Test to check if there are errors or empty rows in the MySQL data being entered */
  if (empty($errors))
  {
    $sql = "SELECT customerid, customerfirstname, customerlastname, customeraddress 
    FROM eBook_Customer
    WHERE customeremail = '$ce'
    AND customerpassword = SHA1('$cp')";
    
    $r = mysqli_query($db, $sql);
    
    if ( mysqli_num_rows ($r) >= 0 )
    {
	  $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
      return array(true, $row);
    }
    else 
    {
      $errors[] = 'Email and password are not located.<br>';
    }
  }
  
  return array(false, $errors);
}
?>