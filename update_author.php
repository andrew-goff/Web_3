<?php 
	session_start();

	if(!isset($_SESSION['authorid']))
	{
		require('authorlogin_tool.php');
		load();
	}
	include('includes/header.html'); 
?>
<h1>Author Register</h1>
<form action="update_author_action.php" method="POST">

<p>Author First Name:<input type="text" name="authorfirstname" value="<?php if (isset($_POST['authorfirstname'])) echo $_POST['authorfirstname'];?>"></p>
<p>Author Last Name:<input type="text" name="authorlastname" value="<?php if (isset($_POST['authorlastname'])) echo $_POST['authorfirstname'];?>"></p>
<p>Author Email Address:<input type="text" name="authoremail" value="<?php if (isset($_POST['authoremail'])) echo $_POST['authoremail'];?>"></p>

<input type="submit" value="Update Author">
</form>
<?php include('includes/footer.html'); ?>