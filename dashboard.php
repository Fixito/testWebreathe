<?php
// Nom de la page actuelle
$currentPage = basename(__FILE__);

include "classes/Form.php";
include "SQL/fetchAllModules.php";
include "elements/header.php";
include "elements/nav.php";
?>

<div class="container">
  <?php if (isset($_GET["added"])) : ?>
    <div class="alert alert-success">Module ajouté !</div>
  <?php elseif (isset($_GET["edited"])) : ?>
    <div class="alert alert-success">Module modifié !</div>
  <?php endif; ?>
  <div class="table-responsive">
    <a class="btn btn-primary float-end mb-1" href="addModule.php">Ajouter</a>
    <h5>Modules</h5>
    <table class="table table-bordered table-hover table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Module</th>
          <th>Numéro</th>
          <th>Description</th>
          <th>Type</th>
          <th>Température</th>
          <th>Durée de fonctionnement</th>
          <th>Nombre de données envoyées</th>
          <th>Etat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($result = $req->fetch()) : ?>
          <tr>
            <td><?= $result["id"] ?></td>
            <td><?= $result["name"] ?></td>
            <td><?= $result["serial"] ?></td>
            <td><?= $result["description"] ?></td>
            <td><?= $result["type"] ?></td>
            <td><?= $result["temperature"] ?></td>
            <td><?= $result["operating_time"] ?></td>
            <td><?= $result["number_of_data_sent"] ?></td>
            <td><?= $result["state"] ?></td>
            <td class="d-flex justify-content-around" style="border:none">
              <a href="edit.php?id=<?= $result["id"] ?>"><i class="fas fa-edit text-primary"></i></a>
              <a href="SQL/delete.php?id=<?= $result["id"] ?>"><i class=" fas fa-trash-alt text-danger"></i></a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

</div>

<?php include "elements/footer.php"; ?>