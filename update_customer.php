<?php 
	session_start();

	if(!isset($_SESSION['customerid']))
	{
		require('customerlogin_tool.php');
		load();
	}
	include('includes/header.html'); 
?>
<h1>Customer Register</h1>
<form action="update_customer_action.php" method="POST">

<p>Customer First Name:<input type="text" name="customerfirstname" value="<?php if (isset($_POST['customerfirstname'])) echo $_POST['customerfirstname'];?>"></p>
<p>Customer Last Name:<input type="text" name="customerlastname" value="<?php if (isset($_POST['customerlastname'])) echo $_POST['customerlastname'];?>"></p>
<p>Customer Address:<input type="text" name="customeraddress" value="<?php if (isset($_POST['customeraddress'])) echo $_POST['customeraddress'];?>"></p>
<p>Customer Email Address:<input type="text" name="customeremail" value="<?php if (isset($_POST['customeremail'])) echo $_POST['customeremail'];?>"></p>

<input type="submit" value="Update Customer">
</form>
<?php include('includes/footer.html'); ?>