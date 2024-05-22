<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.7/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gestion des taches</title>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Gestion des taches</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>

<section class="container py-5">
    <div class="row">
      <div class="col-lg-8 col-sm md-5 mx-auto">
        <h1 class="fs-4 text-center lead text-primary">CRUD PHP PDO MYSQL AJAX</h1>
      </div>
    </div>
    <div class="dropdown-divider border-warning"></div>
    <div class="row">
      <div class="col-md-6">
        <h5 class="fw-bold md-8">Liste des taches</h5>
      </div>
      <div class="col-md-6">
        <div class="d-flex justify-content-end">
        <button class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#createModel">
          <i class="fas fa-folder-plus"></i> Nouveau
      </button>
          <a href="#" class="btn btn-success btn-sm" id="export"><i class="fas fa-table"></i> Exporter</a>
        </div>
      </div>
    </div>
    <div class="dropdown-divider border-warning"></div>
    <div class="row">
      <div class="table-responsive" id="orderTable">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tache</th>
              <th scope="col">Nom_tache</th>
              <th scope="col">Permissions</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php for($i = 0; $i < 100; $i++): ?>
              <tr>
                <th scope="row"><?= $i ?></th>
                <td>Mark</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>
                  <a href="#" class="text-info me-2 infoBtn" title="Voir dÃ©tails"><i class="fas fa-info-circle"></i></a>
                  <a href="#" class="text-primary me-2 editBtn" title="Modifier"><i class="fas fa-edit"></i></a>
                  <a href="#" class="text-danger me-2 deleteBtn" title="Supprimer"><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
            <?php endfor; ?>
          </tbody>
        </table>
      </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="createModel" tabindex="-1" aria-labelledby="createModelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModelLabel">Nouvelle Tache</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Modal body content here -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" name="crate">Ajouter <i class="fas fa-plus"></i></button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybbyFZK5TUegIHbj4wy0npeu6B6dD1OcIGbCUf5nxcb3KT8aT" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGhai24ZgPpGxGM/h6fWDKZf3a8z5r9RjbXEVgq51CM3CqN7dR9eK6fQ/rK" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-2.0.7/datatables.min.js"></script>
<script src="prossece.js"></script>
</body>
</html>