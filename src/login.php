<?php
session_start();

function getValue($array, $key) {
	if (isset($array[$key])) {
		return $array[$key];
	}

	return false;
}

$logout = getValue($_GET, "logout"); 

if ($logout) {
	session_unset(); 
	session_destroy(); 
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<form action="content1.php" method="POST">
	<fieldset>
	<legend>Login Page</legend>
	<h5>Please enter your user name:</h5>
	<input type="text" name="username"><br />
	<h5>Please enter your password:</h5>
	<input type="password" name="password"><br /><br />
	<input type="submit" name="submit" value="login">
	</fieldset>
	</form>
</body>
</html>
