<?php
include "../include/connexion.php";

$nomUtilisateur = $_POST['nom_utilisateur'];

$sql = "DELETE FROM visites WHERE nom_utilisateur = '$nomUtilisateur'";

if ($conn->query($sql) === TRUE) {
    header ('location: ../administrateur/historiqadmin.php');
} else {
    echo "Erreur lors de la suppression de l'utilisateur : " . $conn->error;
}

$conn->close();
?>