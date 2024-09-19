<?php
include "../include/connexion.php";
$sql = "SELECT * FROM comptes";
$result = $conn -> query($sql);
$conn -> close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des comptes</title>
    <link rel="stylesheet" href="../css/creevisite.css">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <img src="../assets/img/logo.png">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">Gestion Utilisateur</a>
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
                <h1>Bienvenue dans la Liste des Comptes</h1>
            </header>

            <!-- Table section (Liste des utilisateurs) -->
            <section class="table-section">
                <h2>Derniers Utilisateurs Inscrits</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Nom d'utilisateur</th>
                            <th>E-mail</th>
                            <th>Service</th>
                            <th>Role</th>
                            <th>Mot de passe</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row["nom_utilisateur"]; ?></td>
                                        <td><?php echo $row["emaill"]; ?></td>
                                        <td><?php echo $row["services"]; ?></td>
                                        <td><?php echo $row["roles"]; ?></td>
                                        <td><?php echo $row["mot_passe"]; ?></td>
                                        <td>
                                        
                                            <form method="GET" action="modif.php">
                                                <input type="hidden" name="nom_utilisateur" value="<?php echo $row['nom_utilisateur']; ?>">
                                                <input type="hidden" name="emaill" value="<?php echo $row['emaill']; ?>">
                                                <input type="hidden" name="services" value="<?php echo $row['services']; ?>">
                                                <input type="hidden" name="roles" value="<?php echo $row['roles']; ?>">
                                                <input type="hidden" name="mot_passe" value="<?php echo $row['mot_passe']; ?>">
                                                <button type="submit">Modifier</button>
                                            </form>

                                        
                                            <form action="../include/supprimer.php" method="post">
                                                <input type="hidden" name="nom_utilisateur" value="<?php echo $row['nom_utilisateur']; ?>">
                                                <input type="hidden" name="emaill" value="<?php echo $row['emaill']; ?>">
                                                <input type="hidden" name="services" value="<?php echo $row['services']; ?>">
                                                <input type="hidden" name="roles" value="<?php echo $row['roles']; ?>">
                                                <input type="hidden" name="mot_passe" value="<?php echo $row['mot_passe']; ?>">
                                                <button type="submit">Supprimer</button>
                                            </form>
                                        </td> 
                                    </tr> 
                                <?php }
                            } else {
                                echo "<tr><td colspan='9'>Aucun utilisateur trouvé.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>
</html>


