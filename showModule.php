<?php
// Nom de la page actuelle
$currentPage = basename(__FILE__);

include "elements/header.php";
include "elements/nav.php";
include "SQL/fetchOneModule.php";
?>

<div class="container div">
  <h2><?= strtoupper($result["name"]); ?></h2>

  <ul>
    <li>
      <strong>Numéro :</strong> <?= $result["serial"] ?>
    </li>
    <li>
      <strong>Description :</strong> <?= $result["description"] ?>
    </li>
    <li>
      <strong>Type :</strong> <?= $result["type"] ?>
    </li>
    <li>
      <strong>Température :</strong> <?= $result["temperature"] ?>°C
    </li>
    <li>
      <strong>Durée de fonctionnement :</strong> <?= $result["operating_time"] ?>
    </li>
    <li>
      <strong>Nombre de données envoyées :</strong> <?= $result["number_of_data_sent"] ?>
    </li>
    <li>
      <strong>Etat :</strong> <?= $result["state"] == 1 ? "En marche" : "Arrêt"; ?>
    </li>
  </ul>
</div>

<?php include "elements/footer.php"; ?>