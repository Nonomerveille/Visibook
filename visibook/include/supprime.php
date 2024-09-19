<?php
require_once'connexion.php';



$nom_utilisateur = $_POST["nom_utilisateur"];
$services = $_POST["services"];
$roles = $_POST["roles"];
$mot_passe = $_POST["mot_passe"];

// Préparer la requête SQL pour insérer les données dans la table
$sql = "DELETE FROM compte WHERE nom_utilisateur = '$nom_utilisateur'";

//Exécuter la requête
if ($conn->query($sql) === TRUE) {
   header ('location:../gardien/historique.php');
} else {
     echo "Erreur lors de la suppression: ";
 }


// Fermer la connexion
$conn->close();
?>