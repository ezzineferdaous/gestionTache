<?php

// class Database
// {
//     // Corrected the declaration of the host variable
//     private $host = "mysql:host=localhost;dbname=crud_ajax";
//     private $user = "root";
//     private $pswd = "";

//     // Corrected the method declaration and implementation
//     private function getConnexion()
//     {
//         try {
//             return new PDO($this->host, $this->user, $this->pswd);
//         } catch (PDOException $e) {
//             die("<p>Erreur: " . $e->getMessage() . "</p>");
//         }
//     }

    // Corrected the create method parameters and the SQL statement
    // public function create(string $titre, string $date_description, string $date_déchéance)
    // {
    //     $q = $this->getConnexion()->prepare("INSERT INTO taches (titre, date_description, date_dechéance) VALUES (:titre, :date_description, :date_dechéance)");
    //     return $q->execute([
    //         'titre' => $titre,
    //         'date_description' => $date_description,
    //         'date_déchéance' => $date_déchéance
    //     ]);
    // }
// }






// recuper taches

// public function countBills():int{
//    return(int)$this->getconnexion()->query("SELECT $FROM taches"->fetch- [0];)

// }


?>
