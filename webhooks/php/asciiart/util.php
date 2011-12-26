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
