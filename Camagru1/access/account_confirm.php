<?php session_start(); ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	<style>
	body {
	text-align:center;
	background-color: purple;
	}
	</style>
		<title>Verification</title>
	</head>
	<body>
	<h3>
	<br/>
<?php
require_once("../config/database.php");
$error = "Please try to use the link sent by email. If the problem persists, contact the owner".PHP_EOL;
if (empty($_GET['login']) || empty($_GET['token']))
  $error = "Corrupted link.".PHP_EOL.$error;
else {
	$login = $db->quote(trim($_GET['login']));
	$token = trim($_GET['token']);
	$query = $db->query("SELECT login, verification FROM users WHERE login = $login");
	$result = $query->fetch();
	if ($result == null)
		$error = "Corrupted link.".PHP_EOL.$error;
	else if ($result['verification'] === "")
		$error = "This account has been verified. Go to the log in page to log in with credentials".PHP_EOL;
	else if ($result['verification'] !== $token)
		$error = "Corrupted link.".PHP_EOL.$error;
	else {
		$error = "";
		$db->query("UPDATE users SET verification = '' WHERE login = $login");
		echo ("Your account is now active !<br/>Click <a href='../index.php'>here</a> to sign in.");
	}
}
if ($error !== "")
	echo ($error);
?>
	</h3>
</body>
</html>
