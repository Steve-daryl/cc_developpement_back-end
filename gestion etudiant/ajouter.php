<?php
require 'bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $tel_etudiant = $_POST['tel_etudiant'];
    $tel_parent = $_POST['tel_parent'];
    $matricule = $_POST['matricule'];

    $sql = "INSERT INTO etudiant (nom, prenom, date_naissance, tel_etudiant, matricule, tel_parent) 
            VALUES (:nom, :prenom, :date_naissance, :tel_etudiant, :matricule, :tel_parent)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'date_naissance' => $date_naissance,
        'tel_etudiant' => $tel_etudiant,
        'matricule' => $matricule,
        'tel_parent' => $tel_parent
    ]);

    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Étudiant</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: rgb(249, 247, 247);
        }

        form {
            width: 380px;
            padding: 35px;
            background: white;
            border-radius: 35px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <form action="" method="post">
        <h1>Ajouter un Étudiant</h1>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="date_naissance">Date de Naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br><br>

        <label for="tel_etudiant">Téléphone Étudiant:</label>
        <input type="tel" id="tel_etudiant" name="tel_etudiant" required><br><br>

        <label for="tel_parent">Téléphone Parent:</label>
        <input type="tel" id="tel_parent" name="tel_parent" required><br><br>

        <label for="matricule">Matricule:</label>
        <input type="text" id="matricule" name="matricule" required><br><br>

        <input type="submit" value="Ajouter">
    </form>
</body>

</html>