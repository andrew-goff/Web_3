<?php
  session_start();
  /*Check to make sure that the author is logged in and author id is in the session */
  if(!isset($_SESSION['authorid']))
  {
	require('authorlogin_tool.php');
	load();
  }
	
  require('db_connect.php');
  
  include('includes/header.html');
  
  $errors = array();
  /*Validation to check to see if anything has been entered into the fields below */  
  if (empty ($_POST['title']))
  {
    $errors[] = 'You must enter a ebook title.<br>';
  }
  
  else
  {
	$title = stripslashes($title);
    $t = mysqli_real_escape_string($db, trim($_POST['title']));
  }
  
  if (empty ($_POST['genre']))
  {
    $errors[] = 'You must enter a ebook genre.<br>';
  }
  
  else
  {
	$genre = stripslashes($genre);
    $g = mysqli_real_escape_string($db, trim($_POST['genre'])); 
  }
  
  if (empty ($_POST['synopsis']))
  {
    $errors[] = 'You must enter a ebook synopsis.<br>';
  }
  
  else
  {
	$synopsis = stripslashes($synopsis);
	$sy = mysqli_real_escape_string($db, trim($_POST['synopsis']));
  }
  
  if (empty ($_POST['publisher']))
  {
    $errors[] = 'You must enter a ebook publisher.<br>';
  }
  
  else
  {
	$publisher = stripslashes($publisher);
    $pu = mysqli_real_escape_string($db, trim($_POST['publisher']));
  }
  
  if (empty ($_POST['price']))
  {
    $errors[] = 'You must enter a ebook price.<br>';
  }
  
  else
  {
	$price = stripslashes($price);
    $pr = mysqli_real_escape_string($db, trim($_POST['price']));
  }

  if (empty ($_POST['format']))
  {
    $errors[] = 'You must enter a ebook format.<br>';
  }
  
  else
  {
	$format = stripslashes($format);
    $f = mysqli_real_escape_string($db, trim($_POST['format']));
  }

  /*Test to see if form can have values inserted into MySQL database*/
  if (empty ($errors))
  {
    $sql = "INSERT INTO eBook (title, synopsis, genre, publisher, price, format, publicationdate)
    VALUES('$t', '$sy', '$g', '$pu', '$pr', '$f', NOW())";
  
    $r = mysqli_query ($db, $sql);
    
    if($r)
    {
		echo "<h1>You have added an ebook</h1>
		<p>You have added a new eBook.</p>
		<p><a href=\"author_home.php\">Home</a></p>";  
    }	
	mysqli_close($db);
	exit();
  }

  /*Test to display errors if form fields are empty */
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
<h1>Add eBook</h1>
<form action="add_ebook.php" method="POST">
<p>eBook Sin:<input type="text" name="sin" value="<?php if (isset($_POST['sin'])) echo $_POST['sin'];?>"></p>
<p>eBook Title:<input type="text" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title'];?>"></p>
<p>eBook Genre:<input type="text" name="genre" value="<?php if (isset($_POST['genre'])) echo $_POST['genre'];?>"></p>
<p>eBook Synopsis:<input type="text" name="synopsis" value="<?php if (isset($_POST['synopsis'])) echo $_POST['synopsis'];?>"></p>
<p>eBook Publisher:<input type="text" name="publisher" value="<?php if (isset($_POST['publisher'])) echo $_POST['publisher'];?>"></p>
<p>eBook Price:<input type="text" name="price" value="<?php if (isset($_POST['price'])) echo $_POST['price'];?>"></p>
<p>eBook Format:<input type="text" name="format" value="<?php if (isset($_POST['format'])) echo $_POST['format'];?>"></p>
<input type="submit" value="Add eBook">
</form>
<?php include('includes/footer.html'); ?>