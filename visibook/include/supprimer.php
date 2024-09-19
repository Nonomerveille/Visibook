<?php
include "../include/connexion.php";

$nomUtilisateur = $_POST['nom_utilisateur'];

$sql = "DELETE FROM comptes WHERE nom_utilisateur = '$nomUtilisateur'";

if ($conn->query($sql) === TRUE) {
    header ('location: ../administrateur/listecompte.php');
} else {
    echo "Erreur lors de la suppression de l'utilisateur : " . $conn->error;
}

$conn->close();
?>