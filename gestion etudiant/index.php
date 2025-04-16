<?php
require 'bd.php';
$sql = "SELECT * FROM etudiant";
$stmt = $pdo->query($sql);
$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            background-color: #4CAF50;
            text-decoration: none;
            color: #fff;
            padding: 10px 20px;
            border: none;

        }
    </style>
</head>

<body>
    <h2><u>Liste des Étudiants                </u><button><a href="ajouter.php">Ajouter un étudiant</a></button></h2>

    <table>
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date de Naissance</th>
                <th>Téléphone Étudiant</th>
                <th>Téléphone Parent</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($etudiants as $etudiant): ?>
                <tr>
                    <td><?php echo htmlspecialchars($etudiant['matricule']); ?></td>
                    <td><?php echo htmlspecialchars($etudiant['nom']); ?></td>
                    <td><?php echo htmlspecialchars($etudiant['prenom']); ?></td>
                    <td><?php echo htmlspecialchars($etudiant['date_naissance']); ?></td>
                    <td><?php echo htmlspecialchars($etudiant['tel_etudiant']); ?></td>
                    <td><?php echo htmlspecialchars($etudiant['tel_parent']); ?></td>
                    <td>
                        <a href="modifier.php?matricule=<?php echo urlencode($etudiant['matricule']); ?>">Modifier</a>
                        <a href="supprimer.php?matricule=<?php echo urlencode($etudiant['matricule']); ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>