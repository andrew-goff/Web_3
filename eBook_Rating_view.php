<?php
	header("Access-Control-Allow-Origin: http://andrewg8460.ccacolchester.com");
	header("Access-Control-Allow-Methods: POST");
	header("Content-Type: application/json; charset=UTF-8");
	
	class BookReview {
		var $customerid;
		var $bookheading;
		var $bookcomments;
		var $bookrating;
		var $reviewdate;
		
		function BookReview($customerid, $bookheading, $bookcomments, $bookrating, $reviewdate) {
			$this->customerid = $customerid;
			$this->bookheading = $bookheading;
			$this->bookcomments = $bookcomments;
			$this->bookrating = $bookrating;
			$this->reviewdate = $reviewdate;
		}
	
	};
	
	require('cross_site_scripting.php');
	require('db_connect.php');

	/*PHP test to search for all reviews by customerid in the MySQL database */
	$sql = "SELECT c.customerfirstname AS firstname, r.bookheading AS bookheading, r.bookcomments AS bookcomments, r.bookrating AS bookrating, r.reviewdate AS reviewdate FROM Review r INNER JOIN eBook_Customer c ON r.customerId = c.customerid";
	$r = mysqli_query($db, $sql);
	$eBooksReview = array();
	
	if ($r)
	{
		if( mysqli_num_rows($r) > 0 )
		{		
			while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
			{
				$eBookReview = new BookReview($row['firstname'], $row['bookheading'], $row['bookcomments'], $row['bookrating'], $row['reviewdate']);
				array_push($eBooksReview, $eBookReview);
			}
			
		}
	}
	
	mysqli_close($db);
	
	echo json_encode($eBooksReview);
?>
