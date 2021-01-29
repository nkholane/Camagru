<?php	session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../css/global.css">
		<link rel="stylesheet" type="text/css" href="../css/panels.css">
		<link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../css/gallery.css">
		<title>Gallery</title>
	</head>
	<body>
	<?php
		include('header.php');
		include('footer.php');
	?>
  <main>
		<h1>Gallery</h1>
		<p id='gallery_main_msg' class='error_msg'></p>
		<div id='publications_container'></div>
		<button id='load_more'>Click To Scroll</button>
		<p id='load_more_msg' class='error_msg'></p>
	</main>
	<script src='../javascript/gallery.js'></script>
	</body>
</html>
