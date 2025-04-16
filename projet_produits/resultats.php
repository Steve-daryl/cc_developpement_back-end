<?php
require 'bd.php';

$stmt = $con->query("SELECT * FROM produit");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="./styles2.css">
</head>

<body>
    <h2>Liste des Produits</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['titre']); ?></td>
                    <td><?php echo htmlspecialchars($row['descrip']); ?></td>
                    <td><img src="images-produits/<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['titre']); ?>" width="100"></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="index.php">Ajouter un produit</a>
</body>

</html>