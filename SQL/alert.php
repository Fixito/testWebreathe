<?php
require "../src/connect.php";

// Sélectionne tous les modules
$req = $db->prepare("SELECT * FROM modules");
$req->execute();

$array = array();

// On récupère les infos du mdules dans un array
while ($result = $req->fetch()) {
  array_push($array, ["id" => $result["id"], "name" => $result["name"], "temperature" => $result["temperature"], "operating_time" => $result["operating_time"], "number_of_data_sent" => $result["number_of_data_sent"], "state" => $result["state"]]);
}

echo json_encode($array);
