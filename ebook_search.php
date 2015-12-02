<?php
/*Initialise the session */
session_start();
include('includes/header.html');

$page_title = 'eBook Search Page';

echo "<h1>eBook Search Queries</h1>";

echo '<p><a href="user_home.php">Home</a></p>';

echo '<h2>eBook Search Form</h2>';
/*Test to not display register links if customer or author already logged in */
if (!isset($_SESSION['authorid']) && !isset($_SESSION['customerid']))
{
	echo '<p><a href="customer_login.php">Login as a customer</a> | <a href="author_login.php">Login as a author</a></p>';
}
?>
<form action="search.php" method="POST">
<p>Book Title:<input type="text" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title'];?>"></p>
<p>Author Name:<input type="text" name="author" value="<?php if (isset($_POST['author'])) echo $_POST['author'];?>"></p>
<p>Genre:<input type="text" name="genre" value="<?php if (isset($_POST['genre'])) echo $_POST['genre'];?>"></p>
<p>Publisher:<input type="text" name="publisher" value="<?php if (isset($_POST['publisher'])) echo $_POST['publisher']?>"></p>
<p>Price:<input type="text" name="price" value="<?php if (isset($_POST['price'])) echo $_POST['price']?>"></p>
<p>Format:<input type="text" name="format" value="<?php if (isset($_POST['format'])) echo $_POST['format']?>"></p>
<input type="submit" value="Search for Book">
</form>
<?php include('includes/footer.html'); ?>