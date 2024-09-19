//bouton de succes notification
// Fonction pour afficher une notification
function afficherNotification(message, type) {
    // Création de la notification
    const notification = document.createElement('div');
    notification.classList.add('notification', type);
    notification.textContent = message; 

    // Ajout de la notification au document
    document.body.appendChild(notification);

    // Suppression automatique de la notification après 3 sec
    setTimeout(() => {
        notification.remove();
    }, 18000);
}

// Fonction pour valider le formulaire
function validerFormulaire() {
    const heure_arrivee = document.getElementById('heure_arrivee').value;
    const date_jour = document.getElementById('date_jour').value;
    const nom_utilisateur = document.getElementById('nom_utilisateur').value;
    const n_cni = document.getElementById('n_cni').value;
    const societe = document.getElementById('societe').value;
    const objet = document.getElementById('objet').value;
    const personne_a_visiter = document.getElementById('personne_a_visiter').value;
    const numero_du_visiteur = document.getElementById('numero_du_visiteur').value;
    const agent_securite = document.getElementById('agent_securite').value;

    // Vérifie si les champs sont vides
    if (heure_arrivee === '' || date_jour === '' || nom_utilisateur === '' || n_cni === '' 
        || societe === '' || objet === '' || personne_a_visiter === '' 
            || numero_du_visiteur === '' || agent_securite === '') {

        // Affiche un message d'erreur si un champ est vide
        afficherNotification('Veuillez remplir tous les champs.', 'error');
    } else {
        // Affiche un message de succès si tous les champs sont remplis
        afficherNotification('Enregistrement effectué avec succès !', 'success');
    }
}



// function afficherNotification(){
//     //creation de la notification
//     const notification = document.createElement('div');
//     notification.classList.add('notification', 'success');
//     notification.textContent = 'Enregistrement effectuée avec succès !';

//     //ajout de la notification au document
//     document.body.appendChild(notification);

//     //suppression automatique de la notification apres 3 sec
//     setTimeout(() => {
//         notification.remove();
//     }, 6000);

// }



