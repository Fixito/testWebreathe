<?php
// Renvoie la définition des colonnes
$q = $db->prepare("DESCRIBE modules");
$q->execute();

// Récupère le nom des colonnes de la table modules
$columns = $q->fetchAll(PDO::FETCH_COLUMN);
