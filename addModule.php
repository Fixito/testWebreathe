<?php
// Nom de la page actuelle
$currentPage = basename(__FILE__);

include "SQL/addModule.php";
include "elements/header.php";
include "elements/nav.php";
require "classes/Form.php";
?>

<div class="container div">
  <?php if (isset($_GET["error"])) : ?>
    <div class="alert alert-danger">Le nom de ce module est déjà utilisé.</div>
  <?php endif; ?>

  <h1 class="text-center mb-5">Ajouter un module</h1>

  <form action="#" method="POST">
    <?php
    $form = new Form($_POST);

    // Affichage des différents inputs du formulaire
    echo $form->input("Nom du module", "name", "text");
    echo $form->input("Numéro de série", "serial", "text");
    echo $form->input("Description", "description", "text");
    echo $form->input("Type", "type", "text");
    echo $form->input("Température", "temperature", "number", "0.1");
    echo $form->input("Durée de fonctionnement", "operatingTime", "number");
    echo $form->input("Nombre de données envoyées", "numberOfDataSent", "number");
    echo $form->stateInput("Etat", "state");
    echo $form->submit("Ajouter", "primary");
    ?>
  </form>
</div>
</body>

<?php include "elements/footer.php" ?>