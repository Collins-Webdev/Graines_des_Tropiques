<?php

require("../config/commandes.php");

// Check if the form is submitted
if (isset($_POST['valider'])) {
    // Get product details from the form
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $desc = $_POST['desc'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageDir = "../img/products/"; // Directory to store uploaded images
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imagePath = $imageDir . $imageName;

        // Move the uploaded image to the img directory
        move_uploaded_file($imageTmpName, $imagePath);

        // Store the image URL in the database
        ajouter($imageName, $nom, $prix, $desc);

        // Redirect to the shop.php page after adding the product
        header("Location: #");
        exit();
    } 
    else {
        echo "Error uploading image. Please try again.";
    }
}


// Check if the "supprimer" form is submitted
if (isset($_POST['supprimer'])) {
    // Get the product ID from the form
    $id = $_POST['id'];

    // Call the supprimer function to delete the product from the database
    supprimer($id);

    // Redirect to the index.php page after deleting the product
    header("Location: index.php");
    exit();
}

// Get the list of products from the database
$products = afficher();






// Check if the form is submitted to update a product
if (isset($_POST['modifier'])) {
    // Get product details from the form
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $desc = $_POST['desc'];

    // Call the modifier function to update the product in the database
    modifier($id, $nom, $prix, $desc);

    // Redirect to the index.php page after updating the product
    header("Location: index.php");
    exit();
}

// Check if the form is submitted to add a new product
if (isset($_POST['valider'])) {
    // Get product details from the form
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $desc = $_POST['desc'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $imageDir = "../img/products/"; // Directory to store uploaded images
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imagePath = $imageDir . $imageName;

        // Move the uploaded image to the img directory
        move_uploaded_file($imageTmpName, $imagePath);

        // Store the image URL in the database
        ajouter($imageName, $nom, $prix, $desc);

        // Redirect to the shop.php page after adding the product
        header("Location: ../shop.php");
        exit();
    } else {
        echo "Error uploading image. Please try again.";
    }
}

// Get the list of products from the database
$products = afficher();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    

</head>
<body>

<form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="image" class="form-label">L'image du produit</label>
        <input type="file" class="form-control" name="image" id="imgProd" required>
    </div>
    <div class="mb-3">
        <label for="nom" class="form-label">Nom du produit</label>
        <input type="text" class="form-control" name="nom" required>
    </div>

    <div class="mb-3">
        <label for="prix" class="form-label">Prix</label>
        <input type="number" class="form-control" name="prix" required>
    </div>

    <div class="mb-3">
        <label for="desc" class="form-label">Description</label>
        <textarea class="form-control" name="desc" required></textarea>
    </div>

    <button type="submit" name="valider" class="btn btn-primary">Ajouter un nouveau produit</button>
</form>


<h2>Liste des produits</h2>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><img src="../<?= $product->image ?>" alt="<?= $product->nom ?>"></td>
                        <td><?= $product->nom ?></td>
                        <td><?= $product->prix ?></td>
                        <td><?= $product->description ?></td>
                        <td>
                            <!-- Form to update the product -->
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $product->id ?>">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="nom" value="<?= $product->nom ?>" required>
                                </div>

                                <div class="mb-3">
                                    <input type="number" class="form-control" name="prix" value="<?= $product->prix ?>" required>
                                </div>

                                <div class="mb-3">
                                    <textarea class="form-control" name="desc" required><?= $product->description ?></textarea>
                                </div>

                                <button type="submit" name="modifier">Modifier le produit</button>
                            </form>
                            <!-- End of form to update the product -->

                            <!-- Form to delete the product -->
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $product->id ?>">
                                <button type="submit" name="supprimer">Supprimer le produit</button>
                            </form>
                            <!-- End of form to delete the product -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</body>
</html>