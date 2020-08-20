<?php
session_start();
if (isset($_SESSION['user'])) {
	echo 'welcome : ' . $_SESSION['user'].'<br>';
}else{
	header('location:login.php');
}

?>
<a href="logout.php">Logout</a>