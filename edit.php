<?php
// Nom de la page actuelle
$currentPage = basename(__FILE__);

include "SQL/update.php";
include "elements/header.php";
include "elements/nav.php";
require "classes/Form.php";
?>

<div class="container div">
  <h1 class="text-center mb-5">Modifier un module</h1>

  <form action="#" method="POST">
    <?php
    $form = new Form($result);

    // Affichage des différents inputs du formulaire
    echo $form->input("Nom du module", "name", "text");
    echo $form->input("Numéro de série", "serial", "text");
    echo $form->input("Description", "description", "text");
    echo $form->input("Type", "type", "text");
    echo $form->input("Température", "temperature", "number", "0.1");
    echo $form->input("Durée de fonctionnement", "operating_time", "number");
    echo $form->input("Nombre de données envoyées", "number_of_data_sent", "number");
    echo $form->stateInput("Etat", "state");
    echo $form->submit("Modifier", "primary");
    ?>
  </form>
</div>
</body>

<?php include "elements/footer.php" ?>