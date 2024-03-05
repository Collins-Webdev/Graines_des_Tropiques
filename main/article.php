
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/logo.png">
    <title>Nos articles - Les Graines Du Tropiques</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">


    <!-- Add your CSS styles here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* Header Styles */
        #header {
            background-color: #007bff;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .logo {
            max-width: 20%;
            height: auto;
        }

        #navbar {
            list-style: none;
            display: flex;
            gap: 20px;
        }

        #navbar li a {
            color: #fff;
            text-decoration: none;
        }

        #navbar li a.active {
            font-weight: bold;
        }

        #mobile {
            display: none;
        }

        /* Article Header Styles */
        .masthead {
            background-image: url('img/home-bg.jpg');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            text-align: center;
            color: #fff;
        }

        .post-heading h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .subheading {
            font-size: 1.25rem;
            font-style: italic;
            color: #f8f9fa;
            margin-bottom: 40px;
        }

        .meta {
            color: #f8f9fa;
        }
        .meta a{
            text-decoration: none;
        }

        /* Article Content Styles */
        .container {
            margin: 30px auto;
            max-width: 800px;
            padding: 0 20px;
        }

        article {
            line-height: 1.8;
            font-size: 1.1rem;
            margin-bottom: 40px;
            text-align: justify;
        }

        article h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        article p {
            margin-bottom: 15px;
        }

        article img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        /* Footer Styles */
        footer {
            background-color: #f8f9fa;
            padding: 40px;
            text-align: center;
        }
        .flex-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 30px;
}

        footer .col {
            margin-bottom: 30px;
        }

        footer .col h4 {
            margin-bottom: 15px;
        }

        footer .col a {
            color: #007bff;
            text-decoration: none;
            display: block;
            margin-bottom: 5px;
        }

        footer .col a:hover {
            text-decoration: underline;
        }

        footer .icon {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        footer .install img {
            max-width: 80px;
            height: auto;
        }

        .newstext {
            text-align: center;
        }

        .form {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .form input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
            font-size: 1rem;
        }

        .form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        #close {
            display: none;
        }

        .form button:hover {
            background-color: #0056b3;
        }

        .section-p1 {
            padding-top: 30px;
        }

        /* Media Queries */
        @media screen and (max-width: 768px) {
            .logo {
                max-width: 40%;
            }

            #navbar li a {
            color: #1a1a1a;
        }

            #mobile {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            #bar {
                font-size: 1.5rem;
            }

            .masthead {
                padding: 70px 0;
            }

            #close {
                display: flex;
            }

            .container {
                padding: 0 10px;
            }
        }


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

    <!-- Page Header-->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1 class="titreArticle" > </h1>
                        <span class="meta">
                            Posté par
                            <a href="#!">Les Graines Du Tropique</a>
                            le <span class="datePublication"> </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php
                    require("config/connexion.php");

                    // Check if the 'id' parameter is present in the URL
                    if (isset($_GET['id'])) {
                        $articleId = $_GET['id'];

                        // Query to get the specific article based on the ID
                        $query = "SELECT * FROM blog WHERE id = :id";
                        $stmt = $access->prepare($query);
                        $stmt->bindParam(':id', $articleId);
                        $stmt->execute();

                        // Fetch the article
                        $article = $stmt->fetch(PDO::FETCH_ASSOC);

                        if ($article) {
                            $titreArticle = $article['titre_article'];
                            $resumeArticle = $article['résumé'];
                            $imageArticle = $article['image'];
                            $articleContenu = $article['article'];
                            $datePublicationArticle = $article['date'];
                    ?>
                            <!-- Display the article content -->
                            <script>
                                // JavaScript code to update the title and date
                                window.onload = function() {
                                    // Update all elements with class "titreArticle" with the article title
                                    var titreElements = document.getElementsByClassName("titreArticle");
                                    for (var i = 0; i < titreElements.length; i++) {
                                        titreElements[i].textContent = "<?php echo $titreArticle; ?>";
                                    }

                                    // Update the element with class "datePublication" with the publication date
                                    var datePublicationElement = document.querySelector(".datePublication");
                                    datePublicationElement.textContent = "<?php echo $datePublicationArticle; ?>";
                                };
                            </script>
                            <p class="résuméArticle"><?php echo $resumeArticle; ?></p>
                            <img src="<?php echo $imageArticle; ?>" alt="Article Image" class="imageArticle">
                            <div class="articleMême">
                                <?php
                                // Split the article content into paragraphs (5 sentences per paragraph)
                                $paragraphs = explode(PHP_EOL, $articleContenu);
                                $paragraphCount = 0;

                                foreach ($paragraphs as $paragraph) {
                                    echo "<p>$paragraph</p>";

                                    // Limit each paragraph to 5 sentences
                                    $paragraphCount++;
                                    if ($paragraphCount % 5 == 0) {
                                        echo "<br>";
                                    }
                                }
                                ?>
                            </div>
                            <p class="datePublication"></p>
                    <?php
                        } else {
                            // Handle case when article not found
                            echo "<h2>Article non trouvé</h2>";
                        }
                    } else {
                        // Handle case when 'id' parameter is not present in the URL
                        echo "<h2>Article non spécifié</h2>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </article>
    <!-- Footer-->
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
    <div class="flex-container">
        <div class="col">
            <img class="logo" src="img/logo.png" alt="logo" width="10%">
            <h4>Contact</h4>
            <p><strong>Adresse :</strong> Agla Petit-Chateau, Rue Kangloè, Cotonou, Bénin</p>
            <p><strong>Tél :</strong> (+229) 12 34 56 78 / (+229) 87 65 43 21</p>
            <p><strong>Heures :</strong> 10:00 - 18:00, Lundi - Samedi</p>
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
            <a href="about.html">Qui sommes-nous ?</a>
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
    </div>
    <div class="copyright">
        <p>© 2023, Les Graines Du Tropiques, Tous droits réservés</p>
    </div>
</footer>


    <!-- Add your JavaScript code here (if needed) -->
    <script>
    const bar = document.getElementById('bar');
    const close = document.getElementById('close');
    const nav = document.getElementById('navbar');

    // Function to toggle the navigation bar on mobile devices
    function toggleNavbar() {
        nav.classList.toggle('active');
    }

    if (bar) {
        bar.addEventListener('click', toggleNavbar);
    }

    if (close) {
        close.addEventListener('click', toggleNavbar);
    }

  
    
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