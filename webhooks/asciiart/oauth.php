<?php
require 'OpenPhotoOauth.php';
require 'secrets.php';
require 'util.php';

if(isset($_GET['oauth_consumer_key']) && isset($_GET['oauth_consumer_secret']) && isset($_GET['oauth_token']) && isset($_GET['oauth_token_secret']))
{
  $hostParts = parse_url($_SERVER['HTTP_REFERER']);
  if(!empty($hostParts['host']))
  {
    $client = new OpenPhotoOAuth($hostParts['host'], $_GET['oauth_consumer_key'], $_GET['oauth_consumer_secret'], $_GET['oauth_token'], $_GET['oauth_token_secret']);
    $resp = $client->post('/v1/oauth/token/access', array('oauth_verifier' => $_GET['oauth_verifier']));
    parse_str($resp, $tokens);
    $id = md5(time());
    $sth = $dbh->prepare("INSERT INTO `{$mysqltable}`(id, email) 
                          VALUES(:id, :email)", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $status = $sth->execute(array(':id' => $id, ':email' => $_GET['email']));
    if($status)
    {
      $authClient = new OpenPhotoOAuth($hostParts['host'], $_GET['oauth_consumer_key'], $_GET['oauth_consumer_secret'], $tokens['oauth_token'], $tokens['oauth_token_secret']);
      $response = $authClient->post('/webhook/subscribe', array('callback' => "http://{$_SERVER['HTTP_HOST']}/callback.php?id={$id}", 'topic' => 'photo.upload', 'mode' => 'sync'));
      if(empty($response))
      {
        header('Location: /?success');
        die();
      }
    }
    else
    {
      var_dump($sth->errorInfo());
      die();
    }
  }
}
echo "Something went wrong";
