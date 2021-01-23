<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Webreathe</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $currentPage === "index.php" ? "active" : ""; ?>" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $currentPage === "addModule.php" ? "active" : ""; ?>" aria-current="page" href="addModule.php">Ajouter Un Module</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  <?= $currentPage === "dashboard.php" ? "active" : ""; ?>" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
      </ul>
    </div>
  </div>
</nav>