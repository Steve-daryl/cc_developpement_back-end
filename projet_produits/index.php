<?php
require 'bd.php';

$message = '';

if (isset($_POST['btn-ajouter'])) {
    // Récupération des données du formulaire
    $titre = $_POST['titre'];
    $description = $_POST['description'];

    if (!empty($titre) && !empty($description)) {
        // Vérifier si le produit existe déjà
        $stmt = $con->prepare("SELECT titre, descrip FROM produit WHERE titre = :titre AND descrip = :descrip");
        $stmt->execute(['titre' => $titre, 'descrip' => $description]);

        if ($stmt->rowCount() > 0) {
            $message = '<p style="color:red">Le produit existe déjà</p>';
        } else {
            // Traitement de l'image
            if (isset($_FILES['image'])) {
                $img_nom = $_FILES['image']['name'];
                $tmp_nom = $_FILES['image']['tmp_name'];
                $time = time();
                $nouveau_nom_img = $time . $img_nom;

                // Déplacement de l'image
                if (move_uploaded_file($tmp_nom, "images-produits/" . $nouveau_nom_img)) {
                    // Insertion dans la base de données
                    $stmt = $con->prepare("INSERT INTO produit (titre, descrip, image) VALUES (:titre, :descrip, :image)");
                    if ($stmt->execute(['titre' => $titre, 'descrip' => $description, 'image' => $nouveau_nom_img])) {
                        $message = '<p style="color:green">Produit ajouté !</p>';
                    } else {
                        $message = '<p style="color:red">Produit non ajouté !</p>';
                    }
                }
            }
        }
    } else {
        $message = '<p style="color:red">Veuillez remplir tous les champs !</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Produits</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section class="input_add">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="message"><?php echo $message; ?></div>
            <label>Nom du produit</label>
            <input type="text" name="titre" required>
            <label>Description du produit</label>
            <textarea name="description" cols="30" rows="10" required></textarea>
            <label>Ajouter une image</label>
            <input type="file" name="image" required>
            <input type="submit" value="Ajouter" name="btn-ajouter">
            <a class="btn-liste-prod" href="resultats.php">Liste des produits</a>
        </form>
    </section>
</body>
</html>