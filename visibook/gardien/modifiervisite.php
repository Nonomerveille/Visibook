<?php
include "../include/connexion.php";

// Vérifier si le paramètre nom_utilisateur est passé dans l'URL
if (isset($_GET['nom_utilisateur'])) {
 $nom_utilisateur = $_GET['nom_utilisateur'];

// Récupérer les informations de l'utilisateur dans la base de données
 $sql = "SELECT * FROM visites WHERE nom_utilisateur='$nom_utilisateur'";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
// Extraire les données de l'utilisateur
 $row = $result->fetch_assoc();
    } else {
 echo "Aucun utilisateur trouvé avec ce nom d'utilisateur.";
 exit();
 }
} else {
 echo "Nom d'utilisateur non spécifié.";
 exit();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Visite</title>
    <link rel="stylesheet" href="../css/CreationVisite.css">
    <link rel="stylesheet" href="../css/bouton.css">
    <script src="../js/boutton.js"></script>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <img src="../assets/img/logo.png">
            <ul>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Visite</a>
                    <ul class="dropdown-menu">
                        <li><a href="creevisite.php">Création</a></li>
                        <li><a href="historique.php">Historique</a></li>
                    </ul>
                </li>
                <li><a href="index.php">Déconnexion</a></li>
            </ul>
        </nav>

        <!-- Main content -->
        <div class="main-content">
            <header class="message">
                <h1>Bienvenue </h1>
            </header>
        </div>
    </div>
    <div class="GrilleForm">
        <div class="form-container">
            <h2>MODIFICATION VISITE</h2>
                <section class="form-section">
                    <form action="../include/modifiervisites.php" method="post">
                        <input type="hidden" name="nom_utilisateur" value="<?php echo $row['nom_utilisateur']; ?>">

                        <label for="heure_arrivee">Heure d'arrivee:</label>
                        <input type="time" name="heure_arrivee" value="<?php echo $row['heure_arrivee']; ?>" >

                        <label for="date_jour">Date du jour:</label>
                        <input type="date" name="date_jour" value="<?php echo $row['date_jour']; ?>" >


                        <label for="nom_utilisateur">Nom visiteur:</label>
                        <input type="text" name="nom_utilisateur_affiche" value="<?php echo $row['nom_utilisateur']; ?>">

                        <label for="n_cni">Numero CNI:</label>
                        <input type="text" name="n_cni" value="<?php echo $row['n_cni']; ?>" >

                        <label for="societe">Societe:</label>
                        <input type="text" name="societe" value="<?php echo $row['societe']; ?>" >

                        <label for="objet">Objet:</label>
                        <input type="text" name="objet" value="<?php echo $row['objet']; ?>" >

                        <label for="personne_a_visiter">Personne a visiter:</label>
                        <input type="text" name="personne_a_visiter" value="<?php echo $row['personne_a_visiter']; ?>" >

                        <label for="numero_du_visiteur">Numero du visiteur:</label>
                        <input type="text" name="numero_du_visiteur" value="<?php echo $row['numero_du_visiteur']; ?>" >

                        <label for="agent_securite">Nom de l'agent de securite:</label>
                        <input type="text" name="agent_securite" value="<?php echo $row['agent_securite']; ?>" >


                        <label for="heure_sortie">Heure de sortie:</label>
                        <input type="time" name="heure_sortie" value="<?php echo $row['heure_sortie']; ?>">

                        <button type="submit">Mettre à jour</button>
                    </form>
                    </section>
            </div>
       
</body>
</html>

