<?php
// Informations de connexion à la base de données 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form_visites";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error); 
}
?>