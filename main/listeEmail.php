<?php  
require("config/connexion.php");

// Supprimer l'email si le paramètre 'delete' est présent dans l'URL
if (isset($_GET['delete'])) {
    $emailToDelete = $_GET['delete'];
    $query = "DELETE FROM newsletter WHERE emailClient = :email";
    $stmt = $access->prepare($query);
    $stmt->bindParam(':email', $emailToDelete);
    $stmt->execute();
}

// Récupérer la liste des adresses email depuis la base de données
$query = "SELECT * FROM newsletter";
$stmt = $access->query($query);
$emails = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/logo.png">
    <title>Liste des adresses email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td button {
            padding: 5px 10px;
            background-color: #E55353;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            table {
                font-size: 14px;
            }

            td button {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <h1>Liste des adresses email</h1>
    <table>
        <tr>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($emails as $email): ?>
        <tr>
            <td><?php echo $email['emailClient']; ?></td>
            <td>
                <button onclick="deleteEmail('<?php echo $email['emailClient']; ?>')">Supprimer</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <script>
        function deleteEmail(email) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cette adresse email ?")) {
                window.location.href = `listeEmail.php?delete=${encodeURIComponent(email)}`;
            }
        }
    </script>
</body>
</html>
