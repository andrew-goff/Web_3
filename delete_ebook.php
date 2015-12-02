<?php
 session_start();
  /*Check to make sure that authorid is in the session and author is logged in */
  if(!isset($_SESSION['authorid']))
  {
	require('authorlogin_tool.php');
	load();
  }

  include('includes/header.html');
  
  require('db_connect.php');

  $errors = array();
  /*Validation to check to see if fields below for title, price and genre are empty */  
  if (empty ($_POST['title']))
  {
    $errors[] = 'You must enter a ebook title.<br>';
  }
  
  else
  {
	$title = stripslashes($genre);
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
    
  
  if (empty ($_POST['price']))
  {
    $errors[] = 'You must enter a ebook price.<br>';
  }
  
  else
  {
	$price = stripslashes($price);
    $pr = mysqli_real_escape_string($db, trim($_POST['price']));
  }

  /*Test to see if form can have values deleted from MySQL database*/
  if (empty ($errors))
  {
    $sql = "DELETE FROM eBook WHERE title = '$t' OR genre = '$g' OR price = '$p'";
  
    $r = mysqli_query ($db, $sql);
    
    if($r)
    {
		echo "<h1>You have deleted an ebook.</h1>
		<p>You have deleted an ebook from the book.</p>
		<p><a href=\"author_home.php\">Home</a></p>";    
    }	
	mysqli_close($db);
	exit();
  }

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
<h1>Delete eBook</h1>
<form action="delete_ebook.php" method="POST">
<p>eBook Title:<input type="text" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title'];?>"></p>
<p>eBook Genre:<input type="text" name="genre" value="<?php if (isset($_POST['genre'])) echo $_POST['genre'];?>"></p>
<p>eBook Price:<input type="text" name="price" value="<?php if (isset($_POST['price'])) echo $_POST['price'];?>"></p>
<input type="submit" value="Delete eBook">
</form>
<?php include('includes/footer.html'); ?>