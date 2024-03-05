const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');
const emailInput = document.querySelector('.emailClient');
const saveEmailBtn = document.querySelector('.butSaveEmail');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    });
}

if (close) {
    close.addEventListener('click', () => {
        nav.classList.remove('active');
    });
}

// Ajouter l'événement click au bouton "S'inscrire"
if (saveEmailBtn) {
    saveEmailBtn.addEventListener('click', () => {
        const email = emailInput.value.trim();
        if (email !== '') {
            // Envoi de la demande au serveur pour enregistrer l'e-mail
            fetch('save_email.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `email=${email}`
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'success') {
                    alert('Adresse e-mail enregistrée avec succès !');
                } else if (data === 'exist') {
                    alert('Cette adresse e-mail est déjà enregistrée.');
                } else {
                    alert('Une erreur est survenue lors de l\'enregistrement de l\'adresse e-mail.');
                }
            })
            .catch(error => {
                alert('Une erreur est survenue lors de l\'enregistrement de l\'adresse e-mail.');
                console.error(error);
            });
        } else {
            alert('Veuillez saisir une adresse e-mail.');
        }
    });
}
