<?php
// Informations de connexion à la base de données 
include'connexion.php';

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error); 
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom_utilisateur = $_POST["nom_utilisateur"];
    $services = $_POST["services"];
    $roles = $_POST["roles"];
    $mot_passe = $_POST["mot_passe"];
// Hash du mot de passe
    $mot_passe_hash = password_hash($mot_passe, PASSWORD_DEFAULT);

    if ($roles === "agent_securite"){
        $sql = "INSERT INTO agent_securite( nom_utilisateur, services, roles, mot_passe ) VALUES ('$nom_utilisateur','$services', '$roles','$mot_passe_hash')";
    }else{
    // Préparer la requête SQL pour insérer les données dans la table
    $sql = "INSERT INTO personne_a_visiter( nom_utilisateur, services, roles, mot_passe ) VALUES ('$nom_utilisateur','$services', '$roles','$mot_passe_hash')";
    }
  //Exécuter la requête
   if ($conn->query($sql) === TRUE) {
       echo "Felicitation $nom_utilisateur ";
    } else {
         echo "Erreur lors de l'inscription: " . $conn->error;
     }
}

// Fermer la connexion
$conn->close();
?>