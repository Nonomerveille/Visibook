<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../css/script.css">
    <script src="../js/index.js"></script>

</head>
<body>
    <div class="form-container">
        <h2> CONNEXION </h2>
        <form action="../include/connectca.php" id="formulaire" method="post">

          <label for="nom_utilisateur"> Nom d'utilisateur <span class="required">*</span></label>
          <input type="text" id="nom_utilisateur" name="nom_utilisateur" placeholder="Nom d'utilisateur" required />
  
          <label for="mot_passe"> mot de passe <span class="required">*</span></label>
          <div class="password-container">
                <input type="password" name="mot_passe" id="mot_passe" placeholder="Mot de passe"  required>
                <i class="toggle-password" onclick="togglePassword()">&#x1F441;</i>
          </div>
  
  
          <div id="message-erreur"></div>
          <button type="submit">Se Connecter</button> 
          <!-- <button type="submit" onclick="return validateForm()">Se Connecter</button> -->

        </form>

        <!-- <div id="message"></div>         -->
      </div>
</body>
</html>