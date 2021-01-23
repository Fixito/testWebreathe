<?php
require "src/connect.php";

// On assigne l'id du module
$idModule = $_GET["id"];

// Selectionne toutes les colonnes d'un module en fonction de son id
$req = $db->prepare("SELECT * FROM modules WHERE id = :id");
$req->execute(array(
  "id" => $idModule
));

$result = $req->fetch(PDO::FETCH_ASSOC);

if ($_POST) {
  if (!empty($_POST["name"]) && !empty($_POST["serial"]) && !empty($_POST["description"]) && !empty($_POST["type"]) && !empty($_POST["temperature"]) && isset($_POST["operating_time"]) && isset($_POST["number_of_data_sent"]) && isset($_POST["state"])) {
    $name = htmlspecialchars($_POST["name"]);
    $serial = htmlspecialchars($_POST["serial"]);
    $description = htmlspecialchars($_POST["description"]);
    $type = htmlspecialchars($_POST["type"]);
    $temperature = htmlspecialchars($_POST["temperature"]);
    $operating_time = htmlspecialchars($_POST["operating_time"]);
    $number_of_data_sent = htmlspecialchars($_POST["number_of_data_sent"]);
    $state = htmlspecialchars($_POST["state"]);

    // Met à jour les champs dans la table modules
    $req = $db->prepare("UPDATE modules SET name = :name, serial = :serial, description = :description, type = :type, temperature = :temperature, operating_time = :operating_time, number_of_data_sent = :number_of_data_sent, state = :state WHERE  id = :id");
    $req->execute(array(
      "id" => $idModule,
      "serial" => $serial,
      "name" => $name,
      "description" => $description,
      "type" => $type,
      "temperature" => $temperature,
      "operating_time" => $operating_time,
      "number_of_data_sent" => $number_of_data_sent,
      "state" => $state,
    ));

    // On insert les valeurs dans l'historique si elles sont différentes des anciennes
    include "addHistory.php";

    insertNewValue($db, $idModule, $oldName, $name, "Nom", "name");
    insertNewValue($db, $idModule, $oldSerial, $serial, "Numéro de série", "serial");
    insertNewValue($db, $idModule, $oldDescription, $description, "Description", "description");
    insertNewValue($db, $idModule, $oldType, $type, "Type", "type");
    insertNewValue($db, $idModule, $oldTemperature, $temperature, "Température", "temeprature");
    insertNewValue($db, $idModule, $oldOperatingTime, $operating_time, "Durée de fonctionnement", "operating_time");
    insertNewValue($db, $idModule, $oldNumberOfDataSent, $number_of_data_sent, "Nombre de données envoyées", "number_of_data_sent");
    insertNewValue($db, $idModule, $oldState, $state, "Etat", "state");

    header('location: ./dashboard.php');
  }
}
