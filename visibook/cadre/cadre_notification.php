<?php
include "../include/connexion.php";

// Si un bouton  est cliqué, mise à jour du statut
if (isset($_POST['action']) && isset($_POST['nom_utilisateur'])) {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $action = $_POST['action'];
    
    // Déterminer le nouveau statut en fonction de l'action
    if ($action == 'approuver') {
        $nouveau_statut = 'approuvee';
    } elseif ($action == 'patienter') {
        $nouveau_statut = 'patientee';
    } elseif ($action == 'rejeter') {
        $nouveau_statut = 'rejetee';
    }

    // Mise à jour du statut dans la base de données
    $sql_update = "UPDATE visites SET statut='$nouveau_statut' WHERE nom_utilisateur='$nom_utilisateur'";
    if ($conn->query($sql_update) === TRUE) {
        header ("location: cadre_notification.php");
    } else {
        echo "Erreur lors de la mise à jour: " . $conn->error;
    }
}

// Récupération de tous les enregistrements de la table visites
$sql = "SELECT * FROM visites";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification des cadres</title>
    <link rel="stylesheet" href="../css/notification.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <img src="../assets/img/logo.png">
            <ul>
                <li><a href="cadre_notification.php">Notification</a></li>
                <li><a href="index.php">Déconnexion</a></li>
            </ul>
        </nav>

        <!-- Main content -->
        <div class="main-content">
            <header class="message">
                <h1>Bienvenue dans l'Historique des Notifications</h1>
            </header>

            <!-- Table section (Liste des utilisateurs) -->
            <section class="table-section">
                <h2>NOTIFICATION</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date jour</th>
                            <th>Noms</th>
                            <th>Société</th>
                            <th>Objet</th>
                            <th>Statut</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row["date_jour"]; ?></td>
                                    <td><?php echo $row["nom_utilisateur"]; ?></td>
                                    <td><?php echo $row["societe"]; ?></td>
                                    <td><?php echo $row["objet"]; ?></td>
                                    <td>
                                        <!-- Récupération dynamique du statut depuis la base de données -->
                                        <p><?php echo ucfirst($row["statut"]); ?></p>
                                    </td>
                                    <td>
                                        <form method="POST" action="">
                                            <!-- Identifiant de l'utilisateur -->
                                            <input type="hidden" name="nom_utilisateur" value="<?php echo $row['nom_utilisateur']; ?>">

                                            <!-- Boutons pour changer le statut -->
                                            <button type="submit" name="action" value="approuver">Approuver</button>
                                            <button type="submit" name="action" value="patienter">Patienter</button>
                                            <button type="submit" name="action" value="rejeter">Rejeter</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php }
                        } else {
                            echo "<tr><td colspan='5'>Aucune visite trouvée.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
