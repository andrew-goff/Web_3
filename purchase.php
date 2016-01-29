<?php
	session_start();
	
	/*Check to make sure customer is logged in and customer id is stored in session */
	if(!isset($_SESSION['customerid']))
	{
		require ('customerlogin_tool.php');
		load();
	}
	
	/*Variables get data from posted form fields and data stored in sessions */
	$sessionid = session_id();
	$customerid = $_SESSION['customerid'];
	$purchasepaymenttype = $_POST['purchasepaymenttype'];
	$purchasedate = $_POST['purchasedate'];
	$cardnumber = $_POST['cardnumber'];
	$cardname = $_POST['cardname'];
	$validfrom = $_POST['validfrom'];
	$validto = $_POST['validto'];

	$page_title = 'Checkout basket';
	include('includes/header.html');

	require('db_connect.php');
	
	/*PHP test to search for all payments in purchase by sessionid in the MySQL database */
	$sql = "SELECT paymentid FROM Purchase WHERE sessionid = '{$sessionid}'";
	$r = mysqli_query($db, $sql);		

	if($r)
	{	
		$row = mysqli_fetch_row($r);
		$paymentid = $row[0];
		
		$sql = "UPDATE Purchase SET customerid = {$customerid}, purchasepaymenttype = '{$purchasepaymenttype}', purchasedate = '{$purchasedate}', 
		cardnumber = '{$cardnumber}', cardname = '{$cardname}', validfrom = '{$validfrom}', validto = '{$validto}' 
		WHERE paymentid = {$paymentid}";

	    if($r)
	    {
			$sql = "SELECT * FROM Item WHERE paymentid = {$paymentid}";
			$r = mysqli_query($db, $sql);		

		    if($r)
		    {       
				$num = mysqli_num_rows($r);
    
				if ($num > 0)
				{
					while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
					{
						$sin = $row['sin'];
						$url = 'http://'. $SERVER['HTTP_HOST'] . "/" . customerid . "/" . $sin;
						$sql = "UPDATE Item SET licence =  'Proprietary', url = '{$url}' WHERE paymentid = {$paymentid} AND sin = '{$sin}'";
						$ru = mysqli_query($db, $sql);		
				
						if (!$ru)
						{
							// Error.
							echo '<p>SQL UPDATE error '.mysqli_error($db).'</p>';
						}
					}
				}
				
				echo "<p>Thanks for the purchase of the eBook. Your paymentid is: {$paymentid}</p>";
			}		

			mysqli_close($db);
		}
		else
		{
			// Error.
			echo '<p>SQL SELECT error '.mysqli_error($db).'</p>';
		}
	}
	else
	{
		echo '<p>There are no items currently in your basket.</p>';
	}
	
	echo '<p><a href="ebook_search.php">Search for an eBook</a> | <a href="ebook_rating.php">Rate an eBook</a> |
	<a href="logout.php">Logout</a> | <a href="customer_home.php">Home</a></p>';
	include('includes/footer.html');
?>