<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'authentifier</title>
    <style>
        /* Réinitialisation des styles */
        body, h2, p, form {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 350px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        p.error-text {
            color: #e74c3c;
            text-align: center;
            margin-bottom: 15px;
            animation: shake 0.5s;
        }

        /* Styles pour la fenêtre pop-up */
        .popup-container {
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
            visibility: hidden;
            opacity: 0;
            transition: visibility 0s, opacity 0.3s;
        }

        .popup {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .popup-message {
            margin-bottom: 10px;
        }

        .popup-btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .popup-btn {
            padding: 5px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .popup-btn:hover {
            background-color: #0056b3;
        }

        /* Afficher la fenêtre pop-up */
        .popup-container.active {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body>
    <?php
    // Check if the form is submitted
    if (isset($_POST['login'])) {
        // Get the entered email and password
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate the credentials
        $validEmail = "lesgrainesdutropiques1@gmail.com";
        $validPassword = "Graines0DuTropiques547#?";

        if ($email === $validEmail && $password === $validPassword) {
            // Authentication successful, show the pop-up
            echo '<div class="popup-container active" id="popupContainer">';
            echo '    <div class="popup">';
            echo '        <p class="popup-message">Authentification réussie !</p>';
            echo '        <div class="popup-btn-container">';
            echo '            <button class="popup-btn" onclick="redirectToBlogAdmin()">Modifier, Ajouter ou Supprimer un article</button>';
            echo '            <button class="popup-btn" onclick="redirectToIndex()">Modifier, Ajouter ou Supprimer un produit</button>';
            echo '            <button class="popup-btn" onclick="redirectToEmailList()">Voir les adresses email des clients</button>';
            echo '        </div>';
            echo '    </div>';
            echo '</div>';
        } else {
            // Authentication failed, display an error message
            echo "<p class='error-text'>Identifiants incorrects. Veuillez réessayer.</p>";
        }
    }
    ?>

    <div class="container">
        <h2>S'authentifier</h2>
        <form method="POST">
            <div>
                <label for="email">Adresse e-mail:</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" name="login">Se connecter</button>
        </form>
    </div>

    <script>
        function redirectToBlogAdmin() {
            window.location.href = 'blogAdmin.php';
        }

        function redirectToIndex() {
            window.location.href = 'index.php';
        }

        function redirectToEmailList() {
            window.location.href = '../listeEmail.php';
        }
    </script>
</body>
</html>
