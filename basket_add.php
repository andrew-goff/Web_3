<?php
	//I:\Computing Solutions (Internet)\Year 2\Term 3\Web 3\basket_add.php
    if (!session_id()) session_start();
	
	$sessionid = session_id();
	$sin = $_POST['sin'];
	$customerid = $_SESSION['customerid'];

	require('db_connect.php');
	
	// Find if the basket all ready exists.
	$sql = "SELECT paymentid FROM Purchase WHERE sessionid = '{$sessionid}'";
	$r = mysqli_query($db, $sql);
	
	if ($r)
	{
		$num = mysqli_num_rows ($r);
			
		if ($num == 0 )
		{
			// Basket doesn't exist, add one.
			$sql = "INSERT INTO Purchase (customerid, sessionid) VALUES(";
			if ($customerid) {
				$sql = $sql . $customerid;
			}
			else
			{
				$sql = $sql . "NULL";
			}
			$sql = $sql . ", '{$sessionid}')";


			$r = mysqli_query($db, $sql);
			
			if (!$r)
			{
				echo '<p>SQL INSERT Item error '.mysqli_error($db).'</p>';
			}
		}

		// Get the basket id
		$sql = "SELECT paymentid FROM Purchase WHERE sessionid = '{$sessionid}'";
		$r = mysqli_query($db, $sql);
	
		if ($r)
		{
			$row = mysqli_fetch_row($r);
			$paymentid = $row[0];

			// Add the book if doesn't exist
			$sql = "SELECT * FROM Item WHERE paymentid = {$paymentid} AND sin = '{$sin}'";
			$r = mysqli_query($db, $sql);
			
			if ($r)
			{
				$num = mysqli_num_rows($r);
					
				if ($num == 0 )
				{
					$sql = "INSERT INTO Item(paymentid, sin, amountdue) SELECT {$paymentid}, b.sin, b.price FROM eBook b WHERE b.sin = '{$sin}'";
					
					$r = mysqli_multi_query($db, $sql);

					if (!$r)
					{
						// Error
						echo '<p>SQL INSERT Item error '.mysqli_error($db).'</p>';
					}
				}
			}
			else
			{
				// Error.
				echo '<p>SQL SELECT error '.mysqli_error($db).'</p>';
			}
		}
		else
		{
			// Error.
			echo '<p>SQL SELECT Purchase error '.mysqli_error($db).'</p>';
		}
	}
	else
	{
		// Error.
		echo '<p>SQL SELECT Payment error '.mysqli_error($db).'</p>';
	}

	mysqli_close($db);

	require('basket.php');
?>