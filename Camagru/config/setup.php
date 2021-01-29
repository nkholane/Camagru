<?php

require('database.php');
echo "Database created, pop over to phpmyadmin to confirm database 'camagru_db':D";
$db->query("CREATE TABLE IF NOT EXISTS users
					(
						user_id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
						login VARCHAR(40) UNIQUE NOT NULL,
						password VARCHAR(255) NOT NULL,
						email VARCHAR(128) UNIQUE NOT NULL,
						verification VARCHAR(255) NOT NULL,
						notifications VARCHAR(1) NOT NULL DEFAULT 'N') ENGINE=InnoDB DEFAULT CHARSET=utf8;
					)");
$db->query("CREATE TABLE IF NOT EXISTS uploads
					(
						img_id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
						img_path TEXT NOT NULL,
						pub_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
						id_user INT(6) NOT NULL,
						nb_likes INT(6) NOT NULL DEFAULT 0
					)");
$db->query("CREATE TABLE IF NOT EXISTS comments
					(
						comment_id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
						img_id INT(6) NOT NULL,
						id_user INT(6) NOT NULL,
						content MEDIUMTEXT NOT NULL
					)");
$db->query("CREATE TABLE IF NOT EXISTS likes
					(
						like_id INT(6) PRIMARY KEY AUTO_INCREMENT NOT NULL,
						img_id INT(6) NOT NULL,
						id_user INT(6) NOT NULL
					)");
?>
