<?php
error_reporting (E_ALL ^ E_NOTICE);

session_start();
require_once("../config/database.php");
$user_id = $db->quote($_SESSION['logged']);
$img_id = $db->quote($_POST['img_id']);
$comment = $db->quote(htmlspecialchars($_POST['comment'], ENT_QUOTES));
if ($user_id === "''") {
	echo "You must log in to like images.<br/>";
	die();
}
if ($img_id == "''") {
	echo "Incomplete request.<br/>";
	die();
}
$query = $db->query("SELECT img_id FROM uploads WHERE img_id = $img_id");
$res = $query->fetch();
if ($res == NULL) {
	echo "This image has been removed by an admin.<br/>";
	die();
}
$query = $db->query("SELECT like_id FROM likes WHERE img_id = $img_id AND id_user = $user_id");
$res = $query->fetch();
if ($res == NULL) {
	$db->query("INSERT INTO likes (img_id, id_user) VALUES ($img_id, $user_id)");
	$db->query("UPDATE uploads SET nb_likes = nb_likes + 1 WHERE img_id = $img_id");
	echo "+1";
}
else {
	$db->query("DELETE FROM likes WHERE img_id = $img_id AND id_user = $user_id");
	$db->query("UPDATE uploads SET nb_likes = nb_likes - 1 WHERE img_id = $img_id");
	echo "-1";
}
?>
