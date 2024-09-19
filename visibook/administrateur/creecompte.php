<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de Compte</title>
    <link rel="stylesheet" href="../css/CreationCompte.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
    <script src="../js/password.js" defer></script> -->

    <style>
        .password-container {
            position: relative;
        }
        .password-container input[type="password"] {
            padding-right: 30px;
        }
        .toggle-password {
        position: absolute;
        top: 35%;
        right: 10px;
        font-size: 25px;
        transform: translateY(-50%);
        cursor: pointer;
        }
    </style>
    <script>
      function togglePassword() {
      const passwordField = document.getElementById("mot_passe");
      const type = passwordField.type === "password" ? "text" : "password";
      passwordField.type = type; 

      const eyeIcon = document.querySelector('.toggle-password');
      eyeIcon.classList.toggle("fa-eye-slash"); // Si vous utilisez Font Awesome
    }
    </script>
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
        </div>
    </div>
    <div class="form-container">
        <h2>CREATION DE COMPTE</h2>

        <form action="../include/encompte.php" action="/submit" method="post" id="myform">
            <label for="nom_utilisateur">Nom d'utilisateur <span class="required">*</span></label>
            <input type="text" id="nom_utilisateur" name="nom_utilisateur" required />

            <label for="emaill">E-mail <span class="required">*</span></label>
            <input type="email" id="eamill" name="emaill" required />

            <label for="services">Service <span class="required">*</span></label>
            <select name="services" id="services" required>
                <option value="" disabled selected>-- Choisir un service --</option>
                <option value="Direction Generale">Direction Generale</option>
                <option value="Commercial">Commercial</option>
                <option value="Production">Production</option>
                <option value="Maintenance">Maintenance</option>
                <option value="SI">SI</option>
                <option value="Service de Gestion">Service de Gestion</option>
                <option value="Bureau d'Etude">Bureau d'Etude</option>
                <option value="Finance">Finance</option>
                <option value="rRessources Humaines">Ressources Humaines</option>
                <option value="QHSE">QHSE</option>
                <option value="Achat">Achat</option>
            </select>

            <label for="roles">Rôle <span class="required">*</span></label>
            <select name="roles" id="roles" required>
                <option value="" disabled selected>-- Choisir un rôle --</option>
                <option value="Agent de sécurité">Agent de sécurité</option>
                <option value="Cadre">Cadre</option>
            </select>

            <label for="mot_passe">Mot de passe <span class="required">*</span></label>
            <div class="password-container">
                <input type="password" name="mot_passe" id="mot_passe" placeholder="Mot de passe">
                <i class="toggle-password" onclick="togglePassword()">&#x1F441;</i>
            </div>
            <div id="message-erreur"></div>

            <button type="submit">Créer</button>
        </form>
    </div>
</body>
</html>
