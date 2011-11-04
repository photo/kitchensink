<?php
require './secrets.php';
require './util.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
  callbackPost();
else
  callback();

function callback()
{
  if(isset($_GET['challenge']))
    echo $_GET['challenge'];
}

function callbackPost()
{
  global $dbh, $mysqltable;
  $sth = $dbh->prepare("SELECT * FROM `{$mysqltable}` WHERE id=:id", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $sth->execute(array(':id' => $_GET['id']));
  $user = $sth->fetch(PDO::FETCH_ASSOC);

  $photoUrl = sprintf('http://%s%s', $_POST['host'], $_POST['pathOriginal']);
  $apiUrl = sprintf('http://www.degraeve.com/img2txt-yay.php?url=%s&mode=A&size=100&charstr=ABCDEFGHIJKLMNOPQRSTUVWXYZ&order=O&invert=N', urlencode($photoUrl));
  $ch = curl_init($apiUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $ascii = curl_exec($ch);
  curl_close($ch);
  preg_match('#<pre>.*</pre>#ism', $ascii, $matches);

  $headers = "From: OpenPhoto Robot <no-reply@openphoto.me>\r\n" .
        "Reply-To: no-reply@openphoto.me\r\n" .
        'X-Mailer: OpenPhoto' .
        'MIME-Version: 1.0' . "\r\n" .
        'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  
  
  mail($user['email'], 'OpenPhoto ASCII Art', $matches[0], $headers);
}
