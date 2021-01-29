<?php	
session_start(); 
?>
<!DOCTYPE html>
<html>
	<head>
	<link href="https://fonts.googleapis.com/css?family=Times&display=swap" rel="stylesheet">
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/global.css">
		<link rel="stylesheet" type="text/css" href="css/panels.css">
		<link rel="stylesheet" type="text/css" href="css/camera.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<?php
		if (isset($_SESSION['logged']))
			echo "<title>Camera</title>";
		else
			echo "<title>Log in</title>";
		echo "</head><body>";
		include('access/header.php');
		include('access/footer.php');
		if (isset($_SESSION['logged'])) {
			include('access/camera.php');
			echo "<script src='javascript/camera.js'></script>";
		} else {
			include('access/main.php');
			echo "<script src='javascript/forms.js'></script><script src='javascript/tools.js'></script>";
		}
	?>
	</body>
</html>
