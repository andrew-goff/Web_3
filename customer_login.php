<?php

	$page_title = 'Login';
	include('includes/header.html');
	
	/*Display error messages in login if fields are presently empty */
	if(isset ($errors) && !empty($errors))
	{
		echo '<p id="err_msg">There was a problem:<br>';
		
		foreach($errors as $msg)
		{
			echo " - $msg<br>";
		}
		
		echo 'Please try again or <a href="customer_register.php">Register</a></p>';
	}
?>
<h1>Login</h1>
<form action="customerlogin_action.php" method="POST">
<p>Customer Email Address: <input type="text" name="customeremail" value="<?php if (isset($_POST['customeremail'])) echo $_POST['customeremail'];?>"></p>
<p>Customer Password: <input type="password" name="customerpassword" value="<?php if (isset($_POST['customerpassword'])) echo $_POST['customerpassword']?>"></p>
<input type="submit" value="Login"/>
</form>
<?php include('includes/footer.html'); ?>

   
