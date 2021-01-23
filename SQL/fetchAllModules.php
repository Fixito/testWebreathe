<?php
require "./src/connect.php";

// Sélectionne tous les modules pour l'affichage des cartes 
$req = $db->prepare("SELECT * FROM modules");
$req->execute();
