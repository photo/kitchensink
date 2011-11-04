<?php
$dsn = "mysql:dbname={$mysqldb};host={$mysqlhost}";
try
{
  $dbh = new PDO($dsn, $mysqluser, $mysqlpass);
}
catch(PDOException $e)
{
  echo $e->getMessage();
  die();
}

function decrypt($string, $secret = null, $salt = null)
{
  $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
  $string = base64_decode($string);
  $decryptedString = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $secret, $string, MCRYPT_MODE_ECB, $iv));
  return $decryptedString;
}

function encrypt($string, $secret = null, $salt = null)
{
  $iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND);
  $encryptedString = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $secret, $string, MCRYPT_MODE_ECB, $iv);
  return base64_encode($encryptedString);
}
