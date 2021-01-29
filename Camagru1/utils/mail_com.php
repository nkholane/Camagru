<?php
session start();
function send_comment_mail($toAddr, $toUsername, $comment) {
  $subject = "[CAMAGRU] - New Comment";
  $contents  = 'MIME-Version: 1.0' . "\r\n";
  $contents .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  $contents .= 'From: <no-reply@student.wethinkcode.co.za>' . "\r\n";
  $message = '
  <html>
    <head>
      <title>' . $subject . '</title>
    </head>
    <body>
      Hello ' . htmlspecialchars($toUsername) . ', <br />
      Someone commented on your picture:  ' .$comment . '</br>
    </body>
  </html>
  ';
  mail($toAddr, $subject, $message, $contents);
}
?>