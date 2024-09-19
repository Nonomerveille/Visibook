<?php
include "../include/connexion.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
// Mettre à jour les informations de l'utilisateur
$sql = "UPDATE visites SET heure_arrivee ='$heure_arrivee', date_jour = '$date_jour', n_cni = '$n_cni', nom_utilisateur = '$nom_utilisateur', societe = '$societe', objet = '$objet', personne_a_visiter = '$personne_a_visiter', numero_du_visiteur = '$numero_du_visiteur', agent_securite ='$agent_securite', heure_sortie ='$heure_sortie' WHERE nom_utilisateur='$nom_utilisateur'";

if ($conn->query($sql) === TRUE) {
echo "Les informations ont été mises à jour avec succès.";
// Redirection vers la liste des comptes après la mise à jour
 header('Location: ../gardien/historique.php');
 exit();
} else {
echo "Erreur lors de la mise à jour : " . $conn->error;
 }

 $conn->close();
}
?>
