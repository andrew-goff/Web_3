<?php
	session_start();

	$page_title = 'Basket details';

	include('includes/header.html');
	/*Check to make sure sessionid is initialized */
	echo '<h1>Basket</h1>';
	$sessionid = session_id();
    require ('db_connect.php');    

	/*PHP test to check if the MySQL data can be selected and joined with another table */
    $sql = "SELECT i.*, e.title FROM Item i INNER JOIN eBook e ON i.sin = e.sin INNER JOIN Purchase p ON i.paymentid = p.paymentid WHERE p.sessionid = '{$sessionid}' AND p.purchasepaymenttype IS NULL ORDER BY i.sin ASC";
    $ra = mysqli_query($db, $sql);
    
    echo "<table border = '1.5'><tr><th>Items in Basket</th></tr><tr>";
    echo "<tr><td>{$row['paymentid']}</td></tr>";

    $total = 0;
    
    if($ra)
    {
        $num = mysqli_num_rows($ra);
    
        if ($num > 0)
        {
            while($row = mysqli_fetch_array($ra, MYSQLI_ASSOC))
            {
                # Calculate sub total and total price
                $subtotal = $row['amountdue'];
                $total += $subtotal;

                echo "<form id =\"basketRemove\"  method=\"post\" action=\"basket_remove.php\">";
                echo "<input type=\"hidden\" name=\"paymentid\" value=\"{$row['paymentid']}\">";
                echo "<input type=\"hidden\" name=\"sin\" value=\"{$row['sin']}\">";
                echo "<tr><td>{$row['sin']}</td></tr>";
                echo "<tr><td>{$row['title']}</td></tr>";
                echo "<tr><td> &pound{$row['amountdue']}</td></tr>";
                echo "<tr><td> &pound" . number_format($subtotal, 2) . "</td></tr>";
                echo "<tr><td>{$row['amountdue']}</td></tr>"; 
                echo "<tr><td>{$row['url']}</td></tr>";
                echo "<tr><td>" . "<input type=\"submit\" value=\"Remove from Basket\">" . "</td></tr>";	
                echo "</form>";
            }
        }
		/*Check to print out a statement showing no items in basket */
        else
        {
            echo '<p>There are currently no items in your basket.</p>';
        }
    }
    else
    {
		// Error.
		echo '<p>SQL Error: '.mysqli_error($db).'</p>';
    }
    
    echo "<tr><td colspan='12' style='text-align:center'> Total = &pound".number_format($total, 2)."</td></tr>";
    echo "</tr></table>";
    
    mysqli_close($db);

	echo '<p><a href="user_home.php">Home</a> | <a href="ebook_search.php">Search</a> | <a href="paymentdetailsform.php">Buy</a></p>';

   	include('includes/footer.html');
?>