<?php
    include "../include/connexion.php";
    $nombre_visites = 0;
    $nombre_comptes = 0;
    $sql = "SELECT COUNT(*) AS total_visites FROM visites";
    $result_visites = $conn->query( $sql );
    if ( $result_visites->num_rows > 0) {
        $row_visites = $result_visites->fetch_assoc();
        $nombre_visites = $row_visites["total_visites"];
    } else {
        $nombre_visite_mensuelle = 0;
    }
    $sql = "SELECT COUNT(*) AS total_comptes FROM comptes";
    $result_comptes = $conn->query( $sql );
    if ( $result_comptes->num_rows > 0) {
        $row_comptes = $result_comptes->fetch_assoc();
        $nombre_comptes = $row_comptes["total_comptes"];
    } else {
        $nombre_comptes = 0;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
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
                <h1>Bienvenue dans votre Dashboard</h1>
            </header>

            <!-- Cards section -->
            <section class="cards">
                <div class="card">
                    <h2>Nombre de visite mensuelle</h2>
                    <p><?php echo $nombre_visites;?></p>
                </div>
                <div class="card">
                    <h2>Nombre de compte</h2>
                    <p><?php echo $nombre_comptes;?></p>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
