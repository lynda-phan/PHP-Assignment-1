<?php
session_start();

function getValue($array, $key) {
	if (isset($array[$key])) {
		return $array[$key];
	}

	return false;
}

$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod == "POST") {
	$username = getValue($_POST, "username"); 

	if (empty($username)) {
?>
A username must be entered. Click <a href="login.php">here</a> to return to the login screen.
<?php
	} else {
		$_SESSION["username"] = $username;
	}
}
	if (isset($_SESSION["username"])) {
		if (isset($_SESSION["visited"])) {
	 		$_SESSION["visited"] += 1; 
	 	} else {
	 		$_SESSION["visited"] = 0; 
	 	}
?>

<p>Hello <?php echo $_SESSION["username"]; ?> you have visited this page <?php echo $_SESSION["visited"]; ?> times before. Click <a href="login.php?logout=1">here</a> to logout.</p>

<p>Link: <a href="content2.php">content2</a></p>

<?php
	} else {
		// http://php.net/manual/en/function.header.php
		header('Location: login.php');
		exit;
	}
?>
