<?php

session_start();
require_once("send_mail.php");
require_once("../config/database.php");

$user_id = $db->quote($_SESSION['logged']);
$img_id = $db->quote($_POST['img_id']);
$comment = $db->quote(htmlspecialchars($_POST['comment'], ENT_QUOTES));

if ($user_id === "''") {
  die();
}

if ($img_id === "''" || $comment === "''") {
  echo "An error occured - Incomplete request.<br/>";
  die();
}

$query = $db->query("SELECT img_id FROM uploads WHERE img_id = $img_id");
$res = $query->fetch();

if ($res == NULL) {
  echo "The photo has been removed by an admin.<br/>";
  die();
}
$query = $db->query("SELECT login FROM users WHERE user_id = $user_id");
$res = $query->fetch();

$db->query("INSERT INTO comments (img_id, id_user, content)
            VALUES ($img_id, $user_id, $comment)");
echo ("OK_".$res['login']);

$query = $db->query("SELECT email FROM users WHERE user_id = $user_id");
$res2 = $query->fetch();
send_comment_email($res['login'], $res2['email']);

?>
