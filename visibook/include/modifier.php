<?php
include "../include/connexion.php";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 $nom_utilisateur = $_POST['nom_utilisateur'];
 $emaill = $_POST['emaill'];
 $services = $_POST['services'];
 $roles = $_POST['roles'];
 $mot_passe = $_POST['mot_passe'];
 //$mot_passe_hash = password_hash($mot_passe, PASSWORD_DEFAULT);

// Mettre à jour les informations de l'utilisateur
$sql = "UPDATE comptes SET emaill='$emaill', services='$services', roles='$roles', mot_passe='$mot_passe' WHERE nom_utilisateur='$nom_utilisateur'";

if ($conn->query($sql) === TRUE) {
echo "Les informations ont été mises à jour avec succès.";
// Redirection vers la liste des comptes après la mise à jour
 header('Location: ../administrateur/listecompte.php');
 exit();
} else {
echo "Erreur lors de la mise à jour : " . $conn->error;
 }

 $conn->close();
}
?>
