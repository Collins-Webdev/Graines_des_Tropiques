<?php
require("connexion.php");

function ajouter($imageName, $nom, $prix, $desc)
{
    global $access;
    $imagePath = "img/products/" . $imageName; // Add the folder path to the image name
    $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES (?, ?, ?, ?)");
    $req->execute(array($imagePath, $nom, $prix, $desc));
    $req->closeCursor();
}


function afficher()
{
    global $access;
    if ($access !== null) { // Check if the database connection is established
        $req = $access->prepare("SELECT * FROM produits ORDER BY id DESC");
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    } else {
        // Return an empty array or handle the error accordingly
        return [];
    }
}
function supprimer($id)
{
    global $access;
    $req = $access->prepare("DELETE FROM produits WHERE id=?");
    $req->execute(array($id));
}




function modifier($id, $nom, $prix, $desc)
{
    global $access;
    $req = $access->prepare("UPDATE produits SET nom=?, prix=?, description=? WHERE id=?");
    $req->execute(array($nom, $prix, $desc, $id));
    $req->closeCursor();
}

?>