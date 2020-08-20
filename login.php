<?php
session_start();
include 'connDB.php';
if (isset($_SESSION['user'])) {
	header('location:index.php');
}
if (isset($_POST['login'])) {
	$user = $_POST['username'];
	$pass = sha1($_POST['password']);
	$q = $conn->prepare("SELECT user , pass FROM users 
					WHERE user = '$user' AND  pass = '$pass' ");
	$q->execute();
	$count = $q->rowCount();
	if ($count == 1) {
		$_SESSION['user']=$user;
		header('location:index.php');
	}else{
		echo "error username OR password";
	}
}
?>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form method="POST">
		<label>Username</label><br>
		<input type="text" name="username"><br><br>
		<label>Password</label><br>
		<input type="password" name="password"><br><br>

		<input type="submit" name="login" value="Login">
	</form>
	<a href="signup.php">Signup</a>
</body>
</html>