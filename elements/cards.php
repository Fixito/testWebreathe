<?php
$form = new Form();

// Affiche une carte
function card($result, $columns, $form, $color, $icon, $state, $idBtn, $idSelect)
{
  echo '
  <div class="col-12 col-sm-6 col-md-4" style="width: 27rem;">
    <div class="card card-' . $color . ' mb-4" id="module' . $result["id"] . '">
      <div class="card-body">
        <h5 class="card-title">' . strtoupper($result["name"]) . '</h5>
        <p class="card-text text-' . $color . '"><i class="fas fa-' . $icon . '-circle"></i> ' . $state . '</p>
        <form action="#" method="POST">';
  echo $form->select($columns, "infoToDisplay", "Informations à afficher :", $idSelect);
  echo '<div class="d-flex justify-content-around">';
  echo $form->submit("Info", "primary", $idBtn, "<i class='fas fa-info-circle'></i>");
  echo $form->link("Module", "primary", "showModule.php", $result, "<i class='far fa-eye'></i>");
  echo $form->link("Historique", "primary", "showHistory.php", $result, "<i class='fas fa-history'></i>");
  echo '</div>';
  echo '</form>
      </div>
    </div>
  </div>';
}

// Affiche la carte de chaque modules
function displayCards($req, $columns, $form)
{
  $idBtn = 0;
  $idSelect = 0;

  while ($result = $req->fetch()) {
    if ($result["state"] == 1) {
      card($result, $columns, $form, "success", "check", "En marche", $idBtn, $idSelect);
    } else {
      card($result, $columns, $form, "danger", "times", "Arrêt", $idBtn, $idSelect);
    }

    $idBtn++;
    $idSelect++;
  }
}
