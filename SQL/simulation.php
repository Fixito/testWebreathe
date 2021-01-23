<?php
require "../src/connect.php";

// Sélectionne tous les ID des modules
$req = $db->prepare("SELECT id FROM modules");
$req->execute();

$modulesId = $req->fetchAll(PDO::FETCH_ASSOC);

// SIMULATION
function simulation($db, $result, $moduleId, $oldTemperature, $oldOperatingTime, $oldNumberOfDataSent, $oldState)
{
  $operatingTime = $result["operating_time"];
  $numberOfDataSent = $result["number_of_data_sent"];
  $state = $result["state"];
  $temperature = $result["temperature"];

  // On ajoute 1 "seconde" à la durée de fonctionnement
  $operatingTime += 1;

  // On ajoute 27 au nombres de données envoyées
  $numberOfDataSent += 27;

  $delta = rand(0, 2);
  // Si delta >= 1 on augmente la température 
  // Sinon on la diminue
  if ($delta >= 1) {
    $temperature += rand(0, 10) / 10;
  } else {
    $temperature -= rand(0, 10) / 10;
  }

  if ($temperature >= 70) {
    if ($state == 1) $state = 0;

    // On met à jour les infos du module 
    $req3 = $db->prepare("UPDATE modules SET temperature = :temperature, operating_time = :operating_time, number_of_data_sent = :number_of_data_sent, state = :state WHERE  id = :id");
    $req3->execute(array(
      "id" => $moduleId,
      "temperature" => $temperature,
      "operating_time" => $operatingTime,
      "number_of_data_sent" => $numberOfDataSent,
      "state" => $state,
    ));

    // On ajoute les infos modifiées dans l'historique
    include_once "addHistory.php";

    insertNewValue($db, $moduleId, $oldTemperature, $temperature, "Température", "temperature");
    insertNewValue($db, $moduleId, $oldState, $state, "Etat", "state");
    insertNewValue($db, $moduleId, $oldNumberOfDataSent, $numberOfDataSent, "Nombre de données envoyées", "number_of_data_sent");
  } else {
    if ($state == 0) {
      $state = 1;
    }

    // On met à jour les infos du module 
    $req3 = $db->prepare("UPDATE modules SET temperature = :temperature,operating_time = :operating_time, number_of_data_sent = :number_of_data_sent, state = :state WHERE  id = :id");
    $req3->execute(array(
      "id" => $moduleId,
      "temperature" => $temperature,
      "operating_time" => $operatingTime,
      "number_of_data_sent" => $numberOfDataSent,
      "state" => $state
    ));

    // On ajoute les infos modifiées dans l'historique
    include_once "addHistory.php";

    insertNewValue($db, $moduleId, $oldTemperature, $temperature, "Température", "temperature");
    insertNewValue($db, $moduleId, $oldNumberOfDataSent, $numberOfDataSent, "Nombre de données envoyées", "number_of_data_sent");
  }
}

// On exécute la simulation pour chaque module
foreach ($modulesId as $module) {
  $req2 = $db->prepare("SELECT * FROM modules WHERE id = :id");
  $req2->execute(array(
    "id" => $module["id"]
  ));
  $result = $req2->fetch(PDO::FETCH_ASSOC);

  $oldTemperature = $result["temperature"];
  $oldOperatingTime = $result["operating_time"];
  $oldNumberOfDataSent = $result["number_of_data_sent"];
  $oldState = $result["state"];

  simulation($db, $result, $module["id"], $oldTemperature, $oldOperatingTime, $oldNumberOfDataSent, $oldState);
}
