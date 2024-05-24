<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.7/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <div class="ml-6">
        <li ><button> 
          <a href="./login.php">Login</a>
        </button></li>
        <li ><button> 
          <a href="register.php">Register</a>
        </button></li>
      </div>
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
        <!-- Task list will be loaded here -->
        <h3 class="text-success text-center">Loading tasks...</h3>
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
      
      <form action="" method="POST" id="formOrder">
    <div class="form-floating mb-3">
        <input type="text" id="titre" name="titre" class="form-control" required>
        <label for="titre">Title Tache</label>
    </div>
    <div class="form-floating mb-3">
        <input type="date" id="date_description" name="date_description" class="form-control" required>
        <label for="date_description">Date Description</label>
    </div>
    <div class="row g-2">
        <div class="col-md">
            <div class="form-floating mb-3">
                <input type="date" id="date_dechéance" name="date_dechéance" class="form-control" required>
                <label for="date_dechéance">Date Dechéance</label>
            </div>
        </div>
    </div>
    <!-- New fields -->
    <div class="form-floating mb-3">
        <input type="text" id="id_tache" name="id_tache" class="form-control" required>
        <label for="id_tache">ID Tache</label>
    </div>
   
    <div class="form-floating mb-3">
        <input type="text" id="id_utilisateur" name="id_utilisateur" class="form-control" required>
        <label for="id_utilisateur">ID Utilisateur</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" id="id_categorie" name="id_categorie" class="form-control" required>
        <label for="id_categorie">ID Categorie</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" id="id_liste" name="id_liste" class="form-control" required>
        <label for="id_liste">ID Liste</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" id="statut" name="statut" class="form-control" required>
        <label for="statut">Statut</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" id="priorite" name="priorite" class="form-control" required>
        <label for="priorite">Priorite</label>
    </div>
    <!-- End of new fields -->
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" id="create" name="create" class="btn btn-primary">Ajouter <i class="fas fa-plus"></i></button>
    </div>
</form>

<div id="response"></div>

<!-- Edit Modal -->
<div class="modal fade" id="editModel" tabindex="-1" aria-labelledby="editModelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModelLabel">Modifier Tache</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="POST" id="formEditOrder">
        <input type="hidden" id="edit_id" name="id">
        <div class="form-floating mb-3">
            <input type="text" id="edit_titre" name="titre" class="form-control" required>
            <label for="edit_titre">Title Tache</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" id="edit_date_description" name="date_description" class="form-control" required>
            <label for="edit_date_description">Date Description</label>
        </div>
        <div class="row g-2">
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input type="date" id="edit_date_dechéance" name="date_dechéance" class="form-control" required>
                    <label for="edit_date_dechéance">Date Dechéance</label>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="edit_id_tache" name="id_tache" class="form-control" required>
            <label for="edit_id_tache">ID Tache</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="edit_id_utilisateur" name="id_utilisateur" class="form-control" required>
            <label for="edit_id_utilisateur">ID Utilisateur</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="edit_id_categorie" name="id_categorie" class="form-control" required>
            <label for="edit_id_categorie">ID Categorie</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="edit_id_liste" name="id_liste" class="form-control" required>
            <label for="edit_id_liste">ID Liste</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="edit_statut" name="statut" class="form-control" required>
            <label for="edit_statut">Statut</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" id="edit_priorite" name="priorite" class="form-control" required>
            <label for="edit_priorite">Priorite</label>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" id="update" name="update" class="btn btn-primary">Mettre à jour <i class="fas fa-save"></i></button>
        </div>
    </form>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-2.0.7/datatables.min.js"></script>
<script src="process.js"></script>

</body>
</html>
