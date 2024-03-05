
<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/logo.png">
        <title>Les Graines Du Tropique</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

        <link rel="stylesheet" href="style.css">
        <style>
            .modal-container {
                display: flex;
                justify-content: center;
                align-items: center;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 9999;
            }
        
            .modal-content {
                background-color: #fff;
                border-radius: 8px;
                padding: 20px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                font-size: 16px;
                max-width: 300px;
                text-align: center;
            }
        
            .success {
                background-color: #75B55B;
                color: #fff;
            }
        
            .error {
                background-color: #E55353;
                color: #fff;
            }
        </style>
    </head>

    <body>

        <section id="header">
            <a href="#"> <img src="img/logo.png" class="logo" alt="logo" width="20%" height="5%"> </a>
            <div>
                <ul id="navbar">
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="shop.php">Boutique</a></li>
                    <li><a class="active" href="blog.php">Blog</a></li>
                    <li><a href="about.html">À&nbsppropos</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li id="lg-bag"><a href="cart1.html"><i class="far fa-shopping-bag"></i></a></li>
                    <a href="#" id="close"><i class="far fa-times"></i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart1.html"><i class="far fa-shopping-bag"></i></a>
                <i id="bar" class="fas fa-outdent"></i>
            </div>

        </section>

        <section id="page-header" class="blog-header">
            <h2>#ensavoirplus</h2>
            <p> Quelques articles sur nos sujets d'intèrêts </p>
        </section>

        <section id="blog">
        <?php
        require("config/connexion.php");

        // Requête SQL pour récupérer tous les articles de la table 'blog'
        $query = "SELECT * FROM blog";
        $result = $access->query($query);

        // Récupérer tous les articles sous forme de tableau associatif
        $articles = $result->fetchAll(PDO::FETCH_ASSOC);

        // Mélanger l'ordre des articles aléatoirement
        shuffle($articles);

        // Afficher les 10 premiers articles après le mélange
        for ($i = 0; $i < 10; $i++) {
            $titre = $articles[$i]['titre_article'];
            $image = $articles[$i]['image'];
            $resume = $articles[$i]['résumé'];
            $datePublication = $articles[$i]['date'];
            $article = $articles[$i]['article'];
        ?>
        <div class="blog-box">
            <div class="blog-img">
                <!-- Utiliser le chemin d'accès de l'image provenant de la base de données -->
                <img class="image_de_l'article" src="<?php echo $image; ?>" alt="<?php echo $titre; ?>">
            </div>
            <div class="blog-details">
                <h4 class="titre_De_l'article"><?php echo $titre; ?></h4>
                <p class="résumé_De_l'article"><?php echo $resume; ?></p>
                <!-- Modify the 'href' attribute of the link to include the article's ID -->
                <a class="lienVersArticle" href="article.php?id=<?php echo $articles[$i]['id']; ?>">Continuer la lecture</a>

            </div>  
            <h1 class="date_De_Publication"><?php echo $datePublication; ?></h1>
        </div>
    <?php
    }
    ?>
</section>



        <section id="pagination" class="section-p1">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>

        </section>

        <section id="newsletter" class="section-p1 section-m1">
            <div class="newstext">
                <h4>INSCRIVEZ-VOUS À NOTRE NEWSLETTER ! </h4>
                <p>Pour recevoir nos dernieres nouvelles et <span>offres spéciaux.</span></p>
            </div>
            <div class="form">
                <input type="text" placeholder="Votre adresse e-mail" name="" class="emailClient">
                <button class="normal butSaveEmail">S'inscrire</button>
            </div>
        </section>


        <footer class="section-p1">
            <div class="col">
                <img class="logo" src="img/logo.png" alt="logo" width="10%">
                <h4>Contact</h4>
                <p><strong> Adresse : </strong> Agla Petit-Chateau, Rue Kangloè, Cotonou, Bénin </p>
                <p><strong> Tél : </strong> (+229) 12 34 56 78 / (+229) 87 65 43 21 </p>
                <p><strong> Heures : </strong> 10:00 - 18:00, Lundi - Samedi </p>
                <div class="follow">
                    <h4>Nous Suivre</h4>
                    <div class="icon">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-pinterest-p"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>
            <div class="col">
                <h4>A propos</h4>
                <a href="about.html">Qui somme nous ?</a>
                <a href="#">Informations de livraison</a>
                <a href="#">Mention Légale</a>
                <a href="#">Conditions Générales</a>
                <a href="contact.html">Nous Contacter</a>
            </div>
            <div class="col">
                <h4>Mon compte</h4>
                <a href="admin/authentification.php">Se connecter</a>
                <a href="cart1.html">Panier</a>
                <a href="#">Suivre ma commande</a>
                <a href="contact.html">Aide</a>
            </div>
            <div class="col install">
                <h4>Télécharger l'application</h4>
                <p>De Google Play ou d'App Store</p>
                <div class="row">
                    <img src="img/pay/app.jpg" alt="">
                    <img src="img/pay/play.jpg" alt="">
                </div>
                <p>Terminal de paiement sécurisé</p>
                <img src="img/pay/pay.png" alt="">
            </div>
            <div class="copyright">
                <p> © 2023, Les Graines Du Tropiques, Tous droits résérvés </p>
            </div>
        </footer>

        <script>
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

// Fonction pour afficher la fenêtre modale stylisée avec le message
function showStyledPopupMessage(message, isSuccess) {
    const modalContainer = document.createElement('div');
    modalContainer.className = 'modal-container';
    
    const modalContent = document.createElement('div');
    modalContent.className = isSuccess ? 'modal-content success' : 'modal-content error';
    modalContent.textContent = message;
    
    modalContainer.appendChild(modalContent);
    document.body.appendChild(modalContainer);

    setTimeout(() => {
        document.body.removeChild(modalContainer);
    }, 1500); // Supprime le message après 3 secondes
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
                    showStyledPopupMessage('Adresse e-mail enregistrée avec succès !', true);
                } else if (data === 'exist') {
                    showStyledPopupMessage('Cette adresse e-mail est déjà enregistrée.', false);
                } else {
                    showStyledPopupMessage('Une erreur est survenue lors de l\'enregistrement de l\'adresse e-mail.', false);
                }
            })
            .catch(error => {
                showStyledPopupMessage('Une erreur est survenue lors de l\'enregistrement de l\'adresse e-mail.', false);
                console.error(error);
            });
        } else {
            showStyledPopupMessage('Veuillez saisir une adresse e-mail.', false);
        }
    });
}
        </script>
    </body>

</html>