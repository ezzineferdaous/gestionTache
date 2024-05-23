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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['titre']) && !empty($_POST['date_description']) && !empty($_POST['date_dechéance'])) {
    // Get form data
    $titre = $_POST['titre'];
    $date_description = $_POST['date_description'];
    $date_dechéance = $_POST['date_dechéance'];

    // Insert data into database
    $sql = "INSERT INTO taches (titre, date_description, date_dechéance) VALUES ('$titre', '$date_description', '$date_dechéance')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch tasks
if (isset($_POST['action']) && $_POST['action'] == 'fetch') {
    $output = '';
    // Ensure the connection is open
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM taches";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $output .= '
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
        <tbody>';
        while ($row = $result->fetch_assoc()) {
            $output .= "
            <tr>
                <th>{$row['id']}</th>
                <th>{$row['titre']}</th>
                <th>{$row['date_description']}</th>
                <th>{$row['date_dechéance']}</th>
                <td>
                    <a href='#' class='text-info me-2 infoBtn' title='Voir détails'><i class='fas fa-info-circle'></i></a>
                    <a href='#' class='text-primary me-2 editBtn' title='Modifier'><i class='fas fa-edit'></i></a>
                    <a href='#' class='text-danger me-2 deleteBtn' title='Supprimer'><i class='fas fa-trash-alt'></i></a>
                </td>
            </tr>";
        }
        $output .= "</tbody></table>";
        echo $output;
    } else {
        echo "<h3>Aucunes factures pour le moment</h3>";
    }
}

// Close connection
$conn->close();
?>
