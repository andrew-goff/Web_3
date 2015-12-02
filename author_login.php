<?php

	$page_title='Login';
	include('includes/header.html');
	
	/*Display error messages in login if fields are presently empty */
	if(isset ($errors) && !empty($errors))
	{
		echo '<p id="err_msg">There was a problem:<br>';
    
		foreach($errors as $msg)
		{
			echo " - $msg<br>";
		}
		
		echo 'Please try again or <a href="author_register.php">Register</a></p>';
  }
?>
<h1>Login</h1>
<form action="authorlogin_action.php" method="POST">
<p>Author Email Address: <input type="text" name="authoremail" value="<?php if (isset($_POST['authoremail'])) echo $_POST['authoremail'];?>"></p>
<p>Author Password: <input type="password" name="authorpassword" value="<?php if (isset($_POST['authorpassword'])) echo $_POST['authorpassword'];?>"></p>
<input type="submit" value="Login"/>
</form>
<?php include('includes/footer.html'); ?>