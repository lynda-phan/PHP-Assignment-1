<?php
session_start();

if (isset($_SESSION["username"])) {
?>

<p>Link: <a href="content1.php">content1</a></p>

<?php
} else {
	// http://php.net/manual/en/function.header.php
	header('Location: login.php');
	exit;
}
?>