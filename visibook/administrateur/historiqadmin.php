<?php 
include "../include/connexion.php";

// Récupération des données de la table visites
$sql = "SELECT * FROM visites";
$result = $conn->query($sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des visites</title>
    <link rel="stylesheet" href="../css/historique.css">
    <script src="../js/javascript.js"></script>
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <img src="../assets/img/logo.png">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li class="dropdown">
                    <a href="listecompte.php" class="dropdown-toggle">Gestion Utilisateur</a>
                    <ul class="dropdown-menu">
                        <li><a href="creecompte.php">Créer Compte</a></li>
                        <li><a href="listecompte.php">Liste Compte</a></li>
                    </ul>
                </li>
                <li><a href="historiqadmin.php">Historique</a></li>
                <li><a href="index.php">Déconnexion</a></li>
            </ul>
        </nav>

        <!-- Main content -->
        <div class="main-content">
            <header class="message">
                <h1>Bienvenue dans l'Historique des visites</h1>
            </header>

            <!-- Table section (Liste des utilisateurs) -->
            <section class="table-section">
                <h2>HISTORIQUE</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Heure d'arrivée</th>
                            <th>Date</th>
                            <th>Nom d'utilisateur</th>
                            <th>Société</th>
                            <th>Objet</th>
                            <th>Personne à visiter</th>
                            <th>Heure de sortie</th>
                            <th>Statut</th> 
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row["heure_arrivee"]; ?></td>
                                    <td><?php echo $row["date_jour"]; ?></td>
                                    <td><?php echo $row["nom_utilisateur"]; ?></td>
                                    <td><?php echo $row["societe"]; ?></td>
                                    <td><?php echo $row["objet"]; ?></td>
                                    <td><?php echo $row["personne_a_visiter"]; ?></td>
                                    <td><?php echo $row["heure_sortie"]; ?></td>
                                    <td>
                                        <!-- Récupération dynamique du statut depuis la base de données -->
                                        <p><?php echo ucfirst($row["statut"]); ?></p>
                                    </td>
                                    <td>
                                    <form method="GET" action="modifhistoriq.php">
                                            <input type="hidden" name="heure_arrivee" value="<?php echo $row['heure_arrivee']; ?>">
                                            <input type="hidden" name="date_jour" value="<?php echo $row['date_jour']; ?>">
                                            <input type="hidden" name="nom_utilisateur" value="<?php echo $row['nom_utilisateur']; ?>">
                                            <input type="hidden" name="n_cni" value="<?php echo $row['n_cni']; ?>">
                                            <input type="hidden" name="societe" value="<?php echo $row['societe']; ?>">
                                            <input type="hidden" name="objet" value="<?php echo $row['objet']; ?>">
                                            <input type="hidden" name="personne_a_visiter" value="<?php echo $row['personne_a_visiter']; ?>">
                                            <input type="hidden" name="numero_du_visiteur" value="<?php echo $row['numero_du_visiteur']; ?>">
                                            <input type="hidden" name="agent_securite" value="<?php echo $row['agent_securite']; ?>">
                                            <input type="hidden" name="heure_sortie" value="<?php echo $row['heure_sortie']; ?>">
                                            <input type="hidden" name="statut" value="<?php echo $row['statut']; ?>">
                                            <button type="submit">Modifier</button>
                                        </form>

                                        <form action="../include/supp.php" method="post">
                                            <input type="hidden" name="heure_arrivee" value="<?php echo $row['heure_arrivee']; ?>">
                                            <input type="hidden" name="date_jour" value="<?php echo $row['date_jour']; ?>">
                                            <input type="hidden" name="nom_utilisateur" value="<?php echo $row['nom_utilisateur']; ?>">
                                            <input type="hidden" name="n_cni" value="<?php echo $row['n_cni']; ?>">
                                            <input type="hidden" name="societe" value="<?php echo $row['societe']; ?>">
                                            <input type="hidden" name="objet" value="<?php echo $row['objet']; ?>">
                                            <input type="hidden" name="personne_a_visiter" value="<?php echo $row['personne_a_visiter']; ?>">
                                            <input type="hidden" name="numero_du_visiteur" value="<?php echo $row['numero_du_visiteur']; ?>">
                                            <input type="hidden" name="agent_securite" value="<?php echo $row['agent_securite']; ?>">
                                            <input type="hidden" name="heure_sortie" value="<?php echo $row['heure_sortie']; ?>">
                                            <input type="hidden" name="statut" value="<?php echo $row['statut']; ?>">
                                            <button type="submit">Supprimer</button>
                                        </form>
                                    </td> 
                                </tr> 
                            <?php }
                        } else {
                            echo "<tr><td colspan='9'>Aucune visite enregistrée.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
</html>
