<?php
include "../include/connexion.php";

// Vérifier si le paramètre nom_utilisateur est passé dans l'URL
if (isset($_GET['nom_utilisateur'])) {
 $nom_utilisateur = $_GET['nom_utilisateur'];

// Récupérer les informations de l'utilisateur dans la base de données
 $sql = "SELECT * FROM comptes WHERE nom_utilisateur='$nom_utilisateur'";
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
<title>Modifier Utilisateur</title>
<link rel="stylesheet" href="../css/CreationCompte.css">
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

        <div class="main-content">
            <header class="message">
              <h1>Compte Utilisateur</h1>
            </header>
        </div>
    </div>

            <div class="form-container">
            <h2>MODIFICATION DE COMPTE</h2>
                <section class="form-section">
                    <form action="../include/modifier.php" method="post">
                        <input type="hidden" name="nom_utilisateur" value="<?php echo $row['nom_utilisateur']; ?>">

                        <label for="nom_utilisateur">Nom d'utilisateur:</label>
                        <input type="text" name="nom_utilisateur_affiche" value="<?php echo $row['nom_utilisateur']; ?>" >

                        <label for="emaill">Email:</label>
                        <input type="text" name="emaill" value="<?php echo $row['emaill']; ?>">

                        <label for="services">Service:</label>
                        <select name="services" id="services">
                            <option value="direction_generale" <?php if ($row['services'] == 'direction_generale') echo 'selected'; ?>>Direction Générale</option>
                            <option value="commercial" <?php if ($row['services'] == 'commercial') echo 'selected'; ?>>Commercial</option>
                            <option value="production" <?php if ($row['services'] == 'production') echo 'selected'; ?>>Production</option>
                            <option value="maintenance" <?php if ($row['services'] == 'maintenance') echo 'selected'; ?>>Maintenance</option>
                            <option value="si" <?php if ($row['services'] == 'si') echo 'selected'; ?>>SI</option>
                            <option value="service_gestion" <?php if ($row['services'] == 'service_gestion') echo 'selected'; ?>>Service de Gestion</option>
                            <option value="bureau_etude" <?php if ($row['services'] == 'bureau_etude') echo 'selected'; ?>>Bureau d'etude</option>
                            <option value="finance" <?php if ($row['services'] == 'finance') echo 'selected'; ?>>Finance</option>
                            <option value="ressources_humaine" <?php if ($row['services'] == 'ressources_humaines') echo 'selected'; ?>>Ressources Humaines</option>
                            <option value="qhse" <?php if ($row['services'] == 'qhse') echo 'selected'; ?>>QHSE</option>
                            <option value="achat" <?php if ($row['services'] == 'achat') echo 'selected'; ?>>Achat</option>
                        </select>

                        <label for="roles">Rôle:</label>
                        <select name="roles" id="roles">
                            <option value="Agent de sécurité" <?php if ($row['roles'] == 'Agent de sécurité') echo 'selected'; ?>>Agent de sécurité</option>
                            <option value="Cadre" <?php if ($row['roles'] == 'Cadre') echo 'selected'; ?>>Cadre</option>
                        </select>

                        <label for="mot_passe">Mot de passe <span class="required">*</span></label>
                        <div class="password-container">
                            <input type="password" id="mot_passe" placeholder="Mot de passe" type="text" name="mot_passe" value="<?php echo $row['mot_passe']; ?>">
                            <i class="toggle-password" onclick="togglePassword()">&#x1F441;</i>
                        </div>

                        <button type="submit">Mettre à jour</button>
                    </form>
                    </section>
            </div>
       
</body>
</html>
