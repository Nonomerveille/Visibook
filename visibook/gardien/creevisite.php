<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <li><a href="creevisite.php">Créer</a></li>
                        <li><a href="historique.php">Historique</a></li>
                    </ul>
                </li>
                <li><a href="index.php">Déconnexion</a></li>
            </ul>
        </nav>

        <!-- Main content -->
        <div class="main-content">
            <header class="message">
                <h1>Bienvenue dans votre Dashboard</h1>
            </header>
        </div>
    </div>
    <div class="GrilleForm">
        <div class="form-container">
            <h2>FORMULAIRE DE VISITE</h2>

            <form action="../include/enregistre.php" method="post" id="myform">
                
                <label for="heure_arrivee">Heure d'arrivée <span class="required">*</span></label>
                <input type="time" id="heure_arrivee" name="heure_arrivee" required />

                <label for="date_jour">Date du jour <span class="required">*</span></label>
                <input type="date" id="date_jour" name="date_jour" required />
        

                <label for="nom_utilisateur">Nom du visiteur<span class="required">*</span></label>
                <input type="text" id="nom_utilisateur" name="nom_utilisateur" required />

                <label for="n_cni">Numero CNI<span class="required">*</span></label>
                <input type="text" id="n_cni" name="n_cni" required />
        
                
                <label for="societe">Société  <span class="required">*</span></label>
                <input type="text" id="societe" name="societe" required />
        
                
                <label for="objet">Objet <span class="required">*</span></label>
                <input type="text" id="objet" name="objet" required />
        
                <label for="personne_a_visiter"
                    >Personne à visiter <span class="required">*</span></label>
                <input type="text" id="personne_a_visiter" name="personne_a_visiter" required/>
        
                <label for="numero">Numéro du visiteur <span class="required">*</span></label>
                <input type="tel" id="numero_du_visiteur" name="numero_du_visiteur" required />
        
                <label for="agent_securite">Nom de l'agent de sécurité <span class="required">*</span></label>
                <input type="text" id="agent_securite" name="agent_securite" required />
        
                <label for="heure_sortie">Heure de sortie </label>
                <input type="time" id="heure_sortie" name="heure_sortie" />

                <div id="message-erreur"></div>

                <button type="submit">Créer</button>
            </form>
        </div>
    </div>
</body>
</html>