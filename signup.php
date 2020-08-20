<?php
session_start();
include 'connDB.php';

if (isset($_SESSION['user'])) {
	header('location:index.php');
}
if (isset($_POST['signup'])) {
	$user = $_POST['username'];
	$pass = sha1($_POST['password']);
	$name = $_POST['name'];
	$ins = $conn->prepare("INSERT INTO users (user , pass , name )
								VALUES  ('$user' , '$pass' , '$name')");
	$ins->execute();
	$_SESSION['user']=$user;
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up </title>
</head>
<body>
	<form method="POST">
		<label>Username</label><br>
		<input type="text" name="username"><br><br>
		<label>Password</label><br>
		<input type="password" name="password"><br><br>
		<label>Name</label><br>
		<input type="text" name="name"><br><br>
		<input type="submit" name="signup" value="Signup">
	</form>
	<a href="login.php">login</a>
</body>
</html>