<?php
require("config/connexion.php");

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Vérifier si l'e-mail du client n'existe pas déjà dans la base de données
    $query = "SELECT * FROM newsletter WHERE emailClient = :email";
    $stmt = $access->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        // Si l'e-mail n'existe pas encore, l'ajouter à la table 'newsletter'
        $query = "INSERT INTO newsletter (emailClient) VALUES (:email)";
        $stmt = $access->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        echo "success"; // Envoi de réponse pour indiquer le succès de l'opération
    } else {
        echo "exist"; // Envoi de réponse pour indiquer que l'e-mail existe déjà dans la base de données
    }
}
?>
