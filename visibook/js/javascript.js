function envoyerNotification(personne, date_du_jour, visiteur, societe, objet) {
    if(confirm('Voulez-vous vraiment notifier ' + personne + ' ?')) {
        // Appel à un fichier PHP via AJAX pour envoyer l'email
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../include/notifier.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert('Notification envoyée à ' + personne);
            }
        };
        xhr.send("personne_a_visiter=" + personne + "&date_jour=" + date_du_jour + "&nom_utilisateur=" + visiteur + "&societe=" + societe + "&objet=" + objet );
    }
}


