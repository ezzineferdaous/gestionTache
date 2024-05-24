<?php 
try{
    $con= new PDO('mysql:host=localhost;dbname=crud_ajax','root','');
}
catch (PDOExcepton $e){
    echo "<p>Erreur:".$e->getMessage();
    die() ;
}
?>