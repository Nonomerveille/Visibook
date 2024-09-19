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
$mot_passe = $_POST['mot_passe'];

// Préparation de la requête
$sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = ? AND mot_passe = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nom_utilisateur, $mot_passe);
$stmt->execute();
$result = $stmt->get_result();

// Vérification des informations
if ($result->num_rows > 0) {
    // Redirection vers le tableau de bord
    echo json_encode(["redirect" => "connectgar.php"]); // chemin vers la page suivante
} else {
    echo json_encode(["message" => "Nom d'utilisateur ou mot de passe incorrect."]);
}

// Fermeture de la connexion
$stmt->close();
$conn->close();
?>
