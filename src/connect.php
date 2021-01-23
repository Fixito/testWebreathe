<?php

$host = "localhost";
$dbname = "webreathe";
$user = "root";
$pwd = "";

//* Connection à la base de donnée
try {
  $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $pwd);
} catch (PDOException $e) {
  print "Erreur !: " . $e->getMessage() . "<br/>";
  die();
}
