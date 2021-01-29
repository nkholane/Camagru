<?php
$servername = 'mysql:host=localhost;charset=utf8';
$db_user = 'root';
$db_password = '123456789';
try {
	$db = new PDO($servername, $db_user, $db_password);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->query("CREATE DATABASE IF NOT EXISTS camagru_db CHARACTER SET utf8;
						USE camagru_db");
}
catch (PDOException $e) {
	echo "Database connection failed: " . $e->getMessage() . PHP_EOL;
	die();
}
?>
