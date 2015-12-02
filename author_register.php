<?php include('includes/header.html'); /*Input fields for registering author */?>
<h1>Author Register</h1>
<form action="author_handler.php" method="POST">

<p>Author First Name:<input type="text" name="authorfirstname" value="<?php if (isset($_POST['authorfirstname'])) echo $_POST['authorfirstname'];?>"></p>
<p>Author Last Name:<input type="text" name="authorlastname" value="<?php if (isset($_POST['authorlastname'])) echo $_POST['authorfirstname'];?>"></p>
<p>Author Email Address:<input type="text" name="authoremail" value="<?php if (isset($_POST['authoremail'])) echo $_POST['authoremail'];?>"></p>
<p>Password:<input type="password" name="authorpassword" value="<?php if (isset($_POST['authorpassword'])) echo $_POST['authorpassword'];?>"></p>

<input type="submit" value="Register author">
</form>
<?php include('includes/footer.html'); ?>