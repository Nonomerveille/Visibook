<?php
// Informations de connexion à la base de données 
include 'connexion.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $heure_arrivee = $_POST["heure_arrivee"];
    $date_jour = $_POST["date_jour"];
    $n_cni = $_POST["n_cni"];
    $nom_utilisateur = $_POST["nom_utilisateur"];
    $societe = $_POST["societe"];
    $objet = $_POST["objet"];
    $personne_a_visiter = $_POST["personne_a_visiter"];
    $numero_du_visiteur = $_POST["numero_du_visiteur"];
    $agent_securite = $_POST["agent_securite"];
    $heure_sortie = $_POST["heure_sortie"];
    
    // Préparer la requête SQL pour insérer les données dans la table
    $sql = "INSERT INTO visites (heure_arrivee, date_jour, nom_utilisateur, n_cni, societe, objet, personne_a_visiter, numero_du_visiteur, agent_securite, heure_sortie, statut) 
    VALUES ('$heure_arrivee','$date_jour','$nom_utilisateur','$n_cni', '$societe','$objet', '$personne_a_visiter', '$numero_du_visiteur', '$agent_securite','$heure_sortie', 'patientee')";

  //Exécuter la requête
   if ($conn->query($sql) === TRUE) {
       header (  "location: ../gardien/historique.php");
    } else {
        echo "Erreur lors de l'inscription: ". $conn->error;
    }
}

// Fermer la connexion
$conn->close();
?>