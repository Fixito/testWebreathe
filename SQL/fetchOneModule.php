<?php
include "./src/connect.php";

$idModule = $_GET["id"];

// Sélectionne toutes les colonnes de la table modules d'un module selon son id
$req = $db->prepare("SELECT * FROM modules WHERE id = :id");
$req->execute(array(
  "id" => $idModule
));

$result = $req->fetch(PDO::FETCH_ASSOC);
