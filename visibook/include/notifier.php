<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $personne_a_visiter = $_POST['personne_a_visiter'];
    $objet = $_POST['objet'];
    $nom_utilisateur = $_POST['nom_utilisateur'];

    $to = "email_de_la_personne@example.com"; // Remplacez par l'adresse email de la personne à notifier
    $subject = "Nouvelle visite: $objet";
    $message = "Bonjour $personne_a_visiter, \n\nUne nouvelle visite a été enregistrée.\n\nVisiteur: $nom_utilisateur\nObjet: $objet\n\nMerci.";
    $headers = "From: no-reply@example.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email envoyé avec succès";
    } else {
        echo "Échec de l'envoi de l'email";
    }
}
?>
