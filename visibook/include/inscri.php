<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$mot_passe = "";
$dbname = "form_visites";

$conn = new mysqli($servername, $username, $mot_passe, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupération des données du formulaire
$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_passe = $_POST["mot_passe"];

// Préparation de la requête SQL
$sql = "SELECT * FROM administrateur WHERE nom_utilisateur='$nom_utilisateur' AND mot_passe ='$mot_passe'";
$result = $conn->query($sql);

// Vérification si un utilisateur a été trouvé
if ($result->num_rows > 0) {
    // Redirection vers la page visite
    header("Location: ../administrateur/dashboard.php");
    exit();
} else {
    // Affichage d'un message d'erreur
    echo "email ou mot de passe incorrect. Veuillez vous inscrire.";
}

$conn->close();
?>