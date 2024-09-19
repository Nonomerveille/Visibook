<?php
include "../include/connexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $statut = $_POST['statut'];
    $action = $_POST['action'];

    // Met à jour le statut en fonction de l'action
    $sql = "UPDATE visites SET statut = '$action' WHERE statut = 'en attente'";

    if ($conn->query($sql) === TRUE) {
        echo "Statut mis à jour avec succès";
    } else {
        echo "Erreur lors de la mise à jour : " . $conn->error;
    }

    $conn->close();
} else {
    echo "Requête invalide";
}