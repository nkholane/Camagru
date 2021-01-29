<?php

function  send_confirmation_mail($login, $email, $token) {

  $subject = "Camagru - E-mail Confirmation";
  $link = "http://".$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0, (strpos($_SERVER['SCRIPT_NAME'], "/", 1) + 1));
  $validation_link = $link."access/account_confirm.php?login=".$login."&token=".$token;
  $content = "<html>
				<head>
				  <title>E-mail Verification</title>
				</head>
				<body>
				  <h2>Hello</h2>
				  <br><br>
				  <h3><p>Please click <a href='".$validation_link."' target='_blank'><h4>HERE</a></h4> to confirm your verification !</p></h3>
				  				  <br/>
				 _From The Author _Nkholane </p>
				 
				</body>
			</html>";
  $contents  = 'MIME-Version: 1.0'."\r\n";
  $contents .= 'Content-type: text/html;charset=utf-8'."\r\n";
  $contents .= 'To: '.$login.' <'.$email.'>'."\r\n";
	$contents .= 'From: Camagru <noreply@nkholane.org>'."\r\n";

  if (mail($email, $subject, $content, $contents) == true)
	return (true);
  else
	return (false);
}

function  send_resetpass_mail($passwd, $email) {

  $subject = "Camagru - Password Reset";
  $link = "http://".$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0, (strpos($_SERVER['SCRIPT_NAME'], "/", 1) + 1))."index.php";
  $content = "<html>
				<head>
				  <title>Camagru - Password Reset</title>
				</head>
				<body>
				  <p>Here is your new password : <strong>".$passwd."</strong></p><br/>
				  <p>You can now <a href='".$link."' target='_blank'>sign in</a> by clicking the link !</p>
				  <br/><br/><p>***<b>DO NOT REPLY</b>***<br/>
				  <br/>
				  _From The Author _Nkholane  </p> reply 
				</body>
			</html>";
  $contents  = 'MIME-Version: 1.0'."\r\n";
  $contents .= 'Content-type: text/html;charset=utf-8'."\r\n";
  $contents .= 'To: '.$email."\r\n";
	$contents .= 'From: Camagru <noreply@nkholane.org>'."\r\n";

  if (mail($email, $subject, $content, $contents) == true)
	return (true);
  else
	return (false);
}

function  send_comment_email($login, $email) {
	$subject = "Comment";
	$content = "<head>
				  <title>one of your pictures received a comment</title>
				</head>
				<body>
				  <p>one of your pictres received a comment</p
				</body>";
	$contents  = 'MIME-Version: 1.0'."\r\n";
	$contents .= 'Content-type: text/html;charset=utf-8'."\r\n";
	$contents .= 'To: '.$login.' <'.$email.'>'."\r\n";
	$contents .= 'From: camagru <camagru@camagru.com>'."\r\n";
	if (mail($email, $subject, $content, $contents) == true)
	  return (true);
	else
	  return (false);
  }

?>
