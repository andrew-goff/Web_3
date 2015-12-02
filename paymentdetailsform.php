<?php 
	session_start();
	/*Check to make sure customer is logged in and customer id is stored in session */
	if(!isset($_SESSION['customerid']))
	{
		require('customerlogin_tool.php');
		load();
	}
	
	$page_title = 'Customer card details';
	if(isset ($errors) && !empty($errors))
	{
		echo '<p id="err_msg">There was a problem:<br>';
		
		foreach ($errors as $msg)		
		{
			echo " - $msg<br>";
		}
		
		echo 'Please try again and enter card details. </p>';
	}
	
	include('includes/header.html'); 
?>
<h1>Credit Card details</h1>
<table col="2">
<form action="purchase.php" method="POST">
<tr><td>Purchase Payment type:</td></tr>
<select id="purchasepaymenttype" name="purchasepaymenttype">
	<option>Mastercard</option>
	<option>Visa</option>
	<option>American Express</option>
</select>
<tr><td>Card Purchase Date:</td></tr>
<tr><td><input type="text" name="purchasedate" value="<?php if (isset($_POST['purchasedate'])) echo $_POST['purchasedate'];?>"></td></tr>
<tr><td>Card Number:</td></tr>
<tr><td><input type="text" name="cardnumber" value="<?php if (isset($_POST['cardnumber'])) echo $_POST['cardnumber'];?>"></td></tr>
<tr><td>Card Name:</td></tr>
<tr><td><input type="text" name="cardname" value="<?php if (isset($_POST['cardname'])) echo $_POST['cardname'];?>"></td></tr>
<tr><td>Card Valid From:</td></tr>
<tr><td><input type="text" name="validfrom" value="<?php if (isset($_POST['validfrom'])) echo $_POST['validfrom'];?>"></td></tr>
<tr><td>Card Valid To:</td></tr>
<tr><td><input type="text" name="validto" value="<?php if (isset($_POST['validto'])) echo $_POST['validto'];?>"></td></tr>
<input type="submit" value="Add Card Details">
</form>
</table>
<?php include('includes/footer.html'); ?>