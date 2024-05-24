<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_ajax";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'fetch') {
        $output = '';
        $sql = "SELECT * FROM taches";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $output .= '
            <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Date Description</th>
                    <th scope="col">Date Dechéance</th>
                    <th scope="col">ID Tache</th>
                    <th scope="col">Description</th>
                    <th scope="col">ID Utilisateur</th>
                    <th scope="col">ID Categorie</th>
                    <th scope="col">ID Liste</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Priorite</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>';
            while ($row = $result->fetch_assoc()) {
                $output .= "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['titre']}</td>
                    <td>{$row['date_description']}</td>
                    <td>{$row['date_dechéance']}</td>
                    <td>{$row['id_tache']}</td>
                    <td>{$row['description']}</td>
                    <td>{$row['id_utilisateur']}</td>
                    <td>{$row['id_categorie']}</td>
                    <td>{$row['id_liste']}</td>
                    <td>{$row['statut']}</td>
                    <td>{$row['priorite']}</td>
                    <td>
                        <a href='#' class='text-info me-2 editBtn' data-id='{$row['id']}' title='Voir détails'><i class='fas fa-info-circle'></i></a>
                        <a href='#' class='text-primary me-2 editBtn' data-id='{$row['id']}' title='Modifier'><i class='fas fa-edit'></i></a>
                        <a href='#' class='text-danger me-2 deleteBtn' data-id='{$row['id']}' title='Supprimer'><i class='fas fa-trash-alt'></i></a>
                    </td>
                </tr>";
            }
            $output .= '</tbody></table>';
        } else {
            $output = '<h3 class="text-center text-secondary">Pas de taches trouvées.</h3>';
        }
        echo $output;
    }

    if (isset($_POST['create'])) {
        $titre = $_POST['titre'];
        $date_description = $_POST['date_description'];
        $date_dechéance = $_POST['date_dechéance'];
        $id_tache = $_POST['id_tache'];
        $description = $_POST['description'];
        $id_utilisateur = $_POST['id_utilisateur'];
        $id_categorie = $_POST['id_categorie'];
        $id_liste = $_POST['id_liste'];
        $statut = $_POST['statut'];
        $priorite = $_POST['priorite'];

        $sql = "INSERT INTO taches (titre, date_description, date_dechéance, id_tache, description, id_utilisateur, id_categorie, id_liste, statut, priorite) VALUES ('$titre', '$date_description', '$date_dechéance', '$id_tache', '$description', '$id_utilisateur', '$id_categorie', '$id_liste', '$statut', '$priorite')";

        if ($conn->query($sql) === TRUE) {
            echo 'Tache ajoutée avec succès.';
        } else {
            echo 'Erreur: ' . $sql . '<br>' . $conn->error;
        }
    }

    if (isset($_POST['id']) && isset($_POST['action']) && $_POST['action'] == 'edit') {
        $id = $_POST['id'];
        $sql = "SELECT * FROM taches WHERE id='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        }
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $titre = $_POST['titre'];
        $date_description = $_POST['date_description'];
        $date_dechéance = $_POST['date_dechéance'];
        $id_tache = $_POST['id_tache'];
        $description = $_POST['description'];
        $id_utilisateur = $_POST['id_utilisateur'];
        $id_categorie = $_POST['id_categorie'];
        $id_liste = $_POST['id_liste'];
        $statut = $_POST['statut'];
        $priorite = $_POST['priorite'];

        $sql = "UPDATE taches SET titre='$titre', date_description='$date_description', date_dechéance='$date_dechéance', id_tache='$id_tache', description='$description', id_utilisateur='$id_utilisateur', id_categorie='$id_categorie', id_liste='$id_liste', statut='$statut', priorite='$priorite' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo 'Tache mise à jour avec succès.';
        } else {
            echo 'Erreur: ' . $sql . '<br>' . $conn->error;
        }
    }

    if (isset($_POST['id']) && isset($_POST['action']) && $_POST['action'] == 'delete') {
        $id = $_POST['id'];
        $sql = "DELETE FROM taches WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo 'Tache supprimée avec succès.';
        } else {
            echo 'Erreur: ' . $sql . '<br>' . $conn->error;
        }
    }
}

$conn->close();
?>
