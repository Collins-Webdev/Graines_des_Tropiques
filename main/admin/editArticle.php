<?php 

require("../config/connexion.php");




// Check if the article ID is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // If no article ID is provided, redirect to blogAdmin.php
    header("Location: blogAdmin.php");
    exit();
}

// Get the article details from the database based on the provided ID
$article = getArticleById($id);

// Check if the "modifier" form is submitted
if (isset($_POST['modifier'])) {
    // Get modified article details from the form
    $titre_article = $_POST['titre_article'];
    $resume = $_POST['résumé'];
    $date = $_POST['date'];
    $article_content = $_POST['article'];

    // Update the article details in the database
    modifierArticle($id, $titre_article, $resume, $date, $article_content);

    // Redirect to blogAdmin.php after modifying the article
    header("Location: blogAdmin.php");
    exit();
}

function getArticleById($id)
{
    global $access;
    if ($access !== null) {
        $req = $access->prepare("SELECT * FROM blog WHERE id = ?");
        $req->execute(array($id));
        $article = $req->fetch(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $article;
    } else {
        return null;
    }
}

function modifierArticle($id, $titre_article, $resume, $date, $article_content)
{
    global $access;
    $req = $access->prepare("UPDATE blog SET titre_article = ?, résumé = ?, date = ?, article = ? WHERE id = ?");
    $req->execute(array($titre_article, $resume, $date, $article_content, $id));
}

?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'article</title>
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
            height: 200px;
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

        @media screen and (max-width: 600px) {
            form {
                width: 90%;
            }
        }

        @media screen and (max-width: 480px) {
            .form-control {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Modifier l'article</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="titre_article" class="form-label">Titre de l'article</label>
            <input type="text" class="form-control" name="titre_article" required value="<?= $article->titre_article ?>">
        </div>

        <div class="mb-3">
            <label for="resume" class="form-label">Résumé de l'article</label>
            <textarea class="form-control" name="résumé" required><?= $article->résumé ?></textarea>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date de publication</label>
            <input type="date" class="form-control" name="date" required value="<?= $article->date ?>">
        </div>

        <div class="mb-3">
            <label for="article" class="form-label">Article</label>
            <textarea class="form-control" name="article" required><?= $article->article ?></textarea>
        </div>

        <button type="submit" name="modifier" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
</body>
</html>
