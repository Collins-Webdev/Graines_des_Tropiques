<?php
require("../config/connexion.php");

// Check if the form is submitted
if (isset($_POST['ajouter'])) {
    // Get article details from the form
    $titre_article = $_POST['titre_article'];
    $resume = $_POST['resume'];
    $date = $_POST['date'];
    $article = $_POST['article'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageDir = "../imgBlog/"; // Directory to store uploaded images
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imagePath = $imageDir . $imageName;

        // Move the uploaded image to the imgBlog directory
        move_uploaded_file($imageTmpName, $imagePath);

        // Store the image URL in the database
        ajouterArticle($imageName, $titre_article, $resume, $date, $article);

        // Redirect to the ../article.php page after adding the article
        header("Location: blogAdmin.php");
        exit();
    } else {
        echo "Error uploading image. Please try again.";
    }
}

function ajouterArticle($image, $titre_article, $resume, $date, $article)
{
    global $access;
    $imagePath = "imgBlog/" . $image; // Add the folder path to the image name
    $req = $access->prepare("INSERT INTO blog (image, titre_article, résumé, date, article) VALUES (?, ?, ?, ?, ?)");
    $req->execute(array($imagePath, $titre_article, $resume, $date, $article));
    $req->closeCursor();
}




function afficherArticles()
{
    global $access;
    if ($access !== null) { // Check if the database connection is established
        $req = $access->prepare("SELECT * FROM blog ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    } else {
        // Return an empty array or handle the error accordingly
        return [];
    }
}

// Check if the "supprimer" form is submitted
if (isset($_POST['supprimer'])) {
    // Get the article ID from the form
    $id = $_POST['id'];

    // Call the supprimerArticle function to delete the article from the database
    supprimerArticle($id);

    // Refresh the page after deleting the article
    header("Location: blogAdmin.php");
    exit();
}

// Check if the "modifier" form is submitted
if (isset($_POST['modifier'])) {
    // Get the article ID from the form
    $id = $_POST['id'];

    // Call the modifierArticle function to modify the article
    // Redirect to the edit page passing the article ID in the URL
    header("Location: editArticle.php?id=" . $id);
    exit();
}

function supprimerArticle($id)
{
    global $access;
    $req = $access->prepare("DELETE FROM blog WHERE id=?");
    $req->execute(array($id));
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        textarea.form-control {
            height: 100px;
            resize: vertical;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        @media screen and (max-width: 500px) {
            form {
                max-width: 100%;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        @media screen and (max-width: 768px) {
            img {
                max-width: 80px;
            }
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Ajouter un nouvel article</h2>
    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">L'image de l'article</label>
            <input type="file" class="form-control" name="image" id="imgArticle" required>
        </div>
        <div class="mb-3">
            <label for="titre_article" class="form-label">Titre de l'article</label>
            <input type="text" class="form-control" name="titre_article" required>
        </div>

        <div class="mb-3">
            <label for="resume" class="form-label">Résumé de l'article</label>
            <textarea class="form-control" name="resume" required></textarea>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date de publication</label>
            <input type="date" class="form-control" name="date" required>
        </div>

        <div class="mb-3">
            <label for="article" class="form-label">Article</label>
            <textarea class="form-control" name="article" required></textarea>
        </div>

        <button type="submit" name="ajouter" class="btn btn-primary">Ajouter l'article</button>
    </form>

    <h2 style="text-align: center;">Liste des articles</h2>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Résumé</th>
                <th>Date de publication</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Get the list of articles from the database
            $articles = afficherArticles();

            foreach ($articles as $article) :
            ?>
            <tr>
                <td><img src="../<?= $article->image ?>" alt="<?= $article->titre_article ?>"></td>
                <td><?= $article->titre_article ?></td>
                <td><?= $article->résumé ?></td>
                <td><?= $article->date ?></td>
                <td class="action-buttons">
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $article->id ?>">
                        <button type="submit" name="modifier" class="btn-primary">Modifier</button>
                        <button type="submit" name="supprimer" class="btn-primary">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>

