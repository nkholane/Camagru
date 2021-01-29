<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
require_once('../config/database.php');
$offset = intval($_GET['offset']);
if ($offset < 0 || $offset != $_GET['offset']) {
  echo "Error - Corrupted request.<br/>";
  die();
}
$img_query = $db->query("SELECT img_id, img_path, users.login AS 'author', pub_date, nb_likes FROM uploads
						INNER JOIN users ON uploads.id_user = users.user_id
						ORDER BY pub_date DESC LIMIT $offset, 5");
while (($img_data = $img_query->fetch(PDO::FETCH_ASSOC)) !== false) {
  $com_query = $db->query("SELECT content, users.login AS 'author' FROM comments
						  INNER JOIN users ON comments.id_user = users.user_id
						  WHERE img_id = ".$db->quote($img_data['img_id']));

  $i = strrpos($img_data['img_path'], "/");
  $img_link = substr($img_data['img_path'], $i, strlen($img_data['img_path']) - $i);
  $img_id = $img_data['img_id'];

  $page_content = "<div class='publication'><div class='pub_img'>
    <h3 class='post_infos' style='float: left'>".$img_data['author']."</h3>
		<img class='gallery_photos' src='../photos/upload".$img_link."'></img>
		<img id='addlike_".$img_id."' class='like' src='../photos/icons/like.png' onclick='add_like(this)'>
		<p id='nblikes_".$img_id."' class='nb_likes'>".$img_data['nb_likes']."</p></img>";
  if ($_SESSION['logged'] !== NULL) {
	$page_content .= "<input id='comcontent_".$img_id."' type='text' placeholder='Leave comment...'>
					  <button id='sendcom_".$img_id."' class='send_com' onclick='send_comment(this)'>Enter</button>";
  }
  $page_content .= "<p id='pubmsg_".$img_id."' class='error_msg'></p></div>
					<div id='comcontainer_".$img_id."' class='comments_container'>";
  while (($com_data = $com_query->fetch(PDO::FETCH_ASSOC)) !== false)
	$page_content .= "<div class='comments'><strong>".$com_data['author']." : </strong>".$com_data['content']."</div>";
  $page_content .= "</div></div>";
  echo ($page_content);
}
?>
