<?php 
	session_start();
	/*Check to make sure customer is logged in and customer id is in the session */
	if(!isset($_SESSION['customerid']))
	{
		require('customerlogin_tool.php');
		load();
	}
	
	/*Display error messages in ebook rating if fields are presently empty */
	$page_title = 'Book Review';
	if(isset ($errors) && !empty($errors))
	{
		echo '<p id="err_msg">There was a problem:<br>';
		
		foreach ($errors as $msg)		
		{
			echo " - $msg<br>";
		}
		
		echo 'Please try again and enter a book review. </p>';
	}
	
	include('includes/header.html'); 
?>
<h1>Reviews</h1>
<table col="2">
<form action="rating_action.php" method="POST">
<tr><td>Book Heading:</td></tr>
<tr><td><input type="text" name="bookheading" value="<?php if (isset($_POST['bookheading'])) echo $_POST['bookheading'];?>"></td></tr>
<tr><td>Book Rating:</td></tr>
<tr><td><input type="text" name="bookrating" value="<?php if (isset($_POST['bookrating'])) echo $_POST['bookrating'];?>"></td></tr>
<tr><td>Book Comments:</td></tr>
<tr><td><textarea rows="5" cols="20" name="bookcomments" value="<?php if (isset($_POST['bookcomments'])) echo $_POST['bookcomments'];?>">
</textarea></td></tr>
<input type="submit" value="eBook Rating">
</form>
</table>
<?php include('includes/footer.html'); ?>