<?php
// Nom de la page actuelle
$currentPage = basename(__FILE__);

include "SQL/fetchAllModules.php";
include "SQL/fetchModulesColummnsName.php";
require "classes/Form.php";
require "elements/cards.php";
include "elements/header.php";
include "elements/nav.php";
?>

<div class="container d-flex flex-column align-items-center">
  <h1 class="mb-5">Visualisation des modules IOT</h1>

  <div class="row">
    <?php displayCards($req, $columns, $form); ?>
  </div>

  <a href="SQL/simulation.php" class="btn btn-warning">Lancer la simulation</a>
</div>

<!-- JQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<!-- Script JS -->
<script src="JS/infoModule.js"></script>
<script src="JS/alert.js"></script>
<script src="JS/simulation.js"></script>
<?php include "elements/footer.php" ?>