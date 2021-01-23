<?php
include "../src/connect.php";

$idModule = $_GET["id"];

// Supprime le module de la table en selon son id
$req = $db->prepare("DELETE FROM modules WHERE  id = :id");
$req->execute(array(
  "id" => $idModule
));

header('location: ../dashboard.php');
