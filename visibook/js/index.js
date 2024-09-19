//masquage mot de passe
function togglePassword() {
    const passwordField = document.getElementById("mot_passe");
    const type = passwordField.type === "password" ? "text" : "password";
    passwordField.type = type; 

    const eyeIcon = document.querySelector('.toggle-password');
    eyeIcon.classList.toggle("fa-eye-slash"); // Si vous utilisez Font Awesome
  }




  

function handleLogin(event) {
    event.preventDefault(); // Empêche l'envoi du formulaire

    const nom_utilisateur = document.getElementById('nom_utilisateur').value;
    const mot_passe = document.getElementById('mot_passe').value;

    // Vérification basique côté client
    if (nom_utilisateur === "" || mot_passe === "") {
        document.getElementById('message').innerText = "Veuillez remplir tous les champs.";
        return false; // Arrête le traitement
    }

    // Envoi des données au serveur
    fetch('login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            'nom_utilisateur': nom_utilisateur,
            'mot_passe': mot_passe
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.redirect) {

            window.location.href = data.redirect; // Redirige vers la page suivante
        } else {
            document.getElementById('message').innerText = data.message; // Affiche le message d'erreur
        }
    })
    .catch(error => {
        console.error('Erreur:', error);
    });

    return false; // Empêche l'envoi du formulaire par défaut
}