<?php
// Nom de la page actuelle
$currentPage = basename(__FILE__);

include "classes/Form.php";
include "SQL/fetchHistory.php";
include "elements/header.php";
include "elements/nav.php";
?>

<div class="container">

  <div class="table-responsive">
    <h5>Historique du Module</h5>
    <table class="table table-bordered table-hover table-striped">
      <thead>
        <tr>
          <th>Information</th>
          <th>Valeur</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($result = $req->fetch()) : ?>
          <tr>
            <td><?= $result["info"] ?></td>
            <td><?= $result["value"] ?></td>
            <td><?= $result["datex"] ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</div>

<?php include "elements/footer.php"; ?>