<?php
 session_start();
	
  if(!isset($_SESSION['authorid']))
  {
	require('authorlogin_tool.php');
	load();
  }

  include('includes/header.html');
  require('db_connect.php');

  $errors = array();
  /*Validation to check to see if fields below for price and genre are empty*/  
  if (empty ($_POST['title']))
  {
    $errors[] = 'You must enter a ebook title.<br>';
  }
  
  else
  {
    $t = mysqli_real_escape_string($db, trim($_POST['title']));
  }
  
  if (empty ($_POST['genre']))
  {
    $errors[] = 'You must enter a ebook genre.<br>';
  }
  
  else
  {
    $g = mysqli_real_escape_string($db, trim($_POST['genre'])); 
  }
    
  
  if (empty ($_POST['price']))
  {
    $errors[] = 'You must enter a ebook price.<br>';
  }
  
  else
  {
    $pr = mysqli_real_escape_string($db, trim($_POST['price']));
  }

  /*Test to see if form can have values inserted into MySQL database*/
  if (empty ($errors))
  {
    $sql = "UPDATE eBook Set price = '$pr', genre = '$g' WHERE title = '$t'";
  
    $r = mysqli_query ($db, $sql);
    
    if($r)
    {
		echo "<h1>You have updated an ebook</h1>
		<p>You have made changes to an existing eBook.</p>
		<p><a href=\"author_home.php\">Home</a></p>";    
    }	
	mysqli_close($db);
	exit();
  }
   /*Error checks to make sure that form fields are not left empty */
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
<h1>Update eBook</h1>
<form action="update_ebook.php" method="POST">

<p>eBook Title:<input type="text" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title'];?>"></p>
<p>eBook Genre:<input type="text" name="genre" value="<?php if (isset($_POST['genre'])) echo $_POST['genre'];?>"></p>
<p>eBook Price:<input type="text" name="price" value="<?php if (isset($_POST['price'])) echo $_POST['price'];?>"></p>

<input type="submit" value="Update eBook">
</form>
