<?php
require "./src/connect.php";

if ($_POST) {
  if (!empty($_POST["name"]) && !empty($_POST["serial"]) && !empty($_POST["description"]) && !empty($_POST["type"]) && !empty($_POST["temperature"]) && isset($_POST["operatingTime"]) && isset($_POST["numberOfDataSent"]) && isset($_POST["state"])) {
    $name = htmlspecialchars($_POST["name"]);
    $serial = htmlspecialchars($_POST["serial"]);
    $description = htmlspecialchars($_POST["description"]);
    $type = htmlspecialchars($_POST["type"]);
    $temperature = htmlspecialchars($_POST["temperature"]);
    $operatingTime = htmlspecialchars($_POST["operatingTime"]);
    $numberOfDataSent = htmlspecialchars($_POST["numberOfDataSent"]);
    $state = htmlspecialchars($_POST["state"]);

    // On compte combien de fois le nom du module est présent dans la BDD
    $req = $db->prepare("SELECT COUNT(*) as numberModule FROM modules WHERE name = :name");
    $req->execute(array(
      "name" => $name
    ));

    while ($module = $req->fetch()) {
      // Si le nombre est différent de 0, le nom du module existe déjà dans la BDD
      if ($module["numberModule"] != 0) {
        header("location: addModules.php?error=1");
        exit();
      }
    }

    // On insert le module dans la BDD
    $req = $db->prepare("INSERT INTO modules(name, serial, description, type, temperature, operating_time, number_of_data_sent, state) VALUES(:name, :serial, :description, :type, :temperature, :operatingTime, :numberOfDataSent, :state)");
    $req->execute(array(
      "name" => $name,
      "serial" => $serial,
      "description" => $description,
      "type" => $type,
      "temperature" => $temperature,
      "operatingTime" => $operatingTime,
      "numberOfDataSent" => $numberOfDataSent,
      "state" => $state
    ));

    header('location: ./dashboard.php?added=1');
    exit();
  }
}
