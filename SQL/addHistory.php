<?php
$arrayOld = array();

// On assigne les anciennes variables
$oldName = $result["name"];
$oldSerial = $result["serial"];
$oldDescription = $result["description"];
$oldType = $result["type"];
$oldTemperature = $result["temperature"];
$oldOperatingTime = $result["operating_time"];
$oldNumberOfDataSent = $result["number_of_data_sent"];
$oldState = $result["state"];

array_push($arrayOld, $oldName, $oldSerial, $oldDescription, $oldType, $oldTemperature, $oldOperatingTime, $oldNumberOfDataSent, $oldState);

function insertNewValue($db, $idModule, $oldValue, $newValue, $columnName, $key)
{
  // Si la valeur de chaque champs est différente de l'ancienne alors on l'insert dans la table history
  if ($oldValue !== $newValue) {
    $req = $db->prepare("INSERT INTO history(id_module, info, value, datex) VALUES(:id_module, :info, :" . $key . ", CURRENT_TIMESTAMP)");
    $req->execute(array(
      "id_module" => $idModule,
      "info" => $columnName,
      $key => $newValue
    ));
  }
}
