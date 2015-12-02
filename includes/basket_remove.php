<?php
	if (!session_id()) session_start();
	/*Check to make sure session id is stored in session and paymentid and sin are posted*/
	$sessionid = session_id();
	if (isset($_POST['paymentid'])) $paymentid = $_POST['paymentid'];
	if (isset($_POST['sin'])) $sin = $_POST['sin'];
	
	require('db_connect.php');
	
	/*Test to check paymentid is selected from Purchase MySQL table */
	$sql = "SELECT paymentid FROM Purchase WHERE sessionid = '{$sessionid}'";
	$r = mysqli_query($db, $sql);
	
	if ($r)
	{
		/*Array to fetch the current row where it is paymentid */
		$row = mysqli_fetch_row($r);
		$paymentid = $row[0];
	
		/*PHP test to check current row is deleted from Item table where it equals sin and paymentid in the MySQL database */
		$sql = "DELETE FROM Item WHERE paymentid = {$paymentid} AND sin = '{$sin}'";
		$ra = mysqli_query($db, $sql);

		if($ra)
		{
			echo '<p>A eBook item has been removed from your basket.</p>';
		}
		else
		{
			echo '<p>' . mysqli_error($db)  . '</p>';
		}
	}

	mysqli_close($db);

	require('basket.php');

?>
