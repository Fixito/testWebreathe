<?php
require "./src/connect.php";

$idModule = $_GET["id"];

// Sélectionne touste les colonnes de la table history d'un module selon l'id
$req = $db->prepare("SELECT * FROM history WHERE id_module = :id ORDER BY datex DESC");
$req->execute(array(
  "id" => $idModule
));
